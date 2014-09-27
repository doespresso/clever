var wh = 0,
    ww = 0,
    docViewTop = 0;

function getWsize() {
    docViewTop = $(window).scrollTop();
    wh = $(window).innerHeight();
    ww = $(window).innerWidth();
    //console.log(ww,wh,docViewTop);
};


(function ($) {

    /////////making slogans spans///////
    $.fn.spanny = function () {
        return this.each(function () {
            var items = $(this).find(".item");
            items.each(function () {
                var nospanedtext = $(this);
                var t = nospanedtext.text().split(' ');
                var spans = '';
                t.forEach(function (entry) {
                    spans = spans + '<span>' + entry + '</span> ';
                });
                nospanedtext.html(spans);
            });
            $(this).find("#titlehome").addClass("current");
        });
    }


    //making container fullheight
    Array.prototype.min = function () {
        return Math.min.apply(null, this);
    };
    Array.prototype.max = function () {
        return Math.max.apply(null, this);
    };
    $.fn.fullHeight = function () {

//        var supersize=false, xb = 1540, yb = 1080;
        return this.each(function () {
            var frame_offset = 20;
            var block_height = $(window).innerHeight() - ($("#topnav").innerHeight() + $("#footer").innerHeight() + $("#topbar").innerHeight() + frame_offset * 2);
            block_height = [block_height, $("#rotator-container").width()].max();
//            if (($(window).innerWidth()>xb) && ($(window).innerHeight()>yb)){
//                supersize = true;
//            }
//            else
//            {
//                supersize = false;
//            }
//            if(supersize){block_height = 800;}/////new
            console.log("h1");
            $('.homepage .service').css('min-height', block_height);
            $('.service-navigator .nav-title').css('margin-top', block_height / 4); //new
            $(this).css('min-height', block_height).fadeIn(1, function () {
                console.log("h2");
                $(".nav-title").fadeIn(500);
                $(this).find(".wrapper").css('min-height', block_height);
                var rotator = $(this).find("#rotator");
                console.log("h3");
                if (rotator) {
                    console.log("h4");
                    show_rotator(rotator).delay(500).fadeIn(1000);
                    console.log("h5");
                }
            });

            function show_rotator(rotator) {
                var rotator_size = [block_height, $("#rotator-container").width()].min();
//                if(supersize){var rotator_size = 800;}//new

                var picto_size = rotator_size / 4;
                rotator.css({'height': rotator_size, 'width': rotator_size, 'margin-top': (block_height - rotator_size) / 2});

                var cr = picto_size, co = (rotator_size - cr) / 2;
                $("#circle").css({'height': cr, 'width': cr, 'left': co, 'top': co});

                var pics = rotator.find('.picto'),
                    pic_count = 0,
                    x0 = rotator_size / 2,
                    y0 = rotator_size / 2,
                    r = (rotator_size - picto_size) / 2,
                    counter = 0,
                    step = 360 / pics.length;
                var deg2rad = Math.PI / 180;
                var rad2deg = 180 / Math.PI;

                pics.each(
                    function () {
                        pointX = x0 + r * Math.cos((counter * step - 90) * deg2rad);
                        pointY = y0 + r * Math.sin((counter * step - 90) * deg2rad);
                        $(this).css({'width': picto_size, 'height': picto_size});
                        $(this).css({'left': pointX - (picto_size / 2), 'top': pointY - (picto_size / 2)});
                        counter++;
                    }
                );


                counter = 0;
                var line_size = picto_size / 2;

                $('#rotator .line').each(
                    function () {
                        $(this).css({'width': line_size, 'height': line_size});
                        lpointX = x0 + (0.5 * r - 3) * Math.cos((counter * step - 90) * deg2rad);
                        lpointY = y0 + (0.5 * r - 3) * Math.sin((counter * step - 90) * deg2rad);
                        $(this).css({'left': lpointX - (line_size / 2), 'top': lpointY - (line_size / 2)});
                        $(this).transition({ rotate: step * counter + "deg" });
                        counter++;
                    }
                );
                $(this).find(".wrapper").delay(1000).addClass("showlogo");
                return rotator;
            }

        });
    }

}(jQuery));


