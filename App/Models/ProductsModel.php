<?php
    namespace App\Models;

    use System\Core\Model;

    class ProductsModel extends Model{
        function add($data){
            return $this->db->insert("products",$data);
        }

        function addImages($data){
            return $this->db->insert("productimages",$data);
        }

        function get($id=0){
            if($id)
                return $this->db->get("products","*",["productID"=>$id]);
            return $this->db->select("products","*");
        }
    }