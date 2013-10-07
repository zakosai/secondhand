<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5">
	<div id="sidebarLeft">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Catalog',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->catalog,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
//        echo $contentleft;
	?>
	</div><!-- sidebar -->
</div>
<div class="span-13">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebarRight">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Search',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>