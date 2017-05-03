<?php
    namespace App\Helpers;

    use App\Models\CategoriesModel;

    class MyHelpers{
        static function upload($file,$dir,$name=null,$data=[]){
            include_once "vendor/verot/class.upload.php/src/class.upload.php";

            $image = new \upload($file);
            if($name === null)
                $name = md5(sha1(rand(0,99999).microtime(true)));
            $image->file_new_name_body = $name;

            if(!isset($data["allowed"])) {
                $data["allowed"] = ["image/*"];
                if(!isset($data["image_convert"]))
                    $data["image_convert"]="jpg";
            }

            foreach($data as $key=>$value)
                $image->$key = $value;

            $image->process(PUBLIC_DIR."Uploads/".trim($dir,"/")."/");
            if($image->processed){
                $name = $image->file_dst_name;
                $image->clean();
                return $name;
            }
            $image->clean();
            return false;
        }

        static function categories($id){
            $categoriesModel = new CategoriesModel();
            $category = $categories = $categoriesModel->select($id);
            if($category) {
                $categories = [];
                foreach ($category as $categori) {
                    $categori["subcategories"] = Self::categories($categori["categoryID"]);
                    $categories[] = $categori;
                }

                return $categories;
            }
        }

        static function categoryShow($array,$currentCategory,$parentID=0,$tire = ""){
            if($array){
                foreach($array as $arr){
                    if($currentCategory == $arr["categoryID"]) continue;

                    echo '<option value="'.$arr['categoryID'].'" '.($arr["categoryID"]==$parentID?'selected':null).'>'.$tire." ".stripslashes($arr["name"]).'</option>';
                    if($arr["subcategories"])
                        Self::categoryShow($arr["subcategories"], $currentCategory,$parentID,$tire." - ");
                }
            }
        }

        static function categoryID($array){
            $ids = "";
            if($array){
                foreach($array as $arr){
                    $ids .= $arr['categoryID'].",";
                    if($arr["subcategories"])
                        $ids .= Self::categoryID($arr["subcategories"]);
                }
            }
            return $ids;
        }
    }