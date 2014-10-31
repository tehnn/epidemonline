<?php ?>
<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >สอบสวนโรค</div>
    <div class="mypanel-body">
        <p>
            <a href='index.php?r=Epe0/Update&id=<?php echo $epe0->id;?>'><?php echo $epe0->name; ?></a>,
            โรค <?php echo $epe0->disease; ?>,
            ป่วย <?php echo $epe0->datesick; ?>
        </p>
        <hr>
        <h1>ส่งเอกสารสอบสวนโรค</h1>

        <form enctype="multipart/form-data"  method="post">

            <?php
            $this->widget('CMultiFileUpload', array(
                'name' => 'Upload',
                'accept' => 'pdf,doc,docx,zip,rar', // useful for verifying files
                'duplicate' => 'ชื่อไฟล์ซ้ำ!', // useful, i think
                'denied' => 'ไม่อนุญาตชนิดไฟล์', // useful, i think
                'max' => 10,
                'htmlOptions' => array('multiple' => 'multiple', 'size' => 255),
            ));
            ?>
            <input type="submit" value="Upload" class="btn btn-success"/>
        </form>

        <hr>

        <ul>
            เอกสารสอบสวนโรค:
            <?php foreach ($file as $f): ?>
            <li>
                <?php echo $f->uploaddate;?> - 
                <?php echo CHtml::link($f->filename,'upload/'.$f->filename, array('target'=>'_blank'));?>
                (<?php echo intval($f->size/1000); ?> KB)</li>
            <?php endforeach; ?>

            <?php
                       // print_r($file)  ;
            ?>
        </ul>



    </div>
</div>
