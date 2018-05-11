<?php
$this->breadcrumbs=array(
	'Price Ranges'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PriceRange','url'=>array('index')),
	array('label'=>'Create PriceRange','url'=>array('create')),
	array('label'=>'View PriceRange','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update PriceRange #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>