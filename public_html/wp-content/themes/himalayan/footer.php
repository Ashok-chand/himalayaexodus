<!-- /.footer -->
<!-- start three boxes -->

<section class="three_boxes wow fadeInUp">

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="box">
                    <div class="box_image">
                        <img src="<?php bloginfo('template_url'); ?>/images/newsletter.png" />
                    </div>
                    <div class="box_content">
                        <h2>Subscribe newsletter</h2>
                        <?php echo do_shortcode('[wysija_form id="2"]'); ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="box">
                    <div class="box_image">
                        <img src="<?php bloginfo('template_url'); ?>/images/book.png" />
                    </div>
                    <div class="box_content">
                        <h2>download brochure</h2>
                        <?php global $abeka; ?>

                        <p>We are here to provide you the online brochure. <a href="<?php echo $abeka['upload_brochure']['url']; ?>">Click here</a> to download.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="box1">
                    <div class="box_content affiliated">
                        <h2>we are affiliated to:</h2>
                        <ul>
                            <li><img src="<?php bloginfo('template_url'); ?>/images/affi1.png" /></li>
                            <li><img src="<?php bloginfo('template_url'); ?>/images/affi2.png" /></li>
                            <li><img src="<?php bloginfo('template_url'); ?>/images/affi3.png" /></li>
                            <li><img src="<?php bloginfo('template_url'); ?>/images/affi4.png" /></li>
                            <li><img src="<?php bloginfo('template_url'); ?>/images/affi5.png" /></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end three boxes -->
<!-- start footer part -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="contact_us animated fadeInUp wow">
                    <h1>Contact us</h1>
                    <ul>
                        <?php global $abeka; ?>
                        <li class="office"><i class="fa fa-home"></i> <?php echo $abeka['company-name']; ?></li>
                        <li class="address"><i class="fa fa-map-marker"></i> <?php echo $abeka['company-address']; ?><br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $abeka['company-address1']; ?></li>
                        <li class="phone"><i class="fa fa-phone"></i> Phone: <?php echo $abeka['company-phone']; ?></li>
                        <li class="fax"><i class="fa fa-fax"></i> Fax: <?php echo $abeka['company-fax']; ?></li>
                        <li class="email"><i class="fa fa-envelope"></i> E-mail: <a href="mailto:<?php echo $abeka['company-email']; ?>"><?php echo $abeka['company-email']; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="site_links fadeInUp wow">
                    <h1>Site Links</h1>
                    <?php
                    $defaults = array(
                        'theme_location' => 'footer-menu',
                        'menu' => '',
                        'container' => 'ul',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => '',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 0,
                        'walker' => ''
                    );

                    wp_nav_menu($defaults);
                    ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="we_accept fadeInUp wow">
                    <h1>We Accept</h1>
                    <img src="<?php bloginfo('template_url'); ?>/images/accept.png" />
                    <div class="copyright">
                        <p>&copy; <?php echo date('Y'); ?>. <span>Himalayan Exodus</span>. All rights reserved. </p>                      
                    </div>
                    <div>
                        <a href="http://www.crossovernepal.com" class="powered" title="CrossOver Nepal"><img src="<?php bloginfo('template_url'); ?>/images/powered.png" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="destinationul">
    <ul class="dropdown-menu">
        <li class="grid-demo">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <?php
                        $categories = get_terms(
                                'category', array('parent' => 32, 'orderby' => 'name', 'order' => 'DESC')
                        );
                        ?>
                        <?php foreach ($categories as $cat) { ?> 
                            <li><a data-toggle="tab" data-list="<?php echo $cat->term_id; ?>" href="#<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?><i class="fa fa-angle-right"></i></a></li>
                        <?php } ?>
                    </ul>

                    <div class="tab-content">
                        <?php foreach ($categories as $cat) { ?> 
                            <div id="<?php echo $cat->term_id; ?>" class="tab-pane fade ">

                                <?php
                                $pid = $cat->term_id;
                                $subcategories = get_terms(
                                        'category', array('parent' => $pid)
                                );
                                foreach ($subcategories as $subcat) {
                                    ?>

                                    <div class="col-md-4 col-sm-4 col-xs-12 tab-block">
                                        <?php
                                        $terms = apply_filters('taxonomy-images-get-terms', '');

                                        if (!empty($terms)) {

                                            foreach ((array) $terms as $term) {
                                                if ($term->term_id == $subcat->term_id) {
                                                    print wp_get_attachment_image($term->image_id, 'taxonomy-thumb');
                                                }
                                            }
                                        }
                                        ?>

                                        <h3><a href="<?php echo get_category_link($subcat->term_id); ?>"><?php echo $subcat->name; ?></a></h3>
                                        <p><?php
                                            $tex = $subcat->description;
                                            echo wp_trim_words($tex, $num_words = 10, $more = '… ');
                                            ?></p>
                                    </div>
                                <?php } ?>

                            </div>
                        <?php } ?>

                    </div>
                </div>

            </div>

        </li>
    </ul>
