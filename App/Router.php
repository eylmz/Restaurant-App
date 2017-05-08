<?php
    use System\Core\Route;

    Route::any("admin/products/addImage/{id}","Products@addImage")->where("id","[0-9]+");
    Route::any("admin/categories/get/{id}","Categories@get")->where("id","[0-9]+");
    Route::any("admin/{controller}/update/{id}","{?}@update")->where("id","[0-9]+");
    Route::any("admin/{controller}/delete/{id}","{?}@delete")->where("id","[0-9]+");

    Route::any("admin/{controller}/{method}","{?}@{?}");
    Route::any("admin/{controller}","{?}@get");
    Route::any("admin/","Login@get");


    Route::any("services/add",function(){
        $data = [
            "err" => 1,
            "errMes" => "",
        ];

        $deskID = (int)@$_POST["deskID"];

        $products = trim(strip_tags(@$_POST["products"]));
        $products = json_decode($products);
        $products = @$products->products;

        $productIDs = [];


        if(count($products)){
            foreach ($products as $product){
                $productIDs[] = [
                    'productID'=>(int)$product->productID,
                    "piece" => (int)$product->piece
                ];
            }

            if(count($productIDs)){
                $data["err"] = 0;
                $data["products"] = $productIDs;
                $data["deskID"] = $deskID;
                $data["orderID"] = rand(1,9254654);
            }else $data["errMes"] = "Boş sepet gönderemezsiniz!";
        }else $data["errMes"] = "Boş sepet gönderemezsiniz!";

        echo json_encode( $data , 256);
    });

    Route::any("{every}",function(){
        //header("HTTP/1.0 404 Not Found");
    });