<?php 
class AddAction extends CAction{
    //添加值班信息
    public function run(){
        $duty_modle = new Duty();
        $com_id = $this->controller->comId;
        $hour_time = $_POST['start_time'].'-'.$_POST['over_time'];
        //echo $hour_time;die;
        //$duty_modle->setAttributes($_POST);
        $duty_modle->day_time = $_POST['day_time'];
        $duty_modle->nurser_id = $_POST['nurser_id'];
        $duty_modle->hour_time = $hour_time;
        $duty_modle->com_id = $com_id;
        if($duty_modle->save()){
            
            $this->controller->redirect('/mama/duty/index/id/'+$duty_modle->nurser_id);
        }
        
    }
}
