import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule} from '@angular/router';
import { PageNotFoundComponent } from 'src/app/components/page-not-found/page-not-found.component'
import { CatalogComponent } from "./catalog.component";

const routes: Routes = [
  { path: "", component: CatalogComponent },
  { path: "detail/:id", loadChildren: () => import("../article/article.module").then(m => m.ArticleModule)},
]

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forChild(routes)
  ],
  exports: [
    RouterModule
  ]
})
export class CatalogRoutingModule { }
