<?php 
class IndexAction extends CAction{
	//服务项目首页
	public function run(){	   
	    $item_model = Item::getList();		
		$this->controller->render('index',array('item_model'=>$item_model));
	}
}