<?php 
class SearchAction extends CAction{
	//护士查询
	public function run(){
		
		$txt = Yii::app()->request->getParam('txt',0);
		if(empty($txt)){
			$this->controller->redirect('/mama/nurseuser/index');
		}
		$nurse_info = NurseUser::findSearch($txt);
		
		$this->controller->render('search',array('nurse_info'=>$nurse_info));
	}
}