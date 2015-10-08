<?php 

class SelNurseAction extends CAction{
	
	public function run(){
		$order_id = Yii::app()->request->getParam('order_id',0);
		//echo $order_id;die;
		$nurse_model = NurseUser::getNOList();
		$vars = array(
			'nurse_model'=>$nurse_model,
			'order_id'=>$order_id,
		);
		$this->controller->render('select',$vars);

	}
}