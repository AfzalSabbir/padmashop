<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\HomeProductController@index')->name('index');
Route::get('/product/{slug}', 'Frontend\ProductController@index')->name('product.view');
Route::post('/increment_hit_count', 'Frontend\ProductController@incrementHitCount');
Route::get('/shop', 'Frontend\ShopController@index')->name('shop');
Route::get('/bagerhat_bazar', 'Frontend\ShopController@bagerhat_bazar')->name('bagerhat_bazar');
Route::get('/product', 'Frontend\ProductController@index')->name('product');
Route::post('/review/add', 'Frontend\ReviewController@store')->name('review.store');


Route::get('/privacy_policy', 'Frontend\PolicyController@index')->name('privacy_policy');
Route::get('/shipping', 'Frontend\PolicyController@shipping')->name('shipping');
Route::get('/payment', 'Frontend\PolicyController@payment')->name('payment');
Route::get('/sitemape', 'Frontend\PolicyController@site_mape')->name('sitemape');

Route::get('/cart', 'Frontend\CartController@index')->name('cart');

Route::get('/flash', 'Backend\NotificationController@flash')->name('flash');

Route::get('/checkout', 'Frontend\CheckoutController@index')->name('checkout');
Route::post('/search-product', 'Frontend\HomeProductController@search');
Route::get('/contact', 'Frontend\ContactController@index')->name('contact');
Route::post('/contactSave', 'Frontend\ContactController@store');

//Frontend User
Route::get('/user/{username}', 'Frontend\UserController@index')->name('user.index');
Route::get('/user/verify/{token}', 'Auth\RegisterController@user_verify')->name('user_verify');
Route::get('/product/rating/{rate_value}/{product_id}', 'Frontend\ProductController@rating')->name('user_verify');
Route::get('/product/rating_/{rating_value}', 'Frontend\ShopController@ratingProduct');

//Route for get otp code
Route::post('/log-otp', 'Auth\LoginOPTController@GetOtp');
Route::post('/login-otp', 'Auth\LoginOPTController@login');


// Ajax
Route::get('/all/categories', 'Frontend\AjaxController@categories')->name('all_category');
Route::get('/push/notification', 'Frontend\AjaxController@pushNotification');


/**
 * Errors
 */
Route::get('/errors/401', function(){ return view('errors/401'); })->name('errors.401');
Route::get('/errors/404', function(){ return view('errors/404'); })->name('errors.404');


/**
 * Cart routes
 */
Route::post('/add-to-cart', 'Frontend\CartController@addToCart');
Route::post('/add-to-cart-form-wishlist', 'Frontend\CartController@addToCartFromWishlist');
Route::get('/get-cart', 'Frontend\CartController@getCart');
Route::get('/cart-image/{product_id}', 'Frontend\CartController@getCartImage');
Route::post('/delete-from-cart', 'Frontend\CartController@deleteFromCart');
Route::post('/update_cart_qty', 'Frontend\CartController@updateCart');
Route::post('/update-color', 'Frontend\CartController@updateColor');
Route::post('/update-size', 'Frontend\CartController@updateSize');
Route::get('get_color_name/{product_id}', 'Frontend\CartController@getColor');


/**
 * Checkout routes
 */
Route::get('/checkout', 'Frontend\CheckoutController@index')->name('checkout');
Route::get('/order/{id}', 'Frontend\CheckoutController@order_detail')->name('order.detail');
Route::post('/checkout/{id}', 'Frontend\CheckoutController@update')->name('checkout.update');
Route::post('/checkout/with/payment', 'Frontend\CheckoutController@CheckoutWithPayment')->name('checkout.with.payment');
Route::get('/order/detail/{id}', 'Frontend\CheckoutController@detail')->name('checkout.detail');
Route::post('/get-all-upazillas', 'Frontend\CheckoutController@getUpazilla');
Route::post('/get-shipping_cost', 'Frontend\CheckoutController@getShippingCost');
Route::post('/get-coupon', 'Frontend\CheckoutController@getCoupon');

