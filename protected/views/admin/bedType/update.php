<?php
$this->breadcrumbs=array(
	'Bed Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BedType','url'=>array('index')),
	array('label'=>'Create BedType','url'=>array('create')),
	array('label'=>'View BedType','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update BedType #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>