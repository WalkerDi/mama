<?php

//Check the message of customer

class CheckAction extends CAction {
    
    public function run($status,$id) {
    	$customer_info = Customer::model()->findByPk($id);
    	if($status==0){
    		$customer_info->status = 1;
    	}else{
    		$customer_info->status = 0;
    	}
    	if($customer_info->update()){
    		$flag = 0;
    	}else{
    		$flag = 1;
    	}
    	
    	$vars = array(
    		'flag'=>$flag
    	);
    	$this->controller->success('',$vars);
    }

}