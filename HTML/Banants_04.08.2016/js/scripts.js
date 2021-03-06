$(document).ready(function () {

    if ($(".container_top_slideshow").length > 0) {
        $(".container_top_slideshow").owlCarousel({
            navigation: true,
            pagination: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            navigationText: false,
            singleItem: true
        });
    }


    if ($('.leftbar_images_slider').length > 0) {
        $(".leftbar_images_slider").owlCarousel({
            navigation: false,
            pagination: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            navigationText: false,
            singleItem: true
        });
    }

    if ($('.news_slider').length > 0) {
        $(".news_slider").owlCarousel({
            navigation: false,
            pagination: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            navigationText: false,
            singleItem: true
        });
    }

    if ($('.tournament_slider').length > 0) {
        $(".tournament_slider").owlCarousel({
            navigation: true,
            pagination: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            navigationText: false,
            singleItem: true,
            afterInit: attachEvent
        });
    }

    if ($('.shooter_slider').length > 0) {
        $(".shooter_slider").owlCarousel({
            navigation: true,
            pagination: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            navigationText: false,
            singleItem: true,
            afterInit: attachEvent
        });
    }

    function attachEvent(elem) {
        elem.parent().find('.tournament_slider_next').on('click', function () {
            elem.trigger('owl.next')
        })

        elem.parent().find('.tournament_slider_prev').on('click', function () {
            elem.trigger('owl.prev')
        })
    }

    if ($('.carousel_slider').length) {
        $('.carousel_slider').owlCarousel({
            //autoPlay: 3000,
            items: 3,
            navigation: false,
            pagination: true,
            navigationText: false,
            responsive: false
        });
    }


    if ($("#accordion").length) {
        $(function () {
            $("#accordion").accordion({
                autoHeight: false,
                heightStyle: "content",
                collapsible: true,
                alwaysOpen: false,
                header: 'span',
                active: 2,
                header: '.accordion_title'
                //active: false
            });
        });
    }

    if ($("#item_tabs").length) {
        $(document).ready(function () {
            $(function () {
                $("#item_tabs").tabs();
            });
        });
    }

    if ($('.leftbar_images_slider_item').length && $('.content_middle_slider_item').length) {
        var $container = ['.leftbar_images_slider_item', '.content_middle_slider_item'];
        var itemSelector = ['.leftbar_slider_images', '.content_slider_images'];

        $container.forEach(function (item, key) {
            $(item).imagesLoaded(function () {
                $(item).masonry({
                    itemSelector: itemSelector[key],
                    columnWidth: 1
                });
            });
        });
    }


    if ($(".content_middle_slider").length > 0) {
        $(".content_middle_slider").owlCarousel({
            navigation: false,
            pagination: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            navigationText: false,
            singleItem: true
        });
    }

    if ($('.fancybox').length) {
        $('.fancybox').fancybox({
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    }

    /* navigation on hover dropdown show */
    $('.navigation li').hover(function () {
        $(this).find('.submenu').stop(false, true).fadeIn(100);
        $(this).addClass('navigation_active_item');
    }, function () {
        $(this).find('.submenu').stop(false, true).fadeOut(100);
        if ($(this).find('.submenu:visible')) {
            console.log('aaa');
            $(this).removeClass('navigation_active_item');
        }
    })

});

/*Video*/
$(document).ready(function () {
    if ($(".various").length > 0) {
        $(".various").fancybox({
            maxWidth: 800,
            maxHeight: 600,
            fitToView: false,
            width: '70%',
            height: '70%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    }
})
$(document).ready(function () {
    size_li = $("#myList li").length;
    x = 3;
    $('#myList li:lt(' + x + ')').show();
    $('#loadMore').click(function () {
        x = (x + 5 <= size_li) ? x + 5 : size_li;
        $('#myList li:lt(' + x + ')').show();
    });
    $('#showLess').click(function () {
        x = (x - 5 < 0) ? 3 : x - 5;
        $('#myList li').not(':lt(' + x + ')').hide();
    });
});