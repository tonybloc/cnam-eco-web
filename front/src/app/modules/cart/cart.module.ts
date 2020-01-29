import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CartComponent } from './cart.component';

import { CartRoutingModule} from './cart-routing.module';

import { ArticleStateModel } from '../../shared/models/article.state.model';
import { NgxsModule } from '@ngxs/store';

import { MoneyPipe } from './pipes/money.pipe';
import { CartPurchaseComponent } from './cart-purchase/cart-purchase.component';

NgxsModule.forRoot([ArticleStateModel]);

@NgModule({
  declarations: [
    CartComponent,
    MoneyPipe,
    CartPurchaseComponent
  ],
  imports: [
    CommonModule,
    CartRoutingModule
  ]
})
export class CartModule { }
