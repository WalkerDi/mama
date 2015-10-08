<?php 
class DelImgAction extends CAction{
	
	public function run($id,$K){			
		
		$mama_info = Mama::model()->findByPk($id);
		$imgArray = explode(",",$mama_info->logo);
		
		unset($imgArray[$K]);
		$img = implode(",",$imgArray);
		$mama_info->logo = $img;
		if($mama_info->save()){
			$this->controller->success('');			
		}
	}
}