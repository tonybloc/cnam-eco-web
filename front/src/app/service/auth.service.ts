import { Injectable } from '@angular/core';
import { map, first } from 'rxjs/operators';
import { tokenNotExpired } from 'angular2-jwt';
import { Customer } from '../modules/auth/models/customer';
import { HttpErrorResponse, HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { Observable, BehaviorSubject } from 'rxjs';
import { tap } from 'rxjs/operators';
import { User } from '../models/user';
import 'rxjs/add/observable/of';


@Injectable({
  providedIn: 'root'
})
export class AuthService {

  AuthenticateSubject = new BehaviorSubject<boolean>(this.hasToken());   
  
  constructor(private http: HttpClient) { }

  /**
   * Signin user
   * @param login : login of user
   * @param password : password of user
   */
  public signin(login: string, password: string): Observable<User> {
    
    // Execute request
    return this.http.post<User>(environment.backendSigninRoute, { login, password }).pipe(map(value => {

      if (value['jwt'] && value['user']) {
        localStorage.setItem('user', JSON.stringify(User.fromJson(value['user'])));
        localStorage.setItem('jwtToken', value['jwt']);
      }

      // Refresh status
      this.AuthenticateSubject.next(true);

      return User.fromJson(value['user']);
    }));
  }
  

  /**
   * Register new user into website
   * @param customer : Entity delivery by register form
   * @return Observable<User>
   */
  public signup(customer: Customer): Observable<User> {
    
    // initilize headers
    let headers = new HttpHeaders().set("Content-Type", "application/json");
    const http = { headers: headers };

    // Execute request
    return this.http.post<User>(environment.backendSignupRoute, JSON.stringify(customer), http).pipe(map(value => {
      
      if (value['jwt'] && value['user']) {
        localStorage.setItem('user', JSON.stringify(value['user']));
        localStorage.setItem('jwtToken', value['jwt']);
      }

      return User.fromJson(value['user']);
    }));
  }

  /**
   * Sign out
   */
  public signout(): void {

    // notify authenticate status   
    localStorage.removeItem("user");       
    localStorage.removeItem("jwtToken");    
    this.AuthenticateSubject.next(false);
  }

  /**
   * Delete user
   */
  public delete(): Observable<any> {
    
    let token;
    // Get token value
    this.getJwtToken().pipe(first()).subscribe(value => {token = value});
    
    // Initialize header
    let headers = new HttpHeaders().set("Authorization", "Bearer " + token);
    const http = { headers: headers };

    // Execute request - delete
    return this.http.delete<any>(environment.backendUserDeleteRoute, http).pipe(map(value => {
      console.log(value);
    }));    
  }

  /**
  * Update user 
  * @param customer 
  */
  public update(customer: Customer): Observable<User> {
    
    let token;

    // Get token value
    this.getJwtToken().pipe(first()).subscribe(value => {token = value});
    
    // Initialize headers
    let headers = new HttpHeaders()
      .set("Authorization", "Bearer " + token)
      .set("Content-Type", "application/json");

    const http = { headers: headers };

    // Execute request - update user
    return this.http.put<User>(environment.backendUserUpdateRoute, JSON.stringify(customer), http).pipe(map(value => {      
      if (value) {
        localStorage.setItem('user', JSON.stringify(value));
      }
      return User.fromJson(value);
    }));
  }

  /**
   * Get user information stored in local storage
   */
  public getUserInformation(): Observable<User> {
    let token: string;
    
    // get token value
    this.getJwtToken().pipe(first()).subscribe(value => {token = value});
    
    // initialize headers
    let headers = new HttpHeaders().set("Authorization", "Bearer " + token)
    console.log(token);
    const http = { headers: headers };

    // execute
    return this.http.get<User>(environment.backendUserInfo, { headers: headers }).pipe(map(value => {
      console.log("INFO");
      console.log(value);
      localStorage.setItem('user', JSON.stringify(value));
      return User.fromJson(value);
    }));
  }

  /**
   * Get jwt stored in local storage
   */
  public getJwtToken(): Observable<string>{

    console.log("JWT token - Local Storage");
    console.log(localStorage.getItem['jwtToken']);

    if(this.hasToken())    
      return Observable.of(localStorage.getItem('jwtToken'));
      
    return Observable.of(null);
  }

  /**
   * Check if user is authenticated
   */
  public isAuthenticated(): Observable<boolean> {
    return this.AuthenticateSubject.asObservable();
  }

  /**
   * Check if token is defined in localstorage
   */
  private hasToken() : boolean {
    return !!localStorage.getItem('jwtToken');
  }
}
