export class ArticleCategory {

    /**
     * Create ArticleSubCategory from json
     * @param json 
     */
    public static fromJson(json: Object): ArticleCategory {
        return new ArticleCategory(
            json['code'],
            json['name']
        );
    }

    /**
     * Create new instance of ArticleCategory
     * @param code 
     * @param name 
     */
    constructor(
        public code: number,
        public name: string
    ) { }
}