jQuery(function ($) {
/////////////////////////////////////////////////////////////
    $('button.startorder').on('click', function () {
        var order_type = $(this).attr('data-ordertype');
        console.log('start', order_type);
        $("#doc-form-holder").fadeIn(10);
        $("#doc-form").css('display', 'block');
        $("#doc-form").empty();

        $.ajax({
            type: 'GET',
            url: '/order/create',
            data: 'step=1&type=' + order_type,
            success: function (data) {
                $(data).appendTo('#doc-form');
                var info_form = $('#doc_params');

                $("#doc_params input[type=text], #doc_contacts input[type=text]").change(function () {
                    $(this).removeClass("animated shake error");
                });

                $("#order_btn_next").on('click', function (event) {
                    var form_errors = 0;
                    event.preventDefault();
                    console.log("btn next");
                    var fl = info_form.find("input[type=text]");
                    console.log(fl);
                    fl.each(function (index) {
                        if ($(this).val().length < 6) {
                            $(this).addClass("animated shake error");
                            form_errors++;
                            console.log(form_errors, " errors ");
                        }
                    });
                    if (form_errors == 0) {
                        console.log("ok");
                        var form_params_result = '<table class="table">';
                        fl.each(function (index) {
                            form_params_result += '<tr><td>' + $(this).attr("attr-title") + '</td><td>' + $(this).val() + '</td><tr>';
                        });
                        form_params_result += '<tr><td>' + $("#order_params [for=var]").text() + '</td><td>' + $("#order_params [name=var]").val() + '</td><tr>';
                        form_params_result += '</table>';
                        console.log(form_params_result);
                        $("#doc_result_params").empty();
                        $(form_params_result).appendTo("#doc_result_params");
                        $("#doc_params").addClass('hidden');
                        $("#doc_result_params,#doc_contacts").removeClass('hidden');
                        $("#order_btn_edit").removeClass('hidden');
                        $("#order_params input[type=text], #doc_params input[type=text]").removeClass("animated shake error");
                    }
                });

                $("#order_btn_edit").on('click', function (event) {
                    event.preventDefault();
                    $("#order_btn_edit").addClass('hidden');
                    $("#doc_params").removeClass('hidden').addClass('active');
                    $("#doc_result_params,#doc_contacts").removeClass('active').addClass('hidden');
                    $("#doc_params input[type=text], #doc_contacts input[type=text]").removeClass("animated shake error");
                });
                $("#order_btn_exit").on('click', function (event) {
                    event.preventDefault();
                    $("#doc-form-holder").fadeOut(10);
                    $("#doc-form").css('display', 'none');
                    $("#doc-form").empty();
                });

                $("#order_btn_finish").on('click', function (event) {
                    event.preventDefault();
                    var contact_form = $('#doc_contacts');
                    var cfl = contact_form.find("input[type=text]");
                    console.log(cfl);
                    var cform_errors = 0;
                    cfl.each(function (index) {
                        if ($(this).val().length < 6) {
                            $(this).addClass("animated shake error");
                            cform_errors++;
                            console.log(cform_errors, " errors ");
                        }
                    });
                    if (cform_errors == 0) {
                        console.log('SENT');
                        $.ajax({
                            type: 'POST',
                            url: '/order',
                            data: $('#order_params').serialize(),
                            beforeSend: function () {
                                console.log('before:', $('#order_params').serialize());
                            },
                            success: function (data) {
                                console.log(data['status']);
                                if (data['status'] == 'ok') {
                                    $("#doc_contacts,#order_btn_edit").addClass("hidden");
                                    $("#order_btn_exit").removeClass("hidden");
                                    $("#doc_result_params").append('<p class="lead">Заказ принят. Номер вашего заказа <span class"order_num">'+data['order_id']+'</span></p>');
                                }
                            }
                        });
                    }
                });

            }
        });


    });

    $("#doc-form-holder").on('click', function () {
        $(this).fadeOut(0);
        $("#doc-form").css('display', 'none');
    });

    ///////////////////////////////


    $('.homepage .navbar-nav').onePageNav({
        currentClass: 'active',
        changeHash: false,
        scrollSpeed: 1000,
        scrollOffset: 164,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'linear',
        begin: function () {
            //I get fired when the animation is starting
        },
        end: function () {
            //I get fired when the animation is ending
        },
        scrollChange: function ($currentListItem) {
            //I get fired when you enter a section and I pass the list item of the section
        }
    });

    //collapsing mobile navbar on click link
    $(".navbar-collapse a").on("click", function () {
        if ($(".navbar-collapse").hasClass("in")) {
            $(".navbar-collapse").removeClass("in").addClass('collapse');
            $(".navbar-collapse").slideUp();
        }
    });

    $("#homenav .picto").on("mouseenter", function () {
        $(".nav-title").find(".current").removeClass("current");
        $("#title-" + $(this).attr('attr-name')).addClass("current");
//        $(".line>div.current").removeClass("current");
        // $("#line-" +$(this).attr('attr-name')+">div").addClass("current");
//        $(this).find("path").css("fill","#F15A22");
//        $("#circle").addClass("highlited");
    });

    $("#homenav .picto").on("mouseleave", function () {
        $(".nav-title").find(".current").removeClass("current");
//        $(".line>div.current").removeClass("current");
//        $(this).find("path").css("fill","#006a43");
        $(".nav-title #titlehome").addClass("current");
//        $("#circle").removeClass("highlited");
    });
//    $('form').submit(function() {
//            $(".site-panel").addClass("animated flipOutX");
//            return true;
//        });

    $(window).trigger('hashchange');

});

