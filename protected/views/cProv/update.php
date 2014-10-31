<?php
/* @var $this CProvController */
/* @var $model CProv */

$this->breadcrumbs=array(
	'Cprovs'=>array('index'),
	$model->name=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List CProv', 'url'=>array('index')),
	array('label'=>'Create CProv', 'url'=>array('create')),
	array('label'=>'View CProv', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage CProv', 'url'=>array('admin')),
);
?>

<h1>Update CProv <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>