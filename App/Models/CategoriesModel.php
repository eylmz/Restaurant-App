<?php
    namespace App\Models;
    use System\Core\Model;
    class CategoriesModel extends Model{
        function get($id){
            return $this->db->get("categories","*",["categoryID"=>$id]);
        }

        function select($id=null){
            $where = [];
            if($id!==null)
                $where = ["parentID"=>$id];
            return $this->db->select("categories","*",$where);
        }

        function add($data){
            return $this->db->insert("categories",$data);
        }

        function update($data,$id){
            return $this->db->update("categories",$data,["categoryID"=>$id]);
        }

        function delete($id){
            return $this->db->delete("categories",["categoryID"=>$id]);
        }
    }
?>