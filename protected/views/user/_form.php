<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'fullname',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'amp',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'office',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'tel',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>
        <?php echo $form->textFieldRow($model,'officeid',array('class'=>'span5','maxlength'=>255)); ?>
        
       
        <?php if($model->isNewRecord): ?>
        <?php echo $form->hiddenField($model,'role',array('class'=>'span5','maxlength'=>255,'value'=>'user')); ?>
        <?php endif; ?>
	<?php //echo $form->textFieldRow($model,'role',array('class'=>'span5','maxlength'=>255,'value'=>'user')); ?>

	<?php //echo $form->textFieldRow($model,'lastlogin',array('class'=>'span5','maxlength'=>255)); ?>

	<?php //echo $form->textFieldRow($model,'countlogin',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ispermission',array('class'=>'span5','maxlength'=>5)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
