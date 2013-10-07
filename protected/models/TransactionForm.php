<?php

/**
 * TransactionForm class.
 * TransactionForm is the data structure for keeping
 * transaction form data. It is used by the 'transact' action of 'TransactionController'.
 */
class TransactionForm extends CFormModel {

    public $name;
    public $phoneNumber;
    public $address;
    public $description;

    //public $verifyCode;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('name, phoneNumber, address', 'required'),
            array('phoneNumber', 'numerical', 'integerOnly' => true),
            array('phoneNumber', 'length', 'max' => 11),
            array('description', 'safe'),
                // verifyCode needs to be entered correctly
                //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            //'verifyCode'=>'Verification Code',
            'phoneNumber' => 'Mobile Phone Number',
        );
    }

}