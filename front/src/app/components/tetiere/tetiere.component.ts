import { Component, OnInit } from '@angular/core';

import { Store } from '@ngxs/store';
import { AuthService } from './../../service/auth.service';

import { Observable } from 'rxjs';
import { Router } from '@angular/router';

@Component({
  selector: 'app-tetiere',
  templateUrl: './tetiere.component.html',
  styleUrls: ['./tetiere.component.scss']
})
export class TetiereComponent implements OnInit {

  public isAuthenticated: Observable<boolean>;
  public cartTotal: number;

  constructor(private store: Store, private service: AuthService, private router: Router) {     
  }

  ngOnInit() {    
    this.store.select(state => state.articles.Cart).subscribe( x => this.cartTotal = x.length);    
    this.isAuthenticated = this.service.isAuthenticated();
  }

  /**
   * Sign out methode
   */
  public onSignOut() {
    this.service.signout(); 
    this.isAuthenticated = this.service.isAuthenticated(); 
    this.router.navigate(["/auth/signin"]);
  }
}
