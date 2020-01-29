import { Component, OnInit } from '@angular/core';

import { AuthService } from '../../../../service/auth.service';

import { Observable } from 'rxjs';
import { Router } from '@angular/router'
import { User } from './../../../../models/user';


@Component({
  selector: 'app-customer-info',
  templateUrl: './customer-info.component.html',
  styleUrls: ['./customer-info.component.scss']
})
export class CustomerInfoComponent implements OnInit {

  public user: Observable<User>;

  constructor(private service: AuthService, private router: Router) {    
    this.user = this.service.getUserInformation();
  }

  ngOnInit() {
  }

  public onDelete() {
    this.service.delete().subscribe( 
      (response) => {console.log(response)}, 
      (error) => {console.log(error)}
    );

    this.router.navigate(["/home"]);
  }

}
