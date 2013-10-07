<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property integer $id
 * @property integer $productID
 * @property integer $buyerID
 * @property integer $salerID
 * @property string $buyerConfirmation
 * @property string $salerConfirmation
 * @property string $description
 * @property string $createDate
 * @property string $finishDate
 */
class Transaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transaction the static model class
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
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('productID, buyerID, salerID, buyerConfirmation, salerConfirmation, description', 'required'),
			array('productID, buyerID, salerID', 'numerical', 'integerOnly'=>true),
			array('buyerConfirmation, salerConfirmation', 'length', 'max'=>15),
			array('createDate, finishDate, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, productID, buyerID, salerID, buyerConfirmation, salerConfirmation, description, createDate, finishDate', 'safe', 'on'=>'search'),
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
			'productID' => 'Product',
			'buyerID' => 'Buyer',
			'salerID' => 'Saler',
			'buyerConfirmation' => 'Buyer Confirmation',
			'salerConfirmation' => 'Saler Confirmation',
			'description' => 'Description',
			'createDate' => 'Create Date',
			'finishDate' => 'Finish Date',
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
		$criteria->compare('productID',$this->productID);
		$criteria->compare('buyerID',$this->buyerID);
		$criteria->compare('salerID',$this->salerID);
		$criteria->compare('buyerConfirmation',$this->buyerConfirmation,true);
		$criteria->compare('salerConfirmation',$this->salerConfirmation,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('finishDate',$this->finishDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}