<?php

class Application_Model_Order  extends Zend_Db_Table_Abstract
{
    protected $_name = "orders"; //table name
    
    function getOrders($date1,$date2,$id){
       
        $select = $this->select()
                         ->from(array('o' => 'orders'), //t1
                                array('order_date','user_id'))  //select cols from table
                             ->join(array('r' => 'product_order'),   //t2
                                    'o.id = r.order_id')
                        ->where('o.order_date > ?', $date1) 
                        ->where('o.order_date < ?', $date2)
                        ->where('o.user_id = ?', $id);
        
        $select->setIntegrityCheck(false);
        return $select->fetchAll()->toArray();
    }


}

