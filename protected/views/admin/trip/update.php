<?php
$this->breadcrumbs=array(
	'Trips'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Trip','url'=>array('index')),
	array('label'=>'Create Trip','url'=>array('create')),
	array('label'=>'View Trip','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Trip # '. $model->title; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model,'gallery' => $gallery,'arr2'=>$arr2)); ?>