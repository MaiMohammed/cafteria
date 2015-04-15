<?php

class OrderController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function myordersAction() {
        $d = new Application_Form_Date();
        $this->view->datex = $d;
       if ($_GET['dataobj']) {
            $sdate = $_GET['dataobj'];
            $orderobj = new Application_Model_Order();

            $date = json_decode($sdate);          //$values = $d->getValues();
            echo json_encode($orderobj->getOrders($date->date, $date->enddate, $id));
            exit();
            //print_r($values);
        }
    }

}
