<?php 
class UpdateAction extends CAction{
	//编辑订单信息
	public function run(){

		$id = Yii::app()->request->getParam('id',0);
		$order_info = Order::updateList($id);
		$item_info = Item::getList();
		//print_r($order_info);die;
	
		$var = array(
				'order_info'=>$order_info,
				'item_info'=>$item_info,
		);
		$this->controller->render('update',$var);
	}
}
