<?php
    namespace App\Controllers;

    use App\Core\MyController;
    use App\Models\DesksModel;
    use App\Models\OrdersModel;
    use System\Core\App;

    class OrdersController extends MyController{
        function get(){
            $ordersModel = new OrdersModel();

            $desks = $ordersModel->getFullDesks();

            $this->loadTemplate("Orders/get",["desks"=>$desks]);
        }

        function close($id){
            $desksModel = new DesksModel();
            $ordersModel = new OrdersModel();

            $desk = $desksModel->get((int)$id);
            $orders = $ordersModel->getOrders((int)$desk["tempID"]);

            if(!$desk || !$orders) App::route(ADMIN_URL."orders");

            $ordersID = [];
            foreach($orders as $order){
                $ordersID[] = $order["orderID"];
            }

            $baskets = $ordersModel->getBaskets($ordersID);
            //var_dump($ordersID);
            if(!$baskets) App::route(ADMIN_URL."orders");

            if($_POST){
                $ordersModel->closeDesk($id);
                App::route(ADMIN_URL."orders");
            }

            $this->loadTemplate("Orders/close",["baskets"=>$baskets]);
        }
    }