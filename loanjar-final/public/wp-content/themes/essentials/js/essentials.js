if (typeof $ === "undefined") {
    if (jQuery != "undefined") {
        $ = jQuery;
    }
}

/*!
Waypoints - 4.0.1
Copyright © 2011-2016 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/waypoints/blob/master/licenses.txt
*/
!function(){"use strict";function t(o){if(!o)throw new Error("No options passed to Waypoint constructor");if(!o.element)throw new Error("No element option passed to Waypoint constructor");if(!o.handler)throw new Error("No handler option passed to Waypoint constructor");this.key="waypoint-"+e,this.options=t.Adapter.extend({},t.defaults,o),this.element=this.options.element,this.adapter=new t.Adapter(this.element),this.callback=o.handler,this.axis=this.options.horizontal?"horizontal":"vertical",this.enabled=this.options.enabled,this.triggerPoint=null,this.group=t.Group.findOrCreate({name:this.options.group,axis:this.axis}),this.context=t.Context.findOrCreateByElement(this.options.context),t.offsetAliases[this.options.offset]&&(this.options.offset=t.offsetAliases[this.options.offset]),this.group.add(this),this.context.add(this),i[this.key]=this,e+=1}var e=0,i={};t.prototype.queueTrigger=function(t){this.group.queueTrigger(this,t)},t.prototype.trigger=function(t){this.enabled&&this.callback&&this.callback.apply(this,t)},t.prototype.destroy=function(){this.context.remove(this),this.group.remove(this),delete i[this.key]},t.prototype.disable=function(){return this.enabled=!1,this},t.prototype.enable=function(){return this.context.refresh(),this.enabled=!0,this},t.prototype.next=function(){return this.group.next(this)},t.prototype.previous=function(){return this.group.previous(this)},t.invokeAll=function(t){var e=[];for(var o in i)e.push(i[o]);for(var n=0,r=e.length;r>n;n++)e[n][t]()},t.destroyAll=function(){t.invokeAll("destroy")},t.disableAll=function(){t.invokeAll("disable")},t.enableAll=function(){t.Context.refreshAll();for(var e in i)i[e].enabled=!0;return this},t.refreshAll=function(){t.Context.refreshAll()},t.viewportHeight=function(){return window.innerHeight||document.documentElement.clientHeight},t.viewportWidth=function(){return document.documentElement.clientWidth},t.adapters=[],t.defaults={context:window,continuous:!0,enabled:!0,group:"default",horizontal:!1,offset:0},t.offsetAliases={"bottom-in-view":function(){return this.context.innerHeight()-this.adapter.outerHeight()},"right-in-view":function(){return this.context.innerWidth()-this.adapter.outerWidth()}},window.Waypoint=t}(),function(){"use strict";function t(t){window.setTimeout(t,1e3/60)}function e(t){this.element=t,this.Adapter=n.Adapter,this.adapter=new this.Adapter(t),this.key="waypoint-context-"+i,this.didScroll=!1,this.didResize=!1,this.oldScroll={x:this.adapter.scrollLeft(),y:this.adapter.scrollTop()},this.waypoints={vertical:{},horizontal:{}},t.waypointContextKey=this.key,o[t.waypointContextKey]=this,i+=1,n.windowContext||(n.windowContext=!0,n.windowContext=new e(window)),this.createThrottledScrollHandler(),this.createThrottledResizeHandler()}var i=0,o={},n=window.Waypoint,r=window.onload;e.prototype.add=function(t){var e=t.options.horizontal?"horizontal":"vertical";this.waypoints[e][t.key]=t,this.refresh()},e.prototype.checkEmpty=function(){var t=this.Adapter.isEmptyObject(this.waypoints.horizontal),e=this.Adapter.isEmptyObject(this.waypoints.vertical),i=this.element==this.element.window;t&&e&&!i&&(this.adapter.off(".waypoints"),delete o[this.key])},e.prototype.createThrottledResizeHandler=function(){function t(){e.handleResize(),e.didResize=!1}var e=this;this.adapter.on("resize.waypoints",function(){e.didResize||(e.didResize=!0,n.requestAnimationFrame(t))})},e.prototype.createThrottledScrollHandler=function(){function t(){e.handleScroll(),e.didScroll=!1}var e=this;this.adapter.on("scroll.waypoints",function(){(!e.didScroll||n.isTouch)&&(e.didScroll=!0,n.requestAnimationFrame(t))})},e.prototype.handleResize=function(){n.Context.refreshAll()},e.prototype.handleScroll=function(){var t={},e={horizontal:{newScroll:this.adapter.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.adapter.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};for(var i in e){var o=e[i],n=o.newScroll>o.oldScroll,r=n?o.forward:o.backward;for(var s in this.waypoints[i]){var a=this.waypoints[i][s];if(null!==a.triggerPoint){var l=o.oldScroll<a.triggerPoint,h=o.newScroll>=a.triggerPoint,p=l&&h,u=!l&&!h;(p||u)&&(a.queueTrigger(r),t[a.group.id]=a.group)}}}for(var c in t)t[c].flushTriggers();this.oldScroll={x:e.horizontal.newScroll,y:e.vertical.newScroll}},e.prototype.innerHeight=function(){return this.element==this.element.window?n.viewportHeight():this.adapter.innerHeight()},e.prototype.remove=function(t){delete this.waypoints[t.axis][t.key],this.checkEmpty()},e.prototype.innerWidth=function(){return this.element==this.element.window?n.viewportWidth():this.adapter.innerWidth()},e.prototype.destroy=function(){var t=[];for(var e in this.waypoints)for(var i in this.waypoints[e])t.push(this.waypoints[e][i]);for(var o=0,n=t.length;n>o;o++)t[o].destroy()},e.prototype.refresh=function(){var t,e=this.element==this.element.window,i=e?void 0:this.adapter.offset(),o={};this.handleScroll(),t={horizontal:{contextOffset:e?0:i.left,contextScroll:e?0:this.oldScroll.x,contextDimension:this.innerWidth(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:e?0:i.top,contextScroll:e?0:this.oldScroll.y,contextDimension:this.innerHeight(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};for(var r in t){var s=t[r];for(var a in this.waypoints[r]){var l,h,p,u,c,d=this.waypoints[r][a],f=d.options.offset,w=d.triggerPoint,y=0,g=null==w;d.element!==d.element.window&&(y=d.adapter.offset()[s.offsetProp]),"function"==typeof f?f=f.apply(d):"string"==typeof f&&(f=parseFloat(f),d.options.offset.indexOf("%")>-1&&(f=Math.ceil(s.contextDimension*f/100))),l=s.contextScroll-s.contextOffset,d.triggerPoint=Math.floor(y+l-f),h=w<s.oldScroll,p=d.triggerPoint>=s.oldScroll,u=h&&p,c=!h&&!p,!g&&u?(d.queueTrigger(s.backward),o[d.group.id]=d.group):!g&&c?(d.queueTrigger(s.forward),o[d.group.id]=d.group):g&&s.oldScroll>=d.triggerPoint&&(d.queueTrigger(s.forward),o[d.group.id]=d.group)}}return n.requestAnimationFrame(function(){for(var t in o)o[t].flushTriggers()}),this},e.findOrCreateByElement=function(t){return e.findByElement(t)||new e(t)},e.refreshAll=function(){for(var t in o)o[t].refresh()},e.findByElement=function(t){return o[t.waypointContextKey]},window.onload=function(){r&&r(),e.refreshAll()},n.requestAnimationFrame=function(e){var i=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||t;i.call(window,e)},n.Context=e}(),function(){"use strict";function t(t,e){return t.triggerPoint-e.triggerPoint}function e(t,e){return e.triggerPoint-t.triggerPoint}function i(t){this.name=t.name,this.axis=t.axis,this.id=this.name+"-"+this.axis,this.waypoints=[],this.clearTriggerQueues(),o[this.axis][this.name]=this}var o={vertical:{},horizontal:{}},n=window.Waypoint;i.prototype.add=function(t){this.waypoints.push(t)},i.prototype.clearTriggerQueues=function(){this.triggerQueues={up:[],down:[],left:[],right:[]}},i.prototype.flushTriggers=function(){for(var i in this.triggerQueues){var o=this.triggerQueues[i],n="up"===i||"left"===i;o.sort(n?e:t);for(var r=0,s=o.length;s>r;r+=1){var a=o[r];(a.options.continuous||r===o.length-1)&&a.trigger([i])}}this.clearTriggerQueues()},i.prototype.next=function(e){this.waypoints.sort(t);var i=n.Adapter.inArray(e,this.waypoints),o=i===this.waypoints.length-1;return o?null:this.waypoints[i+1]},i.prototype.previous=function(e){this.waypoints.sort(t);var i=n.Adapter.inArray(e,this.waypoints);return i?this.waypoints[i-1]:null},i.prototype.queueTrigger=function(t,e){this.triggerQueues[e].push(t)},i.prototype.remove=function(t){var e=n.Adapter.inArray(t,this.waypoints);e>-1&&this.waypoints.splice(e,1)},i.prototype.first=function(){return this.waypoints[0]},i.prototype.last=function(){return this.waypoints[this.waypoints.length-1]},i.findOrCreate=function(t){return o[t.axis][t.name]||new i(t)},n.Group=i}(),function(){"use strict";function t(t){this.$element=e(t)}var e=window.jQuery,i=window.Waypoint;e.each(["innerHeight","innerWidth","off","offset","on","outerHeight","outerWidth","scrollLeft","scrollTop"],function(e,i){t.prototype[i]=function(){var t=Array.prototype.slice.call(arguments);return this.$element[i].apply(this.$element,t)}}),e.each(["extend","inArray","isEmptyObject"],function(i,o){t[o]=e[o]}),i.adapters.push({name:"jquery",Adapter:t}),i.Adapter=t}(),function(){"use strict";function t(t){return function(){var i=[],o=arguments[0];return t.isFunction(arguments[0])&&(o=t.extend({},arguments[1]),o.handler=arguments[0]),this.each(function(){var n=t.extend({},o,{element:this});"string"==typeof n.context&&(n.context=t(this).closest(n.context)[0]),i.push(new e(n))}),i}}var e=window.Waypoint;window.jQuery&&(window.jQuery.fn.waypoint=t(window.jQuery)),window.Zepto&&(window.Zepto.fn.waypoint=t(window.Zepto))}();
/**!
 * easy-pie-chart
 * Lightweight plugin to render simple, animated and retina optimized pie charts
 *
 * @license 
 * @author Robert Fleischmann <rendro87@gmail.com> (http://robert-fleischmann.de)
 * @version 2.1.7
 **/
!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],function(a){return b(a)}):"object"==typeof exports?module.exports=b(require("jquery")):b(jQuery)}(this,function(a){var b=function(a,b){var c,d=document.createElement("canvas");a.appendChild(d),"object"==typeof G_vmlCanvasManager&&G_vmlCanvasManager.initElement(d);var e=d.getContext("2d");d.width=d.height=b.size;var f=1;window.devicePixelRatio>1&&(f=window.devicePixelRatio,d.style.width=d.style.height=[b.size,"px"].join(""),d.width=d.height=b.size*f,e.scale(f,f)),e.translate(b.size/2,b.size/2),e.rotate((-0.5+b.rotate/180)*Math.PI);var g=(b.size-b.lineWidth)/2;b.scaleColor&&b.scaleLength&&(g-=b.scaleLength+2),Date.now=Date.now||function(){return+new Date};var h=function(a,b,c){c=Math.min(Math.max(-1,c||0),1);var d=0>=c?!0:!1;e.beginPath(),e.arc(0,0,g,0,2*Math.PI*c,d),e.strokeStyle=a,e.lineWidth=b,e.stroke()},i=function(){var a,c;e.lineWidth=1,e.fillStyle=b.scaleColor,e.save();for(var d=24;d>0;--d)d%6===0?(c=b.scaleLength,a=0):(c=.6*b.scaleLength,a=b.scaleLength-c),e.fillRect(-b.size/2+a,0,c,1),e.rotate(Math.PI/12);e.restore()},j=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(a){window.setTimeout(a,1e3/60)}}(),k=function(){b.scaleColor&&i(),b.trackColor&&h(b.trackColor,b.trackWidth||b.lineWidth,1)};this.getCanvas=function(){return d},this.getCtx=function(){return e},this.clear=function(){e.clearRect(b.size/-2,b.size/-2,b.size,b.size)},this.draw=function(a){b.scaleColor||b.trackColor?e.getImageData&&e.putImageData?c?e.putImageData(c,0,0):(k(),c=e.getImageData(0,0,b.size*f,b.size*f)):(this.clear(),k()):this.clear(),e.lineCap=b.lineCap;var d;d="function"==typeof b.barColor?b.barColor(a):b.barColor,h(d,b.lineWidth,a/100)}.bind(this),this.animate=function(a,c){var d=Date.now();b.onStart(a,c);var e=function(){var f=Math.min(Date.now()-d,b.animate.duration),g=b.easing(this,f,a,c-a,b.animate.duration);this.draw(g),b.onStep(a,c,g),f>=b.animate.duration?b.onStop(a,c):j(e)}.bind(this);j(e)}.bind(this)},c=function(a,c){var d={barColor:"#ef1e25",trackColor:"#f9f9f9",scaleColor:"#dfe0e0",scaleLength:5,lineCap:"round",lineWidth:3,trackWidth:void 0,size:110,rotate:0,animate:{duration:1e3,enabled:!0},easing:function(a,b,c,d,e){return b/=e/2,1>b?d/2*b*b+c:-d/2*(--b*(b-2)-1)+c},onStart:function(a,b){},onStep:function(a,b,c){},onStop:function(a,b){}};if("undefined"!=typeof b)d.renderer=b;else{if("undefined"==typeof SVGRenderer)throw new Error("Please load either the SVG- or the CanvasRenderer");d.renderer=SVGRenderer}var e={},f=0,g=function(){this.el=a,this.options=e;for(var b in d)d.hasOwnProperty(b)&&(e[b]=c&&"undefined"!=typeof c[b]?c[b]:d[b],"function"==typeof e[b]&&(e[b]=e[b].bind(this)));"string"==typeof e.easing&&"undefined"!=typeof jQuery&&jQuery.isFunction(jQuery.easing[e.easing])?e.easing=jQuery.easing[e.easing]:e.easing=d.easing,"number"==typeof e.animate&&(e.animate={duration:e.animate,enabled:!0}),"boolean"!=typeof e.animate||e.animate||(e.animate={duration:1e3,enabled:e.animate}),this.renderer=new e.renderer(a,e),this.renderer.draw(f),a.dataset&&a.dataset.percent?this.update(parseFloat(a.dataset.percent)):a.getAttribute&&a.getAttribute("data-percent")&&this.update(parseFloat(a.getAttribute("data-percent")))}.bind(this);this.update=function(a){return a=parseFloat(a),e.animate.enabled?this.renderer.animate(f,a):this.renderer.draw(a),f=a,this}.bind(this),this.disableAnimation=function(){return e.animate.enabled=!1,this},this.enableAnimation=function(){return e.animate.enabled=!0,this},g()};a.fn.easyPieChart=function(b){return this.each(function(){var d;a.data(this,"easyPieChart")||(d=a.extend({},b,a(this).data()),a.data(this,"easyPieChart",new c(this,d)))})}});
!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define("UniversalTilt",[],t):"object"==typeof exports?exports.UniversalTilt=t():e.UniversalTilt=t()}("object"!=typeof window?global.window=global:window,function(){return function(e){var t={};function n(i){if(t[i])return t[i].exports;var s=t[i]={i:i,l:!1,exports:{}};return e[i].call(s.exports,s,s.exports,n),s.l=!0,s.exports}return n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var s in e)n.d(i,s,function(t){return e[t]}.bind(null,s));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var i,s=(i=n(1))&&i.__esModule?i:{default:i};var o=s.default;t.default=o,t.default=s.default,e.exports=t.default},function(e,t,n){"use strict";function i(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var s=function(){function e(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),t.length>0?this.init(t,n):0!==t.length&&(this.element=t,this.settings=this.settings(n),this.reverse=this.settings.reverse?-1:1,this.settings.shine&&this.shine(),this.element.style.transform="perspective(".concat(this.settings.perspective,"px)"),this.addEventListeners())}var t,n,s;return t=e,(n=[{key:"init",value:function(t,n){var i=!0,s=!1,o=void 0;try{for(var a,r=t[Symbol.iterator]();!(i=(a=r.next()).done);i=!0){var l=a.value;this.universalTilt=new e(l,n)}}catch(e){s=!0,o=e}finally{try{i||null==r.return||r.return()}finally{if(s)throw o}}}},{key:"isMobile",value:function(){if(window.DeviceMotionEvent&&"ontouchstart"in document.documentElement)return!0}},{key:"addEventListeners",value:function(){var e=this;navigator.userAgent.match(this.settings.exclude)||(this.isMobile()?window.addEventListener("devicemotion",function(t){return e.onDeviceMove(t)}):("element"===this.settings["position-base"]?this.base=this.element:"window"===this.settings["position-base"]&&(this.base=window),this.base.addEventListener("mouseenter",function(){return e.onMouseEnter()}),this.base.addEventListener("mousemove",function(t){return e.onMouseMove(t)}),this.base.addEventListener("mouseleave",function(){return e.onMouseLeave()})))}},{key:"onMouseEnter",value:function(){this.updateElementPosition(),this.transitions(),"function"==typeof this.settings.onMouseEnter&&this.settings.onMouseEnter(this.element)}},{key:"onMouseMove",value:function(e){var t=this;this.event=e,this.updateElementPosition(),window.requestAnimationFrame(function(){return t.update()}),"function"==typeof this.settings.onMouseMove&&this.settings.onMouseMove(this.element)}},{key:"onMouseLeave",value:function(){var e=this;this.transitions(),window.requestAnimationFrame(function(){return e.reset()}),"function"==typeof this.settings.onMouseLeave&&this.settings.onMouseLeave(this.element)}},{key:"onDeviceMove",value:function(e){this.event=e,this.update(),this.updateElementPosition(),this.transitions(),"function"==typeof this.settings.onDeviceMove&&this.settings.onDeviceMove(this.element)}},{key:"reset",value:function(){this.event={pageX:this.left+this.width/2,pageY:this.top+this.height/2},this.settings.reset&&(this.element.style.transform="perspective(".concat(this.settings.perspective,"px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)")),this.settings.shine&&!this.settings["shine-save"]&&Object.assign(this.shineElement.style,{transform:"rotate(180deg) translate3d(-50%, -50%, 0)",opacity:"0"})}},{key:"getValues",value:function(){var e,t,n;this.isMobile()?(e=this.event.accelerationIncludingGravity.x/4,t=this.event.accelerationIncludingGravity.y/4,90===window.orientation?(n=(1-t)/2,t=(1+e)/2,e=n):-90===window.orientation?(n=(1+t)/2,t=(1-e)/2,e=n):0===window.orientation?(t=n=(1+t)/2,e=(1+e)/2):180===window.orientation&&(t=n=(1-t)/2,e=(1-e)/2)):"element"===this.settings["position-base"]?(e=(this.event.clientX-this.left)/this.width,t=(this.event.clientY-this.top)/this.height):"window"===this.settings["position-base"]&&(e=this.event.clientX/window.innerWidth,t=this.event.clientY/window.innerHeight);e=Math.min(Math.max(e,0),1),t=Math.min(Math.max(t,0),1);var i=(this.settings.max/2-e*this.settings.max).toFixed(2),s=(t*this.settings.max-this.settings.max/2).toFixed(2),o=Math.atan2(e-.5,.5-t)*(180/Math.PI);return{tiltX:this.reverse*i,tiltY:this.reverse*s,angle:o}}},{key:"updateElementPosition",value:function(){var e=this.element.getBoundingClientRect();this.width=this.element.offsetWidth,this.height=this.element.offsetHeight,this.left=e.left,this.top=e.top}},{key:"update",value:function(){var e=this.getValues();this.element.style.transform="perspective(".concat(this.settings.perspective,"px)\n      rotateX(").concat(this.settings.disabled&&"X"===this.settings.disabled.toUpperCase()?0:e.tiltY,"deg)\n      rotateY(").concat(this.settings.disabled&&"Y"===this.settings.disabled.toUpperCase()?0:e.tiltX,"deg)\n      scale3d(").concat(this.settings.scale,", ").concat(this.settings.scale,", ").concat(this.settings.scale,")"),this.settings.shine&&Object.assign(this.shineElement.style,{transform:"rotate(".concat(e.angle,"deg) translate3d(-50%, -50%, 0)"),opacity:"".concat(this.settings["shine-opacity"])}),this.element.dispatchEvent(new CustomEvent("tiltChange",{detail:e}))}},{key:"shine",value:function(){var e=document.createElement("div"),t=document.createElement("div");e.classList.add("shine"),t.classList.add("shine-inner"),e.appendChild(t),this.element.appendChild(e),this.shineWrapper=this.element.querySelector(".shine"),this.shineElement=this.element.querySelector(".shine-inner"),Object.assign(this.shineWrapper.style,{position:"absolute",top:"0",left:"0",height:"100%",width:"100%",overflow:"hidden"}),Object.assign(this.shineElement.style,{position:"absolute",top:"50%",left:"50%","pointer-events":"none","background-image":"linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%)",width:"".concat(2*this.element.offsetWidth,"px"),height:"".concat(2*this.element.offsetWidth,"px"),transform:"rotate(180deg) translate3d(-50%, -50%, 0)","transform-origin":"0% 0%",opacity:"0"})}},{key:"transitions",value:function(){var e=this;clearTimeout(this.timeout),this.element.style.transition="all ".concat(this.settings.speed,"ms ").concat(this.settings.easing),this.settings.shine&&(this.shineElement.style.transition="opacity ".concat(this.settings.speed,"ms ").concat(this.settings.easing)),this.timeout=setTimeout(function(){e.element.style.transition="",e.settings.shine&&(e.shineElement.style.transition="")},this.settings.speed)}},{key:"settings",value:function(e){var t={"position-base":"element",reset:!0,exclude:null,shine:!1,"shine-opacity":0,"shine-save":!1,max:35,perspective:1e3,scale:1,disabled:null,reverse:!1,speed:300,easing:"cubic-bezier(.03, .98, .52, .99)",onMouseEnter:null,onMouseMove:null,onMouseLeave:null,onDeviceMove:null},n={};for(var i in t)if(i in e)n[i]=e[i];else if(this.element.getAttribute("data-".concat(i))){var s=this.element.getAttribute("data-".concat(i));try{n[i]=JSON.parse(s)}catch(e){n[i]=s}}else n[i]=t[i];return n}}])&&i(t.prototype,n),s&&i(t,s),e}();if(t.default=s,"undefined"!=typeof document){var o=document.querySelectorAll("[data-tilt]");o.length&&new s(o)}window.jQuery&&(window.jQuery.fn.universalTilt=function(e){new s(this,e)})}])});
/*!
 * Name    : Just Another Parallax [Jarallax]
 * Version : 1.12.4
 * Author  : nK <https://nkdev.info>
 * GitHub  : https://github.com/nk-o/jarallax
 */!function(n){var o={};function i(e){if(o[e])return o[e].exports;var t=o[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,i),t.l=!0,t.exports}i.m=n,i.c=o,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)i.d(n,o,function(e){return t[e]}.bind(null,o));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="",i(i.s=10)}([,,function(e,t){e.exports=function(e){"complete"===document.readyState||"interactive"===document.readyState?e.call():document.attachEvent?document.attachEvent("onreadystatechange",function(){"interactive"===document.readyState&&e.call()}):document.addEventListener&&document.addEventListener("DOMContentLoaded",e)}},function(n,e,t){(function(e){var t="undefined"!=typeof window?window:void 0!==e?e:"undefined"!=typeof self?self:{};n.exports=t}).call(this,t(4))},function(e,t){function n(e){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}var o=function(){return this}();try{o=o||new Function("return this")()}catch(e){"object"===("undefined"==typeof window?"undefined":n(window))&&(o=window)}e.exports=o},,,,,,function(e,t,n){e.exports=n(11)},function(e,t,n){"use strict";n.r(t);var o=n(2),i=n.n(o),a=n(3),r=n(12);function l(e){return(l="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}var s,c,u=a.window.jarallax;a.window.jarallax=r.default,a.window.jarallax.noConflict=function(){return a.window.jarallax=u,this},void 0!==a.jQuery&&((s=function(){for(var e=arguments.length,t=new Array(e),n=0;n<e;n++)t[n]=arguments[n];Array.prototype.unshift.call(t,this);var o=r.default.apply(a.window,t);return"object"!==l(o)?o:this}).constructor=r.default.constructor,c=a.jQuery.fn.jarallax,a.jQuery.fn.jarallax=s,a.jQuery.fn.jarallax.noConflict=function(){return a.jQuery.fn.jarallax=c,this}),i()(function(){Object(r.default)(document.querySelectorAll("[data-jarallax]"))})},function(e,t,n){"use strict";n.r(t);var o=n(2),i=n.n(o),b=n(3);function c(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if("undefined"==typeof Symbol||!(Symbol.iterator in Object(e)))return;var n=[],o=!0,i=!1,a=void 0;try{for(var r,l=e[Symbol.iterator]();!(o=(r=l.next()).done)&&(n.push(r.value),!t||n.length!==t);o=!0);}catch(e){i=!0,a=e}finally{try{o||null==l.return||l.return()}finally{if(i)throw a}}return n}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return a(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return a(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function a(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,o=new Array(t);n<t;n++)o[n]=e[n];return o}function u(e){return(u="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function r(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var l,h,p=b.window.navigator,d=-1<p.userAgent.indexOf("MSIE ")||-1<p.userAgent.indexOf("Trident/")||-1<p.userAgent.indexOf("Edge/"),s=/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(p.userAgent),m=function(){for(var e="transform WebkitTransform MozTransform".split(" "),t=document.createElement("div"),n=0;n<e.length;n+=1)if(t&&void 0!==t.style[e[n]])return e[n];return!1}();function f(){h=s?(!l&&document.body&&((l=document.createElement("div")).style.cssText="position: fixed; top: -9999px; left: 0; height: 100vh; width: 0;",document.body.appendChild(l)),(l?l.clientHeight:0)||b.window.innerHeight||document.documentElement.clientHeight):b.window.innerHeight||document.documentElement.clientHeight}f(),b.window.addEventListener("resize",f),b.window.addEventListener("orientationchange",f),b.window.addEventListener("load",f),i()(function(){f()});var g=[];function y(){g.length&&(g.forEach(function(e,t){var n=e.instance,o=e.oldData,i=n.$item.getBoundingClientRect(),a={width:i.width,height:i.height,top:i.top,bottom:i.bottom,wndW:b.window.innerWidth,wndH:h},r=!o||o.wndW!==a.wndW||o.wndH!==a.wndH||o.width!==a.width||o.height!==a.height,l=r||!o||o.top!==a.top||o.bottom!==a.bottom;g[t].oldData=a,r&&n.onResize(),l&&n.onScroll()}),b.window.requestAnimationFrame(y))}function v(e,t){("object"===("undefined"==typeof HTMLElement?"undefined":u(HTMLElement))?e instanceof HTMLElement:e&&"object"===u(e)&&null!==e&&1===e.nodeType&&"string"==typeof e.nodeName)&&(e=[e]);for(var n,o=e.length,i=0,a=arguments.length,r=new Array(2<a?a-2:0),l=2;l<a;l++)r[l-2]=arguments[l];for(;i<o;i+=1)if("object"===u(t)||void 0===t?e[i].jarallax||(e[i].jarallax=new w(e[i],t)):e[i].jarallax&&(n=e[i].jarallax[t].apply(e[i].jarallax,r)),void 0!==n)return n;return e}var x=0,w=function(){function s(e,t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,s);var n=this;n.instanceID=x,x+=1,n.$item=e,n.defaults={type:"scroll",speed:.5,imgSrc:null,imgElement:".jarallax-img",imgSize:"cover",imgPosition:"50% 50%",imgRepeat:"no-repeat",keepImg:!1,elementInViewport:null,zIndex:-100,disableParallax:!1,disableVideo:!1,videoSrc:null,videoStartTime:0,videoEndTime:0,videoVolume:0,videoLoop:!0,videoPlayOnlyVisible:!0,videoLazyLoading:!0,onScroll:null,onInit:null,onDestroy:null,onCoverImage:null};var o,i,a=n.$item.dataset||{},r={};Object.keys(a).forEach(function(e){var t=e.substr(0,1).toLowerCase()+e.substr(1);t&&void 0!==n.defaults[t]&&(r[t]=a[e])}),n.options=n.extend({},n.defaults,r,t),n.pureOptions=n.extend({},n.options),Object.keys(n.options).forEach(function(e){"true"===n.options[e]?n.options[e]=!0:"false"===n.options[e]&&(n.options[e]=!1)}),n.options.speed=Math.min(2,Math.max(-1,parseFloat(n.options.speed))),"string"==typeof n.options.disableParallax&&(n.options.disableParallax=new RegExp(n.options.disableParallax)),n.options.disableParallax instanceof RegExp&&(o=n.options.disableParallax,n.options.disableParallax=function(){return o.test(p.userAgent)}),"function"!=typeof n.options.disableParallax&&(n.options.disableParallax=function(){return!1}),"string"==typeof n.options.disableVideo&&(n.options.disableVideo=new RegExp(n.options.disableVideo)),n.options.disableVideo instanceof RegExp&&(i=n.options.disableVideo,n.options.disableVideo=function(){return i.test(p.userAgent)}),"function"!=typeof n.options.disableVideo&&(n.options.disableVideo=function(){return!1});var l=n.options.elementInViewport;l&&"object"===u(l)&&void 0!==l.length&&(l=c(l,1)[0]),l instanceof Element||(l=null),n.options.elementInViewport=l,n.image={src:n.options.imgSrc||null,$container:null,useImgTag:!1,position:/iPad|iPhone|iPod|Android/.test(p.userAgent)?"absolute":"fixed"},n.initImg()&&n.canInitParallax()&&n.init()}var e,t,n;return e=s,(t=[{key:"css",value:function(t,n){return"string"==typeof n?b.window.getComputedStyle(t).getPropertyValue(n):(n.transform&&m&&(n[m]=n.transform),Object.keys(n).forEach(function(e){t.style[e]=n[e]}),t)}},{key:"extend",value:function(n){for(var e=arguments.length,o=new Array(1<e?e-1:0),t=1;t<e;t++)o[t-1]=arguments[t];return n=n||{},Object.keys(o).forEach(function(t){o[t]&&Object.keys(o[t]).forEach(function(e){n[e]=o[t][e]})}),n}},{key:"getWindowData",value:function(){return{width:b.window.innerWidth||document.documentElement.clientWidth,height:h,y:document.documentElement.scrollTop}}},{key:"initImg",value:function(){var e=this,t=e.options.imgElement;return t&&"string"==typeof t&&(t=e.$item.querySelector(t)),t instanceof Element||(e.options.imgSrc?(t=new Image).src=e.options.imgSrc:t=null),t&&(e.options.keepImg?e.image.$item=t.cloneNode(!0):(e.image.$item=t,e.image.$itemParent=t.parentNode),e.image.useImgTag=!0),!!e.image.$item||(null===e.image.src&&(e.image.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",e.image.bgImage=e.css(e.$item,"background-image")),!(!e.image.bgImage||"none"===e.image.bgImage))}},{key:"canInitParallax",value:function(){return m&&!this.options.disableParallax()}},{key:"init",value:function(){var e,t,n,o=this,i={position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden"},a={pointerEvents:"none",transformStyle:"preserve-3d",backfaceVisibility:"hidden",willChange:"transform,opacity"};o.options.keepImg||((e=o.$item.getAttribute("style"))&&o.$item.setAttribute("data-jarallax-original-styles",e),!o.image.useImgTag||(t=o.image.$item.getAttribute("style"))&&o.image.$item.setAttribute("data-jarallax-original-styles",t)),"static"===o.css(o.$item,"position")&&o.css(o.$item,{position:"relative"}),"auto"===o.css(o.$item,"z-index")&&o.css(o.$item,{zIndex:0}),o.image.$container=document.createElement("div"),o.css(o.image.$container,i),o.css(o.image.$container,{"z-index":o.options.zIndex}),d&&o.css(o.image.$container,{opacity:.9999}),o.image.$container.setAttribute("id","jarallax-container-".concat(o.instanceID)),o.$item.appendChild(o.image.$container),o.image.useImgTag?a=o.extend({"object-fit":o.options.imgSize,"object-position":o.options.imgPosition,"font-family":"object-fit: ".concat(o.options.imgSize,"; object-position: ").concat(o.options.imgPosition,";"),"max-width":"none"},i,a):(o.image.$item=document.createElement("div"),o.image.src&&(a=o.extend({"background-position":o.options.imgPosition,"background-size":o.options.imgSize,"background-repeat":o.options.imgRepeat,"background-image":o.image.bgImage||'url("'.concat(o.image.src,'")')},i,a))),"opacity"!==o.options.type&&"scale"!==o.options.type&&"scale-opacity"!==o.options.type&&1!==o.options.speed||(o.image.position="absolute"),"fixed"===o.image.position&&(n=function(e){for(var t=[];null!==e.parentElement;)1===(e=e.parentElement).nodeType&&t.push(e);return t}(o.$item).filter(function(e){var t=b.window.getComputedStyle(e),n=t["-webkit-transform"]||t["-moz-transform"]||t.transform;return n&&"none"!==n||/(auto|scroll)/.test(t.overflow+t["overflow-y"]+t["overflow-x"])}),o.image.position=n.length?"absolute":"fixed"),a.position=o.image.position,o.css(o.image.$item,a),o.image.$container.appendChild(o.image.$item),o.onResize(),o.onScroll(!0),o.options.onInit&&o.options.onInit.call(o),"none"!==o.css(o.$item,"background-image")&&o.css(o.$item,{"background-image":"none"}),o.addToParallaxList()}},{key:"addToParallaxList",value:function(){g.push({instance:this}),1===g.length&&b.window.requestAnimationFrame(y)}},{key:"removeFromParallaxList",value:function(){var n=this;g.forEach(function(e,t){e.instance.instanceID===n.instanceID&&g.splice(t,1)})}},{key:"destroy",value:function(){var e=this;e.removeFromParallaxList();var t,n=e.$item.getAttribute("data-jarallax-original-styles");e.$item.removeAttribute("data-jarallax-original-styles"),n?e.$item.setAttribute("style",n):e.$item.removeAttribute("style"),e.image.useImgTag&&(t=e.image.$item.getAttribute("data-jarallax-original-styles"),e.image.$item.removeAttribute("data-jarallax-original-styles"),t?e.image.$item.setAttribute("style",n):e.image.$item.removeAttribute("style"),e.image.$itemParent&&e.image.$itemParent.appendChild(e.image.$item)),e.$clipStyles&&e.$clipStyles.parentNode.removeChild(e.$clipStyles),e.image.$container&&e.image.$container.parentNode.removeChild(e.image.$container),e.options.onDestroy&&e.options.onDestroy.call(e),delete e.$item.jarallax}},{key:"clipContainer",value:function(){var e,t,n,o,i;"fixed"===this.image.position&&(n=(t=(e=this).image.$container.getBoundingClientRect()).width,o=t.height,e.$clipStyles||(e.$clipStyles=document.createElement("style"),e.$clipStyles.setAttribute("type","text/css"),e.$clipStyles.setAttribute("id","jarallax-clip-".concat(e.instanceID)),(document.head||document.getElementsByTagName("head")[0]).appendChild(e.$clipStyles)),i="#jarallax-container-".concat(e.instanceID," {\n            clip: rect(0 ").concat(n,"px ").concat(o,"px 0);\n            clip: rect(0, ").concat(n,"px, ").concat(o,"px, 0);\n            -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);\n            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);\n        }"),e.$clipStyles.styleSheet?e.$clipStyles.styleSheet.cssText=i:e.$clipStyles.innerHTML=i)}},{key:"coverImage",value:function(){var e=this,t=e.image.$container.getBoundingClientRect(),n=t.height,o=e.options.speed,i="scroll"===e.options.type||"scroll-opacity"===e.options.type,a=0,r=n,l=0;return i&&(o<0?(a=o*Math.max(n,h),h<n&&(a-=o*(n-h))):a=o*(n+h),1<o?r=Math.abs(a-h):o<0?r=a/o+Math.abs(a):r+=(h-n)*(1-o),a/=2),e.parallaxScrollDistance=a,l=i?(h-r)/2:(n-r)/2,e.css(e.image.$item,{height:"".concat(r,"px"),marginTop:"".concat(l,"px"),left:"fixed"===e.image.position?"".concat(t.left,"px"):"0",width:"".concat(t.width,"px")}),e.options.onCoverImage&&e.options.onCoverImage.call(e),{image:{height:r,marginTop:l},container:t}}},{key:"isVisible",value:function(){return this.isElementInViewport||!1}},{key:"onScroll",value:function(e){var t,n,o,i,a,r,l,s,c,u,p=this,d=p.$item.getBoundingClientRect(),m=d.top,f=d.height,g={},y=d;p.options.elementInViewport&&(y=p.options.elementInViewport.getBoundingClientRect()),p.isElementInViewport=0<=y.bottom&&0<=y.right&&y.top<=h&&y.left<=b.window.innerWidth,(e||p.isElementInViewport)&&(t=Math.max(0,m),n=Math.max(0,f+m),o=Math.max(0,-m),i=Math.max(0,m+f-h),a=Math.max(0,f-(m+f-h)),r=Math.max(0,-m+h-f),l=1-(h-m)/(h+f)*2,s=1,f<h?s=1-(o||i)/f:n<=h?s=n/h:a<=h&&(s=a/h),"opacity"!==p.options.type&&"scale-opacity"!==p.options.type&&"scroll-opacity"!==p.options.type||(g.transform="translate3d(0,0,0)",g.opacity=s),"scale"!==p.options.type&&"scale-opacity"!==p.options.type||(c=1,p.options.speed<0?c-=p.options.speed*s:c+=p.options.speed*(1-s),g.transform="scale(".concat(c,") translate3d(0,0,0)")),"scroll"!==p.options.type&&"scroll-opacity"!==p.options.type||(u=p.parallaxScrollDistance*l,"absolute"===p.image.position&&(u-=m),g.transform="translate3d(0,".concat(u,"px,0)")),p.css(p.image.$item,g),p.options.onScroll&&p.options.onScroll.call(p,{section:d,beforeTop:t,beforeTopEnd:n,afterTop:o,beforeBottom:i,beforeBottomEnd:a,afterBottom:r,visiblePercent:s,fromViewportCenter:l}))}},{key:"onResize",value:function(){this.coverImage(),this.clipContainer()}}])&&r(e.prototype,t),n&&r(e,n),s}();v.constructor=w,t.default=v}]);
//# sourceMappingURL=jarallax.min.js.map

/*!
 * Name    : DEPRECATED Elements Extension for Jarallax. Use laxxx instead https://github.com/alexfoxy/laxxx
 * Version : 1.0.0
 * Author  : nK <https://nkdev.info>
 * GitHub  : https://github.com/nk-o/jarallax
 */!function(n){var o={};function r(t){if(o[t])return o[t].exports;var e=o[t]={i:t,l:!1,exports:{}};return n[t].call(e.exports,e,e.exports,r),e.l=!0,e.exports}r.m=n,r.c=o,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="",r(r.s=0)}([function(t,e,n){t.exports=n(1)},function(t,e,n){"use strict";n.r(e);var o=n(2),r=n.n(o),i=n(3),a=n.n(i),l=n(5);Object(l.default)(),r()(function(){void 0!==a.a.jarallax&&a.a.jarallax(document.querySelectorAll("[data-jarallax-element]"))})},function(t,e){t.exports=function(t){"complete"===document.readyState||"interactive"===document.readyState?t.call():document.attachEvent?document.attachEvent("onreadystatechange",function(){"interactive"===document.readyState&&t.call()}):document.addEventListener&&document.addEventListener("DOMContentLoaded",t)}},function(n,t,e){(function(t){var e="undefined"!=typeof window?window:void 0!==t?t:"undefined"!=typeof self?self:{};n.exports=e}).call(this,e(4))},function(t,e){function n(t){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}var o=function(){return this}();try{o=o||new Function("return this")()}catch(t){"object"===("undefined"==typeof window?"undefined":n(window))&&(o=window)}t.exports=o},function(t,e,n){"use strict";n.r(e),n.d(e,"default",function(){return i});var o=n(3),r=n.n(o);function i(){var t,e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:r.a.jarallax;void 0!==e&&(t=e.constructor,["initImg","canInitParallax","init","destroy","clipContainer","coverImage","isVisible","onScroll","onResize"].forEach(function(y){var h=t.prototype[y];t.prototype[y]=function(){var t=this;"initImg"===y&&null!==t.$item.getAttribute("data-jarallax-element")&&(t.options.type="element",t.pureOptions.speed=t.$item.getAttribute("data-jarallax-element")||t.pureOptions.speed);for(var e=arguments.length,n=new Array(e),o=0;o<e;o++)n[o]=arguments[o];if("element"!==t.options.type)return h.apply(t,n);switch(t.pureOptions.threshold=t.$item.getAttribute("data-threshold")||"",y){case"init":var r=t.pureOptions.speed.split(" ");t.options.speed=t.pureOptions.speed||0,t.options.speedY=r[0]?parseFloat(r[0]):0,t.options.speedX=r[1]?parseFloat(r[1]):0;var i=t.pureOptions.threshold.split(" ");t.options.thresholdY=i[0]?parseFloat(i[0]):null,t.options.thresholdX=i[1]?parseFloat(i[1]):null,h.apply(t,n);var a=t.$item.getAttribute("data-jarallax-original-styles");return a&&t.$item.setAttribute("style",a),!0;case"onResize":var l=t.css(t.$item,"transform");t.css(t.$item,{transform:""});var s=t.$item.getBoundingClientRect();t.itemData={width:s.width,height:s.height,y:s.top+t.getWindowData().y,x:s.left},t.css(t.$item,{transform:l});break;case"onScroll":var u=t.getWindowData(),c=(u.y+u.height/2-t.itemData.y-t.itemData.height/2)/(u.height/2),p=c*t.options.speedY,d=c*t.options.speedX,f=p,m=d;null!==t.options.thresholdY&&p>t.options.thresholdY&&(f=0),null!==t.options.thresholdX&&d>t.options.thresholdX&&(m=0),t.css(t.$item,{transform:"translate3d(".concat(m,"px,").concat(f,"px,0)")});break;case"initImg":case"isVisible":case"clipContainer":case"coverImage":return!0}return h.apply(t,n)}}))}}]);
//# sourceMappingURL=jarallax-element.min.js.map

/*!
 * Name    : Video Background Extension for Jarallax
 * Version : 1.0.1
 * Author  : nK <https://nkdev.info>
 * GitHub  : https://github.com/nk-o/jarallax
 */!function(o){var i={};function n(e){if(i[e])return i[e].exports;var t=i[e]={i:e,l:!1,exports:{}};return o[e].call(t.exports,t,t.exports,n),t.l=!0,t.exports}n.m=o,n.c=i,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)n.d(o,i,function(e){return t[e]}.bind(null,i));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=6)}([,,function(e,t){e.exports=function(e){"complete"===document.readyState||"interactive"===document.readyState?e.call():document.attachEvent?document.attachEvent("onreadystatechange",function(){"interactive"===document.readyState&&e.call()}):document.addEventListener&&document.addEventListener("DOMContentLoaded",e)}},function(o,e,t){(function(e){var t="undefined"!=typeof window?window:void 0!==e?e:"undefined"!=typeof self?self:{};o.exports=t}).call(this,t(4))},function(e,t){function o(e){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}var i=function(){return this}();try{i=i||new Function("return this")()}catch(e){"object"===("undefined"==typeof window?"undefined":o(window))&&(i=window)}e.exports=i},,function(e,t,o){e.exports=o(7)},function(e,t,o){"use strict";o.r(t);var i=o(8),n=o(3),a=o.n(n),r=o(2),l=o.n(r),p=o(9);a.a.VideoWorker=a.a.VideoWorker||i.default,Object(p.default)(),l()(function(){void 0!==a.a.jarallax&&a.a.jarallax(document.querySelectorAll("[data-jarallax-video]"))})},function(e,t,o){"use strict";o.r(t),o.d(t,"default",function(){return v});var i=o(3),s=o.n(i);function n(e){return(n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function a(e,t){for(var o=0;o<t.length;o++){var i=t[o];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}function r(){this.doneCallbacks=[],this.failCallbacks=[]}r.prototype={execute:function(e,t){var o=e.length;for(t=Array.prototype.slice.call(t);o;)e[--o].apply(null,t)},resolve:function(){for(var e=arguments.length,t=new Array(e),o=0;o<e;o++)t[o]=arguments[o];this.execute(this.doneCallbacks,t)},reject:function(){for(var e=arguments.length,t=new Array(e),o=0;o<e;o++)t[o]=arguments[o];this.execute(this.failCallbacks,t)},done:function(e){this.doneCallbacks.push(e)},fail:function(e){this.failCallbacks.push(e)}};var l=0,p=0,u=0,d=0,c=0,y=new r,m=new r,v=function(){function i(e,t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,i);var o=this;o.url=e,o.options_default={autoplay:!1,loop:!1,mute:!1,volume:100,showContols:!0,startTime:0,endTime:0},o.options=o.extend({},o.options_default,t),o.videoID=o.parseURL(e),o.videoID&&(o.ID=l,l+=1,o.loadAPI(),o.init())}var e,t,o;return e=i,(t=[{key:"extend",value:function(){for(var e=arguments.length,o=new Array(e),t=0;t<e;t++)o[t]=arguments[t];var i=o[0]||{};return Object.keys(o).forEach(function(t){o[t]&&Object.keys(o[t]).forEach(function(e){i[e]=o[t][e]})}),i}},{key:"parseURL",value:function(e){var t,o,i,n,a,r=!(!(t=e.match(/.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/))||11!==t[1].length)&&t[1],l=!(!(o=e.match(/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/))||!o[3])&&o[3],p=(i=e.split(/,(?=mp4\:|webm\:|ogv\:|ogg\:)/),n={},a=0,i.forEach(function(e){var t=e.match(/^(mp4|webm|ogv|ogg)\:(.*)/);t&&t[1]&&t[2]&&(n["ogv"===t[1]?"ogg":t[1]]=t[2],a=1)}),!!a&&n);return r?(this.type="youtube",r):l?(this.type="vimeo",l):!!p&&(this.type="local",p)}},{key:"isValid",value:function(){return!!this.videoID}},{key:"on",value:function(e,t){this.userEventsList=this.userEventsList||[],(this.userEventsList[e]||(this.userEventsList[e]=[])).push(t)}},{key:"off",value:function(o,i){var n=this;this.userEventsList&&this.userEventsList[o]&&(i?this.userEventsList[o].forEach(function(e,t){e===i&&(n.userEventsList[o][t]=!1)}):delete this.userEventsList[o])}},{key:"fire",value:function(e){for(var t=this,o=arguments.length,i=new Array(1<o?o-1:0),n=1;n<o;n++)i[n-1]=arguments[n];this.userEventsList&&void 0!==this.userEventsList[e]&&this.userEventsList[e].forEach(function(e){e&&e.apply(t,i)})}},{key:"play",value:function(e){var t=this;t.player&&("youtube"===t.type&&t.player.playVideo&&(void 0!==e&&t.player.seekTo(e||0),s.a.YT.PlayerState.PLAYING!==t.player.getPlayerState()&&t.player.playVideo()),"vimeo"===t.type&&(void 0!==e&&t.player.setCurrentTime(e),t.player.getPaused().then(function(e){e&&t.player.play()})),"local"===t.type&&(void 0!==e&&(t.player.currentTime=e),t.player.paused&&t.player.play()))}},{key:"pause",value:function(){var t=this;t.player&&("youtube"===t.type&&t.player.pauseVideo&&s.a.YT.PlayerState.PLAYING===t.player.getPlayerState()&&t.player.pauseVideo(),"vimeo"===t.type&&t.player.getPaused().then(function(e){e||t.player.pause()}),"local"===t.type&&(t.player.paused||t.player.pause()))}},{key:"mute",value:function(){var e=this;e.player&&("youtube"===e.type&&e.player.mute&&e.player.mute(),"vimeo"===e.type&&e.player.setVolume&&e.player.setVolume(0),"local"===e.type&&(e.$video.muted=!0))}},{key:"unmute",value:function(){var e=this;e.player&&("youtube"===e.type&&e.player.mute&&e.player.unMute(),"vimeo"===e.type&&e.player.setVolume&&e.player.setVolume(e.options.volume),"local"===e.type&&(e.$video.muted=!1))}},{key:"setVolume",value:function(e){var t=0<arguments.length&&void 0!==e&&e,o=this;o.player&&t&&("youtube"===o.type&&o.player.setVolume&&o.player.setVolume(t),"vimeo"===o.type&&o.player.setVolume&&o.player.setVolume(t),"local"===o.type&&(o.$video.volume=t/100))}},{key:"getVolume",value:function(t){var e=this;e.player?("youtube"===e.type&&e.player.getVolume&&t(e.player.getVolume()),"vimeo"===e.type&&e.player.getVolume&&e.player.getVolume().then(function(e){t(e)}),"local"===e.type&&t(100*e.$video.volume)):t(!1)}},{key:"getMuted",value:function(t){var e=this;e.player?("youtube"===e.type&&e.player.isMuted&&t(e.player.isMuted()),"vimeo"===e.type&&e.player.getVolume&&e.player.getVolume().then(function(e){t(!!e)}),"local"===e.type&&t(e.$video.muted)):t(null)}},{key:"getImageURL",value:function(t){var e,o,i,n,a=this;a.videoImage?t(a.videoImage):("youtube"===a.type&&(e=["maxresdefault","sddefault","hqdefault","0"],o=0,(i=new Image).onload=function(){120!==(this.naturalWidth||this.width)||o===e.length-1?(a.videoImage="https://img.youtube.com/vi/".concat(a.videoID,"/").concat(e[o],".jpg"),t(a.videoImage)):(o+=1,this.src="https://img.youtube.com/vi/".concat(a.videoID,"/").concat(e[o],".jpg"))},i.src="https://img.youtube.com/vi/".concat(a.videoID,"/").concat(e[o],".jpg")),"vimeo"===a.type&&((n=new XMLHttpRequest).open("GET","https://vimeo.com/api/v2/video/".concat(a.videoID,".json"),!0),n.onreadystatechange=function(){var e;4===this.readyState&&200<=this.status&&this.status<400&&(e=JSON.parse(this.responseText),a.videoImage=e[0].thumbnail_large,t(a.videoImage))},n.send(),n=null))}},{key:"getIframe",value:function(e){this.getVideo(e)}},{key:"getVideo",value:function(p){var u=this;u.$video?p(u.$video):u.onAPIready(function(){var e,t,o,i,n,a,r,l;u.$video||((e=document.createElement("div")).style.display="none"),"youtube"===u.type&&(u.playerOptions={},u.playerOptions.videoId=u.videoID,u.playerOptions.playerVars={autohide:1,rel:0,autoplay:0,playsinline:1},u.options.showContols||(u.playerOptions.playerVars.iv_load_policy=3,u.playerOptions.playerVars.modestbranding=1,u.playerOptions.playerVars.controls=0,u.playerOptions.playerVars.showinfo=0,u.playerOptions.playerVars.disablekb=1),u.playerOptions.events={onReady:function(t){u.options.mute?t.target.mute():u.options.volume&&t.target.setVolume(u.options.volume),u.options.autoplay&&u.play(u.options.startTime),u.fire("ready",t),u.options.loop&&!u.options.endTime&&(u.options.endTime=u.player.getDuration()-.1),setInterval(function(){u.getVolume(function(e){u.options.volume!==e&&(u.options.volume=e,u.fire("volumechange",t))})},150)},onStateChange:function(e){u.options.loop&&e.data===s.a.YT.PlayerState.ENDED&&u.play(u.options.startTime),t||e.data!==s.a.YT.PlayerState.PLAYING||(t=1,u.fire("started",e)),e.data===s.a.YT.PlayerState.PLAYING&&u.fire("play",e),e.data===s.a.YT.PlayerState.PAUSED&&u.fire("pause",e),e.data===s.a.YT.PlayerState.ENDED&&u.fire("ended",e),e.data===s.a.YT.PlayerState.PLAYING?o=setInterval(function(){u.fire("timeupdate",e),u.options.endTime&&u.player.getCurrentTime()>=u.options.endTime&&(u.options.loop?u.play(u.options.startTime):u.pause())},150):clearInterval(o)},onError:function(e){u.fire("error",e)}},(i=!u.$video)&&((n=document.createElement("div")).setAttribute("id",u.playerID),e.appendChild(n),document.body.appendChild(e)),u.player=u.player||new s.a.YT.Player(u.playerID,u.playerOptions),i&&(u.$video=document.getElementById(u.playerID),u.videoWidth=parseInt(u.$video.getAttribute("width"),10)||1280,u.videoHeight=parseInt(u.$video.getAttribute("height"),10)||720)),"vimeo"===u.type&&(u.playerOptions={id:u.videoID,autopause:0,transparent:0,autoplay:u.options.autoplay?1:0,loop:u.options.loop?1:0,muted:u.options.mute?1:0},u.options.volume&&(u.playerOptions.volume=u.options.volume),u.options.showContols||(u.playerOptions.badge=0,u.playerOptions.byline=0,u.playerOptions.portrait=0,u.playerOptions.title=0,u.playerOptions.background=1),u.$video||(a="",Object.keys(u.playerOptions).forEach(function(e){""!==a&&(a+="&"),a+="".concat(e,"=").concat(encodeURIComponent(u.playerOptions[e]))}),u.$video=document.createElement("iframe"),u.$video.setAttribute("id",u.playerID),u.$video.setAttribute("src","https://player.vimeo.com/video/".concat(u.videoID,"?").concat(a)),u.$video.setAttribute("frameborder","0"),u.$video.setAttribute("mozallowfullscreen",""),u.$video.setAttribute("allowfullscreen",""),e.appendChild(u.$video),document.body.appendChild(e)),u.player=u.player||new s.a.Vimeo.Player(u.$video,u.playerOptions),u.options.startTime&&u.options.autoplay&&u.player.setCurrentTime(u.options.startTime),u.player.getVideoWidth().then(function(e){u.videoWidth=e||1280}),u.player.getVideoHeight().then(function(e){u.videoHeight=e||720}),u.player.on("timeupdate",function(e){r||(u.fire("started",e),r=1),u.fire("timeupdate",e),u.options.endTime&&u.options.endTime&&e.seconds>=u.options.endTime&&(u.options.loop?u.play(u.options.startTime):u.pause())}),u.player.on("play",function(e){u.fire("play",e),u.options.startTime&&0===e.seconds&&u.play(u.options.startTime)}),u.player.on("pause",function(e){u.fire("pause",e)}),u.player.on("ended",function(e){u.fire("ended",e)}),u.player.on("loaded",function(e){u.fire("ready",e)}),u.player.on("volumechange",function(e){u.fire("volumechange",e)}),u.player.on("error",function(e){u.fire("error",e)})),"local"===u.type&&(u.$video||(u.$video=document.createElement("video"),u.options.showContols&&(u.$video.controls=!0),u.options.mute?u.$video.muted=!0:u.$video.volume&&(u.$video.volume=u.options.volume/100),u.options.loop&&(u.$video.loop=!0),u.$video.setAttribute("playsinline",""),u.$video.setAttribute("webkit-playsinline",""),u.$video.setAttribute("id",u.playerID),e.appendChild(u.$video),document.body.appendChild(e),Object.keys(u.videoID).forEach(function(e){var t,o,i,n;t=u.$video,o=u.videoID[e],i="video/".concat(e),(n=document.createElement("source")).src=o,n.type=i,t.appendChild(n)})),u.player=u.player||u.$video,u.player.addEventListener("playing",function(e){l||u.fire("started",e),l=1}),u.player.addEventListener("timeupdate",function(e){u.fire("timeupdate",e),u.options.endTime&&u.options.endTime&&this.currentTime>=u.options.endTime&&(u.options.loop?u.play(u.options.startTime):u.pause())}),u.player.addEventListener("play",function(e){u.fire("play",e)}),u.player.addEventListener("pause",function(e){u.fire("pause",e)}),u.player.addEventListener("ended",function(e){u.fire("ended",e)}),u.player.addEventListener("loadedmetadata",function(){u.videoWidth=this.videoWidth||1280,u.videoHeight=this.videoHeight||720,u.fire("ready"),u.options.autoplay&&u.play(u.options.startTime)}),u.player.addEventListener("volumechange",function(e){u.getVolume(function(e){u.options.volume=e}),u.fire("volumechange",e)}),u.player.addEventListener("error",function(e){u.fire("error",e)})),p(u.$video)})}},{key:"init",value:function(){this.playerID="VideoWorker-".concat(this.ID)}},{key:"loadAPI",value:function(){if(!p||!u){var e,t,o="";if("youtube"!==this.type||p||(p=1,o="https://www.youtube.com/iframe_api"),"vimeo"===this.type&&!u){if(u=1,void 0!==s.a.Vimeo)return;o="https://player.vimeo.com/api/player.js"}o&&(e=document.createElement("script"),t=document.getElementsByTagName("head")[0],e.src=o,t.appendChild(e),e=t=null)}}},{key:"onAPIready",value:function(e){var t;"youtube"===this.type&&(void 0!==s.a.YT&&0!==s.a.YT.loaded||d?"object"===n(s.a.YT)&&1===s.a.YT.loaded?e():y.done(function(){e()}):(d=1,window.onYouTubeIframeAPIReady=function(){window.onYouTubeIframeAPIReady=null,y.resolve("done"),e()})),"vimeo"===this.type&&(void 0!==s.a.Vimeo||c?void 0!==s.a.Vimeo?e():m.done(function(){e()}):(c=1,t=setInterval(function(){void 0!==s.a.Vimeo&&(clearInterval(t),m.resolve("done"),e())},20))),"local"===this.type&&e()}}])&&a(e.prototype,t),o&&a(e,o),i}()},function(e,t,o){"use strict";o.r(t),o.d(t,"default",function(){return n});var r=o(8),i=o(3),p=o.n(i);function n(){var e,t,l,o,n,i,a=0<arguments.length&&void 0!==arguments[0]?arguments[0]:p.a.jarallax;void 0!==a&&(e=a.constructor,t=e.prototype.onScroll,e.prototype.onScroll=function(){var o=this;t.apply(o),o.isVideoInserted||!o.video||o.options.videoLazyLoading&&!o.isElementInViewport||o.options.disableVideo()||(o.isVideoInserted=!0,o.video.getVideo(function(e){var t=e.parentNode;o.css(e,{position:o.image.position,top:"0px",left:"0px",right:"0px",bottom:"0px",width:"100%",height:"100%",maxWidth:"none",maxHeight:"none",pointerEvents:"none",transformStyle:"preserve-3d",backfaceVisibility:"hidden",willChange:"transform,opacity",margin:0,zIndex:-1}),o.$video=e,"local"===o.video.type&&(o.image.src?o.$video.setAttribute("poster",o.image.src):o.image.$item&&"IMG"===o.image.$item.tagName&&o.image.$item.src&&o.$video.setAttribute("poster",o.image.$item.src)),o.image.$container.appendChild(e),t.parentNode.removeChild(t)}))},l=e.prototype.coverImage,e.prototype.coverImage=function(){var e,t,o,i,n=this,a=l.apply(n),r=!!n.image.$item&&n.image.$item.nodeName;return a&&n.video&&r&&("IFRAME"===r||"VIDEO"===r)&&(t=(e=a.image.height)*n.image.width/n.image.height,o=(a.container.width-t)/2,i=a.image.marginTop,a.container.width>t&&(e=(t=a.container.width)*n.image.height/n.image.width,o=0,i+=(a.image.height-e)/2),"IFRAME"===r&&(e+=400,i-=200),n.css(n.$video,{width:"".concat(t,"px"),marginLeft:"".concat(o,"px"),height:"".concat(e,"px"),marginTop:"".concat(i,"px")})),a},o=e.prototype.initImg,e.prototype.initImg=function(){var e=this,t=o.apply(e);return e.options.videoSrc||(e.options.videoSrc=e.$item.getAttribute("data-jarallax-video")||null),e.options.videoSrc?(e.defaultInitImgResult=t,!0):t},n=e.prototype.canInitParallax,e.prototype.canInitParallax=function(){var o=this,e=n.apply(o);if(!o.options.videoSrc)return e;var t=new r.default(o.options.videoSrc,{autoplay:!0,loop:o.options.videoLoop,showContols:!1,startTime:o.options.videoStartTime||0,endTime:o.options.videoEndTime||0,mute:o.options.videoVolume?0:1,volume:o.options.videoVolume||0});function i(){o.image.$default_item&&(o.image.$item=o.image.$default_item,o.image.$item.style.display="block",o.coverImage(),o.clipContainer(),o.onScroll())}if(t.isValid())if(this.options.disableParallax()&&(e=!0,o.image.position="absolute",o.options.type="scroll",o.options.speed=1),e){if(t.on("ready",function(){var e;o.options.videoPlayOnlyVisible?(e=o.onScroll,o.onScroll=function(){e.apply(o),o.videoError||!o.options.videoLoop&&(o.options.videoLoop||o.videoEnded)||(o.isVisible()?t.play():t.pause())}):t.play()}),t.on("started",function(){o.image.$default_item=o.image.$item,o.image.$item=o.$video,o.image.width=o.video.videoWidth||1280,o.image.height=o.video.videoHeight||720,o.coverImage(),o.clipContainer(),o.onScroll(),o.image.$default_item&&(o.image.$default_item.style.display="none")}),t.on("ended",function(){o.videoEnded=!0,o.options.videoLoop||i()}),t.on("error",function(){o.videoError=!0,i()}),o.video=t,!o.defaultInitImgResult&&(o.image.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7","local"!==t.type))return t.getImageURL(function(e){o.image.bgImage='url("'.concat(e,'")'),o.init()}),!1}else o.defaultInitImgResult||t.getImageURL(function(e){var t=o.$item.getAttribute("style");t&&o.$item.setAttribute("data-jarallax-original-styles",t),o.css(o.$item,{"background-image":'url("'.concat(e,'")'),"background-position":"center","background-size":"cover"})});return e},i=e.prototype.destroy,e.prototype.destroy=function(){var e=this;e.image.$default_item&&(e.image.$item=e.image.$default_item,delete e.image.$default_item),i.apply(e)})}}]);
//# sourceMappingURL=jarallax-video.min.js.map

// animations
// v1.0
// By Firas ODEH

var piximations = (function($) {
    "use strict";

    var api = {
        test: 1,
        init: function() {
            initHeadline();
            initSlidingHeadline();
			return this;
		},
        update: function(){
            initHeadline();
            initSlidingHeadline();
        },
        play: function(el = false){
            playSlidingHeadline(el);
        }
    };


    function playSlidingHeadline(el){
        if(!el){
            el = $('body');
        }
        el.find('.pix-sliding-headline:not(.pix-ready)').each(function(i, headline){
            var headling_text = $(headline).text();
            var words = headling_text.split(" ");
            var textStyle = $(headline).attr('data-style');
            var textClass = $(headline).attr('data-class');
            var html = '';
            $.each(words, function(i, w){
                if(textStyle&&textStyle!=""){
                    html += '<span class="slide-in-container"><span class="d-inline-block group-animate-in" style="'+textStyle+'" >'+w+'</span></span> ';
                }else{
                    html += '<span class="slide-in-container"><span class="d-inline-block group-animate-in '+textClass+'" >'+w+'</span></span> ';
                }
            });
            $(headline).html(html);
            $(headline).addClass('pix-ready');
            var delay = 200;
            $(headline).find('.group-animate-in').each(function(i, elem){
                // Animate
                setTimeout(function() {
                    $(elem).addClass('animating').addClass('slide-in-up').removeClass('group-animate-in');
                }, delay);
                // On animation end
                $(elem).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    // Clear animation
                    $(elem).removeClass('animating').removeClass('slide-in-up').addClass('animated');
                });
                delay+=150;
            });
        });
    }

    function initSlidingHeadline(){

        $('.pix-sliding-headline:not(.pix-ready)').each(function(i, headline){
            var headling_text = $(headline).text();
            var words = headling_text.split(" ");
            var textStyle = $(headline).attr('data-style');
            var textClass = $(headline).attr('data-class');

            var html = '';

            $.each(words, function(i, w){
                if(textStyle&&textStyle!=""){
                    html += '<span class="slide-in-container"><span class="d-inline-block group-animate-in" style="'+textStyle+'" >'+w+'</span></span> ';
                }else{
                    html += '<span class="slide-in-container"><span class="d-inline-block group-animate-in '+textClass+'" >'+w+'</span></span> ';
                }
            });

            var normal_trigger = true;
            if($('body').hasClass('pix-sections-stack')&&!window.vc_iframe){
                if($(headline).closest('.pix-slides-section').length>0){
                    normal_trigger = false;
                    if(!$(headline).closest('.pix-slides-section').hasClass('is-sticky-active') && $(headline).closest('.site-footer2').length<1){
                        return false;
                    }
                }
            }

            $(headline).html(html);
            $(headline).addClass('pix-ready');




            var waypoint = new Waypoint({
              element: headline,
              offset: '100%',
              triggerOnce: normal_trigger,
              handler: function() {

                  var delay = 200;
                  $(headline).find('.group-animate-in').each(function(i, elem){

                      // Animate
                          setTimeout(function() {
                              $(elem).addClass('animating').addClass('slide-in-up').removeClass('group-animate-in');
                          }, delay);


                      // On animation end
                          $(elem).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                              // Clear animation
                                  $(elem).removeClass('animating').removeClass('slide-in-up').addClass('animated');
                          });


                      delay+=150;

                  });


                // trigger Once
                this.destroy();
              }
            });

        });

    }



    // New Test
    var animationDelay = 2500,
		//loading bar effect
		barAnimationDelay = 3800,
		barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
		//letters effect
		lettersDelay = 50,
		//type effect
		typeLettersDelay = 150,
		selectionDuration = 500,
		typeAnimationDelay = selectionDuration + 800,
		//clip effect
		revealDuration = 600,
		revealAnimationDelay = 1500;

        function initHeadline() {
    		//insert <i> element for each letter of a changing word
    		singleLetters($('.pix-headline:not(.pix-ready).letters').find('span'));
    		//initialise headline animation
    		animateHeadline($('.pix-headline:not(.pix-ready)'));
    	}

        function singleLetters($words) {
    		$words.each(function(){
    			var word = $(this),
    				letters = word.text().split(''),
    				selected = word.hasClass('is-visible');
    			for (i in letters) {
    				if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
    				letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
    			}
    		    var newLetters = letters.join('');
    		    word.html(newLetters).css('opacity', 1);
    		});
    	}

    	function animateHeadline($headlines) {
    		var duration = animationDelay;
    		$headlines.each(function(){
    			var headline = $(this);
                $(headline).addClass('pix-ready');

    			if(headline.hasClass('loading-bar')) {
    				duration = barAnimationDelay;
                    var color = headline.attr('data-color');
                    if(color&&color!=''){
                        headline.find('.pix-bar').css('background', color);
                    }
    				setTimeout(function(){ headline.find('.pix-words-wrapper').addClass('is-loading') }, barWaiting);
    			} else if (headline.hasClass('clip')){
    				var spanWrapper = headline.find('.pix-words-wrapper'),
    					newWidth = spanWrapper.width() + 10
    				spanWrapper.css('width', newWidth);
    			} else if (!headline.hasClass('type') ) {
    				//assign to .pix-words-wrapper the width of its longest word
    				var words = headline.find('.pix-words-wrapper span'),
    					width = 0;
                    width = headline.find('.pix-words-wrapper span').first().width();
                    var height = headline.find('.pix-words-wrapper span').first().height();
    				headline.find('.pix-words-wrapper').width(width);
    			};
    			//trigger animation
    			setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
    		});
    	}

    	function hideWord($word) {
    		var nextWord = takeNext($word);

    		if($word.parents('.pix-headline').hasClass('type')) {
    			var parentSpan = $word.parent('.pix-words-wrapper');
    			parentSpan.addClass('selected').removeClass('waiting');
    			setTimeout(function(){
    				parentSpan.removeClass('selected');
    				$word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
    			}, selectionDuration);
    			setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);

    		} else if($word.parents('.pix-headline').hasClass('letters')) {
    			var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
    			hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
    			showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

    		}  else if($word.parents('.pix-headline').hasClass('clip')) {
    			$word.parents('.pix-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
    				switchWord($word, nextWord);
    				showWord(nextWord);
    			});

    		} else if ($word.parents('.pix-headline').hasClass('loading-bar')){
    			$word.parents('.pix-words-wrapper').removeClass('is-loading');
    			switchWord($word, nextWord);
    			setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
    			setTimeout(function(){ $word.parents('.pix-words-wrapper').addClass('is-loading') }, barWaiting);

    		} else {
    			switchWord($word, nextWord);
    			setTimeout(function(){ hideWord(nextWord) }, animationDelay);
    		}
    	}

    	function showWord($word, $duration) {
    		if($word.parents('.pix-headline').hasClass('type')) {
    			showLetter($word.find('i').eq(0), $word, false, $duration);
    			$word.addClass('is-visible').removeClass('is-hidden');
    		}  else if($word.parents('.pix-headline').hasClass('clip')) {
    			$word.parents('.pix-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){
    				setTimeout(function(){ hideWord($word) }, revealAnimationDelay);
    			});
    		}
    	}

    	function hideLetter($letter, $word, $bool, $duration) {
    		$letter.removeClass('in').addClass('out');

    		if(!$letter.is(':last-child')) {
    		 	setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);
    		} else if($bool) {
    		 	setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
    		}

    		if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
    			var nextWord = takeNext($word);
    			switchWord($word, nextWord);
    		}
    	}

    	function showLetter($letter, $word, $bool, $duration) {
    		$letter.addClass('in').removeClass('out');

    		if(!$letter.is(':last-child')) {
    			setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration);
    		} else {
    			if($word.parents('.pix-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.pix-words-wrapper').addClass('waiting'); }, 200);}
    			if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
    		}
    	}

    	function takeNext($word) {
    		return (!$word.is(':last-child')&&!$word.next().hasClass('pix-bar')) ? $word.next() : $word.parent().children().eq(0);
    	}

    	function takePrev($word) {
    		return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
    	}

    	function switchWord($oldWord, $newWord) {
    		$oldWord.removeClass('is-visible').addClass('is-hidden');
            var new_width = $newWord.width();
            if($oldWord.parents('.pix-headline').hasClass('rotate-1')) {
                $oldWord.parents('.pix-words-wrapper').width(new_width);
            }else{
                $oldWord.parents('.pix-words-wrapper').width(new_width);
            }
    		$newWord.removeClass('is-hidden').addClass('is-visible');
    	}

    return api;

})(jQuery);

