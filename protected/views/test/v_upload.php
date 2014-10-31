<?php

//echo Yii::app()->user->getState(role);

?>

<form enctype="multipart/form-data"  method="post">

    <?php
    $this->widget('CMultiFileUpload', array(
        'name' => 'Upload',
        'accept' => 'pdf', // useful for verifying files
        'duplicate' => 'ชื่อไฟล์ซ้ำ!', // useful, i think
        'denied' => 'ไม่อนุญาตชนิดไฟล์', // useful, i think
        'max' => 10,
        'htmlOptions' => array('multiple' => 'multiple', 'size' => 25),
    ));
    ?>
    <input type="submit" value="Upload"/>
</form>

<hr>

<pre>
    <?php
    var_dump($info);
    ?>
</pre>

