<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Update Settings','url'=>array('index')),
);
?>

<h1>View Settings</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'facebook',
                 'youtube',
            
		'google',
		'twitter',
		'pinterest',
		'email',

/*
'press_email',
		'support_email',
		'blog_email',
		'paypal_email',
*/

/*
'temp1',
		'temp2',
		'temp3',
		'temp4',
*/
		'api_username',
		'api_password',
		'signature',

/*
'paypal_fee',
		'paypalextra_fee',
		'site_commession',
*/
		'phone',
		'mobile',
		'fax',
		'address',
	),
)); ?>
