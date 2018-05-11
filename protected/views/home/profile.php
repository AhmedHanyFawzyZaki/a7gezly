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
                            <li class="active"><?= Helper::t('الحساب الشخصي ') ?> </li>
                        </ol>
                        <div class="divid"></div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab7" data-toggle="tab"><?= Helper::t('بيانات الحساب') ?> </a></li>
                            <li class="px3left_tap">
                                <a href="#tab8" data-toggle="tab"><?= Helper::t('حجوزاتي') ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12 color_div">
                        <div class="tab-content top20px" style="min-height:370px;">
                            <div class="tab-pane active" id="tab7">
                                <div class="myrow myrow2 rtl">
                                    <span class="site_color"> : <?= Helper::t('الاسم') ?></span>
                                    <span><?php echo (!empty($user->username))?$user->username : $user->fname .' ' . $user->lname ?></span>
                                    <?php if(empty($user->oauth_uid)){ ?>
                                    <span class="site_color pull-left" id="ubtn1"> <?= Helper::t('تعديل') ?></span>
                                    <?php } ?>
                                    <form  method="post" action="<?php echo yii::app()->request->baseUrl; ?>/home/profile/1" class="no_margin login_sys pull-right rtl" id="uname">
                                        <div class="myrow">
                                            <label> : <?= Helper::t('الاسم المستخدم الجديد') ?></label>
                                            <input name="newname" type="text" placeholder="<?= Helper::t('من فضلك ادخل الاسم الجديد') ?>">
                                            <!--<input  name="action1" type="hidden" />-->
                                        </div>

                                        <div class="myrow">
                                            <label> : <?= Helper::t('كلمه المرور الحالية') ?></label>
                                            <input name="pass" type="password" placeholder="<?= Helper::t('من فضلك ادخل كلمه المرور الحالي') ?>ه">
                                        </div>

                                        <div class="myrow">
                                            <button type="submit" class="btn our-btn-sty pull-right"> <?= Helper::t('حفظ') ?></button>
                                        </div>
                                    </form>
                                </div>	

                                <div class="myrow myrow2 rtl">
                                    <span class="site_color">: <?= Helper::t('البريد الالكتروني ') ?> </span>
                                    <span><?php echo $user->email; ?></span>
                                    <?php  if(empty($user->oauth_uid)){ ?>
                                    <span class="site_color pull-left" id="ubtn2"><?= Helper::t('تعديل') ?></span>
                                    <?php } ?>
                                    <form method="post" action="<?php echo yii::app()->request->baseUrl; ?>/home/profile/2" class="no_margin login_sys pull-right rtl" id="umail">
                                        <div class="myrow">
                                            <label>: <?= Helper::t('البريد الالكتروني الجديد ') ?></label>
                                            <input name="newmail" type="text" placeholder="<?= Helper::t('من فضلك ادخل البريد الالكتروني الجديد') ?>">
<!--                                            <input  name="action2" type="text" value="email">-->
                                        </div>

                                        <div class="myrow">
                                            <label> : <?= Helper::t('كلمه المرور الحالية') ?></label>
                                            <input name="pass" type="password" placeholder="<?= Helper::t('من فضلك ادخل كلمه المرور الحاليه') ?>">
                                        </div>

                                        <div class="myrow">
                                            <button type="submit" class="btn our-btn-sty pull-right"><?= Helper::t('حفظ') ?></button>
                                        </div>
                                    </form>
                                </div>	

                            <?php
                            if(empty($user->oauth_uid)){
                                ?>
                                    <div class="myrow myrow2 rtl">
                                    <span class="site_color">:  <?= Helper::t('كلمه المرور') ?> </span>
                                    <span><?php echo User::model()->simple_decrypt($user->password); ?></span>
                                    <span class="site_color pull-left" id="ubtn4"><?= Helper::t('تعديل') ?></span>
                                    <form method="post" action="<?php echo yii::app()->request->baseUrl; ?>/home/profile/3" class="form-veryical" id="upassword">
                                        <?php
                                        if (Yii::app()->user->hasflash('success')) {
                                            ?>
                                            <div   class="alert alert-success"><?php echo Yii::app()->user->getFlash('success') ?></div>
                                        <?php }
                                        ?>


                                        <div class="myrow">
                                            <label>: <?= Helper::t('كلمة المرور الجديدة ') ?></label>
                                            <input name="newpass" type="password" placeholder="<?= Helper::t('من فضلك ادخل كلمه المرور الجديدة') ?>">
                                            <!--<input  name="action3" type="text" value="password">-->
                                        </div>

                                        <div class="myrow">
                                            <label>:<?= Helper::t('كلمه المرور الحالية') ?></label>
                                            <input name="pass" type="password" placeholder="<?= Helper::t('من فضلك ادخل كلمه المرور الحاليه') ?>">
                                        </div>

                                        <div class="myrow">
                                            <button type="submit" class="btn our-btn-sty pull-right"><?= Helper::t('حفظ') ?></button>
                                        </div>
                                    </form>
                                </div>	
                                <?php
                            }
                            ?>


                            </div>

                            <div class="tab-pane" id="tab8">
                                <table class="table table-bordered xtb" >
                                    <thead>
                                        <tr>
                                             
                                            <th></th>
                                            <th class="sub-title"> <?= Helper::t('التاريخ') ?></th>
                                            <th class="sub-title" ><?= Helper::t('السعر') ?></th>
                                            <th class="sub-title"> <?= Helper::t('الرحلة') ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($myBookings as $myBooking) {
                                            ?>
                                            <tr> 
                                               
                                                <td>
                                                    <a href="<?php echo yii::app()->request->baseUrl . '/home/bookDetail/' . $myBooking->id; ?>" class="btn our-btn-sty pull-right">التفاصيل</a>
                                                     <a href="<?php echo Yii::app()->createUrl("home/delete", array("id" => $myBooking->id)); ?>" class="btn our-btn-sty pull-right"> الغاء    </a>
                                                </td>
                                                <td><?php echo $myBooking->created; ?></td>
                                                <td><?php echo $myBooking->total_price; ?></td>
                                                <td><?php echo $myBooking->trip->title;
                                        ; ?></td>


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