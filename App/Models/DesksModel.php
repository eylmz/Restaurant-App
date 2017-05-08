<?php
    namespace App\Models;

    use System\Core\Model;

    class DesksModel extends Model{
        function get($id = 0){
            if($id)
                return $this->db->get("desks","*",["desksID"=>$id]);
            return $this->db->select("desks","*",["deleteAt"=>0]);
        }

        function add($data){
            return $this->db->insert("desks",$data);
        }

        function update($data,$id){
            return $this->db->update("desks",$data,["desksID"=>$id]);
        }

        function delete($id){
            return $this->db->update("desks",["deleteAt"=>1],["desksID"=>$id]);
        }
    }