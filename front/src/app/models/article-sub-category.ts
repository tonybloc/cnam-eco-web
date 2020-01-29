import { ArticleCategory } from "./article-category";

export class ArticleSubCategory {

    /**
     * Create ArticleSubCategory from json
     * @param json 
     */
    public static fromJson(json: Object): ArticleSubCategory {
        return new ArticleSubCategory(
            json['code'],
            json['name'],
            ArticleCategory.fromJson(json['parentgroupcode']),
        );
    }

    /**
     * Create new instance of ArticleSubCategory
     * @param code 
     * @param name 
     * @param parentgroupcode 
     */
    constructor(
        public code: number,
        public name: string,
        public parentgroupcode: ArticleCategory
    ) { }
}