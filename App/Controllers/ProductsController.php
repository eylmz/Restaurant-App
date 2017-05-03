<?php
    namespace App\Controllers;

    use App\Core\MyController;
    use App\Helpers\MyHelpers;
    use App\Models\ProductsModel;

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
                "category"=>0
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

        function get(){
            $productModel = new ProductsModel();

            $this->loadTemplate("Products/get",["products"=>$productModel->get()]);
        }
    }