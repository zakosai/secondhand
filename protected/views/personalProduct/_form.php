<?php
/* @var $this PersonalProductController */
/* @var $model PersonalProduct */
/* @var $form CActiveForm */
$catalog = Catalog::model()->findAll();
$catalogDDL = CHtml::listData($catalog, 'id', 'name');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'catalogID'); ?>
		 <?php  echo CHtml::dropDownList('PersonalProduct[catalogID]', $model->catalogID, $catalogDDL);?>
		<?php echo $form->error($model,'catalogID'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'userID'); ?>
		<?php echo $form->textField($model,'userID'); ?>
		<?php echo $form->error($model,'userID'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kind'); ?>
		 <?php  echo CHtml::dropDownList('PersonalProduct[kind]', $model->kind, array("solve", "exchange"));?>
		<?php echo $form->error($model,'kind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php $this->widget('application.extensions.ckeditor.CKEditor', array(  
                    "model" => $model,
                    'attribute'=>'description',
                    'editorTemplate'=>'full')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->