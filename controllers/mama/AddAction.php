<?php 
class AddAction extends CAction{
	//添加项目信息
	public function run(){
		
		$mama_model = new Mama();
		$com_id = $this->controller->comId;
		
		if(isset($_POST['Mama'])){
			$_POST['Mama']['com_id']= $com_id;
			$mama_model->attributes = $_POST['Mama'];		
			//文件上传
			$file=CUploadedFile::getInstance($mama_model,'logo'); //获取表单名为logo的上传信息
			if(is_object($file) && (get_class($file)==='CUploadedFile')){
				$filename=date("YmdHis").'_'.rand(0,9999).'.'.$file->extensionName;//获取文件名
				$mama_model->logo='/images/weimob/'.$filename;//数据库中要存放文件名
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
		$this->controller->render('add',$vars);
	}
}
