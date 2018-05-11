<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'type'=>'horizontal',
'htmlOptions' => array(	'enctype' => 'multipart/form-data'),

)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


 <?php
 
 if($model->id >1){
 
   	echo " <div class=\"control-group \">
	<label for=\"UserDetails_city\" class=\"control-label\">User Group</label>
			 <div class=\"controls\">";
    echo   $form->dropDownList($model,'groups_id',Groups::model()->getGroups());
    echo "</div> </div>";
 }else{
	 
	 echo "<h3>Super Admin</h3>";
	 
	 
	 }

  ?>


	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>50)); ?>

  	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>90)); ?>

	<?php echo $form->passwordFieldRow($model,'password_repeat',array('class'=>'span5','maxlength'=>90)); ?>

	<?php echo $form->textFieldRow($model,'fname',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'lname',array('class'=>'span5','maxlength'=>255)); ?>




	
<div class='control-group'>
    <?php echo $form->fileFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 255)); ?>
    <div class='controls'>
        <?php
        if ($model->isNewRecord != '1' and $model->image != '') {
            ?>

            <div class="control-group ">

                <div class="controls">
                    <?php
                    echo "<p id='image-cont'>" . Chtml::image(Yii::app()->baseUrl . '/media/members/' . $model->image, '', array('width' => 200)) . "</p>";
                    echo CHtml::ajaxLink(
                            'Delete Image', array('/admin/user/deleteimage/id/' . $model->id), array(
                        'success' => 'function(data){
                                                     //var obj = jQuery.parseJSON(data);
                                                     if(data =="done"){
                                                        document.getElementById("image-cont").innerHTML=" Image Deleted";
                                                    }
                                            }'
                            ), array('class' => 'left0px')
                    );
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>




<?php
//	if($model->isNewRecord != '1')
//	{
//		echo " <div class=\"control-group \"> <div class=\"controls\">";
//
//
//		echo 	CHtml::image(Yii::app()->request->baseUrl.'/media/members/'.$model->image,'image',array('width'=>200));
//
//		echo "</div></div>";
//	}
//
//	 ?>


 <? 
// 	echo " <div class=\"control-group \"> ". $form->labelEx($model,'image',array('class'=>'control-label'))."<div class=\"controls\">";
// 
//    $this->widget('ext.Euploader.Euploader',
//	 array(
//	 'name'=>'image',
//	 'config'=>array(
//	 'action'=>Yii::app()->createUrl('user/upload'),
//	 'allowedExtensions'=>array("jpg,png,jpeg"),//array("jpg","jpeg","gif","exe","mov" and etc...
//
//	 )
//	 )); 
//	 
//		echo "</div></div>"; 
//	 
//	 
//	 ?>


	<?php // echo $form->textFieldRow($user_details,'address',array('class'=>'span5','maxlength'=>255)); ?>



	<?php echo $form->textAreaRow($model,'details',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>








	<?php echo $form->checkboxRow($model,'active'); ?>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

