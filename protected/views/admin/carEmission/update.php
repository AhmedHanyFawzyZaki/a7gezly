<?php
$this->breadcrumbs=array(
	'Car Emissions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Car Emissions','url'=>array('index')),
	array('label'=>'Create Car Emission','url'=>array('create')),
	array('label'=>'View Car Emission','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Car Emission "'. $model->title . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>