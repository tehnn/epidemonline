<div class="form-inline well">
    <form method="POST">
        <input type="hidden" name="data" value="1">
        <span style="display:inline-block">
            <label for="begin" style="display:block">ส่งเข้าระบบ ระหว่างวันที่</label>

            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'begin',
                'value' => $d1,
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '2012:2020',
                    'minDate' => '2012-01-01', // minimum date
                    'maxDate' => '2020-12-31', // maximum date
                    'showButtonPanel' => true,
                    'autoSize' => true,
                ),
                'htmlOptions' => array(
                    'style' => 'height:20px;',
                ),
            ));
            ?>
        </span>
        <span style="display:inline-block">
            <label for="end" style="display:block">ถึง</label>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'end',
                'value' => $d2,
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'yearRange' => '2012:2020',
                    'minDate' => '2012-01-01', // minimum date
                    'maxDate' => '2020-12-31', // maximum date
                    'showButtonPanel' => true,
                    'autoSize' => true,
                ),
                'htmlOptions' => array(
                    'style' => 'height:20px;',
                ),
            ));
            ?>
        </span>
        <input type="submit" value="ประมวลผล" class="btn btn-danger">

    </form>
</div>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped',
    'dataProvider' => $model,
    'columns' => array(
        array(
            'name' => 'amp',
            'header' => 'รหัสอำเภอ'
        ),
        array(
            'name' => 'hospcode',
            'header' => 'รหัสสถานบริการ'
        ),
        array(
            'name' => 'hospname',
            'header' => 'สถานบริการ'
        ),
        array(
            'name' => 'y',
            'header' => 'ยืนยันแล้ว (ราย)'
        ),
        array(
            'name' => 'n',
            'header' => 'รอยืนยัน (ราย)',            
            'value' => 'CHtml::link($data["n"], Yii::app()->createUrl("Epe0/Admin",array("a"=>$data["amp"],"confirm"=>"n","h"=>$data["hospname"])))',
            'type' => 'raw',
        ),
        array(
            'name' => 't',
            'header' => 'รวม (ราย)'
        ),
    )
));
?>
