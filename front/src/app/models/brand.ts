export class Brand {

    /**
     * Create Brand from json
     * @param json 
     */
    public static fromJson(json: Object): Brand {
        return new Brand(
            json['no'],
            json['name'],
            json['description'],
            json['logo'],
        );
    }

    /**
     * Create new instance of Brand
     * @param no 
     * @param name 
     * @param description 
     * @param logo 
     */
    constructor(
        public no: number,
        public name: string,
        public description: string,
        public logo: string
    ) { }
}