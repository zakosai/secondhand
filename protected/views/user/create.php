<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Login', 'url'=>array('/site/login')),
	//array('label'=>'Forgot password', 'url'=>array('forgot')),
);
?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>