import { Component } from '@angular/core';
import { Store } from '@ngxs/store';

import { LoadArticles } from './shared/actions/article.action';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'angular-shop';
}
