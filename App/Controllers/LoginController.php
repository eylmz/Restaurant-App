<?php
    namespace App\Controllers;

    use System\Core\Controller;

    class LoginController extends Controller{
        function index(){

            $this->loadTemplate("test");
        }
    }