</div>
<!-- end footer part -->


<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

<!--Book now form steps validation and jquery -->
<script src="<?php bloginfo('template_url'); ?>/js/formValidation.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap-formvalidation.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.steps.min.js"></script>
<!--Bootstrap datepicker and datetime picker jquery -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.37797.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/stickyfloat.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.min.js" type="text/javascript"></script>
<script type="text/javascript">

    $('.form_date').datetimepicker({
        language: 'en',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.to_date').datetimepicker({
        language: 'en',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.birth_date').datetimepicker({
        language: 'en',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

</script> 

<!-- Grab Google CDN's jQuery. fall back to local if necessary --> 


<script>
    /*
     * jQuery easing functions (for this demo)
     */
    jQuery.extend(jQuery.easing, {
        def: 'easeOutQuad',
        swing: function (x, t, b, c, d) {
            //alert(jQuery.easing.default);
            return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
        },
        easeInQuad: function (x, t, b, c, d) {
            return c * (t /= d) * t + b;
        },
        easeOutQuad: function (x, t, b, c, d) {
            return -c * (t /= d) * (t - 2) + b;
        },
        easeInOutQuad: function (x, t, b, c, d) {
            if ((t /= d / 2) < 1)
                return c / 2 * t * t + b;
            return -c / 2 * ((--t) * (t - 2) - 1) + b;
        },
        easeOutElastic: function (x, t, b, c, d) {
            var s = 1.70158;
            var p = 0;
            var a = c;
            if (t == 0)
                return b;
            if ((t /= d) == 1)
                return b + c;
            if (!p)
                p = d * .3;
            if (a < Math.abs(c)) {
                a = c;
                var s = p / 4;
            }
            else
                var s = p / (2 * Math.PI) * Math.asin(c / a);
            return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
        },
        easeInOutElastic: function (x, t, b, c, d) {
            var s = 1.70158;
            var p = 0;
            var a = c;
            if (t == 0)
                return b;
            if ((t /= d / 2) == 2)
                return b + c;
            if (!p)
                p = d * (.3 * 1.5);
            if (a < Math.abs(c)) {
                a = c;
                var s = p / 4;
            }
            else
                var s = p / (2 * Math.PI) * Math.asin(c / a);
            if (t < 1)
                return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
            return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
        },
        easeInBack: function (x, t, b, c, d, s) {
            if (s == undefined)
                s = 1.70158;
            return c * (t /= d) * t * ((s + 1) * t - s) + b;
        },
        easeOutBack: function (x, t, b, c, d, s) {
            if (s == undefined)
                s = 1.70158;
            return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
        },
        easeInOutBack: function (x, t, b, c, d, s) {
            if (s == undefined)
                s = 1.70158;
            if ((t /= d / 2) < 1)
                return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
            return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b;
        }
    });

// init the plug-in and bind it to the #menu element
//------------------------------------------------------
    $('.menu').stickyfloat();


// Stuff which are for this DEMO page only
//------------------------------------------------------
    $('.menu').on('click', 'button', function () {
        var elem = $(this).parents('.menu');
        elem.stickyfloat('update', {easing: this.innerHTML});
    });

    $('.menu input').on('change', function () {
        var elem = $(this).parents('.menu'),
                prop = this.className,
                value = this.value,
                options = {};

        if ((value | 0) === parseInt(value)) // if number, normalize
            value = value | 0;

        options[prop] = value;
        elem.stickyfloat('update', options);
    });

// after page refresh, make sure the values are returned to their defaults
    $('.menu :text').each(function () {
        $(this).val(this.defaultValue);
    });

    $('.menu :checkbox').on('change', function () {
        var elem = $(this).parents('.menu'),
                prop = this.className,
                options = {};

        options[prop] = this.checked ? true : false;
        elem.stickyfloat('update', options);
    });

    $('.menu .cssTransition:checkbox').on('change', function () {
        var elem = $(this).parents('.menu'),
                val = this.checked ? 0 : elem.find('.duration').val();

        elem.toggleClass('transition200');
        elem.stickyfloat('update', {cssTransition: this.checked});
    });

    $('.menu :checkbox').each(function () {
        $(this).prop('checked', this.defaultChecked);
    });
</script>
<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>
<!-- Frontpage Demo -->
<script>

    $('.yamm-fw ul').remove();
    var html = $('.destinationul').html();
    $('.yamm-fw').append(html);
    $(".yamm-fw ul.nav-tabs li").eq(0).addClass("active").show(); //Activate second tab
    var id = $(".yamm-fw ul.nav-tabs li a").eq(0).attr('data-list');
    $('#' + id).addClass("active in");
    var count = $(".active  .tab-block").length;
    $('.tab-content .tab-pane').children('.tab-block:nth-child(3)').nextAll().addClass('menu-hide');
    $('.carousel-inner').children('.item:nth-child(1)').addClass('active');
    $('ol.carousel-indicators').children('li:nth-child(1)').addClass('active');
    $(document).ready(function ($) {
        $("#owl-feature").owlCarousel();
        $("#trips").owlCarousel();
        $("#trip").owlCarousel({
            items: 2,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2]
        });
        $("#news").owlCarousel({
            autoPlay: 8000, //Sets AutoPlay to 6 seconds********************
            items: 2,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2]
        });
        $("#testi").owlCarousel({
            autoPlay: 9000, //Sets AutoPlay to 6 seconds********************
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1]
        });
        $("#testi1").owlCarousel({
            autoPlay: 6000, //Sets AutoPlay to 6 seconds********************
            items: 1,
            itemsDesktop: [1199, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1]
        });
    });
    $('.bread a.home span').text('Home');
