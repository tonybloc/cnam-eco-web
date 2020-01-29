import { Pipe, PipeTransform } from '@angular/core';
import { Country } from '../models/country'

@Pipe({
  name: 'phone'
})
export class PhonePipe implements PipeTransform {

  transform(value: any, ...args: any[]): any {
    
  }

}