/*!
 * jquery-confirm v3.3.4 (http://craftpip.github.io/jquery-confirm/)
 * Author: Boniface Pereira
 * Website: www.craftpip.com
 * Contact: hey@craftpip.com
 *
 * Copyright 2013-2019 jquery-confirm
 * Licensed under MIT (https://github.com/craftpip/jquery-confirm/blob/master/LICENSE)
 */
(function(factory){if(typeof define==="function"&&define.amd){define(["jquery"],factory);}else{if(typeof module==="object"&&module.exports){module.exports=function(root,jQuery){if(jQuery===undefined){if(typeof window!=="undefined"){jQuery=require("jquery");}else{jQuery=require("jquery")(root);}}factory(jQuery);return jQuery;};}else{factory(jQuery);}}}(function($){var w=window;$.fn.confirm=function(options,option2){if(typeof options==="undefined"){options={};}if(typeof options==="string"){options={content:options,title:(option2)?option2:false};}$(this).each(function(){var $this=$(this);if($this.attr("jc-attached")){console.warn("jConfirm has already been attached to this element ",$this[0]);return;}$this.on("click",function(e){e.preventDefault();var jcOption=$.extend({},options);if($this.attr("data-title")){jcOption.title=$this.attr("data-title");}if($this.attr("data-content")){jcOption.content=$this.attr("data-content");}if(typeof jcOption.buttons==="undefined"){jcOption.buttons={};}jcOption["$target"]=$this;if($this.attr("href")&&Object.keys(jcOption.buttons).length===0){var buttons=$.extend(true,{},w.jconfirm.pluginDefaults.defaultButtons,(w.jconfirm.defaults||{}).defaultButtons||{});var firstBtn=Object.keys(buttons)[0];jcOption.buttons=buttons;jcOption.buttons[firstBtn].action=function(){location.href=$this.attr("href");};}jcOption.closeIcon=false;var instance=$.confirm(jcOption);});$this.attr("jc-attached",true);});return $(this);};$.confirm=function(options,option2){if(typeof options==="undefined"){options={};}if(typeof options==="string"){options={content:options,title:(option2)?option2:false};}var putDefaultButtons=!(options.buttons===false);if(typeof options.buttons!=="object"){options.buttons={};}if(Object.keys(options.buttons).length===0&&putDefaultButtons){var buttons=$.extend(true,{},w.jconfirm.pluginDefaults.defaultButtons,(w.jconfirm.defaults||{}).defaultButtons||{});options.buttons=buttons;}return w.jconfirm(options);};$.alert=function(options,option2){if(typeof options==="undefined"){options={};}if(typeof options==="string"){options={content:options,title:(option2)?option2:false};}var putDefaultButtons=!(options.buttons===false);if(typeof options.buttons!=="object"){options.buttons={};}if(Object.keys(options.buttons).length===0&&putDefaultButtons){var buttons=$.extend(true,{},w.jconfirm.pluginDefaults.defaultButtons,(w.jconfirm.defaults||{}).defaultButtons||{});var firstBtn=Object.keys(buttons)[0];options.buttons[firstBtn]=buttons[firstBtn];}return w.jconfirm(options);};$.dialog=function(options,option2){if(typeof options==="undefined"){options={};}if(typeof options==="string"){options={content:options,title:(option2)?option2:false,closeIcon:function(){}};}options.buttons={};if(typeof options.closeIcon==="undefined"){options.closeIcon=function(){};}options.confirmKeys=[13];return w.jconfirm(options);};w.jconfirm=function(options){if(typeof options==="undefined"){options={};}var pluginOptions=$.extend(true,{},w.jconfirm.pluginDefaults);if(w.jconfirm.defaults){pluginOptions=$.extend(true,pluginOptions,w.jconfirm.defaults);}pluginOptions=$.extend(true,{},pluginOptions,options);var instance=new w.Jconfirm(pluginOptions);w.jconfirm.instances.push(instance);return instance;};w.Jconfirm=function(options){$.extend(this,options);this._init();};w.Jconfirm.prototype={_init:function(){var that=this;if(!w.jconfirm.instances.length){w.jconfirm.lastFocused=$("body").find(":focus");}this._id=Math.round(Math.random()*99999);this.contentParsed=$(document.createElement("div"));if(!this.lazyOpen){setTimeout(function(){that.open();},0);}},_buildHTML:function(){var that=this;this._parseAnimation(this.animation,"o");this._parseAnimation(this.closeAnimation,"c");this._parseBgDismissAnimation(this.backgroundDismissAnimation);this._parseColumnClass(this.columnClass);this._parseTheme(this.theme);this._parseType(this.type);var template=$(this.template);template.find(".jconfirm-box").addClass(this.animationParsed).addClass(this.backgroundDismissAnimationParsed).addClass(this.typeParsed);if(this.typeAnimated){template.find(".jconfirm-box").addClass("jconfirm-type-animated");}if(this.useBootstrap){template.find(".jc-bs3-row").addClass(this.bootstrapClasses.row);template.find(".jc-bs3-row").addClass("justify-content-md-center justify-content-sm-center justify-content-xs-center justify-content-lg-center");template.find(".jconfirm-box-container").addClass(this.columnClassParsed);if(this.containerFluid){template.find(".jc-bs3-container").addClass(this.bootstrapClasses.containerFluid);}else{template.find(".jc-bs3-container").addClass(this.bootstrapClasses.container);}}else{template.find(".jconfirm-box").css("width",this.boxWidth);}if(this.titleClass){template.find(".jconfirm-title-c").addClass(this.titleClass);}template.addClass(this.themeParsed);var ariaLabel="jconfirm-box"+this._id;template.find(".jconfirm-box").attr("aria-labelledby",ariaLabel).attr("tabindex",-1);template.find(".jconfirm-content").attr("id",ariaLabel);if(this.bgOpacity!==null){template.find(".jconfirm-bg").css("opacity",this.bgOpacity);}if(this.rtl){template.addClass("jconfirm-rtl");}this.$el=template.appendTo(this.container);this.$jconfirmBoxContainer=this.$el.find(".jconfirm-box-container");this.$jconfirmBox=this.$body=this.$el.find(".jconfirm-box");this.$jconfirmBg=this.$el.find(".jconfirm-bg");this.$title=this.$el.find(".jconfirm-title");this.$titleContainer=this.$el.find(".jconfirm-title-c");this.$content=this.$el.find("div.jconfirm-content");this.$contentPane=this.$el.find(".jconfirm-content-pane");this.$icon=this.$el.find(".jconfirm-icon-c");this.$closeIcon=this.$el.find(".jconfirm-closeIcon");this.$holder=this.$el.find(".jconfirm-holder");this.$btnc=this.$el.find(".jconfirm-buttons");this.$scrollPane=this.$el.find(".jconfirm-scrollpane");that.setStartingPoint();this._contentReady=$.Deferred();this._modalReady=$.Deferred();this.$holder.css({"padding-top":this.offsetTop,"padding-bottom":this.offsetBottom,});this.setTitle();this.setIcon();this._setButtons();this._parseContent();this.initDraggable();if(this.isAjax){this.showLoading(false);}$.when(this._contentReady,this._modalReady).then(function(){if(that.isAjaxLoading){setTimeout(function(){that.isAjaxLoading=false;that.setContent();that.setTitle();that.setIcon();setTimeout(function(){that.hideLoading(false);that._updateContentMaxHeight();},100);if(typeof that.onContentReady==="function"){that.onContentReady();}},50);}else{that._updateContentMaxHeight();that.setTitle();that.setIcon();if(typeof that.onContentReady==="function"){that.onContentReady();}}if(that.autoClose){that._startCountDown();}}).then(function(){that._watchContent();});if(this.animation==="none"){this.animationSpeed=1;this.animationBounce=1;}this.$body.css(this._getCSS(this.animationSpeed,this.animationBounce));this.$contentPane.css(this._getCSS(this.animationSpeed,1));this.$jconfirmBg.css(this._getCSS(this.animationSpeed,1));this.$jconfirmBoxContainer.css(this._getCSS(this.animationSpeed,1));},_typePrefix:"jconfirm-type-",typeParsed:"",_parseType:function(type){this.typeParsed=this._typePrefix+type;},setType:function(type){var oldClass=this.typeParsed;this._parseType(type);this.$jconfirmBox.removeClass(oldClass).addClass(this.typeParsed);},themeParsed:"",_themePrefix:"jconfirm-",setTheme:function(theme){var previous=this.theme;this.theme=theme||this.theme;this._parseTheme(this.theme);if(previous){this.$el.removeClass(previous);}this.$el.addClass(this.themeParsed);this.theme=theme;},_parseTheme:function(theme){var that=this;theme=theme.split(",");$.each(theme,function(k,a){if(a.indexOf(that._themePrefix)===-1){theme[k]=that._themePrefix+$.trim(a);}});this.themeParsed=theme.join(" ").toLowerCase();},backgroundDismissAnimationParsed:"",_bgDismissPrefix:"jconfirm-hilight-",_parseBgDismissAnimation:function(bgDismissAnimation){var animation=bgDismissAnimation.split(",");var that=this;$.each(animation,function(k,a){if(a.indexOf(that._bgDismissPrefix)===-1){animation[k]=that._bgDismissPrefix+$.trim(a);}});this.backgroundDismissAnimationParsed=animation.join(" ").toLowerCase();},animationParsed:"",closeAnimationParsed:"",_animationPrefix:"jconfirm-animation-",setAnimation:function(animation){this.animation=animation||this.animation;this._parseAnimation(this.animation,"o");},_parseAnimation:function(animation,which){which=which||"o";var animations=animation.split(",");var that=this;$.each(animations,function(k,a){if(a.indexOf(that._animationPrefix)===-1){animations[k]=that._animationPrefix+$.trim(a);}});var a_string=animations.join(" ").toLowerCase();if(which==="o"){this.animationParsed=a_string;}else{this.closeAnimationParsed=a_string;}return a_string;},setCloseAnimation:function(closeAnimation){this.closeAnimation=closeAnimation||this.closeAnimation;this._parseAnimation(this.closeAnimation,"c");},setAnimationSpeed:function(speed){this.animationSpeed=speed||this.animationSpeed;},columnClassParsed:"",setColumnClass:function(colClass){if(!this.useBootstrap){console.warn("cannot set columnClass, useBootstrap is set to false");return;}this.columnClass=colClass||this.columnClass;this._parseColumnClass(this.columnClass);this.$jconfirmBoxContainer.addClass(this.columnClassParsed);},_updateContentMaxHeight:function(){var height=$(window).height()-(this.$jconfirmBox.outerHeight()-this.$contentPane.outerHeight())-(this.offsetTop+this.offsetBottom);this.$contentPane.css({"max-height":height+"px"});},setBoxWidth:function(width){if(this.useBootstrap){console.warn("cannot set boxWidth, useBootstrap is set to true");return;}this.boxWidth=width;this.$jconfirmBox.css("width",width);},_parseColumnClass:function(colClass){colClass=colClass.toLowerCase();var p;switch(colClass){case"xl":case"xlarge":p="col-md-12";break;case"l":case"large":p="col-md-8 col-md-offset-2";break;case"m":case"medium":p="col-md-6 col-md-offset-3";break;case"s":case"small":p="col-md-4 col-md-offset-4";break;case"xs":case"xsmall":p="col-md-2 col-md-offset-5";break;default:p=colClass;}this.columnClassParsed=p;},initDraggable:function(){var that=this;var $t=this.$titleContainer;this.resetDrag();if(this.draggable){$t.on("mousedown",function(e){$t.addClass("jconfirm-hand");that.mouseX=e.clientX;that.mouseY=e.clientY;that.isDrag=true;});$(window).on("mousemove."+this._id,function(e){if(that.isDrag){that.movingX=e.clientX-that.mouseX+that.initialX;that.movingY=e.clientY-that.mouseY+that.initialY;that.setDrag();}});$(window).on("mouseup."+this._id,function(){$t.removeClass("jconfirm-hand");if(that.isDrag){that.isDrag=false;that.initialX=that.movingX;that.initialY=that.movingY;}});}},resetDrag:function(){this.isDrag=false;this.initialX=0;this.initialY=0;this.movingX=0;this.movingY=0;this.mouseX=0;this.mouseY=0;this.$jconfirmBoxContainer.css("transform","translate("+0+"px, "+0+"px)");},setDrag:function(){if(!this.draggable){return;}this.alignMiddle=false;var boxWidth=this.$jconfirmBox.outerWidth();var boxHeight=this.$jconfirmBox.outerHeight();var windowWidth=$(window).width();var windowHeight=$(window).height();var that=this;var dragUpdate=1;if(that.movingX%dragUpdate===0||that.movingY%dragUpdate===0){if(that.dragWindowBorder){var leftDistance=(windowWidth/2)-boxWidth/2;var topDistance=(windowHeight/2)-boxHeight/2;topDistance-=that.dragWindowGap;leftDistance-=that.dragWindowGap;if(leftDistance+that.movingX<0){that.movingX=-leftDistance;}else{if(leftDistance-that.movingX<0){that.movingX=leftDistance;}}if(topDistance+that.movingY<0){that.movingY=-topDistance;}else{if(topDistance-that.movingY<0){that.movingY=topDistance;}}}that.$jconfirmBoxContainer.css("transform","translate("+that.movingX+"px, "+that.movingY+"px)");}},_scrollTop:function(){if(typeof pageYOffset!=="undefined"){return pageYOffset;}else{var B=document.body;var D=document.documentElement;D=(D.clientHeight)?D:B;return D.scrollTop;}},_watchContent:function(){var that=this;if(this._timer){clearInterval(this._timer);}var prevContentHeight=0;this._timer=setInterval(function(){if(that.smoothContent){var contentHeight=that.$content.outerHeight()||0;if(contentHeight!==prevContentHeight){prevContentHeight=contentHeight;}var wh=$(window).height();var total=that.offsetTop+that.offsetBottom+that.$jconfirmBox.height()-that.$contentPane.height()+that.$content.height();if(total<wh){that.$contentPane.addClass("no-scroll");}else{that.$contentPane.removeClass("no-scroll");}}},this.watchInterval);},_overflowClass:"jconfirm-overflow",_hilightAnimating:false,highlight:function(){this.hiLightModal();},hiLightModal:function(){var that=this;if(this._hilightAnimating){return;}that.$body.addClass("hilight");var duration=parseFloat(that.$body.css("animation-duration"))||2;this._hilightAnimating=true;setTimeout(function(){that._hilightAnimating=false;that.$body.removeClass("hilight");},duration*1000);},_bindEvents:function(){var that=this;this.boxClicked=false;this.$scrollPane.click(function(e){if(!that.boxClicked){var buttonName=false;var shouldClose=false;var str;if(typeof that.backgroundDismiss==="function"){str=that.backgroundDismiss();}else{str=that.backgroundDismiss;}if(typeof str==="string"&&typeof that.buttons[str]!=="undefined"){buttonName=str;shouldClose=false;}else{if(typeof str==="undefined"||!!(str)===true){shouldClose=true;}else{shouldClose=false;}}if(buttonName){var btnResponse=that.buttons[buttonName].action.apply(that);shouldClose=(typeof btnResponse==="undefined")||!!(btnResponse);}if(shouldClose){that.close();}else{that.hiLightModal();}}that.boxClicked=false;});this.$jconfirmBox.click(function(e){that.boxClicked=true;});var isKeyDown=false;$(window).on("jcKeyDown."+that._id,function(e){if(!isKeyDown){isKeyDown=true;}});$(window).on("keyup."+that._id,function(e){if(isKeyDown){that.reactOnKey(e);isKeyDown=false;}});$(window).on("resize."+this._id,function(){that._updateContentMaxHeight();setTimeout(function(){that.resetDrag();},100);});},_cubic_bezier:"0.36, 0.55, 0.19",_getCSS:function(speed,bounce){return{"-webkit-transition-duration":speed/1000+"s","transition-duration":speed/1000+"s","-webkit-transition-timing-function":"cubic-bezier("+this._cubic_bezier+", "+bounce+")","transition-timing-function":"cubic-bezier("+this._cubic_bezier+", "+bounce+")"};},_setButtons:function(){var that=this;var total_buttons=0;if(typeof this.buttons!=="object"){this.buttons={};}$.each(this.buttons,function(key,button){total_buttons+=1;if(typeof button==="function"){that.buttons[key]=button={action:button};}that.buttons[key].text=button.text||key;that.buttons[key].btnClass=button.btnClass||"btn-default";that.buttons[key].action=button.action||function(){};that.buttons[key].keys=button.keys||[];that.buttons[key].isHidden=button.isHidden||false;that.buttons[key].isDisabled=button.isDisabled||false;$.each(that.buttons[key].keys,function(i,a){that.buttons[key].keys[i]=a.toLowerCase();});var button_element=$('<button type="button" class="btn"></button>').html(that.buttons[key].text).addClass(that.buttons[key].btnClass).prop("disabled",that.buttons[key].isDisabled).css("display",that.buttons[key].isHidden?"none":"").click(function(e){e.preventDefault();var res=that.buttons[key].action.apply(that,[that.buttons[key]]);that.onAction.apply(that,[key,that.buttons[key]]);that._stopCountDown();if(typeof res==="undefined"||res){that.close();}});that.buttons[key].el=button_element;that.buttons[key].setText=function(text){button_element.html(text);};that.buttons[key].addClass=function(className){button_element.addClass(className);};that.buttons[key].removeClass=function(className){button_element.removeClass(className);};that.buttons[key].disable=function(){that.buttons[key].isDisabled=true;button_element.prop("disabled",true);};that.buttons[key].enable=function(){that.buttons[key].isDisabled=false;button_element.prop("disabled",false);};that.buttons[key].show=function(){that.buttons[key].isHidden=false;button_element.css("display","");};that.buttons[key].hide=function(){that.buttons[key].isHidden=true;button_element.css("display","none");};that["$_"+key]=that["$$"+key]=button_element;that.$btnc.append(button_element);});if(total_buttons===0){this.$btnc.hide();}if(this.closeIcon===null&&total_buttons===0){this.closeIcon=true;}if(this.closeIcon){if(this.closeIconClass){var closeHtml='<i class="'+this.closeIconClass+'"></i>';this.$closeIcon.html(closeHtml);}this.$closeIcon.click(function(e){e.preventDefault();var buttonName=false;var shouldClose=false;var str;if(typeof that.closeIcon==="function"){str=that.closeIcon();}else{str=that.closeIcon;}if(typeof str==="string"&&typeof that.buttons[str]!=="undefined"){buttonName=str;shouldClose=false;}else{if(typeof str==="undefined"||!!(str)===true){shouldClose=true;}else{shouldClose=false;}}if(buttonName){var btnResponse=that.buttons[buttonName].action.apply(that);shouldClose=(typeof btnResponse==="undefined")||!!(btnResponse);}if(shouldClose){that.close();}});this.$closeIcon.show();}else{this.$closeIcon.hide();}},setTitle:function(string,force){force=force||false;if(typeof string!=="undefined"){if(typeof string==="string"){this.title=string;}else{if(typeof string==="function"){if(typeof string.promise==="function"){console.error("Promise was returned from title function, this is not supported.");}var response=string();if(typeof response==="string"){this.title=response;}else{this.title=false;}}else{this.title=false;}}}if(this.isAjaxLoading&&!force){return;}this.$title.html(this.title||"");this.updateTitleContainer();},setIcon:function(iconClass,force){force=force||false;if(typeof iconClass!=="undefined"){if(typeof iconClass==="string"){this.icon=iconClass;}else{if(typeof iconClass==="function"){var response=iconClass();if(typeof response==="string"){this.icon=response;}else{this.icon=false;}}else{this.icon=false;}}}if(this.isAjaxLoading&&!force){return;}this.$icon.html(this.icon?'<i class="'+this.icon+'"></i>':"");this.updateTitleContainer();},updateTitleContainer:function(){if(!this.title&&!this.icon){this.$titleContainer.hide();}else{this.$titleContainer.show();}},setContentPrepend:function(content,force){if(!content){return;}this.contentParsed.prepend(content);},setContentAppend:function(content){if(!content){return;}this.contentParsed.append(content);},setContent:function(content,force){force=!!force;var that=this;if(content){this.contentParsed.html("").append(content);}if(this.isAjaxLoading&&!force){return;}this.$content.html("");this.$content.append(this.contentParsed);setTimeout(function(){that.$body.find("input[autofocus]:visible:first").focus();},100);},loadingSpinner:false,showLoading:function(disableButtons){this.loadingSpinner=true;this.$jconfirmBox.addClass("loading");if(disableButtons){this.$btnc.find("button").prop("disabled",true);}},hideLoading:function(enableButtons){this.loadingSpinner=false;this.$jconfirmBox.removeClass("loading");if(enableButtons){this.$btnc.find("button").prop("disabled",false);}},ajaxResponse:false,contentParsed:"",isAjax:false,isAjaxLoading:false,_parseContent:function(){var that=this;var e="&nbsp;";if(typeof this.content==="function"){var res=this.content.apply(this);if(typeof res==="string"){this.content=res;}else{if(typeof res==="object"&&typeof res.always==="function"){this.isAjax=true;this.isAjaxLoading=true;res.always(function(data,status,xhr){that.ajaxResponse={data:data,status:status,xhr:xhr};that._contentReady.resolve(data,status,xhr);if(typeof that.contentLoaded==="function"){that.contentLoaded(data,status,xhr);}});this.content=e;}else{this.content=e;}}}if(typeof this.content==="string"&&this.content.substr(0,4).toLowerCase()==="url:"){this.isAjax=true;this.isAjaxLoading=true;var u=this.content.substring(4,this.content.length);$.get(u).done(function(html){that.contentParsed.html(html);}).always(function(data,status,xhr){that.ajaxResponse={data:data,status:status,xhr:xhr};that._contentReady.resolve(data,status,xhr);if(typeof that.contentLoaded==="function"){that.contentLoaded(data,status,xhr);}});}if(!this.content){this.content=e;}if(!this.isAjax){this.contentParsed.html(this.content);this.setContent();that._contentReady.resolve();}},_stopCountDown:function(){clearInterval(this.autoCloseInterval);if(this.$cd){this.$cd.remove();}},_startCountDown:function(){var that=this;var opt=this.autoClose.split("|");if(opt.length!==2){console.error("Invalid option for autoClose. example 'close|10000'");return false;}var button_key=opt[0];var time=parseInt(opt[1]);if(typeof this.buttons[button_key]==="undefined"){console.error("Invalid button key '"+button_key+"' for autoClose");return false;}var seconds=Math.ceil(time/1000);this.$cd=$('<span class="countdown"> ('+seconds+")</span>").appendTo(this["$_"+button_key]);this.autoCloseInterval=setInterval(function(){that.$cd.html(" ("+(seconds-=1)+") ");if(seconds<=0){that["$$"+button_key].trigger("click");that._stopCountDown();}},1000);},_getKey:function(key){switch(key){case 192:return"tilde";case 13:return"enter";case 16:return"shift";case 9:return"tab";case 20:return"capslock";case 17:return"ctrl";case 91:return"win";case 18:return"alt";case 27:return"esc";case 32:return"space";}var initial=String.fromCharCode(key);if(/^[A-z0-9]+$/.test(initial)){return initial.toLowerCase();}else{return false;}},reactOnKey:function(e){var that=this;var a=$(".jconfirm");if(a.eq(a.length-1)[0]!==this.$el[0]){return false;}var key=e.which;if(this.$content.find(":input").is(":focus")&&/13|32/.test(key)){return false;}var keyChar=this._getKey(key);if(keyChar==="esc"&&this.escapeKey){if(this.escapeKey===true){this.$scrollPane.trigger("click");}else{if(typeof this.escapeKey==="string"||typeof this.escapeKey==="function"){var buttonKey;if(typeof this.escapeKey==="function"){buttonKey=this.escapeKey();}else{buttonKey=this.escapeKey;}if(buttonKey){if(typeof this.buttons[buttonKey]==="undefined"){console.warn("Invalid escapeKey, no buttons found with key "+buttonKey);}else{this["$_"+buttonKey].trigger("click");}}}}}$.each(this.buttons,function(key,button){if(button.keys.indexOf(keyChar)!==-1){that["$_"+key].trigger("click");}});},setDialogCenter:function(){console.info("setDialogCenter is deprecated, dialogs are centered with CSS3 tables");},_unwatchContent:function(){clearInterval(this._timer);},close:function(onClosePayload){var that=this;if(typeof this.onClose==="function"){this.onClose(onClosePayload);}this._unwatchContent();$(window).unbind("resize."+this._id);$(window).unbind("keyup."+this._id);$(window).unbind("jcKeyDown."+this._id);if(this.draggable){$(window).unbind("mousemove."+this._id);$(window).unbind("mouseup."+this._id);this.$titleContainer.unbind("mousedown");}that.$el.removeClass(that.loadedClass);$("body").removeClass("jconfirm-no-scroll-"+that._id);that.$jconfirmBoxContainer.removeClass("jconfirm-no-transition");setTimeout(function(){that.$body.addClass(that.closeAnimationParsed);that.$jconfirmBg.addClass("jconfirm-bg-h");var closeTimer=(that.closeAnimation==="none")?1:that.animationSpeed;setTimeout(function(){that.$el.remove();var l=w.jconfirm.instances;var i=w.jconfirm.instances.length-1;for(i;i>=0;i--){if(w.jconfirm.instances[i]._id===that._id){w.jconfirm.instances.splice(i,1);}}if(!w.jconfirm.instances.length){if(that.scrollToPreviousElement&&w.jconfirm.lastFocused&&w.jconfirm.lastFocused.length&&$.contains(document,w.jconfirm.lastFocused[0])){var $lf=w.jconfirm.lastFocused;if(that.scrollToPreviousElementAnimate){var st=$(window).scrollTop();var ot=w.jconfirm.lastFocused.offset().top;var wh=$(window).height();if(!(ot>st&&ot<(st+wh))){var scrollTo=(ot-Math.round((wh/3)));$("html, body").animate({scrollTop:scrollTo},that.animationSpeed,"swing",function(){$lf.focus();});}else{$lf.focus();}}else{$lf.focus();}w.jconfirm.lastFocused=false;}}if(typeof that.onDestroy==="function"){that.onDestroy();}},closeTimer*0.4);},50);return true;},open:function(){if(this.isOpen()){return false;}this._buildHTML();this._bindEvents();this._open();return true;},setStartingPoint:function(){var el=false;if(this.animateFromElement!==true&&this.animateFromElement){el=this.animateFromElement;w.jconfirm.lastClicked=false;}else{if(w.jconfirm.lastClicked&&this.animateFromElement===true){el=w.jconfirm.lastClicked;w.jconfirm.lastClicked=false;}else{return false;}}if(!el){return false;}var offset=el.offset();var iTop=el.outerHeight()/2;var iLeft=el.outerWidth()/2;iTop-=this.$jconfirmBox.outerHeight()/2;iLeft-=this.$jconfirmBox.outerWidth()/2;var sourceTop=offset.top+iTop;sourceTop=sourceTop-this._scrollTop();var sourceLeft=offset.left+iLeft;var wh=$(window).height()/2;var ww=$(window).width()/2;var targetH=wh-this.$jconfirmBox.outerHeight()/2;var targetW=ww-this.$jconfirmBox.outerWidth()/2;sourceTop-=targetH;sourceLeft-=targetW;if(Math.abs(sourceTop)>wh||Math.abs(sourceLeft)>ww){return false;}this.$jconfirmBoxContainer.css("transform","translate("+sourceLeft+"px, "+sourceTop+"px)");},_open:function(){var that=this;if(typeof that.onOpenBefore==="function"){that.onOpenBefore();}this.$body.removeClass(this.animationParsed);this.$jconfirmBg.removeClass("jconfirm-bg-h");this.$body.focus();that.$jconfirmBoxContainer.css("transform","translate("+0+"px, "+0+"px)");setTimeout(function(){that.$body.css(that._getCSS(that.animationSpeed,1));that.$body.css({"transition-property":that.$body.css("transition-property")+", margin"});that.$jconfirmBoxContainer.addClass("jconfirm-no-transition");that._modalReady.resolve();if(typeof that.onOpen==="function"){that.onOpen();}that.$el.addClass(that.loadedClass);},this.animationSpeed);},loadedClass:"jconfirm-open",isClosed:function(){return !this.$el||this.$el.parent().length===0;},isOpen:function(){return !this.isClosed();},toggle:function(){if(!this.isOpen()){this.open();}else{this.close();}}};w.jconfirm.instances=[];w.jconfirm.lastFocused=false;w.jconfirm.pluginDefaults={template:'<div class="jconfirm"><div class="jconfirm-bg jconfirm-bg-h"></div><div class="jconfirm-scrollpane"><div class="jconfirm-row"><div class="jconfirm-cell"><div class="jconfirm-holder"><div class="jc-bs3-container"><div class="jc-bs3-row"><div class="jconfirm-box-container jconfirm-animated"><div class="jconfirm-box" role="dialog" aria-labelledby="labelled" tabindex="-1"><div class="jconfirm-closeIcon">&times;</div><div class="jconfirm-title-c"><span class="jconfirm-icon-c"></span><span class="jconfirm-title"></span></div><div class="jconfirm-content-pane"><div class="jconfirm-content"></div></div><div class="jconfirm-buttons"></div><div class="jconfirm-clear"></div></div></div></div></div></div></div></div></div></div>',title:"Hello",titleClass:"",type:"default",typeAnimated:true,draggable:true,dragWindowGap:15,dragWindowBorder:true,animateFromElement:true,alignMiddle:true,smoothContent:true,content:"Are you sure to continue?",buttons:{},defaultButtons:{ok:{action:function(){}},close:{action:function(){}}},contentLoaded:function(){},icon:"",lazyOpen:false,bgOpacity:null,theme:"light",animation:"scale",closeAnimation:"scale",animationSpeed:400,animationBounce:1,escapeKey:true,rtl:false,container:"body",containerFluid:false,backgroundDismiss:false,backgroundDismissAnimation:"shake",autoClose:false,closeIcon:null,closeIconClass:false,watchInterval:100,columnClass:"col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1",boxWidth:"50%",scrollToPreviousElement:true,scrollToPreviousElementAnimate:true,useBootstrap:true,offsetTop:40,offsetBottom:40,bootstrapClasses:{container:"container",containerFluid:"container-fluid",row:"row"},onContentReady:function(){},onOpenBefore:function(){},onOpen:function(){},onClose:function(){},onDestroy:function(){},onAction:function(){}};var keyDown=false;$(window).on("keydown",function(e){if(!keyDown){var $target=$(e.target);var pass=false;if($target.closest(".jconfirm-box").length){pass=true;}if(pass){$(window).trigger("jcKeyDown");}keyDown=true;}});$(window).on("keyup",function(){keyDown=false;});w.jconfirm.lastClicked=false;$(document).on("mousedown","button, a, [jc-source]",function(){w.jconfirm.lastClicked=$(this);});}));



