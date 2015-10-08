<?php 
class UpdateWriteAction extends CAction{
	//保存更新订单
	public function run(){
		$order_mdoel = Order::model();
		$id = $_POST['id'];
		//print_r($_POST);die;
		if(isset($_POST)){
			//$order_mdoel->setAttributes($_POST);
			if($order_mdoel->updateByPk($id,$_POST)){
				$this->controller->redirect('/mama/order/index');
			}
		}
	}
}