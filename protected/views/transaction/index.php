<?php
/* @var $this TransactionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transactions',
);

$this->menu=array(
	array('label'=>'List Buy', 'url'=>array('index')),
	array('label'=>'List Sale', 'url'=>array('indexSale')),
);
?>

<h1>Transactions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
