<?php 
class FinishAction extends CAction{
	
	public function run($id){			
		
		$model = Order::model()->findByPk($id);
		$nurser_id = $model->nurser_id;
		$nurse_model = NurseUser::model()->findByPk($nurser_id);
		//完成订单后，护士状态呈现未安排
		$nurse_model->status = 0;
		$model->order_status = 2;
		if($model->update() && $nurse_model->update()){
			$flag = 0;
		}
		else{
			$flag = 1;
		}
		$vars = array(
			'flag'=>$flag
		);
		$this->controller->success('',$vars);
		
	}
}