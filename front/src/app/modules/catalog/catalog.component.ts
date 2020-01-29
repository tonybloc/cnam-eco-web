import { Component, OnInit, ComponentFactoryResolver } from '@angular/core';
import { Router } from '@angular/router'
import { Store } from '@ngxs/store';

import { ProductService } from '../../service/product.service';

import { Article } from '../../models/article';
import { ArticleFilter } from './models/article-filter';

import { AddArticleToCart } from './../../shared/actions/article.action'

import { Observable, from, of, Subject } from 'rxjs';
import { map, tap } from 'rxjs/operators';
import { ActivatedRoute } from '@angular/router';
import { ArticleSubCategory } from 'src/app/models/article-sub-category';
import { Brand } from 'src/app/models/brand';


@Component({
  selector: 'catalog',
  templateUrl: './catalog.component.html',
  styleUrls: ['./catalog.component.scss']
})
export class CatalogComponent implements OnInit {

  public Articles: Observable<Article[]>;
  public SubCategory : Observable<ArticleSubCategory[]>
  public Brand: Observable<Brand[]>;

  public CurrentFilter = new Subject<ArticleFilter>();

  ngOnInit() {

    this.CurrentFilter.subscribe({
      next: (value) => {
        this.Articles = this.service.GetArticles().pipe(
          map((objs: Article[]) => objs.filter((obj: Article) => this.CheckMatching(obj, value)))
        );
      }
    })

    this.CurrentFilter.next(new ArticleFilter());
  }

  /**
   * Change value of filter and notify this value.
   * @param $event value sendend by output child form
   */
  public onFilter($event) {
    this.CurrentFilter.next($event);
  }


  /**
   * Add new item on cart
   * @param article item to add in cart
   */
  public AddToCart(article: Article) {
    this.store.dispatch(new AddArticleToCart(article));
    //let items = this.store.select(state => state.articles.Cart);
  }


  /**
   * Check if the article is matched with filter
   * @param obj target item
   * @param filter item filter
   */
  public CheckMatching(obj: Article, filter: ArticleFilter): boolean {

    let f = { name: true, min_price: true, max_price: true, brand: true, genre: true };


    if (filter !== undefined && filter !== null) {

      // filter empty value
      if (filter["Brand"] == "" && filter["Genre"] == "" && filter["Name"] == "" && filter['MaxPrice'] == null && filter['MinPrice'] == null)
        return true;

      // filtre on brand
      if ((filter['Brand'] !== undefined) && (filter['Brand'] !== null) && filter['Brand'] != "")
        f.brand = (obj.brand.name === filter['Brand'])

      // filtre on genre
      if ((filter['Genre'] !== undefined) && (filter['Genre'] !== null) && filter["Genre"] != "")
        f.genre = (obj.gender.includes(filter['Genre']))

      //filtre on price
      if ((filter['MaxPrice'] !== undefined) && (filter['MaxPrice'] !== null) && filter['MaxPrice'].toString() != "")
        f.max_price = (obj.unitprice <= filter['MaxPrice']);

      if ((filter['MinPrice'] !== undefined) && (filter['MinPrice'] !== null) && filter['MinPrice'].toString() != "")
        f.min_price = (obj.unitprice >= filter['MinPrice']);

      // filter on name
      if ((filter['Name'] !== undefined) && (filter['Name'] !== null) && filter['Name'] != "")
      {
        let name = obj.title.toUpperCase();
        f.name = (name.includes((filter['Name'].trim()).toUpperCase()));
      }
        
      return f.brand && f.genre && f.max_price && f.min_price && f.name;

    }
    else {
      return false;
    }
  }


  /**
   * Create new instance of class
   * @param service Api service - used for retreive information from server
   */
  constructor(private service: ProductService, private store: Store, private router: Router) {
  }

}
