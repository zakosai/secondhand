<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */

$this->breadcrumbs=array(
	'User Info',
	$model->name,
);

$this->menu=array(
    array('label'=>'Update Info', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Personal Product', 'url'=>array('/personalProduct/index')),
    array('label'=>'List Buy', 'url'=>array('/transaction/index')),
    array('label'=>'List Sale', 'url'=>array('/transaction/indexSale')),
	
);
?>

<h1>Welcome, <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'address',
                'gender',
                'age',
                
	),
)); ?>
