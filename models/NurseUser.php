<?php

/**
 * This is the model class for table "t_nurser_user".
 *
 * The followings are the available columns in table 't_nurser_user':
 * @property integer $id
 * @property integer $com_id
 * @property string $name
 * @property integer $sex
 * @property string $phone
 * @property string $thumb
 * @property integer $age
 * @property integer $status
 * @property integer $flag
 * @property string $address
 * @property string $description
 * @property integer $level
 * @property string $item_relate_id
 * @property integer $case_num
 * @property string $create_time
 * @property string $update_time
 */
class NurseUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_nurser_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_id, sex, age, status, flag, level, case_num', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>11),
			array('phone, address ,title', 'length', 'max'=>200),
			array('item_relate_id', 'length', 'max'=>100),
			array('thumb',
					'file',    //定义为file类型
					'allowEmpty'=>true,
					'types'=>'jpg,png,gif',//上传文件的类型
					'maxSize'=>1024*1024*2, //上传大小限制，注意不是php.ini中的上传文件大小
					'tooLarge'=>'文件大于2M，上传失败！请上传小于2M的图片！'
			),
			array('description, create_time, update_time, title', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, com_id, name, sex, phone, thumb, age, status, flag, address, description, level, item_relate_id, case_num, create_time, update_time, title', 'safe', 'on'=>'search'),
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
			'id' => 'Id编号(流水号)',
			'com_id' => '公司Id',
			'name' => '姓名',
			'sex' => '性别(0:男 1:女)',
			'phone' => '护士电话',
			'thumb' => '头像',
			'age' => '年龄',
			'status' => '状态(0:未接单  1:接单中)',
			'flag' => '状态(0:未开始服务  1:服务中)',
			'address' => '住址',
			'description' => '描述',
			'level' => '星级',
			'title'=>'职称',
			'item_relate_id' => '项目关联Id',
			'case_num' => '案例数',
			'create_time' => 'Create Time',
			'update_time' => '更改时间',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('status',$this->status);
		$criteria->compare('flag',$this->flag);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('address',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('item_relate_id',$this->item_relate_id,true);
		$criteria->compare('case_num',$this->case_num);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

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
	 * @return NurseUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	


	//所有护士列表,按时间降序
	public static function getList(){
		$model = self::model();
		$command = $model->getDbConnection()->CreateCommand();
		$tableName = $model->tableName();
		
		return $command->select()
		->from($tableName)
		->order('create_time DESC')
		->queryAll();
	}
	
	//选择护士，未安排护士
	public static function getNOList(){
		$model = self::model();
		$command = $model->getDbConnection()->CreateCommand();
		$tableName = $model->tableName();
		
		return $command->select()
		->where("status = 0")
		->from($tableName)
		->order('create_time DESC')
		->queryAll();
	}
	//查询
	public static function findSearch($txt){
	
		$model = self::model();
		return $model->find('phone=:txt or name=:txt',array(':txt'=>$txt));
	}
}