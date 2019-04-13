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
    Route::post('/{deptID}', 'DepartmentController@update');    
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
    Route::post('/{courseID}', 'CourseController@update');   
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
    Route::post('/{groupID}', 'GroupController@update');  
    Route::delete('/{groupID}', 'GroupController@destroy');
    Route::get('/course/{groupID}', 'GroupController@getCourseCourse');
    Route::get('/project/{groupID}', 'GroupController@getGroupProject');
    Route::get('/students/{groupID}', 'GroupController@getGroupStudents'); 
});

Route::group([    
    'prefix' => 'coordinator',      
], function () {        
    Route::get('/', 'CoordinatorController@index');
    Route::post('/', 'CoordinatorController@store');
    Route::get('/{coordinatorID}', 'CoordinatorController@show');
    Route::post('/{coordinatorID}', 'CoordinatorController@update');   
    Route::delete('/{coordinatorID}', 'CoordinatorController@destroy');
    Route::get('/course/{coordinatorID}', 'CoordinatorController@getCourseCoordinated');    
});

Route::group([    
    'prefix' => 'supervisor',     
], function () {        
    Route::get('/', 'SupervisorController@index');
    Route::post('/', 'SupervisorController@store');
    Route::get('/{supervisorID}', 'SupervisorController@show');
    Route::post('/{supervisorID}', 'SupervisorController@update');  
    Route::delete('/{supervisorID}', 'SupervisorController@destroy');
    Route::get('/projects/{supervisorID}', 'SupervisorController@getAllProjects');
    Route::get('/tasks/{supervisorID}', 'SupervisorController@getAllTasks');    
});

Route::group([    
    'prefix' => 'panelist',     
], function () {        
    Route::get('/', 'PanelistController@index');
    Route::post('/', 'PanelistController@store');
    Route::get('/{panelistID}', 'PanelistController@show'); 
    Route::post('/{panelistID}', 'PanelistController@update');   
    Route::delete('/{panelistID}', 'PanelistController@destroy');
    Route::get('/projects/{panelistID}', 'PanelistController@getAllProjects');    
});

Route::group([    
    'prefix' => 'student',     
], function () {        
    Route::get('/', 'StudentController@index');
    Route::post('/', 'StudentController@store');
    Route::get('/{studentNumber}', 'StudentController@show'); 
    Route::post('/{studentNumber}', 'StudentController@update');   
    Route::delete('/{studentNumber}', 'StudentController@destroy');
    Route::get('/course/{studentNumber}', 'StudentController@getStudentCourse');
    Route::get('/group/{studentNumber}', 'StudentController@getStudentGroup');     
});

Route::group([    
    'prefix' => 'task',     
], function () {        
    Route::get('/', 'TaskController@index');
    Route::post('/', 'TaskController@store');
    Route::get('/{taskID}', 'TaskController@show'); 
    Route::post('/{taskID}', 'TaskController@update');   
    Route::delete('/{taskID}', 'TaskController@destroy');
    Route::get('/projects/{taskID}', 'TaskController@getAllProjectswithTasks');
    Route::get('/supervisor/{taskID}', 'TaskController@getTaskAssignee');     
});

Route::group([    
    'prefix' => 'project',     
], function () {        
    Route::get('/', 'ProjectController@index');
    Route::post('/', 'ProjectController@store');
    Route::get('/{projectID}', 'ProjectController@show'); 
    Route::post('/{projectID}', 'ProjectController@update');   
    Route::delete('/{projectID}', 'ProjectController@destroy');
    Route::get('/tasks/{projectID}', 'ProjectController@getProjectTasks');
    Route::get('/panelists/{projectID}', 'ProjectController@getProjectPanelists'); 
    Route::get('/group/{projectID}', 'ProjectController@getProjectGroup');     
    Route::get('/supervisor/{projectID}', 'ProjectController@getProjectSupervisor');         
});

Route::group([    
    'prefix' => 'panel',     
], function () {        
    Route::get('/', 'PanelController@index');
    Route::post('/', 'PanelController@store');
    Route::get('/{id}', 'PanelController@show'); 
    Route::post('/{id}', 'PanelController@update');   
    Route::delete('/{id}', 'PanelController@destroy');        
});

Route::group([    
    'prefix' => 'assignment',     
], function () {        
    Route::get('/', 'AssignmentController@index');
    Route::post('/', 'AssignmentController@store');
    Route::get('/{id}', 'AssignmentController@show'); 
    Route::post('/{id}', 'AssignmentController@update');   
    Route::delete('/{id}', 'AssignmentController@destroy');        
});