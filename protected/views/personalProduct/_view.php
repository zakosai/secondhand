<?php
/* @var $this PersonalProductController */
/* @var $data PersonalProduct */
$catalog = Catalog::model()->findByPk($model->catalogID);

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('catalogID')); ?>:</b>
	<?php echo $catalog->name; ?>
	<br />-->

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />-->

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />-->

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('kind')); ?>:</b>
	<?php echo CHtml::encode($data->kind); ?>
	<br />-->

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />


</div>