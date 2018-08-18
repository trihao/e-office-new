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

Route::get('/', 'Core\IndexController@index');
Route::get('/login', 'User\AuthenticateController@index');
Route::post('/login/post', 'User\AuthenticateController@loginPost');
Route::get('/logout/post', 'User\AuthenticateController@logoutPost');
Route::get('/bi', 'Module\Bi\IndexController@index');
Route::get('/bi/folder/view', 'Module\Bi\Folder\ViewController@index');
Route::get('/bi/folder/create/index', 'Module\Bi\Folder\CreateController@index');
Route::post('/bi/folder/create/execute', 'Module\Bi\Folder\CreateController@execute');
Route::get('/bi/folder/rename/index', 'Module\Bi\Folder\RenameController@index');
Route::post('/bi/folder/rename/execute', 'Module\Bi\Folder\RenameController@execute');
Route::get('/bi/folder/delete/execute', 'Module\Bi\Folder\DeleteController@execute');

Route::get('/bi/document/create/index', 'Module\Bi\Document\CreateController@index');
Route::post('/bi/document/create/execute', 'Module\Bi\Document\CreateController@execute');
Route::get('/bi/document/view', 'Module\Bi\Document\ViewController@index');
Route::get('/bi/document/edit', 'Module\Bi\Document\EditController@index');
Route::post('/bi/document/edit/execute', 'Module\Bi\Document\EditController@execute');