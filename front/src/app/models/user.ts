export class User {

    /**
     * Create User from json
     * @param json 
     */
    public static fromJson(json: Object): User {
        return new User(
            json['firstname'],
            json['lastname'],
            json['email'],
            json['phone'],
            json['streetno'],
            json['streetname'],
            json['city'],
            json['postalcode'],
            json['country'],
            json['role'],
            json['gender']
        );
    }

    /**
     * Create new instance of User
     * @param firstname 
     * @param lastname 
     * @param email 
     * @param phone 
     * @param streetno 
     * @param streetname 
     * @param city 
     * @param postalcode 
     * @param country 
     * @param role 
     */
    constructor(
        public firstname: string,
        public lastname: string,
        public email: string,
        public phone: string,
        public streetno: string,
        public streetname: string,
        public city: string,
        public postalcode: string,
        public country: string,
        public role: string,
        public gender: string
    ) { }
}