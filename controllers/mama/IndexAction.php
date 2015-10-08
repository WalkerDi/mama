<?php 
//基本设置首页
class IndexAction extends CAction{
	
	public function run(){
		
		$mama_model = Mama::getList();
		$vars = array(
			'mama_model'=>$mama_model
		);
		$this->controller->render('index',$vars);

	}
}