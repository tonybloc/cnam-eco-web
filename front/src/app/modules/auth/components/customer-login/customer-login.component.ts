import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';

import { AuthService } from '../../../../service/auth.service';

import { Router } from '@angular/router'

@Component({
  selector: 'app-customer-login',
  templateUrl: './customer-login.component.html',
  styleUrls: ['./customer-login.component.scss']
})
export class CustomerLoginComponent implements OnInit {

  public signInForm: FormGroup;
  public isSubmitted = false; 
  public invalideLogin: boolean;

  /**
   * Create new instance of login component
   * @param formBuilder : form
   * @param service : authentication service
   * @param router : app router (navigation)
   */
  constructor(
    private formBuilder: FormBuilder,
    private service: AuthService,
    private router: Router
  ) { }


  ngOnInit() {
    // initialize login form (controls)
    this.signInForm = this.formBuilder.group({
      login: ['', [
        Validators.required,
        Validators.pattern('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$')
      ]],
      password: ['', [
        Validators.required,
        Validators.minLength(8)
      ]]
    })

    this.invalideLogin = false
  }

  /**
   * Get form controls
   */
  get form() { 
    return this.signInForm.controls; 
  }

  /**
   * form submited callback (event)
   */
  public onSubmit() {
    this.isSubmitted = true;

    if (this.signInForm.invalid)
      return;


    this.service.signin(this.form.login.value, this.form.password.value)
      .subscribe( 
        (response) => {this.OnValidateAuthentication(response)}, 
        (error) => {this.OnFailedAuthentication(error)},
      );
  }

  /**
   * Authentication succed - callback
   * @param response 
   */
  private OnValidateAuthentication(response) {
    this.invalideLogin = false;

    // redirect to home page
    this.router.navigate(["/home"]);
  }

  /** 
   * Authentication failed - callback
   * @param error 
   */
  private OnFailedAuthentication(error) {
    this.invalideLogin = true;
    console.log(error);
  }
}
