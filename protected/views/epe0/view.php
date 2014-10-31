
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>

<div class="modal-body">
    <p>One fine body...</p>
</div>
<form method="post">
    <input type="hidden" name="id "value="<?php echo $model->id ?>" />
    <div class="modal-footer">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'ลบ',
            'url' => array('delete', 'id' => $model->id),
            'htmlOptions' => array('data-dismiss' => 'modal'),
        ));
        ?>
        <input data-dismiss="modal" class="btn btn-primary" type="submit" >
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'ยกเลิก',
            'url' => '#',
            'htmlOptions' => array('data-dismiss' => 'modal'),
        ));
        ?>
    </div> 
    <?php $this->endWidget(); ?>
</form>

<?php
$this->breadcrumbs = array(
    'รายชื่อ' => array('admin', 'a' => Yii::app()->user->getState('amp')),
    $model->name,
);
//$data= $model->getData();
$this->menu = array(
    array('label' => 'รายชื่อผู้ป่วย', 'url' => array('admin', 'a' => Yii::app()->user->getState('amp'))),
    array('label' => 'แก้ไขผู้ป่วย', 'url' => array('update', 'id' => $model->id)),
    
        /*
          //array('label'=>'Create Epe0','url'=>array('create')),
          
          array('label' => 'ลบ','url'=>'#', 'linkOptions' => array(
          'data-toggle' => 'modal',
          'data-target' => '#myModal',
          ),),
          array('label' => 'Delete Epe0', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
          //array('label'=>'Manage Epe0','url'=>array('admin')), */
);
?>


<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >รายละอียดผู้ป่วย</div>
    <div class="mypanel-body">

        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                'id',
                //'pid',
                'hospcode',
                'e0',
                //'e1',
                //'pe0',
                //'pe1',
                'disease',
                'name',
                'hn',
                'nmepat',
                'sex',
                'agey',
                'agem',
                'aged',
                'marietal',
                'race',
                'race1',
                'occupat',
                'address',
                'addrcode',
                'hospamp',
                'prov',
                'amp',
                'tmb',
                'vill',
                'metropol',
                'hospital',
                'type',
                'result',
                'hserv',
                'class',
                'school',
                'datesick',
                'datedefine',
                'datedeath',
                'daterecord',
                'datereach',
                //'intime',
                'organism',
                'complica',
                'idcard',
                'icd10',
                'officeid',
                'latitude',
                'longitude',
                //'moo',
                //'village_name',
                //'r506name',
                //'seq',
                //'provider',
                'isconfirm',
                'confirmby',
                'confirmdate',
                'is507',
                'export506date',
                'exportsurveildate',
                'isdelete',
            ),
        ));
        ?>
    </div>
</div>
