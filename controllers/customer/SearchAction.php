<?php 
class SearchAction extends CAction{
	//客户查询
	public function run(){
		
		$txt = Yii::app()->request->getParam('txt',0);
		if(empty($txt)){
			$this->controller->redirect('/nurser/customer/index');
		}
		$customer_info = Customer::findSearch($txt);
		
		$this->controller->render('search',array('customer_info'=>$customer_info));
	}
}