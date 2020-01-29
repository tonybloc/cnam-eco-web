import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'money'
})
export class MoneyPipe implements PipeTransform {

  transform(value: any, ...args: any[]): string {
    let val = value;
    if (this.toLocaleStringSupport() && this.toLocaleStringSupportsOptions()) {
      console.log('local');
      val = val.toFixed(2).toLocaleString("fr-FR", {style:"currency", currency: "EUR"});
      return `${val} €`;  
    }
    else
      return `${value.toFixed(2)} €`;    
  }

  /**
   * Check if browser support "toLocalString" methode. Support ECMA-262 before 5.1
   * \see : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Number/toLocaleString#compat
   */
  private toLocaleStringSupport() : boolean {    
    try {
      let nombre = 0; 
      nombre.toLocaleString("i"); 
    } 
    catch (e) { 
      return e​.name === "RangeError"; 
    }

    return false;
  }

  /**
   * Check if browser support "tolocalString" options. Support ECMA-262 before 5.1
   * \see : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Number/toLocaleString#compat
   */
  private toLocaleStringSupportsOptions() : boolean {
    return !!(typeof Intl == 'object' && Intl && typeof Intl.NumberFormat == 'function');
  }

}
