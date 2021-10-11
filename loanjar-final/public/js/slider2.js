//$(document).ready(function () {
//
//    var
//        la,
//        storage = $.localStorage,
//        defaultValue = !storage.isEmpty('sfl.amount') ? storage.get('sfl.amount') : 2500,
//    //defaultValue = 2000,
//
//        setCookie = function (cname, cvalue, exdays) {
//            var d = new Date();
//            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//            var expires = "expires=" + d.toUTCString();
//            document.cookie = cname + "=" + cvalue + "; " + expires;
//        };
//
//    $("#amount").val("£" + defaultValue);
//
//    $("#volume").slider({
//        min: 500,
//        max: 5000,
//        value: defaultValue,
//        animate: true,
//        range: 'min',
//        step: 50,
//
//        slide: function (event, ui) {
//            $("#amount").val("£" + ui.value);
//            la = $("#amount").val();
//            setCookie('la', la);
//            //        console.log($("#amount").val());
//            storage.set('sfl.amount', ui.value);
//        }
//    });
//});
//
////window.onbeforeunload = function () {
////    //console.log('You work will be lost.');
////    return "You work will be lost.";
////};
