<?php

//Check the message of nurse

class ChNurserAction extends CAction {
    
    public function run($nurser_id,$order_id) {
    	
    	$order_model = Order::model()->findByPk($order_id);
    	//确认护士,并改成护士值班状态
    	$order_model->nurser_id = $nurser_id;
    	$nurse_model = NurseUser::model()->findBypk($nurser_id);
    	//选择后护士状态呈现已安排
    	$nurse_model->status = 1; 
    	//确认订单，改变状态
    	$order_model->order_status = 1;  
    	
    	if($order_model->update() && $nurse_model->update()){
    		$flag = 0;
    	}else{
    		$flag = 1;
    	}
    	
    	$vars = array(
    		'nurser_id'=>$nurser_id,
    		'order_id'=>$order_id,
    		'flag'=>$flag
    	);
    	$this->controller->success('',$vars);
    }

}