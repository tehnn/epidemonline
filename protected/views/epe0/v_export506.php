<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >ส่งออก 506</div>
    <div class="mypanel-body">
        <div class="well text-center text-error" >
            เรียน จนท.ศูนย์ระบาดทุกท่าน เนื่องจาก epidemonline ใช้ระบบตัวอักษร UTF-8 ทั้งหมด<br>
              ทำให้การส่งออก Text File  จะเป็น UTF-8 ซึ่งหากท่านจะนำเข้าไปที่ R506<br>
             ต้องแก้ไขให้เป็น ANSI ก่อน  โดยใช้ notepad เปิดไฟล์ขึ้นมา <br>
            แล้วเลือก save-as ในส่วน Encoding ให้เลือก ANSI
        </div>
        <div class="form">

            <form method="POST">
                <input type="hidden" name="amp" value="<?php echo Yii::app()->user->getState('amp'); ?>">

                <label for="begin">ยืนยันวันที่</label>

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
                        'showButtonPanel' => true,
                        'autoSize' => true,
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
                        'showButtonPanel' => true,
                        'autoSize' => true,
                    ),
                    'htmlOptions' => array(
                        'style' => 'height:20px;',
                    ),
                ));
                ?>
                <p>
                    <input type="submit" name="export506" value="ส่งออก" class="btn btn-large btn-warning">

            </form>
        </div>

    </div>
</div>
