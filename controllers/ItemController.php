<?php

class ItemController extends BaseNurserController{
	public function actions(){
		
		return array(
				//服务首页
				'index'=>array(
						'class'=>'mama.controllers.item.IndexAction'
				),
				//新增服务
				'add'=>array(
						'class'=>'mama.controllers.item.AddAction'
				),
				//编辑服务
				'update'=>array(
						'class'=>'mama.controllers.item.UpdateAction'
				),
				//删除服务
				'delete'=>array(
						'class'=>'mama.controllers.item.DeleteAction'
				),
		);
		
	}

	
}