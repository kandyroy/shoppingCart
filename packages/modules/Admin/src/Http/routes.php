<?php
      Route::get('admin/login','Modules\Admin\Http\Controllers\AuthController@index');
      Route::get('admin/forgot-password','Modules\Admin\Http\Controllers\AuthController@forgetPassword');
      Route::post('password/email','Modules\Admin\Http\Controllers\AuthController@sendResetPasswordLink');
      Route::get('admin/password/reset','Modules\Admin\Http\Controllers\AuthController@resetPassword');  
      Route::get('logout','Modules\Admin\Http\Controllers\AuthController@logout');  
      Route::get('admin/signUp','Modules\Admin\Http\Controllers\AuthController@signUp');  
         
      Route::post('admin/login',function(App\Admin $user){
       
        $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')]; 
        
       // $credentials = ['email' => 'kundan@gmail.com', 'password' => 123456]; 
        $auth = auth()->guard('admin');
        

            if ($auth->attempt($credentials)) {
                return Redirect::to('admin');
            }else{ 
               //return Redirect::to('admin/login')->withError(['message'=>'Invalid Credential!']);
                return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['message'=>'Invalid email or password. Try again!']);
                } 
        }); 
      
    Route::group(['middleware' => ['admin']], function () { 

        Route::get('admin', 'Modules\Admin\Http\Controllers\AdminController@index');
        
        /*------------User Model and controller---------*/

        Route::bind('user', function($value, $route) {
            return Modules\Admin\Models\User::find($value);
        });

        Route::resource('admin/user', 'Modules\Admin\Http\Controllers\UsersController', [
            'names' => [
                'edit' => 'user.edit',
                'show' => 'user.show',
                'destroy' => 'user.destroy',
                'update' => 'user.update',
                'store' => 'user.store',
                'index' => 'user',
                'create' => 'user.create',
            ]
                ]
        );
        /*---------End---------*/   
  
        /*------------User Category and controller---------*/

            Route::bind('category', function($value, $route) {
                return Modules\Admin\Models\Category::find($value);
            });
     
            Route::resource('admin/category', 'Modules\Admin\Http\Controllers\CategoryController', [
                'names' => [
                    'edit' => 'category.edit',
                    'show' => 'category.show',
                    'destroy' => 'category.destroy',
                    'update' => 'category.update',
                    'store' => 'category.store',
                    'index' => 'category',
                    'create' => 'category.create',
                ]
                    ]
            );
        /*---------End---------*/   


        /*------------User Category and controller---------*/

            Route::bind('sub-category', function($value, $route) {
                return Modules\Admin\Models\SubCategory::find($value);
            });
     
            Route::resource('admin/sub-category', 'Modules\Admin\Http\Controllers\SubCategoryController', [
                'names' => [
                    'edit' => 'sub-category.edit',
                    'show' => 'sub-category.show',
                    'destroy' => 'sub-category.destroy',
                    'update' => 'sub-category.update',
                    'store' => 'sub-category.store',
                    'index' => 'sub-category',
                    'create' => 'sub-category.create',
                ]
                    ]
            );
        /*---------End---------*/  




         /*------------User Category and controller---------*/

        Route::bind('product', function($value, $route) {
            return Modules\Admin\Models\Product::find($value);
        });
 
        Route::resource('admin/product', 'Modules\Admin\Http\Controllers\ProductController', [
            'names' => [
                'edit' => 'product.edit',
                'show' => 'product.show',
                'destroy' => 'product.destroy',
                'update' => 'product.update',
                'store' => 'product.store',
                'index' => 'product',
                'create' => 'product.create',
            ]
                ]
        );
        /*---------End---------*/  

 
  
        Route::match(['get','post'],'admin/profile', 'Modules\Admin\Http\Controllers\AdminController@profile'); 
        
        Route::match(['get','post'],'admin/monthly-report/{name}', 'Modules\Admin\Http\Controllers\MonthlyReportController@corporateUser'); 
        Route::match(['get','post'],'admin/corporate-monthly-report', 'Modules\Admin\Http\Controllers\MonthlyReportController@index'); 
             
  });



 
 
     
 
  