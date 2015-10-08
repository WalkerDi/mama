<?php 
class DeleteAction extends CAction{
	
	public function run($id){			
		
		$customer_info = Customer::model()->findByPk($id);
		if($customer_info->delete()){
			$this->controller->success('');			
		}
	}
}