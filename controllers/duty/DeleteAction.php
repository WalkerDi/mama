<?php 
class DeleteAction extends CAction{
	
	public function run($id){			
		
		$duty_info = Duty::model()->findByPk($id);
		if($duty_info->delete()){
			$this->controller->success('');			
		}
	}
}