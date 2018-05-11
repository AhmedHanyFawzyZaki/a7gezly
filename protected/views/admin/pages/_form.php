<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'pages-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="control-group ">
    <label class="control-label" for="title">Title</label>
    <div class="controls">
        <?php echo EMHelper::megaOgogo($model, 'title', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<!--<div class="control-group ">
    <label class="control-label" for="intro">Intro</label>
    <div class="controls">

        <?php // echo EMHelper::megaOgogo($model, 'intro', array(), 'ckeditor'); ?>
    </div>
</div>-->


<div class="control-group ">
    <label class="control-label" for="description">Details</label>
    <div class="controls">

        <?php echo EMHelper::megaOgogo($model, 'details', array(), 'ckeditor'); ?>
    </div>
</div>

<div class='control-group'>
    <?php echo $form->fileFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 255)); ?>
    <div class='controls'>
        <?php
        if ($model->isNewRecord != '1' and $model->image != '') {
            ?>

            <div class="control-group ">

                <div class="controls">
                    <?php
                    echo "<p id='image-cont'>" . Chtml::image(Yii::app()->baseUrl . '/media/' . $model->image, '', array('width' => 200)) . "</p>";
                    echo CHtml::ajaxLink(
                            'Delete Image', array('/admin/pages/deleteimage/id/' . $model->id), array(
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
 

<?php echo $form->fileFieldRow($model, 'video', array('class' => 'span5', 'maxlength' => 255)); ?>



<div class="control-group ">
    <label class="control-label" for="meta_author">Meta Author</label>
    <div class="controls">
        <?php echo EMHelper::megaOgogo($model, 'meta_author', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<div class="control-group ">
    <label class="control-label" for="title">Meta Keywords</label>
    <div class="controls">
        <?php echo EMHelper::megaOgogo($model, 'meta_keywords', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<div class="control-group ">
    <label class="control-label" for="meta_desc">Meta Description</label>
    <div class="controls">
        <?php echo EMHelper::megaOgogo($model, 'meta_desc', array('class' => 'span8', 'maxlength' => 255), 'textField'); ?>
    </div>
</div>

<?php echo $form->checkboxRow($model, 'publish'); ?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
