<?php
/* @var $this UserInfoController */
/* @var $model UserInfo */

$this->breadcrumbs=array(
	'User Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	
);
?>

<h1>Create UserInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>