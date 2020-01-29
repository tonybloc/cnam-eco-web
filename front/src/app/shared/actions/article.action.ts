import { Article } from './../../models/article';

export class AddArticleToCart {
    static readonly type="[Article] AddArticleToCart";
    constructor(public item: Article){}
}

export class DeleteArticleFromCart {
    static readonly type="[Article] DeleteArticleFromCart";
    constructor(public item: Article){}
}

export class LoadArticles {
    static readonly type="[Article] LoadArticles";
    constructor(){}
}

export class UpdateSelectedArticle {
    static readonly type="[Article] UpdateSelectedArticle";
    constructor(public item: Article){}
}

export class DeleteAllArticleFromCart{
    static readonly type="[Article] DeleteAllArticleFromCart";
    constructor(){}
}

