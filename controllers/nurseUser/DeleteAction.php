<?php 
class DeleteAction extends CAction{
	
	public function run($id){			
		
		$nurse_info = NurseUser::model()->findByPk($id);
		if($nurse_info->delete()){
			$this->controller->success('');			
		}
	}
}