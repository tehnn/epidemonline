
<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >รานงานเชิงแผนที่</div>
    <div class="mypanel-body">
        <form method="GET" target='_blank' id='frm_to_map'>

            <?php
            //$list = CHtml::listData(CDisease::model()->findAll(), 'code', 'disname');
            $y = array('2013' => '2013', '2014' => '2014', '2015' => '2015');
            echo CHtml::dropDownList('year','2014', $y, array('empty' => '-- เลือกปี --'));
            ?>


            <?php
            $list = CHtml::listData(CDisease::model()->findAll(), 'code', 'disname');
            echo CHtml::dropDownList('disease', $disease, $list, array('empty' => '-- เลือกโรค --'));
            ?>
            <br>

            <input type='button' value='แสดงแผนที่แบบที่ 1 (ขอบเขต)' onclick="return MapSubmit($('#year').val(), $('#disease').val(), 1)" class='btn'>
            <input type='button' value='แสดงแผนที่แบบที่ 2 (พิกัด)' onclick="return MapSubmit($('#year').val(), $('#disease').val(), 2)" class='btn'>

        </form>
    </div>
</div>
