<?php

class DutyController extends BaseNurserController{
	public function actions(){
		return array(
				//值班安排首页，按创建时间降序
				'index'=>array(
						'class'=>'mama.controllers.duty.IndexAction'
				),
				//添加值班信息
				'add'=>array(
						'class'=>'mama.controllers.duty.AddAction'
				),
				//删除值班信息
				'delete'=>array(
						'class'=>'mama.controllers.duty.DeleteAction'
				),
				
				
		);
	}

	
}