<?php

class TransactionController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'indexSale'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($productID, $salerID) {
        $model = new TransactionForm;
        $modelDB = new Transaction;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['TransactionForm'])) {
            $model->attributes = $_POST['TransactionForm'];
            $salerModel = User::model()->findByPk($salerID);
            $buyerModel = User::model()->findByPk(Yii::app()->request->cookies['userID']->value);
            $productModel = Product::model()->findByPk($productID);
            $buyerInfo = UserInfo::model()->findByPk($buyerModel->id);
            if ($model->validate()) {

                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode("A customer want to buy/exchange your product") . '?=';
                $headers = "From: $name <{$buyerModel->email}>\r\n" .
                        "Reply-To: {$buyerModel->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";
                $body = "A customer \r\n" .
                        "Name: {$model->name}\r\n" .
                        "Mobile Phone Number: {$model->phoneNumber}\r\n" .
                        "Address: {$model->address}\r\n" .
                        "Buy Score: {$buyerInfo->buyScore}\r\n".
                        "Number of voter: {$buyerInfo->buyNumber}\r\n\n".
                        "He/She want to buy/exchang the product: \r\n" .
                        "Name: {$productModel->name}\r\n" .
                        "Description: {$productModel->description}\r\n" .
                        "Price: {$productModel->price}\r\n" .
                        "More information: \n{$model->description}\r\n";
			mail($buyerModel->email,$subject,$body,$headers);
//				Yii::app()->user->setFlsash('transaction','Thank you for buying/exchanging. We will send email to the buyer and we hope he/she will reply you as soon as he/she can.');
//				$this->refresh();


                $modelDB->productID = $productID;
                $modelDB->salerID = $salerID;
                $modelDB->buyerID = $buyerModel->id;
                $modelDB->description = $model->description;
                $modelDB->buyerConfirmation = 'processing';
                $modelDB->salerConfirmation = 'processing';
                $modelDB->createDate = new CDbExpression('NOW()');

                if ($modelDB->save())
                    $this->redirect(array('view', 'id' => $modelDB->id));
            }
        }


        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['status'])) {
            if ($model->buyerID == Yii::app()->request->cookies['userID']->value) {
                $model->buyerConfirmation = $_POST['status'];
                if ($model->buyerConfirmation == 'done' && $model->salerConfirmation == 'done') {
                    $product = Product::model()->findByPk($model->productID);
                    $product->status = 1;
                    $product->save();
                    $model->finishDate = new CDbExpression('NOW()');
//                    var_dump($product);
//                    die();
                }
                $model->save();
                if ($_POST['status'] != 'processing')
                     $this->redirect(array('rating/SellerScore', 'id'=> $model->salerID));
                else 
                     $this->redirect(array('index'));
            }

            if ($model->salerID == Yii::app()->request->cookies['userID']->value) {
                $model->salerConfirmation = $_POST['status'];
                if ($model->buyerConfirmation == 'done' && $model->salerConfirmation == 'done') {
                    $product2 = Product::model()->findByPk($model->productID);
                    $product2->status = 1;
                    $product2->save();
                    
                    $model->finishDate = new CDbExpression('NOW()');
             
                    
                }
                $model->save();
                if ($_POST['status'] != 'processing')
                     $this->redirect(array('rating/BuyerScore','id'=> $model->buyerID));
                 else 
                     $this->redirect(array('indexSale'));
            }
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all buy transactions.
     */
    public function actionIndex() {
        $userID = Yii::app()->request->cookies['userID']->value;
        $condition = array(
            'condition' => "buyerID = $userID",
            'order' => "createDate DESC",
        );
        $dataProvider = new CActiveDataProvider('Transaction',array(
            'criteria' => $condition,
            ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Lists all sale transactions
     */
    public function actionIndexSale() {
        $userID = Yii::app()->request->cookies['userID']->value;
        $condition = array(
            'condition' => "salerID = $userID",
            'order' => "createDate DESC",
        );
        $dataProvider = new CActiveDataProvider('Transaction',array(
            'criteria' => $condition,
            ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Transaction('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Transaction']))
            $model->attributes = $_GET['Transaction'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Transaction the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Transaction::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Transaction $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'transaction-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
