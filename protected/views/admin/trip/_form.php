<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'trip-form',
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
<div class="control-group ">
    <label class="control-label" for="Category">Category</label>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'category_id', CHtml::listData(Categories::model()->findAll(), 'id', 'title_ar'), array('prompt' => 'اختر')); ?>		

    </div>
</div>
<div class="control-group">
    <label for="hotel_id" class="control-label">Hotel</label>
    <div class="controls">

        <?php
        echo $form->dropDownList($model, 'hotel_id', CHtml::listData(Hotels::model()->findAll(), 'id', 'title'), array(
            'prompt' => 'Select Hotel',
            'ajax' => array(
                'type' => 'POST',
                'url' => Yii::app()->getbaseurl() . '/admin/trip/GetRooms',
                'data' => array('hotel_id' => 'js:this.value', 'selected' => json_encode($arr2)),
                'success' => 'function( data )
                    {
			document.getElementById("roomType").innerHTML=data;
                    }'
            ))
        );
        ?>
    </div> </div>

<div class="control-group">
    <label class="control-label" style="color:red"> Available Room Types </label>
    <div class="controls"  id="roomType">
        <?php
        if ($model->isNewRecord)
            echo
            'select Hotel first';
        else {
            echo $form->checkBoxList($model, 'tripRoomCoditionRelations', RoomType::model()->RoomTypeList($model->hotel_id), array('class' => ''));
        }
        ?>
    </div>
</div>




<div class="control-group ">
    <label class="control-label" for="Location">Location</label>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'location_id', CHtml::listData(Location::model()->findAll(), 'id', 'title'), array('prompt' => 'Select location',)); ?>		

    </div>
</div>
<div class="control-group">
    <div class="control-group "><label for="Trip_start_date" class="control-label">Start Date</label><div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'start_date',
                'htmlOptions' => array(
                    'size' => '10', // textField size
                    'maxlength' => '10', // textField maxlength
                ),
            ));
            ?>
        </div></div>
    <?php echo $form->error($model, 'start_date'); ?>
</div>

<?php // echo $form->textFieldRow($model, 'end_date', array('class' => 'span5', 'maxlength' => 255));   ?>
<div class="control-group">
    <div class="control-group "><label for="Trip_end_date" class="control-label">End Date</label><div class="controls">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'end_date',
                'htmlOptions' => array(
                    'size' => '10', // textField size
                    'maxlength' => '10', // textField maxlength
                ),
            ));
            ?>
        </div></div>
    <?php echo $form->error($model, 'end_date'); ?>
</div>
<div class="control-group ">
    <label class="control-label" for="Days">Days</label>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'days_id', CHtml::listData(Days::model()->findAll(), 'id', 'title'), array('prompt' => 'Select One',)); ?>		

    </div>
</div>
<div class="control-group ">
    <label class="control-label" for="Price Range">Price Range</label>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'price_range_id', CHtml::listData(PriceRange::model()->findAll(), 'id', 'title'), array('prompt' => 'Select One',)); ?>		

    </div>
</div>
<?php echo $form->textFieldRow($model, 'price', array('class' => 'span5', 'maxlength' => 10, 'append' => 'L.E')); ?>


<?php // echo $form->textFieldRow($model,'temp1',array('class'=>'span5','maxlength'=>255));    ?>

<?php // echo $form->textFieldRow($model,'temp2',array('class'=>'span5','maxlength'=>255));   ?>

<?php // echo $form->textFieldRow($model,'temp3',array('class'=>'span5','maxlength'=>255));   ?>

<?php // echo $form->textFieldRow($model,'temp4',array('class'=>'span5','maxlength'=>255));   ?>
<div class="control-group ">
    <label class="control-label" for="details">English Details</label>
    <div class="controls">
        <?php
        $this->widget('application.extensions.eckeditor.ECKEditor', array(
            'model' => $model,
            'attribute' => 'details',
        ));
        ?>

    </div>
</div>


<div class="control-group ">
    <label class="control-label" for="Arabic Details">Arabic Details</label>
    <div class="controls">
        <?php
        $this->widget('application.extensions.eckeditor.ECKEditor', array(
            'model' => $model,
            'attribute' => 'details_ar',
        ));
        ?>

    </div>
</div>

<div class="control-group ">
    <label class="control-label" for="description">Important Info</label>
    <div class="controls">

        <?php echo EMHelper::megaOgogo($model, 'import_info', array(), 'ckeditor'); ?>
    </div>
</div>
<div class="control-group ">
<label class="control-label" for="description">Safari Details</label>
<div class="controls">

    <?php echo EMHelper::megaOgogo($model, 'safari_details', array(), 'ckeditor'); ?>
</div>
</div>
<?php // echo $form->textFieldRow($model, 'gallery_id', array('class' => 'span5'));   ?>
<?php
if ($model->isNewRecord != '1') {
    ?>

    <div class="control-group">
        <label for=\"UserDetails_city\" class="control-label">Gallery</label>
        <div class="controls">
            <div class="span<?php echo(isset($_GET['w']) ? $_GET['w'] : '12') ?>" style="width:700px;">
                <?php
                $this->widget('GalleryManager', array(
                    'gallery' => $gallery,
                ));
                ?>

            </div>
        </div>
    </div>

    <?php
} else {
    ?>
    <div class="control-group ">
        <label class="control-label" for="Motor_address">Gallery</label>
        <div class="controls">
            <input id="" class="span5" type="text" name="" value="Please save Your trip before Uploading images" readonly>
        </div>
    </div>
    <?php
}
?>


<?php echo $form->checkboxRow($model, 'offerd'); ?>
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




<script>
    function check_all(room_id)
    {
        var flag = document.getElementById('room_' + room_id).checked;
        $(".roomm_" + room_id).prop('checked', flag);
    }

</script>
<script>
    $(document).ready(function() {
        // var hotel = $('#Trip_hotel_id').val();
        var hotel = document.getElementById("Trip_hotel_id").selectedIndex;
        //  alert(document.getElementsByTagName("option")[hotel].value);


        var select = JSON.stringify(<?= json_encode($arr2); ?>);
        // document.write(select);
        setTimeout(function() {
            $.ajax({
                url: '<?= Yii::app()->request->baseUrl ?>/admin/trip/GetRooms',
                type: "POST",
                data: 'hotel_id=' + hotel + '&selected=' + select + "&update=1",
                success: function(data) {
                    $('#roomType').html(data);
                }
            })
        }, 0);
    });

</script>


