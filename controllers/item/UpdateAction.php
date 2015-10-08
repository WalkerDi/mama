<?php 
class UpdateAction extends CAction{
	//编辑服务
	public function run(){
		
		$id= Yii::app()->request->getParam('id',0);	
		$item_model = Item::model()->findByPk($id);
		
		if(isset($_POST['Item'])){
			$item_model->attributes =$_POST['Item'];
			if($item_model->save()){
				$this->controller->redirect("/mama/item/index/");
			}
		} 
		$this->controller->render('update',array('item_model'=>$item_model));
	}
}