Route::get('/cart/item/varification', 'Frontend\CheckoutController@order_detail_varification')->name('cart.item.varification');

/**
 * WishList routes
 */
Route::post('/add-to-wish-list', 'Frontend\WishListController@addToWishList');
Route::get('/get-wish-list', 'Frontend\WishListController@index');
Route::get('/check-wished/{id}', 'Frontend\WishListController@checkWished');
Route::post('/delete-wish-list', 'Frontend\WishListController@deleteWishList');
/**
 *get-distributor
**/
Route::get('/get-distributor/{d_code?}', 'Frontend\DistributorController@index');
/**
 * Advertisement routes
*/
Route::get('/get-advertisement', 'Frontend\HomeProductController@getRealTimeAdvertise');

/**
 * User routes
*/
Route::group(["prefix"=>"user"], function(){
	Route::post('/check-mobile', 'Frontend\UserController@checkMobile');
	Route::post('/update-profile', 'Frontend\UserController@updateProfile');
	Route::post('/password-change', 'Frontend\UserController@passwordChange');
	Route::get('/get-my-order/{id}', 'Frontend\UserController@getMyOrder');
	Route::post('/change-image', 'Frontend\UserController@changeImage');
	/*
	* User all items from orders
	*/
	Route::get('/order/items/{order_id?}', 'Frontend\OrderController@index');
	Route::get('/order/items/return/{item_id?}', 'Frontend\OrderController@returnItem');
});


Route::post('/user/change-image', 'Frontend\UserController@changeImage');

Auth::routes();
Route::post('/user/register', 'Auth\RegisterController@store')->name('user_register');
Route::get('/get-upazilla/{district_id}', 'Auth\RegisterController@getUpazilla')->name('getUpazilla');
Route::get('/get_d_code_username/{d_code}', 'Auth\RegisterController@getDCodeUsername')->name('getDCodeUsername');

/**
 * Redirect after authentication of user
 */
Route::get('/home', 'Frontend\HomeController@index')->name('home');



/**
 * Redirect after authentication of user
 */
Route::post('/user/reset/code','Auth\UserPasswordReset@resetCode')->name('password.reset.code');
Route::get('/user/reset/code','Auth\UserPasswordReset@showVerificationform')->name('password.reset.code.verification');
Route::post('/user/reset/confirmation','Auth\UserPasswordReset@confirmation')->name('password.reset.code.confirmation');
Route::post('/user/reset/change','Auth\UserPasswordReset@change')->name('password.reset.code.change');

/**
 * Admin Section Routes
 */
