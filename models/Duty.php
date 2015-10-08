<?php

/**
 * This is the model class for table "t_duty".
 *
 * The followings are the available columns in table 't_duty':
 * @property integer $id
 * @property integer $com_id
 * @property string $hour_time
 * @property integer $nurser_id
 * @property string $create_time
 * @property string $update_time
 * @property string $day_time
 */
class Duty extends NurserAR
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 't_duty';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('com_id, nurser_id', 'numerical', 'integerOnly'=>true),
            array('hour_time, day_time', 'length', 'max'=>11),
            array('create_time, update_time', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, com_id, hour_time, nurser_id, create_time, update_time, day_time', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'com_id' => 'Com',
            'hour_time' => 'Hour Time',
            'nurser_id' => 'Nurser',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'day_time' => 'Day Time',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('com_id',$this->com_id);
        $criteria->compare('hour_time',$this->hour_time,true);
        $criteria->compare('nurser_id',$this->nurser_id);
        $criteria->compare('create_time',$this->create_time,true);
        $criteria->compare('update_time',$this->update_time,true);
        $criteria->compare('day_time',$this->day_time,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * @return CDbConnection the database connection used for this class
     */
    public function getDbConnection()
    {
        return Yii::app()->mamadb;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Duty the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


    
    public static function getList($nurser_id){
        $model = Duty::model();
        //$tableName = $model->tableName();
        $condition = "a.nurser_id = b.id And a.nurser_id={$nurser_id}";
        $command = $model->getDbConnection()->CreateCommand();
        return $command->select('b.name,a.*')
        ->from('t_duty a,t_nurser_user b')
        ->where($condition)
        ->order('a.day_time ASC')
        ->queryAll();
    }
    
    public static  function riqi($day_time){
        $whichD=date('w',strtotime($day_time));
        $weeks=array();
        for($i=0;$i<7;$i++){
        if($i<$whichD){
            $date=strtotime($day_time)-($whichD-$i)*24*3600;
        }else{
            $date=strtotime($day_time)+($i-$whichD)*24*3600;
        }
            $weeks[$i]=date('Y-m-d',$date);
         
        }
        return $weeks;
    }
    
    
    public static function wk($date1) {
        $datearr = explode("-",$date1);     //将传来的时间使用“-”分割成数组
        $year = $datearr[0];       //获取年份
        $month = sprintf('%02d',$datearr[1]);  //获取月份 
        $day = sprintf('%02d',$datearr[2]);      //获取日期
        $hour = $minute = $second = 0;   //默认时分秒均为0
        $dayofweek = mktime($hour,$minute,$second,$month,$day,$year);    //将时间转换成时间戳
        $shuchu = date("w",$dayofweek);      //获取周值
        $weekarray=array("周日","周一","周二","周三","周四","周五","周六"); 
        return $weekarray[$shuchu]; 
    }
    
    
    
    
}