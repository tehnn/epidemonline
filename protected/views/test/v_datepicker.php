<label for="begin">เริ่มป่วยวันที่</label>

<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'begin',
    'options' => array(
        'dateFormat' => 'yy-mm-dd',
        'changeMonth' => true,
        'changeYear' => true,
        'yearRange' => '2012:2020',
        'minDate' => '2012-01-01', // minimum date
        'maxDate' => '2020-12-31', // maximum date
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;',
    ),
));
?>
<label for="end">ถึง</label>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name' => 'end',
    'options' => array(
        'dateFormat' => 'yy-mm-dd',
        'changeMonth' => true,
        'changeYear' => true,
        'yearRange' => '2012:2020',
        'minDate' => '2012-01-01', // minimum date
        'maxDate' => '2020-12-31', // maximum date
    ),
    'htmlOptions' => array(
        'style' => 'height:20px;',
    ),
));
?>