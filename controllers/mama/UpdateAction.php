<?php 
class UpdateAction extends CAction{
	//编辑项目信息
	public function run(){
		
		$id = Yii::app()->request->getParam('id',0);
		$mama_model = Mama::model()->findByPk($id);
		$area_model = new Area();
		$imgArray = explode(",",$mama_model->logo);
		//print_r($imgArray);die;
		if(isset($_POST['Mama'])){
			$mama_model->attributes = $_POST['Mama'];		
			//文件上传
			$file=CUploadedFile::getInstance($mama_model,'logo'); //获取表单名为logo的上传信息
			if(is_object($file) && (get_class($file)==='CUploadedFile')){
				$filename=date("YmdHis").'_'.rand(0,9999).'.'.$file->extensionName;//获取文件名
				array_push($imgArray,'/images/weimob/'.$filename); 
				//print_r($imgArray);die;
				$img = implode(",",$imgArray);
				$mama_model->logo=$img;
			
				$uploadfile='./images/weimob/'.$filename;
				$file->saveAs($uploadfile,true);//上传操作
			}
			if($mama_model->save()){
				
				$this->controller->redirect('/mama/mama/index');
				}			    
		}
		$vars = array(
			'mama_model'=>$mama_model,
		);	
		$this->controller->render('update',$vars);
	}
}
