<?php
$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Property','url'=>array('index')),
	array('label'=>'Create Property','url'=>array('create')),
	array('label'=>'View Property','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Property "'. $model->title . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>