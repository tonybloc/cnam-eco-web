// This file can be replaced during build by using the `fileReplacements` array.
// `ng build --prod` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.json`.

export const environment = {
  production: false,
  backendProductRoute : "http://localhost/backend-angular-shop/api/products",
  backendProductDetailsRoute : "http://localhost/backend-angular-shop/api/products/details",
  backendSigninRoute : "http://localhost/backend-angular-shop/api/auth/signin",
  backendSignupRoute : "http://localhost/backend-angular-shop/api/auth/signup",
  backendSignoutRoute : "http://localhost/backend-angular-shop/api/auth/signout",
  backendUserUpdateRoute: "http://localhost/backend-angular-shop/api/auth/update",
  backendUserDeleteRoute: "http://localhost/backend-angular-shop/api/auth/delete",
  backendCategoriesRoute: "http://localhost/backend-angular-shop/api/categories",
  backendSubCategoriesRoute: "http://localhost/backend-angular-shop/api/subcategories",
  backendBrandRoute: "http://localhost/backend-angular-shop/api/brands",
  backendUserInfo: "http://localhost/backend-angular-shop/api/user/info"
};

/*
 * For easier debugging in development mode, you can import the following file
 * to ignore zone related error stack frames such as `zone.run`, `zoneDelegate.invokeTask`.
 *
 * This import should be commented out in production mode because it will have a negative impact
 * on performance if an error is thrown.
 */
// import 'zone.js/dist/zone-error';  // Included with Angular CLI.
