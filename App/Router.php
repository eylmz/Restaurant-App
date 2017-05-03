<?php
    use System\Core\Route;
    /*
        $ana = Route::get("{baslik}/{controller}/{method}",function($var,$controller,$method){
            $controller = "App\\Controllers\\".$controller;
            $controller = new $controller();
            call_user_func_array([$controller,$method],[]);
        })->name("ana");
        $ana->where("baslik","[a-zA-Z0-9-]+");
    */

    Route::any("admin/categories/get/{id}","Categories@get")->where("id","[0-9]+");
    Route::any("admin/{controller}/update/{id}","{?}@update")->where("id","[0-9]+");
    Route::any("admin/{controller}/delete/{id}","{?}@delete")->where("id","[0-9]+");

    Route::any("admin/{controller}/{method}","{?}@{?}");
    Route::any("admin/{controller}","{?}@get");

    Route::any("{every}",function(){

       // header("HTTP/1.0 404 Not Found");
    });