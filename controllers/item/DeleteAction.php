<?php 
class DeleteAction extends CAction{
	
	public function run($id){			
		
		$item_info = Item::model()->findByPk($id);
		if($item_info->delete()){
			$this->controller->success('');			
		}
	}
}