import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AuthRoutingModule } from './auth-routing.module';

import { CustomerInfoComponent } from './components/customer-info/customer-info.component';
import { CustomerRegisterComponent } from './components/customer-register/customer-register.component';
import { CustomerLoginComponent} from './components/customer-login/customer-login.component';
import { ReactiveFormsModule} from '@angular/forms';
import { PhonePipe } from './pipes/phone.pipe';

import { PasswordStrengthDirective } from './directives/password-strength.directive';

// directives
import { MustMatchDirective } from './directives/mustMatch.directive';
import { CustomerUpdateComponent } from './components/customer-update/customer-update.component';

@NgModule({
  declarations: [
    CustomerInfoComponent,
    CustomerRegisterComponent,
    CustomerLoginComponent,
    PhonePipe,
    PasswordStrengthDirective,
    MustMatchDirective,
    CustomerUpdateComponent
  ],
  imports: [
    CommonModule,
    AuthRoutingModule,
    ReactiveFormsModule
  ]
})
export class AuthModule { }
