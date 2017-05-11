<?php
    namespace App\Models;

    use System\Core\Model;

    class OrdersModel extends Model{
        function getFullDesks(){
            return $this->db->select("desks","*",["tempID[!]"=>0]);
        }

        function getOrders($id){
            return $this->db->select("orders","*",["tempDeskID" => $id]);
        }

        function getBaskets($id){
            $db =  $this->db->select("baskets",[ "[><]products" => ["productID"=>"productID"] , "[><]orders" => ["orderID"=>"orderID"]],"*",["baskets.orderID"=>$id]);
            return $db;
        }

        function closeDesk($id){
            return $this->db->update("desks",["tempID"=>0],["desksID"=>$id]);
        }
    }