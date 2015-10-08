<?php 
class  IndexAction extends CAction{
	//客户首页，按注册时间降序
	public function run(){
		$customer_model = Customer::getList();
		
		$this->controller->render('index',array('customer_model'=>$customer_model));
	}
	
}