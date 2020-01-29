import { Article } from "./article";

export class Watch {

   /**
     * Create Article from json
     * @param json 
     */
   public static fromJson(json: Object): Watch {
      return new Watch(
         Article.fromJson(json['product']),
         json['description'],
         json['box'],
         json['lugs'],
         json['crown'],
         json['strap'],
         json['hands'],
         json['bezel'],
         json['crystal'],
         json['dial']
      );
   }

   /**
    * Create new instance of watch
    * @param product 
    * @param description 
    * @param box 
    * @param lugs 
    * @param crown 
    * @param strap 
    * @param hands 
    * @param bezel 
    * @param crystal 
    * @param dial 
    */
   constructor(
      public product: Article,
      public description: string,
      public box: string,
      public lugs: string,
      public crown: string,
      public strap: number,
      public hands: string,
      public bezel: number,
      public crystal: string,
      public dial: string,
   ) { }
}