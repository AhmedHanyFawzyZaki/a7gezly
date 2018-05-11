<?php
$this->breadcrumbs=array(
	'Car Fuel Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Car Fuel Types','url'=>array('index')),
	array('label'=>'Create Car Fuel Type','url'=>array('create')),
	array('label'=>'View Car Fuel Type','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Car Fuel Type "'. $model->title . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>