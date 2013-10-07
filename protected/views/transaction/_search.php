<?php
/* @var $this TransactionController */
/* @var $model Transaction */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'productID'); ?>
		<?php echo $form->textField($model,'productID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buyerID'); ?>
		<?php echo $form->textField($model,'buyerID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salerID'); ?>
		<?php echo $form->textField($model,'salerID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buyerConfirmation'); ?>
		<?php echo $form->textField($model,'buyerConfirmation',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salerConfirmation'); ?>
		<?php echo $form->textField($model,'salerConfirmation',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->