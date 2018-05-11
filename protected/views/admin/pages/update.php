<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pages','url'=>array('index')),
//	array('label'=>'Create Pages','url'=>array('create')),
	array('label'=>'View Pages','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Pages #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>