<?php 
class AddAction extends CAction{
	//新增服务
	public function run(){
		
		//$nurse_ids = Yii::app()->request->getParam('id',0);
		$item_model = new Item();
		$com_id = $this->controller->comId;
		if(isset($_POST['Item'])){
			$_POST['Item']['com_id'] = $com_id;
			$item_model->attributes =$_POST['Item'];
			if($item_model->save()){
				$this->controller->redirect('/mama/item/index');
			}
		} 
		
		$this->controller->render('add',array('item_model'=>$item_model));
	}
}