const ease = {
    exponentialIn: (t) => {
        return t == 0.0 ? t : Math.pow(2.0, 10.0 * (t - 1.0));
    },
    exponentialOut: (t) => {
        return t == 1.0 ? t : 1.0 - Math.pow(2.0, -10.0 * t);
    },
    exponentialInOut: (t) => {
        return t == 0.0 || t == 1.0
        ? t
        : t < 0.5
        ? +0.5 * Math.pow(2.0, (20.0 * t) - 10.0)
        : -0.5 * Math.pow(2.0, 10.0 - (t * 20.0)) + 1.0;
    },
    sineOut: (t) => {
        const HALF_PI = 1.5707963267948966;
        return Math.sin(t * HALF_PI);
    },
    circularInOut: (t) => {
        return t < 0.5
        ? 0.5 * (1.0 - Math.sqrt(1.0 - 4.0 * t * t))
        : 0.5 * (Math.sqrt((3.0 - 2.0 * t) * (2.0 * t - 1.0)) + 1.0);
    },
    cubicIn: (t) => {
        return t * t * t;
    },
    cubicOut: (t) => {
        const f = t - 1.0;
        return f * f * f + 1.0;
    },
    cubicInOut: (t) => {
        return t < 0.5
        ? 4.0 * t * t * t
        : 0.5 * Math.pow(2.0 * t - 2.0, 3.0) + 1.0;
    },
    quadraticOut: (t) => {
        return -t * (t - 2.0);
    },
    quarticOut: (t) => {
        return Math.pow(t - 1.0, 3.0) * (1.0 - t) + 1.0;
    },
}



