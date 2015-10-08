<?php 
class IndexAction extends CAction{
	public function run(){
		
		$nurser_id = Yii::app()->request->getParam('id',0);
		$evaluation_model = Evaluation::getList($nurser_id);
		//print_r($evaluation_model);die;
		$vars = array(
				'evaluation_model'=>$evaluation_model,
		);
		$this->controller->render('index',$vars);
	}
			
	
}