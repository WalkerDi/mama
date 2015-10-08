<?php 
class SearchAction extends CAction{
	//订单查询
	public function run(){
		
		$order_status = $_POST['order_status'];
		//echo $order_status;die;
		/* if(empty($order_status)){
			$this->controller->redirect('/mama/order/index');
		} */
		$order_info = Order::findOrderByStatus($order_status);
		
		if(empty($order_info)){
			
			$this->controller->redirect('/mama/order/index');
		}
		$this->controller->render('search',array('order_info'=>$order_info));
	}
}