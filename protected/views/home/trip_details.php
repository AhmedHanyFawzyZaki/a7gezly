<div class="row-fluid">
    <div class="containerfull">
        <div class="row-fluid">

            <div class="span1 right-ads">
                <?php $right_ad = $this->getadv(2); ?>
                <a href="<?php echo $right_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $right_ad->image; ?>" ></a>
            </div>
            <div class="span10 content top10px">
                <div class="row-fluid">
                    <div class="span12">
                        <ol class="breadcrumb rtl">
                            <li>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                                    <?= Helper::t('الرئيسية') ?>
                                </a>
                            </li>
                            <li class="active"><?php echo $trip->title; ?></li>
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>
                <div class="ads-cats"><img  style="width:1111px;height:175px;" src="<?php echo Yii::app()->request->baseUrl; ?>/media/categories/<?php echo $category_info->image; ?>" class="img-responsive"></div>
                <div class="row-fluid catscustom">
                    <div class="cats-search">

                        <?php $this->renderPartial('searchForm'); ?>
                        <!--End search-->
                        <div class="row-fluid top10px">
                            <div class="span5 item-details">
                                <div class="span12 color_div">
                                    <div class="row-fluid">

                                        <div class="row-fluid">
                                            <h3 class="rtl"><?php echo $trip->title; ?></h3>
                                            <div class="row-fluid rating">

                                                <div class="span6 lead rate">
                                                    <div id="stars" class="starrr"></div>
                                                </div>
                                                <div class="span6 rate">
                                                    <img src="images/TripAdvisor-logo.png" class="img-responsive">
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row-fluid">
                                            <h4 class="rtl"> <?= Helper::t('تفاصيل الرحلة') ?> </h4>

                                            <?php
                                            $short_detail = strip_tags($trip->details);
                                            echo substr($short_detail, 0, 300) . '...';
                                            ?>

                                        </div>



                                        <div class="row-fluid item-price">

                                            <div class="span8 text-center price">
                                                <span><?php echo $trip->price; ?></span> <span><?= Helper::t('جنية') ?></span>
                                            </div>
                                            <div class="span4 text-center">
                                                <div class="row-fluid">
                                                    <div class="span12 toppadd">

                                                        <h4><?= Helper::t('سعر الرحلة') ?></h4>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="span7">
                                <!-- Place somewhere in the <body> of your page -->
                                <div id="slider" class="flexslider">
                                    <ul class="slides">

                                        <?php
                                        $photos = Helper::getGalleryImages($trip->gallery_id);
                                        foreach ($photos as $photo) {
                                            ?>
                                            <li>
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/gallery/<?php echo $photo->rank; ?>.jpg" />
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                </div>
                                <div id="carousel" class="flexslider">
                                    <ul class="slides">
                                        <?php
                                        foreach ($photos as $photo) {
                                            ?>
                                            <li>
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/gallery/<?php echo $photo->rank; ?>.jpg" />
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <!-- items mirrored twice, total of 12 -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row-fluid top10px">
                            <div class="span12 color_div">

                                <div class="row-fluid">
                                    <div class="span6 item-video">
                                        <h2 class="blue-title rtl"><i class="fa fa-2x fa-play-circle"></i> <?= Helper::t('شاهد الفيديو') ?></h2>
                                        <video controls class="item-video"></video>
                                    </div>
                                    <div class="span6 item-map">
                                        <h2 class="blue-title rtl"><i class="fa fa-2x fa-globe"></i> <?= Helper::t('خريطة المكان') ?></h2>
                                        <div class="row-fluid">

                                            <?php
                                            if (!empty($hotel_info->longitude)&&!empty($hotel_info->latitude)) {
                                                ?>

                                                <?php
                                                Yii::import('ext.gmap.*');
                                                $gMap = new EGMap();
                                                $gMap->setWidth(500);
                                                $gMap->setHeight(250);

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
                                                    'class' => 'pull-left'
                                                );

                                                $info_window_a = new EGMapInfoWindow($trip->title);
                                                $marker = new EGMapMarker($hotel_info->latitude, $hotel_info->longitude, array('title' => $hotel_info->title,
                                                    'draggable' => false), 'marker');
                                                $marker->addHtmlInfoWindow($info_window_a);
                                                $gMap->addMarker($marker);

                                                $gMap->setCenter($hotel_info->latitude, $hotel_info->longitude);
                                                $gMap->zoom = 2;
                                                $gMap->renderMap(array(), Yii::app()->language);
                                                ?>

                                                <?php
                                            } else {
                                                echo'<p align="center"><b>' . Helper::t('لا توجد خريطة للفندق الان ') . '</b></p>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>


                                <div class="row-fluid top10px">
                                    <div class="span12 trip-prog">
                                        <h2 class="blue-title rtl"><i class="fa fa-2x fa-list"></i> <?= Helper::t('برنامج الرحلة') ?></h2>
                                        <div class="row-fluid">
                                            <div class="span9 prog-details">
                                                <h5 class="sub-title text-center"><?= Helper::t('في الفترة من') ?>  <?php echo $trip->start_date; ?>  <?= Helper::t('إلى') ?><?php echo $trip->end_date; ?></h5>
                                                <div class="row-fluid">

                                                    <form  name="save" method="post" onsubmit="return checkrooms();"  >
                                                        <div class="span10">
                                                            <table class="table table-bordered xtb" >
                                                                <thead>
                                                                    <tr>
                                                                        <th class="sub-title"><?= Helper::t('نوع الغرفه') ?></th>
                                                                        <th class="sub-title"><?= Helper::t('الشروط') ?></th>
                                                                        <th class="sub-title"><?= Helper::t('عدد الأفراد') ?></th>
                                                                        <th class="sub-title" ><?= Helper::t('السعر') ?></th>
                                                                        <th class="sub-title"><?= Helper::t('عدد الغرف') ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    // $rooms=array();
                                                                    foreach ($details as $detail) {
                                                                        $roomType = RoomType::model()->findByPk($detail->room_type_id);
                                                                        //print_r($roomType);die;
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="xdiv rtl">

                                                                                                        <!--<img src="images/item.jpg" class="smallimg"/>-->
                                                                                    <span class="itemtitle rtl">
                                                                                        <?php echo $roomType->title; ?>
                                                                                    </span>
                                                                                    <ul class="itemoptions rtl">

                                                                                        <?php
                                                                                        $criteria_op = new CDbCriteria();
                                                                                        $criteria_op->condition = 'room_type_id = :room_type_id';
                                                                                        $criteria_op->params = array(':room_type_id' => $detail->room_type_id);
                                                                                        $options = RoomOptionRelation::model()->findAll($criteria_op);
                                                                                        foreach ($options as $option) {
                                                                                            $roomOption = RoomOption::model()->findByPk($option->room_option_id);
                                                                                            ?>
                                                                                            <li><i class="fa fa-sun-o"></i> <?php echo $roomOption->title; ?></li>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="sele rtl ">
                                                                                    <i class="fa fa-inbox"></i>
                                                                                    <?= Helper::t('تفضيل السرير') ?>
                                                                                    <select name="beds[]">
                                                                                        <option value="0"><?= Helper::t('لا يوجد') ?></option>
                                                                                        <?php
                                                                                        $criteria_bed = new CDbCriteria();
                                                                                        $criteria_bed->condition = 'room_type_id = :room_type_id';
                                                                                        $criteria_bed->params = array(':room_type_id' => $detail->room_type_id);
                                                                                        $beds = RoomBedRelation::model()->findAll($criteria_bed);
                                                                                        foreach ($beds as $bed) {
                                                                                            $bedType = BedType::model()->findByPk($bed->bed_type_id);
                                                                                            ?>
                                                                                            <option value="<?php echo $bedType->id; ?>"><?php echo $bedType->title; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                                <ul class="itemdetails rtl">
                                                                                    <li class="site_color"><b><?= Helper::t('الأسعار للغرف') ?></b></li>
                                                                                    <li><b>:<?= Helper::t(' يتضمن') ?></b><?php echo $roomType->tax_included; ?> </li>
                                                                                    <li><b>:<?= Helper::t(' لا يتضمن') ?></b> <?php echo $roomType->tax_excluded; ?></li>
                                                                                </ul>
                                                                            </td>
                                                                            <td>
                                                                                <ul class="itemdetails2 rtl">
                                                                                    <?php
                                                                                    $criteria_con = new CDbCriteria();
                                                                                    $criteria_con->condition = 'room_type_id = :room_type_id';
                                                                                    $criteria_con->params = array(':room_type_id' => $detail->room_type_id);
                                                                                    $conditions = RoomCoditionRelation::model()->findAll($criteria_con);
                                                                                    foreach ($conditions as $condition) {
                                                                                        $roomCondition = RoomCondition::model()->findByPk($condition->condition_id);
                                                                                        ?>
                                                                                        <li><b> <?php echo $roomCondition->condition; ?></b> </li>

                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </ul>
                                                                            </td>
                                                                            <td>
                                                                                <ul class="itemdetails2 rtl">
                                                                                    <?php
                                                                                    foreach ($conditions as $condition) {
                                                                                        $roomCondition = RoomCondition::model()->findByPk($condition->condition_id);
                                                                                        ?>
                                                                                        <li>
                                                                                            <i class="fa fa-user"></i> <?php echo $roomCondition->persons_no; ?>
                                                                                        </li>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </ul>

                                                                            </td>
                                                                            <td>
                                                                                <ul class="itemdetails2 rtl">
                                                                                    <?php
                                                                                    foreach ($conditions as $condition) {
                                                                                        $roomCondition = RoomCondition::model()->findByPk($condition->condition_id);
                                                                                        ?>
                                                                                        <li><b> <?php echo $roomCondition->price; ?></b> </li>

                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </ul>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                //start

                                                                                foreach ($conditions as $key => $condition) {
                                                                                    ?>
                                                                                    <div class="row-fluid tb<?php echo (($key == count($conditions) - 1) ? '2' : ''); ?>">
                                                                                        <?php $roomCondition = RoomCondition::model()->findByPk($condition->condition_id); ?>
                                                                                        <select name="<?php echo $roomType->id . '_' . $condition->id; ?>" class="smallselect rtl" >
                                                                                            <option  value= 0><?= Helper::t('عدد الغرف') ?></option>
                                                                                            <?php
                                                                                            for ($i = 1; $i < 4; $i++) {
                                                                                                ?>
                                                                                                <option  class="num" value="<?php echo $i; ?>"><?php echo $i . ' (' . $i * $roomCondition->price . Helper::t('جنية') . ' )'; ?></option>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </select>

                                                                                    </div><br>
                                                                                    <?php
                                                                                }
                                                                                //end
                                                                                ?>

                                                                            </td>
                                                                        </tr>

                                                                        <?php
                                                                    }
                                                                    ?>



                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div id="book" class="span2 rtl paddingfull">

                                                            <button   id="btn" class='btn btn-default our-btn-sty' type='submit'><?= Helper::t(' احجز') ?></button>
                                                            <p><br><?= Helper::t(' تأكيد فوري') ?></p>
                                                        </div>
                                                        <input id="rms" type="hidden" name="rooms" value="">
                                                        <input id="prc" type="hidden" name="price" value="">
                                                    </form>

                                                </div>
                                            </div>
                                            <div class="span3 prog-details rtl">
                                                <div class="row-fluid">
                                                    <div class="span12 paddingfull">
                                                        <?php echo $trip->details; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row-fluid top10px">
                                    <div class="span6">
                                        <h2 class="blue-title rtl"><i class="fa fa-2x fa-fire"></i>  <?= Helper::t(' سفارى  رحلات المتعة') ?></h2>
                                        <div class="row-fluid prog-details">
                                            <div class="row-fluid">
                                                <div class="span12 paddingfull rtl">
                                                    <?php echo $trip->safari_details; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <h2 class="blue-title rtl"><i class="fa fa-2x fa-exclamation-circle"></i> <?= Helper::t('معلومات تهمك') ?></h2>
                                        <div class="row-fluid prog-details">
                                            <div class="row-fluid">
                                                <div class="span12 paddingfull rtl">
                                                    <?php echo $trip->import_info; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row-fluid top10px">
                                    <div class="span12">
                                        <h2 class="blue-title rtl"><i class="fa fa-2x fa-comments"></i>  <?= Helper::t('التعليقات') ?></h2>
                                        <div class="row-fluid rtl users-comment">
                                            <?php if (count($comments) != 0) {
                                                ?>
                                                <?php
                                                foreach ($comments as $comment) {
                                                    ?>
                                                    <div class="media">
                                                        <a href="#" class="pull-right"><img src="<?php echo Yii::app()->request->baseUrl . '/media/members/' . $comment->user->image; ?>" /></a>
                                                        <div class="media-body">
                                                            <div class="media-content">

                                                                <h4 class="media-heading"><?php echo $comment->title; ?></h4>
                                                                <?php echo $comment->comment; ?>
                                                                <div class="row-fluid comment-footer">
                                                                    <div class="span2">
                                                                        <i class="fa fa-user"></i>
                                                                        <span class="comm-user-name"><?php echo $comment->user->username; ?></span>
                                                                    </div>
                                                                    <div class="span2">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <span class="comm-user-name"><?php echo $comment->date; ?></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                                <?php
                                            } else
                                                echo Helper::t('لا توجد تعليقات');
                                            ?>
                                        </div>
                                        <?php
                                        if (isset(Yii::app()->user->group)) {
                                            ?>
                                            <a href="comment-<?php echo $trip->url; ?>"><h4><?= Helper::t('اترك تعليقك') ?></h4></a>
                                            <?php
                                        } else
                                            echo '<a href="' . Yii::app()->request->baseUrl . '/home/login"><h4>' . Helper::t('تسجيل الدخول اولا') . '</h4></a>'
                                            ?>

                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <div class="row-fluid bottom-ads">
                    <?php
                    $inner_ads = $this->getadv(5);
                    foreach ($inner_ads as $inner_ad) {
                        ?>
                        <div class="span6 bt-ads">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $inner_ad->image; ?>">
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div><!--End Content-->

            <div class="span1 left-ads">
                <?php $left_ad = $this->getadv(2); ?>
                <a href="<?php echo $left_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $left_ad->image; ?>" ></a>
            </div>
        </div>
    </div>
</div>




<script>

    $('select.smallselect ').change(function() {
        var sum = 0;
        $('select.smallselect :selected').each(function() {
            sum += Number($(this).val());
            //alert(sum)

        });
        $('#rms').val(sum);

        var price = 0;
        var regExp = /\((.+)\)/;
        $('select.smallselect :selected').each(function() {
            var matches = regExp.exec($(this).text());
            //  alert(matches[1].toString());
            if (matches != null) {
                price += parseInt(matches[1]);
            }
        });
        //   alert(price)

        // price += <?php //echo $roomCondition->price;      ?>;
        // alert(<?php //echo $roomCondition->price;      ?>)
        $('#prc').val(price);

        if (sum != 0)
        {
            if (sum == 1)
            {
                document.getElementById("book").innerHTML = "<p><?= Helper::t('غرفة واحدة بسعر ') ?></p><p class='pricev'>" + price + " <?= Helper::t('جنيه') ?></p><button class='btn btn-default our-btn-sty' type='submit'><?= Helper::t('احجز') ?></button><p class='bestprice'><?= Helper::t('انت بالفعل حصلت علي افضل الاسعار') ?></p><p><?= Helper::t('تأكيد فوري') ?></p>";

            }
            else if (sum == 2)
            {
                document.getElementById("book").innerHTML = "<p ><?= Helper::t('غرفتين بسعر') ?></p><p class='pricev'>" + price + "  <?= Helper::t('جنيه') ?></p><button class='btn btn-default our-btn-sty' type='submit'><?= Helper::t('احجز') ?></button><p class='bestprice'><?= Helper::t('انت بالفعل حصلت علي افضل الاسعار') ?></p><p><?= Helper::t('تأكيد فوري') ?></p>";
            }
            else
            {
                document.getElementById("book").innerHTML = "<p class='pricev'>" + sum + "</p><p><?= Helper::t('غرف بسعر') ?></p><p class='pricev'>" + price + " <?= Helper::t('جنيه') ?></p><button class='btn btn-default our-btn-sty' type='submit'><?= Helper::t('احجز') ?></button><p class='bestprice'><?= Helper::t('انت بالفعل حصلت علي افضل الاسعار') ?></p><p><?= Helper::t('تأكيد فوري') ?></p>";
            }


        }


    });

    function checkrooms()
    {

        if ($('#rms').val() == '')
        {

            alert("<?= Helper::t('اختر الغرفة اولا') ?>");
            location.replace("<?php echo Yii::app()->request->requestUri; ?>");
            return false;
        }

        return true;
    }
</script>
