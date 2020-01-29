import { Component, OnInit } from '@angular/core';
import { Article } from './../../models/article';
import { Store } from '@ngxs/store';
import { ActivatedRoute } from '@angular/router';
import { ProductService } from "../../service/product.service";
import { map, tap } from 'rxjs/operators';
import 'rxjs/add/observable/of'
import { Observable } from 'rxjs';
import { Watch } from 'src/app/models/watch';

@Component({
  selector: 'app-article-item',
  templateUrl: './article-item.component.html',
  styleUrls: ['./article-item.component.scss']
})
export class ArticleItemComponent implements OnInit {

  //public Articles: Article[];
  public Article: Observable<Watch>;
  public ArticleReference: number;

  
  constructor(private service: ProductService, private store: Store, private route: ActivatedRoute) {}


  ngOnInit() {
    this.ArticleReference = +this.route.snapshot.paramMap.get('id');    
    this.Article = this.service.GetArticleDetails(this.ArticleReference);
  }
}
