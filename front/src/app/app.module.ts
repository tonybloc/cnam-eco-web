import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule} from '@angular/forms';

import { NgxsModule } from '@ngxs/store';
import { ArticleState } from './shared/states/article.state';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component'; 
import { FooterComponent } from './components/footer/footer.component';
import { TetiereComponent } from './components/tetiere/tetiere.component';
import { PageNotFoundComponent } from './components/page-not-found/page-not-found.component';


@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    FooterComponent,
    TetiereComponent,
    PageNotFoundComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule, 
    NgxsModule.forRoot([
      ArticleState
    ]),
    ReactiveFormsModule.withConfig({warnOnNgModelWithFormControl: 'always'}),  // who warning for no conventional template directive
  ],
  providers: [],
  bootstrap: [AppComponent]
})

export class AppModule { }
