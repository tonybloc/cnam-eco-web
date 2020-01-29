import { Brand } from "./brand";
import { ArticleSubCategory } from "./article-sub-category";

export class Article {

    /**
     * Create Article from json
     * @param json 
     */
    public static fromJson(json: Object): Article {
        return new Article(
            json['code'],
            json['reference'],
            json['title'],
            json['description'],
            json['unitprice'],
            Brand.fromJson(json['brand']),
            ArticleSubCategory.fromJson(json['subcategory']),
            json['picture'],
            json['gender']
        );
    }

    /**
     * Create new instance of Article
     * @param code 
     * @param reference 
     * @param title 
     * @param description 
     * @param unitprice 
     * @param brand 
     * @param subcategory 
     * @param picture 
     * @param gender 
     */
    constructor(
        public code: number,
        public reference: string,
        public title: string,
        public description: string,
        public unitprice: number,
        public brand: Brand,
        public subcategory: ArticleSubCategory,
        public picture: string,
        public gender: string,
    ) { }
}