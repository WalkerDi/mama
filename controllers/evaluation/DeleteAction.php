<?php 
class DeleteAction extends CAction{
	
	public function run($id){			
		
		$evaluation_info = Evaluation::model()->findByPk($id);
		if($evaluation_info->delete()){
			$this->controller->success('');			
		}
	}
}