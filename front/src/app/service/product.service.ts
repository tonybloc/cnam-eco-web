import { Injectable } from '@angular/core';
import { JwtHelperService } from "@auth0/angular-jwt";
import { map } from 'rxjs/operators';
import { tokenNotExpired } from 'angular2-jwt';
import { Customer } from '../modules/auth/models/customer';
import { HttpErrorResponse, HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { catchError } from 'rxjs/operators';
import { Observable, throwError } from 'rxjs';

import { Article } from '../models/article';
import { Watch } from '../models/watch';
import { Brand } from '../models/brand';
import { ArticleCategory } from '../models/article-category';
import { ArticleSubCategory } from '../models/article-sub-category';



@Injectable({
  providedIn: 'root'
})
export class ProductService {

  // Create new instance of data service
  constructor(private http: HttpClient) { }

  /**
   * Get list of articles
   * @return Observable<Article>
   */
  public GetArticles(): Observable<Article[]> {
    return this.http.get<Article[]>(environment.backendProductRoute)    
      .pipe(
        map((jsonArray: Object[]) => jsonArray.map(item => Article.fromJson(item))
        ));
        
  }

  /**
   * Get article details
   * @return Observable<Watch>
   */
  public GetArticleDetails(reference: number): Observable<Watch> {
    return this.http.get<Watch>(environment.backendProductDetailsRoute + "/" + reference)
      .pipe(
        map((jsonItem: Object) => Watch.fromJson(jsonItem)
        ));
  }

  /**
   * Get brand liste
   * @return Observable<Brand[]>
   */
  public GetBrands(): Observable<Brand[]> {
    return this.http.get<Brand[]>(environment.backendBrandRoute)
      .pipe(
        map((jsonArray: Object[]) => { 
          return jsonArray.map(item => {
            console.log(Brand.fromJson(item));
            return Brand.fromJson(item)}
        )}
      ));
  }

  /**
   * Get list of categories
   * @return
   */
  public GetArticleCategories(): Observable<ArticleCategory[]> {
    return this.http.get<ArticleCategory[]>(environment.backendCategoriesRoute)
      .pipe(
        map((jsonArray: Object[]) => jsonArray.map(item => ArticleCategory.fromJson(item)))
      );
  }

  /**
   * Get list of subcategories
   * @return
   */
  public GetArticleSubCategories(): Observable<ArticleSubCategory[]> {
    return this.http.get<ArticleSubCategory[]>(environment.backendSubCategoriesRoute)
      .pipe(
        map((jsonArray: Object[]) => jsonArray.map(item => ArticleSubCategory.fromJson(item)),
          catchError(this.handleError)
        ));
  }


  /**
  * Logo errors in console
  * @param error : Http error
  */
  private handleError(error: HttpErrorResponse) {
    if (error.error instanceof ErrorEvent) {
      // A client-side or network error occurred. Handle it accordingly.
      console.error('An error occurred:', error.error.message);
    } else {
      // The backend returned an unsuccessful response code.
      // The response body may contain clues as to what went wrong,
      console.error(
        `Backend returned code ${error.status}, ` +
        `body was: ${error.error}`);
    }
    // return an observable with a user-facing error message
    return throwError(
      'Something bad happened; please try again later.');
  };

}
