<?php
    use System\Core\Route;

    Route::any("admin/categories/get/{id}","Categories@get")->where("id","[0-9]+");
    Route::any("admin/{controller}/update/{id}","{?}@update")->where("id","[0-9]+");
    Route::any("admin/{controller}/delete/{id}","{?}@delete")->where("id","[0-9]+");

    Route::any("admin/{controller}/{method}","{?}@{?}");
    Route::any("admin/{controller}","{?}@get");
    Route::any("admin/","Login@index");

    Route::any("{every}",function(){
        //header("HTTP/1.0 404 Not Found");
    });