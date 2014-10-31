<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo CHtml::encode($data->pid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospcode')); ?>:</b>
	<?php echo CHtml::encode($data->hospcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('e0')); ?>:</b>
	<?php echo CHtml::encode($data->e0); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('e1')); ?>:</b>
	<?php echo CHtml::encode($data->e1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pe0')); ?>:</b>
	<?php echo CHtml::encode($data->pe0); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pe1')); ?>:</b>
	<?php echo CHtml::encode($data->pe1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('disease')); ?>:</b>
	<?php echo CHtml::encode($data->disease); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hn')); ?>:</b>
	<?php echo CHtml::encode($data->hn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nmepat')); ?>:</b>
	<?php echo CHtml::encode($data->nmepat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agey')); ?>:</b>
	<?php echo CHtml::encode($data->agey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agem')); ?>:</b>
	<?php echo CHtml::encode($data->agem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aged')); ?>:</b>
	<?php echo CHtml::encode($data->aged); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marietal')); ?>:</b>
	<?php echo CHtml::encode($data->marietal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('race')); ?>:</b>
	<?php echo CHtml::encode($data->race); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('race1')); ?>:</b>
	<?php echo CHtml::encode($data->race1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupat')); ?>:</b>
	<?php echo CHtml::encode($data->occupat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addrcode')); ?>:</b>
	<?php echo CHtml::encode($data->addrcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('metropol')); ?>:</b>
	<?php echo CHtml::encode($data->metropol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospital')); ?>:</b>
	<?php echo CHtml::encode($data->hospital); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hserv')); ?>:</b>
	<?php echo CHtml::encode($data->hserv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class')); ?>:</b>
	<?php echo CHtml::encode($data->class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school')); ?>:</b>
	<?php echo CHtml::encode($data->school); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datesick')); ?>:</b>
	<?php echo CHtml::encode($data->datesick); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datedefine')); ?>:</b>
	<?php echo CHtml::encode($data->datedefine); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datedeath')); ?>:</b>
	<?php echo CHtml::encode($data->datedeath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('daterecord')); ?>:</b>
	<?php echo CHtml::encode($data->daterecord); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datereach')); ?>:</b>
	<?php echo CHtml::encode($data->datereach); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intime')); ?>:</b>
	<?php echo CHtml::encode($data->intime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organism')); ?>:</b>
	<?php echo CHtml::encode($data->organism); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complica')); ?>:</b>
	<?php echo CHtml::encode($data->complica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcard')); ?>:</b>
	<?php echo CHtml::encode($data->idcard); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icd10')); ?>:</b>
	<?php echo CHtml::encode($data->icd10); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('officeid')); ?>:</b>
	<?php echo CHtml::encode($data->officeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moo')); ?>:</b>
	<?php echo CHtml::encode($data->moo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('village_name')); ?>:</b>
	<?php echo CHtml::encode($data->village_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r506name')); ?>:</b>
	<?php echo CHtml::encode($data->r506name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seq')); ?>:</b>
	<?php echo CHtml::encode($data->seq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provider')); ?>:</b>
	<?php echo CHtml::encode($data->provider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isconfirm')); ?>:</b>
	<?php echo CHtml::encode($data->isconfirm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirmby')); ?>:</b>
	<?php echo CHtml::encode($data->confirmby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirmdate')); ?>:</b>
	<?php echo CHtml::encode($data->confirmdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is507')); ?>:</b>
	<?php echo CHtml::encode($data->is507); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('export506date')); ?>:</b>
	<?php echo CHtml::encode($data->export506date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exportsurveildate')); ?>:</b>
	<?php echo CHtml::encode($data->exportsurveildate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isdelete')); ?>:</b>
	<?php echo CHtml::encode($data->isdelete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospamp')); ?>:</b>
	<?php echo CHtml::encode($data->hospamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prov')); ?>:</b>
	<?php echo CHtml::encode($data->prov); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amp')); ?>:</b>
	<?php echo CHtml::encode($data->amp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmb')); ?>:</b>
	<?php echo CHtml::encode($data->tmb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vill')); ?>:</b>
	<?php echo CHtml::encode($data->vill); ?>
	<br />

	*/ ?>

</div>