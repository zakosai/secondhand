<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */

$this->breadcrumbs = array(
    'Transaction' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Vote',
);

$this->menu = array(
);
?>

<h1>Voting for <?php echo $model->name; ?></h1>
<div class="form">
    We have rule of score as that: 

        <li>1 score: Very Bad</li>
        <li>2 score: Bad</li>
        <li>3 score: Normal</li>
        <li>4 score: Good</li>
        <li>5 score: Very Good</li>
   
    <?php echo 'Score:'; ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-info-form',
        'enableAjaxValidation' => false,
    ));
    ?>
        <?php echo CHtml::dropDownList('score', 1, array("1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5")); ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
<?php $this->endWidget(); ?>
</div>