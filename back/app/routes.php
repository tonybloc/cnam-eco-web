<?php

/* Customer Routes */

$app->post  ('/api/auth/signup',    'AccountController:SignUp');
$app->post  ('/api/auth/signin',    'AccountController:SignIn');
$app->post  ('/api/auth/signout',   'AccountController:SignOut');
$app->put   ('/api/auth/update',    'AccountController:UpdateUser');
$app->delete('/api/auth/delete',    'AccountController:DeleteUser');
$app->get   ('/api/user/info',      'AccountController:GetUserInformation');

/* Product Routes */

$app->get   ('/api/products',                            'ProductController:GetProducts');
$app->get   ('/api/products/details/{reference}',        'ProductController:GetProductDetails');
$app->delete('/api/admin/products/delete/{reference}',   'ProductController:DeleteProductById');
$app->put   ('/api/admin/products/update/{reference}',   'ProductController:UpdateProductById');

/* Categories Routes */
$app->get   ('/api/categories',         'CategoryController:GetCategories');
$app->get   ('/api/subcategories',      'CategoryController:GetSubCategories');

/* Brands Routes */

$app->get   ('/api/brands',     'BrandController:GetBrands');

?>