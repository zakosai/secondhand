<?php
/* @var $this PersonalProductController */
/* @var $model PersonalProduct */

$this->breadcrumbs=array(
	'Personal Products'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PersonalProduct', 'url'=>array('index')),
	array('label'=>'Create PersonalProduct', 'url'=>array('create')),
	array('label'=>'View PersonalProduct', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PersonalProduct', 'url'=>array('admin')),
);
?>

<h1>Update PersonalProduct <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>