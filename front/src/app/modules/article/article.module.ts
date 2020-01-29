import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ArticleItemComponent} from './article-item.component';
import { ArticleRoutingModule} from './article-routing.module';
import { MoneyPipe} from './pipes/money.pipe'

@NgModule({
  declarations: [
    ArticleItemComponent,
    MoneyPipe
  ],
  imports: [
    CommonModule,
    ArticleRoutingModule
  ]
})

export class ArticleModule { }