</script>

<!---------- /.jquery wow ---------->
<script src="<?php bloginfo('template_url'); ?>/js/wow.js"></script>
<script>
    wow = new WOW(
            {
                animateClass: 'animated',
                offset: 100,
                callback: function (box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            }
    );
    wow.init();
    document.getElementById('moar').onclick = function () {
        var section = document.createElement('section');
        section.className = 'section--purple wow fadeInDown';
        this.parentNode.insertBefore(section, this);
    };
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });
</script>
<script src="<?php bloginfo('template_url'); ?>/js/classie.js"></script>
<script>
    function init() {
        window.addEventListener('scroll', function (e) {
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 100,
                    header = document.querySelector(".second_top_bar");
            if (distanceY > shrinkOn) {
                classie.add(header, "smaller");
                classie.add(header, "animated");
                classie.add(header, "fadeInDown");
            } else {
                if (classie.has(header, "smaller")) {
                    classie.remove(header, "smaller");
                }
                if (classie.has(header, "animated")) {
                    classie.remove(header, "animated");
                }
                if (classie.has(header, "fadeInDown")) {
                    classie.remove(header, "fadeInDown");
                }
            }
        });
    }
    window.onload = init();
</script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap-select.js"></script>
<script>
    $(document).ready(function () {
        var mySelect = $('#first-disabled2');

        $('#special').on('click', function () {
            mySelect.find('option:selected').prop('disabled', true);
            mySelect.selectpicker('refresh');
        });

        $('#special2').on('click', function () {
            mySelect.find('option:disabled').prop('disabled', false);
            mySelect.selectpicker('refresh');
        });

        $('#basic2').selectpicker({
            liveSearch: true,
            maxOptions: 1
        });
    });
