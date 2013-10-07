<?php
/* @var $this TransactionController */
/* @var $model Transaction */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Buy', 'url'=>array('index')),
        array('label'=>'List Sale', 'url'=>array('indexSale')),
);

$product = Product::model()->findByPk($model->productID);
?>

<h1>View Transaction</h1>
<h3>Product</h3>

   
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $product,
            'attributes' => array(
                'name',
                'price',
                array(
                    'name' => 'description',
                    'type' => 'raw',
                ),
            ),
        ));
        ?>
<h3>Transaction</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'buyerConfirmation',
		'salerConfirmation',
		array(
                    'name' => 'description',
                    'type' => 'raw',
                ),
                'createDate',
                'finishDate',
	),
)); ?>
<hr />


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
        'action'=> array("update",'id'=>$model->id),
	'enableAjaxValidation'=>false,
)); ?>

<div class="row buttons">
		<?php 
                if ($model->buyerID == Yii::app()->request->cookies['userID']->value){
                    if($model->buyerConfirmation == 'processing' ){
                     echo '<h3>Status</h3>';
                     echo CHtml::dropDownList('status', $model->buyerConfirmation, array("done"=>"Done", 
                         "processing"=>"Processing", "cancel"=>"Cancel"));            
                     echo CHtml::submitButton('Submit');                      
                     }
                     
                }
                
                 if ($model->salerID == Yii::app()->request->cookies['userID']->value){
                    if($model->salerConfirmation == 'processing' ){
                     echo '<h3>Status</h3>';
                     echo CHtml::dropDownList('status', $model->salerConfirmation, array("done"=>"Done", 
                         "processing"=>"Processing", "cancel"=>"Cancel"));            
                     echo CHtml::submitButton('Submit');
                     }
                }
                
                ?>
</div>

<?php $this->endWidget(); ?>
