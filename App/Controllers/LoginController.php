<?php
    namespace App\Controllers;

    use App\Models\UsersModel;
    use System\Core\App;
    use System\Core\Controller;
    use System\Helpers\Session;

    class LoginController extends Controller{
        function get(){
            Session::Start();
            $userModel = new UsersModel();

            $data = [
                "alert" => ""
            ];

            if($_POST){
                $username = addslashes(trim(strip_tags($_POST["username"])));
                $password = addslashes(trim(strip_tags($_POST["password"])));

                if($username && $password){
                    $password = md5(sha1($password));
                    if($user = $userModel->login($username,$password)){
                        Session::Create("admin",true);
                        Session::Create("rank",$user["rank"]);
                        Session::Create("userID",$user["userID"]);
                        var_dump($_SESSION);
                        App::route(ADMIN_URL."orders");
                    }else $data["alert"] = "Kullanıcı adı ve ya şifre yanlış1";
                }else $data["alert"] = "Lütfen boş alan bırakmayınız!";
            }

            $this->loadTemplate("Login/index",$data);
        }

        function logout(){
            Session::Start();
            Session::DeleteAll();
            App::route(ADMIN_URL."login");
        }
    }