Route::get('/dashboard', 'Backend\HomeController@index');
Route::group(['prefix' => 'admin-ctp'], function(){

	Route::get('getSubCategory/{id?}', 'Backend\AjaxController@getSubCategory')->name("admin.getSubCategory");

	/**
	 * Admin routes
	*/
	Route::group(['prefix' => 'myAdmin'], function(){
		Route::get('/', 'Backend\AdminController@index')->name('admin.myadmin.index');
		Route::get('/add', 'Backend\AdminController@create')->name('admin.myadmin.add');
		Route::post('/add', 'Backend\AdminController@store')->name('admin.myadmin.store');
		Route::get('/edit/{id}', 'Backend\AdminController@edit')->name('admin.myadmin.edit');
		Route::post('/edit/{slug}', 'Backend\AdminController@update')->name('admin.myadmin.update');
		Route::get('/delete/{slug}', 'Backend\AdminController@delete')->name('admin.myadmin.delete');
	});


	/**
	 * Setting routes
	*/
	Route::group(['prefix' => 'setting'], function(){
		Route::get('/', 'Backend\SettingController@index')->name('admin.setting.index');
		Route::post('/', 'Backend\SettingController@store')->name('admin.setting.store');
	});


    /**
     * Language
    **/
    Route::get('/language/bn-en', 'Backend\LanguageController@language')->name('admin.language.bn_en');
    // Route::post('/language/bn-en', 'Backend\LanguageController@insert')->name('admin.language.insert');
    // Route::post('/language/create', 'Backend\LanguageController@create')->name('admin.language.create');
    
    

    /**
     * Language
    **/
    Route::get('/language', 'Backend\LanguageController@language')->name('admin.language.index');
    Route::post('/language/insert', 'Backend\LanguageController@insert')->name('admin.language.insert');
    Route::post('/language/create', 'Backend\LanguageController@create')->name('admin.language.create');


    /**
     * Root
    **/
    Route::get('/root', 'Backend\RootController@index')->name('admin.root.index');
    Route::post('/root/create', 'Backend\RootController@create')->name('admin.root.create');


	/**
	 * Admin authentication routes
	*/
	Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');
	Route::post('password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/reset','Auth\Admin\ResetPasswordController@reset');
	Route::get('password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::get('/change-password', 'Backend\HomeController@chnagePasswordForm')->name('admin.password.form');
	Route::post('/change-password', 'Backend\HomeController@chnagePassword')->name('admin.password.change');


	/**
	 * Admin Dashboard
	*/
	Route::get('/', 'Backend\HomeController@index')->name('admin.home');
	Route::get('/chart', 'Backend\HomeController@chart')->name('admin.chart');
	Route::get('/form', 'Backend\HomeController@form')->name('admin.form');
	Route::get('/table', 'Backend\HomeController@table')->name('admin.table');
	Route::get('/message', 'Backend\HomeController@message')->name('admin.message');
	Route::get('/message/delete/{id}', 'Backend\HomeController@messageDelete')->name('admin.messageDelete');


	/**
	 * Menu routes
	*/
	Route::group(['prefix' => 'menu'], function(){
		Route::get('/', 'Backend\MenuController@index')->name('admin.menu.index');
		Route::get('/add', 'Backend\MenuController@create')->name('admin.menu.create');
		Route::post('/add', 'Backend\MenuController@store')->name('admin.menu.store');
		Route::get('/edit/{id}', 'Backend\MenuController@edit')->name('admin.menu.edit');
		Route::post('/edit/{id}', 'Backend\MenuController@update')->name('admin.menu.update');
		Route::get('/delete/{id}', 'Backend\MenuController@delete')->name('admin.menu.delete');

		Route::get('/sort', 'Backend\MenuController@sort')->name('admin.menu.sort');
		Route::post('/sort', 'Backend\MenuController@sort_update')->name('admin.menu.sort_update');
	});


	/**
	 * Role routes
	*/
	Route::group(['prefix' => 'role'], function(){
		Route::get('/', 'Backend\RoleController@index')->name('admin.role.index');
		Route::get('/assign/{role}', 'Backend\RoleController@create')->name('admin.role.assign');
		Route::post('/assign', 'Backend\RoleController@store')->name('admin.role.store');
	});


	/**
	* Cost
	**/
	Route::group(['prefix' => 'cost'], function(){
		Route::get('/', 'Backend\CostController@index')->name('admin.cost.index');
		Route::post('/', 'Backend\CostController@index')->name('admin.cost.searchCost');
		Route::get('/add', 'Backend\CostController@add')->name('admin.cost.add');
		Route::post('/add', 'Backend\CostController@store')->name('admin.cost.store');
		Route::get('/edit/{id}', 'Backend\CostController@edit')->name('admin.cost.edit');
		Route::post('/edit/{id}', 'Backend\CostController@update')->name('admin.cost.update');
		Route::get('/delete/{id}', 'Backend\CostController@delete')->name('admin.cost.delete');
		Route::get('/yearly_report', 'Backend\CostController@yearlyReport')->name('admin.cost.yearly_report');
		Route::post('/yearly_report', 'Backend\CostController@yearlyReport')->name('admin.cost.yearly_report_search');
	});


    /**
    * Cost_field
    **/
    Route::group(['prefix' => 'cost_field'], function(){
    	Route::get('/', 'Backend\Cost_fieldController@index')->name('admin.cost_field.index');
    	Route::post('/add', 'Backend\Cost_fieldController@store')->name('admin.cost_field.store');
    	Route::post('/edit/{id}', 'Backend\Cost_fieldController@update')->name('admin.cost_field.update');
    	Route::get('/delete/{id}', 'Backend\Cost_fieldController@delete')->name('admin.cost_field.delete');
    });


	/**
	 * Color routes
	*/
	Route::group(['prefix' => 'color'], function(){
		Route::get('/', 'Backend\ColorController@index')->name('admin.color.index');
		Route::get('/view/{id}', 'Backend\ColorController@show')->name('admin.color.show');
		Route::post('/add', 'Backend\ColorController@store')->name('admin.color.store');
		Route::post('/edit/{id}', 'Backend\ColorController@update')->name('admin.color.update');
		Route::get('/delete/{id}', 'Backend\ColorController@delete')->name('admin.color.delete');
	});


	/**
	 * Unit routes
	*/
	Route::group(['prefix' => 'unit'], function(){
		Route::get('/', 'Backend\UnitController@index')->name('admin.unit.index');
		Route::get('/view/{id}', 'Backend\UnitController@show')->name('admin.unit.show');
		Route::post('/add', 'Backend\UnitController@store')->name('admin.unit.store');
		Route::post('/edit/{id}', 'Backend\UnitController@update')->name('admin.unit.update');
		Route::get('/delete/{id}', 'Backend\UnitController@delete')->name('admin.unit.delete');
	});


	/**
	 * Payment Getway routes
	*/
	Route::group(['prefix' => 'payment-getway'], function(){
		Route::get('/', 'Backend\PaymentGetwayController@index')->name('admin.paymentgetway.index');
		Route::get('/view/{id}', 'Backend\PaymentGetwayController@show')->name('admin.paymentgetway.show');
		Route::post('/add', 'Backend\PaymentGetwayController@store')->name('admin.paymentgetway.add');
		Route::post('/edit/{id}', 'Backend\PaymentGetwayController@update')->name('admin.paymentgetway.update');
		Route::get('/delete/{id}', 'Backend\PaymentGetwayController@delete')->name('admin.paymentgetway.delete');
	});

	
	/**
	 * Size routes
	*/
	Route::group(['prefix' => 'size'], function(){
		Route::get('/', 'Backend\SizeController@index')->name('admin.size.index');
		Route::get('/view/{id}', 'Backend\SizeController@show')->name('admin.size.show');
		Route::post('/add', 'Backend\SizeController@store')->name('admin.size.store');
		Route::post('/edit/{id}', 'Backend\SizeController@update')->name('admin.size.update');
		Route::get('/delete/{id}', 'Backend\SizeController@delete')->name('admin.size.delete');
	});


	/**
	 * PaymentMethod routes
	*/
	Route::group(['prefix' => 'payment_method'], function(){
		Route::get('/', 'Backend\PaymentMethodController@index')->name('admin.payment_method.index');
		Route::get('/view/{id}', 'Backend\PaymentMethodController@show')->name('admin.payment_method.show');
		Route::post('/add', 'Backend\PaymentMethodController@store')->name('admin.payment_method.store');
		Route::post('/edit/{id}', 'Backend\PaymentMethodController@update')->name('admin.payment_method.update');
		Route::get('/delete/{id}', 'Backend\PaymentMethodController@delete')->name('admin.payment_method.delete');
	});

	
	/**
	 * Coupon routes
	*/
	Route::group(['prefix' => 'coupon'], function(){
		Route::get('/', 'Backend\CouponController@index')->name('admin.coupon.index');
		Route::get('/view/{id}', 'Backend\CouponController@show')->name('admin.coupon.show');
		Route::post('/add', 'Backend\CouponController@store')->name('admin.coupon.store');
		Route::post('/edit/{id}', 'Backend\CouponController@update')->name('admin.coupon.update');
		Route::get('/delete/{id}', 'Backend\CouponController@delete')->name('admin.coupon.delete');
	});


	// Admin Access Information
	Route::get('/log', 'Backend\AdminAccessInfoController@index')->name('admin.log.index');



	/**
	 * Category routes
	*/
	Route::group(['prefix' => 'category'], function(){
		Route::get('/', 'Backend\CategoryController@index')->name('admin.category.index');
		Route::get('/add', 'Backend\CategoryController@create')->name('admin.category.create');
		Route::post('/add', 'Backend\CategoryController@store')->name('admin.category.store');
		Route::get('/edit/{slug}', 'Backend\CategoryController@edit')->name('admin.category.edit');
		Route::post('/edit/{slug}', 'Backend\CategoryController@update')->name('admin.category.update');
		Route::get('/edit-position/{string?}', 'Backend\CategoryController@editPosition')->name('admin.category.editPosition');
		Route::get('/delete/{slug}', 'Backend\CategoryController@delete')->name('admin.category.delete');
		Route::get('/recovery', 'Backend\CategoryController@recovery')->name('admin.category.recovery');
		Route::get('/recover/{id}', 'Backend\CategoryController@recover')->name('admin.category.recover');
	});


    /**
     * SubCategory Routes
     */
    Route::group(['prefix'=>'subcategory'], function () {
    	Route::get('/', 'Backend\SubcategoryController@index')->name('admin.subcategory.index');
    	Route::get('/add', 'Backend\SubcategoryController@create')->name('admin.subcategory.create');
    	Route::post('/add', 'Backend\SubcategoryController@store')->name('admin.subcategory.store');
    	Route::get('/edit/{slug}', 'Backend\SubcategoryController@edit')->name('admin.subcategory.edit');
    	Route::post('/edit/{slug}', 'Backend\SubcategoryController@update')->name('admin.subcategory.update');
    	Route::get('/delete/{slug}', 'Backend\SubcategoryController@delete')->name('admin.subcategory.delete');
    	Route::get('/recovery', 'Backend\SubcategoryController@recovery')->name('admin.subcategory.recovery');
    	Route::get('/recover/{id}', 'Backend\SubcategoryController@recover')->name('admin.subcategory.recover');
    });


    /**
     * Brand routes
     */
    Route::group(['prefix' => 'brand'], function(){
    	Route::get('/', 'Backend\BrandController@index')->name('admin.brand.index');
    	Route::get('/add', 'Backend\BrandController@create')->name('admin.brand.create');
    	Route::post('/add', 'Backend\BrandController@store')->name('admin.brand.store');
    	Route::get('/edit/{slug}', 'Backend\BrandController@edit')->name('admin.brand.edit');
    	Route::post('/edit/{slug}', 'Backend\BrandController@update')->name('admin.brand.update');
    	Route::get('/delete/{slug}', 'Backend\BrandController@delete')->name('admin.brand.delete');
    	Route::get('/recovery', 'Backend\BrandController@recovery')->name('admin.brand.recovery');
    	Route::get('/recover/{id}', 'Backend\BrandController@recover')->name('admin.brand.recover');
    });


    /**
     * District routes
     */
    Route::group(['prefix' => 'district'], function(){
    	Route::get('/', 'Backend\DistrictController@index')->name('admin.district.index');
    	Route::get('/add', 'Backend\DistrictController@create')->name('admin.district.create');
    	Route::post('/add', 'Backend\DistrictController@store')->name('admin.district.store');
    	Route::get('/edit/{id}', 'Backend\DistrictController@edit')->name('admin.district.edit');
    	Route::post('/edit/{id}', 'Backend\DistrictController@update')->name('admin.district.update');
    	Route::get('/delete/{id}', 'Backend\DistrictController@delete')->name('admin.district.delete');
    });


    /**
     * Upazilla routes
     */
    Route::group(['prefix' => 'upazilla'], function(){
    	Route::get('/', 'Backend\UpazillaController@index')->name('admin.upazilla.index');
    	Route::get('/add', 'Backend\UpazillaController@create')->name('admin.upazilla.create');
    	Route::post('/add', 'Backend\UpazillaController@store')->name('admin.upazilla.store');
    	Route::get('/edit/{id}', 'Backend\UpazillaController@edit')->name('admin.upazilla.edit');
    	Route::post('/edit/{id}', 'Backend\UpazillaController@update')->name('admin.upazilla.update');
    	Route::get('/delete/{id}', 'Backend\UpazillaController@delete')->name('admin.upazilla.delete');
    });


    /**
     * Product routes
     */
    Route::group(['prefix' => 'product'], function(){
    	Route::get('/', 'Backend\ProductController@index')->name('admin.product.index');
    	Route::post('/', 'Backend\ProductController@index')->name('admin.product.index');
    	Route::get('/view/{slug}', 'Backend\ProductController@view')->name('admin.product.view');
    	Route::get('/add', 'Backend\ProductController@create')->name('admin.product.create');
    	Route::post('/add', 'Backend\ProductController@store')->name('admin.product.store');
    	Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('admin.product.edit');
    	Route::post('/edit/{id}', 'Backend\ProductController@update')->name('admin.product.update');
    	Route::get('/delete/{id}', 'Backend\ProductController@delete')->name('admin.product.delete');
    	Route::get('/recovery', 'Backend\ProductController@recovery')->name('admin.product.recovery');
    	Route::get('/recover/{id}', 'Backend\ProductController@recover')->name('admin.product.recover');
    	Route::get('/recovery/delete/{id}', 'Backend\ProductController@permanentDelete')->name('admin.product.recovery.delete');
    });



	/**
	 * PageContent routes
	*/
	Route::group(['prefix' => 'page_content'], function(){
		Route::get('/', 'Backend\PageContentController@index')->name('admin.page_content.index');
		Route::get('/add', 'Backend\PageContentController@create')->name('admin.page_content.add');
		Route::post('/add', 'Backend\PageContentController@store')->name('admin.page_content.store');
		Route::get('/edit/{id}', 'Backend\PageContentController@edit')->name('admin.page_content.edit');
		Route::post('/edit/{id}', 'Backend\PageContentController@update')->name('admin.page_content.update');
		Route::get('/delete/{id}', 'Backend\PageContentController@delete')->name('admin.page_content.delete');
	});



	/**
	 * Advertisement routes
	*/
	Route::group(['prefix' => 'advertisement'], function(){
		Route::get('/', 'Backend\AdvertisementController@index')->name('admin.advertisement.index');
		Route::get('/add', 'Backend\AdvertisementController@create')->name('admin.advertisement.add');
		Route::post('/add', 'Backend\AdvertisementController@store')->name('admin.advertisement.store');
		Route::get('/edit/{id}', 'Backend\AdvertisementController@edit')->name('admin.advertisement.edit');
		Route::post('/edit/{id}', 'Backend\AdvertisementController@update')->name('admin.advertisement.update');
		Route::get('/delete/{id}', 'Backend\AdvertisementController@delete')->name('admin.advertisement.delete');
	});


    /**
     * User routes
     */
    Route::group(['prefix' => 'user'], function(){
    	Route::get('trash/', 'Backend\UserController@trash')->name('admin.user.trash');
    	Route::post('trash/', 'Backend\UserController@trash')->name('admin.user.trash');
    	Route::get('restore/{id}', 'Backend\UserController@restore')->name('admin.user.restore');
    	Route::get('/', 'Backend\UserController@index')->name('admin.user.index');
    	Route::post('/', 'Backend\UserController@index');
    	Route::get('/ban-unban/{id}', 'Backend\UserController@banUnban')->name('admin.user.ban');
    	Route::get('/delete/{id}', 'Backend\UserController@delete')->name('admin.user.delete');
    });

    /**
     * Order routes
     */
    Route::group(['prefix' => 'order'], function(){
    	Route::get('/completed', 'Backend\OrderController@completedOrder')->name('admin.order.completed');
    	Route::post('/completed', 'Backend\OrderController@completedOrder')->name('admin.order.searchCompleted');
    	Route::get('/pending', 'Backend\OrderController@pendingOrder')->name('admin.order.pending');
    	Route::post('/pending', 'Backend\OrderController@pendingOrder')->name('admin.order.searchPending');
    	Route::get('/view/{id}', 'Backend\OrderController@view')->name('admin.order.view');
    	Route::get('/pending-view/{id}', 'Backend\OrderController@pending_view')->name('admin.order.pending-view');
    	Route::get('/completed-view/{id}', 'Backend\OrderController@completed_view')->name('admin.order.completed-view');

    	Route::post('/order-Manager', 'Backend\OrderController@orderManager')->name('admin.order.orderManager');


    	Route::post('/mark-as-pending', 'Backend\OrderController@receivedToPending')->name('admin.order.markAsPending');
    	Route::post('/mark-as-received', 'Backend\OrderController@pendingToReceived')->name('admin.order.markAsReceived');
    	Route::post('/mark-as-processing', 'Backend\OrderController@pendingToProcessing')->name('admin.order.markAsProcessing');
    	Route::post('/on-the-way', 'Backend\OrderController@pendingToOnTheWay')->name('admin.order.onTheWay');
    	Route::post('/mark-as-complete', 'Backend\OrderController@pendingToComplete')->name('admin.order.markAsComplete');
    	Route::post('/received-by-customer', 'Backend\OrderController@receivedByCustomer')->name('admin.order.receivedByCustomer');

    	Route::post('/search', 'Backend\OrderController@searchOrder')->name('admin.order.search');
    });

    Route::prefix('return')->group(function(){
    	Route::get('/items', 'Backend\ReturnItemController@index')->name('admin.return.items');
    	Route::get('/items/view/{id}', 'Backend\ReturnItemController@view')->name('admin.return.items.view');
    });


	/**
    * SMS Routes 
    **/
    Route::group(['prefix' => 'sms'], function(){
        Route::get('/send', 'Backend\SMSController@sendSMS')->name('admin.sms.send');
        Route::post('/send', 'Backend\SMSController@sendSMS')->name('admin.sms.get_user');
        Route::post('/submit-send-sms', 'Backend\SMSController@submitSendSMS')->name('admin.sms.submit_send_sms');
        Route::get('/custom', 'Backend\SMSController@customSMS')->name('admin.sms.custom');
        Route::post('/custom', 'Backend\SMSController@customSMS')->name('admin.sms.submit_custom_sms');
        Route::get('/report', 'Backend\SMSController@smsReport')->name('admin.sms.report');
    });


	/**
	* Slider
	**/
	Route::group(['prefix' => 'slider'], function(){
		Route::get('/', 'Backend\SliderController@index')->name('admin.slider.index');
		Route::post('/add', 'Backend\SliderController@store')->name('admin.slider.store');
		Route::get('/delete/{id}', 'Backend\SliderController@delete')->name('admin.slider.delete');
		Route::get('/approve/{id}', 'Backend\SliderController@approve')->name('admin.slider.approve');
	});

	/**
	* Report
	**/
	Route::group(['prefix' => 'report'], function(){
		Route::get('/', 'Backend\ReportController@index')->name('admin.report.index');
		Route::post('/', 'Backend\ReportController@index')->name('admin.report.index');
	});

	
	/**
	* Review
	**/
	Route::group(['prefix' => 'review'], function(){
		Route::get('/', 'Backend\ReviewController@index')->name('admin.review.index');
		Route::get('/add', 'Backend\ReviewController@add')->name('admin.review.add');
		Route::post('/add', 'Backend\ReviewController@store')->name('admin.review.store');
		Route::get('/view/{id}', 'Backend\ReviewController@view')->name('admin.review.view');
		Route::get('/edit/{id}', 'Backend\ReviewController@edit')->name('admin.review.edit');
		Route::post('/edit/{id}', 'Backend\ReviewController@update')->name('admin.review.update');
		Route::get('/delete/{id}', 'Backend\ReviewController@delete')->name('admin.review.delete');
	});

	/**
	* Distributor
	**/
	Route::group(['prefix' => 'distributor'], function(){
		Route::get('/', 'Backend\DistributorController@index')->name('admin.distributor.index');
		Route::get('/add', 'Backend\DistributorController@add')->name('admin.distributor.add');
		Route::post('/add', 'Backend\DistributorController@store')->name('admin.distributor.store');
		Route::get('/edit/{id}', 'Backend\DistributorController@edit')->name('admin.distributor.edit');
		Route::post('/edit/{id}', 'Backend\DistributorController@update')->name('admin.distributor.update');
		Route::get('/delete/{id}', 'Backend\DistributorController@delete')->name('admin.distributor.delete');

		Route::group(['prefix'=>'payment'], function(){
			Route::get('/', 'Backend\DistributorController@payment')->name('admin.distributor.payment');
			Route::post('/', 'Backend\DistributorController@paymentRecord');
			Route::get('/all', 'Backend\DistributorController@paymentList')->name('admin.distributor.payment.list');
			Route::post('/all', 'Backend\DistributorController@paymentList')->name('admin.distributor.payment.list');
		});
	});


	/**
	* ReferralBalance
	**/
	Route::group(['prefix' => 'referral_balance'], function(){
		Route::get('/', 'Backend\ReferralBalanceController@index')->name('admin.referral_balance.index');
		Route::get('/details/{d_code}', 'Backend\ReferralBalanceController@details')->name('admin.referral_balance.details');
		Route::get('/details/{d_code}/{id}', 'Backend\ReferralBalanceController@details_view')->name('admin.referral_balance.details_view');
	});


	/**
	* DCommission
	**/
	Route::group(['prefix' => 'd_commission'], function(){
		Route::get('/', 'Backend\DCommissionController@index')->name('admin.d_commission.index');
		Route::get('/add', 'Backend\DCommissionController@add')->name('admin.d_commission.add');
		Route::post('/add', 'Backend\DCommissionController@store')->name('admin.d_commission.store');
		Route::get('/edit/{id}', 'Backend\DCommissionController@edit')->name('admin.d_commission.edit');
		Route::post('/edit/{id}', 'Backend\DCommissionController@update')->name('admin.d_commission.update');
		Route::get('/delete/{id}', 'Backend\DCommissionController@delete')->name('admin.d_commission.delete');
	});


	
	/**
	* Subscriber
	**/
	Route::group(['prefix' => 'subscriber'], function(){
		Route::get('/', 'Backend\SubscribeController@index')->name('admin.subscriber.index');
		Route::post('/store', 'Frontend\SubscriberController@subscriber')->name('admin.subscriber.store');
		Route::get('/delete/{id}', 'Backend\SubscribeController@delete')->name('admin.subscriber.delete');
	});


	/**
	* All Policy
	**/
	Route::group(['prefix' => 'policy'], function(){

		Route::match(['GET', 'POST'], '/', 'Backend\PolicyController@index')->name('admin.policy');
		Route::match(['GET', 'POST'], '/update', 'Backend\PolicyController@policy')->name('admin.policy.update');
	});


	/**
	* Notification
	**/
	Route::group(['prefix' => 'notification'], function(){
		Route::match(['GET', 'POST'], '/notification', 'Backend\NotificationController@index')->name('admin.notification.index');
	});


});


Route::get('language/{locale}', function ($lang) {
	Session::put('locale', $lang);
	return redirect()->back();
})->name('language');



