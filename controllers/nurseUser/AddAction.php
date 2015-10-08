<?php 
class AddAction extends CAction{
	//添加护士信息
	public function run(){
		
		$nurseUser_model = new NurseUser();
		$itemrealte_model = new ItemRelate();
		$item_model = Item::getList();
		$com_id = $this->controller->comId;
		//定义性别信息
		$sex = array(
				'0'=>'男',
				'1'=>'女',
		);
		//定义服务信息
		$item = array();
		 foreach ($item_model as $V){
			$item[$V['id']]=$V['name'];
		} 
		if(isset($_POST['NurseUser'])){
			
	//		$_POST['NurseUser']['item_relate_id']=implode(',',$_POST['NurseUser']['item_relate_id']); 
			$nurseUser_model->attributes = $_POST['NurseUser'];	
			//文件上传
			$file=CUploadedFile::getInstance($nurseUser_model,'thumb'); //获取表单名为thumb的上传信息
			if(is_object($file) && (get_class($file)==='CUploadedFile')){
				$filename=date("YmdHis").'_'.rand(0,9999).'.'.$file->extensionName;//获取文件名
				$nurseUser_model->thumb='/images/weimob/'.$filename;//数据库中要存放文件名
				$uploadfile='./images/weimob/'.$filename;
				$file->saveAs($uploadfile,true);//上传操作
			}
			//print_r($_POST['ItemRelate']['item_id']);die;
			if($nurseUser_model->save()){
				if(isset($_POST['ItemRelate'])){
					foreach ($_POST['ItemRelate']['item_id'] as $V){
						$_POST['ItemRelate']['item_id']=$V;
						$_POST['ItemRelate']['nurser_id']=$nurseUser_model->id;
						//克隆新对象，防止覆盖前面保存的数据
						$_itemrealte_model = clone $itemrealte_model;
						$_itemrealte_model->attributes = $_POST['ItemRelate'];
						$_itemrealte_model->save();
					}
				}
				$this->controller->redirect('/mama/nurseuser/index');
			}	 
		}
		$vars = array(
				'sex'=>$sex,
				'nurseUser_model'=>$nurseUser_model,
				'itemrealte_model'=>$itemrealte_model,
				'item'=>$item,
				'item_model'=>$item_model
		);	
		$this->controller->render('add',$vars);
	}
}
