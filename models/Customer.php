<?php

/**
 * This is the model class for table "t_customer".
 *
 * The followings are the available columns in table 't_customer':
 * @property integer $id
 * @property integer $com_id
 * @property string $open_id
 * @property string $name
 * @property integer $sex
 * @property string $phone
 * @property string $description
 * @property string $address
 * @property integer $order_id
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 */
class Customer extends NurserAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
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
		return 't_customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_id, sex, order_id, status', 'numerical', 'integerOnly'=>true),
			array('open_id', 'length', 'max'=>200),
			array('name', 'length', 'max'=>11),
			array('phone', 'length', 'max'=>50),
			array('description', 'length', 'max'=>200),
			array('address', 'length', 'max'=>400),
			array('create_time, update_time, status,address', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, com_id, open_id, name, sex, phone, description, address, order_id, status, create_time, update_time', 'safe', 'on'=>'search'),
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
			'open_id' => 'Open',
			'name' => 'Name',
			'sex' => 'Sex',
			'status'=>'Status',
			'phone' => 'Phone',
			'description' => 'Description',
			'address' => 'Address',
			'order_id' => 'Order',
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
		$criteria->compare('com_id',$this->com_id);
		$criteria->compare('open_id',$this->open_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getList(){
		$model = Customer::model();
		$tableName = $model->tableName();
		$command = $model->getDbConnection()->CreateCommand();
		return $command->select()
		->from($tableName)
		->order('create_time DESC')
		->queryAll();
		
	}
	
	public static function findSearch($txt){
	
		$model = Customer::model();
		return $model->find('open_id=:txt or phone=:txt or name=:txt',array(':txt'=>$txt));
	}
}