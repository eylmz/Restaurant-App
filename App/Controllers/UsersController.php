<?php
    namespace App\Controllers;
    use App\Core\MyController;
    use App\Models\UsersModel;
    use System\Core\App;

    class UsersController extends MyController{
        function add(){
            $userModel = new UsersModel();

            $data = [
                "alert"=>"",
                "alertType"=>"error",
                "name"=>"",
                "username"=>"",
                "rank"=>0
            ];

            if($_POST){
                $name = addslashes(trim(strip_tags($_POST["name"])));
                $password = addslashes(trim(strip_tags($_POST["password"])));
                $username = addslashes(trim(strip_tags($_POST["username"])));
                $rank = (int)$_POST["rank"];

                if($rank >= 1 && $rank <= 3 && $name && $password && $username){
                    if(!$userModel->has($username)){
                        $password = md5(sha1($password));
                        $add = $userModel->add([
                            "username" => $username,
                            "password" => $password,
                            "rank" => $rank,
                            "name" => $name
                        ]);
                        if($add){
                            $data["alertType"] = "success";
                            $data["alert"] = "Kullanıcı başarıyla eklendi!";
                        }else $data["alert"] = $userModel->errorMessage();

                    }else $data["alert"] = "Bu kullanıcı adı zaten kullanılıyor!";
                }else $data["alert"] = "Lütfen boş alan bırakmayınız!";
            }

            $this->loadTemplate("Users/add",$data);
        }

        function update($id){
            $id = (int)$id;
            $userModel = new UsersModel();
            $user = $userModel->get($id);
            if(!$user) App::route(ADMIN_URL."users/get");
            $data = [
                "alert"=>"",
                "alertType"=>"error",
                "name"=>stripslashes($user["name"]),
                "username"=>stripslashes($user["username"]),
                "rank"=>$user["rank"]
            ];

            if($_POST){
                $name = addslashes(trim(strip_tags($_POST["name"])));
                $password = addslashes(trim(strip_tags($_POST["password"])));
                $username = addslashes(trim(strip_tags($_POST["username"])));
                $rank = (int)$_POST["rank"];

                if($rank >= 1 && $rank <= 3 && $name && $username){
                    if(!$userModel->has($username,$id)){
                        if($password)
                            $password = md5(sha1($password));
                        else
                            $password = $user["password"];

                        $add = $userModel->update([
                            "username" => $username,
                            "password" => $password,
                            "rank" => $rank,
                            "name" => $name
                        ],$id);
                        if($add){
                            $data["alertType"] = "success";
                            $data["alert"] = "Kullanıcı başarıyla düzenlendi!";
                            App::route(ADMIN_URL."users/get",2);
                        }else $data["alert"] = $userModel->errorMessage();

                    }else $data["alert"] = "Bu kullanıcı adı zaten kullanılıyor!";
                }else $data["alert"] = "Lütfen boş alan bırakmayınız!";
            }

            $this->loadTemplate("Users/add",$data);
        }

        function delete($id){
            $id = (int)$id;
            $userModel = new UsersModel();
            if(!$userModel->get($id)) App::route(ADMIN_URL."users");

            $delete = $userModel->delete($id);
            if(!$delete) $this->loadTemplate("alert",["type"=>"error","alert"=>$userModel->errorMessage()]);
            else{
                $this->loadTemplate("alert",["type"=>"success","alert"=>"Kullanıcı başarıyla silindi!"]);
                App::route(ADMIN_URL."users");
            }
        }

        function get(){
            $userModel = new UsersModel();

            $this->loadTemplate("Users/get",["users"=>$userModel->get()]);
        }
    }