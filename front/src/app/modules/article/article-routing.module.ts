import { NgModule } from '@angular/core';

import { Routes, RouterModule} from '@angular/router';
import { ArticleItemComponent } from './article-item.component';

const routes: Routes = [ 
  { path: "", component: ArticleItemComponent }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ArticleRoutingModule { }
