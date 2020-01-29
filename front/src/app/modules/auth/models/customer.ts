export class Customer {
    /**
     * Create new instance of customer
     * @param firstName customer firstname
     * @param lastName customer lastname
     * @param address customer address
     * @param postalCode customer postal code
     * @param city customer city
     * @param country customer country
     * @param phone customer phone
     * @param email customer mail address
     * @param login customer login
     * @param password customer password
     * @param genre customer genre
     */
    constructor( 
        public firstname: string,
        public lastname: string,
        public password: string,
        public email: string,
        public phone: string,
        public streetno: string,
        public streetname: string,
        public city: string,
        public postalcode: string,
        public country: string,
        public gender: string,
) {}
}
