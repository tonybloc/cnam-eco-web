import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PageNotFoundComponent } from './components/page-not-found/page-not-found.component'
import { HomeComponent } from './components/home/home.component';

// Define application's routes
const routes: Routes = [ 
  { path: "", redirectTo: '/home', pathMatch:"full" },
  { path: "home", component: HomeComponent },
  { path: "catalog", loadChildren: () => import("./modules/catalog/catalog.module").then(m => m.CatalogModule) }, 
  { path: "cart", loadChildren: () => import("./modules/cart/cart.module").then(m => m.CartModule) },
  { path: "auth", loadChildren: () => import("./modules/auth/auth.module").then(m => m.AuthModule) },
  { path: "not-found", component: PageNotFoundComponent },
  { path: "**", redirectTo: "/not-found", pathMatch:"full" }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})

export class AppRoutingModule { }
