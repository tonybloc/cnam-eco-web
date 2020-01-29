import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';
import { Customer } from '../../models/customer';
import { AuthService } from '../../../../service/auth.service';

import { Observable } from 'rxjs';
import { Router } from '@angular/router'
import { first, tap } from 'rxjs/operators';
import { User } from 'src/app/models/user';

@Component({
  selector: 'app-customer-update',
  templateUrl: './customer-update.component.html',
  styleUrls: ['./customer-update.component.scss']
})
export class CustomerUpdateComponent implements OnInit {

  public user: Observable<User>;

  public registerForm: FormGroup;
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

    // Get user information 

    // Define combobox informations
    this.genders = ['Homme', 'Femme'];
    this.countries = ["France", "Allemagne"];
    this.minPasswordLength = 8;

    // initialize register form
    this.registerForm = this.formBuilder.group({
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
      country: ['', [
        Validators.required
      ]],
      postalcode: ['', [
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

    
    this.user = this.service.getUserInformation().pipe(tap(user => this.registerForm.patchValue(user)));
  }

  /**
   * Get form controls
   */
  get form() { 
    return this.registerForm.controls; 
  }

  /**
   * form submited callback (event)
   */
  public onSubmit() {

    this.isSubmitted = true;

    if (this.registerForm.invalid)
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
      this.form.postalcode.value,
      this.form.country.value,
      this.form.gender.value
    );

    this.service.update(customer).pipe(first()).subscribe( 
      value => {
        // redirect to home page
        this.router.navigate(["/home"]);
      }, 
      error => {console.log(error)}
    );    
  }
}
