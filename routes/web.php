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

///LOGIN

Route::get('admin/login', 'Admin\AdminController@index');
Route::post('admin/checklogin', 'Admin\AdminController@checklogin');
Route::get('admin/logout', 'Admin\AdminController@logout')->name('logout');

Route::get('admin/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');

///product

Route::get('admin/product', 'Admin\ProductController@index')->name('product.index');

Route::get('admin/product/create', 'Admin\ProductController@create')->name('product.create');
Route::post('admin/product/save', 'Admin\ProductController@save')->name('product.save');
Route::get('admin/product/edit/{id}', 'Admin\ProductController@edit')->name('product.edit');
Route::post('admin/product/update/{id}', 'Admin\ProductController@update')->name('product.update');
Route::post('admin/product/delete/{id}', 'Admin\ProductController@destroy_undestroy')->name('product.delete');

///////ultimate_goal
Route::get('admin/ultimate_goal', 'Admin\UltimateGoalController@index')->name('ultimate_goal.index');

Route::get('admin/ultimate_goal/create', 'Admin\UltimateGoalController@create')->name('ultimate_goal.create');
Route::post('admin/ultimate_goal/save', 'Admin\UltimateGoalController@save')->name('ultimate_goal.save');
Route::get('admin/ultimate_goal/edit/{id}', 'Admin\UltimateGoalController@edit')->name('ultimate_goal.edit');
Route::post('admin/ultimate_goal/update/{id}', 'Admin\UltimateGoalController@update')->name('ultimate_goal.update');
Route::post('admin/ultimate_goal/delete/{id}', 'Admin\UltimateGoalController@destroy_undestroy')->name('ultimate_goal.delete');


///////plan_equipment
Route::get('admin/plan_equipment', 'Admin\PlanEquipmentController@index')->name('plan_equipment.index');

Route::get('admin/plan_equipment/create', 'Admin\PlanEquipmentController@create')->name('plan_equipment.create');
Route::post('admin/plan_equipment/save', 'Admin\PlanEquipmentController@save')->name('plan_equipment.save');
Route::get('admin/plan_equipment/edit/{id}', 'Admin\PlanEquipmentController@edit')->name('plan_equipment.edit');
Route::post('admin/plan_equipment/update/{id}', 'Admin\PlanEquipmentController@update')->name('plan_equipment.update');
Route::post('admin/plan_equipment/delete/{id}', 'Admin\PlanEquipmentController@destroy_undestroy')->name('plan_equipment.delete');


///////////equipment

Route::get('admin/equipment', 'Admin\EquipmentController@index')->name('equipment.index');

Route::get('admin/equipment/create', 'Admin\EquipmentController@create')->name('equipment.create');
Route::post('admin/equipment/save', 'Admin\EquipmentController@save')->name('equipment.save');
Route::get('admin/equipment/edit/{id}', 'Admin\EquipmentController@edit')->name('equipment.edit');
Route::post('admin/equipment/update/{id}', 'Admin\EquipmentController@update')->name('equipment.update');
Route::post('admin/equipment/delete/{id}', 'Admin\EquipmentController@destroy_undestroy')->name('equipment.delete');

///////user_areas

Route::get('admin/user_areas', 'Admin\UserAreasController@index')->name('user_areas.index');

Route::get('admin/user_areas/create', 'Admin\UserAreasController@create')->name('user_areas.create');
Route::post('admin/user_areas/save', 'Admin\UserAreasController@save')->name('user_areas.save');
Route::get('admin/user_areas/edit/{id}', 'Admin\UserAreasController@edit')->name('user_areas.edit');
Route::post('admin/user_areas/update/{id}', 'Admin\UserAreasController@update')->name('user_areas.update');
Route::post('admin/user_areas/delete/{id}', 'Admin\UserAreasController@destroy_undestroy')->name('user_areas.delete');


///////areas

Route::get('admin/areas', 'Admin\AreasController@index')->name('areas.index');

Route::get('admin/areas/create', 'Admin\AreasController@create')->name('areas.create');
Route::post('admin/areas/save', 'Admin\AreasController@save')->name('areas.save');
Route::get('admin/areas/edit/{id}', 'Admin\AreasController@edit')->name('areas.edit');
Route::post('admin/areas/update/{id}', 'Admin\AreasController@update')->name('areas.update');
Route::post('admin/areas/delete/{id}', 'Admin\AreasController@destroy_undestroy')->name('areas.delete');




//////plan_video
Route::get('admin/plan_video', 'Admin\PlanVideoController@index')->name('plan_video.index');

Route::get('admin/plan_video/create', 'Admin\PlanVideoController@create')->name('plan_video.create');
Route::post('admin/plan_video/save', 'Admin\PlanVideoController@save')->name('plan_video.save');
Route::get('admin/plan_video/edit/{id}', 'Admin\PlanVideoController@edit')->name('plan_video.edit');
Route::post('admin/plan_video/update/{id}', 'Admin\PlanVideoController@update')->name('plan_video.update');
Route::post('admin/plan_video/delete/{id}', 'Admin\PlanVideoController@destroy_undestroy')->name('plan_video.delete');



//////video
Route::get('admin/video', 'Admin\VideoController@index')->name('video.index');

Route::get('admin/video/create', 'Admin\VideoController@create')->name('video.create');
Route::post('admin/video/save', 'Admin\VideoController@save')->name('video.save');
Route::get('admin/video/edit/{id}', 'Admin\VideoController@edit')->name('video.edit');
Route::post('admin/video/update/{id}', 'Admin\VideoController@update')->name('video.update');
Route::post('admin/video/delete/{id}', 'Admin\VideoController@destroy_undestroy')->name('video.delete');


//////trainingplan
Route::get('admin/training_plan', 'Admin\TrainingPlanController@index')->name('training_plan.index');

Route::get('admin/training_plan/create', 'Admin\TrainingPlanController@create')->name('training_plan.create');
Route::post('admin/training_plan/save', 'Admin\TrainingPlanController@save')->name('training_plan.save');
Route::get('admin/training_plan/edit/{id}', 'Admin\TrainingPlanController@edit')->name('training_plan.edit');
Route::post('admin/training_plan/update/{id}', 'Admin\TrainingPlanController@update')->name('training_plan.update');
Route::post('admin/training_plan/delete/{id}', 'Admin\TrainingPlanController@destroy_undestroy')->name('training_plan.delete');

//////activity_level

Route::get('admin/activity_level', 'Admin\Activity_LevelController@index')->name('activity_level.index');

Route::get('admin/activity_level/create', 'Admin\Activity_LevelController@create')->name('activity_level.create');
Route::post('admin/activity_level/save', 'Admin\Activity_LevelController@save')->name('activity_level.save');
Route::get('admin/activity_level/edit/{id}', 'Admin\Activity_LevelController@edit')->name('activity_level.edit');
Route::post('admin/activity_level/update/{id}', 'Admin\Activity_LevelController@update')->name('activity_level.update');
Route::post('admin/activity_level/delete/{id}', 'Admin\Activity_LevelController@destroy_undestroy')->name('activity_level.delete');