</script>
<script>
    function init() {
        window.addEventListener('scroll', function (e) {
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 500,
                    header = document.querySelector(".side_menu1");
            if (distanceY > shrinkOn) {
                classie.add(header, "menu_fix");
            } else {
                if (classie.has(header, "menu_fix")) {
                    classie.remove(header, "menu_fix");
                }
            }
        });
    }
    window.onload = init();
</script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.js"></script>
<script>
    $(function () {
        $("#accordion").accordion();
        $("#accordion1").accordion();
        $("#accordion2").accordion();
        $("#accordion3").accordion();
    });
</script>

<script>
    $(function () {
        window.prettyPrint && prettyPrint()
        $(document).on('click', '.yamm .dropdown-menu', function (e) {
            e.stopPropagation()
        })
    })
</script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".fancy").fancybox();
    });
</script>
<?php
$destination = isset($_GET['by_destination']) ? $_GET['by_destination'] : '';
$activity = isset($_GET['by_activity']) ? $_GET['by_activity'] : '';
?>
<script>
    $("document").ready(function () {

        var destination = "<?php echo $destination; ?>";
        var activity = "<?php echo $activity; ?>";
        if (activity == '' && destination != '') {

            $("#by_destination").trigger('change');
        }
    });

    $('#by_destination').on('change', function () {
        var country_term_id = $(this).val();
        if (country_term_id != '') {
            $.ajax({
                type: "POST",
                url: "./wp-admin/admin-ajax.php",
                data: {
                    action: 'search_activity',
                    term_id: country_term_id
                },
                success: function (data) {
                    $("#by_activity").html('');

                    $("#by_activity").append(data);
                    $('.selectpicker').selectpicker('refresh');

                }
            });
        }
    });
    $('#searchsubmit').on('click', function (e) {
        $("#advanced-searchform").prop("disabled", true);

        var country_term_id = $('#by_destination').val();
        if (country_term_id == '') {
            country_term_id = 0;
        }
        var main_term_id = $('#by_activity').val();
        if (main_term_id == '') {
            main_term_id = 0;
        }
        var duration = $('#by_duration').val();
        if (duration == '') {
            duration = 0;
        }
        if (duration == 0 && main_term_id == 0 && country_term_id == 0) {
            alert("please select the search data");
            return false;
        } else {
            $('#advanced-searchform').submit();
        }
    });



    /*
     * Advanced search
     * developed by rupesh Manandhar
     * crossovernepal         * 
     * @param {type} param1
     * @param {type} param2
     */
</script>
<script src="<?php bloginfo('template_url'); ?>/js/step-form.js"></script>
<?php wp_footer(); ?>  
</body>
</html>
<!-- Include Bootstrap Datepicker -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap-datepicker.min.js" charset="UTF-8"></script>



