<?php 
class UpdateAction extends CAction{
	//编辑护士信息
	public function run(){

		$id = Yii::app()->request->getParam('id',0);
		$customer_info = Customer::model()->findByPk($id);
		//定义性别信息
		$sex = array(
				'0'=>'男',
				'1'=>'女',
		);
		if(isset($_POST['Customer'])){	
			$customer_info->attributes = $_POST['Customer'];
			if($customer_info->save()){		    			   			    			    	
				$this->controller->redirect('/mama/Customer/index');
			}
		}
		$var = array(
				'sex'=>$sex,
				'customer_info'=>$customer_info,
		);
		$this->controller->render('update',$var);
	}
}
