<?php 

class IndexAction extends CAction{
	
	public function run(){
// 		$com_id = $this->controller->comId;
// 		echo $com_id;
// 		exit();
		$nurse_model = NurseUser::getList();
		$com_id = $this->controller->comId;

		$vars = array(
			'nurse_model'=>$nurse_model
		);
		$this->controller->render('index',$vars);

	}
}