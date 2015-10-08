<?php

/**
 * This is the model class for table "t_evaluation".
 *
 * The followings are the available columns in table 't_evaluation':
 * @property integer $id
 * @property integer $customer_id
 * @property string $context
 * @property integer $nurser_id
 * @property string $create_time
 * @property string $update_time
 */
class Evaluation extends NurserAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Evaluation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->mamadb;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_evaluation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, nurser_id', 'numerical', 'integerOnly'=>true),
			array('context', 'length', 'max'=>100),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, customer_id, context, nurser_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'customer_id' => 'Customer',
			'context' => 'Context',
			'nurser_id' => 'Nurse',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('context',$this->context,true);
		$criteria->compare('nurser_id',$this->nurser_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	//评价详情首页,按创建时间降序
	public static function getList($nurser_id=''){
	
		$model = Evaluation::model();
		$command = $model->getDbConnection()->CreateCommand();
		$condition = "c.id=b.order_id And a.id=b.customer_id And b.nurser_id={$nurser_id}";
		return $command->select('a.name,c.server_name,b.context,b.create_time,b.id')
		->from('t_customer a, t_evaluation b, t_order c')
		->where($condition)
		->order('b.create_time DESC')
		->queryAll();
	}
}