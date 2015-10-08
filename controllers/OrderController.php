<?php

class OrderController extends BaseNurserController{
	public function actions(){
		
		return array(
				//订单详情首页，按创建时间降序
				'index'=>array(
						'class'=>'mama.controllers.order.IndexAction'
				),	
				//选择护士
				'chNurser'=>array(
						'class'=>'mama.controllers.order.ChNurserAction'
				),	
				//完成订单
				'finish'=>array(
						'class'=>'mama.controllers.order.FinishAction'
				),					
				//编辑订单
				'update'=>array(
						'class'=>'mama.controllers.Order.UpdateAction'
				),
				//保存更新订单
				'updatewrite'=>array(
						'class'=>'mama.controllers.Order.UpdateWriteAction'
				),
				//删除订单
				'delete'=>array(
						'class'=>'mama.controllers.Order.DeleteAction'
				),
				//订单查询
				'search'=>array(
						'class'=>'mama.controllers.Order.SearchAction'
				),
		);
		
	}

	
}