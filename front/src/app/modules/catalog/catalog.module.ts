import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule} from '@angular/forms';

import { CatalogRoutingModule} from "./catalog-routing.module";

import { ArticleSearchComponent } from './components/article-search/article-search.component';
import { MoneyPipe } from './pipes/money.pipe';
import { CatalogComponent } from './catalog.component';

@NgModule({
  declarations: [
    ArticleSearchComponent,
    MoneyPipe,
    CatalogComponent
  ],
  imports: [
    CommonModule,
    HttpClientModule, 
    CatalogRoutingModule,
    ReactiveFormsModule.withConfig({warnOnNgModelWithFormControl: 'always'}),
  ],
  providers: [],
  bootstrap: [CatalogComponent]
})
export class CatalogModule { }
