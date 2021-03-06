<?php

//Check the message of nurse

class OkNurseAction extends CAction {
    
    public function run($nurser_id,$order_id) {
    	//throw new RuntimeException($nurser_id);
    	$order_model = Order::model()->findByPk($order_id);
		if(!empty($order_model->nurser_id)){
			$id = $order_model->nurser_id;
			$nurser_model = NurseUser::model()->findByPk($id);
			$nurser_model->status = 0;
			if(!$nurser_model->update()){
				throw new RuntimeException("数据保存失败");
			}
		}
    	//确认护士,并改成护士值班状态
    	$order_model->nurser_id = $nurser_id;
    	$nurse_model = NurseUser::model()->findBypk($nurser_id);
    	//选择后护士状态呈现已安排
    	$nurse_model->status = 1; 
		//throw new RuntimeException($phone);
    	$order_model->order_status = 1;  
    	
    	if($order_model->update() && $nurse_model->update()){
    		$flag = 0;
			//$phone = $nurse_model->phone;
			//$message = "橙妈妈用户已下单，请您在30分钟内确认订单...";
			//SmsCode::SendMsgs($phone,$message);
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