/////scroll////
// jQuery plug-in
$.uniqueCntr = 0;
$.fn.scrolled = function (waitTime, fn) {
    if (typeof waitTime === "function") {
        fn = waitTime;
        waitTime = 500;
    }
    var tag = "scrollTimer" + $.uniqueCntr++;
    this.scroll(function () {
        var self = $(this);
        var timer = self.data(tag);
        if (timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(function () {
            self.removeData(tag);
            fn.call(self[0]);
        }, waitTime);
        self.data(tag, timer);
    });
}

$(window).scrolled(function () {
    if ($(window).scrollTop() > 100) {
        $("#to-top:hidden").stop().fadeIn(200);
    }
    else {
        $("#to-top:visible").stop().fadeOut(200);
    }
    console.log($(window).scrollTop());
});
/////scroll/////


$(window).on("resize", function () {
    getWsize();
    $("#homenav,.page,.site-panel").fullHeight();
});

$(document).ready(function () {
    Path.map("#tab-products").to(function () {
        $("#tab-products").tab('show');
    });
    Path.map("#tab-solutions").to(function () {
        $("#tab-solutions").tab('show');
    });
    Path.map("#tab-order").to(function () {
        $("#tab-order").tab('show');
    });
    Path.listen();
    $("#homenav, .page, .site-panel").fullHeight();
    console.log("DR");
    var hash = window.location.hash;
    $("#rotator,footer").localScroll({filter: "#topnav a, #to-top, #rotator a", hash: false, offset: {top: -163}});
    $(".nav-title").spanny();

    $(".questions-page .tab").on('shown.bs.tab', function (e) {
        $(".questions-page").toggleClass("ask");
    });
    $(".show-answer").on("click", function () {
        $(this).toggleClass("opened");
    });
    $(".comments-page .tab").on('shown.bs.tab', function (e) {
        $(".comments-page").toggleClass("put");
    });

    var firetab = $(".section-wrapper").find("[attr-fire='fire']");
    if (firetab) {
        firetab.tab('show')
    }
});

$(window).load(function () {
    console.log("LOADED");
});

