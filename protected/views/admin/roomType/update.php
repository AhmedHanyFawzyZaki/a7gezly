<?php
$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomType','url'=>array('index')),
	array('label'=>'Create RoomType','url'=>array('create')),
	array('label'=>'View RoomType','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update RoomType #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model,'gallery' => $gallery)); ?>