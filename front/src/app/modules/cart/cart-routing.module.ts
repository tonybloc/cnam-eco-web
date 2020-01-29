import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { Routes, RouterModule} from '@angular/router';
import { CartComponent} from './cart.component';
import { CartPurchaseComponent} from './cart-purchase/cart-purchase.component';

const routes: Routes = [
  { path: "", component: CartComponent },
  { path: "payment", component: CartPurchaseComponent }
]



@NgModule({
  declarations: [],
  imports: [
    CommonModule,    
    RouterModule.forChild(routes)
  ]
})
export class CartRoutingModule { }
