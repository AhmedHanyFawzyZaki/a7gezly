<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comments','url'=>array('index')),
	array('label'=>'Create Comments','url'=>array('create')),
	array('label'=>'View Comments','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Comments #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>