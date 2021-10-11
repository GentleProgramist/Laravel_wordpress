/**
 * Created by simba on 04/03/15.
 */
function getQueryStringParameters( url ) {
    if ( url == undefined ) {
        url = window.location.href ;
    }
    var vars = { } ;
    var p = url.replace( /[?&]+([^=&]+)=([^&]*)/gi,
        function( m, key, value ) {
            vars[key.toLowerCase()] = value ;
        } ) ;
    return vars ;
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    //d.setTime(d.getTime() + (exdays*24*60*60*1000));
    d.setTime(d.getTime()+(exdays*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

var qs = getQueryStringParameters() ;
if ( qs.said != undefined ) { setCookie( 'SAID', qs.said,10 ) ; }
if ( qs.aid != undefined ) { setCookie( 'AID', qs.aid,10 ) ; }