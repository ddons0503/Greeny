<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//system rout
$route['default_controller'] = 'pages';
$route['404_override'] = 'pages/pagenotfound';
$route['translate_uri_dashes'] = FALSE;

//User Side Route
$route['home']='backend/Pages/index';
$route['about-us']='backend/Pages/aboutus';
$route['contact-us']='backend/Pages/contactus';
$route['terms-and-conditions']='backend/Pages/term';
$route['feedback']='backend/Pages/feedback';
$route['privacy-policy']='backend/Pages/privacypolicy';
$route['frequently-asked-question']='backend/Pages/faqs';
$route['sign-in']='backend/Pages/signin';
$route['member-logout']='backend/Pages/memberlogout';
$route['sign-up']='backend/Pages/signup';
$route['forgot-password']='backend/Pages/forgetpassword';
$route['product-list/?(:any)?/?(:any)?']='backend/Pages/productlist/$1/$2';
$route['member-home']='backend/Pages/memberhome';
$route['member-dashboard']='backend/Pages/memberdashboard';
$route['member-setting']='backend/Pages/membersetting';
$route['member-profile']='backend/Pages/memberprofile';
$route['member-address']='backend/Pages/memberaddress';
$route['member-review']='backend/Pages/memberreview';
$route['member-wishlist']='backend/Pages/memberwishlist';
$route['member-order']='backend/Pages/memberorder';
$route['member-order-detail']='backend/Pages/orderinvoice';
$route['member-menu']='backend/Pages/membermenu';
$route['product-details/?(:any)?']='backend/Pages/productdetails/$1';
$route['page-not-found']='backend/Pages/pagenotfound';
$route['member-order-detail/?(:any)?']='backend/Pages/orderinvoice/$1';
$route['check-out']='backend/Pages/checkout';
$route['empty-cart']='backend/Pages/emptycart';
$route['order-confirmation']='backend/Pages/orderconfirmation';
$route['order-success']='backend/Pages/ordersuccess';
$route['order-fail']='backend/Pages/orderfail';
$route['view-cart']='backend/Pages/viewcart';


//Admin Side Route
$route['delete/(:any)/(:any)']='backend/Authorize/delete/$1/$2';
$route['admin-login/?(:any)?']='backend/Authorize/index/$1';
$route['admin-forgot-password'] = 'backend/Authorize/forgot_password';
$route['admin-logout']='backend/Authorize/logout';
$route['admin-home']='backend/Authorize/dashboard';
$route['admin-setting']='backend/Authorize/managesetting';
$route['manage-contact-us']='backend/Authorize/managecontactus';
$route['manage-feedback']='backend/Authorize/managefeedback';
$route['manage-email-subscriber']='backend/Authorize/manageemailsubscribers';
$route['manage-banner']='backend/Authorize/managebanner';
$route['manage-member']='backend/Authorize/managemember';
$route['manage-country']='backend/Authorize/managecountry';
$route['edit-country/(:any)']='backend/Edit/editcountry/$1';
$route['manage-state']='backend/Authorize/managestate';
$route['edit-state/(:any)']='backend/Edit/editstate/$1';
$route['manage-city']='backend/Authorize/managecity';
$route['edit-city/(:any)']='backend/Edit/editcity/$1';
$route['manage-main-category']='backend/Authorize/managemaincategory';
$route['edit-main-category/(:any)']='backend/Edit/editmaincategory/$1';
$route['manage-sub-category']='backend/Authorize/managesubcategory';
$route['edit-sub-category/(:any)']='backend/Edit/editsubcategory/$1';
$route['manage-peta-category']='backend/Authorize/managepetacategory';
$route['edit-peta-category/(:any)']='backend/Edit/editpetacategory/$1';
$route['manage-add-new-product']='backend/Authorize/manageaddnewproduct';
$route['manage-view-all-products']='backend/Authorize/manageviewallproducts';
$route['manage-product-review']='backend/Authorize/manageproductreview';
$route['manage-offer']='backend/Authorize/manageoffer';
$route['manage-coupon']='backend/Authorize/managecoupon';
$route['manage-pending-order']='backend/Authorize/managependingorder';
$route['manage-confirm-order']='backend/Authorize/manageconfirmorder';
$route['manage-cancel-order']='backend/Authorize/managecancelorder';
