<?php
    namespace App\Models;
    use System\Core\Model;

    class UsersModel extends Model{
        function get($id=null){
            if(!$id)
                return $this->db->select("users","*",["ORDER"=>["rank"=>"DESC"]]);
            return $this->db->get("users","*",["userID"=>$id]);
        }

        function has($username,$id=null){
            $where["AND"] = ["username" => $username];
            if($id)
                $where["AND"]["userID[!]"] = $id;
            return $this->db->has("users",$where);
        }

        function update($data,$id){
            return $this->db->update("users",$data,["userID"=>$id]);
        }

        function delete($id){
            return $this->db->delete("users",["userID"=>$id]);
        }

        function add($data){
            return $this->db->insert("users",$data);
        }

        function login($username,$password){
            return $this->db->get("users","*",["AND" => ["username"=>$username,"password"=>$password]]);
        }
    }