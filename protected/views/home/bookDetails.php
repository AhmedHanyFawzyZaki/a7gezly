<!-- Begin page content -->
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
                            <li class="active"><a href="<?php echo yii::app()->request->baseUrl; ?>/home/profile"><?= Helper::t('الحساب الشخصى') ?></a></li>
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <ul class="nav nav-tabs">

                            <li class="px3left_tap active">
                                <a href="#tab8" data-toggle="tab"><?= Helper::t('تفاصيل الحجز') ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12 color_div">
                        <div class="tab-content top20px" style="min-height:370px;">


                            <div class="tab-pane active" id="tab8">
                                <table class="table table-bordered xtb" >
                                    <thead>
                                        <tr>
                                            <th class="sub-title"> <?= Helper::t('نوع الغرفه') ?></th>
                                            <th class="sub-title"> <?= Helper::t('الشروط') ?></th>
                                            <th class="sub-title"> <?= Helper::t('عدد الأفراد') ?></th>
                                            <th class="sub-title" > <?= Helper::t('السعر') ?></th>
                                            <th class="sub-title"> <?= Helper::t('عدد الغرف') ?></th>
                                                            <!--<th></th>-->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($details as $detail) {
                                            $roomType = RoomType::model()->findByPk($detail->room_type_id);
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="rtl">
                                                        <span class="itemtitle rtl"> <?php echo $roomType->title; ?></span>
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
                                                        <b class="site_color">
                                                            <?php
                                                            $bedType = BedType::model()->findByPk($detail->bedType_id);
                                                            echo ($detail->bedType_id == 0) ? '  لا يوجد' : $bedType->title;
                                                            ?>

                                                        </b>
                                                    </div>
                                                    <ul class="itemdetails rtl">
                                                        <li class="site_color"><b><?= Helper::t('الأسعار للغرف') ?></b></li>
                                                        <li><b><?= Helper::t(' يتضمن') ?></b><?php echo $roomType->tax_included; ?> </li>
                                                        <li><b><?= Helper::t(' لا يتضمن') ?></b>  <?php echo $roomType->tax_excluded; ?> </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="itemdetails2 rtl">
                                                        <?php
                                                        //note the condition_id here is the id in the relational table with rooms
                                                        $criteria_con = new CDbCriteria();
                                                        $criteria_con->condition = 'room_type_id = :room_type_id and  id = :id ';
                                                        $criteria_con->params = array(':room_type_id' => $detail->room_type_id, ':id' => $detail->condition_id);
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
                                                    <?php echo $detail->room_no; ?> (
                                                    <span class="pricev"> <?php echo $roomCondition->price * $detail->room_no ?> <?= Helper::t('جنية') ?> </span>
                                                    )
                                                </td>
    <!--                                                <th> 
                                                    <a href="<?php echo Yii::app()->createUrl("home/delete", array("d" => $detail->id, "m" => $detail->booking_id)); ?>" class="btn our-btn-sty pull-right"> الغاء    </a>
                                                </th>-->
                                            </tr>
                                            <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>                                                          
                        </div>
                    </div>
                </div>

            </div><!--End Content-->
            <div class="span1 left-ads">
                <?php $left_ad = $this->getadv(3); ?>
                <a href="<?php echo $left_ad->url ?>" target="blank" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/ads/<?php echo $left_ad->image; ?>" ></a>
            </div>
        </div>
    </div>
</div>
<!-- End page content --> 