<script>


    $(document).ready(function () {
        document.getElementById("profileForm").reset();
        $('#birth_date')
                .datepicker({
                    format: 'mm/dd/yyyy'
                });

        $('#startDatePicker')
                .datepicker({
                    format: 'mm/dd/yyyy'
                })
                .on('changeDate', function (e) {
                    // Revalidate the start date field
                    $('#profileForm').formValidation('revalidateField', 'from_date');
                });

        $('#endDatePicker')
                .datepicker({
                    format: 'mm/dd/yyyy'
                })
                .on('changeDate', function (e) {
                    $('#profileForm').formValidation('revalidateField', 'to_date');
                });
        function adjustIframeHeight() {
            var $body = $('body'),
                    $iframe = $body.data('iframe.fv');
            if ($iframe) {
                // Adjust the height of iframe
                $iframe.height($body.height());
            }
        }

        // IMPORTANT: You must call .steps() before calling .formValidation()
        $('#profileForm')
                .steps({
                    headerTag: 'h2',
                    bodyTag: 'section',
                    onStepChanged: function (e, currentIndex, priorIndex) {
                        // You don't need to care about it
                        // It is for the specific demo
                        adjustIframeHeight();
                    },
                    // Triggered when clicking the Previous/Next buttons
                    onStepChanging: function (e, currentIndex, newIndex) {
                        var fv = $('#profileForm').data('formValidation'), // FormValidation instance
                                // The current step container
                                $container = $('#profileForm').find('section[data-step="' + currentIndex + '"]');
                        if (newIndex < currentIndex) {
                            return true;
                        }


                        // Validate the container
                        fv.validateContainer($container);
                        $('#confirmName,#confirmEmail,#confirmPhoneNo,#confirmFromDate,#confirmToDate,#confirmTravellerNo').text('');
                        var name = $('#name').val();
                        var email = $('#email').val();
                        var phone = $('#phone').val();
                        var from_date = $('#from_date').val();
                        var to_date = $('#to_date').val();
                        var no_traveller = $('#no_traveller').val();
                        $('#confirmName').text(name);
                        $('#confirmEmail').text(email);
                        $('#confirmPhoneNo').text(phone);
                        $('#confirmFromDate').text(from_date);
                        $('#confirmToDate').text(to_date);
                        $('#confirmTravellerNo').text(no_traveller);
                        var isValidStep = fv.isValidContainer($container);
                        if (isValidStep === false || isValidStep === null) {
                            // Do not jump to the next step
                            return false;
                        }

                        return true;
                    },
                    // Triggered when clicking the Finish button
                    onFinishing: function (e, currentIndex) {
                        var fv = $('#profileForm').data('formValidation'),
                                $container = $('#profileForm').find('section[data-step="' + currentIndex + '"]');

                        // Validate the last step container
                        fv.validateContainer($container);

                        var isValidStep = fv.isValidContainer($container);
                        if (isValidStep === false || isValidStep === null) {
                            return false;
                        }
                        if (currentIndex.field === 'from_date' && !currentIndex.fv.isValidField('to_date')) {
                            // We need to revalidate the end date
                            currentIndex.fv.revalidateField('to_date');
                        }

                        if (currentIndex.field === 'to_date' && !currentIndex.fv.isValidField('from_date')) {
                            // We need to revalidate the start date
                            currentIndex.fv.revalidateField('from_date');
                        }

                        return true;
                    },
                    onFinished: function (e, currentIndex) {
                        // Uncomment the following line to submit the form using the defaultSubmit() method
                        // $('#profileForm').formValidation('defaultSubmit');
                        var post_id = $("#post_id").val();
                        var gender = $("#gender").val();
                        var name = $("#name").val();
                        var birth_date = $("#birth_date").val();
                        var passport = $("#passport").val();
                        var email = $("#email").val();
                        var nationality = $("#nationality").val();
                        var state = $("#state").val();
                        var city = $("#city").val();
                        var phone = $("#phone").val();
                        var from_date = $("#from_date").val();
                        var to_date = $("#to_date").val();
                        var no_traveller = $("#no_traveller").val();
                        var howfind = $("#howfind").val();
                        var message = $("#message").val();
                        var word_verify = $("#word_verify").val();
                        var agree = $("#agree").val();
                        var subscribe = 0;
                        var agree = 0;
                        if ($("#agree").is(':checked'))
                        {
                            agree = 1;
                        } // checked
                        alert(agree);
                        if ($("#subscribe").is(':checked'))
                        {
                            subscribe = 1; // checked
                        }
                        alert(subscribe);

                        $.ajax({
                            type: "POST",
                            url: "./wp-admin/admin-ajax.php",
                            data: {
                                action: 'booking',
                                post_id: post_id,
                                gender: gender,
                                name: name,
                                birth_day: birth_date,
                                passport: passport,
                                email: email,
                                nationality: nationality,
                                state: state,
                                city: city,
                                phone: phone,
                                from_date: from_date,
                                to_date: to_date,
                                no_traveller: no_traveller,
                                howfind: howfind,
                                message: message,
                                word_verify: word_verify,
                                subscribe: subscribe,
                                agree: agree,
                            },
                            success: function (data) {
                                $('#bookingModal .modal-body').html('');
                                $('#bookingModal .modal-body').append(data);
                                $('#bookingModal').modal('show');
                            }
                        });
                    }
                })
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    // This option will not ignore invisible fields which belong to inactive panels
                    excluded: ':disabled',
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: 'The Name is required'
                                }

                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The input is not a valid email address'
                                }
                            }
                        },
                        nationality: {
                            validators: {
                                notEmpty: {
                                    message: 'The Nationality is required'
                                }
                            }
                        },
                        city: {
                            validators: {
                                notEmpty: {
                                    message: 'The City is required'
                                }
                            }
                        },
                        phone: {
                            validators: {
                                notEmpty: {
                                    message: 'The Phone No is required'
                                }
                            }
                        },
                        from_date: {
                            validators: {
                                notEmpty: {
                                    message: 'The Pickup date is required'
                                },
                                date: {
                                    format: 'YYYY/MM/DD',
                                    max: 'to_date',
                                    message: 'The Pickup  date is not a valid'
                                }
                            }
                        },
                        to_date: {
                            validators: {
                                notEmpty: {
                                    message: 'The end date is required'
                                },
                                date: {
                                    format: 'YYYY/MM/DD',
                                    min: 'from_date',
                                    message: 'The end date is not a valid'
                                }
                            }
                        },
                        no_traveller: {
                            validators: {
                                notEmpty: {
                                    message: 'The traveller no is required'
                                }
                            }
                        },
                        howfind: {
                            validators: {
                                notEmpty: {
                                    message: 'The traveller no is required'
                                }
                            }
                        },
                        
                        agree: {
                            validators: {
                                notEmpty: {
                                    message: 'You must agree with the terms and conditions'
                                }
                            }
                        }

                    }
                })
                .find('[name="birth_date"],[name="from_date"],[name="to_date"]')
                .datepicker({format: 'yyyy/mm/dd'})
                .on('changeDate', function (e) {

                    $('#profileForm').formValidation('revalidateField', $(this).attr('id'));
                });

    });

