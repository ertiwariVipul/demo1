<?php

use Illuminate\Support\Facades\Route;

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

Route::get('clear-route', function () {
	// \Artisan::call("cache:config");
	\Artisan::call("cache:clear");
	\Artisan::call("route:clear");
	\Artisan::call("config:clear");
	\Artisan::call("config:cache");
	\Artisan::call("optimize:clear");
});

/* FRONTED ROUNTES */

Route::group(['namespace' => 'Front'], function () {

    Route::get('/', 'HomeController@index')->name('front');
    // Route::get('atmosphere-girls', 'HomeController@atmosphereGirls')->name('atmosphere-girls');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::get('modelList', 'HomeController@modelList')->name('modelList');
    Route::get('modelProfile/{id?}', 'HomeController@modelProfile')->name('modelProfile');
    Route::get('rates', 'HomeController@rates')->name('rates');

	// atmosphereGirls route 
	Route::group(['prefix'=>'atmosphere-girls'],function(){
		Route::get('/', 'AtmoSphereGirlsController@index')->name('atmosphere-girls');
		Route::get('/model-category','AtmoSphereGirlsController@modelByCategory')->name('front.atmosphereGirls.modelByCategory');	
		Route::get('/model-country','AtmoSphereGirlsController@modelByCountry')->name('front.atmosphereGirls.modelByCountry');	
		Route::get('/model-age','AtmoSphereGirlsController@modelByAge')->name('front.atmosphereGirls.modelByAge');	
	});

	Route::group(['prefix'=>'model'],function(){
		Route::get('/', 'ModelController@index')->name('front.model');
		Route::post('add', 'ModelController@store')->name('front.model.add');
		Route::post('/user-event', 'ModelController@userEvent')->name('front.model.store.modelEvent');
		Route::get('/pdf', 'ModelController@pdfDownload')->name('front.model.pdf');
	});
});

/* END FRONTED ROUNTES */

/* ADMIN ROUNTES */
 Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'AuthController@login')->name('login');
    Route::post('login', 'AuthController@doLogin')->name('admin.login');
    Route::get('forget-password', 'AuthController@forgetPassword')->name('admin.forget_password');

    Route::group(['middleware' => ['auth','adminAuth']], function () {
        Route::get('/', 'DashboardController@index')->name('admin.index');
        Route::get('dashboard', 'DashboardController@index')->name('admin.dahsboard');
		Route::post('/edit-profile','DashboardController@update')->name('admin.profileEdit');
        Route::get('recent-events', 'DashboardController@recentEventList')->name('admin.recentEventList');
        Route::get('user-list', 'DashboardController@dashboardUserList')->name('admin.dashboardUserList');
        Route::get('logout', 'AuthController@logout')->name('admin.logout');

        //Model route
		Route::group(['prefix' => 'model'], function () {
			Route::get('/','ModelController@index')->name('admin.model');
			Route::get('/list','ModelController@list')->name('admin.model.list');
			Route::post('/store','ModelController@store')->name('admin.model.store');
			Route::get('/create','ModelController@create')->name('admin.model.create');
			Route::get('/edit','ModelController@edit')->name('admin.model.edit');
			Route::post('/update','ModelController@update')->name('admin.model.update');
			Route::post('/delete-image','ModelController@deleteImage')->name('admin.model.remove.image');
			Route::post('/delete','ModelController@destroy')->name('admin.model.delete');
			Route::get('/detail/{id}','ModelController@edit')->name('admin.model.detail');
			Route::post('/status','ModelController@changeStatus')->name('admin.model.status');
		});

        // Events route
            Route::group(['prefix' => 'event'], function () {
			Route::get('/','EventsController@index')->name('admin.event');
			Route::post('/store','EventsController@store')->name('admin.event.store');
		    Route::get('/event-details/{id}','EventsController@eventDetails')->name('admin.event.eventDetails');
		    Route::get('/model-event-category','EventsController@modelEventCategory')->name('admin.event.modelEventCategory');
			Route::get('/list','EventsController@list')->name('admin.event.list');
			Route::get('/edit/{id}','EventsController@edit')->name('admin.event.edit');
			Route::delete('/delete/{id}','EventsController@destroy')->name('admin.event.destroy');
			Route::post('/status','EventsController@changeStatus')->name('admin.event.status');		
			// Route::get('/model-category/{id}','EventsController@modelByCategory')->name('admin.event.modelByCategory');	
			Route::get('/model-category','EventsController@modelByCategory')->name('admin.event.modelByCategory');	
			Route::get('/model-age','EventsController@modelByAge')->name('admin.event.modelByAge');	
		});
        // Users route
            Route::group(['prefix' => 'user'], function () {
			Route::get('/','UserController@index')->name('admin.user');
			Route::get('/user','UserController@userList')->name('admin.userList');	
			Route::get('/edit','UserController@edit')->name('admin.user.edit');	
			Route::post('/update','UserController@update')->name('admin.user.update');	
			Route::post('/delete','UserController@destroy')->name('admin.user.delete');
		});

        // setting route
        Route::group(['prefix' => 'setting'], function () {

			// profile level route
			Route::group(['prefix' => 'profilelevel'], function () {
				Route::get('/','ProfileLevelController@index')->name('admin.profilelevel');
				Route::get('/profile-level','ProfileLevelController@profileLevelList')->name('admin.profileLevelList');
				Route::post('/add-profile-level','ProfileLevelController@addProfile')->name('admin.profile.add');
				Route::post('/edit-profile-level','ProfileLevelController@editProfile')->name('admin.profile.edit');
				Route::post('/update-profile-level','ProfileLevelController@updateProfile')->name('admin.profile.update');
				Route::post('/delete-profile-level','ProfileLevelController@deleteProfile')->name('admin.profile.delete');
			});
			
			// category route 
			Route::group(['prefix' => 'category'], function () {
				Route::get('/','CategoryController@index')->name('admin.setting.category');
				Route::post('/store','CategoryController@store')->name('admin.setting.category.store');
				Route::post('/status','CategoryController@status')->name('admin.setting.category.status');
				Route::get('/edit','CategoryController@edit')->name('admin.setting.category.edit');
				Route::post('/update','CategoryController@update')->name('admin.setting.category.update');
				Route::post('/delete','CategoryController@delete')->name('admin.setting.category.delete');
			});
		});
    });
});
 
