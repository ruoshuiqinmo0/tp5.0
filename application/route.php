<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');//路由地址由三部分组成，模块、控制器、方法，不区分大小写
//Route::rule(路由表达式，路由地址，请求类型，路由参数，变量规则)

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');



Route::get('api/:version/product/by_category','api/:version.product/getAllInCategory');
Route::get('api/:version/product/:id','api/:version.product/getOne',[],['id'=>'\d+']);
Route::get('api/:version/product/recent','api/:version.product/getRecent');
//Route::group('api/:version/product',function(){
//    Route::get('/by_category','api/:version.product/getAllInCategory');
//    Route::get('/:id','api/:version.product/getOne',[],['id'=>'\d+']);
//    Route::get('/recent','api/:version.product/getRecent');
//});

Route::get('api/:version/category/all','api/:version.category/getAllCategories');


Route::post('api/:version/token/user','api/:version.Token/getToken');


Route::post('api/:version/address','api/:version.address/createOrUpdateAddress');


Route::post('api/:version/order','api/:version.order/placeOrder');


