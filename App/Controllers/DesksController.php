<?php
    namespace App\Controllers;

    use App\Core\MyController;
    use App\Models\DesksModel;
    use System\Core\App;

    class DesksController extends MyController{
        function get(){
            $deskModel = new DesksModel();
            $data["desks"] = $deskModel->get();

            $this->loadTemplate("Desks/get",$data );
        }

        function update($id){
            $deskModel = new DesksModel();
            $desk = $deskModel->get((int)$id);
            if(!$desk) App::route(ADMIN_URL."desks");

            $data = [
                "alertType" => "error",
                "alert" => "",
                "name" => stripslashes($desk["name"])
            ];

            if($_POST){
                $name = addslashes(trim(strip_tags($_POST["name"])));
                if($name){
                    $update = $deskModel->update(["name"=>$name],(int)$id);
                    if($update){
                        $data["alertType"] = "success";
                        $data["alert"] = "Başarıyla düzenlendi!";
                        App::route(ADMIN_URL."desks",2);
                    }else $data["alert"] = "Bir sorun oluştu!";
                }else $data["alert"] = "Lütfen boş alan bırakmayınız!";
            }

            $this->loadTemplate("Desks/add",$data);
        }

        function add(){
            $deskModel = new DesksModel();
            $data= [
                "alertType" => "error",
                "alert"=>"",
                "name" => ""
            ];

            if($_POST){
                $name = addslashes(trim(strip_tags($_POST["name"])));
                if($name){
                    $add = $deskModel->add(["name"=>$name]);
                    if($add){
                        $data["alertType"] = "success";
                        $data["alert"] = "Başarıyla eklendi!";
                        // App::route(ADMIN_URL."desks",2);
                    }else $data["alert"] = "Bir sorun oluştu!";
                }else $data["alert"] = "Lütfen boş alan bırakmayınız!";
            }

            $this->loadTemplate("Desks/add",$data);
        }

        function delete($id){
            $deskModel = new DesksModel();
            $desk = $deskModel->get((int)$id);
            if(!$desk) App::route(ADMIN_URL."desks");

            if($desk["tempID"] == 0) {
                $update = $deskModel->delete((int)$id);
                if ($update) {
                    App::route(ADMIN_URL . "desks");
                } else $this->loadTemplate("alert", ["type" => "error", "alert" => $deskModel->errorMessage()]);
            }else $this->loadTemplate("alert", ["type" => "error", "alert" => "Şuan bu masa kullanılıyor silemezsiniz!"]);
        }
    }