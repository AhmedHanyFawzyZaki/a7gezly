<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'hotels-form',
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
    <label class="control-label" for="Pages_intro">Hotels level</label>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'level_id', CHtml::listData(HotelsLevel::model()->findAll(), 'id', 'title')); ?>  

    </div>
</div>
<div class="control-group ">
    <label class="control-label" for="desc">Details</label>
    <div class="controls">

        <?php echo EMHelper::megaOgogo($model, 'desc', array(), 'ckeditor'); ?>
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
                    echo "<p id='image-cont'>" . Chtml::image(Yii::app()->baseUrl . '/media/hotels/' . $model->image, '', array('width' => 200)) . "</p>";
                    echo CHtml::ajaxLink(
                            'Delete Image', array('/admin/hotels/deleteimage/id/' . $model->id), array(
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
<?php // echo $form->textAreaRow($model, 'map', array('rows' => 6, 'cols' => 50, 'class' => 'span12')); ?>

<?php echo $form->textFieldRow($model, 'video', array('class' => 'span5', 'maxlength' => 255)); ?>

<div class="map_div">
    <div class="control-group" style="margin-top: 15px;">
        <label class="control-label">Location On Map</label>
        <div class="controls">
            <div id="searchAddress">
<?php echo CHtml::textField('location', '', array('id' => 'Address', 'class' => 'span8', 'placeholder' => 'Enter address')); ?>
<!--                <button type='button' class='btn map_search' jsaction="omnibox.search"><i class='icon-search icon-white'></i></button>-->
            </div>
                <?php
                Yii::import('ext.gmap.*');
                $gMap = new EGMap();
                $gMap->setWidth(700);
                $gMap->setHeight(300);
                $gMap->zoom = 2;
                $mapTypeControlOptions = array(
                    'position' => EGMapControlPosition::RIGHT_TOP,
                    'style' => EGMap::MAPTYPECONTROL_STYLE_HORIZONTAL_BAR
                );

                $gMap->mapTypeId = EGMap::TYPE_ROADMAP;
                $gMap->mapTypeControlOptions = $mapTypeControlOptions;
                $gMap->zoomControl = EGMap::ZOOMCONTROL_STYLE_SMALL;
                $gMap->streetViewControl = false;
                $gMap->minZoom = 2;

                $gMap->htmlOptions = array(
                    'class' => 'map'
                );

// Preparing InfoWindow with information about our marker.
                $info_window_a = new EGMapInfoWindow("<div class='gmaps-label' style='color: #000;'>Hi! I'm your marker!</div>");


// Saving coordinates after user dragged our marker.
                $dragevent = new EGMapEvent('dragend', "function (event) { 
        $('#h_lng').val(event.latLng.lng());
        $('#h_lat').val(event.latLng.lat());    
        }", false, EGMapEvent::TYPE_EVENT_DEFAULT);

// If we have already created marker - show it
                $lng = $model->longitude;
                $lat = $model->latitude;
                $zoom = 8;
                if ($model->isNewRecord) {
                    $lng = 30.45994900000005;
                    $lat = 22.358558915985164;
                    $zoom = 2;
                }

                $marker = new EGMapMarker($lat, $lng, array('title' => $model->title, 'draggable' => true), $gMap->getJsName() . '_marker', array('dragevent' => $dragevent));
                $marker->addHtmlInfoWindow($info_window_a);
                $gMap->addMarker($marker);
                $gMap->setCenter($lat, $lng);
                $gMap->zoom = $zoom;

//$gMap->addAutocomplete('Address');
                $gMap->additionScript = "
          input_address_temp = document.getElementById('Address');
          search_div = document.getElementById('searchAddress');
          {$gMap->getJsName()}.controls[google.maps.ControlPosition.TOP_LEFT].push(search_div);
          var searchBox = new google.maps.places.SearchBox((input_address_temp));
          var markers = [];
            google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();
var place = places[0];
    if (place.geometry.viewport) {
            " . $gMap->getJsName() . ".fitBounds(place.geometry.viewport);
          } else {
            " . $gMap->getJsName() . ".setCenter(place.geometry.location);
            " . $gMap->getJsName() . ".setZoom(17);  
          }
          " . $gMap->getJsName() . "_marker.setPosition(place.geometry.location);
          
          var address = '';
          if (place.address_components) {
            address = [(place.address_components[0] &&
                        place.address_components[0].short_name || ''),
                       (place.address_components[1] &&
                        place.address_components[1].short_name || ''),
                       (place.address_components[2] &&
                        place.address_components[2].short_name || '')
                      ].join(' ');
          }

          " . $gMap->getJsName() . "_info_window.setContent('<div><strong>' + place.name + '</strong><br />' + address);
          " . $gMap->getJsName() . "_info_window.open(" . $gMap->getJsName() . ", " . $gMap->getJsName() . "_marker);
              
        /**edited by Ukpro**/
        $('#h_lng').val(place.geometry.location.lng());
        $('#h_lat').val(place.geometry.location.lat());
        /** end edited by Ukpro **/
        
  });
  

$('.map_search').click(function(){
        $('#Address').trigger('keypress');
        console.log($('#Address'));
        google.maps.event.trigger(autocomplete, 'place_changed');
        return false;
    });

          ";

                $gMap->renderMap(array(), Yii::app()->language);
                ?>
        </div>
    </div>
</div>
<?php echo $form->hiddenField($model, 'longitude', array('id' => 'h_lng')); ?>
<?php echo $form->hiddenField($model, 'latitude', array('id' => 'h_lat')); ?>
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

