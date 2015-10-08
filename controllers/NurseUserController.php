<?php

class NurseUserController extends BaseNurserController{
	
	public function actions(){
		return array(
				//护士首页,按时间降序
				'index'=>array(
						'class'=>'mama.controllers.nurseUser.IndexAction'
				),
				//查找
				'search'=>array(
						'class'=>'mama.controllers.nurseUser.SearchAction'
				),
				//新增
				'add'=>array(
						'class'=>'mama.controllers.nurseUser.AddAction'
				),
				//删除
				'delete'=>array(
						'class'=>'mama.controllers.nurseUser.DeleteAction'
				),
				//编辑
				'update'=>array(
						'class'=>'mama.controllers.nurseUser.UpdateAction'
				),
				//审核
				'check'=>array(
						'class'=>'mama.controllers.nurseUser.CheckAction'
				),
				//选择护士
				'selNurse'=>array(
						'class'=>'mama.controllers.nurseUser.SelNurseAction'
				),
				//确定护士
				'okNurse'=>array(
						'class'=>'mama.controllers.nurseUser.OkNurseAction'
				),
		);
	}
}