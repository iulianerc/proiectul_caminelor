<?php

use Illuminate\Support\Facades\Route;

Route::prefix('menu_items')->name('menu_items.')->group(static function(){
    Route::get('edit_order_holders', 'MenuItemController@editOrderHolders')->name('edit_order_holders.get');
    Route::get('edit_order_content', 'MenuItemController@editOrderContent')->name('edit_order_content.get');
    Route::post('edit_order_content', 'MenuItemController@storeOrderContent')->name('edit_order_content.post');
});
Route::resource('menu_items', 'MenuItemController', ['name_rewrite' => true]);

Route::prefix('roles')->name('roles.')->group(static function () {
    Route::get('{role}/edit_permissions', 'RoleController@editPermissions')->name('edit_permissions.get');
    Route::patch('{role}/edit_permissions', 'RoleController@updatePermissions')->name('edit_permissions.patch');
    Route::get('list', 'RoleController@list')->name('list.get');
});
Route::resource('roles', 'RoleController', ['name_rewrite' => true]);


