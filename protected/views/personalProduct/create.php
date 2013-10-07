<?php
/* @var $this PersonalProductController */
/* @var $model PersonalProduct */

$this->breadcrumbs=array(
	'Personal Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PersonalProduct', 'url'=>array('index')),
	array('label'=>'Manage PersonalProduct', 'url'=>array('admin')),
);
?>

<h1>Create PersonalProduct</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>