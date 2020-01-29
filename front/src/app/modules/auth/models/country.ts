export class Country {
    
    /* Public attributes */
    public Name : string;
    public Code : string;
    public DialCode : string;
    public Flag : string;


    /**
     * Deserialize json to country object 
     * @param json country source - format string
     */
    public static fromJson(json: string) : Country{
        let country = new Country();
        country.Name = json['name'];
        country.Code = json['code'];
        country.DialCode = json['dial_code'];
        country.Flag = json['flag'];
        return country;
    }

    /**
     * Create new instance of country
     */
    constructor(){
        this.Name = "";
        this.Code = "";
        this.DialCode = "";
        this.Flag = "";
    }
}
