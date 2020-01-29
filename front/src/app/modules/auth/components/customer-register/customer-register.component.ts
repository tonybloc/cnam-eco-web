import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';
import { Customer } from '../../models/customer';
import { AuthService } from '../../../../service/auth.service';

import { Observable } from 'rxjs';
import { Router } from '@angular/router'
import { stringify } from 'querystring';
import { first } from 'rxjs/operators';

@Component({
  selector: 'customer-register',
  templateUrl: './customer-register.component.html',
  styleUrls: ['./customer-register.component.scss']
})

export class CustomerRegisterComponent implements OnInit {

  public signUpForm: FormGroup;
  public genders: String[];
  public countries: String[];
  public minPasswordLength: number;

  public isSubmitted = false;

  /**
   * Create new instance of register component
   * @param formBuilder form
   * @param authService authentication service
   */
  constructor(
    private formBuilder: FormBuilder,
    private service: AuthService,
    private router: Router
  ) { }

  ngOnInit() {

    // Define combobox informations
    this.genders = ['Homme', 'Femme'];
    this.countries = ["France", "Allemagne"];
    this.minPasswordLength = 8;

    // initialize register form
    this.signUpForm = this.formBuilder.group({
      firstname: ['', [
        Validators.required,
        Validators.pattern("^[a-zA-Z -]+$")
      ]],
      lastname: ['', [
        Validators.required,
        Validators.pattern("^[a-zA-Z -]+$")
      ]],
      gender: ['', [
        Validators.required
      ]],
      password: ['', [
        Validators.required,
        Validators.minLength(this.minPasswordLength)
      ]],
      passwordConfirmation: ['', [
        Validators.required,
      ]],
      streetno: ['', [
        Validators.required,
        Validators.pattern("^[a-zA-Z0-9 ]+$")
      ]],
      streetname: ['', [
        Validators.required,
        Validators.pattern("^[a-zA-Z0-9 ]+$")
      ]],
      city: ['', [
        Validators.required,
        Validators.pattern("^[a-zA-Z -]+$")
      ]],
      state: ['', [
        Validators.required
      ]],
      zip: ['', [
        Validators.required,
        Validators.pattern("^[a-zA-Z0-9 ]+$")
      ]],
      email: ['', [
        Validators.required,
        Validators.pattern('^[A-Za-z0-9._-]+@[A-Za-z0-9._-]+\.[A-Za-z]{2,6}$')
      ]],
      phone: ['', [
        Validators.required,
        Validators.pattern('^0[1-6]{1}(([0-9]{2}){4})$')
      ]]
    })
  }

  /**
   * Get form controls
   */
  get form() { 
    return this.signUpForm.controls; 
  }

  /**
   * form submited callback (event)
   */
  public onSubmit() {

    this.isSubmitted = true;

    if (this.signUpForm.invalid)
      return;
    
    var customer = new Customer(
      this.form.firstname.value,
      this.form.lastname.value,
      this.form.password.value,
      this.form.email.value,
      this.form.phone.value,
      this.form.streetno.value,
      this.form.streetname.value,
      this.form.city.value,
      this.form.zip.value,
      this.form.state.value,
      this.form.gender.value
    );

    this.service.signup(customer).pipe(first()).subscribe( 
      value => {
        // redirect to home page
        this.router.navigate(["/auth/signin"]);
      }, 
      error => {console.log(error)}
    );    
  }
}
