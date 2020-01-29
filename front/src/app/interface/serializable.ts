
/**
 * Make objet serializable to json
 */
export interface Serializable<T> {
    
    /**
     * Serialize an object to json
     * @param value object to transform into json
     */
    serializeToJson(value: T): string;

    /**
     * Deserialize json to object
     * @param value json to transform into object
     */
    fromJson(value: string): T;
}
