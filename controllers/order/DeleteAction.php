<?php 
class DeleteAction extends CAction{
	
	public function run($id){			
		
		$order_info = Order::model()->findByPk($id);
		if($order_info->delete()){
			$this->controller->success('');			
		}
	}
}