class ShapeOverlays {
    constructor(elm) {
        if(!elm)return;
        this.elm = elm;
        this.path = elm.querySelectorAll('path');
        this.numPoints = 10;
        this.duration = 700;
        this.delayPointsArray = [];
        this.delayPointsMax = 300;
        this.delayPerPath = 250;
        this.timeStart = Date.now();
        this.isOpened = false;
        this.isAnimating = false;
        this.type = "pix-overlay-6";
        // if($('body').attr('pix-overlay')){
        // if(document.getElementsByTagName('body')[0].getAttribute('data-pix-overlay')){
        //     this.type = document.getElementsByTagName('body')[0].getAttribute('data-pix-overlay');
        // }
        if(pixfort_main_object != 'undefined' || pixfort_main_object != undefined){
            if(pixfort_main_object.hasOwnProperty('dataPixOverlay')){
                this.type = pixfort_main_object.dataPixOverlay;
            }
        }


        if(this.type == "pix-overlay-1"){
            this.numPoints = 18;
            this.duration = 500;
            this.delayPointsMax = 300;
            this.delayPerPath = 100;
        }
        if(this.type == "pix-overlay-2"){
            this.numPoints = 4;
            this.duration = 600;
            this.delayPointsMax = 180;
            this.delayPerPath = 70;
        }
        if(this.type == "pix-overlay-3"){
            this.numPoints = 2;
            this.duration = 500;
            this.delayPointsMax = 0;
            this.delayPerPath = 200;
        }
        if(this.type == "pix-overlay-4"){
            this.numPoints = 4;
            this.duration = 900;
            this.delayPointsMax = 0;
            this.delayPerPath = 60;
        }
        if(this.type == "pix-overlay-5"){
            this.numPoints = 85;
            this.duration = 400;
            this.delayPointsMax = 300;
            this.delayPerPath = 150;
        }
    }
    toggle() {
        this.isAnimating = true;

        if(this.type == "pix-overlay-1"){
            const range = 4 * Math.random() + 6;
            for (var i = 0; i < this.numPoints; i++) {
                const radian = i / (this.numPoints - 1) * Math.PI;
                this.delayPointsArray[i] = (Math.sin(-radian) + Math.sin(-radian * range) + 2) / 4 * this.delayPointsMax;
            }

        }

        if(this.type == "pix-overlay-2"){
            const range = Math.random() * Math.PI * 2;
            for (var i = 0; i < this.numPoints; i++) {
                const radian = (i / (this.numPoints - 1)) * Math.PI * 2;
                this.delayPointsArray[i] = (Math.sin(radian + range) + 1) / 2 * this.delayPointsMax;
            }
        }

        if(this.type == "pix-overlay-3" || this.type == "pix-overlay-4"){
            for (var i = 0; i < this.numPoints; i++) {
                this.delayPointsArray[i] = 0;
            }
        }

        if(this.type == "pix-overlay-5" || this.type == "pix-overlay-6"){
            for (var i = 0; i < this.numPoints; i++) {
                this.delayPointsArray[i] = Math.random() * this.delayPointsMax;
            }
        }


        if (this.isOpened === false) {
            this.open();
        } else {
            this.close();
        }
    }
    open() {
        this.isOpened = true;
        this.elm.classList.add('is-opened');
        this.timeStart = Date.now();
        this.renderLoop();
    }
    close() {
        this.isOpened = false;
        this.elm.classList.remove('is-opened');
        this.timeStart = Date.now();
        this.renderLoop();
    }
    updatePath(time) {
        const points = [];
        let str = '';

        if(this.type == "pix-overlay-1" || this.type == "pix-overlay-2"){
            for (var i = 0; i < this.numPoints + 1; i++) {
                points[i] = ease.cubicInOut(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1)) * 100
            }

            str += (this.isOpened) ? `M 0 0 V ${points[0]} ` : `M 0 ${points[0]} `;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${cp} ${points[i]} ${cp} ${points[i + 1]} ${p} ${points[i + 1]} `;
            }
            str += (this.isOpened) ? `V 0 H 0` : `V 100 H 0`;
        }

        if(this.type == "pix-overlay-3"){
            for (var i = 0; i < this.numPoints; i++) {
                const thisEase = this.isOpened ?
                (i == 1) ? ease.cubicOut : ease.cubicInOut:
                (i == 1) ? ease.cubicInOut : ease.cubicOut;
                points[i] = thisEase(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1)) * 100
            }

            str += (this.isOpened) ? `M 0 0 V ${points[0]} ` : `M 0 ${points[0]} `;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${cp} ${points[i]} ${cp} ${points[i + 1]} ${p} ${points[i + 1]} `;
            }
            str += (this.isOpened) ? `V 0 H 0` : `V 100 H 0`;
        }

        if(this.type == "pix-overlay-4"){
            for (var i = 0; i < this.numPoints; i++) {
                const thisEase = (i % 2 === 1) ? ease.sineOut : ease.exponentialInOut;
                points[i] = (1 - thisEase(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1))) * 100
            }

            str += (this.isOpened) ? `M 0 0 H ${points[0]}` : `M ${points[0]} 0`;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${points[i]} ${cp} ${points[i + 1]} ${cp} ${points[i + 1]} ${p} `;
            }
            str += (this.isOpened) ? `H 100 V 0` : `H 0 V 0`;
        }

        if(this.type == "pix-overlay-5"){
            for (var i = 0; i < this.numPoints; i++) {
                points[i] = (1 - ease.cubicInOut(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1))) * 100
            }

            str += (this.isOpened) ? `M 0 0 H ${points[0]}` : `M ${points[0]} 0`;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${points[i]} ${cp} ${points[i + 1]} ${cp} ${points[i + 1]} ${p} `;
            }
            str += (this.isOpened) ? `H 100 V 0` : `H 0 V 0`;
        }

        if(this.type == "pix-overlay-6"){
            for (var i = 0; i < this.numPoints; i++) {
                points[i] = (1 - ease.cubicInOut(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1))) * 100
            }

            str += (this.isOpened) ? `M 0 0 V ${points[0]}` : `M 0 ${points[0]} `;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${cp} ${points[i]} ${cp} ${points[i + 1]} ${p} ${points[i + 1]} `;
            }
            str += (this.isOpened) ? `V 100 H 0` : `V 0 H 0`;
        }
        return str;


    }
    render() {
        if (this.isOpened) {
            for (var i = 0; i < this.path.length; i++) {
                this.path[i].setAttribute('d', this.updatePath(Date.now() - (this.timeStart + this.delayPerPath * i)));
            }
        } else {
            for (var i = 0; i < this.path.length; i++) {
                this.path[i].setAttribute('d', this.updatePath(Date.now() - (this.timeStart + this.delayPerPath * (this.path.length - i - 1))));
            }
        }
    }
    renderLoop() {
        this.render();
        if (Date.now() - this.timeStart < this.duration + this.delayPerPath * (this.path.length - 1) + this.delayPointsMax) {
            requestAnimationFrame(() => {
                this.renderLoop();
            });
        }
        else {
            this.isAnimating = false;
        }
    }
}







class dividerShapes {
  constructor(elm) {
    this.elm = elm;
    this.path = elm.querySelectorAll('path');
    this.numPoints = 3;
    this.speed = 0.4;
    this.paths = [];
    this.pointsDir = [];
    this.pathsDir = [];
    this.min = 20;
    this.max = 80;
  }
  initPoints() {
      for (var i = 0; i < this.path.length; i++) {
          let points = [];
          let pointsDir = [];
          var rand = this.getRndInteger(this.min+1, this.max-1);
          const range = Math.random() * Math.PI * 2;
          for (var j = 0; j < this.numPoints; j++) {
            pointsDir[j] = this.getRndInteger(0, 1);

            const radian = (j / (this.numPoints - 1)) * Math.PI * 2;
            points[j] = ((Math.sin(radian + range) + 1) / 2)*100 ;

          }
          this.paths[i] = points;
          this.pathsDir[i] = pointsDir;
      }
      for (var j = 0; j < this.path.length; j++) {
          let str = '';
          str +=  `M 0 ${this.paths[j][0]} `;
          for (var i = 0; i < this.numPoints - 1; i++) {
            const p = (i + 1) / (this.numPoints - 1) * 100;
            const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
            str += `C ${cp} ${this.paths[j][i]} ${cp} ${this.paths[j][i + 1]} ${p} ${this.paths[j][i + 1]} `;
          }
          str += `V 100 H 0`;
          this.path[j].setAttribute('d', str);
      }
      // if(window.innerWidth>600){
          this.loop();
      // }
  }
  loop(){
      var self = this;
      setTimeout(function () {
          if(window.isInViewport(self.elm)){
              for (var j = 0; j < self.path.length; j++) {
                  for (var i = 0; i < self.numPoints; i++) {
                      var teta = self.getRndInteger(0, 40)/100; ;
                      if(self.pathsDir[j][i]>0){
                          self.paths[j][i]+= Math.abs(Math.sin( ((self.paths[j][i]-self.min)/(self.max-self.min))*Math.PI ))*self.speed+teta;
                          if(self.paths[j][i]>=(j==0 ? self.max-10 : self.max) ){
                              self.pathsDir[j][i]=0;
                          }
                      }else{
                          self.paths[j][i]-= Math.abs(Math.sin( ((self.max-self.paths[j][i]-self.min)/(self.max-self.min))*Math.PI ))*self.speed+teta;
                          if(self.paths[j][i]<=self.min){
                              self.pathsDir[j][i]=1;
                          }
                      }
                  }
                  let str = '';
                  str +=  `M 0 ${self.paths[j][0]} `;
                  for (var i = 0; i < self.numPoints - 1; i++) {
                    const p = (i + 1) / (self.numPoints - 1) * 100;
                    const cp = p - (1 / (self.numPoints - 1) * 100) / 2;
                    str += ' ';
                    // str += `C ${cp} ${self.paths[j][i]} ${cp} ${self.paths[j][i + 1]} ${p} ${self.paths[j][i + 1]} `;
                    str += 'C '+cp+' '+self.paths[j][i]+' '+cp+' '+self.paths[j][i + 1]+' '+p+' '+self.paths[j][i + 1]+' ';
                  }
                  str += 'V 100 H 0';
                  self.path[j].setAttribute('d', str);
                  // self.path[j].setAttribute('d', str);
              }
          }

        self.loop();
    }, 40);
  }
  getRndInteger(min, max) {
      return Math.floor(Math.random() * (max - min) ) + min;
  }
}

!function(t){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=t();else if("function"==typeof define&&define.amd)define([],t);else{("undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this).Parallax=t()}}(function(){return function t(e,i,n){function o(r,a){if(!i[r]){if(!e[r]){var l="function"==typeof require&&require;if(!a&&l)return l(r,!0);if(s)return s(r,!0);var h=new Error("Cannot find module '"+r+"'");throw h.code="MODULE_NOT_FOUND",h}var u=i[r]={exports:{}};e[r][0].call(u.exports,function(t){var i=e[r][1][t];return o(i||t)},u,u.exports,t,e,i,n)}return i[r].exports}for(var s="function"==typeof require&&require,r=0;r<n.length;r++)o(n[r]);return o}({1:[function(t,e,i){"use strict";function n(t){if(null===t||void 0===t)throw new TypeError("Object.assign cannot be called with null or undefined");return Object(t)}var o=Object.getOwnPropertySymbols,s=Object.prototype.hasOwnProperty,r=Object.prototype.propertyIsEnumerable;e.exports=function(){try{if(!Object.assign)return!1;var t=new String("abc");if(t[5]="de","5"===Object.getOwnPropertyNames(t)[0])return!1;for(var e={},i=0;i<10;i++)e["_"+String.fromCharCode(i)]=i;if("0123456789"!==Object.getOwnPropertyNames(e).map(function(t){return e[t]}).join(""))return!1;var n={};return"abcdefghijklmnopqrst".split("").forEach(function(t){n[t]=t}),"abcdefghijklmnopqrst"===Object.keys(Object.assign({},n)).join("")}catch(t){return!1}}()?Object.assign:function(t,e){for(var i,a,l=n(t),h=1;h<arguments.length;h++){i=Object(arguments[h]);for(var u in i)s.call(i,u)&&(l[u]=i[u]);if(o){a=o(i);for(var c=0;c<a.length;c++)r.call(i,a[c])&&(l[a[c]]=i[a[c]])}}return l}},{}],2:[function(t,e,i){(function(t){(function(){var i,n,o,s,r,a;"undefined"!=typeof performance&&null!==performance&&performance.now?e.exports=function(){return performance.now()}:void 0!==t&&null!==t&&t.hrtime?(e.exports=function(){return(i()-r)/1e6},n=t.hrtime,s=(i=function(){var t;return 1e9*(t=n())[0]+t[1]})(),a=1e9*t.uptime(),r=s-a):Date.now?(e.exports=function(){return Date.now()-o},o=Date.now()):(e.exports=function(){return(new Date).getTime()-o},o=(new Date).getTime())}).call(this)}).call(this,t("_process"))},{_process:3}],3:[function(t,e,i){function n(){throw new Error("setTimeout has not been defined")}function o(){throw new Error("clearTimeout has not been defined")}function s(t){if(c===setTimeout)return setTimeout(t,0);if((c===n||!c)&&setTimeout)return c=setTimeout,setTimeout(t,0);try{return c(t,0)}catch(e){try{return c.call(null,t,0)}catch(e){return c.call(this,t,0)}}}function r(t){if(d===clearTimeout)return clearTimeout(t);if((d===o||!d)&&clearTimeout)return d=clearTimeout,clearTimeout(t);try{return d(t)}catch(e){try{return d.call(null,t)}catch(e){return d.call(this,t)}}}function a(){v&&p&&(v=!1,p.length?f=p.concat(f):y=-1,f.length&&l())}function l(){if(!v){var t=s(a);v=!0;for(var e=f.length;e;){for(p=f,f=[];++y<e;)p&&p[y].run();y=-1,e=f.length}p=null,v=!1,r(t)}}function h(t,e){this.fun=t,this.array=e}function u(){}var c,d,m=e.exports={};!function(){try{c="function"==typeof setTimeout?setTimeout:n}catch(t){c=n}try{d="function"==typeof clearTimeout?clearTimeout:o}catch(t){d=o}}();var p,f=[],v=!1,y=-1;m.nextTick=function(t){var e=new Array(arguments.length-1);if(arguments.length>1)for(var i=1;i<arguments.length;i++)e[i-1]=arguments[i];f.push(new h(t,e)),1!==f.length||v||s(l)},h.prototype.run=function(){this.fun.apply(null,this.array)},m.title="browser",m.browser=!0,m.env={},m.argv=[],m.version="",m.versions={},m.on=u,m.addListener=u,m.once=u,m.off=u,m.removeListener=u,m.removeAllListeners=u,m.emit=u,m.prependListener=u,m.prependOnceListener=u,m.listeners=function(t){return[]},m.binding=function(t){throw new Error("process.binding is not supported")},m.cwd=function(){return"/"},m.chdir=function(t){throw new Error("process.chdir is not supported")},m.umask=function(){return 0}},{}],4:[function(t,e,i){(function(i){for(var n=t("performance-now"),o="undefined"==typeof window?i:window,s=["moz","webkit"],r="AnimationFrame",a=o["request"+r],l=o["cancel"+r]||o["cancelRequest"+r],h=0;!a&&h<s.length;h++)a=o[s[h]+"Request"+r],l=o[s[h]+"Cancel"+r]||o[s[h]+"CancelRequest"+r];if(!a||!l){var u=0,c=0,d=[];a=function(t){if(0===d.length){var e=n(),i=Math.max(0,1e3/60-(e-u));u=i+e,setTimeout(function(){var t=d.slice(0);d.length=0;for(var e=0;e<t.length;e++)if(!t[e].cancelled)try{t[e].callback(u)}catch(t){setTimeout(function(){throw t},0)}},Math.round(i))}return d.push({handle:++c,callback:t,cancelled:!1}),c},l=function(t){for(var e=0;e<d.length;e++)d[e].handle===t&&(d[e].cancelled=!0)}}e.exports=function(t){return a.call(o,t)},e.exports.cancel=function(){l.apply(o,arguments)},e.exports.polyfill=function(){o.requestAnimationFrame=a,o.cancelAnimationFrame=l}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"performance-now":2}],5:[function(t,e,i){"use strict";function n(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}var o=function(){function t(t,e){for(var i=0;i<e.length;i++){var n=e[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}return function(e,i,n){return i&&t(e.prototype,i),n&&t(e,n),e}}(),s=t("raf"),r=t("object-assign"),a={propertyCache:{},vendors:[null,["-webkit-","webkit"],["-moz-","Moz"],["-o-","O"],["-ms-","ms"]],clamp:function(t,e,i){return e<i?t<e?e:t>i?i:t:t<i?i:t>e?e:t},data:function(t,e){return a.deserialize(t.getAttribute("data-"+e))},deserialize:function(t){return"true"===t||"false"!==t&&("null"===t?null:!isNaN(parseFloat(t))&&isFinite(t)?parseFloat(t):t)},camelCase:function(t){return t.replace(/-+(.)?/g,function(t,e){return e?e.toUpperCase():""})},accelerate:function(t){a.css(t,"transform","translate3d(0,0,0) rotate(0.0001deg)"),a.css(t,"transform-style","preserve-3d"),a.css(t,"backface-visibility","hidden")},transformSupport:function(t){for(var e=document.createElement("div"),i=!1,n=null,o=!1,s=null,r=null,l=0,h=a.vendors.length;l<h;l++)if(null!==a.vendors[l]?(s=a.vendors[l][0]+"transform",r=a.vendors[l][1]+"Transform"):(s="transform",r="transform"),void 0!==e.style[r]){i=!0;break}switch(t){case"2D":o=i;break;case"3D":if(i){var u=document.body||document.createElement("body"),c=document.documentElement,d=c.style.overflow,m=!1;document.body||(m=!0,c.style.overflow="hidden",c.appendChild(u),u.style.overflow="hidden",u.style.background=""),u.appendChild(e),e.style[r]="translate3d(1px,1px,1px)",o=void 0!==(n=window.getComputedStyle(e).getPropertyValue(s))&&n.length>0&&"none"!==n,c.style.overflow=d,u.removeChild(e),m&&(u.removeAttribute("style"),u.parentNode.removeChild(u))}}return o},css:function(t,e,i){var n=a.propertyCache[e];if(!n)for(var o=0,s=a.vendors.length;o<s;o++)if(n=null!==a.vendors[o]?a.camelCase(a.vendors[o][1]+"-"+e):e,void 0!==t.style[n]){a.propertyCache[e]=n;break}t.style[n]=i}},l={relativeInput:!1,clipRelativeInput:!1,inputElement:null,hoverOnly:!1,calibrationThreshold:100,calibrationDelay:500,supportDelay:500,calibrateX:!1,calibrateY:!0,invertX:!0,invertY:!0,limitX:!1,limitY:!1,scalarX:10,scalarY:10,frictionX:.1,frictionY:.1,originX:.5,originY:.5,pointerEvents:!1,precision:1,onReady:null,selector:null},h=function(){function t(e,i){n(this,t),this.element=e;var o={calibrateX:a.data(this.element,"calibrate-x"),calibrateY:a.data(this.element,"calibrate-y"),invertX:a.data(this.element,"invert-x"),invertY:a.data(this.element,"invert-y"),limitX:a.data(this.element,"limit-x"),limitY:a.data(this.element,"limit-y"),scalarX:a.data(this.element,"scalar-x"),scalarY:a.data(this.element,"scalar-y"),frictionX:a.data(this.element,"friction-x"),frictionY:a.data(this.element,"friction-y"),originX:a.data(this.element,"origin-x"),originY:a.data(this.element,"origin-y"),pointerEvents:a.data(this.element,"pointer-events"),precision:a.data(this.element,"precision"),relativeInput:a.data(this.element,"relative-input"),clipRelativeInput:a.data(this.element,"clip-relative-input"),hoverOnly:a.data(this.element,"hover-only"),inputElement:document.querySelector(a.data(this.element,"input-element")),selector:a.data(this.element,"selector")};for(var s in o)null===o[s]&&delete o[s];r(this,l,o,i),this.inputElement||(this.inputElement=this.element),this.calibrationTimer=null,this.calibrationFlag=!0,this.enabled=!1,this.depthsX=[],this.depthsY=[],this.raf=null,this.bounds=null,this.elementPositionX=0,this.elementPositionY=0,this.elementWidth=0,this.elementHeight=0,this.elementCenterX=0,this.elementCenterY=0,this.elementRangeX=0,this.elementRangeY=0,this.calibrationX=0,this.calibrationY=0,this.inputX=0,this.inputY=0,this.motionX=0,this.motionY=0,this.velocityX=0,this.velocityY=0,this.onMouseMove=this.onMouseMove.bind(this),this.onDeviceOrientation=this.onDeviceOrientation.bind(this),this.onDeviceMotion=this.onDeviceMotion.bind(this),this.onOrientationTimer=this.onOrientationTimer.bind(this),this.onMotionTimer=this.onMotionTimer.bind(this),this.onCalibrationTimer=this.onCalibrationTimer.bind(this),this.onAnimationFrame=this.onAnimationFrame.bind(this),this.onWindowResize=this.onWindowResize.bind(this),this.windowWidth=null,this.windowHeight=null,this.windowCenterX=null,this.windowCenterY=null,this.windowRadiusX=null,this.windowRadiusY=null,this.portrait=!1,this.desktop=!navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i),this.motionSupport=!!window.DeviceMotionEvent&&!this.desktop,this.orientationSupport=!!window.DeviceOrientationEvent&&!this.desktop,this.orientationStatus=0,this.motionStatus=0,this.initialise()}return o(t,[{key:"initialise",value:function(){void 0===this.transform2DSupport&&(this.transform2DSupport=a.transformSupport("2D"),this.transform3DSupport=a.transformSupport("3D")),this.transform3DSupport&&a.accelerate(this.element),"static"===window.getComputedStyle(this.element).getPropertyValue("position")&&(this.element.style.position="relative"),this.pointerEvents||(this.element.style.pointerEvents="none"),this.updateLayers(),this.updateDimensions(),this.enable(),this.queueCalibration(this.calibrationDelay)}},{key:"doReadyCallback",value:function(){this.onReady&&this.onReady()}},{key:"updateLayers",value:function(){this.selector?this.layers=this.element.querySelectorAll(this.selector):this.layers=this.element.children,this.layers.length||console.warn("ParallaxJS: Your scene does not have any layers."),this.depthsX=[],this.depthsY=[];for(var t=0;t<this.layers.length;t++){var e=this.layers[t];this.transform3DSupport&&a.accelerate(e),e.style.position=t?"absolute":"relative",e.style.display="block",e.style.left=0,e.style.top=0;var i=a.data(e,"depth")||0;this.depthsX.push(a.data(e,"depth-x")||i),this.depthsY.push(a.data(e,"depth-y")||i)}}},{key:"updateDimensions",value:function(){this.windowWidth=window.innerWidth,this.windowHeight=window.innerHeight,this.windowCenterX=this.windowWidth*this.originX,this.windowCenterY=this.windowHeight*this.originY,this.windowRadiusX=Math.max(this.windowCenterX,this.windowWidth-this.windowCenterX),this.windowRadiusY=Math.max(this.windowCenterY,this.windowHeight-this.windowCenterY)}},{key:"updateBounds",value:function(){this.bounds=this.inputElement.getBoundingClientRect(),this.elementPositionX=this.bounds.left,this.elementPositionY=this.bounds.top,this.elementWidth=this.bounds.width,this.elementHeight=this.bounds.height,this.elementCenterX=this.elementWidth*this.originX,this.elementCenterY=this.elementHeight*this.originY,this.elementRangeX=Math.max(this.elementCenterX,this.elementWidth-this.elementCenterX),this.elementRangeY=Math.max(this.elementCenterY,this.elementHeight-this.elementCenterY)}},{key:"queueCalibration",value:function(t){clearTimeout(this.calibrationTimer),this.calibrationTimer=setTimeout(this.onCalibrationTimer,t)}},{key:"enable",value:function(){this.enabled||(this.enabled=!0,this.orientationSupport?(this.portrait=!1,window.addEventListener("deviceorientation",this.onDeviceOrientation),this.detectionTimer=setTimeout(this.onOrientationTimer,this.supportDelay)):this.motionSupport?(this.portrait=!1,window.addEventListener("devicemotion",this.onDeviceMotion),this.detectionTimer=setTimeout(this.onMotionTimer,this.supportDelay)):(this.calibrationX=0,this.calibrationY=0,this.portrait=!1,window.addEventListener("mousemove",this.onMouseMove),this.doReadyCallback()),window.addEventListener("resize",this.onWindowResize),this.raf=s(this.onAnimationFrame))}},{key:"disable",value:function(){this.enabled&&(this.enabled=!1,this.orientationSupport?window.removeEventListener("deviceorientation",this.onDeviceOrientation):this.motionSupport?window.removeEventListener("devicemotion",this.onDeviceMotion):window.removeEventListener("mousemove",this.onMouseMove),window.removeEventListener("resize",this.onWindowResize),s.cancel(this.raf))}},{key:"calibrate",value:function(t,e){this.calibrateX=void 0===t?this.calibrateX:t,this.calibrateY=void 0===e?this.calibrateY:e}},{key:"invert",value:function(t,e){this.invertX=void 0===t?this.invertX:t,this.invertY=void 0===e?this.invertY:e}},{key:"friction",value:function(t,e){this.frictionX=void 0===t?this.frictionX:t,this.frictionY=void 0===e?this.frictionY:e}},{key:"scalar",value:function(t,e){this.scalarX=void 0===t?this.scalarX:t,this.scalarY=void 0===e?this.scalarY:e}},{key:"limit",value:function(t,e){this.limitX=void 0===t?this.limitX:t,this.limitY=void 0===e?this.limitY:e}},{key:"origin",value:function(t,e){this.originX=void 0===t?this.originX:t,this.originY=void 0===e?this.originY:e}},{key:"setInputElement",value:function(t){this.inputElement=t,this.updateDimensions()}},{key:"setPosition",value:function(t,e,i){e=e.toFixed(this.precision)+"px",i=i.toFixed(this.precision)+"px",this.transform3DSupport?a.css(t,"transform","translate3d("+e+","+i+",0)"):this.transform2DSupport?a.css(t,"transform","translate("+e+","+i+")"):(t.style.left=e,t.style.top=i)}},{key:"onOrientationTimer",value:function(){this.orientationSupport&&0===this.orientationStatus?(this.disable(),this.orientationSupport=!1,this.enable()):this.doReadyCallback()}},{key:"onMotionTimer",value:function(){this.motionSupport&&0===this.motionStatus?(this.disable(),this.motionSupport=!1,this.enable()):this.doReadyCallback()}},{key:"onCalibrationTimer",value:function(){this.calibrationFlag=!0}},{key:"onWindowResize",value:function(){this.updateDimensions()}},{key:"onAnimationFrame",value:function(){this.updateBounds();var t=this.inputX-this.calibrationX,e=this.inputY-this.calibrationY;(Math.abs(t)>this.calibrationThreshold||Math.abs(e)>this.calibrationThreshold)&&this.queueCalibration(0),this.portrait?(this.motionX=this.calibrateX?e:this.inputY,this.motionY=this.calibrateY?t:this.inputX):(this.motionX=this.calibrateX?t:this.inputX,this.motionY=this.calibrateY?e:this.inputY),this.motionX*=this.elementWidth*(this.scalarX/100),this.motionY*=this.elementHeight*(this.scalarY/100),isNaN(parseFloat(this.limitX))||(this.motionX=a.clamp(this.motionX,-this.limitX,this.limitX)),isNaN(parseFloat(this.limitY))||(this.motionY=a.clamp(this.motionY,-this.limitY,this.limitY)),this.velocityX+=(this.motionX-this.velocityX)*this.frictionX,this.velocityY+=(this.motionY-this.velocityY)*this.frictionY;for(var i=0;i<this.layers.length;i++){var n=this.layers[i],o=this.depthsX[i],r=this.depthsY[i],l=this.velocityX*(o*(this.invertX?-1:1)),h=this.velocityY*(r*(this.invertY?-1:1));this.setPosition(n,l,h)}this.raf=s(this.onAnimationFrame)}},{key:"rotate",value:function(t,e){var i=(t||0)/30,n=(e||0)/30,o=this.windowHeight>this.windowWidth;this.portrait!==o&&(this.portrait=o,this.calibrationFlag=!0),this.calibrationFlag&&(this.calibrationFlag=!1,this.calibrationX=i,this.calibrationY=n),this.inputX=i,this.inputY=n}},{key:"onDeviceOrientation",value:function(t){var e=t.beta,i=t.gamma;null!==e&&null!==i&&(this.orientationStatus=1,this.rotate(e,i))}},{key:"onDeviceMotion",value:function(t){var e=t.rotationRate.beta,i=t.rotationRate.gamma;null!==e&&null!==i&&(this.motionStatus=1,this.rotate(e,i))}},{key:"onMouseMove",value:function(t){var e=t.clientX,i=t.clientY;if(this.hoverOnly&&(e<this.elementPositionX||e>this.elementPositionX+this.elementWidth||i<this.elementPositionY||i>this.elementPositionY+this.elementHeight))return this.inputX=0,void(this.inputY=0);this.relativeInput?(this.clipRelativeInput&&(e=Math.max(e,this.elementPositionX),e=Math.min(e,this.elementPositionX+this.elementWidth),i=Math.max(i,this.elementPositionY),i=Math.min(i,this.elementPositionY+this.elementHeight)),this.elementRangeX&&this.elementRangeY&&(this.inputX=(e-this.elementPositionX-this.elementCenterX)/this.elementRangeX,this.inputY=(i-this.elementPositionY-this.elementCenterY)/this.elementRangeY)):this.windowRadiusX&&this.windowRadiusY&&(this.inputX=(e-this.windowCenterX)/this.windowRadiusX,this.inputY=(i-this.windowCenterY)/this.windowRadiusY)}},{key:"destroy",value:function(){this.disable(),clearTimeout(this.calibrationTimer),clearTimeout(this.detectionTimer),this.element.removeAttribute("style");for(var t=0;t<this.layers.length;t++)this.layers[t].removeAttribute("style");delete this.element,delete this.layers}},{key:"version",value:function(){return"3.1.0"}}]),t}();e.exports=h},{"object-assign":1,raf:4}]},{},[5])(5)});
//# sourceMappingURL=parallax.min.js.map

!function(e){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var n;"undefined"!=typeof window?n=window:"undefined"!=typeof global?n=global:"undefined"!=typeof self&&(n=self),n.Countdown=e()}}(function(){var define,module,exports;return function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s}({1:[function(require,module,exports){var defaultOptions={date:"June 7, 2087 15:03:25",refresh:1e3,offset:0,onEnd:function(){return},render:function(date){this.el.innerHTML=date.years+" years, "+date.days+" days, "+this.leadingZeros(date.hours)+" hours, "+this.leadingZeros(date.min)+" min and "+this.leadingZeros(date.sec)+" sec"}};var Countdown=function(el,options){this.el=el;this.options={};this.interval=false;this.mergeOptions=function(options){for(var i in defaultOptions){if(defaultOptions.hasOwnProperty(i)){this.options[i]=typeof options[i]!=="undefined"?options[i]:defaultOptions[i];if(i==="date"&&typeof this.options.date!=="object"){this.options.date=new Date(this.options.date)}if(typeof this.options[i]==="function"){this.options[i]=this.options[i].bind(this)}}}if(typeof this.options.date!=="object"){this.options.date=new Date(this.options.date)}}.bind(this);this.mergeOptions(options);this.getDiffDate=function(){var diff=(this.options.date.getTime()-Date.now()+this.options.offset)/1e3;var dateData={years:0,days:0,hours:0,min:0,sec:0,millisec:0};if(diff<=0){if(this.interval){this.stop();this.options.onEnd()}return dateData}if(diff>=365.25*86400){dateData.years=Math.floor(diff/(365.25*86400));diff-=dateData.years*365.25*86400}if(diff>=86400){dateData.days=Math.floor(diff/86400);diff-=dateData.days*86400}if(diff>=3600){dateData.hours=Math.floor(diff/3600);diff-=dateData.hours*3600}if(diff>=60){dateData.min=Math.floor(diff/60);diff-=dateData.min*60}dateData.sec=Math.round(diff);dateData.millisec=diff%1*1e3;return dateData}.bind(this);this.leadingZeros=function(num,length){length=length||2;num=String(num);if(num.length>length){return num}return(Array(length+1).join("0")+num).substr(-length)};this.update=function(newDate){if(typeof newDate!=="object"){newDate=new Date(newDate)}this.options.date=newDate;this.render();return this}.bind(this);this.stop=function(){if(this.interval){clearInterval(this.interval);this.interval=false}return this}.bind(this);this.render=function(){this.options.render(this.getDiffDate());return this}.bind(this);this.start=function(){if(this.interval){return}this.render();if(this.options.refresh){this.interval=setInterval(this.render,this.options.refresh)}return this}.bind(this);this.updateOffset=function(offset){this.options.offset=offset;return this}.bind(this);this.restart=function(options){this.mergeOptions(options);this.interval=false;this.start();return this}.bind(this);this.start()};module.exports=Countdown},{}],2:[function(require,module,exports){var Countdown=require("./countdown.js");var NAME="countdown";var DATA_ATTR="date";jQuery.fn.countdown=function(options){return $.each(this,function(i,el){var $el=$(el);if(!$el.data(NAME)){if($el.data(DATA_ATTR)){options.date=$el.data(DATA_ATTR)}$el.data(NAME,new Countdown(el,options))}})};module.exports=Countdown},{"./countdown.js":1}]},{},[2])(2)});
(function ( $ ) {

    $.fn.stack = function() {
        // Disable in the builder
        if($('body').hasClass('vc_editor')||window.vc_iframe) return false;
        if (typeof elementorFrontend !== 'undefined' && elementorFrontend !== null) {
            if(elementorFrontend.config.environmentMode.edit){
                $('body').removeClass('pix-sections-stack');
                return false;
            }
        }
        this.css( "position", "fixed" );
        if($('.sticky-overlay').length==0){
            $('#content').append('<div class="sticky-overlay"></div>');
        }
        if($('#pix-vertical-nav').length==0){
            $('body').append('<nav id="pix-vertical-nav"><ul></ul></nav>');
        }
        // Init vars
        var elemCount = this.length,
        elems = [],
        currentElem = 0,
        prevHeight = 0,
        ptop = 0,
        ph = $( window ).height(),
        sections_h = 0,
        sections = [],
        active = true,
        start = 0,
        current = 0,
        admin_bar = 0,
        footer_height = 0,
        footer = false;
        if($('#wpadminbar').length>0){
            admin_bar = $('#wpadminbar').outerHeight();
        }
        this.each(function(i) {
            sections_h += $( this ).outerHeight();
            // console.log($( this ).outerHeight());
            $( this ).css( 'z-index' , elemCount * 10);
            var section_name = 'Section '+i;
            if($(this).attr('data-section-name') && $(this).attr('data-section-name')!=''){
                section_name = $(this).attr('data-section-name');
            }
            elems.push( $( this ) );
            var nav = '';

            var bottom = false;
            let sectionID = '';
            if($(this).prop('id')){
                sectionID = $(this).prop('id');
            }else{
                sectionID = 'pix-stack-section-'+i;
            }
            if($(this).hasClass('site-footer2')){
                bottom = true;
                footer_height = $( this ).outerHeight();
                $(this).css({
                    'bottom': '0',
                });
            }else{
                $( this ).css( 'top' , ptop + 'px');
                nav = '<li><a class="pix-stack-links" id="pix-stack-link-'+i+'" data-top="'+start+'" href="#'+sectionID+'" data-number="'+i+'"><span class="pix-dot"></span><span class="pix-label">'+section_name+'</span></a></li>';
            }
            sections.push({
                el: $(this),
                height: $( this ).outerHeight(),
                index: elemCount * 10,
                num: elemCount,
                active: active,
                start: start,
                limit: sections_h,
                bottom: bottom,
                link: 'pix-stack-link-'+i
            });
            elemCount--;
            $(this).attr('data-scroll', start);
            $(this).attr('data-number', i);
            $(this).addClass('pix-slides-section');
            start = sections_h;
            active = false;
            $(this).attr('id', sectionID);
            $('#pix-vertical-nav ul').append(nav);
        });
        if($('.pix-banner').length){
            let bannerHeight = $('.pix-banner').outerHeight();
            sections_h -= bannerHeight;
        }
        $( '#page' ).css( 'height' , sections_h - admin_bar);
        if( sections[sections.length-1] != undefined ){
            if( sections[sections.length-1].bottom ){
                footer = sections[sections.length-1];
            }
        }
        var s = sections[current];
        $('#'+s.link).addClass('is-selected');

        s.el.addClass('is-sticky-active');
        let tOpacity = 0;
        let tIndex = 0;
        document.addEventListener('scroll', (e) => {
            let pos = $( window ).scrollTop();
            if(pos>=s.start&&pos<=s.limit){
            }else{
                s = get_current(pos, s);
                setTimeout(fix_sections(pos),0);
                window.pix_animation_display(s.el);
                piximations.init();
            }

            $('.site-content').css('z-index', s.index);
            if(tIndex!=s.index-4){
                $('.sticky-overlay').css('z-index', s.index-4);
            }
            tIndex = s.index-4;

            var op = (s.height + s.el.position().top) /  ph;
            if(s.num==2){

                op = ( $( window ).scrollTop() + s.height + s.el.position().top - sections_h - admin_bar) /  footer_height;
                // console.log({footer});
                if(footer){
                    window.pix_animation(footer.el, true);
                    piximations.play(footer.el);
                    // window.pix_animation($('.site-footer2'), true);
                }
            }
            if (op<0){op = 0};
            if (op>0.8){op = 0.8};
            op = op*0.8;
            if(!s.el.bottom){
                s.el.css('top', - $( window ).scrollTop() + s.start );
            }

            if(tOpacity!=op){
                $('.sticky-overlay').css('opacity', op);
            }
            tOpacity = op;

        }, {
            passive: true
        });
        setTimeout(function(){
            pix_update_heights();
        }, 1000);
        setTimeout(function(){
            pix_update_heights();
        }, 2000);
        window.addEventListener("resize", pix_update_heights);
        function pix_update_heights(){
            var up_section = 0;
            var up_start = 0;
            $.each(sections, function(i) {
                up_section += sections[i].el.outerHeight();
                sections[i].height = sections[i].el.outerHeight();
                sections[i].start = up_start;
                sections[i].limit = up_section;
                up_start = up_section;
            });
            if($('.pix-banner').length){
                let bannerHeight = $('.pix-banner').outerHeight();
                up_section -= bannerHeight;
            }
            $( '#page' ).css( 'height' , up_section - admin_bar );
        }

        function get_current(pos, current){
            var res = current;
            $.each(sections, function(i) {
                if(sections[i].start<=pos&&sections[i].limit>=pos){
                    current.active = false;
                    current.el.removeClass('is-sticky-active');
                    $('.pix-stack-links').removeClass('is-selected');
                    sections[i].active = true;
                    sections[i].el.addClass('is-sticky-active');
                    $('#'+sections[i].link).addClass('is-selected');
                    res = sections[i];
                }
            });
            return res;
        }
        function fix_sections(pos){
            $.each(sections, function(i) {
                if(!sections[i].active && !sections[i].bottom){
                    if(sections[i].limit<=pos){
                        sections[i].el.css('top', -sections[i].height);
                    }else{
                        sections[i].el.css('top', '0');
                    }
                }
            });
        }


        var contentSections = $('.pix-section'),
        navigationItems = $('#pix-vertical-nav a');
        updateNavigation();
        $(window).on('scroll', function(){
            updateNavigation();
        });
        //smooth scroll to the section
        $('#pix-vertical-nav a').on('click', function(e){
            e.preventDefault();
            let start = $(this.hash).data('scroll');
            if($(this).data('number')){
                start = sections[$(this).data('number')].start + 10;
            }
            smoothScroll(start);
            e.stopPropagation();
            return false;
        });
        //smooth scroll to second section
        $('.pix-scroll-down').on('click', function(event){
            event.preventDefault();
            smoothScroll($(this.hash));
        });
        $('a:not(.pix-stack-links)').on('click', function(e){
            var link = $(this).attr('href');
            let scroll = false;
            if(link){
                if(link.startsWith('#')){
                    if($(link).length){
                        let section = $(link);
                        scroll = $(section).attr('data-scroll');
                        if($(section).data('number')){
                            scroll = sections[$(section).data('number')].start + 10;
                        }
                    }
                }else if ( link.indexOf("#") != -1 ) {
                    let id = link.substr(link.indexOf("#"));
                    if($(id).length){
                        scroll = $(id).attr('data-scroll') + 50;
                    }
                }
            }
            if(scroll){
                e.stopPropagation();
                e.preventDefault();
                smoothScroll(scroll);
            }
        });

        if ( window.location.href.indexOf("#") != -1 ) {
            let id = window.location.href.substr(window.location.href.indexOf("#"));
            if($(id).length){
                setTimeout(function(){
                    scroll = $(id).attr('data-scroll') + 150;
                    smoothScroll(scroll);
                }, 1000);
            }

        }
        function updateNavigation() {
            contentSections.each(function(){
                $this = $(this);
                var activeSection = $('#pix-vertical-nav a[href="#'+$this.attr('id')+'"]').data('number') - 1;
                if ( ( $this.offset().top - $(window).height()/2 < $(window).scrollTop() ) && ( $this.offset().top + $this.height() - $(window).height()/2 > $(window).scrollTop() ) ) {
                    navigationItems.eq(activeSection).addClass('is-selected');
                }else {
                    navigationItems.eq(activeSection).removeClass('is-selected');
                }
            });
        }

        function smoothScroll(start) {
            $('body,html').animate(
                {'scrollTop':start+1},
                600
            );
        }
    };
}( jQuery ));
(function ( $ ) {
        window.pix_section_stack = function() {
            if(!$('body').hasClass('vc_editor')){
                $('.pix-scale-in, .pix-scale-in-xs, .pix-scale-in-sm, .pix-scale-in-lg').each(function(){
                    var section = $(this);
                    if(section.hasClass('pix-loaded')) return false;
                    section.addClass('pix-loaded');
                    var top = section.offset().top;
                    var height = section.outerHeight();
                    var bottom = section.offset().top + height;
                    var scale_val = 2;
                    var offset = 600;
                    var translate_val = height / 3;
                    if(section.hasClass('pix-scale-in-xs')) {
                        scale_val = 1.1;
                        if(translate_val>300) translate_val = 300;
                        offset = 200;
                    }
                    if(section.hasClass('pix-scale-in-sm')) {
                        scale_val = 1.2;
                        offset = 200;
                    }
                    if(section.hasClass('pix-scale-in')) {
                        scale_val = 1.6;
                        offset = 400;
                    }
                    section.css({
                        'z-index' : '99999999',
                        'transform-style': 'preserve-3d',
                    });
                    let start = top - offset ;
                    var range = 600;
                    if(height<500) range = height;
                    var rect = this.getBoundingClientRect();
                    var that = this;
                    var range_start = $(window).height();
                    var range_end = $(window).height()/2;
                    var range_total = range_start - range_end;

                    if(rect.top <= range_start && rect.top >= range_end){
                        var per = (rect.top - range_end) / range_total;
                        var scale = (scale_val - 1)  * per;
                        scale++;
                        var translate = translate_val  * per;

                        section.css({
                            'transform' : 'scale('+scale+') translateY('+translate+'px)'
                        });
                    }else if (rect.top > range_start) {
                        // Before
                        section.css({
                            'transform' : 'scale('+scale_val+') translateY('+translate_val+'px)'
                        });
                    }else{
                        // After
                        section.css({
                            'transform' : 'scale(1) translateY(0px)'
                        });
                    }
                    document.addEventListener('scroll', (e) => {
                        rect = that.getBoundingClientRect();
                        if(rect.top <= range_start && rect.top >= range_end){
                            var per = (rect.top - range_end) / range_total;
                            var scale = (scale_val - 1)  * per;
                            scale++;
                            var translate = translate_val  * per;

                            section.css({
                                'transform' : 'scale('+scale+') translateY('+translate+'px)'
                            });
                        }else if (rect.top > range_start) {
                            // Before
                            section.css({
                                'transform' : 'scale('+scale_val+') translateY('+translate_val+'px)'
                            });
                        }else{
                            // After
                            section.css({
                                'transform' : 'scale(1) translateY(0px)'
                            });
                        }
                    }, {
                        passive: true
                    });
                });
            }
        };
}( jQuery ));

(function ( $ ) {
    $.fn.pixfooter = function() {
        if(!$('body').hasClass('pix-is-sticky-footer') ){
            return false;
        }
        var bgclass = 'bg-gradient-primary';
        var bgstyle = '';
        if($('.pix-footer-overlay').length==0){
            if( $('.site-footer2:first').data('sticky-bg') ){
                bgclass = $('.site-footer2:first').data('sticky-bg');
                if( bgclass=='custom' ){
                    if($('.site-footer2:first').data('sticky-color')){
                        bgstyle = 'style="background:'+$('.site-footer2:first').data('sticky-color')+';"';
                    }
                }
                bgclass = 'bg-'+bgclass;
            }
            $('#page').append('<div class="pix-footer-overlay '+bgclass+'" '+bgstyle+'></div>');
        }
        var ph = $('#page').outerHeight();
        var fh = $('.pix-sticky-footer').outerHeight();
        $('.pix-footer-sticky-placeholder').height(fh);
        var bp = $('body').css('padding');
        if(bp&&bp!=''&&bp!='0px'){
            $('.pix-sticky-footer, .pix-footer-overlay').css('bottom', bp);
        }

        setTimeout(function(){
            ph = $('#page').height();
            fh = $('.pix-sticky-footer').outerHeight();
            ph = ph - fh;
            $('.pix-footer-sticky-placeholder').height(fh);
        }, 2000);

        $(window).on('resize', function(){
            ph = $('#page').height();
            fh = $('.pix-sticky-footer').outerHeight();
            ph = ph - fh;
            $('.pix-footer-sticky-placeholder').height(fh);
        });
        setTimeout(function(){
            ph = $('#page').height();
            fh = $('.pix-sticky-footer').outerHeight();
            ph = ph - fh;
            $('.pix-footer-sticky-placeholder').height(fh);
        }, 6000);
        setTimeout(function(){
            ph = $('#page').height();
            fh = $('.pix-sticky-footer').outerHeight();
            ph = ph - fh;
            $('.pix-footer-sticky-placeholder').height(fh);
        }, 12000);
        $( '.pix-footer-overlay' ).css( 'height' , fh);
        if($('body').hasClass('pix-sections-stack')){
            $('.pix-footer-overlay').css({
                'z-index': 11
            });
        }
        var s = $('.site-content');
        if($('.site-content').length>0){
            s = $('.pix-portfolio-site-content');
        }
        var f = $('.pix-sticky-footer');

        let pos = $( window ).scrollTop();
        if((pos + $( window ).height()) > ph){
            var op = 1 - (( pos + $( window ).height() - ph ) / fh);
            if (op<0){op = 0};
            if (op>1){op = 1};
            op = op*1.2;
            $('.pix-footer-overlay').css('opacity', op);
        }
        $( window ).scroll(function() {
            let pos = $( window ).scrollTop();
            if((pos + $( window ).height()) > ph){
                $('.pix-sticky-footer').css('opacity', 1);
                var op = 1 - (( pos + $( window ).height() - ph ) / fh);
                if (op<0){op = 0};
                op = op*1.2;
                if (op>1){op = 1};
                $('.pix-footer-overlay').css('opacity', op);
            }else{
                $('.pix-footer-overlay, .pix-sticky-footer').css('opacity', 0);
            }

        });

    };
}( jQuery ));

/* NProgress, (c) 2013, 2014 Rico Sta. Cruz - http://ricostacruz.com/nprogress
 * @license MIT */

;(function(root, factory) {

  if (typeof define === 'function' && define.amd) {
    define(factory);
  } else if (typeof exports === 'object') {
    module.exports = factory();
  } else {
    root.NProgress = factory();
  }

})(this, function() {
  var NProgress = {};

  NProgress.version = '0.2.0';

  var Settings = NProgress.settings = {
    minimum: 0.08,
    easing: 'ease',
    positionUsing: '',
    speed: 200,
    trickle: true,
    trickleRate: 0.02,
    trickleSpeed: 800,
    showSpinner: true,
    barSelector: '[role="bar"]',
    spinnerSelector: '[role="spinner"]',
    parent: 'body',
    template: '<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'
  };

  /**
   * Updates configuration.
   *
   *     NProgress.configure({
   *       minimum: 0.1
   *     });
   */
  NProgress.configure = function(options) {
    var key, value;
    for (key in options) {
      value = options[key];
      if (value !== undefined && options.hasOwnProperty(key)) Settings[key] = value;
    }

    return this;
  };

  /**
   * Last number.
   */

  NProgress.status = null;

  /**
   * Sets the progress bar status, where `n` is a number from `0.0` to `1.0`.
   *
   *     NProgress.set(0.4);
   *     NProgress.set(1.0);
   */

  NProgress.set = function(n) {
    var started = NProgress.isStarted();

    n = clamp(n, Settings.minimum, 1);
    NProgress.status = (n === 1 ? null : n);

    var progress = NProgress.render(!started),
        bar      = progress.querySelector(Settings.barSelector),
        speed    = Settings.speed,
        ease     = Settings.easing;

    progress.offsetWidth; /* Repaint */

    queue(function(next) {
      // Set positionUsing if it hasn't already been set
      if (Settings.positionUsing === '') Settings.positionUsing = NProgress.getPositioningCSS();

      // Add transition
      css(bar, barPositionCSS(n, speed, ease));

      if (n === 1) {
        // Fade out
        css(progress, { 
          transition: 'none', 
          opacity: 1 
        });
        progress.offsetWidth; /* Repaint */

        setTimeout(function() {
          css(progress, { 
            transition: 'all ' + speed + 'ms linear', 
            opacity: 0 
          });
          setTimeout(function() {
            NProgress.remove();
            next();
          }, speed);
        }, speed);
      } else {
        setTimeout(next, speed);
      }
    });

    return this;
  };

  NProgress.isStarted = function() {
    return typeof NProgress.status === 'number';
  };

  /**
   * Shows the progress bar.
   * This is the same as setting the status to 0%, except that it doesn't go backwards.
   *
   *     NProgress.start();
   *
   */
  NProgress.start = function() {
    if (!NProgress.status) NProgress.set(0);

    var work = function() {
      setTimeout(function() {
        if (!NProgress.status) return;
        NProgress.trickle();
        work();
      }, Settings.trickleSpeed);
    };

    if (Settings.trickle) work();

    return this;
  };

  /**
   * Hides the progress bar.
   * This is the *sort of* the same as setting the status to 100%, with the
   * difference being `done()` makes some placebo effect of some realistic motion.
   *
   *     NProgress.done();
   *
   * If `true` is passed, it will show the progress bar even if its hidden.
   *
   *     NProgress.done(true);
   */

  NProgress.done = function(force) {
    if (!force && !NProgress.status) return this;

    return NProgress.inc(0.3 + 0.5 * Math.random()).set(1);
  };

  /**
   * Increments by a random amount.
   */

  NProgress.inc = function(amount) {
    var n = NProgress.status;

    if (!n) {
      return NProgress.start();
    } else {
      if (typeof amount !== 'number') {
        amount = (1 - n) * clamp(Math.random() * n, 0.1, 0.95);
      }

      n = clamp(n + amount, 0, 0.994);
      return NProgress.set(n);
    }
  };

  NProgress.trickle = function() {
    return NProgress.inc(Math.random() * Settings.trickleRate);
  };

  /**
   * Waits for all supplied jQuery promises and
   * increases the progress as the promises resolve.
   *
   * @param $promise jQUery Promise
   */
  (function() {
    var initial = 0, current = 0;

    NProgress.promise = function($promise) {
      if (!$promise || $promise.state() === "resolved") {
        return this;
      }

      if (current === 0) {
        NProgress.start();
      }

      initial++;
      current++;

      $promise.always(function() {
        current--;
        if (current === 0) {
            initial = 0;
            NProgress.done();
        } else {
            NProgress.set((initial - current) / initial);
        }
      });

      return this;
    };

  })();

  /**
   * (Internal) renders the progress bar markup based on the `template`
   * setting.
   */

  NProgress.render = function(fromStart) {
    if (NProgress.isRendered()) return document.getElementById('nprogress');

    addClass(document.documentElement, 'nprogress-busy');
    
    var progress = document.createElement('div');
    progress.id = 'nprogress';
    progress.innerHTML = Settings.template;

    var bar      = progress.querySelector(Settings.barSelector),
        perc     = fromStart ? '-100' : toBarPerc(NProgress.status || 0),
        parent   = document.querySelector(Settings.parent),
        spinner;
    
    css(bar, {
      transition: 'all 0 linear',
      transform: 'translate3d(' + perc + '%,0,0)'
    });

    if (!Settings.showSpinner) {
      spinner = progress.querySelector(Settings.spinnerSelector);
      spinner && removeElement(spinner);
    }

    if (parent != document.body) {
      addClass(parent, 'nprogress-custom-parent');
    }

    parent.appendChild(progress);
    return progress;
  };

  /**
   * Removes the element. Opposite of render().
   */

  NProgress.remove = function() {
    removeClass(document.documentElement, 'nprogress-busy');
    removeClass(document.querySelector(Settings.parent), 'nprogress-custom-parent');
    var progress = document.getElementById('nprogress');
    progress && removeElement(progress);
  };

  /**
   * Checks if the progress bar is rendered.
   */

  NProgress.isRendered = function() {
    return !!document.getElementById('nprogress');
  };

  /**
   * Determine which positioning CSS rule to use.
   */

  NProgress.getPositioningCSS = function() {
    // Sniff on document.body.style
    var bodyStyle = document.body.style;

    // Sniff prefixes
    var vendorPrefix = ('WebkitTransform' in bodyStyle) ? 'Webkit' :
                       ('MozTransform' in bodyStyle) ? 'Moz' :
                       ('msTransform' in bodyStyle) ? 'ms' :
                       ('OTransform' in bodyStyle) ? 'O' : '';

    if (vendorPrefix + 'Perspective' in bodyStyle) {
      // Modern browsers with 3D support, e.g. Webkit, IE10
      return 'translate3d';
    } else if (vendorPrefix + 'Transform' in bodyStyle) {
      // Browsers without 3D support, e.g. IE9
      return 'translate';
    } else {
      // Browsers without translate() support, e.g. IE7-8
      return 'margin';
    }
  };

  /**
   * Helpers
   */

  function clamp(n, min, max) {
    if (n < min) return min;
    if (n > max) return max;
    return n;
  }

  /**
   * (Internal) converts a percentage (`0..1`) to a bar translateX
   * percentage (`-100%..0%`).
   */

  function toBarPerc(n) {
    return (-1 + n) * 100;
  }


  /**
   * (Internal) returns the correct CSS for changing the bar's
   * position given an n percentage, and speed and ease from Settings
   */

  function barPositionCSS(n, speed, ease) {
    var barCSS;

    if (Settings.positionUsing === 'translate3d') {
      barCSS = { transform: 'translate3d('+toBarPerc(n)+'%,0,0)' };
    } else if (Settings.positionUsing === 'translate') {
      barCSS = { transform: 'translate('+toBarPerc(n)+'%,0)' };
    } else {
      barCSS = { 'margin-left': toBarPerc(n)+'%' };
    }

    barCSS.transition = 'all '+speed+'ms '+ease;

    return barCSS;
  }

  /**
   * (Internal) Queues a function to be executed.
   */

  var queue = (function() {
    var pending = [];
    
    function next() {
      var fn = pending.shift();
      if (fn) {
        fn(next);
      }
    }

    return function(fn) {
      pending.push(fn);
      if (pending.length == 1) next();
    };
  })();

  /**
   * (Internal) Applies css properties to an element, similar to the jQuery 
   * css method.
   *
   * While this helper does assist with vendor prefixed property names, it 
   * does not perform any manipulation of values prior to setting styles.
   */

  var css = (function() {
    var cssPrefixes = [ 'Webkit', 'O', 'Moz', 'ms' ],
        cssProps    = {};

    function camelCase(string) {
      return string.replace(/^-ms-/, 'ms-').replace(/-([\da-z])/gi, function(match, letter) {
        return letter.toUpperCase();
      });
    }

    function getVendorProp(name) {
      var style = document.body.style;
      if (name in style) return name;

      var i = cssPrefixes.length,
          capName = name.charAt(0).toUpperCase() + name.slice(1),
          vendorName;
      while (i--) {
        vendorName = cssPrefixes[i] + capName;
        if (vendorName in style) return vendorName;
      }

      return name;
    }

    function getStyleProp(name) {
      name = camelCase(name);
      return cssProps[name] || (cssProps[name] = getVendorProp(name));
    }

    function applyCss(element, prop, value) {
      prop = getStyleProp(prop);
      element.style[prop] = value;
    }

    return function(element, properties) {
      var args = arguments,
          prop, 
          value;

      if (args.length == 2) {
        for (prop in properties) {
          value = properties[prop];
          if (value !== undefined && properties.hasOwnProperty(prop)) applyCss(element, prop, value);
        }
      } else {
        applyCss(element, args[1], args[2]);
      }
    }
  })();

  /**
   * (Internal) Determines if an element or space separated list of class names contains a class name.
   */

  function hasClass(element, name) {
    var list = typeof element == 'string' ? element : classList(element);
    return list.indexOf(' ' + name + ' ') >= 0;
  }

  /**
   * (Internal) Adds a class to an element.
   */

  function addClass(element, name) {
    var oldList = classList(element),
        newList = oldList + name;

    if (hasClass(oldList, name)) return; 

    // Trim the opening space.
    element.className = newList.substring(1);
  }

  /**
   * (Internal) Removes a class from an element.
   */

  function removeClass(element, name) {
    var oldList = classList(element),
        newList;

    if (!hasClass(element, name)) return;

    // Replace the class name.
    newList = oldList.replace(' ' + name + ' ', ' ');

    // Trim the opening and closing spaces.
    element.className = newList.substring(1, newList.length - 1);
  }

  /**
   * (Internal) Gets a space separated list of the class names on the element. 
   * The list is wrapped with a single space on each end to facilitate finding 
   * matches within the list.
   */

  function classList(element) {
    return (' ' + (element.className || '') + ' ').replace(/\s+/gi, ' ');
  }

  /**
   * (Internal) Removes an element from the DOM.
   */

  function removeElement(element) {
    element && element.parentNode && element.parentNode.removeChild(element);
  }

  return NProgress;
});


(function($){
    "use strict";

    jQuery.cachedScript = function( url, options ) {
        options = $.extend( options || {}, {
            dataType: "script",
            cache: true,
            url: url
        });
        return jQuery.ajax( options );
    };
    let mapsScriptsStarted = false;
    let mapsScriptsLoaded = false;
    function pixDynamicMaps(){
        if(pixfort_main_object.hasOwnProperty('googleMapsUrl')){
            // console.log(pixfort_main_object.googleMapsUrl);
            mapsScriptsStarted = true;
            $.cachedScript(pixfort_main_object.googleMapsUrl)
            .done(function( script, textStatus ) {
                // self.libLoaded = true;
                // console.log(pixfort_main_object.googleMapsUrl);
                // console.log(textStatus);
                mapsScriptsLoaded = true;
                if(pixfort_main_object.hasOwnProperty('googleMapsScript')){
                    $.cachedScript(pixfort_main_object.googleMapsScript)
                    .done(function( script, textStatus ) {
                        // self.libLoaded = true;
                        // console.log(pixfort_main_object.googleMapsScript);
                        // console.log(textStatus);
                        init_pix_maps();
                        mapsScriptsStarted = false;
                    })
                    .fail(function( jqxhr, settings, exception ) {
                        console.log("Script was not loaded!");
                    });
                }
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Library was not loaded!");
            });
        }
    }
    window.pixLoadMaps = function(){
        if($('.pix-google-map').length>0){
            if(mapsScriptsLoaded){
                init_pix_maps();
            }else{
                if(!mapsScriptsStarted){
                    pixDynamicMaps();
                }

            }

        }
    }

})(jQuery);

(function($){
    "use strict";
    let lightboxScriptsStarted = false;
    let lightboxScriptsLoaded = false;
    function pixDynamicLightbox(){
        if(pixfort_main_object.hasOwnProperty('lightboxUrl')){
            lightboxScriptsStarted = true;
            $.cachedScript(pixfort_main_object.lightboxUrl)
            .done(function( script, textStatus ) {
                lightboxScriptsLoaded = true;
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Lightbox Library was not loaded!");
            });
        }
    }
    jQuery(document).ready(function($) {
        pixLoadLightbox();
    });

    window.pixLoadLightbox = function(){
        if($('.pix-lightbox').length>0){
            if(!lightboxScriptsLoaded){
                console.log("Lightbox Ready to load");
                if(!lightboxScriptsStarted){
                    // console.log("Loading...");
                    pixDynamicLightbox();
                }
            }
        }
    }

})(jQuery);

(function($){
    "use strict";
    let isotopeScriptsStarted = false;
    let isotopeScriptsLoaded = false;
    function pixDynamicIsotope(cb=false){
        if(pixfort_main_object.hasOwnProperty('isotopeUrl')){
            isotopeScriptsStarted = true;
            $.cachedScript(pixfort_main_object.isotopeUrl)
            .done(function( script, textStatus ) {
                isotopeScriptsLoaded = true;
                if(cb){
                    setTimeout(cb, 0);
                }
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Isotope Library was not loaded!");
            });
        }
    }

    window.pixLoadIsotope = function(cb=false){
        if(!isotopeScriptsLoaded){
            console.log("Loading Isotope...");
            pixDynamicIsotope(cb);
        }else{
            setTimeout(cb, 0);
        }
    }

})(jQuery);

(function($){
    "use strict";
    let searchScriptsStarted = false;
    let searchScriptsLoaded = false;
    function pixDynamicSearch(cb=false){
        if(pixfort_main_object.hasOwnProperty('searchUrl')){
            searchScriptsStarted = true;
            $.cachedScript(pixfort_main_object.searchUrl)
            .done(function( script, textStatus ) {
                searchScriptsLoaded = true;
                if(cb){
                    setTimeout(cb, 0);
                }
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Search Library was not loaded!");
            });
        }
    }
    jQuery(document).ready(function($) {
        let isLoaded = false;
        $(".pix-ajax-search").hover(function(){
            if(!isLoaded){
                pixLoadSearch(function(){
                    initSuggestions();
                    isLoaded = true;
                });
            }
        });
        $(".pix-ajax-search").focus(function(){
            if(!isLoaded){
                pixLoadSearch(function(){
                    initSuggestions();
                    isLoaded = true;
                });
            }
        });

        function initSuggestions(){
            $('.pix-ajax-search').each(function(i, elem){
                var container = $(elem).closest('.pix-ajax-search-container');
                var searchForm = $(elem).closest('.pix-search-form');
                var link = $(this).data('search-link');
                let phrase = '';
                $(elem).autoComplete({
                    autoSelect: false,
                    // minLength: 2,
                    // preventEnter: true,
                    noResultsText: '',
                    resolver: 'custom',
                        formatResult: function (item) {
                            if(item.icon){
                                return {
        							value: item.id,
        							text: item.text,
        							html: [
                                            $('<img>').attr('src', item.icon), ' ',
        									item.text
        								]
        						};
                            }else{
                                return {
        							value: item.id,
        							text: item.text,
        							html: [
        									item.text
        								]
        						};
                            }

    					},
                        events: {
                            search: function (query, process) {
                                // let's do a custom ajax call
                                if(phrase!=$(elem).val()){
                                    phrase = $(elem).val();
                                    $.get(link, { term: $(elem).val() }, function (response) {
                                        if(!response.error){
                                            var data =  JSON.parse(response);
                                            // console.log(data);
                                            process(data);
                                        }

                                    });
                                }

                            }
                        }
                });
                let enableSubmit = true;
                $(elem).on('autocomplete.select', function(e, item) {
                    e.preventDefault();
                    e.stopPropagation();
                    enableSubmit = false;
                    if(item.value){
                        window.location.href = item.value;
                    }
                    return false;
        		});
                container.submit(function(e){
                    if(!enableSubmit){
                        e.preventDefault();
                    }
                });
                searchForm.submit(function(e){
                    if(!enableSubmit){
                        e.preventDefault();
                    }
                });
                $(elem).on('autocomplete.freevalue', function(evt, item) {
                    enableSubmit = true;
    			});

            });
        }

    });

    window.pixLoadSearch = function(cb){
        if(!searchScriptsLoaded){
            // console.log("Suggestions Ready to load");
            if(!searchScriptsStarted){
                // console.log("Loading Suggestions...");
                pixDynamicSearch(cb);
            }
        }else{
            setTimeout(cb, 0);
        }
    }
})(jQuery);

(function($){
    "use strict";

    let mobileBreakPoint = 992;
    if (typeof pixfort_main_object === 'undefined') { window.pixfort_main_object = {}; }
    if (pixfort_main_object.hasOwnProperty('dataBreakpoint')){
        mobileBreakPoint = pixfort_main_object.dataBreakpoint;    
    }
    
    NProgress.configure({
        minimum: 0.01,
        speed: 800,
        trickleSpeed: 800,
        showSpinner: true,
        parent: 'body',
        template: '<div class="bar" role="bar"><div class="peg"></div></div>'
    });
    if(!$('body').hasClass('pix-disable-loading-bar')&&$('.pix-post-area').length==0){
        NProgress.start();
    }

    jQuery(document).ready(function($) {
        // Page transition
        var last_clicked;
        $(window).on('click', function (e) {
            last_clicked = e.target;
            return true;
        });
        $(window).on('beforeunload', function (e) {
            var e = e || window.event;
            let showTransition = true;
            if(last_clicked){
                if(last_clicked.href && last_clicked.href!= 'undefined'){
                    if(last_clicked.href.startsWith('tel')||last_clicked.href.startsWith('mailto')){
                        showTransition = false;
                    }
                }else{
                    let plink = $(last_clicked).closest('a');
                    if(plink && plink.href != undefined){
                        if(plink.href.startsWith('tel')||plink.href.startsWith('mailto')){
                            showTransition = false;
                        }
                    }
                }
            }
            if(showTransition){
                document.body.classList.remove('render');
            }else{
                document.body.classList.add('render');
            }
        });

        function addEvent(obj, evt, fn) {
            if (obj.addEventListener) {
                obj.addEventListener(evt, fn, false);
            }
            else if (obj.attachEvent) {
                obj.attachEvent("on" + evt, fn);
            }
        }

        setTimeout(() => document.body.classList.add('render'), 0);
        setTimeout(() => document.body.classList.add('pix-body-loaded'), 0);


        function loadCSS(id, href) {

          var cssLink = $("<link>");
          $("head").append(cssLink); //IE hack: append before setting href

          cssLink.attr({
            rel:  "stylesheet",
            type: "text/css",
            href: href,
            id: id + '-css'
          });

        };

        function pix_dynamic_popup_js(scripts, styles){
            Object.keys(styles).forEach(key => {
                if(!$('#'+key+'-css').length){
                    console.log(key, styles[key]);
                    loadCSS(styles[key].handle, styles[key].src);
                }
            });
            Object.keys(scripts).forEach(key => {
                if(!$('#'+key+'-js').length){
                    console.log(key, scripts[key]);
                    if(scripts[key].extra && scripts[key].extra.data){
                        $('<script>')
                        .attr('type', 'text/javascript')
                        .attr('id', scripts[key].handle+'-extra')
                        .text(scripts[key].extra.data)
                        .appendTo('head');
                    }
                    $.cachedScript(scripts[key].src);
                }
            });
        }
        function pixfort_popup(link){
            $.alert({
                title: '',
                columnClass: '',
                backgroundDismiss: true,
                buttons: false,
                theme: 'pix-main-popup',
                content: '<div></div>',
                onOpenBefore: function () {
                    var self = this;
                    self.setColumnClass('col-2 pix-popup-edit');
                    self.showLoading(true);
                },
                onContentReady: function () {
                    var self = this;
                    return $.ajax({
                        url: link,
                        method: 'get'
                    }).done(function (response) {
                        var data = false;
                        try {
                            data =  JSON.parse(response);
                        } catch (e) {
                            return false;
                        }
                        if(data){
                            if(data.html){
                                let size = data.size + ' pix-popup-edit pix-popup-ready';
                                self.setColumnClass(size);
                                self.setContentAppend( '<div class="pix-popup-content-div">' + data.html + '</div>');
                                self.hideLoading(true);
                                setTimeout(function(){
                                    self.$body.addClass('pix-popup-animate');
                                    $('.pix-intro-img img').addClass('animated');
                                    $('body').trigger('pix_popup_open');
                                    pix_animation(self.$body, true);
                                    piximations.init();
                                    pix_init_c7();
                                    pixLoadImgs();
                                    // init_pix_maps();
                                    pixLoadMaps();
                                    pix_countdown();
                                    if(self.$body.find('[data-toggle="tooltip"]').length){
                                        self.$body.find('[data-toggle="tooltip"]').tooltip();
                                    }
                                    if($('[data-toggle="tooltip"]').length){
                                        $('[data-toggle="tooltip"]').tooltip();
                                    }

                                }, 200);
                                setTimeout(function(){
                                    self.$body.find('.elementor-invisible').removeClass('elementor-invisible');
                                    if (typeof elementorFrontend !== 'undefined' && elementorFrontend !== null) {
                                        if(elementorFrontend){
                                            elementorFrontend.hooks.addAction( 'init', function() {
                                                pix_animation(false, true);
                                            } );
                                            self.$body.find(".elementor-element").each(function() {
                                				elementorFrontend.elementsHandler.runReadyTrigger( jQuery( this ) );
                                			});
                                            // fix elementor init conflict
                                            // elementorFrontend.init();
                                            pix_animation(false, true);
                                            pix_animation(self.$body, true);
                                        }
                                    }
                                    if (typeof self.$body.find('.quform-form').quform == 'function') {
                                        self.$body.find('.quform-form').quform();
                                        if (self.$body.find('.quform-recaptcha').length && window.QuformRecaptchaLoaded) {
                                            window.QuformRecaptchaLoaded();
                                        }
                                    }

                                }, 300);
                                setTimeout(function(){
                                    pix_animation_display(self.$body);
                                    if(data.footer_content){
                                        self.setContentAppend( '<div class="pix-popup-footer-div">' +data.footer_content +'</div>' );
                                    }
                                    if(data.result && data.result.scripts && data.result.styles){
                                        pix_dynamic_popup_js(data.result.scripts, data.result.styles);
                                    }
                                }, 1000);
                                self.$body.find('.wpcf7 > form').each(function () {
                                    var $form = $( this );
                                    if(wpcf7.initForm != undefined){
                                        wpcf7.initForm( $form );
                                        if ( wpcf7.cached ) {
                                            wpcf7.refill( $form );
                                        }
                                    }else{
                                        wpcf7.init($(this)[0]);
                                    }
                                });
                                self.$body.find('.pix-close-popup').on('click', function(e){
                                    e.preventDefault();
                                    self.close();
                                });
                                self.$body.find('.pix_tabs_btns').each(function(i, elem){
                                    $(elem).find('.nav-item:first a').tab('show');
                                });
                                self.$body.find('.pix-shape-dividers').each(function(){
                                    if(!$(this).hasClass('loaded')){
                                        let divider = new dividerShapes(this);
                                        divider.initPoints();
                                        $(this).addClass('loaded');
                                    }
                                });
                            }
                        }
                    }).fail(function(){
                        self.setContent('Something went wrong, please try again.');
                    });
                }
            });
        }

        window.pixOpenPopup = function(id){
            if(pixfort_main_object.hasOwnProperty('dataPopupBase')){
                let link = pixfort_main_object.dataPopupBase + '&id=' + id;
                pixfort_popup(link);
            }
        }

        if(pixfort_main_object.hasOwnProperty('dataBodyBg')){
            $('body').css({'background-color': pixfort_main_object.dataBodyBg});
        }
        if(pixfort_main_object.hasOwnProperty('dataExitPopup')){
            setTimeout(function(){
                var link = pixfort_main_object.dataExitPopup;
                var checkLink = pixfort_main_object.dataPopupCheckLink;
                var exit_opened = false;
                if(checkLink){
                    checkLink += '&exitpopup=true';
                    $.ajax({
                        url: checkLink,
                        method: 'get'
                    }).done(function (response) {
                        try {
                            var data =  JSON.parse(response);
                            if(data&&data.result){
                                if(link&&link!=''){
                                    addEvent(document, "mouseout", function(e) {
                                        if(!exit_opened){
                                            e = e ? e : window.event;
                                            var from = e.relatedTarget || e.toElement;
                                            if (!from || from.nodeName == "HTML") {
                                                exit_opened = true;
                                                pixfort_popup(link);
                                            }
                                        }
                                    });
                                }
                            }
                        } catch (e) {
                            return false;
                        }
                    });
                }
            },0);
        }

        if(pixfort_main_object.hasOwnProperty('dataAutoPopup')){
            setTimeout(function(){
                var link = pixfort_main_object.dataAutoPopup;
                var checkLink = pixfort_main_object.dataPopupCheckLink;
                var time = 1000;
                if(pixfort_main_object.hasOwnProperty('dataAutoPopupTime')){
                    time = pixfort_main_object.dataAutoPopupTime;
                }
                if(time && !isNaN(time)){
                    time = time * 1000;
                }else{
                    time = 5000;
                }
                if(checkLink){
                    checkLink += '&autopopup=true';
                    $.ajax({
                        url: checkLink,
                        method: 'get'
                    }).done(function (response) {
                        try {
                            var data =  JSON.parse(response);
                            if(data&&data.result){
                                if(link&&link!=''){
                                    setTimeout(function(){
                                        pixfort_popup(link);
                                    }, time);
                                }
                            }
                        } catch (e) {
                            return false;
                        }
                    });
                }
            },0);
        }
        if($('.pix-cookie-banner').length){
            setTimeout(function(){
                if(pixfort_main_object.hasOwnProperty('datacookiesId')){
                    let currentCookies = localStorage.getItem("pix_cookiesbanner");
                    if(currentCookies && currentCookies == pixfort_main_object.datacookiesId){
                        $('.pix-cookie-banner').addClass('pix-closed');
                        setTimeout(function(){
                            $('.pix-cookie-banner').remove();
                        }, 2500);
                    }
                }else{
                    var checkLink = pixfort_main_object.dataPopupCheckLink;
                    if(checkLink){
                        checkLink += '&cookiesbanner=true';
                        $.ajax({
                            url: checkLink,
                            method: 'get'
                        }).done(function (response) {
                            try {
                                var data = JSON.parse(response);
                                if(data){
                                    if(data.result===false){
                                        setTimeout(function(){
                                            $('.pix-cookie-banner').addClass('pix-closed');
                                        }, 2000);
                                        setTimeout(function(){
                                            $('.pix-cookie-banner').remove();
                                        }, 2500);
                                    }else{
                                        // $('.pix-cookie-banner').removeClass('pix-closed');
                                    }
                                }
                            } catch (e) {
                                return false;
                            }
                        });
                    }
                }

            },0);
        }

        // // woocommerce product preview popup
        // $('.pix-product-preview').on('click', function(e){
        //     e.preventDefault();
        //     var link = $(this).data('preview-link');
        //     $.alert({
        //         title: '',
        //         columnClass: 'col-12 col-sm-10',
        //         backgroundDismiss: true,
        //         theme: 'pix-product-popup',
        //         closeIcon: true,
        //         content: '<div></div>',
        //         onOpenBefore: function () {
        //             var self = this;
        //             self.showLoading(true);
        //         },
        //         onContentReady: function () {
        //             var self = this;
        //             return $.ajax({
        //                 url: link,
        //                 method: 'get'
        //             }).done(function (response) {
        //                 self.setContentAppend( '<div class="pix-popup-content-div">' + response + '</div>');
        //                 self.hideLoading(true);
        //                 setTimeout(function(){
        //                     self.$body.addClass('pix-popup-animate');
        //                 }, 300);
        //             }).fail(function(){
        //                 self.setContent('Something went wrong, please try again.');
        //             });
        //         }
        //     });
        // });
        $('body').on( 'click', '.flickity-slider, .flickity-button', function(e){
            pix_animation_display();
        });
        $('body').on( 'click', '.pix-popup-link', function(e){
            e.preventDefault();
            if($(this).data('popup-link')&&$(this).data('popup-link')!=''){
                var link = $(this).data('popup-link');
                pixfort_popup(link);
            }
            return false;
        });

        $('body').on( 'click', '.pix-story-popup', function(e){
            e.preventDefault();
            var stories = $(this).data('stories');
            if(stories&&stories!=''){
                var aspect = 'embed-responsive-21by9';
                var html = '';
                html += '<div class="firas2 pix-popup-content-div"><div class="pix-story-slider bg-black pix-slider-story no-dots2">';
                $.each(stories, function(i, el){
                    html += '<div class="carousel-cell p-0">';
                    html += '<img class="jarallax-img pix-fit-cover w-100 pix-opacity-8" src="'+el+'" />';
                    html += '</div>';
                });
                html += '</div>';
                html += '</div>';
                $.alert({
                    title: '',
                    columnClass: 'col-12 col-sm-6',
                    backgroundDismiss: true,
                    buttons: false,
                    theme: 'pix-video-popup',
                    content: html,
                    onOpenBefore: function () {
                        this.showLoading(true);
                    },
                    onContentReady: function(){
                        let self = this;
                        if( $('.pix-story-slider').length>0 ){
                            // pixLoadSlider(function(){
                                $('.pix-story-slider').flickity({
                                    draggable: true,
                                    adaptiveHeight: true,
                                    wrapAround: true,
                                    autoPlay: 3500,
                                    prevNextButtons: false,
                                    imagesLoaded: true,
                                    contain: true,
                                    resize: true,
                                    ready: function(){
                                        $('.pix-story-slider').flickity('resize');
                                    },
                                    on: {
                                        ready: function() {
                                            $(this).closest('.pix-story-slider').show();
                                            $(this).closest('.pix-story-slider').removeClass('d-in');
                                            $(this).removeClass('d-in');
                                            setTimeout(function(){
                                                self.$body.addClass('pix-popup-animate');
                                            }, 400);
                                            setTimeout(function(){
                                                self.hideLoading(true);
                                            }, 600);
                                        }
                                    }
                                });
                            // });
                        }
                    }
                });
            }
            return false;
        });
        $('body').on( 'click', '.pix-video-popup', function(e){
            e.preventDefault();
            if($(this).data('content')&&$(this).data('content')!=''){
                var content = $(this).data('content');
                var aspect = 'embed-responsive-21by9';
                if($(this).data('aspect')&&$(this).data('aspect')!=''){
                    aspect = $(this).data('aspect');
                }
                var html = '';
                html += '<div class="pix-video video-active">';
                html += '<div class="embed-responsive '+aspect+'">';
                html += content;
                html += '</div>';
                html += '</div>';
                $.alert({
                    title: '',
                    columnClass: 'col-12',
                    backgroundDismiss: true,
                    buttons: false,
                    theme: 'pix-video-popup',
                    content: html,
                    onContentReady: function(){
                        this.$content.find('iframe').each(function(i, elem){
                            let src = $(elem).data('src');
                            // elem.src = "";
                            $(elem).attr('src', src).click();
                            setTimeout(function(){
                                $(elem).click();
                            }, 1000);
                        });
                    }
                });
            }
            return false;
        });

        $('body').on( 'click', '.pix-audio-popup', function(e){
            e.preventDefault();
            if($(this).data('content')&&$(this).data('content')!=''){
                var content = $(this).data('content');
                var aspect = 'embed-responsive-21by9';
                if($(this).data('aspect')&&$(this).data('aspect')!=''){
                    aspect = $(this).data('aspect');
                }
                var html = '';
                html += content;
                $.alert({
                    title: '',
                    columnClass: 'col-12',
                    backgroundDismiss: true,
                    buttons: false,
                    theme: 'pix-audio-popup',
                    content: html,
                    onContentReady: function(){
                        this.$content.find('iframe').each(function(i, elem){
                            let src = $(elem).data('src');
                            $(elem).attr('src', src).click();
                            setTimeout(function(){
                                $(elem).click();
                            }, 1000);
                        });

                    }
                });
            }
            return false;
        });

        $('body').on( 'click', '.pix-search-toggle', function(e){
            e.preventDefault();
            let self = $(this);
            self.closest('.pix-search-sm-btn').toggleClass('is-opened');
            if(self.closest('.pix-search-sm-btn').hasClass('is-opened')){
                setTimeout(function(){
                    self.closest('.pix-search-sm-btn').find('input.pix-ajax-search').focus();
                }, 300);
            }

            if( window.innerWidth < mobileBreakPoint ){
                $(this).closest('.navbar').css({'overflow': 'visible'});
                $(this).closest('header.pix-header-mobile').css({'overflow': 'visible'});
                let width = $(this).closest('.pix-search-sm-btn').width();
                let left = $(this).offset().left;
                left -= 10;
                left *= -1;
                $(this).closest('.pix-search-sm-btn').find('.pix-header-floating-search').css({
                    left: left,
                    right: 'auto'
                });
            }

            return false;
        });


        // header optimisation
        let pixfort_one,
            pixfort_top,
            pixfort_main,
            pixfort_stack,
            pixfort_m_top,
            pixfort_m_main,
            pixfort_m_stack = false;
        if( $('.pix-header-transparent-parent').length ){
            pixfort_one = $('.pix-header-transparent-parent');
        }else if( $('.pix-header-boxed').length ){
            pixfort_one = $('.pix-header-boxed');
        }else{
            if( $('.pix-topbar.pix-header-desktop').length ){
                pixfort_top = $('.pix-topbar.pix-header-desktop');
            }
            if( $('.pix-header.pix-header-desktop').length ){
                pixfort_main = $('.pix-header.pix-header-desktop');
            }
            if( $('.pix-header-stack.pix-header-desktop').length ){
                pixfort_stack = $('.pix-header-stack.pix-header-desktop');
            }
        }
        if( $('.pix-topbar.pix-header-mobile').length ){
            pixfort_m_top = $('.pix-topbar.pix-header-mobile');
        }
        if( $('.pix-header.pix-header-mobile').length ){
            pixfort_m_main = $('.pix-header.pix-header-mobile');
        }
        if( $('.pix-stack-mobile').length ){
            pixfort_m_stack = $('.pix-stack-mobile');
        }
        let header_mode = 'desktop';
        if( window.innerWidth >= mobileBreakPoint ){
            if(pixfort_m_top) pixfort_m_top.remove();
            if(pixfort_m_main) pixfort_m_main.remove();
            if(pixfort_m_stack) pixfort_m_stack.remove();
        }else{
            header_mode = 'mobile';
            if(pixfort_one) pixfort_one.remove();
            if(pixfort_top) pixfort_top.remove();
            if(pixfort_main) pixfort_main.remove();
            if(pixfort_stack) pixfort_stack.remove();
        }
        $(window).resize(function(){
            if( window.innerWidth >= mobileBreakPoint ){
                if(header_mode==='mobile'){
                    header_mode = 'desktop';
                    if(pixfort_m_top) pixfort_m_top.remove();
                    if(pixfort_m_main) pixfort_m_main.remove();
                    if(pixfort_m_stack) pixfort_m_stack.remove();

                    if(pixfort_one) $('#page').prepend(pixfort_one);
                    if(pixfort_stack) $('#page').prepend(pixfort_stack);
                    if(pixfort_main) $('#page').prepend(pixfort_main);
                    if(pixfort_top) $('#page').prepend(pixfort_top);
                    pix_animation(false, true);
                }
            }else{
                if(header_mode==='desktop'){
                    header_mode = 'mobile';
                    if(pixfort_one) pixfort_one.remove();
                    if(pixfort_top) pixfort_top.remove();
                    if(pixfort_main) pixfort_main.remove();
                    if(pixfort_stack) pixfort_stack.remove();

                    if(pixfort_m_stack)  $('#page').prepend(pixfort_m_stack);
                    if(pixfort_m_main)  $('#page').prepend(pixfort_m_main);
                    if(pixfort_m_top)  $('#page').prepend(pixfort_m_top);
                    pix_animation(false, true);
                }
            }
        });



        // Misc actions
        $('body').on( 'click', '.hamburger.small-menu-toggle', function(e){
            if($(this).attr('aria-expanded')==='true'){
                $(this).removeClass('is-active');
            }else{
                $(this).addClass('is-active');
            }
        });
        $('body').on( 'click', '.hamburger.normal-menu-toggle', function(e){
            e.preventDefault();
            // $(this).closest('.navbar-nav').find('li').removeClass('d-md-flex');
            if($(this).hasClass('is-active')){
                $(this).removeClass('is-active');
                // $(this).closest('.navbar-nav').find('li').addClass('is-shown').hide(300);
                $(this).closest('.navbar-nav').find('li').removeClass('is-shown');
            }else{
                $(this).addClass('is-active');
                // $(this).closest('.navbar-nav').find('li').show(300);
                $(this).closest('.navbar-nav').find('li').addClass('is-shown');
            }
        });
        $('body').on( 'click', '.pix-tabs-btn', function(e){
            var el = $(this).closest('.pix_tabs_container');
            let $sliders = el.find('.pix-main-slider');
            $sliders.each(function(i, elem){
                $(elem).addClass('pix-tabs-slider');
                $(elem).removeClass('pix-slider-loaded');
            });
            init_portfolio($(this).closest('.pix_tabs_container'));
            setTimeout(function(){
                init_fancy_mockup(el);
                pix_main_slider(el);

            }, 500);
        });

        // Remove empty paragraph padding
        $('p:empty').each(function(i, el){
            if(!$(el).attr('class') || $(el).attr('class')===''){
                if($(el).attr('role')===undefined){
                    $(el).remove();
                }
            }
        });
        // elementor fix
        $('.animate-in, .pix-main-slider, .pix-fancy-mockup, .feature_img').closest('.elementor-invisible').removeClass('elementor-invisible');
        $('.particles-wrapper2').closest('.vc_column_container').css('z-index', '3');

        $('.entry-content2 > section, .elementor-section-wrap > section').each(function(i, elem){
            if(!$(elem).find('.sticky-top').length){
                if(
                    $(elem).find('.pix-slider').length
                    || $(elem).find('.pix-scale-in-sm').length
                    || $(elem).find('.pix-scale-in').length
                    || $(elem).find('.pix-scale-in-lg').length
                ){
                    $(elem).removeClass('vc_section_visible vc_row_visible').addClass('overflow-hidden');
                }
            }
        });
        $('body').on("click", '.dropdown-item.dropdown-toggle', function(e){
            $(this).closest('.menu-item.dropdown.nav-item').find('> .dropdown-menu').toggleClass('show');
            e.stopPropagation();
            e.preventDefault();
        });



        var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
        if(isSafari){
            $('body').addClass('pix-is-safari');
            $('.pix-slider-full').closest('section:not(.overflow-visible)').removeClass('vc_section_visible').addClass('overflow-hidden');
            $('.pix-slider-full').closest('.vc_row:not(.overflow-visible)').removeClass('vc_row_visible').addClass('overflow-hidden');
            $('.pix-scene').each(function(i, el){
                $(el).closest('section:not(.overflow-visible)').removeClass('vc_section_visible').addClass('overflow-hidden');
            });
        }

        // Make sure to search suggestions
        $('.pix-small-search').closest('.vc_row').css({"z-index": 50});
        $('.pix_element_overlay').each(function(i, el){
            $(el).css({
                'border-radius': $(el).parent().css('border-radius')
            });
        });
        setTimeout(function(){
            $('.bg-video').each(function(i, elem){
                $(elem).controls = false;
                elem.controls = false;
            });
        }, 1000);

        if($('.pix-post-area').length>0){
            NProgress.configure({
                minimum: 0.0001,
                trickleRate: 0.02,
                easing: false,
                trickleSpeed: 800,
                showSpinner: false,
                parent: 'body',
                template: '<div class="bar" role="bar"><div class="peg"></div></div>'
            });
        }

        var entry_top = 0;
        var entry_height = 0;
        if($('.pix-post-area').length>0){
            entry_top = $('#pix-entry-content').offset().top;
            entry_height = $('#pix-entry-content').height();
        }

        var mainFooter = false;
        if( $('.site-footer2:not(.pix-sticky-footer)').length ){
            mainFooter = $('.site-footer2:not(.pix-sticky-footer)')[0];
        }
        var windowHeight = $(window).height();

        document.addEventListener('scroll', (e) => {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                $('.back_to_top').addClass('active');
            } else {
                $('.back_to_top').removeClass('active');
            }
            if($('.pix-post-area').length>0){
                if(document.documentElement.scrollTop>entry_top){
                    let prog = 0.0;
                    if(document.documentElement.scrollTop>(entry_top+entry_height)){
                        prog = 0.999;
                        NProgress.set(prog);
                    }else{
                        prog = (document.documentElement.scrollTop - entry_top)/entry_height;
                        NProgress.set(prog);
                    }
                }else{
                    NProgress.set(0.001);
                }
            }

            if (mainFooter) {
                var footerRect = mainFooter.getBoundingClientRect();
                if( footerRect.top < windowHeight ){
                    pix_animation_display( $('.site-footer2:not(.pix-sticky-footer)') );
                }
            }
        }, {
          passive: true
      });


        // Back to top
        var scroll_top_duration = 700,
        back_to_top = $('.back_to_top');
        back_to_top.on('click', function(e){
            e.preventDefault();
            $('body,html').animate({scrollTop: 0}, scroll_top_duration);
            return false;
        });

        // Smooth scroll
        let header_height = 0;
        if($('#masthead').length){
            header_height = $('#masthead').height()
        }
        if($('#wpadminbar').length){
            header_height += $('#wpadminbar').height();
        }
        $('body').on('click', 'a', function(event){
            let self = this;
            var link = $(this).attr('href');
            let target = $(this).attr('target');
            if(link!== 'undefined' && link != undefined){
                if( link && link.startsWith('#pix_section') ){
                    if($(link).length){
                        event.preventDefault();
                        $('body,html').animate({scrollTop: $(link).offset().top - header_height }, scroll_top_duration);
                        setTimeout(function(){
                            $(self).closest('.navbar').find('.navbar-toggler.hamburger').click();
                        }, 200);
                        return false;
                    }
                }else if ( link.indexOf("#pix_section") != -1 ) {
                    let id = link.substr(link.indexOf("#"));
                    if($(id).length){
                        event.preventDefault();
                        $('body,html').animate({scrollTop: $(id).offset().top - header_height }, scroll_top_duration);
                        setTimeout(function(){
                            $(self).closest('.navbar').find('.navbar-toggler.hamburger').click();
                        }, 200);
                        return false;
                    }else{
                        if(target=='_blank'){
                            e.preventDefault();
                            e.stopPropagation();
                            window.open(link);
                            return false;
                        }else{
                            window.location = link;
                        }
                    }
                }else if( link && link.startsWith('#pix_popup_') ){
                    event.preventDefault();
                    let id = link.replace("#pix_popup_", "");
                    if(id){
                        pixOpenPopup(id);
                    }
                    return false;
                }else if( link && link.startsWith('#pix-product-') ){
                    if($(link).length){
                        event.stopPropagation();
                        event.preventDefault();
                            $('body,html').animate({scrollTop: $(link).offset().top - header_height - 20 }, scroll_top_duration);
                        return false;
                    }
                }else if( link && link.startsWith('#pix-tab-') && !$(this).hasClass('pix-tabs-btn') ){
                    if($(link).length){
                        event.stopPropagation();
                        event.preventDefault();
                        let tabID = link.replace("#", "");
                        $('.pix-tabs-btn[aria-controls="'+tabID+'"]').click();
                        setTimeout(function(){
                            $('body,html').animate({scrollTop: $(link).offset().top - header_height - 20 }, scroll_top_duration);
                        }, 200);

                        return false;
                    }
                }else if ( link && link.indexOf("#pix-tab-") != -1 && !$(this).hasClass('pix-tabs-btn')  ) {
                    let tabID = link.substr(link.indexOf("#pix-tab-"));
                    let tabIDName = tabID.replace("#", "");
                    $('.pix-tabs-btn[aria-controls="'+tabIDName+'"]').click();
                    if($(tabID).length){
                        setTimeout(function(){
                            $('body,html').animate({scrollTop: $(tabID).offset().top - header_height - 20 }, scroll_top_duration);
                        }, 200);

                    }
                }
            }
        });


        function is_touch_device() {
          try {
            document.createEvent("TouchEvent");
            return true;
          } catch (e) {
            return false;
          }
        }
        nav_link_init();
        window.addEventListener("resize", nav_link_init);
        function nav_link_init(){
            let IS_TOUCH_DEVICE = is_touch_device();
            // let IS_MOBILE_DEVICE = false;
            // if($( window ).width()<920){
            //     IS_MOBILE_DEVICE = true;
            // }
            // $('.dropdown-toggle').dropdown();

            $('.pix-nav-link.dropdown-toggle.nav-link').unbind('click');
            $('.pix-nav-link.dropdown-toggle.nav-link, .menu-item.menu-item-has-children.dropdown.nav-item a').on('click', function (e) {
                if($(this).attr('href')){
                    let link = $(this).attr('href');
                    let target = $(this).attr('target');
                    // if(!IS_MOBILE_DEVICE){
                        if(link&&!link.startsWith('#')){
                            // if(IS_TOUCH_DEVICE){
                                if ( link.indexOf("#pix_section") == -1 ) {
                                    if(!$(this).hasClass('pix-item-clicked') && (window.innerWidth < mobileBreakPoint)){
                                        $('.pix-item-clicked').removeClass('pix-item-clicked');
                                        $(this).addClass('pix-item-clicked');
                                    }else{
                                        if(target=='_blank'){
                                            e.preventDefault();
                                            e.stopPropagation();
                                            window.open(link);
                                            return false;
                                        }else{
                                            window.location = link;
                                        }
                                    }
                                }
                            // }else{
                            //     if ( link.indexOf("#pix_section") == -1 ) {
                            //         if(target=='_blank'){
                            //             e.preventDefault();
                            //             e.stopPropagation();
                            //             window.open(link);
                            //             return false;
                            //         }else{
                            //             window.location = link;
                            //         }
                            //     }

                            // }
                        }
                    // }

                }
            });
        }



        var page_hash = location.hash.substr(1);
        if( page_hash ){
            if( page_hash.startsWith('pix_section') ){
                if($('#'+page_hash).length){
                    setTimeout(function(){
                        $('body,html').animate({scrollTop: $('#'+page_hash).offset().top - header_height }, scroll_top_duration);
                    }, 700);
                }
            }else if( page_hash.startsWith('pix-tab') ){
                if($('#'+page_hash).length){
                    setTimeout(function(){
                        $('.pix-tabs-btn[aria-controls="'+page_hash+'"]').click();
                        setTimeout(function(){
                            $('body,html').animate({scrollTop: $('#'+page_hash).offset().top - header_height - 20 }, scroll_top_duration);
                        }, 200);
                    }, 500);
                }
            }
        }

        // Fix intro loading inside VC
        setTimeout(function(){
            $('.pix-intro-img').addClass('pix-loaded');
        }, 2000);

        // Init bootstrap tooltip
        if($('[data-toggle="tooltip"]').length){
            $('[data-toggle="tooltip"]').tooltip();
        }

        // pixfort custom dropdown
        $('.pixfort-select').selectpicker({
            styleBase: 'btn dropdown-toggle btn-light bg-white shadow-sm2 font-weight-bold text-body-default text-sm'
        });
        $('.widget:not(.widget_categories) select, .wp-block-archives.wp-block-archives-dropdown select, .wp-block-categories.wp-block-categories-dropdown select').selectpicker({
            styleBase: 'pix-widget-select pix-mb-15 btn dropdown-toggle btn-light bg-white shadow-sm2 font-weight-bold text-body-default text-sm'
        });

        // $('.pixfort-shop-select').selectpicker({
        //     styleBase: 'btn dropdown-toggle btn-light bg-white shadow-sm font-weight-bold text-body-default text-sm'
        // });

        $('.widget.widget_categories select').selectpicker({
            styleBase: 'pix-widget-select pix-mb-15 btn dropdown-toggle btn-light bg-white shadow-sm2 font-weight-bold text-body-default text-sm',
            container: 'body'
        });
        $('.widget.widget_categories select').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            e.preventDefault();
            $(this).closest('form').submit();
            e.stopPropagation();
            return false;
        });

        // Video element
        $('body').on( 'click', '.video-play-btn-inline', function(e){
            e.preventDefault();
            var btn = $(this);
            var iframe = btn.closest('.pix-video').find('iframe');
            if(iframe.attr('data-src')) {
                iframe.attr('src', iframe.attr('data-src')).click();
            }
            btn.closest('.pix-video').find('video').trigger('play');
            
            btn.parent('.pix-video').addClass('video-active');
            setTimeout(function() {
                btn.parent('.pix-video').addClass('video-start');
            }, 400);
            return false;
        });


        // Header
        var header_top = 0;
        if($('#masthead').length){
            header_top = $('#masthead').offset().top;
        }
        if($('#masthead').hasClass('pix-mt-20')){
            header_top +=20;
        }

        if($('.pix-header-transparent').length>0){
            var tran_height = $('.pix-header-transparent > div').height();
            $('.pix-main-intro-placeholder').addClass('d-block w-100').height(tran_height);
        }
        if($('.pix-header-boxed').length>0){
            var tran_height = $('.pix-header-boxed > div').height();
            $('.pix-main-intro-placeholder').addClass('d-block w-100').height(tran_height);
        }

        if($('.pix-header').length>0){
            let top = $('.pix-header').height() + 20;
            if($('#wpadminbar').length>0){
                top += $('#wpadminbar').height();
            }
            if($('#masthead').length>0){
                if($('#masthead').hasClass('pix-header-box')){
                    top += 20;
                }
            }
            $('.pix-sticky-top-adjust').css({"top": top});
        }

        // Blog floating meta box (comments + likes)
        var update_meta = false;
        if($('.pix-floating-meta').length){
            if($( window ).width()>1300){
                update_meta = true;
                var blog_post = $('.post').offset().top;


                $('.pix-floating-meta').addClass('position-fixed sticky-top2').css({
                    'top': blog_post,
                    'width': "70px",
                    'margin-left': "-90px",
                });
                if( $('.post').hasClass('post-sidebar-left') ){
                    var blog_post_right = $('.post:first-of-type').offset().left+$('.post:first-of-type').width() + 20;
                    $('.pix-floating-meta').addClass('position-fixed sticky-top2').css({
                        'left': blog_post_right,
                        'margin-left': "0px",
                    });
                }

                var top_val = 20;
                if($('#masthead').length){
                    top_val += $('#masthead').height();
                }
                if($('#wpadminbar').length){
                    top_val += $('#wpadminbar').height();
                }
                var blog_post_end = $('.post').offset().top + $('.post').height();
            }
        }else{
            update_meta = false;
        }
        if($('.pix-floating-meta').length){
            $(window).resize(function(){
                if($( window ).width()<1300){
                    update_meta = false;
                    $('.pix-floating-meta').removeClass('position-fixed sticky-top2').css({
                        'top': 'auto',
                        'width': "auto",
                        'margin-left': "0px",
                    });
                }else{
                    update_meta = true;
                    if($('.post').length){
                        var blog_post = $('.post').offset().top;
                        $('.pix-floating-meta').addClass('position-fixed sticky-top2').css({
                            'top': blog_post,
                            'width': "70px",
                            'margin-left': "-90px",
                        });
                        if( $('.post').hasClass('post-sidebar-left') ){
                            var blog_post_right = $('.post:first-of-type').offset().left+$('.post:first-of-type').width() + 20;
                            $('.pix-floating-meta').addClass('position-fixed sticky-top2').css({
                                'left': blog_post_right,
                                'margin-left': "0px",
                            });
                        }
                        var top_val = 20;
                        if($('#masthead').length){
                            top_val += $('#masthead').height();
                        }
                        if($('#wpadminbar').length){
                            top_val += $('#wpadminbar').height();
                        }
                        var blog_post_end = $('.post').offset().top + $('.post').height();
                    }

                }
            });
        }

        let body_padding = 0;
        let body_padding_bottom = 0;
        if($('body').hasClass('pix-padding-style')){
             body_padding = $('body').css('padding-left');
             body_padding_bottom = $('body').css('padding-bottom');
            if(body_padding&&body_padding!=''&&body_padding!='0'&&body_padding!='0px'){
                $('.vc_row-fluid').css({
                    'padding-left': body_padding,
                    'padding-right': body_padding
                });
                $('.back_to_top').css({
                    'margin-left': body_padding,
                    'margin-right': body_padding,
                });
                if(body_padding_bottom){
                    $('.back_to_top').css({ 'margin-bottom': body_padding_bottom });
                }
            }else{
                body_padding = 0;
            }
        }




        var header_scroll_val = 50;
        var header_text_class = '',
            header_text_scroll = '';
        if($('#page').length){
            header_scroll_val = $('#page').offset().top;
            if($('.pix-topbar').length){
                header_scroll_val += $('.pix-topbar').height();
            }
        }
        if(header_scroll_val===0){
            header_scroll_val = 6;
        }
        if($('#masthead').length){
            if($('#masthead').hasClass('pix-mt-20')){
                header_scroll_val +=20;
            }
            if($('#masthead').data('text-scroll') && $('#masthead').data('text-scroll') != ''){
                header_text_class = 'text-' + $('#masthead').data('text');
                header_text_scroll = 'text-' + $('#masthead').data('text-scroll');
            }

        }

        if($('#wpadminbar').length){
            header_scroll_val += $('#wpadminbar').height();
        }

        var header_scroll_class = $('.pix-header-container-area').attr('data-scroll-class');
        var header_scroll_color = $('.pix-header-container-area').attr('data-scroll-color');
        var header_bg_class = $('.pix-header-container-area').attr('data-bg-class');
        var header_bg_color = $('.pix-header-container-area').attr('data-bg-color');


        // sticky header option
        var pix_enable_sticky = false;
        if($('.pix-is-sticky-header').length){
            pix_enable_sticky = true;
        }
        // Moible header sticky option 1
        let pix_enable_mobile_sticky = false;
        let pix_mobile_header_height = 0;
        let mobile_header_scroll_val = header_scroll_val;
        if($('.pix-mobile-header-sticky').length && $('#mobile_head').length){
            pix_enable_mobile_sticky = true;
            pix_mobile_header_height = $('#mobile_head').outerHeight();
            mobile_header_scroll_val = $('#mobile_head').offset().top;
        }
        $('.pix-header-container-area .pix-header-text').addClass(header_text_class);

        $('.pix-header-scroll-placeholder').addClass('d-none');
        $('.pix-header-scroll-placeholder').css({'height': $('.pix-header-normal').height()});


        let isScroll = false;
        document.addEventListener('scroll', (e) => {
            if(update_meta){
                if ( ($(this).scrollTop()+top_val) > blog_post ){
                    if (($(this).scrollTop()+top_val) > blog_post_end){
                        $('.pix-floating-meta').addClass('is-hidden');
                    }else{
                        $('.pix-floating-meta').css({
                            'top': top_val
                        }).removeClass('is-hidden');
                    }
                }else{
                    $('.pix-floating-meta').css({
                        'top': blog_post - $(this).scrollTop()
                    }).removeClass('is-hidden');
                }
            }



            if(pix_enable_mobile_sticky){
                if (($(this).scrollTop() > header_scroll_val)){
                    pix_mobile_header_height = $('#mobile_head').outerHeight();
                    $('#mobile_head').addClass('pix-mobile-sticky shadow');
                    $('.pix-mobile-header-sticky').height(pix_mobile_header_height);
                }else if (($(this).scrollTop() < (header_scroll_val-5))){
                    $('#mobile_head').removeClass('pix-mobile-sticky shadow');
                    $('.pix-mobile-header-sticky').height(0);
                }
            }
            if(pix_enable_sticky){

                if (($(this).scrollTop() > header_scroll_val)){

                    if(!isScroll){
                        isScroll = true;
                        if(body_padding!=0){
                            $('.pix-header-box').css('padding-left', body_padding);
                            $('.pix-header-box').css('padding-right', body_padding);
                        }
                        $('.pix-header').addClass('is-scroll');
                        if($( window ).width() > 600){
                            $('.pix-topbar').addClass('pix-hidden');
                        }
                        $('.pix-header-container-area').removeClass(header_bg_class);
                        $('.pix-header-container-area').addClass(header_scroll_class);
                        $('.pix-header-container-area').css('background', header_scroll_color);

                        $('.pix-header-container-area .pix-header-text').removeClass(header_text_class);
                        $('.pix-header-container-area .pix-header-text').addClass(header_text_scroll);

                        $('.pix-header-boxed').addClass('pix-boxed-sticky pix-scroll-shadow');
                        $('.pix-header-box:not(.pix-no-topbar)').addClass('pix-pt-20');


                        if(body_padding!=0){
                            $('.pix-header-transparent-full').css('padding-left', body_padding);
                            $('.pix-header-transparent-full').css('padding-right', body_padding);
                        }
                        $('.pix-header-transparent').addClass('pix-transparent-sticky');
                        $('.pix-header-normal').addClass('pix-normal-sticky');
                        if($('.pix-header-normal').length){
                            $('.pix-header-scroll-placeholder').removeClass('d-none');
                            $('.pix-header-scroll-placeholder').css({'height': $('.pix-header-normal').height()});
                        }
                    }

                }else if (($(this).scrollTop() < (header_scroll_val-5))){
                    isScroll = false;
                    if($('.pix-header-normal').length){
                        $('.pix-header-scroll-placeholder').addClass('d-none');
                    }

                    $('.pix-header').removeClass('is-scroll');
                    $('.pix-topbar').removeClass('pix-hidden');
                    $('.pix-header-container-area').removeClass(header_scroll_class);
                    $('.pix-header-container-area').addClass(header_bg_class);
                    $('.pix-header-container-area').css('background', "");
                    $('.pix-header-container-area').css('background', header_bg_color);


                    $('.pix-header-container-area .pix-header-text').removeClass(header_text_scroll);
                    $('.pix-header-container-area .pix-header-text').addClass(header_text_class);

                    $('.pix-header-boxed').removeClass('pix-boxed-sticky pix-scroll-shadow');
                    $('.pix-header-box:not(.pix-no-topbar)').removeClass('pix-pt-20');

                    if(body_padding!=0){
                        $('.pix-header-box').css('padding-left', '');
                        $('.pix-header-box').css('padding-right', '');
                    }

                    $('.pix-header-transparent').removeClass('pix-transparent-sticky');
                    $('.pix-header-normal').removeClass('pix-normal-sticky');
                    if(body_padding!=0){
                        $('.pix-header-transparent-full').css('padding-left', '');
                        $('.pix-header-transparent-full').css('padding-right', '');
                    }
                }
            }

        }, {
            passive: true
        });


        function dropMenuFix(){
            $('.mega-item').each(function(i, elem){
                if($(elem).hasClass('pix-mega-style-default')){
                    let areaStack= $(elem).closest('.pix-header-stack');            
                    let areaTop= $(elem).closest('.pix-topbar');            
                    if (areaStack.length||areaTop.length) {
                        let stackContainerWidth = $('.pix-header-stack > .container:first').width();
                        let leftMargin = (window.innerWidth - stackContainerWidth) / 2;
                        $(elem).find('> .dropdown-menu').each(function(i, dropdown){
                            $(dropdown).css({
                                'margin-left': 'auto'
                            });
                            let dropLeft = $(dropdown).offset().left;
                            let dropMargin = -1 * (dropLeft - leftMargin);
                            $(dropdown).css({
                            'width': stackContainerWidth,
                            'margin-left': dropMargin
                            });
                        });
                    }
                }else{
                    let el_left = $(elem).offset().left;
                    let drop = $(elem).find('>.dropdown-menu:first');
                    if(drop&&drop.length){
                        let drop_width = drop.width();
                        if(drop.hasClass('dropdown-menu-right')){
                            let r = el_left-drop_width+$(elem).width();
                            if( r < 0){
                                drop.css({
                                    'left': 0
                                });
                            }
                        }else{
                            let r = el_left+drop_width;
                            if( r > window.innerWidth){
                                drop.css({
                                    'right': 0
                                });
                            }
                        }  
                    }
                }
            });
        }
        dropMenuFix();
        window.addEventListener("resize", dropMenuFix);


        

        // Search
        setTimeout(function(){
            var elmOverlay = $('.shape-overlays')[0];
            var overlay = new ShapeOverlays(elmOverlay);
            $('.shape-overlays').addClass('d-none');
            $('.pix-overlay').addClass('d-none');
            $("body").on("click", '.pix-search-btn', function(e) {
                e.preventDefault();
                $('.shape-overlays').removeClass('d-none');
                $('.pix-overlay').removeClass('d-none');
                if(overlay){
                    if (overlay.isAnimating) {
                        return false;
                    }
                    overlay.toggle();
                    setTimeout(function(){
                        $('.pix-overlay-item').toggleClass('is-opened');
                    }, 20);
                }
                $('.pix-search-input').focus();
                return false;
            });
            $('.pix-search-close').on('click', function(e){
                e.preventDefault();
                if(overlay){
                    if (overlay.isAnimating) {
                        return false;
                    }
                    overlay.toggle();
                    $('.pix-overlay-item').toggleClass('is-opened');
                    setTimeout(function(){
                        $('.shape-overlays').addClass('d-none');
                        $('.pix-overlay').addClass('d-none');
                    }, 1000);
                }
                return false;
            });
            $(document).keyup(function(e) {
                if(overlay&&overlay.isOpened){
                    if (e.keyCode === 27) $('.pix-search-close').click();   // esc
                }
            });
        }, 0);


        if( window.innerWidth > mobileBreakPoint ){
            if($('body').hasClass('pix-sections-stack')&&!window.vc_iframe){
                if($('body').hasClass('elementor-page')){
                    $('.site-main .elementor-section-wrap > section, .site-main .elementor-section-wrap > div, .site-footer2').stack();
                }else{
                    $('.site-content section, .site-footer2').stack();
                }
                if($('.pix-cookie-banner').length){
                    pix_animation_display($('.pix-cookie-banner'), true);
                }
            }
        }else{
            $('body').removeClass('pix-sections-stack');
        }


        setTimeout(function(){
            pix_section_stack();
        }, 500);


        if( window.innerWidth > mobileBreakPoint ){
            $('.pix-sticky-footer').pixfooter();
        }else{
            $('.pix-sticky-footer').removeClass('pix-sticky-footer');
        }


        // firefox fix
        $('.pix-main-slider.clients').each(function(i, elem){
            var waypoint = new Waypoint({
                element: elem,
                offset: '100%',
                triggerOnce: true,
                handler: function() {
                    $('.pix-main-slider').flickity('resize');
                    setTimeout(function() {
                        $('.pix-main-slider').flickity('resize');
                    }, 500);
                    this.destroy();
                }
            });
        });






        // sidebar
        $('.pix-open-sidebar').on('click', function(e){
            e.preventDefault();
            $('.pix-sidebar').addClass('opened');
            return false;
        });
        $('.pix-close-sidebar').on('click', function(e){
            e.preventDefault();
            $('.pix-sidebar').removeClass('opened');
            return false;
        });


        // Banner
        $('.pix-banner-close').on('click', function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            var banner = $(this).closest('.pix-banner');
            $.ajax({
                url: link,
                method: 'GET'
            }).done(function (data) {
                // banner.addClass('pix-closed');

            }).fail(function(){
                // banner.addClass('pix-closed');
            });
            banner.addClass('pix-closed');
            return false;

        });

        // Cookies bar
        $('.pix-cookies-close').on('click', function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            var cookies_banner = $(this).closest('.pix-cookie-banner');
            $.ajax({
                url: link,
                method: 'GET'
            }).done(function (data) {
                // cookies_banner.addClass('pix-closed');

            }).fail(function(){
                // cookies_banner.addClass('pix-closed');
            });
            if(pixfort_main_object.hasOwnProperty('datacookiesId')){
                localStorage.setItem("pix_cookiesbanner", pixfort_main_object.datacookiesId);
                console.log("set");
            }
            cookies_banner.addClass('pix-closed');
            return false;
        });

        $('.widget_nav_menu .menu > .menu-item.menu-item-has-children > a').on('click', function(e){
            e.preventDefault();
            $(this).parent().toggleClass('active');
            $(this).parent().find('.sub-menu').slideToggle(300, 'linear');
            return false;
        });



        setTimeout(() => document.body.classList.add('render'), 0);
        setTimeout(function(){
            if($('body').hasClass(' vc_editor compose-mode')){
                return false;
            }
            piximations.init();
            pix_countdown();
            // init_pix_maps();
            pixLoadMaps();
            init_chart();
            update_collapse();
            update_numbers();
            update_masonry();
            init_bars();
            init_scroll_rotate();
            init_fancy_mockup();
            init_portfolio();
            video_element();
            pix_init_c7();
            init_tilts();
            init_Parallax();
            init_Parallax();
            pix_animation();
            pixLazy();
            $('.pix_tabs_btns').each(function(i, elem){
                $(elem).find('.nav-item:first a').tab('show');
            });
            $("body").on("click", 'a[data-toggle="pill"]', function(e) {
                $(this).closest('.pix_tabs_btns').find('.nav-link').removeClass('active');
            });
            $('.pix-contact7-form').each(function(i, elem){
                $('input[type="text"], input[type="email"], input[type="phone"], input[type="password"], textarea').each(function(i, el){
                    $(el).addClass('form-control');
                    $(el).closest('p').addClass('form-group');
                });
            });
            $('.vc_controls-out-tl').each(function(i, elem){
                if($(elem).offset().top<0){
                    $(elem).css({ top: '-17px' });
                }
            });
        }, 0);

        setTimeout(function(){
            pixLoadImgs();
        }, 3000);

        jQuery(document.body).on("post-load", function(e) {
            pix_animation();
        })

        $('.jarallax-video').each(function(){
            let src = false;
            if($(this).attr('data-pix-bg-video')){
                src = $(this).attr('data-pix-bg-video');
            }else{
                return false;
            }
            $(this).jarallax({
                speed: 0.4,
                videoSrc: src
            });
        });
        setTimeout(function(){
            $('.pix-video-elem source').each(function(){
                if($(this).parents('.navbar').length) return false;
                var sourceFile = $(this).attr("data-src");
                $(this).attr("src", sourceFile);
                var video = this.parentElement;
                video.load();
                video.play();
            });
        }, 10000);

        let navVideos = true;
        $('.navbar').hover(function(e) {
            if(navVideos){
                $(this).find('.pix-video-elem source').each(function(){
                    var sourceFile = $(this).attr("data-src");
                    $(this).attr("src", sourceFile);
                    var video = this.parentElement;
                    video.load();
                    video.play();
                });
                navVideos = false;
            }
        });
        // navbar pix-main-menu navbar-hover-drop navbar-expand-lg navbar-light d-inline-block2
        $('.intro-jarallax').jarallax({
            speed: 0.4,
            imgSize: 'object-fit',
            imgPosition: 'object-position',
        });

        /* ---------------------------------------------------------------------------
        * Pix overlay
        * --------------------------------------------------------------------------- */

        $('.pix-shape-dividers').each(function(){
            if(!$(this).hasClass('loaded')){
                let divider = new dividerShapes(this);
                divider.initPoints();
                $(this).addClass('loaded');
            }
        });

        pix_intro_bg();

        pix_init_particles();

        window.onpageshow = function(event) {
            if (event.persisted) {
                document.body.classList.add('render');
            }
        };

        $('body').addClass('pix-loaded');
        setTimeout(() => document.body.classList.add('render'), 0);
        setTimeout(() => $('.pix-loading-circ-path').remove(), 600);
        // setTimeout(function(){
        //     $('.flickity-enabled').flickity('resize')
        // }, 0);
        NProgress.done();
    });





    document.addEventListener("DOMContentLoaded", function() {
        let lazyImages = [].slice.call(document.querySelectorAll("img.pix-lazy"));
        let active = false;
        const lazyLoad = function() {
        if (active === false) {
          active = true;

          setTimeout(function() {
            lazyImages.forEach(function(lazyImage) {
              if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) ) {
                lazyImage.src = lazyImage.dataset.src;
                if(lazyImage.dataset.srcset) lazyImage.srcset = lazyImage.dataset.srcset;
                lazyImage.classList.remove("pix-lazy");

                lazyImages = lazyImages.filter(function(image) {
                  return image !== lazyImage;
                });

                if (lazyImages.length === 0) {
                  document.removeEventListener("scroll", lazyLoad);
                  window.removeEventListener("resize", lazyLoad);
                  window.removeEventListener("orientationchange", lazyLoad);
                }
              }
            });


            active = false;
          }, 200);
        }
    };
    window.pixLazy = function(){
        lazyLoad();
    }

    document.addEventListener("scroll", lazyLoad);
    window.addEventListener("resize", lazyLoad);
    window.addEventListener("orientationchange", lazyLoad);
});


    window.pixLoadImgs = function(){
        let lazyImages = [].slice.call(document.querySelectorAll("img.pix-lazy"));
        lazyImages.forEach(function(lazyImage) {
            lazyImage.src = lazyImage.dataset.src;
            lazyImage.classList.remove("pix-lazy");
            lazyImages = lazyImages.filter(function(image) {
              return image !== lazyImage;
            });
        });
    }

    window.pixInitJs = async function(el){
        if($('body').hasClass('vc_editor')){
            piximations.init();
            if(!el){
                el = $('body');
            }
            el.find('[data-toggle="tooltip"]').tooltip();
            // destroy_Parallax();
            // init_Parallax();
            $('.vc_controls-out-tl').each(function(i, elem){
                if($(elem).offset().top<0){
                    $(elem).css({ top: '-17px' });
                }
            });
            el.find('.pix-contact7-form').each(function(i, elem){
                $('input[type="text"], input[type="email"], input[type="phone"], input[type="password"], textarea').each(function(i, el){
                    $(el).addClass('form-control');
                    $(el).closest('p').addClass('form-group');
                });
            });
            el.find('.pix-shape-dividers').each(function(){
                if(!$(this).hasClass('loaded')){
                    let divider = new dividerShapes(this);
                    divider.initPoints();
                    $(this).addClass('loaded');
                }
            });
            pix_intro_bg();
        }
    }

    window.pix_init_particles = async function(){
        if( window.innerWidth < 600 ){
            pix_particles_test();
        }
        $(window).resize(function(){
            if( window.innerWidth < 600 ){
                pix_particles_test();
            }else{
                $('.pix-scene').css('display', 'block');
            }
        });
    }
    function pix_particles_test(){
        $('.pix-scene').each(function(i, elem){
            if( $(elem).find('.pix-scene-elm-res:not(.pix-particle-sm-hide)').length == 0 ){
                $(elem).css('display', 'none');
            }else{
                $(elem).css('display', 'block');
            }
        });
    }

    async function pix_intro_bg(){
        $('.pix-intro-1 .pix-intro-img img').each(function(i, elem){
            var self = this;
            var waypoint = new Waypoint({
                element: elem,
                offset: '100%',
                triggerOnce: true,
                handler		: function(){
                    setTimeout(function(){
                        $(self).addClass('animated');
                    }, 10);
                    setTimeout(function(){
                        $(self).addClass('slow-transition');
                    }, 1000);
                }
            });
        });
    }

    window.pix_cb_fn = async function(cb){
        setTimeout(cb, 0);
    }
    window.pix_init_c7 = async function(){
        $('.pix-contact7-form').each(function(i, elem){
            $('input[type="text"], input[type="email"], input[type="phone"], input[type="password"], select, textarea').each(function(i, el){
                $(el).addClass('form-control');
                $(el).closest('p').addClass('form-group');
            });
        });
    }

    window.update_masonry = async function(el){
        if(!el){
            el = $('body');
        }
        if(el.find('.pix_masonry').length){
            window.pixLoadIsotope(function(){
                el.find('.pix_masonry').each(function(i, elem){
                    setTimeout(function(){
                        $(elem).isotope({
                            itemSelector: '.grid-item',
                            percentPosition: true,
                            resize: true,
                            masonry: {
                                columnWidth: '.grid-sizer',
                                gutter: '.gutter-sizer'
                            }
                        });
                    }, 200);
                    setTimeout(function(){
                        $(elem).isotope( 'reloadItems' );
                        // pix_animation($(elem), true);
                        pix_animation(false, true);
                    }, 1900);
                });
            });
        }
    }
    window.init_fancy_mockup = async function(el){
        if(!el){
            el = $('body');
        }
        el.find('.pix-fancy-mockup').each(function(i, elem){
            var el_mockup = $(elem).find('.pix-fancy-device-img');
            var el_content = $(elem).find('.pix-fancy-content img');
            var e_top = $(elem).offset().top ;
            var range = $(elem).outerHeight();
            var rect = elem.getBoundingClientRect();
            var range_start = $(window).height();
            var range_end = $(window).height()/4;
            var range_total = range_start - range_end;
            var w_top = $(window).scrollTop() + $( window ).height();
            var percent = (rect.top - range_end) / range_total;
            var rot_per = 80*percent;
            var trans_per = 100* percent;
            var scale_per = 0.9 + (0.1*(1-percent));
            el_content.css({
                "transform": 'translate3d(0px, '+trans_per+'px, 0px) scale3d(1, '+scale_per+', 1) rotateX('+rot_per+'deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)'
            });
            el_mockup.css({
                "transform": 'translate3d(0px, '+trans_per+'px, 2px) scale3d(1, '+scale_per+', 1) rotateX('+rot_per+'deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)'
            });
            document.addEventListener('scroll', (e) => {
                rect = elem.getBoundingClientRect();
                if(rect.top <= range_start && rect.top >= range_end){
                    var percent = (rect.top - range_end) / range_total;
                    var rot_per = 80*percent;
                    var trans_per = 100* percent;
                    var scale_per = 0.9 + (0.1*(1-percent));
                    el_content.css({
                        "transform": 'translate3d(0px, '+trans_per+'px, 0px) scale3d(1, '+scale_per+', 1) rotateX('+rot_per+'deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)',
						"-webkit-transform": 'translate3d(0px, '+trans_per+'px, 0px) scale3d(1, '+scale_per+', 1) rotateX('+rot_per+'deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)'
                    });
                    el_mockup.css({
                        "transform": 'translate3d(0px, '+trans_per+'px, 2px) scale3d(1, '+scale_per+', 1) rotateX('+rot_per+'deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)',
						"-webkit-transform": 'translate3d(0px, '+trans_per+'px, 2px) scale3d(1, '+scale_per+', 1) rotateX('+rot_per+'deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)'
                    });
                }else if (rect.top > range_start) {
                    el_content.css({
                        "transform": 'translate3d(0px, 100px, 0px) scale3d(1, 0.9, 1) rotateX(80deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)',
						"-webkit-transform": 'translate3d(0px, 100px, 0px) scale3d(1, 0.9, 1) rotateX(80deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)'
                    });
                    el_mockup.css({
                        "transform": 'translate3d(0px, 100px, 2px) scale3d(1, 0.9, 1) rotateX(80deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)',
						"-webkit-transform": 'translate3d(0px, 100px, 2px) scale3d(1, 0.9, 1) rotateX(80deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)'
                    });
                }else{
                    el_content.css({
                        "transform": 'translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)',
						"-webkit-transform": 'translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)'
                    });
                    el_mockup.css({
                        "transform": 'translate3d(0px, 0px, 2px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)',
						"-webkit-transform": 'translate3d(0px, 0px, 2px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg)'
                    });
                }
            }, {
              passive: true
            });
        });

    }


    /* ---------------------------------------------------------------------------
    * Portfolio
    * --------------------------------------------------------------------------- */
    window.init_portfolio = async function(el){
        if($('.portfolio_grid').length || $('.portfolio_filter').length){
            window.pixLoadIsotope(function(){
                if(!el){
                    el = $('body');
                }
                let isoGrid = $('.portfolio_grid').isotope({
                    // options
                    itemSelector: '.grid-item',
                    resize: true,
                    packery: {
                        gutter: 0
                    },
                });
                isoGrid.on('arrangeComplete', function() {
                    pix_animation($('body'), true);
                }).isotope();
                $('.portfolio_filter').click(function(e){
                    e.preventDefault();
                    var el = $(this);
                    var filter = el.data('category');
                    var portfolio = el.closest('.pix-portfolio').find('.portfolio_grid');
                    $(this).closest('.pix-portfolio-nav').find('.portfolio_filter').removeClass( 'is-checked' );
                    $(this).addClass( 'is-checked' );
                    portfolio.isotope({
                        // options
                        itemSelector: '.grid-item',
                        // layoutMode: 'fitRows',
                        filter: filter
                    });
                    window.pix_animation_display( portfolio );
                    return false;
                });
                
                setTimeout(function() {
                    window.pix_animation( $('.portfolio_grid'), true );
                }, 1500);
            });
        }
    }

    /* ---------------------------------------------------------------------------
    * Elements Parallax
    * --------------------------------------------------------------------------- */
    window.pixParallax = [];
    window.init_Parallax = async function(){
        if($('body').hasClass('vc_editor')){
            if(typeof window.vc != 'undefined'){
                if(!window.vc.loaded){
                    return false;
                }
            }else{
                return false;
            }
        }
        $('.scene').each(function(){
            var parallaxInstance = new Parallax(this, {
                relativeInput: true
            });
            window.pixParallax.push(parallaxInstance);
        });
        $('.pix-scene').each(function(){
            var depth = $(this).find('.pix-scene-particle').attr('data-pix-depth');
            var parallaxInstance = new Parallax(this, {
                relativeInput: true,
                friction: (0.2, 0.2)
            });
            window.pixParallax.push(parallaxInstance);
        });
    }

    window.destroy_Parallax = async function(){
        window.pixParallax.forEach(function(item){
            item.destroy();
            var index = window.pixParallax.indexOf(item);
            if (index > -1) {
                window.pixParallax.splice(index, 1);
            }
        });
    }

    window.init_tilts = async function(el){
        if(!el){
            el = $('body');
        }
        var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
        if(!isSafari){
            el.find('.tilt').each(function(i, elem){
                $(elem).universalTilt({
                    base: window,
                    reset: true,
                    scale: 1.04,
                    reverse: false,
                    max: 15,
                    perspective: 3000,
                    speed: 4000
                });
            });
            el.find('.tilt_small').each(function(i, elem){
                $(elem).universalTilt({
                    reset: true,
                    scale: 1.01,
                    reverse: false,
                    max: 15,
                    perspective: 5000,
                    speed: 4000
                });
            });
            el.find('.tilt_big').each(function(i, elem){
                $(elem).universalTilt({
                    reset: true,
                    scale: 1.07,
                    reverse: false,
                    max: 15,
                    perspective: 1000,
                    speed: 4000
                });
            });
        }
    }

    window.update_collapse = async function(){
        $('.collapse').each(function(i, elem){
            var parent = $(elem).closest('.accordion');
            if(parent.attr('id') && parent.attr('id')!=''){
                $(elem).attr('data-parent', '#'+ parent.attr('id'));
            }
        });
    }

    window.init_scroll_rotate = async function(el){
        if(!el){
            el = $('body');
        }
        el.find('.pix-rotate-scroll').each(function(){
            var el = $(this);
            var speed = el.attr('data-speed');
            if(!speed||speed==''){
                speed = 300;
            }
            document.addEventListener('scroll', (e) => {
                var theta = $(window).scrollTop() / speed ;
                var rotationStr = "rotate(" + theta + "rad)";
                el.css({
                    "-webkit-transform": rotationStr,
                    "-moz-transform": rotationStr,
                    "transform": rotationStr
                });
            }, {
                passive: true
            });
        });
    }

    window.video_element = async function(el){
        if(!el){
            el = $('body');
        }
        el.find('video.pix-video-bg-element').each(function(i, elem){
            var that = this;
            var waypoint = new Waypoint({
                element: elem,
                offset: '100%',
                triggerOnce: true,
                handler		: function(){
                    if (that.paused) that.play();
                    this.destroy();
                }
            });
        });
    }
    window.init_bars = async function(){
        var delay = 500;
        $(".pix-progress:not(.pix_ready)").each(function(i, elem) {
            var that = this;
            $(elem).addClass('pix_ready');
            var waypoint = new Waypoint({
                element: elem,
                offset: '100%',
                triggerOnce: true,
                handler		: function(){
                    var duration = 1000;
                    var bar = $(elem).find('.progress-bar');
                    $(bar).animate({
                        width: $(bar).attr('aria-valuenow') + '%'
                    }, duration);

                    var el = $(elem).find('.pix-progress-counter');
                    var counter = 0;
                    if(el.attr('data-counter')&&el.attr('data-counter')!=''){
                        counter = Math.floor(el.attr('data-counter'));
                    }
                    $({property:0}).animate({property:counter}, {
                        duration	: duration+600,
                        easing		:'swing',
                        step		: function() {
                            el.text(Math.floor(this.property)+ '%');
                        },
                        complete	: function() {
                            el.text(this.property+ '%');
                        }
                    });
                    this.destroy();
                }
            });
        });
    }

    /* ---------------------------------------------------------------------------
    * Animate Math [counter, numbers, etc.]
    * --------------------------------------------------------------------------- */
    window.update_numbers = async function(){
        $('.animate-math .number').each(function(i, elem){
            var waypoint = new Waypoint({
                element: elem,
                offset: '100%',
                triggerOnce: true,
                handler		: function(){
                    var el			= $(elem);
                    var duration	= Math.floor((Math.random()*1000)+3000);
                    if(el.attr('data-duration')&&el.attr('data-duration')!=''){
                        duration = Math.floor(el.attr('data-duration'));
                    }
                    var to			= el.attr('data-to');
                    $({property:0}).animate({property:to}, {
                        duration	: duration,
                        easing		:'swing',
                        step		: function() {
                            el.text(Math.floor(this.property));
                        },
                        complete	: function() {
                            el.text(this.property);
                        }
                    });
                    this.destroy();
                }
            });
        });
    };

    /* ---------------------------------------------------------------------------
    * Chart
    * --------------------------------------------------------------------------- */
    window.init_chart = async function(el){
        if(!el){
            el = $('body');
        }
        el.find('.chart:not(.pix-loaded)').each(function(i, elem){
            $(elem).addClass('pix-loaded');
            var tbg = 'rgba(0,0,0,0.03)';
            if($(elem).attr('data-track')&&$(elem).attr('data-track')!=''){
                tbg =$(elem).attr('data-track');
            }
            var waypoint = new Waypoint({
                element:    elem,
                offset		: '100%',
                triggerOnce	: true,
                handler		: function(){
                    var color = $(this.element).attr('data-color');
                    $(this.element).easyPieChart({
                        animate		: 1000,
                        barColor: function(percent) {
                            var color = "";
                            if($(this.el).attr('data-gradient-1')){
                                var ctx = this.renderer.getCtx();
                                var canvas = this.renderer.getCanvas();
                                color = ctx.createRadialGradient(0,0,100, 100,70,70);
                                color.addColorStop(0, $(this.el).attr('data-gradient-1'));
                                if($(this.el).attr('data-gradient-3')&&$(this.el).attr('data-gradient-3')!=''){
                                    color.addColorStop(0.5, $(this.el).attr('data-gradient-2'));
                                    color.addColorStop(1, $(this.el).attr('data-gradient-3'));
                                }else{
                                    color.addColorStop(1, $(this.el).attr('data-gradient-2'));
                                }
                            }else{
                                color = $(this.el).attr('data-barColor');
                            }
                            return color;
                        },
                        trackColor: tbg,
                        lineCap		: 'round',
                        lineWidth	: 18,
                        size		: 140,
                        scaleColor	: false,
                        onStep: function(from, to, percent) {
                            $(this.el).find('.number').text(Math.round(percent));
                        }
                    });
                }
            });
        });
    }


    /* ---------------------------------------------------------------------------
    * Pix Sliders
    * --------------------------------------------------------------------------- */
    window.pix_sliders = function(){
        if( $('.pix-slider').length>0 || $('.pix-slider-nav-full').length>0 ){
            // pixLoadSlider(function(){
                $('.pix-slider').each(function(i, slider) {
                    var opts  = {};
                    if($(slider).attr('data-flickity')){
                        opts = JSON.parse($(slider).attr('data-flickity'));
                    }
                    opts.draggable= true;
                    opts.adaptiveHeight= true;
                    // opts.wrapAround= true;
                    opts.prevNextButtons= false;
                    opts.imagesLoaded= true;
                    opts.contain= true;
                    opts.resize= true;
                    opts.ready= function(){
                        // $('.pix-slider').flickity('resize');
                        setTimeout(function() {
                            $('.pix-slider').flickity('resize');
                        }, 900);
                    };
                    opts.on= {
                        ready: function() {
                            // $('.pix-slider').flickity('resize');
                            setTimeout(function() {
                                $('.pix-slider').flickity('resize');
                            }, 900);
                        }
                    };
                    $(slider).flickity(opts);
                });
                setTimeout(function(){
                    $('.pix-slider-nav-full').each(function(i, nav) {
                        var slider = false;
                        var align = 'center';
                        if($(nav).attr('data-slider')){
                            if($(nav).attr('data-nav-align')){
                                align = $(nav).attr('data-nav-align');
                            }
                            slider = $(nav).attr('data-slider');
                            $(nav).flickity({
                                asNavFor: slider,
                                cellAlign: align,
                                prevNextButtons: false,
                                contain: true,
                                pageDots: false,
                                on: {
                                    ready: function() {
                                        // $(nav).flickity('resize');
                                        setTimeout(function() {
                                            $(nav).flickity('resize');
                                        }, 1200);
                                    }
                                }
                            });
                        }

                    });
                }, 500);
            // });
        }

    }

    pix_sliders();

    window.pix_main_slider =  function(el){
        // window.pix_init_slider(el);
        if(!el){
            el = $('body');
        }
        if(el.find('.pix-main-slider').length>0){
            // pixLoadSlider(function(){
                var $sliders = el.find('.pix-main-slider');
                $sliders.each(function(i, elem){

                    if($(elem).hasClass('flickity-enabled')){
                        $(elem).flickity('destroy');
                    }
                    var opts  = {};
                    if($(elem).attr('data-flickity')){
                        opts = JSON.parse($(elem).attr('data-flickity'));
                    }
                    opts.draggable = true;
                    if(opts.adaptiveHeight) opts.adaptiveHeight = true;
                    opts.resize = true;
                    opts.imagesLoaded = true;
                    opts.arrowShape = 'M83.7718595,45.4606514 L31.388145,45.4606514 L54.2737785,23.1973134 C56.1027533,21.4180712 56.1027533,18.4982892 54.2737785,16.719047 C52.4448037,14.9398048 49.4903059,14.9398048 47.6613311,16.719047 L16.7563465,46.7836776 C14.9273717,48.5629198 14.9273717,51.4370802 16.7563465,53.2163224 L47.6613311,83.280953 C49.4903059,85.0601952 52.4448037,85.0601952 54.2737785,83.280953 C56.1027533,81.5017108 56.1027533,78.6275504 54.2737785,76.8483082 L31.388145,54.5849702 L83.7718595,54.5849702 C86.3511829,54.5849702 88.4615385,52.5319985 88.4615385,50.0228108 C88.4615385,47.5136231 86.3511829,45.4606514 83.7718595,45.4606514 Z';
                    // if($( window ).width()<600) opts.autoPlay = false;
                    $(elem).on( 'ready.flickity', function() {
                        if(opts.pix_id && $(opts.pix_id).hasClass('flickity-enabled') ){
                            setTimeout(function(){ $(opts.pix_id).flickity('resize'); }, 500);
                        }
                        if(opts.pix_id && $(opts.pix_id).hasClass('flickity-enabled') ){
                            setTimeout(function(){ $(opts.pix_id).flickity('resize'); }, 1500);
                        }
                        setTimeout(function(){
                            $(elem).addClass('pix-slider-loaded');
                        },100);

                    });
                    $(elem).flickity((opts));
                    if(opts.slider_effect){
                        var slider_style = '';
                        if(opts.slider_style) slider_style = opts.slider_style;
                        $(elem).closest('.vc_row:not(.overflow-visible)').removeClass('vc_row_visible').addClass('overflow-hidden').css({'overflow': 'hidden !important'});
                        $(elem).closest('.elementor-top-section').addClass('overflow-hidden').css({'overflow': 'hidden !important'});
                        var frameRender = 4;
                        $(elem).on( 'scroll.flickity', function( event, progress ) {
                            var el_width = $(elem).width();
                            if($( window ).width()<600) return false;
                            var el_left = $(elem).offset().left;
                            var slideWidth = $(elem).find('.carousel-cell').width();
                            if(!$(elem).data('flickity') || !$(elem).data('flickity').slides) return false;
                            $(elem).data('flickity').slides.forEach(function(slide, j) {
                                var flkInstanceSlide = $(elem).find('.carousel-cell:nth-child(' + (j + 1) + ')');
                                var slide_offset = $(slide.cells[0].element).offset().left;
                                var op = 1;
                                var local_offset = 0;
                                var rotate = 0;
                                var translate = 0;
                                var scale = 1;
                                var depth = 0;
                                var index = 10;
                                var pointer = 'auto';
                                if(slide_offset - el_left < 0 ){
                                        if(opts.slider_effect== 'pix-circular-slider'
                                        || opts.slider_effect== 'pix-circular-left'
                                        || opts.slider_effect== 'pix-fade-out-effect'
                                    ){
                                        local_offset = slide_offset - el_left;
                                        op = 1 + ( local_offset / slideWidth);
                                        if(op<0){op=0;}
                                        if(op>1){op=1;}
                                        if(opts.slider_effect!='pix-fade-out-effect'){
                                            rotate = (1-op)*20;
                                            translate =  1.8 * ( -1 * slide_offset + el_left );
                                            depth = -180 * ( (el_left-slide_offset) / slideWidth);
                                            scale = 1- ((1 - op)*0.1);
                                        }
                                    }else if(slider_style=='pix-opacity-slider'){
                                        local_offset = slide_offset - el_left;
                                        op = 1 + ( local_offset / slideWidth);
                                        if(op<0.3){op=0.3;}
                                        if(op>1){op=1;}
                                    }
                                    if(op<0.1) op = 0;
                                    if( (slide_offset - el_left) < -10 ){
                                        pointer = 'none';
                                    }


                                    index = -1;
                                }else if(slide_offset  > (el_left + el_width - slideWidth + 1) ){
                                    pointer = 'none';
                                    if(opts.slider_effect== 'pix-circular-slider'
                                        || opts.slider_effect== 'pix-circular-right'
                                        || opts.slider_effect== 'pix-fade-out-effect'
                                    ){
                                        local_offset = el_left  + el_width - slide_offset;
                                        op =  local_offset / slideWidth;
                                        if(op<0){op=0;}
                                        if(op>1){op=1;}
                                        if(opts.slider_effect!='pix-fade-out-effect'){
                                            rotate = -1 * (1-op)*20;
                                            translate = -1*(1-op)*2.2*slideWidth * 0.82;
                                            depth = -1*(1-op)*slideWidth*0.52;
                                            scale = 1- ((1 - op)*0.1);
                                        }
                                    }else if(slider_style=='pix-opacity-slider'){
                                        local_offset = el_left  + el_width - slide_offset;
                                        op =  local_offset / slideWidth;
                                        if(op<0.3){op=0.3;}
                                        if(op>1){op=1;}
                                    }
                                    index = -1;
                                    if(op<0.2) op = 0;
                                }
                                flkInstanceSlide.find('.slide-inner').css({
                                    'transform': 'perspective('+slideWidth+'px) translateX(' + translate + 'px) rotateY(' + rotate + 'deg) translateZ( '+depth+'px)',
                                    '-webkit-transform': 'perspective('+slideWidth+'px) translateX(' + translate + 'px) rotateY(' + rotate + 'deg) translateZ( '+depth+'px)',
                                    '-moz-transform': 'perspective('+slideWidth+'px) translateX(' + translate + 'px) rotateY(' + rotate + 'deg) translateZ( '+depth+'px)'
                                });
                                if(opts.slider_effect== 'pix-circular-slider'
                                || opts.slider_effect== 'pix-circular-right'
                                || opts.slider_effect== 'pix-circular-left'
                                || opts.slider_effect== 'pix-fade-out-effect'
                                ){
                                    flkInstanceSlide.css({
                                        'opacity': op,
                                        'z-index': index
                                    });
                                }
                                flkInstanceSlide.css({
                                    'pointer-events': pointer
                                });
                                flkInstanceSlide.parent().css({
                                    'pointer-events': pointer
                                });
                            });
                        });
                    }
                    document.addEventListener('scroll', (e) => {
                        let rect = elem.getBoundingClientRect();
                        let rect_bottom = rect.top + $(elem).height();
                        if(rect.top <= $(window).height() && rect_bottom >= -1){
                            $(elem).flickity('unpausePlayer');
                        }else{
                            $(elem).flickity('pausePlayer');
                        }
                    }, {
                        passive: true
                    });
                });
            // });
        }
}
window.pix_main_slider();

/* ---------------------------------------------------------------------------
* Pix Countdown
* --------------------------------------------------------------------------- */
    window.pix_countdown = async function(el){
        if(!el){
            el = $('body');
        }
        if(el.find('.pix-countdown:not(.pix-count-loaded)').length){
            el.find('.pix-countdown:not(.pix-count-loaded)').each(function(i, elem){
                var endDate = $(elem).attr('data-date');
                $(elem).countdown({
                    date: endDate,
                    render: function(data) {
                        $.each(data, function(key, value) {
                            $(elem).find('.pix-count-'+key).html(value);
                        });
                    },
                    onEnd: function(){
                        if($(this.el).attr('data-redirect')){
                            if(!$('body').hasClass('compose-mode')&&!$('body').hasClass('elementor-editor-active')){
                                window.location.href = $(this.el).attr('data-redirect');
                            }

                        }
                    }
                });
                $(elem).addClass('pix-count-loaded');
            });
        }
    }

  window.pix_animation_display = async function(el=false){
    if(!el){
        el = $('body');
    }
    var effects	=	[
        'fade-in-Img',
        'fade-in-down',
        'fade-in-left',
        'fade-in-up',
        'fade-in-up-big',
        'fade-in-right-big',
        'fade-in-left-big',
        'highlight-grow',
        'slide-in-up'
    ];
    el.find('.animate-in').each(function(i, elem){
        var	type = $(elem).attr('data-anim-type'),
        delay = $(elem).attr('data-anim-delay');
        $(elem).addClass('pix-waiting');
        // Animate
        if($(elem).hasClass('animate-in') && !$(elem).hasClass('animating-init')){
            $(elem).addClass('animating-init');
            setTimeout(function() {
                $(elem).addClass('animating').addClass(type).removeClass('animate-in');
            }, delay);

            // On animation end
            $(elem).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend transitionend webkitTransitionEnd oTransitionEnd', function() {
                // Clear animation
                $(elem).removeClass('animating animating-init').removeClass(effects.join(' ')).addClass('animated');
            });
        }
    });
}
window.pix_animation = async function(el=false, refresh=false){
    var effects	=	[
        'fade-in-Img',
        'fade-in-down',
        'fade-in-left',
        'fade-in-up',
        'fade-in-up-big',
        'fade-in-right-big',
        'fade-in-left-big',
        'highlight-grow',
        'slide-in-up'
    ];
    if(!el){
        el = $('body');
    }
    var state = ':not(.pix-waiting)';
    if(refresh){
        state = '';
    }
    el.find('.animate-in'+state).each(function(i, elem){
        var normal_trigger = true;
        var offset = '100%';
        if($('body').hasClass('pix-sections-stack') && !$('body').hasClass('vc_editor')){
            if( window.innerWidth > mobileBreakPoint ){
                if($(elem).closest('section').length>0){
                    normal_trigger = false;
                    var offset = '200%';
                    if(!$(elem).closest('section').hasClass('is-sticky-active') && $(elem).closest('.site-footer2').length<1){
                        return false;
                    }
                }
            }
        }
        var	type = $(elem).attr('data-anim-type'),
        delay = $(elem).attr('data-anim-delay');
        $(elem).addClass('pix-waiting');
        var waypoint = new Waypoint({
            element: elem,
            offset: offset,
            triggerOnce: normal_trigger,
            handler: function() {
                // Animate
                if($(elem).hasClass('animate-in') && !$(elem).hasClass('animating-init')){
                    $(elem).addClass('animating-init');
                    setTimeout(function() {
                        $(elem).addClass('animating').addClass(type).removeClass('animate-in');
                    }, delay);

                    // On animation end
                    $(elem).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend transitionend webkitTransitionEnd oTransitionEnd', function() {
                        // Clear animation
                        $(elem).removeClass('animating animating-init').removeClass(effects.join(' ')).addClass('animated');
                    });
                }
                // trigger Once
                this.destroy();
            }
        });
    });
}
window.isInViewport = function (elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= -10 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) + 10
    );
};

})(jQuery);
