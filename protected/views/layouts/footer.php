<!-- Start Footer-->
<footer class="row-fluid footer">
    <div class="containerfull">

        <div class="span1"></div>
        <div class="span10">
            <div class="row-fluid">

                <div class="span4 pull-left new-block">
                    <h2 class="ftitle rtl"><?= Helper::t('روابط تهمك') ?></h2>
                    <div class="row-fluid flinks">
                        <div class="span6">
                            <ul class="rtl">
                                <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/"> <?= Helper::t('الصفحة الرئيسية') ?></a></li>
                                <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/contact"><?= Helper::t('كلمنا') ?></a></li>
                                <li>  <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/about-a7gezly"><?php echo $this->getPage(4);?> </a></li>
                                <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/advirtiseWithUs"><?= Helper::t('للاعلان معنا') ?></a></li>
                                <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/find-us"><?php echo $this->getPage(9)?></a></li>
                                <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/page/view/why-a7gezly"><?php echo $this->getPage(10)?></a></li>
                                <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/home/offers"><?= Helper::t('عروض وتخفيضات') ?></a></li>
                            </ul>
                        </div>
                        <div class="span6">
                            <ul class="rtl">
                                <?php
                                $categories = $this->getcategories();
                                foreach ($categories as $category) {
                                    ?>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl . '/category-' . $category->url ?>"><?php echo $category->title; ?></a></li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span4 pull-left block2">
                    <h2 class="ftitle rtl"><?= Helper::t('انضم الى القائمة البريدية') ?></h2>
                    <div class="row-fluid news-letter rtl">
                        <p><?= Helper::t('كن أول من يعلم') ?></p>
                        <p><?= Helper::t('احصل على عروضنا الأقل سعرا') ?></p>

                        <?php
                        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                            'id' => 'newsletter-form',
                            'enableAjaxValidation' => false,
                            //  'enableClientValidation' => true,
                            'action' => Yii::app()->createUrl('home/newsletter'),
                            'htmlOptions' => array(
                                'onsubmit' => 'js:checknull();'
                            )
                                )
                        );
                        ?>

                        <?php
            if(Yii::app()->user->hasFlash('success')){
            ?>
             <div class="alert alert-success">
                                <?php echo Yii::app()->user->getFlash('success'); ?>
                            </div>
            <?php
            }
            if(Yii::app()->user->hasFlash('error')){
            ?>
             <div class="alert alert-error">
                                <?php echo Yii::app()->user->getFlash('error'); ?>
                            </div>
            <?php
            }
            ?>
                        <input id='email' class="mailfoot" onsubmit="return checknull(), id = appendedInput;" name="NewsLetter[email]"  type="text" placeholder="<?= Helper::t('اكتب بريديك هنا') ?>" >
                        <?php
                        echo CHtml::submitButton(Helper::t('ارسل بياناتك'), array(
                            'class' => 'btn btn-block our-btn-sty',
                        ));
                        ?>
                        <?php ?>
                        </form>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>

                <div class="span4 pull-left last-block">
                    <h2 class="ftitle rtl"><?= Helper::t('تابعونا') ?></h2>
                    <div class="row-fluid social-wed rtl">
                      <div class="fb-like-box" data-href="<?php echo   Helper::yiiparam('facebook') ?>" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                    </div>
                    <!--<div id="fb-root"></div>-->
                </div>

            </div>

            <hr>

            <div class="row-fluid">

                <div class="span4 copyrights">
                    <p class="rights"> &copy; 2013 A7gezly.com . All Rights Reserved.</p>
                    <p class="rtl"><?= Helper::t('بيان الخصوصية فى فتح حسابك وكن أول من يعلم') ?> </p>
                </div>

                <div class="span4 text-center">
                    <a href="#" class="scrollup">
                       <?= Helper::t('العودة لأعلى') ?>  <i class="fa fa-3x fa-chevron-circle-up"></i>
                    </a>
                </div>

                <div class="span4 social-icons">
                    <ul class="rtl">
                        <li><a href="<?php echo   Helper::yiiparam('facebook') ?>" target="blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/social_icons_1.png" alt="facebook"></a></li>
                        <li><a href="<?php echo   Helper::yiiparam('twitter') ?>" target="blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/social_icons_2.png" alt="twitter"></a></li>
                        <li><a href="<?php echo   Helper::yiiparam('google') ?>" target="blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/social_icons_3.png" alt="google"></a></li>
                        <li><a href="<?php echo   Helper::yiiparam('youtube') ?>" target="blank"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/images/social_icons_4.png" alt="youtube"></a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="span1"></div>
    </div>
</footer>




<!-- Le javascript
================================================== -->

<!--<script src="<?php //echo Yii::app()->getBaseUrl(true); ?>/js/jquery.js"></script>
<script src="<?php //echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap.js"></script>
<script src="<?php //echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-transition.js"></script>-->
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/holder/holder.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/google-code-prettify/prettify.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.flexslider.js"></script>


<script>
                            $(window).load(function() {
                                // The slider being synced must be initialized first
                                $('#carousel').flexslider({
                                    animation: "slide",
                                    controlNav: false,
                                    animationLoop: true,
                                    slideshow: true,
                                    itemWidth: 100,
                                    itemMargin: 0,
                                    asNavFor: '#slider'
                                });

                                $('#slider').flexslider({
                                    animation: "slide",
                                    controlNav: false,
                                    animationLoop: false,
                                    slideshow: false,
                                    sync: "#carousel"
                                });
                            });
</script>

