<?php
$this->breadcrumbs=array(
	'Home Sliders'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HomeSlider','url'=>array('index')),
	array('label'=>'Create HomeSlider','url'=>array('create')),
	array('label'=>'View HomeSlider','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update HomeSlider #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>