// Animate site name text
$(() => {

    // Set the appropriate site to the width of the device
    const size = $(window).width() < 500 ? 70 : 80;

    console.log($(window).width() + "," + size);

    // Options for animation
    var options = {
        size: size,
        weight: 1,
        rounded: true,
        color: '#2b416a',
        duration: 1,
        delay: [0, 0.05],
        fade: 0.5,
        easing: d3.easeSinInOut,
        individualDelays: false,
    };

    // Initialize and animate site name
    new Letters($('.site-name')[0], options).show();
});

// Display Background Picture Info when Info Button is Clicked
$(document).ready(() => {

    // If the popover isn't being displayed, display it. If it is displayed, undisplay it
    $('.info-container').on('click', (e) => {
        e.stopPropagation();
        $('.info-popover').hasClass('info-popover-visible') ? $('.info-popover').removeClass('info-popover-visible') : $('.info-popover').addClass('info-popover-visible');
    });

    // Closes popover if clicking anywhere in the site
    $('body').on('click', () => {
        $('.info-popover').hasClass('info-popover-visible') ? $('.info-popover').removeClass('info-popover-visible') : true;
    });

    // Prevents closing popover when clicking on it
    $('.info-popover').on('click', (e) => {
        e.stopPropagation();
    });
});
