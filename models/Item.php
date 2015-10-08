<?php

/**
 * This is the model class for table "t_item".
 *
 * The followings are the available columns in table 't_item':
 * @property integer $id
 * @property integer $com_id
 * @property string $thumb
 * @property string $name
 * @property string $description
 * @property string $brief
 * @property string $price
 * @property string $price_desc
 * @property integer $nurse_ids
 * @property string $create_time
 * @property string $update_time
 */
class Item extends NurserAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Item the static model class
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
		return 't_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_id, nurse_ids', 'numerical', 'integerOnly'=>true),			
			array('name', 'required', 'message'=>'服务名称必填'),
			array('price', 'required', 'message'=>'服务价格必填'),
			array('create_time, update_time, price_desc,description,brief', 'safe'),
			array('thumb',
					'file',    //定义为file类型
					'allowEmpty'=>true,
					'types'=>'jpg,png,gif',//上传文件的类型
					'maxSize'=>1024*1024*2, //上传大小限制，注意不是php.ini中的上传文件大小
					'tooLarge'=>'文件大于2M，上传失败！请上传小于2M的图片！'
			),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, com_id, thumb, name, price_desc, description, brief, price, nurse_ids, create_time, update_time', 'safe', 'on'=>'search'),
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
			'thumb' => 'Thumb',
			'name' => 'Name',
			'description' => 'Description',
		    'brief' => 'Brief',
			'price' => 'Price',
			'price_desc' => 'price_desc',
			'nurse_ids' => 'Nurse Ids',
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
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('brief',$this->brief,true);
		
		$criteria->compare('price',$this->price,true);
		$criteria->compare('price_desc',$this->price_desc,true);
		$criteria->compare('nurse_ids',$this->nurse_ids);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//服务首页,按创建时间降序
	public static function getList(){
	
		$model = Item::model();
		$command = $model->getDbConnection()->CreateCommand();
		$tableName = $model->tableName();
		return $command->select()
		->from($tableName)		
		->order('create_time DESC')
		->queryAll();
	}
	
}