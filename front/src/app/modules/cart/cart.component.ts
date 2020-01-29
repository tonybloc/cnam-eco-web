import { Component, OnInit } from '@angular/core';
import { State, Select } from '@ngxs/store';

import { Store } from '@ngxs/store';
import { AddArticleToCart, DeleteArticleFromCart, DeleteAllArticleFromCart } from '../../shared/actions/article.action';
import { ArticleState } from '../../shared/states/article.state';
import { Observable } from 'rxjs';
import { Article } from './../../models/article';
import { first } from 'rxjs/operators';


@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.scss']
})
export class CartComponent implements OnInit {


  Cart : Observable<Article[]>;
  total : number = 0;

  constructor(private store: Store) {
  }

  ngOnInit() {
    this.refreshTotalPrice();
  }

  /**
   * Delete article from cart
   * @param item 
   */
  DeleteArticleFromCart(item: Article){
    this.store.dispatch(new DeleteArticleFromCart(item));    
  }

  /**
   * Purchase
   */
  public onPurchase() {
    this.store.dispatch(new DeleteAllArticleFromCart());   
    this.refreshTotalPrice();
  }

  public refreshTotalPrice(){
    this.total = 0;
    this.store.select(state => state.articles.Cart).pipe(first()).subscribe( (value: Article) => {
      this.total += value.unitprice;
    });    
    this.Cart = this.store.select(state => state.articles.Cart);
  }
  

}