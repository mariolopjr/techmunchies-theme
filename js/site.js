// Animate site name text
$(() => {

    // Options for animation
    var options = {
        size: 80,
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
