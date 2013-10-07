<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property integer $catalogID
 * @property integer $userID
 * @property string $name
 * @property integer $kind
 * @property string $description
 * @property string $brand
 * @property integer $price
 * @property string $date
 * @property integer $status
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catalogID, userID, name, kind, description, price, date', 'required'),
			array('catalogID, userID, kind, price, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('brand', 'length', 'max'=>81),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, catalogID, userID, name, kind, description, brand, price, date, status', 'safe', 'on'=>'search'),
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
			'catalogID' => 'Catalog',
			'userID' => 'User',
			'name' => 'Name',
			'kind' => 'Kind',
			'description' => 'Description',
			'brand' => 'Brand',
			'price' => 'Price',
			'date' => 'Date',
			'status' => 'Status',
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
		$criteria->compare('catalogID',$this->catalogID);
		$criteria->compare('userID',$this->userID);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('kind',$this->kind);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}