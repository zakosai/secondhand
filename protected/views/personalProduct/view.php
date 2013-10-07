<?php
/* @var $this PersonalProductController */
/* @var $model PersonalProduct */
$catalog = Catalog::model()->findByPk($model->catalogID);
//$catalogDDL = CHtml::listData($catalog, 'id', 'name');

if ($model->kind == 0) $kind = "solve";
else $kind = "exchange";
$this->breadcrumbs=array(
	'Personal Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List PersonalProduct', 'url'=>array('index')),
	array('label'=>'Create PersonalProduct', 'url'=>array('create')),
	array('label'=>'Update PersonalProduct', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersonalProduct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersonalProduct', 'url'=>array('admin')),
);
?>

<h1>View Details of <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(

        'data' => $model,
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
