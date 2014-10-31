
<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >Head</div>
    <div class="mypanel-body">
        Test1 View
        <hr>

        ส่วนแสดงผล link : <?php echo $id; ?>
        <br>

        ส่วนแสดงผล ajax : <input type="text" name="res">

        <hr>
        <?php echo CHtml::link('ส่งแบบget', array('Test/Test1', 'id' => '1234')); ?>
        <hr>
        <input type="text" name="txt"><br>
        <a href="#" onclick="return LoadTest1($('input[name=txt]').val())">ส่งแบบ AJAX</a>
        <br>


    </div>
</div>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>

<div class="modal-body">
    <p>One fine body...</p>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => 'Save changes',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Click me',
    'type' => 'primary',
    'htmlOptions' => array(
        'data-toggle' => 'modal',
        'data-target' => '#myModal',
    ),
));
?>

