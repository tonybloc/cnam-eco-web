import { Component, OnInit } from '@angular/core';

import { User } from './../../models/user';
import { AuthService } from './../../service/auth.service';

import { Observable } from 'rxjs';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  
  public isAuthenticated: Observable<boolean>;
  public user: Observable<User>;

  constructor(private service: AuthService) {
  }

  ngOnInit() {
    this.user = this.service.getUserInformation();    
    this.isAuthenticated = this.service.isAuthenticated();
  }

}
