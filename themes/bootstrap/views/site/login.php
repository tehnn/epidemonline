<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="mypanel" style=" border:1px solid #0094ff;">
    <div class="mypanel-heading" style="background:#0094ff;color:white;" >LOGIN</div>
    <div class="mypanel-body">


        <div class="form">

            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'login-form',
                'type' => 'horizontal',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>

            <p class="note">โปรดระบุชื่อผู้ใช้</p>

            <?php echo $form->textFieldRow($model, 'username'); ?>

            <?php
            echo $form->passwordFieldRow($model, 'password', array(
                'hint' => '',
            ));
            ?>
            <div style="margin-left: 50px">
            <?php //$this->widget('CCaptcha'); ?>     
            </div>
            <?php //echo $form->textFieldRow($model, 'verifyText'); ?>
            <?php echo $form->checkBoxRow($model, 'rememberMe'); ?>



            <div class="form-actions">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'label' => 'Login',
                ));
                ?>
            </div>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>
