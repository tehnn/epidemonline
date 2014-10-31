<?php
/* @var $this CProvController */
/* @var $model CProv */

$this->breadcrumbs=array(
	'Cprovs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CProv', 'url'=>array('index')),
	array('label'=>'Manage CProv', 'url'=>array('admin')),
);
?>

<h1>Create CProv</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>