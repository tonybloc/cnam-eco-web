export class ArticleFilter {

    // filters attributes
    public Name: string;
    public MinPrice: number;
    public MaxPrice: number;
    public Brand : string;
    public Genre : string;

    // Create new instance of article filter
    constructor() {
        this.Name = "";
        this.MinPrice = null;
        this.MaxPrice = null;
        this.Brand = "";
        this.Genre = "";
    }
}
