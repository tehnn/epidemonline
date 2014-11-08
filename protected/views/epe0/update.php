<?php
$dname = CDisease::model()->findByPk($model->disease);
$this->breadcrumbs = array(
    'รายชื่อ' => array('admin', 'a' => Yii::app()->user->getState('amp')),
    $model->name,
        //'Update',
);

$this->menu = array(
    array('label' => 'รายชื่อผู้ป่วย', 'url' => array('admin', 'a' => Yii::app()->user->getState('amp'))),
    //array('label'=>'Create Epe0','url'=>array('create')),
    array('label' => 'รายละเอียดผู้ป่วย', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'สอบสวนโรค', 'url' => array('invest', 'id' => $model->id)),
        //array('label'=>'Manage Epe0','url'=>array('admin')),
);
?>

<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" > 
<?php
echo $model->hserv." - [" . $model->relate2chospcode->hospname . "]";
?>
    </div>
    <div class="mypanel-body">       

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    //'label' => 'ยืนยันผู้ป่วย',
    'label' => $model->isconfirm == 'n' ? 'ยืนยันผู้ป่วย' : 'ยกเลิกยืนยัน',
    'type' => $model->isconfirm == 'n' ? 'success' : 'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size' => 'large', // null, 'large', 'small' or 'mini'
    'url' => array('Epe0/ConfirmCase', 'id' => $model->id),
    'icon' => $model->isconfirm == 'n' ? 'ok white' : 'ok',
    'htmlOptions' => $model->isconfirm == 'n' ? array('onclick' => 'return confirm("ยืนยันผู้ป่วย...?")') : array('onclick' => 'return confirm("ยกเลิกยืนยัน...?")')
));
?>    
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'พิมพ์บัตร506',
            'type' => 'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'large', // null, 'large', 'small' or 'mini'
            'icon' => 'print white',
            'url' => '#'
        ));
        ?>   
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'ลบผู้ป่วย',
            'type' => 'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size' => 'large', // null, 'large', 'small' or 'mini'
            'url' => array('Epe0/Delete', 'id' => $model->id),
            'icon' => 'remove white',
            'htmlOptions' => array(
                'onclick' => 'return confirm("ลบผู้ป่วย...?")',
            ),
        ));
        ?>
        <a href="<?php echo $this->createUrl('Epe0/Invest', array('id' => $model->id)) ?>" class="btn btn-info btn-large" ><i class="icon-book icon-white"></i>สอบสวนโรค</a>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'ยกเลิก',
    'type' => 'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size' => 'large', // null, 'large', 'small' or 'mini'
    'icon' => 'off white',
    //'url' => array('App/ListPatient')
    'url' => CHttpRequest::getUrlReferrer(),
));
?>
       
        <div class="alert alert-danger" style="margin-top: 5px;text-align:left">
            <h4>
<?php
echo "ป่วยเป็นโรค ".$model->disease . " - " . $dname->disease;
?>
            </h4> 
        </div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>