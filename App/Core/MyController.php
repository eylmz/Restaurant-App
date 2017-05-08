<?php
    namespace App\Core;

    use System\Core\App;
    use System\Core\Controller;
    use System\Helpers\Session;

    class MyController extends Controller{
        function __construct(){
            Session::Start();
            if(!Session::isExists("admin")) App::route(ADMIN_URL."login");
        }
    }