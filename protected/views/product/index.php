<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */ 

$this->breadcrumbs=array(
	'Products',
);

$i = 0;
    foreach ($catalog as $c) {
        $this->catalog[$i++] =  array('label'=> $c->name, 'url'=> $this->createUrl('product/index', array('catalogID' => $c->id)));
    }
$i = 0;
$this->menu[$i++] = array('label'=>'Kind');
    if ($kind == null) {
        $this->menu[$i++] = array('label' => 'Solve', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> 0, 'min'=> $min, 'max'=> $max)));
        $this->menu[$i++] = array('label' => 'Exchange', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> 2, 'min'=> $min, 'max'=> $max)));
    }
    else if ($kind == 0)
                $this->menu[$i++] = array('label' => 'Solve (Delete)', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> null, 'min'=> $min, 'max'=> $max)));
    else
                $this->menu[$i++] = array('label' => 'Exchange (Delete)', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> 0, 'min'=> $min, 'max'=> $max)));

$this->menu[$i++] = array('label'=>'Price');
    if ($min == null && $max == null){
                $this->menu[$i++] = array('label' => '<= 100.000 VNĐ', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> $kind, 'max'=> 100000, 'min'=> $min)));
                $this->menu[$i++] = array('label' => '100.000 - 200.000 VNĐ', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> $kind, 'min'=> 100000, 'max'=> 200000)));
                $this->menu[$i++] = array('label' => '200.000 - 500.000 VNĐ', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> $kind, 'min'=> 200000, 'max'=> 500000)));
                $this->menu[$i++] = array('label' => '500.00 - 1.000.000 VNĐ', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> $kind, 'min'=> 500000, 'max'=> 1000000)));
                $this->menu[$i++] = array('label' => '> 1.000.000 VNĐ', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> $kind, 'max'=> $max, 'min'=> 1000000)));
    }
    else if ($min != null && $max == null)
                $this->menu[$i++] = array('label' => '>= '.$min.' VNĐ (Delete)', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> $kind, 'min'=> null, 'max'=> null)));
    else if ($min != null && $max != null )
                 $this->menu[$i++] = array('label' => $min.' - '.$max.' VNĐ (Delete)', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> $kind, 'min'=> null, 'max'=> null)));
    else 
                 $this->menu[$i++] = array('label' => '< '.$max.' VNĐ (Delete)', 'url'=> $this->createUrl('product/index', array('catalogID' => $catalogID, 'kind'=> $kind, 'min'=> null, 'max'=> null)));


    
//   $columns = array(
//    array(
//        'header'=>CHtml::encode('Name'),
//        'name'=>'name',
//    ),
//    array(
//        'header'=>CHtml::encode('Price'),
//        'name'=>'price',
//    ),
//);
// 
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id'=>'area-grid',
//    'dataProvider'=>$dataProvider,
//    'columns'=>$columns,
//    'filter'=>$filtersForm,
//));
?>

<h1>Products</h1>

<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));


?>
