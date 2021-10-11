/* Function to load scripts */
var load_script = function (options) {
    /*
     Use text/javascript is no type is defined.
     */
    if (options.type === undefined) {
        options.type = 'text/javascript';
    }
    /*
     Create an JS element and add it to the end of the current list of elements.
     */
    source_element = document.createElement('SCRIPT');
    source_element.type = options.type;
    source_element.src = options.script;
    source_element.defer = true;
    source_element.async = true;
    /*
     If a callback has been provided then run that code once the script has been successfully donwloaded and is in a ready state.
     */
    if (typeof( options.callback ) == "function") {
        source_element.onreadystatechange = source_element.onload = function () {
            var state = source_element.readyState;
            if (!options.done && ( !state || /loaded|complete/.test(state) )) {
                options.done = true;
                options.callback();
            }
        };
    }
    document.getElementsByTagName('head')[0].appendChild(source_element);
};


/* Google Analytics Script */
(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', '', 'auto');
ga('send', 'pageview');

/* Google Code for Remarketing Tag */
load_script({
    script: "//www.googleadservices.com/pagead/conversion_async.js", callback: function () {
        window.google_trackConversion({
            google_conversion_id: 970546039,
            google_custom_params: window.google_tag_params,
            google_remarketing_only: true
        });
    }
});




/* Facebook Retargeting */
(function () {
    var _fbq = window._fbq || (window._fbq = []);
    if (!_fbq.loaded) {
        var fbds = document.createElement('script');
        fbds.async = true;
        fbds.src = '//connect.facebook.net/en_US/fbds.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(fbds, s);
        _fbq.loaded = true;
    }
    _fbq.push(['addPixelId', '984945428199774']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);


//Seeding
function getQueryStringParameters(url) {
    if (url == undefined) {
        url = window.location.href;
    }
    var vars = {};
    var p = url.replace(/[?&]+([^=&]+)=([^&]*)/gi,
        function (m, key, value) {
            vars[key.toLowerCase()] = decodeURIComponent(value);
        });
    return vars;
}

//load header function

$(document).ready(function () {

    var qs = getQueryStringParameters();
    // console.log(qs.seed)

    if (qs.seed != undefined) {
        seed = qs.seed.replace(/[-_]/g, ' ');
        seed = seed.replace(/\w\S*/g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
        jQuery('.replace-seed-value').html(seed);
    }
});