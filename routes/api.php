<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::group([    
    'prefix' => 'dept',     
], function () {        
    Route::get('/', 'DepartmentController@index');
    Route::post('/', 'DepartmentController@store');
    Route::get('/{deptID}', 'DepartmentController@show');    
    Route::delete('/{deptID}', 'DepartmentController@destroy');
    Route::get('/supervisors/{deptID}', 'DepartmentController@getDepartmentSupervisors');
    Route::get('/coordinators/{deptID}', 'DepartmentController@getDepartmentCoordinators');
    Route::get('/panelists/{deptID}', 'DepartmentController@getDepartmentPanelists');
});

Route::group([    
    'prefix' => 'course',     
], function () {        
    Route::get('/', 'CourseController@index');
    Route::post('/', 'CourseController@store');
    Route::get('/{courseID}', 'CourseController@show');    
    Route::delete('/{courseID}', 'CourseController@destroy');
    Route::get('/coordinator/{courseID}', 'CourseController@getCourseCoordinator');
    Route::get('/groups/{courseID}', 'CourseController@getCourseGroups');
    Route::get('/students/{courseID}', 'CourseController@getCourseStudents'); 
});

Route::group([    
    'prefix' => 'group',     
], function () {        
    Route::get('/', 'GroupController@index');
    Route::post('/', 'GroupController@store');
    Route::get('/{groupID}', 'GroupController@show');    
    Route::delete('/{groupID}', 'GroupController@destroy');
    Route::get('/course/{groupID}', 'GroupController@getCourseCourse');
    Route::get('/project/{groupID}', 'GroupController@getGroupProject');
    Route::get('/students/{groupID}', 'GroupController@getGroupStudents'); 
});