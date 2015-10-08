<?php

/**
 * This is the model class for table "t_order".
 *
 * The followings are the available columns in table 't_order':
 * @property integer $id
 * @property integer $com_id
 * @property string $server_name
 * @property string $order_status
 * @property integer $item_id
 * @property integer $customer_id
 * @property integer $nurser_id
 * @property string $book_time
 * @property string $remark
 * @property string $order_num
 * @property string $create_time
 * @property string $update_time
 */
class Order extends NurserAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 't_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_id, item_id, nurser_id, customer_id', 'numerical', 'integerOnly'=>true),
			array('server_name, order_num', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>100),
			array('order_status, book_time, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, com_id, server_name, order_status, item_id, customer_id, book_time, remark, order_num, create_time, update_time', 'safe', 'on'=>'search'),
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
			'server_name' => 'Server Name',
			'order_status' => 'Order',
			'item_id' => 'Item',
			'nurser_id'=>'Nurse',
			'customer_id'=>'Customer',	
			'book_time' => 'Book Time',
			'remark' => 'Remark',
			'order_num' => 'Order Num',
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
		$criteria->compare('server_name',$this->server_name,true);
		$criteria->compare('order_status',$this->order_status,true);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('book_time',$this->book_time,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('order_num',$this->order_num,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
 	//订单首页
	public static function getOrderList(){
		$model = Order::model();
		$command = $model->getDbConnection()->CreateCommand();
		$condition = "a.item_id=b.id";
		return $command->select('b.name,b.price,a.*')
		->from('t_order a,t_item b')
		->where($condition)
		->order('book_time ASC')
		->queryAll();
	}
	//订单查询
	public static function findOrderByStatus($order_status){
		if($order_status=="未接单"){
			$order_status=0;
		}
		else if($order_status=="已接单"){
			$order_status=1;
			}
		else if($order_status=="已付款"){
			$order_status=2;
		}
		else if($order_status=="已完成"){
			$order_status=3;
		}
		else if($order_status=="已取消"){
			$order_status=4;
		}
		$model = Order::model();
		$command = $model->getDbConnection()->CreateCommand();
		$condition = "a.item_id=b.id And a.order_status={$order_status}";
		return $command->select('b.name,b.price,a.*')
		->from('t_order a,t_item b')
		->where($condition)
		->order('book_time ASC')
		->queryAll();
	} 
/* 	//订单首页
	public static function getList(){
		$model = Order::model();
		$command = $model->getDbConnection()->CreateCommand();
		$tableName = $model->tableName();
		return $command->select()
		->from($tableName)
		->order('book_time ASC')
		->queryAll();
	} */
	
	//订单编辑查询
	public static function updateList($id){
		$model = Order::model();
		$command = $model->getDbConnection()->CreateCommand();
		$condition = "a.item_id=b.id And a.id={$id}";
		return $command->select('b.name,b.price,a.*')
		->from('t_order a,t_item b')
		->where($condition)
		->queryAll();
	}
	//关联护士表
 	public static function getNurserList(){
		$model = Order::model();
		$command = $model->getDbConnection()->CreateCommand();
 		//$tableName = $model->tableName();	
 		return $command
 		->select('a.* ,b.name')
 		->from('t_order a,t_nurse_user b')
		->where('a.nurser_id = b.id')
		->order('book_time ASC')
		->queryAll();
 	} 
}