<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="language" content="en" />      

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

        <?php Yii::app()->bootstrap->register(); ?>       

        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/my-style.css'); ?>

        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/myscript.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/script.js'); ?>



    </head>

    <body>

        <?php
        $amp = Yii::app()->user->getState('amp');
        if ($amp == '6500') {
            $amp = '';
        }
        $role = Yii::app()->user->getState('role');
        $isAdmin = FALSE;
        if ($role === 'admin') {
            $isAdmin = TRUE;
        }

        $this->widget('bootstrap.widgets.TbNavbar', array(
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'รายอำเภอ', 'url' => array('/Site/Index')),
                        array('label' => 'รายชื่อผู้ป่วย', 'url' => array('/Epe0/admin', 'a' => $amp)),
                        array('label' => 'ข้อมูลวิเคราะห์', 'url' => '#',
                            'items' => array(
                                /* array('label' => 'แบบรายงาน', 'url' => '#',
                                  'items' => array(
                                  array('label' => 'ความทันเวลา', 'url' => '#'),
                                  array('label' => 'ผู้ป่วยเสียชิวิต', 'url' => '#'),
                                  array('label' => 'สอบสวนโรค', 'url' => '#'),
                                  )
                                  ), */
                                array('label' => 'จำนวนข้อมูลรายสถานบริการ', 'url' => array('/Analyze/Hossend'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'ส่ง-ยืนยัน ประจำวัน', 'url' => array('/Analyze/ChkConfirm')),
                                array('label' => 'กราฟ 10 อันดับโรค', 'url' => array('/Analyze/ChartTopTen')),
                                array('label' => 'กราฟแนวโน้มรายโรค', 'url' => array('/Analyze/Median')),
                            //'-',
                            //array('label' => 'แสดงแผนที่', 'url' => array('/Analyze/Map'))
                            )
                        ),
                        array('label' => 'การส่งออก', 'url' => '#',
                            'items' => array(
                                array('label' => 'ส่งออก รง506', 'url' => array('/Epe0/Export506Admin'), 'visible' => $isAdmin),
                                array('label' => 'ส่งออก รง506', 'url' => array('/Epe0/Export506'), 'visible' => !$isAdmin),
                            )
                        ),
                        array('label' => 'ช่วยเหลือ', 'url' => '#',
                            'items' => array(
                                array('label' => 'เกี่ยวกับโปรแกรม', 'url' => array('/App/About')),
                                array('label' => 'ความช่วยเหลือ', 'url' => 'https://www.facebook.com/itplkhealth', 'linkOptions' => array('target' => '_blank')),
                                array('label' => 'สสจ.พิษณุโลก', 'url' => '//www.plkhealth.go.th', 'linkOptions' => array('target' => '_blank')),
                                '---',
                                array('label' => 'SRRT พิษณุโลก', 'url' => 'https://www.facebook.com/groups/273863502683777/', 'linkOptions' => array('target' => '_blank')),
                            ),
                        ),
                        //array('label' => 'Contact', 'url' => array('/site/contact')),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'ผู้ใช้: (' . Yii::app()->user->getState('fullname') . ')', 'url' => '#', 'visible' => !Yii::app()->user->isGuest,
                            'items' => array(
                                array('label' => 'ตั้งค่า', 'url' => array('/User/Update', 'id' => Yii::app()->user->id)),
                                array('label' => 'จัดการผู้ใช้', 'url' => array('/User/Admin'), 'visible' => $isAdmin),
                                '---',
                                array('label' => 'ออกจากระบบ', 'url' => array('/Site/Logout')),
                            )
                        )
                    ),
                ),
            ),
        ));
        ?>

        <div class="container" id="page">

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

<?php echo $content; ?>

            <div class="clear"></div>


            <div id="footer" align="center">
                Copyright &copy; 2013-<?php echo date('Y'); ?>  by 
<?php echo CHtml::link('PLKHEALTH OFFICE', '//www.plkhealth.go.th', array('target' => '_blank')); ?>. 
                All Rights Reserved.
                <p>iData :<a href="https://www.facebook.com/sosplk" target="_blank">นายศรศักดิ์ สีหะวงษ์</a> 089-9605025 , 
                    Web :<a href="https://www.facebook.com/tehnn" target="_blank">นายอุเทน จาดยางโทน</a> 081-2841147</p>
                <p><?php echo date('Y-m-d H:i:s'); ?></p>
            
            </div><!-- footer -->


        </div><!-- page -->

    </body>
</html>