<script>
    $('#bgslider').carousel({
        interval: 5000
    })
    $('#offers').carousel({
        interval: 3000
    })
</script>

<script>
    $(document).ready(function() {
        //top arrow
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });
        // scroll to top
        $('.scrollup').click(function() {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
    });
</script>

<script>
    // starrr plugin (https://github.com/dobtco/starrr)
    var __slice = [].slice;

    (function($, window) {
        var Starrr;

        Starrr = (function() {
            Starrr.prototype.defaults = {
                rating: void 0,
                numStars: 5,
                change: function(e, value) {
                }
            };

            function Starrr($el, options) {
                var i, _, _ref,
                        _this = this;

                this.options = $.extend({}, this.defaults, options);
                this.$el = $el;
                _ref = this.defaults;
                for (i in _ref) {
                    _ = _ref[i];
                    if (this.$el.data(i) != null) {
                        this.options[i] = this.$el.data(i);
                    }
                }
                this.createStars();
                this.syncRating();
                this.$el.on('mouseover.starrr', 'i', function(e) {
                    return _this.syncRating(_this.$el.find('i').index(e.currentTarget) + 1);
                });
                this.$el.on('mouseout.starrr', function() {
                    return _this.syncRating();
                });
                this.$el.on('click.starrr', 'span', function(e) {
                    return _this.setRating(_this.$el.find('i').index(e.currentTarget) + 1);
                });
                this.$el.on('starrr:change', this.options.change);
            }

            Starrr.prototype.createStars = function() {
                var _i, _ref, _results;

                _results = [];
                for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                    _results.push(this.$el.append("<i class='fa fa-star-o'></i>"));
                }
                return _results;
            };

            Starrr.prototype.setRating = function(rating) {
                if (this.options.rating === rating) {
                    rating = void 0;
                }
                this.options.rating = rating;
                this.syncRating();
                return this.$el.trigger('starrr:change', rating);
            };

            Starrr.prototype.syncRating = function(rating) {
                var i, _i, _j, _ref;

                rating || (rating = this.options.rating);
                if (rating) {
                    for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                        this.$el.find('i').eq(i).removeClass('fa-star-o').addClass('fa-star');
                    }
                }
                if (rating && rating < 5) {
                    for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                        this.$el.find('i').eq(i).removeClass('fa-star').addClass('fa-star-o');
                    }
                }
                if (!rating) {
                    return this.$el.find('i').removeClass('fa-star').addClass('fa-star-o');
                }
            };

            return Starrr;

        })();
        return $.fn.extend({
            starrr: function() {
                var args, option;

                option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                return this.each(function() {
                    var data;

                    data = $(this).data('star-rating');
                    if (!data) {
                        $(this).data('star-rating', (data = new Starrr($(this), option)));
                    }
                    if (typeof option === 'string') {
                        return data[option].apply(data, args);
                    }
                });
            }
        });
    })(window.jQuery, window);

    $(function() {
        return $(".starrr").starrr();
    });

    $(document).ready(function() {

        $('#stars').on('starrr:change', function(e, value) {
            $('#count').html(value);
            $('.alert').removeClass('hide').show().delay(1000).addClass("in").fadeOut(3500);
        });

    });

</script>

<script>
    $(document).ready(function() {
        $('#forget_btn').click(function() {
            $('#login').hide('slow');
            $('#forget').toggle('slow');
        });
    });

    $(document).ready(function() {
        $('#back_btn').click(function() {
            $('#forget').hide('slow');
            $('#login').toggle('slow');
            ;
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#ubtn1').click(function() {
            $('#umail').hide('slow');
            $('#uaddress').hide('slow');
            $('#upassword').hide('slow');
            $('#ubirth').hide('slow');
            $('#uname').toggle('slow');
        });
    });

    $(document).ready(function() {
        $('#ubtn2').click(function() {
            $('#umail').toggle('slow');
            $('#uaddress').hide('slow');
            $('#upassword').hide('slow');
            $('#ubirth').hide('slow');
            $('#uname').hide('slow');
        });
    });

    $(document).ready(function() {
        $('#ubtn3').click(function() {
            $('#umail').hide('slow');
            $('#uaddress').toggle('slow');
            $('#upassword').hide('slow');
            $('#ubirth').hide('slow');
            $('#uname').hide('slow');
        });
    });

    $(document).ready(function() {
        $('#ubtn4').click(function() {
            $('#umail').hide('slow');
            $('#uaddress').hide('slow');
            $('#upassword').toggle('slow');
            $('#ubirth').hide('slow');
            $('#uname').hide('slow');
        });
    });

    $(document).ready(function() {
        $('#ubtn5').click(function() {
            $('#umail').hide('slow');
            $('#uaddress').hide('slow');
            $('#upassword').hide('slow');
            $('#ubirth').toggle('slow');
            $('#uname').hide('slow');
        });
    });
</script>

<script> function checknull()
    {

        if ($('#email').val() == '')
        {

            alert("<?= Helper::t('أدخل عنوان بريدك الألكتروني') ?>");
            location.replace("<?php echo  Yii::app()->request->requestUri;?>");
            return false;
        }

        else
            return true;
    }
</script>


<!--switch between grid & list  view -->
<script>

$( "#grid" ).click(function() {
document.getElementById("tab7").style.display="block";
document.getElementById("tab8").style.display="none";



});


$( "#list" ).click(function() {
document.getElementById("tab7").style.display="none";
document.getElementById("tab8").style.display="block";
});
</script>
<!--facebook liker box-->

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>


