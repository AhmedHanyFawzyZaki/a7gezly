<?php
$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cities','url'=>array('index')),
	array('label'=>'Create City','url'=>array('create')),
	array('label'=>'View City','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update City "'. $model->title . '"'; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>