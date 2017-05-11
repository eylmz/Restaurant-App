<?php
    namespace App\Controllers;
    use App\Core\MyController;
    use App\Helpers\MyHelpers;
    use App\Models\CategoriesModel;
    use App\Models\ProductsModel;
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
                "currentCategory"=>0,
                "parentID"=>0
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

        function update($id){
            $categoriesModel = new CategoriesModel();
            $cat = $categoriesModel->get($id);
            if(!$cat) App::route(ADMIN_URL."categories");
            $categories = MyHelpers::categories(0);
            $data = [
                "alert"=>"",
                "alertType"=>"error",
                "categories" => $categories,
                "name"=>$cat["name"],
                "sort"=>$cat["sort"],
                "file"=>$cat["image"],
                "currentCategory"=>$cat["categoryID"],
                "parentID"=>$cat["parentID"]
            ];

            if($_POST){
                $name = addslashes(trim(strip_tags($_POST["name"])));
                $parentID = (int)$_POST["parentID"];
                $sort = (int)$_POST["sort"];

                if($name){
                    $err = 0;
                    if($_FILES["image"]["name"]){
                        $image = MyHelpers::upload($_FILES["image"], "Categories");
                        if(!$image){
                            $data["alert"] = "Resim yüklenirken bir sorun oluştu";
                            $err = 1;
                        }else{
                            $data["file"] = $image;
                        }
                    }
                    if($err == 0){
                        $add = $categoriesModel->update([
                            "name" => $name,
                            "parentID" => $parentID,
                            "sort"=>$sort,
                            "image"=>$data["file"]
                        ],$id);
                        if($add){
                            $data["alertType"] = "success";
                            $data["alert"] = "Başarıyla tamamlandı!";
                        }else $data["alert"] = "Bir sorun oluştu!";
                    }
                }else $data["alert"] = "Boş alan bırakmayınız!";
            }

            $this->loadTemplate("Categories/add",$data);
        }

        function delete($id){
            $categoriesModel =  new CategoriesModel();
            $productsModel = new ProductsModel();
            if(!$categoriesModel->get($id)) App::route(ADMIN_URL."categories");

            $categories = explode(",",MyHelpers::categoryID(MyHelpers::categories($id)));
            $remove = array_diff( $categories , [""," "]);
            $remove[] = $id;

            $products = $productsModel->getWithCategories($remove);
            $deleteProducts = [];
            foreach($products as $product){
                $deleteProducts[] = $product["productID"];
            }

            $delete = $categoriesModel->delete($remove);
            if($delete){
                $deletePro = $productsModel->delete($deleteProducts);
                if($deletePro){
                    App::route(ADMIN_URL."categories");
                }else $this->loadTemplate("alert", ["type" => "error", "alert" => $categories->errorMessage()]);
            }else $this->loadTemplate("alert", ["type" => "error", "alert" => $categories->errorMessage()]);


        }
    }