<?php 
class  IndexAction extends CAction{
	//护士值班安排首页
	public function run(){
		$nurser_id = Yii::app()->request->getParam('id',0);
		$duty_model = Duty::getList($nurser_id);
		$vars = array(
				'duty_model'=>$duty_model,
				'nurser_id'=>$nurser_id,
		);
		$this->controller->render('index',$vars);
	}
	
}