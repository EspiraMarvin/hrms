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

//use Illuminate\Support\Facades;
//use Symfony\Component\Console\Input\Input;
//use Illuminate\Http\Request;

use Illuminate\Http\Request;
use App\Employee;
use Symfony\Component\Console\Input\Input;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/home', 'HomeController@index');

Route::get('dashboard','AuthController@dashboard');

//Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AuthController@dashboard']);

//  Employee routes

Route::resource('employee','EmployeeController');

Route::get('delete-emp/{id}', ['as' => 'delete-emp', 'uses' => 'EmployeeController@doDelete']);

Route::get('employee_add', ['as' => 'employee_add', 'uses' => 'EmployeeController@employee_add']);

Route::get('employee_manager', ['as' => 'employee_manager', 'uses' => 'EmployeeController@index']);

Route::get('employee_bank_details', ['as' => 'employee_bank_details', 'uses' => 'EmployeeController@bankDetails']);

//Route::get('employee_add', ['as' => 'employee_add', 'uses' => 'EmployeeController@EmpAddDir']);

Route::get('employee_add', ['as' => 'employee_add', 'uses' => 'EmployeeController@EmpAddDep']);

Route::get('employee_edit', ['as' => 'employee_edit', 'uses' => 'EmployeeController@EmpEditDep']);

//Route::get('employee_add', ['as' => 'employee_add', 'uses' => 'EmployeeController@EmpAddRole']);


//   Directorate Routes

Route::resource('directorate','DirectorateController');

Route::get('delete-dir/{id}', ['as' => 'delete-dir', 'uses' => 'DirectorateController@doDelete']);

Route::get('directorate_add', ['as' => 'directorate_add', 'uses' => 'DirectorateController@dirAdd']);

Route::get('directorate_list', ['as' => 'directorate_list', 'uses' => 'DirectorateController@dirList']);

//Route::get('employee_add', ['as' => 'employee_add', 'uses' => 'EmployeeController@EmpAddDir']);

//   Departments Routes

Route::resource('department','DepartmentsController');

Route::get('delete-dep/{id}', ['as' => 'delete-dep', 'uses' => 'DepartmentsController@doDelete']);

Route::get('department_add', ['as' => 'department_add', 'uses' => 'DepartmentsController@depAdd']);

Route::get('department_list', ['as' => 'department_list', 'uses' => 'DepartmentsController@depList']);

//   Leaves Routes

Route::resource('leaves','LeavesController');
//Route::get('leave_apply', ['as' => 'leave_apply', 'uses' => 'LeavesController@LeaveTypeAdd']);
//Route::get('leave_apply', ['as' => 'leave_apply', 'uses' => 'LeavesController@apply']);
Route::post('leave_apply', ['as' => 'leave.leave_apply', 'uses' => 'LeavesController@apply']);

Route::get('leave_apply', ['as' => 'leave_apply', 'uses' => 'LeavesController@applyLeave']);

Route::get('my_leave_list', ['as' => 'my_leave_list', 'uses' => 'LeavesController@myLeaveList']);

Route::get('leave_type_add', ['as' => 'leave_type_add', 'uses' => 'LeavesController@addLeaveType']);

Route::get('leave_type_list', ['as' => 'leave_type_list', 'uses' => 'LeavesController@leaveTypeList']);

Route::get('total_leave_request', ['as' => 'total_leave_request', 'uses' => 'LeavesController@totalLeaveRequest']);

//   Leave Routes

/*Route::get('leave_apply', ['as' => 'leave_apply', 'uses' => 'LeaveController@applyLeave']);

Route::get('leave_apply', ['as' => 'leave_apply', 'uses' => 'LeaveController@apply']);

Route::get('my_leave_list', ['as' => 'my_leave_list', 'uses' => 'LeavesController@myLeaveList']);

Route::get('leave_type_add', ['as' => 'leave_type_add', 'uses' => 'LeavesController@addLeaveType']);

Route::get('leave_type_list', ['as' => 'leave_type_list', 'uses' => 'LeavesController@leaveTypeList']);

Route::get('total_leave_request', ['as' => 'total_leave_request', 'uses' => 'LeavesController@totalLeaveRequest']);*/

//    Role Routes

Route::resource('role','RolesController');

Route::get('delete-role/{id}', ['as' => 'delete-role', 'uses' => 'RolesController@doDelete']);

Route::get('role_add', ['as' => 'role_add', 'uses' => 'RolesController@addRole']);

Route::get('role_list', ['as' => 'role_list', 'uses' => 'RolesController@roleList']);

//    Target Routes

Route::resource('target','TargetsController');

Route::get('target_assign', ['as' => 'target_assign', 'uses' => 'TargetsController@targetAdd']);

Route::get('target_assign', ['as' => 'target_assign', 'uses' => 'TargetsController@EmpAddTar']);

Route::get('target_assign_list', ['as' => 'target_assign_list', 'uses' => 'TargetsController@targetList']);

//  Expense Routes
Route::resource('expense','ExpensesController');

Route::get('expense_add', ['as' => 'expense_add', 'uses' => 'ExpensesController@expenseAdd']);

Route::get('expense_list', ['as' => 'expense_list', 'uses' => 'ExpensesController@expenseList']);


//    Asset Routes

Route::resource('asset','AssetsController');

Route::get('asset_add', ['as' => 'asset_add', 'uses' => 'AssetsController@assetAdd']);

Route::get('asset_assign', ['as' => 'asset_assign', 'uses' => 'AssetAssignController@assignAsset']);

//Route::get('asset_assign', ['as' => 'asset_assign', 'uses' => 'AssetsController@assignAsset']);

//Route::get('asset_assign', ['as' => 'asset_assign', 'uses' => 'AssetsController@assetAssign']);

//Route::get('asset_assign_list', ['as' => 'asset_assign_list', 'uses' => 'AssetsController@assetAssignList']);

Route::get('asset_list', ['as' => 'asset_list', 'uses' => 'AssetsController@assetList']);

//      Asset Assign Routes

Route::resource('assetassign','AssetAssignController');

//Route::get('asset_assign', ['as' => 'asset_assign', 'uses' => 'AssetAssignController@listAsset']);

Route::get('asset_assign_list', ['as' => 'asset_assign_list', 'uses' => 'AssetAssignController@assetAssignList']);

//Routes for Promotion.

Route::get('promote_add', ['as' => 'promote_add', 'uses' => 'EmployeeController@doPromotion']);

Route::get('promote_list', ['as' => 'promote_list', 'uses' => 'EmployeeController@showPromotion']);

Route::get('promotion', ['uses'=>'EmployeeController@doPromotion']);

Route::post('promotion', ['uses'=>'EmployeeController@processPromotion']);

Route::get('show_promotion', ['uses'=>'EmployeeController@showPromotion']);

Route::post('get-promotion-data', ['uses' => 'EmployeeController@getPromotionData']);

// search routes

Route::get('autocomplete', 'EmployeeController@autocomplete')->name('autocomplete');

Route::get('employee_search', ['as' => 'employee_search', 'uses' => 'EmployeeController@search']);

Auth::routes();










