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
use App\Exports\EmployeesExport;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {

Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AuthController@dashboard']);

});

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['middleware' => ['auth']], function () {
//Route::get('employee_add', ['as' => 'employee_add', 'uses' => 'EmployeeController@EmpAddDep']);
//    // Export routes
//    route::get('employee_manager/export', function () {
//        return Excel::download(new \App\Exports\EmployeesExport, 'employees.xlsx');
//    });
//});


Route::get('dashboard', 'AuthController@dashboard');

    // Export routes
Route::get('employee_manager/export', function () {
        return Excel::download(new \App\Exports\EmployeesExport, 'employees.xlsx');
    });

//  Employee routes

Route::resource('employee', 'EmployeeController');

Route::put('delete-emp/{id}', ['as' => 'delete-emp', 'uses' => 'EmployeeController@doDelete']);

Route::put('delete-sup/{id}', ['as' => 'delete-sup', 'uses' => 'EmployeeController@doDeleteSup']);

Route::get('employee_add', ['as' => 'employee_add', 'uses' => 'EmployeeController@employee_add']);

Route::get('employee_manager', ['as' => 'employee_manager', 'uses' => 'EmployeeController@index']);

Route::get('employee_bank_details', ['as' => 'employee_bank_details', 'uses' => 'EmployeeController@bankDetails']);

Route::get('employee_add', ['as' => 'employee_add', 'uses' => 'EmployeeController@EmpAddDep']);

Route::get('supervisedBy_list', ['as' => 'supervisedBy_list', 'uses' => 'EmployeeController@showSupervisedBy']);

//    supervisor route

Route::get('supervisor_list','EmployeeController@listSupervisor');

//   profile route

Route::get('profile', 'ProfileController@show');

Route::put('profile_bank', ['as' => 'profile_bank', 'uses' => 'ProfileController@editBank']);

Route::put('profile_personal', ['as' => 'profile_personal', 'uses' => 'ProfileController@editPersonal']);

Route::put('profile_employment', ['as' => 'profile_employment', 'uses' => 'ProfileController@editEmployment']);

//   Directorate Routes

Route::resource('directorate', 'DirectorateController');

Route::put('delete-dir/{id}', ['as' => 'delete-dir', 'uses' => 'DirectorateController@doDelete']);

Route::get('directorate_add', ['as' => 'directorate_add', 'uses' => 'DirectorateController@dirAdd']);

Route::get('directorate_list', ['as' => 'directorate_list', 'uses' => 'DirectorateController@dirList']);

//   Departments Routes

Route::resource('department', 'DepartmentsController');

Route::put('delete-dep/{id}', ['as' => 'delete-dep', 'uses' => 'DepartmentsController@doDelete']);

Route::get('department_add', ['as' => 'department_add', 'uses' => 'DepartmentsController@depAdd']);

Route::get('department_list', ['as' => 'department_list', 'uses' => 'DepartmentsController@depList']);

//   Leaves Routes

Route::resource('leaves', 'LeavesController');

Route::get('delete-leave-type/{id}', ['as' => 'delete-leave-type', 'uses' => 'LeavesController@doDelete']);

Route::post('leave_apply', ['as' => 'leave.leave_apply', 'uses' => 'LeavesController@apply']);

Route::get('leave_apply', ['as' => 'leave_apply', 'uses' => 'LeavesController@applyLeave']);

Route::get('my_leave_list', ['as' => 'my_leave_list', 'uses' => 'LeavesController@myLeaveList']);

Route::get('leave_approved', ['as' => 'leave_approved', 'uses' => 'LeavesController@statusApprove']);

Route::get('leave_deny', ['as' => 'leave_deny', 'uses' => 'LeavesController@statusDeny']);

Route::get('leave_pending', ['as' => 'leave_pending', 'uses' => 'LeavesController@statusPending']);

//Route::get('approve_leave', ['as' => 'approve_leave', 'uses' => 'LeavesController@checkLeaves']);

Route::get('approve_leave', ['as' => 'approve_leave', 'uses' => 'LeavesController@approveLeaveList']);

Route::put('approve_leave', ['as' => 'approve_leave', 'uses' => 'LeavesController@approveLeave']);

Route::get('leave_type_add', ['as' => 'leave_type_add', 'uses' => 'LeavesController@addLeaveType']);

Route::get('leave_type_list', ['as' => 'leave_type_list', 'uses' => 'LeavesController@leaveTypeList']);

Route::get('total_leave_list', ['as' => 'total_leave_list', 'uses' => 'LeavesController@totalLeaveList']);

//    Role Routes

Route::resource('role', 'RolesController');

Route::put('delete-role/{id}', ['as' => 'delete-role', 'uses' => 'RolesController@doDelete']);

Route::get('role_add', ['as' => 'role_add', 'uses' => 'RolesController@addRole']);

Route::get('role_list', ['as' => 'role_list', 'uses' => 'RolesController@roleList']);

//    Target Routes

Route::resource('target', 'TargetsController');

Route::put('delete-target/{id}', ['as' => 'delete-target', 'uses' => 'TargetsController@doDelete']);

Route::get('target_assign', ['as' => 'target_assign', 'uses' => 'TargetsController@targetAdd']);

Route::get('target_assign', ['as' => 'target_assign', 'uses' => 'TargetsController@AddTar']);

Route::get('target_assign_list', ['as' => 'target_assign_list', 'uses' => 'TargetsController@targetList']);

Route::get('my_target_list', ['as' => 'my_target_list', 'uses' => 'TargetsController@showMyTarget']);

//  Expense Routes

Route::resource('expense', 'ExpensesController');

Route::put('delete-expense/{id}', ['as' => 'delete-expense', 'uses' => 'ExpensesController@doDelete']);

Route::get('expense_add', ['as' => 'expense_add', 'uses' => 'ExpensesController@expenseAdd']);

Route::get('expense_list', ['as' => 'expense_list', 'uses' => 'ExpensesController@expenseList']);

//  Drop down list route

Route::get('expense_add', 'ExpensesController@getRegions');

Route::get('expense_add/getcounties/{id}', 'ExpensesController@getCounties');

//    Asset Routes

Route::resource('asset', 'AssetsController');

Route::put('delete-asset/{id}', ['as' => 'delete-asset', 'uses' => 'AssetsController@doDelete']);

Route::get('asset_add', ['as' => 'asset_add', 'uses' => 'AssetsController@assetAdd']);

Route::get('asset_assign', ['as' => 'asset_assign', 'uses' => 'AssetAssignController@assignAsset']);

Route::get('asset_list', ['as' => 'asset_list', 'uses' => 'AssetsController@assetList']);

// dropdown list routes

Route::get('asset_assign', 'AssetAssignController@assignAsset');

Route::get('asset_assign/getcounties/{id}', 'AssetAssignController@getCounties');

//   Asset Assign Routes

Route::resource('assetassign', 'AssetAssignController');

Route::get('my_assigned_assets', ['as' => 'my_assigned_assets', 'uses' => 'AssetAssignController@myAssets']);

Route::put('delete-asset-assign/{id}', ['as' => 'delete-asset-assign', 'uses' => 'AssetAssignController@doDelete']);

Route::get('asset_assign_list/{id}', ['as' => 'asset_assign_list', 'uses' => 'AssetAssignController@assetAssignList']);

//  Awards routes

//route to update award method

Route::get('award_assign/{id}/edit', ['as' => 'award_assign', 'uses' => 'AwardsController@editAssigned']);

Route::put('award_assign/{id}', ['as' => 'award_assign', 'uses' => 'AwardsController@updateAssigned']);

Route::post('award_assign', ['as' => 'award_assign', 'uses' => 'AwardsController@storeAssignedAward']);

Route::get('my_awards', ['as' => 'my_awards', 'uses' => 'AwardsController@myAwards']);

Route::resource('award', 'AwardsController');

Route::put('delete-award/{id}', ['as' => 'delete-award', 'uses' => 'AwardsController@doDelete']);

Route::put('delete-award-assign/{id}', ['as' => 'delete-award', 'uses' => 'AwardsController@doDeleteAssignAward']);

Route::get('award_add', 'AwardsController@addAward');

Route::get('award_assign', 'AwardsController@assingAward');

Route::get('award_list', ['as' => 'award_list', 'uses' => 'AwardsController@awardList']);

Route::get('awardees_listing', ['as' => 'awardees_listing', 'uses' => 'AwardsController@awardeesList']);

//  Training routes

Route::resource('training', 'TrainingsController');

Route::put('delete-train/{id}', ['as' => 'delete-train', 'uses' => 'TrainingsController@doDelete']);

Route::post('train_invite', ['as' => 'train_invite', 'uses' => 'TrainingsController@storeTrainInvite']);

Route::get('train_add', ['as' => 'train_add', 'uses' => 'TrainingsController@addTrain']);

Route::get('train_list', ['as' => 'train_list', 'uses' => 'TrainingsController@trainList']);

Route::get('train_invite', ['as' => 'train_invite', 'uses' => 'TrainingsController@trainInvite']);

Route::get('train_invite_list', ['as' => 'train_invite_list', 'uses' => 'TrainingsController@trainInviteList']);

Route::put('delete-train_invite/{id}', ['as' => 'delete-train_invite', 'uses' => 'TrainingsController@doDeleteInvite']);

Route::get('train_invite/{id}/edit', ['as' => 'train_invite_edit', 'uses' => 'TrainingsController@editInvite']);

Route::put('train_invite/{id}', ['as' => 'train_invite', 'uses' => 'TrainingsController@updateInvite']);

Route::get('my_train_invite', ['as' => 'my_train_invite', 'uses' => 'TrainingsController@myTrainingInvite']);

//  Routes for Promotion.

Route::resource('promote', 'PromoteController');

Route::post('employee_edit', ['as' => 'employee_edit', 'uses' => 'PromoteController@storePromotion']);

Route::get('promote_add', ['as' => 'promote_add', 'uses' => 'PromoteController@doPromotion']);

Route::get('promote_list', ['as' => 'promote_list', 'uses' => 'PromoteController@promoteList']);

// search routes

Route::get('autocomplete', 'EmployeeController@autocomplete')->name('autocomplete');

Route::get('employee_search', ['as' => 'employee_search', 'uses' => 'EmployeeController@search']);

Route::get('employee_promote', ['as' => 'employee_promote', 'uses' => 'PromoteController@searchPromote']);

Route::get('leave_search', ['as' => 'leave_search', 'uses' => 'LeavesController@search']);



Auth::routes();








