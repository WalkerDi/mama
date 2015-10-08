<?php 
class IndexAction extends CAction{
	//订单首页
	public function run(){
		
	    $order_model = Order::getOrderList();
	  	$nurser = NurseUser::getNOList();
	  	//print_r($order_model);die;	
	  	$vars = array(
	  		'order_model'=>$order_model,
	  		//'nurser'=>$nurser
	  	);
		$this->controller->render('index',$vars);
	}
}