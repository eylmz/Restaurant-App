<?php
    namespace App\Controllers;

    use App\Core\MyController;
    use App\Helpers\MyHelpers;
    use App\Models\ProductsModel;
    use System\Core\App;

    class ProductsController extends MyController{
        function add(){
            $productModel = new ProductsModel();
            $categories = MyHelpers::categories(0);

            $data = [
                "alert"=>"",
                "alertType"=>"error",
                "categories" => $categories,
                "name"=>"",
                "description"=>"",
                "price"=>0,
                "category"=>0,
                "parentID"=>0
            ];

            if($_POST){
                $name = addslashes(trim(strip_tags($_POST["name"])));
                $description = addslashes(trim(strip_tags($_POST["description"])));
                $price = (double)$_POST["price"];
                $category = (int)$_POST["category"];

                if($name && $description && $price && $category){
                    $add = $productModel->add([
                       "name"=>$name,
                        "description"=>$description,
                        "price"=>$price,
                        "category"=>$category
                    ]);

                    if($add){
                        $productID = $productModel->lastID();
                        $images = array();
                        foreach ($_FILES['images'] as $k => $l) {
                            foreach ($l as $i => $v) {
                                if (!array_key_exists($i, $images))
                                    $images[$i] = array();
                                $images[$i][$k] = $v;
                            }
                        }

                        $productImages = [];
                        foreach($images as $image){
                            $uploaded = MyHelpers::upload($image,"Products");
                            if($uploaded){
                                $productImages[] = [
                                    "image"=>$uploaded,
                                    "productID"=>$productID
                                ];
                            }
                        }

                        $addImages = $productModel->addImages($productImages);
                        if($addImages){
                            $data["alertType"]="success";
                            $data["alert"]="Ürün başarıyla eklendi!";
                        }else $data["alert"] = "Bir sorun oluştu!";
                    }else $data["alert"]="Bir sorun oluştu";
                }else $data["alert"] = "Boş alan bırakmayınız!";
            }

            $this->loadTemplate("Products/add",$data);
        }

        function update($id){
            $productModel = new ProductsModel();
            $id = (int)$id;
            $product = $productModel->get($id);
            if(!$product) App::route(ADMIN_URL."products");

            $categories = MyHelpers::categories(0);
            $data = [
                "alertType"=>"error",
                "alert"=>"",
                "name"=>stripslashes($product["name"]),
                "description"=>stripslashes($product["description"]),
                "price"=> $product["price"],
                "categories"=>$categories,
                "parentID"=>$product["category"],
                "currentCategory"=>0,
            ];

            if($_POST){
                $name = addslashes(trim(strip_tags($_POST["name"])));
                $description = addslashes(trim(strip_tags($_POST["description"])));
                $price = (double)$_POST["price"];
                $category = (int)$_POST["category"];

                if($name && $description && $price && $category){
                    $update = $productModel->update([
                        "name"=>$name,
                        "description"=>$description,
                        "price"=>$price,
                        "category"=>$category
                    ],$id);

                    if($update){
                        $data["alertType"]="success";
                        $data["alert"]="Ürün başarıyla düzenlendi!";
                        App::route(ADMIN_URL."products",2);
                    }else $data["alert"]="Bir sorun oluştu";
                }else $data["alert"] = "Boş alan bırakmayınız!";
            }

            $this->loadTemplate("Products/update",$data);
        }

        function addImage($id){
            $productModel = new ProductsModel();
            $id = (int)$id;
            $product = $productModel->get($id);
            if(!$product) App::route(ADMIN_URL."products");

            $data = [
                "alertType"=>"error",
                "alert"=>"",
                "product"=>$product
            ];

            if($_POST && $_FILES["images"]){
                $images = array();
                foreach ($_FILES['images'] as $k => $l) {
                    foreach ($l as $i => $v) {
                        if (!array_key_exists($i, $images))
                            $images[$i] = array();
                        $images[$i][$k] = $v;
                    }
                }

                $productImages = [];
                foreach($images as $image){
                    $uploaded = MyHelpers::upload($image,"Products");
                    if($uploaded){
                        $productImages[] = [
                            "image"=>$uploaded,
                            "productID"=>$id
                        ];
                    }
                }

                $addImages = $productModel->addImages($productImages);
                if($addImages){
                    $data["alertType"]="success";
                    $data["alert"]="Resimler başarıyla eklendi!";
                    App::route(ADMIN_URL."products",2);
                }else $data["alert"] = "Bir sorun oluştu!";
            }
            $this->loadTemplate("Products/addImage",$data);
        }

        function get(){
            $productModel = new ProductsModel();

            $this->loadTemplate("Products/get",["products"=>$productModel->get()]);
        }

        function delete($id=0){
            $productModel = new ProductsModel();
            $id = (int)$id;
            $product = $productModel->get($id);
            if(!$product) App::route(ADMIN_URL."products");

            $images = $productModel->getImages($id);
            foreach ($images as $image){
               @unlink(PUBLIC_URL."Uploads/Products/".$image["image"]);
            }

            $sil = $productModel->delete($id);
            if($sil){
                App::route(ADMIN_URL."products");
            }else $this->loadTemplate("alert", ["type" => "error", "alert" => $productModel->errorMessage()]);
        }
    }