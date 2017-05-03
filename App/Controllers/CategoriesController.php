<?php
    namespace App\Controllers;
    use App\Core\MyController;
    use App\Helpers\MyHelpers;
    use App\Models\CategoriesModel;
    use System\Core\App;


    class CategoriesController extends MyController{
        function get($id = 0){
            $categoriesModel = new CategoriesModel();
            $subcategory = "";
            if($id){
               $subcat = $categoriesModel->get($id);
               if(!$subcat) App::route(ADMIN_URL."categories");
               $subcategory = stripslashes($subcat["name"]);
            }

            $this->loadTemplate("Categories/get",["subcategory"=>$subcategory,"categories"=>$categoriesModel->select($id)]);
        }

        function add(){
            $categoriesModel = new CategoriesModel();
            $categories = MyHelpers::categories(0);

            $data = [
                "alert"=>"",
                "alertType"=>"error",
                "categories" => $categories,
                "name"=>"",
                "sort"=>1,
                "file"=>"",
                "currentCategory"=>0
            ];

            if($_POST){
                $name = addslashes(trim(strip_tags($_POST["name"])));
                $parentID = (int)$_POST["parentID"];
                $sort = (int)$_POST["sort"];

                if($name){
                    if($image = MyHelpers::upload($_FILES["image"], "Categories")){
                        $add = $categoriesModel->add([
                            "name" => $name,
                            "parentID" => $parentID,
                            "sort"=>$sort,
                            "image"=>$image
                        ]);
                        if($add){
                            $data["alertType"] = "success";
                            $data["alert"] = "Başarıyla tamamlandı!";
                        }else $data["alert"] = "Bir sorun oluştu!";
                    }else $data["alert"] = "Resim yüklenirken bir sorun oluştu";
                }else $data["alert"] = "Boş alan bırakmayınız!";
            }

            $this->loadTemplate("Categories/add",$data);
        }
    }