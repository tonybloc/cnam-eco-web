import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { FormBuilder, Validators} from '@angular/forms';

import { ArticleFilter } from './../../models/article-filter';

import { Observable, from, of, Subject } from 'rxjs';
import { ArticleSubCategory } from 'src/app/models/article-sub-category';
import { Brand } from 'src/app/models/brand';
import { ProductService } from 'src/app/service/product.service';

//import { ProductService } from './../service/product.service';

@Component({
  selector: 'article-search',
  templateUrl: './article-search.component.html',
  styleUrls: ['./article-search.component.scss']
})
export class ArticleSearchComponent implements OnInit {

  private genres : string[] = ['Homme', 'Femme'];
  public SubCategory : Observable<ArticleSubCategory[]>
  public Brands: Observable<Brand[]>;

  // Search form
  searchForm = this.fm.group({ 
    name : [''],
    max_price : [''],
    min_price : [''],
    genre: [''],
    brand: [''],
    category: ['']
  });

  // Value of filters
  public filter : ArticleFilter;

  // The event can be subcribed from parent component.
  @Output() public onSearch : EventEmitter<ArticleFilter> = new EventEmitter<ArticleFilter>();

  /**
   * process to execute when search form was submitted.
   */
  public onSubmit(){
    this.filter = new ArticleFilter();
    this.filter.Name = this.searchForm.value.name;
    this.filter.MinPrice = this.searchForm.value.min_price;
    this.filter.MaxPrice = this.searchForm.value.max_price;
    this.filter.Brand = this.searchForm.value.brand;
    this.filter.Genre = this.searchForm.value.genre;

    this.onSearch.emit(this.filter);
  }

  /**
   * Clear filter
   */
  public clearFilter() {    
    this.filter = new ArticleFilter();
    this.onSearch.emit(this.filter);   

    this.searchForm.reset();
  }

  // Create new instance of ArticleSearchComponent
  constructor(private fm: FormBuilder, private service: ProductService) {}

  ngOnInit() {    
    this.Brands = this.service.GetBrands();
    this.SubCategory = this.service.GetArticleSubCategories();
  }
}
