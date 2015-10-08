<?php

class MamaController extends BaseNurserController
{
	public function actions(){
		return array(
				//项目管理首页
				'index'=>array(
						'class'=>'mama.controllers.mama.IndexAction'
				),
				//新增项目
				'add'=>array(
						'class'=>'mama.controllers.mama.AddAction'
				),
				//编辑项目
				'update'=>array(
						'class'=>'mama.controllers.mama.UpdateAction'
				),
				//删除项目
				'delete'=>array(
						'class'=>'mama.controllers.mama.DeleteAction'
				),
				//删除图片
				'DelImg'=>array(
						'class'=>'mama.controllers.mama.DelImgAction'
				),
				
		);
	}

	
}