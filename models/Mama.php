<?php

/**
 * This is the model class for table "t_mama".
 *
 * The followings are the available columns in table 't_mama':
 * @property integer $id
 * @property integer $com_id
 * @property integer $area_id
 * @property string $name
 * @property string $logo
 * @property string $create_time
 * @property string $update_time
 * @property string $help
 * @property string $clusecall_customer
 * @property string $call_customer
 * @property string $about
 * @property string $service_phone
 */
class Mama extends NurserAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mama the static model class
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
		return 't_mama';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_id, area_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('help, cluse, about, call_customer', 'length', 'max'=>10000),
			array('service_phone', 'length', 'max'=>50),
			array('logo',
					'file',    //定义为file类型
					'allowEmpty'=>true,
					'types'=>'jpg,png,gif',//上传文件的类型
					'maxSize'=>1024*1024*2, //上传大小限制，注意不是php.ini中的上传文件大小
					'tooLarge'=>'文件大于2M，上传失败！请上传小于2M的图片！'
			),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, com_id, area_id, name, logo, create_time, update_time, help, cluse, about, service_phone, call_customer', 'safe', 'on'=>'search'),
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
			'area_id' => 'Area',
			'name' => 'Name',
			'logo' => 'Logo',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'help' => 'Help',
			'cluse' => 'Cluse',
			'call_customer' => 'CallCustomer',
			'about' => 'About',
			'service_phone' => 'Service Phone',
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
		$criteria->compare('area_id',$this->area_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('help',$this->help,true);
		$criteria->compare('cluse',$this->cluse,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('call_customer',$this->call_customer,true);
		$criteria->compare('service_phone',$this->service_phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	//基本设置首页,按创建时间降序
	public static function getList(){
	
		$model = Mama::model();
		$command = $model->getDbConnection()->CreateCommand();
		$tableName = $model->tableName();
		return $command->select()
		->from($tableName)
		->order('create_time DESC')
		->queryAll();
	}
}