</script>
<script>
    $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready(function () {
        $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

            if (input.length) {
                input.val(log);
            } else {
                if (log)
                    alert(log);
            }

        });
    });
</script>
<script src="<?php bloginfo('template_url'); ?>/js/validate.js"></script>
<script>
    $(document).ready(function () {
       
        function refresh_captcha_image()
        {
            var url = '<?php bloginfo('template_url'); ?>';
           
            var image = new Image();
            image.src = url+'/captcha/index.php?rand=' + Math.random();
            //console.log(image.src);
            document.getElementById('captcha_image').src = image.src;
            return false;
        }
        refresh_captcha_image();
  
        document.getElementById('captcha_refresh').onclick = refresh_captcha_image;
        var v = new Validator('profileForm');
        v.addValidation('security_code', 'required', 'Please type the given security code.');
        v.addValidation('security_code', 'minlen=5', 'Security code is of 5 characters.');
        v.addValidation('security_code', 'maxlen=5', 'Security code is of 5 characters.');
//v.addValidation('name', 'required', 'Please enter your name.');
//v.addValidation('address', 'required', 'Please enter your name.');
//v.addValidation('email', 'required', 'Please enter your email address.');
//v.addValidation('email', 'email', 'Invalid email address.');
//v.addValidation('phone', 'required', 'Please enter your phone.');
//v.addValidation('destination', 'required', 'Please enter your destination.');
//v.addValidation('pickup', 'required', 'Please enter your pickup information.');
//v.addValidation('message', 'minlen=20', 'Message should be long enough to be sent as email text.');
    })
</script>