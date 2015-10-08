<?php

//Check the message of nurse

class CheckAction extends CAction {
    
    public function run($status,$id) {
    	$nurseruser_info = NurseUser::model()->findByPk($id);
    	if($status==0){
    		$nurseruser_info->status = 1;
    	}else{
    		$nurseruser_info->status = 0;
    	}
    	if($nurseruser_info->update()){
    		$flag = 0;
    	}else{
    		$flag = 1;
    	}
    	
    	$vars = array(
    		'flag'=>$flag
    	);
    	$this->controller->success('',$vars);
    }

}