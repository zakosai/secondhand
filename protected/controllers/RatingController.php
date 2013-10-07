<?php

class RatingController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('sellerScore','buyerScore'),
				'users'=>array('@'),
			),
			
		);
	}

                public function actionSellerScore($id)
        {
            $model = $this->loadModel($id);
            
            if(isset($_POST['score'])){
                $model->saleScore += $_POST['score'];
                $model->saleNumber++;
                if($model->save())
                    $this->redirect (array('transaction/index'));
            }
            
            $this->render('vote', array(
                'model'=>$model,
            ));
        }
         
         public function actionBuyerScore($id)
        {
            $model = $this->loadModel($id);
            
            if(isset($_POST['score'])){
                $model->buyScore += $_POST['score'];
                $model->buyNumber++;
                if($model->save())
                    $this->redirect (array('transaction/indexSale'));
            }
            
            $this->render('vote', array(
                'model'=>$model,
            ));
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserInfo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserInfo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserInfo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
