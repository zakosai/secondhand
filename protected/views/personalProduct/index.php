<?php
/* @var $this PersonalProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Personal Products',
);

$this->menu=array(
	array('label'=>'Create PersonalProduct', 'url'=>array('create')),
	array('label'=>'Manage PersonalProduct', 'url'=>array('admin')),
);
?>

<h1>Personal Products</h1>

<?php 
    if ($dataProvider == null)        echo 'You have no product';
    else $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
