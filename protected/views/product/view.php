<?php
/* @var $this ProductController */
/* @var $model Product */
$catalog = Catalog::model()->findByPk($model->catalogID);
//$catalogDDL = CHtml::listData($catalog, 'id', 'name');
$user = UserInfo::model()->findByPk($model->userID);

if ($user->saleNumber == 0) $saleScore = 0;
else $saleScore = $user->saleScore/$user->saleNumber;

if ($model->kind == 0) $kind = "solve";
else $kind = "exchange";
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

?>

<h1>View Product <?php echo $model->name; ?></h1>
<h3> Creater's Information </h3>
<div class="span-12">
   
        <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $user,
            'attributes' => array(
                'name',
                'address',
                'gender',
                'age',
                array(
                    'name' =>'sale Score',
                    'value' => $saleScore,
                ),
                array(
                    'name' =>'number of voters',
                    'value' => $user->saleNumber,                
                ),
            ),
        ));
        ?>

</div>
    


<h3>Product's Information</h3>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
                    'name' => 'catalog',
                    'value' => $catalog->name,
                ),
		'name',
		array(
                  'name'=>'kind',
                    'value' => $kind,
                ),
		array(
                    'name' => 'description',
                    'type' => 'raw',
                ),
		'price',
	),
)); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
        'action'=> array("transaction/Create",'productID'=>$model->id, 'salerID'=>$model->userID),
	'enableAjaxValidation'=>false,
)); ?>

<div class="row buttons">
		<?php 
                if ($model->userID != Yii::app()->request->cookies['userID']->value)
                     echo CHtml::submitButton('Buy/Exchange'); 
                ?>
</div>

<?php $this->endWidget(); ?>