/* END ADMIN ROUNTES */


// USER ROUTE START
Route::group(['namespace' => 'User'], function () {

	Route::get('register', 'AuthController@register')->name('user.register');
	Route::post('signup', 'AuthController@storeuser')->name('user.signup');
	Route::get('login', 'AuthController@login')->name('user.login');
	Route::post('user-login', 'AuthController@userlogin')->name('user.userlogin');
	
	Route::group(['prefix'=>'user'],function(){
		Route::group(['middleware' => 'userAuth'], function () {

			Route::get('/','UserDashboardController@index')->name('user.index');
			Route::post('/edit-profile','UserDashboardController@update')->name('user.profileEdit');
			Route::get('/logout','AuthController@logout')->name('user.logout');

			// user events route 
			Route::group(['prefix' => 'event'], function () {
				Route::get('/','EventsController@index')->name('user.event');
				Route::post('/store','EventsController@store')->name('user.event.store');
				// Route::get('/model-category/{id}','EventsController@modelByCategory')->name('user.event.modelByCategory');			
				Route::get('/model-category','EventsController@modelByCategory')->name('user.event.modelByCategory');			
				Route::get('/model-age','EventsController@modelByAge')->name('user.event.modelByAge');			
				Route::get('/list','EventsController@list')->name('user.event.list');
				Route::get('/edit/{id}','EventsController@edit')->name('user.event.edit');
				Route::delete('/delete/{id}','EventsController@destroy')->name('user.event.destroy');
			});

			// setting route 
			Route::group(['prefix'=>'setting'],function(){

				// category route 
				Route::group(['prefix'=>'category'],function(){
					Route::get('/','CategoryController@index')->name('user.setting.category');
					Route::post('/store','CategoryController@store')->name('user.setting.category.store');
					Route::get('/edit','CategoryController@edit')->name('user.setting.category.edit');
					Route::post('/status','CategoryController@status')->name('user.setting.category.status');
					Route::post('/update','CategoryController@update')->name('user.setting.category.update');
					Route::post('/delete','CategoryController@delete')->name('user.setting.category.delete');
				});
			});

		});
	});
	// USER ROUTE END 
});