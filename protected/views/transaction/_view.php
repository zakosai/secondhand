<?php
/* @var $this TransactionController */
/* @var $data Transaction */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('productID')); ?>:</b>
	<?php echo CHtml::encode($data->productID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyerID')); ?>:</b>
	<?php echo CHtml::encode($data->buyerID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salerID')); ?>:</b>
	<?php echo CHtml::encode($data->salerID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyerConfirmation')); ?>:</b>
	<?php echo CHtml::encode($data->buyerConfirmation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salerConfirmation')); ?>:</b>
	<?php echo CHtml::encode($data->salerConfirmation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>