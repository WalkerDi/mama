<?php

class EvaluationController extends BaseNurserController{
	public function actions(){
		return array(
				//评价详情首页，按创建时间降序
				'index'=>array(
						'class'=>'mama.controllers.evaluation.IndexAction'
				),
				//删除评价
				'delete'=>array(
						'class'=>'mama.controllers.evaluation.DeleteAction'
				),
				
				
		);
	}

	
}