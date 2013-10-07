<?php

/**
 * This is the model class for table "userinfo".
 *
 * The followings are the available columns in table 'userinfo':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $gender
 * @property integer $age
 * @property integer $buyScore
 * @property integer $saleScore
 * @property integer $buyNumber
 * @property integer $saleNumber
 */
class UserInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'userinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, address', 'required'),
			array('id, age, saleScore, buyScore, saleNumber, buyNumber', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>81),
			array('address', 'length', 'max'=>255),
			array('gender', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, gender, age, number, voter', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'address' => 'Address',
			'gender' => 'Gender',
			'age' => 'Age',
			'number' => 'Number',
			'voter' => 'Voter',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('number',$this->number);
		$criteria->compare('voter',$this->voter);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}