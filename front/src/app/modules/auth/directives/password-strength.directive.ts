import { Directive } from '@angular/core';

@Directive({
  selector: '[appPasswordStrength]'
})
export class PasswordStrengthDirective {

  // password must contain at least one
  // - miniscule
  // - majuscule
  // - number
  // - special character
  constructor() { }

}
