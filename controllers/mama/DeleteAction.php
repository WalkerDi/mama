<?php 
class DeleteAction extends CAction{
	
	public function run($id){			
		
		$mama_info = Mama::model()->findByPk($id);
		if($mama_info->delete()){
			$this->controller->success('');			
		}
	}
}