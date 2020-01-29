import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { Routes, RouterModule } from '@angular/router';
import { CustomerRegisterComponent} from './components/customer-register/customer-register.component';
import { CustomerLoginComponent } from './components/customer-login/customer-login.component';
import { CustomerUpdateComponent } from './components/customer-update/customer-update.component';
import { CustomerInfoComponent } from './components/customer-info/customer-info.component';


const routes: Routes = [
  { path:"signin", component: CustomerLoginComponent },
  { path:"signup", component: CustomerRegisterComponent },
  { path:"info", component: CustomerInfoComponent },
  { path:"update", component: CustomerUpdateComponent }
];

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forChild(routes)
  ],
  exports: [
    RouterModule
  ]
})
export class AuthRoutingModule { }
