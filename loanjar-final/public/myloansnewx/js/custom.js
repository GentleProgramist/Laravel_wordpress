// Add url based class on body
var pop = window.location.pathname.split('/').pop();
if (window.location.href.match(pop)) {
    var dot = pop.split('.')[0];
    $('body').addClass('kk-' + dot);
}

//Active class based on URL
var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/") + 1);
$(".menu .inline-list li a").each(function () {
    if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
        $(this).addClass("active");
});

// Bottom to top
$('.top-page span').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 1000);
});

// Custom color palates
var colours = [{
    name: 'Yellow',
    hex: '#FFFF00'
},
{
    name: 'LawnGreen',
    hex: '#7CFC00'
},
{
    name: 'Aqua',
    hex: '#00FFFF'
},
{
    name: 'Fuchsia',
    hex: '#FF00FF'
},
{
    name: 'Blue',
    hex: '#0000FF'
},
{
    name: 'Red',
    hex: '#FF0000'
},
{
    name: 'DarkBlue',
    hex: '#00008B'
},
{
    name: 'DarkCyan',
    hex: '#008B8B'
},
{
    name: 'DarkGreen',
    hex: '#006400'
},
{
    name: 'DarkMagenta',
    hex: '#8B008B'
},
{
    name: 'DarkRed',
    hex: '#8B0000'
},
{
    name: 'DarkGoldenRod',
    hex: '#B8860B'
},
{
    name: 'DarkGray',
    hex: '#A9A9A9'
},
{
    name: 'LightGray',
    hex: '#D3D3D3'
},
{
    name: 'Black',
    hex: '#000000'
}
];
var $palette = $('.cat-overlay ul');
for (var i = 0; i < colours.length; i++) {
    $palette.append($('<li />').css('background-color', colours[i].hex));
}

// Category page side bar accordions
$('.cat-head').on('click', function () {
    $(this).parent().toggleClass('ac-open');
    $(this).next().slideToggle();
});

// Product grid change

$('.pro-tile i').on('click', function () {
    $(this).addClass('pro-t');
    $(this).siblings('i').removeClass('pro-t');
});

// Find 3 column class if it exist so by defualt 'add pro-t' class in grid icon
$('.pro-c').find('.col-md-4.col-sm-6').parents('.cat-r-in').find('.ic-grid').addClass('pro-t');

// Product classes changes 
$('body').delegate('.ic-grid.pro-t', 'click', function () {
    setTimeout(function () {
        $('.pro-c').removeClass('col-adj');
        $('.pro-c').find('.col-md-12').removeClass('col-md-12').addClass('col-md-4 col-sm-6');
    }, 200);
});


// Product classes changes 
$('body').delegate('.ic-bars.pro-t', 'click', function () {
    setTimeout(function () {
        $('.pro-c').addClass('col-adj');
        $('.pro-c').find('.col-md-4.col-sm-6').removeClass('col-md-4 col-sm-6').addClass('col-md-12');
    }, 200);
});


// categtogy page grid change
$('body').delegate('.ic-bars.pro-t', 'click', function () {
    setTimeout(function () {
        $('.pro-row').addClass('col-adj');
        $('.pro-row').find('.col-md-6.col-sm-6').removeClass('col-md-6 col-sm-6').addClass('col-md-12');
    }, 200);
});

$('body').delegate('.ic-grid.pro-t', 'click', function () {
    setTimeout(function () {
        $('.pro-row').removeClass('col-adj');
        $('.pro-row').find('.col-md-12').removeClass('col-md-12').addClass('col-md-6 col-sm-6');
    }, 200);
});


// Add arrow toggle on responsive nav
$(".parent").children('a').after('<span class="mb-arrow"><i class="fa fa-angle-right"></i></span>');


// find class and add css in nav
$('.cs-color').parents().find('.h-down').addClass('opt-one');

// Slidedown main menu
$('body').delegate('.mb-arrow', 'click', function () {
    $(this).parent().toggleClass('s-open');
    $(this).parent().children('.sub-menus').slideToggle();
    $(this).parent().siblings().children('.sub-menus').slideUp();
    $(this).parent().siblings().removeClass('s-open');
});

// Mobile toggle 
$('.mobile-toggles').click(function () {
    $('body').toggleClass('open');
});

// Sidebar overlay 
$('.overlay').click(function () {
    $('body').removeClass('open');
});

// Testimonal Start
$('#slide-testimonal').owlCarousel({
    navText: ['<span>&lsaquo;</span>', '<span>&rsaquo;</span>'],
    margin: 0,
    center: true,
    mouseDrag: false,
    loop: true,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2,
            margin: 15,
        },
        1000: {
            items: 3,


        }
    }
});
// Testimonal End




$('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
});

/*
    SOF: BACK TO TOP
    */

// Back to top config
var backToTopConfig = {
    visible: false,
    isAnimating: false,
    showThreshhold: window.innerHeight,
    fadeInOutDuration: 200,
    elementId: 'back-to-top',
    documentScroll: {
        duration: 400,
        animation: 'swing',
        isScrolling: false
    }
};

var $backToTopElem = $('#' + backToTopConfig.elementId);

// Scroll to top on clicking back to top button
$backToTopElem.click(function() {
    backToTopConfig.documentScroll.isScrolling = true;
    $("html, body").animate(
        {scrollTop: 0}, 
        backToTopConfig.documentScroll.duration,
        backToTopConfig.documentScroll.animation,
        function () {
            backToTopConfig.documentScroll.isScrolling = false;
        }
        );
});

// Show/hide back to top button
$(window).scroll(function (event) {
    if(!backToTopConfig.documentScroll.isScrolling && !backToTopConfig.isAnimating) {
        var scroll = $(window).scrollTop();
        if(scroll > backToTopConfig.showThreshhold) {
            if(!backToTopConfig.visible) {
                backToTopConfig.isAnimating = true;            
                $backToTopElem.fadeIn(backToTopConfig.fadeInOutDuration, function(){
                    backToTopConfig.isAnimating = false;
                    backToTopConfig.visible = true;            
                });
            }
        } else {
            if(backToTopConfig.visible) {
                backToTopConfig.isAnimating = true;            
                $backToTopElem.fadeOut(backToTopConfig.fadeInOutDuration, function(){
                    backToTopConfig.isAnimating = false;
                    backToTopConfig.visible = false;   
                });
            }
        }
    }
});

/*
    EOF: BACK TO TOP
    */

/*
    SOF: Representative example
    */

    function toggleDisplay(id) {
        var $elem = $(id);
        var display = $elem.css('display');
        if(display == 'none') {
          $elem.css('display', 'block');
          $('#representative-apr-banner a').text('Hide');
      } else {
          $elem.css('display', 'none');
          $('#representative-apr-banner a').text('View Representative Example');
      }
  }

/*
    EOF: Representative example
    */

/*
    SOF: Cookie Notice
    */
    function showCookieNotice() {
       var name = 'cookienoticeclosed=';
       var decodedCookie = decodeURIComponent(document.cookie);
       var ca = decodedCookie.split(';');
       for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        console.log('Cookie notice already accepted: ' + c.substring(name.length, c.length));
        return 0;
    }
}
console.log('Showing cookie notice');
$('#cookie-notice').css('display', 'block');
}
window.addEventListener('load', showCookieNotice);

function closeCookieNotice() {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = 'cookienoticeclosed=true; expires='+expires+'; path=/';
    $('#cookie-notice').remove();
}

/*
    EOF: Cookie Notice
*/
