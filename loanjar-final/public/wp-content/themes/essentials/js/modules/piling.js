(function($){
    "use strict";
    let pilingScriptsStarted = false;
    let pilingScriptsLoaded = false;
    function pixDynamicPiling(cb){
        if(pixfort_main_object.hasOwnProperty('velocity')){
            pilingScriptsStarted = true;
            $.cachedScript(pixfort_main_object.velocity)
            .done(function( script, textStatus ) {
                pilingScriptsLoaded = true;
                setTimeout(cb, 0);
            })
            .fail(function( jqxhr, settings, exception ) {
                console.log("Piling Library was not loaded!");
            });
        }
    }

    jQuery(document).ready(function($) {



        pixDynamicPiling(function(){
            console.log("OK");
            //variables

            // $('.pix_stack_section').each(function(i, elem){
            //     var section = $(this);
            //     section.attr('class', 'pix_stack_section');
            // });
            var debugLog = false;

            var hijacking= 'on',
        		animationType = 'scaleDown',
        		delta = 0,
                scrollThreshold = 30,
                actual = 1,
                animating = false;

            var activeSection = false;
            var nextSection = false;
            var prevSection = false;

            var admin_bar = 0;
            if($('#wpadminbar').length){
                admin_bar = 32;
            }
            //DOM elements
            var sectionsAvailable = $('.pix_stack_section');

            //check the media query and bind corresponding events
        	var MQ = deviceType(),
        		bindToggle = false;

            bindEvents(MQ, true);

            $(window).on('resize', function(){
        		MQ = deviceType();
        		bindEvents(MQ, bindToggle);
        		if( MQ == 'mobile' ) bindToggle = true;
        		if( MQ == 'desktop' ) bindToggle = false;
        	});


            // sectionsAvailable.css({
            //     'overflow-y': 'auto',
            //     'max-height': '100vh'
            // });



            function bindEvents(MQ, bool) {

            	// if( MQ == 'desktop' && bool) {
            	if( bool) {
                    // $('.pix_stack_section').bind('mousewheel DOMMouseScroll', function(e) {
                    //     var scrollTo = null;
                    //     // console.log("here");
                    //     if (e.type == 'mousewheel') {
                    //         scrollTo = (e.originalEvent.wheelDelta * -1);
                    //     }else if (e.type == 'DOMMouseScroll') {
                    //         scrollTo = 40 * e.originalEvent.detail;
                    //     }
                    //     if (scrollTo) {
                    //        e.preventDefault();
                    //        $(this).scrollTop(scrollTo + $(this).scrollTop());
                    //    }
                    // });
                    // document.addEventListener("DOMMouseScroll", scrollHijacking, { passive: true });
                    if( hijacking == 'on' ) {
                        // $('.pix_stack_section:first').addClass('visible');
        				// initHijacking();
        				// $(window).on('DOMMouseScroll mousewheel', scrollHijacking);
                        // $(window).bind('mousewheel DOMMouseScroll', scrollHijacking);
                        console.log('hijacking');
                        activeSection = getActiveSection();
                        nextSection = getNextSection();
                        prevSection = getPrevSection();
                        console.log(activeSection.getBoundingClientRect().top);
                        if(activeSection && activeSection.getBoundingClientRect().top!=admin_bar){
                            console.log(activeSection.getBoundingClientRect().top);
                            console.log(admin_bar);
                            // unbindScroll($(activeSection), 100);
                            // setTimeout(function(){
                            //     $('body,html').animate({scrollTop: 0 }, 100);
                            // }, 1000);

                            // $('body').velocity('scroll', {
                            //     duration: 100,
                            //     offset: admin_bar,
                            //     easing: 'easeOutQuart',
                            //     complete: function () {
                            //         animating = false;
                            //         activeSection = getActiveSection();
                            //         prevSection = getPrevSection();
                            //         nextSection = getNextSection();
                            //         console.log( 'Prev2: '+ $(prevSection).attr('id'));
                            //         console.log('Curr2: '+ $(activeSection).attr('id'));
                            //         console.log('Next2: '+$(nextSection).attr('id'));
                            //         console.log("-------------------");
                            //     }
                            // });
                        }


                        $('section').bind('mousewheel DOMMouseScroll', scrollHijacking);
                        // document.addEventListener("mousewheel", scrollHijacking, { passive: false });
                        // document.addEventListener("DOMMouseScroll", scrollHijacking, { passive: false });

                        // scrollAnimation();
                        // document.addEventListener('scroll', scrollAnimation, { passive: true });
        			} else {
                        scrollAnimation();
                        // $(window).on('scroll', scrollAnimation);
                        document.addEventListener('scroll', scrollAnimation, { passive: true });
                    }


                } else if( MQ == 'mobile' ) {
        			//reset and unbind
        			// resetSectionStyle();
        			// $(window).off('DOMMouseScroll mousewheel', scrollHijacking);
        			// $(window).off('scroll', scrollAnimation);
            		$(document).off('keydown');
        		}
            }

            function scrollAnimation(){
        		//normal scroll - use requestAnimationFrame (if defined) to optimize performance
        		(!window.requestAnimationFrame) ? animateSection() : window.requestAnimationFrame(animateSection);
        	}

            function animateSection() {
        		var scrollTop = $(window).scrollTop(),
        			windowHeight = $(window).height(),
        			windowWidth = $(window).width();

        		sectionsAvailable.each(function(){
                    var rect = this.getBoundingClientRect();
        			var actualBlock = $(this);
        			// let	offsetTop = scrollTop - actualBlock.offset().top;
                    let offset = rect.bottom - windowHeight;
                    let offsetTop = rect.top;
                    // console.log({offset});

                        // console.log('---------');
                        // console.log(rect.top);
                        // console.log(actualBlock.offset().top);
                        // console.log(offset);
                    //     var section = $(this);
                    //     var top = section.offset().top;
                    //     var height = section.outerHeight();
                    //     var bottom = section.offset().top + height;
                    //     var window_height = $(window).height();
                    //     var that = this;
                    //     var rect = this.getBoundingClientRect();
                    //     document.addEventListener('scroll', (e) => {
                    //         rect = that.getBoundingClientRect();
                    //         console.log(rect.bottom);

                    // console.log(offset);
        			//according to animation type and window scroll, define animation parameters
        			var animationValues = setSectionAnimation(offset, windowHeight, animationType);
                    // console.log(animationValues);

        			transformSection(actualBlock, animationValues[0], animationValues[1], animationValues[2], animationValues[3], animationValues[4]);
                    // if( ( (offsetTop>=0 || offset) ) || () )
                    // console.log({offsetTop});
                    // console.log({offset});
                    ( offsetTop>=0 && offset>=0 )? actualBlock.addClass('visible') : actualBlock.removeClass('visible');
        			// ( offsetTop >= 0 && offset < windowHeight ) ? actualBlock.addClass('visible') : actualBlock.removeClass('visible');

        		});

        		// checkNavigation();
        	}

            function transformSection(element, translateY, scaleValue, rotateXValue, opacityValue, boxShadow) {
        		//transform sections - normal scroll
        		element.velocity({
        			translateY: translateY+'px',
        			// scale: scaleValue,
        			// rotateX: rotateXValue,
        			// opacity: opacityValue,
        			// boxShadowBlur: boxShadow+'px',
        			translateZ: 0,
        		}, 0);
        	}


            function initHijacking() {
        		// initialize section style - scrollhijacking
        		var visibleSection = sectionsAvailable.filter('.visible'),
        			topSection = visibleSection.prevAll('.pix_stack_section'),
        			bottomSection = visibleSection.nextAll('.pix_stack_section'),
        			animationParams = selectAnimation(animationType, false),
        			animationVisible = animationParams[0],
        			animationTop = animationParams[1],
        			animationBottom = animationParams[2];

        		visibleSection.velocity(animationVisible, 1, function(){
        			visibleSection.css('opacity', 1);
        	    	topSection.css('opacity', 1);
        	    	bottomSection.css('opacity', 1);
        		});
                topSection.velocity(animationTop, 0);
                bottomSection.velocity(animationBottom, 0);
        	}

        	function scrollHijacking (e) {

                if(activeSection && activeSection != 'undefined' && !animating){

                    var scrollTo = null;
                    let s = $(this);
                    if(!s.hasClass('vc_section')){
                        s = $(this).closest('.vc_section');
                    }
                    if(s.hasClass('pix_stack_section')){
                        if (e.type == 'mousewheel') {
                            scrollTo = (e.originalEvent.wheelDelta * -1);
                        }else if (e.type == 'DOMMouseScroll') {
                            scrollTo = 40 * e.originalEvent.detail;
                        }
                        if (scrollTo) {
                           e.preventDefault();
                           s.scrollTop(scrollTo + s.scrollTop());
                       }

                       if (e.originalEvent.detail < 0 || e.originalEvent.wheelDelta > 0) {
                           delta--;
                           if( Math.abs(delta) >= scrollThreshold){

                               activeSection = getActiveSection();
                               prevSection = getPrevSection();

                               if(prevSection && prevSection != 'undefined'){
                                   animating=true;
                                   unbindScroll($(prevSection), 1000);
                               }

                               // prevSection();
                               // unbindScroll(s, 200);
                           }
                       } else {
                           delta++;
                           if(delta >= scrollThreshold){
                               activeSection = getActiveSection();
                               nextSection = getNextSection();

                               if(nextSection && nextSection != 'undefined'){
                                   animating=true;
                                   unbindScroll($(nextSection), 1000);
                               }
                               // nextSection();
                           }
                       }

                    }
                    activeSection = getActiveSection();
                    prevSection = getPrevSection();
                    nextSection = getNextSection();

                    console.log( 'Prev: '+ $(prevSection).attr('id'));
                    console.log('Curr: '+ $(activeSection).attr('id'));
                    console.log('Next: '+$(nextSection).attr('id'));
                    console.log("-------------------");

                    // return false;
                }else{
                    activeSection = getActiveSection();
                    prevSection = getPrevSection();
                    nextSection = getNextSection();
                }
        		// on mouse scroll - check if animate section

                // let s = $(this);
                // if(!s.hasClass('pix_stack_section')){
                //     s = $(this).closest('.pix_stack_section');
                // }
                // console.log(s);

                // if (event.originalEvent.detail < 0 || event.originalEvent.wheelDelta > 0) {
                //     delta--;
                //     ( Math.abs(delta) >= scrollThreshold) && prevSection();
                // } else {
                //     delta++;
                //     (delta >= scrollThreshold) && nextSection();
                // }
                // return false;
            }

            function getActiveSection(){
                let sectionOffset = $(window).height(),
                    section = false;
                $('section').each(function(){
                    var rect = this.getBoundingClientRect();
                    // if(rect.bottom>=0&&rect.bottom<=sectionOffset){
                    //     sectionOffset = rect.bottom;
                    //     section = this;
                    // }
                    if(rect.top<=(sectionOffset/2) && rect.bottom>=(sectionOffset/2) ){
                        // sectionOffset = rect.bottom;
                        section = this;
                    }
                });
                // if(section){
                //     console.log(section.attr('id'));
                // }
                return section;
            }
            function getNextSection(){
                let section = false;
                if(activeSection){
                    var rectactiveSection = activeSection.getBoundingClientRect();
                    let activeSectionOffset = rectactiveSection.bottom;
                    let distance = 100000;
                    $('section').each(function(){
                        var rect = this.getBoundingClientRect();
                        if(rect.bottom>activeSectionOffset &&rect.bottom<distance){
                            distance = rect.bottom;
                            section = this;
                        }
                    });
                }
                return section;
            }
            function getPrevSection(){
                let section = false;
                if(activeSection){
                    var rectactiveSection = activeSection.getBoundingClientRect();
                    let activeSectionOffset = rectactiveSection.top;
                    let distance = -100000;
                    $('section').each(function(){
                        var rect = this.getBoundingClientRect();
                        if(rect.top<activeSectionOffset &&rect.top>distance){
                            distance = rect.top;
                            section = this;
                        }
                    });
                }
                return section;
            }


            function prevSection(event) {
            	//go to previous section
                console.log('prevSection');
                // var visibleSection = sectionsAvailable.filter('.visible');
                // if(!visibleSection.is(":first-child")){
            	//        typeof event !== 'undefined' && event.preventDefault();
                //
                //     var animationParams = selectAnimation(animationType, true, 'next');
                //
                //     unbindScroll(visibleSection.prevAll('.pix_stack_section:first'), animationParams[3]);
                //     visibleSection.removeClass('visible').prevAll('.pix_stack_section:first').addClass('visible');
                // }


            	// var visibleSection = sectionsAvailable.filter('.visible'),
            	// 	middleScroll = ( hijacking == 'off' && $(window).scrollTop() != visibleSection.offset().top) ? true : false;
            	// visibleSection = middleScroll ? visibleSection.next('.pix_stack_section') : visibleSection;
                //
            	// var animationParams = selectAnimation(animationType, middleScroll, 'prev');
            	// unbindScroll(visibleSection.prev('.pix_stack_section'), animationParams[3]);
                //
                // if( !animating && !visibleSection.is(":first-child") ) {
                // 	animating = true;
                //     visibleSection.removeClass('visible').velocity(animationParams[2], animationParams[3], animationParams[4])
                //     .end().prev('.pix_stack_section').addClass('visible').velocity(animationParams[0] , animationParams[3], animationParams[4], function(){
                //     	animating = false;
                //     	if( hijacking == 'off') $(window).on('scroll', scrollAnimation);
                //     });
                //
                //     actual = actual - 1;
                // }
                //
                // resetScroll();
            }

            function nextSection(event) {
            	//go to next section
                console.log('nextSection');
                // var visibleSection = sectionsAvailable.filter('.visible');
                // if(!visibleSection.is(":last-of-type") ) {
                // 	typeof event !== 'undefined' && event.preventDefault();
                //
                //     var animationParams = selectAnimation(animationType, true, 'next');
                //
                //     unbindScroll(visibleSection.nextAll('.pix_stack_section:first'), animationParams[3]);
                //     visibleSection.removeClass('visible').nextAll('.pix_stack_section:first').addClass('visible');
                // }

                // $('body,html').animate({scrollTop: $(previousWaypoint.element).offset().top }, 1000);
                // var visibleSection = sectionsAvailable.filter('.visible'),
            	// 	middleScroll = ( hijacking == 'off' && $(window).scrollTop() != visibleSection.offset().top) ? true : false;
                //
            	// var animationParams = selectAnimation(animationType, middleScroll, 'next');
            	// unbindScroll(visibleSection.next('.pix_stack_section'), animationParams[3]);
                //
                // if(!animating && !visibleSection.is(":last-of-type") ) {
                //     animating = true;
                //     visibleSection.removeClass('visible').velocity(animationParams[1], animationParams[3], animationParams[4] )
                //     .end().next('.pix_stack_section').addClass('visible').velocity(animationParams[0], animationParams[3], animationParams[4], function(){
                //     	animating = false;
                //     	if( hijacking == 'off') $(window).on('scroll', scrollAnimation);
                //     });
                //
                //     actual = actual +1;
                // }
                // resetScroll();
            }

            function unbindScroll(section, time) {
                // $('body, html').scrollTop(section.offset().top);
                // section.velocity("scroll", { duration: time });
                // console.log(section.offset().top+admin_bar);
                section.velocity('scroll', {
                    duration: time,
                    offset: -1*admin_bar,
                    easing: 'easeOutQuart',
                    complete: function () {
                        animating = false;
                        activeSection = getActiveSection();
                        prevSection = getPrevSection();
                        nextSection = getNextSection();
                        console.log( 'Prev2: '+ $(prevSection).attr('id'));
                        console.log('Curr2: '+ $(activeSection).attr('id'));
                        console.log('Next2: '+$(nextSection).attr('id'));
                        console.log("-------------------");
                    }
                });
                // setTimeout(function(){
                //     animating = false;
                //     activeSection = getActiveSection();
                //     prevSection = getPrevSection();
                //     nextSection = getNextSection();
                //     console.log( 'Prev2: '+ $(prevSection).attr('id'));
                //     console.log('Curr2: '+ $(activeSection).attr('id'));
                //     console.log('Next2: '+$(nextSection).attr('id'));
                //     console.log("-------------------");
                //
                // }, time);

            	//if clicking on navigation - unbind scroll and animate using custom velocity animation
            	// if( hijacking == 'off') {
            	// 	$(window).off('scroll', scrollAnimation);
            	// 	( animationType == 'catch') ? $('body, html').scrollTop(section.offset().top) : section.velocity("scroll", { duration: time });
            	// }
            }

            function resetScroll() {
                delta = 0;
                // checkNavigation();
            }




            function resetSectionStyle() {
        		//on mobile - remove style applied with jQuery
        		sectionsAvailable.each(function(){
        			$(this).attr('style', '');
        		});
        	}

        	function deviceType() {
        		//detect if desktop/mobile
        		return window.getComputedStyle(document.querySelector('body'), '::before').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
        	}

        	function selectAnimation(animationName, middleScroll, direction) {
        		// select section animation - scrollhijacking
        		var animationVisible = 'translateNone',
        			animationTop = 'translateUp',
        			animationBottom = 'translateDown',
        			easing = 'ease',
        			animDuration = 800;

        		switch(animationName) {
        		    case 'scaleDown':
        		    	animationTop = 'scaleDown';
        		    	easing = 'easeInCubic';
        		        break;
        		    case 'rotate':
        		    	if( hijacking == 'off') {
        		    		animationTop = 'rotation.scroll';
        		    		animationBottom = 'translateNone';
        		    	} else {
        		    		animationTop = 'rotation';
        		    		easing = 'easeInCubic';
        		    	}
        		        break;
        		    case 'gallery':
        		    	animDuration = 1500;
        		    	if( middleScroll ) {
        		    		animationTop = 'scaleDown.moveUp.scroll';
        		    		animationVisible = 'scaleUp.moveUp.scroll';
        		    		animationBottom = 'scaleDown.moveDown.scroll';
        		    	} else {
        		    		animationVisible = (direction == 'next') ? 'scaleUp.moveUp' : 'scaleUp.moveDown';
        					animationTop = 'scaleDown.moveUp';
        					animationBottom = 'scaleDown.moveDown';
        		    	}
        		        break;
        		    case 'catch':
        		    	animationVisible = 'translateUp.delay';
        		        break;
        		    case 'opacity':
        		    	animDuration = 700;
        				animationTop = 'hide.scaleUp';
        				animationBottom = 'hide.scaleDown';
        		        break;
        		    case 'fixed':
        		    	animationTop = 'translateNone';
        		    	easing = 'easeInCubic';
        		        break;
        		    case 'parallax':
        		    	animationTop = 'translateUp.half';
        		    	easing = 'easeInCubic';
        		        break;
        		}

        		return [animationVisible, animationTop, animationBottom, animDuration, easing];
        	}

        	function setSectionAnimation(sectionOffset, windowHeight, animationName ) {
        		// select section animation - normal scroll
        		var scale = 1,
        			translateY = 0,
        			rotateX = '0deg',
        			opacity = 1,
        			boxShadowBlur = 0;

                if(debugLog) console.log(sectionOffset);
                // console.log(windowHeight);

        		if( sectionOffset >= -windowHeight && sectionOffset <= 0 && false ) {
                    if(debugLog) console.log("entering");
        			// section entering the viewport
        			translateY = (-sectionOffset)*800/windowHeight;

        			switch(animationName) {
        			    case 'scaleDown':
        			        scale = 1;
        					opacity = 1;
        					break;
        				case 'rotate':
        					translateY = 0;
        					break;
        				case 'gallery':
        			        if( sectionOffset>= -windowHeight &&  sectionOffset< -0.9*windowHeight ) {
        			        	scale = -sectionOffset/windowHeight;
        			        	translateY = (-sectionOffset)*100/windowHeight;
        			        	boxShadowBlur = 400*(1+sectionOffset/windowHeight);
        			        } else if( sectionOffset>= -0.9*windowHeight &&  sectionOffset< -0.1*windowHeight) {
        			        	scale = 0.9;
        			        	translateY = -(9/8)*(sectionOffset+0.1*windowHeight)*100/windowHeight;
        			        	boxShadowBlur = 40;
        			        } else {
        			        	scale = 1 + sectionOffset/windowHeight;
        			        	translateY = 0;
        			        	boxShadowBlur = -400*sectionOffset/windowHeight;
        			        }
        					break;
        				case 'catch':
        			        if( sectionOffset>= -windowHeight &&  sectionOffset< -0.75*windowHeight ) {
        			        	translateY = 100;
        			        	boxShadowBlur = (1 + sectionOffset/windowHeight)*160;
        			        } else {
        			        	translateY = -(10/7.5)*sectionOffset*100/windowHeight;
        			        	boxShadowBlur = -160*sectionOffset/(3*windowHeight);
        			        }
        					break;
        				case 'opacity':
        					translateY = 0;
        			        scale = (sectionOffset + 5*windowHeight)*0.2/windowHeight;
        			        opacity = (sectionOffset + windowHeight)/windowHeight;
        					break;
        			}

        		} else if( sectionOffset < 0 && sectionOffset >= -windowHeight ) {
                    if(debugLog) console.log("Leaving");
        			//section leaving the viewport - still has the '.visible' class
        			translateY = (-sectionOffset)*1000/windowHeight;

        			switch(animationName) {
        			    case 'scaleDown':
        			        scale = (1 + ( sectionOffset * 0.3/windowHeight)).toFixed(5);
        					opacity = ( 1 - ( sectionOffset/windowHeight) ).toFixed(5);
        					// translateY = 0;
                            translateY = (-sectionOffset)*500/windowHeight;
        					boxShadowBlur = -20*(sectionOffset/windowHeight);

        					break;
        				case 'rotate':
        					opacity = ( 1 - ( sectionOffset/windowHeight) ).toFixed(5);
        					rotateX = sectionOffset*90/windowHeight + 'deg';
        					translateY = 0;
        					break;
        				case 'gallery':
        			        if( sectionOffset >= 0 && sectionOffset < 0.1*windowHeight ) {
        			        	scale = (windowHeight - sectionOffset)/windowHeight;
        			        	translateY = - (sectionOffset/windowHeight)*100;
        			        	boxShadowBlur = 400*sectionOffset/windowHeight;
        			        } else if( sectionOffset >= 0.1*windowHeight && sectionOffset < 0.9*windowHeight ) {
        			        	scale = 0.9;
        			        	translateY = -(9/8)*(sectionOffset - 0.1*windowHeight/9)*100/windowHeight;
        			        	boxShadowBlur = 40;
        			        } else {
        			        	scale = sectionOffset/windowHeight;
        			        	translateY = -100;
        			        	boxShadowBlur = 400*(1-sectionOffset/windowHeight);
        			        }
        					break;
        				case 'catch':
        					if(sectionOffset>= 0 &&  sectionOffset< windowHeight/2) {
        						boxShadowBlur = sectionOffset*80/windowHeight;
        					} else {
        						boxShadowBlur = 80*(1 - sectionOffset/windowHeight);
        					}
        					break;
        				case 'opacity':
        					translateY = 0;
        			        scale = (sectionOffset + 5*windowHeight)*0.2/windowHeight;
        			        opacity = ( windowHeight - sectionOffset )/windowHeight;
        					break;
        				case 'fixed':
        					translateY = 0;
        					break;
        				case 'parallax':
        					translateY = (-sectionOffset)*50/windowHeight;
        					break;

        			}

        		} else if( sectionOffset < -windowHeight ) {
                    if(debugLog) console.log("not yet visible");
        			//section not yet visible
        			// translateY = 100;
                    //
        			// switch(animationName) {
        			//     case 'scaleDown':
        			//         scale = 1;
        			// 		opacity = 1;
        			// 		break;
        			// 	case 'gallery':
        			//         scale = 1;
        			// 		break;
        			// 	case 'opacity':
        			// 		translateY = 0;
        			//         scale = 0.8;
        			//         opacity = 0;
        			// 		break;
        			// }

        		} else {
                    if(debugLog) console.log("not visible anymore");
        			//section not visible anymore
        			// translateY = -100;
                    //
        			// switch(animationName) {
        			//     case 'scaleDown':
        			//         scale = 0;
        			// 		opacity = 0.7;
        			// 		translateY = 0;
        			// 		break;
        			// 	case 'rotate':
        			// 		translateY = 0;
        			//         rotateX = '90deg';
        			//         break;
        			//     case 'gallery':
        			//         scale = 1;
        			// 		break;
        			// 	case 'opacity':
        			// 		translateY = 0;
        			//         scale = 1.2;
        			//         opacity = 0;
        			// 		break;
        			// 	case 'fixed':
        			// 		translateY = 0;
        			// 		break;
        			// 	case 'parallax':
        			// 		translateY = -50;
        			// 		break;
        			// }
        		}
                if(debugLog) {
                    console.log({translateY});
                    console.log({sectionOffset});
                    console.log({boxShadowBlur});
                }

        		return [translateY, scale, rotateX, opacity, boxShadowBlur];
        	}



            // $('.pix_stack_section').each(function(i, elem){
            //     var section = $(this);
            //     var top = section.offset().top;
            //     var height = section.outerHeight();
            //     var bottom = section.offset().top + height;
            //     var window_height = $(window).height();
            //     var that = this;
            //     var rect = this.getBoundingClientRect();
            //     document.addEventListener('scroll', (e) => {
            //         rect = that.getBoundingClientRect();
            //         console.log(rect.bottom);
            //
            //     }, {
            //         passive: true
            //     });
            // });




            /* Custom effects registration - feature available in the Velocity UI pack */
            //none
            $.Velocity
                .RegisterEffect("translateUp", {
                	defaultDuration: 1,
                    calls: [
                        [ { translateY: '-100%'}, 1]
                    ]
                });
            $.Velocity
                .RegisterEffect("translateDown", {
                	defaultDuration: 1,
                    calls: [
                        [ { translateY: '100%'}, 1]
                    ]
                });
            $.Velocity
                .RegisterEffect("translateNone", {
                	defaultDuration: 1,
                    calls: [
                        [ { translateY: '0', opacity: '1', scale: '1', rotateX: '0', boxShadowBlur: '0'}, 1]
                    ]
                });

            //scale down
            $.Velocity
                .RegisterEffect("scaleDown", {
                	defaultDuration: 1,
                    calls: [
                        [ { opacity: '0', scale: '0.7', boxShadowBlur: '40px' }, 1]
                    ]
                });
            //rotation
            $.Velocity
                .RegisterEffect("rotation", {
                	defaultDuration: 1,
                    calls: [
                        [ { opacity: '0', rotateX: '90', translateY: '-100%'}, 1]
                    ]
                });
            $.Velocity
                .RegisterEffect("rotation.scroll", {
                	defaultDuration: 1,
                    calls: [
                        [ { opacity: '0', rotateX: '90', translateY: '0'}, 1]
                    ]
                });
            //gallery
            $.Velocity
                .RegisterEffect("scaleDown.moveUp", {
                	defaultDuration: 1,
                    calls: [
                    	[ { translateY: '-10%', scale: '0.9', boxShadowBlur: '40px'}, 0.20 ],
                    	[ { translateY: '-100%' }, 0.60 ],
                    	[ { translateY: '-100%', scale: '1', boxShadowBlur: '0' }, 0.20 ]
                    ]
                });
            $.Velocity
                .RegisterEffect("scaleDown.moveUp.scroll", {
                	defaultDuration: 1,
                    calls: [
                    	[ { translateY: '-100%', scale: '0.9', boxShadowBlur: '40px' }, 0.60 ],
                    	[ { translateY: '-100%', scale: '1', boxShadowBlur: '0' }, 0.40 ]
                    ]
                });
            $.Velocity
                .RegisterEffect("scaleUp.moveUp", {
                	defaultDuration: 1,
                    calls: [
                    	[ { translateY: '90%', scale: '0.9', boxShadowBlur: '40px' }, 0.20 ],
                    	[ { translateY: '0%' }, 0.60 ],
                    	[ { translateY: '0%', scale: '1', boxShadowBlur: '0'}, 0.20 ]
                    ]
                });
            $.Velocity
                .RegisterEffect("scaleUp.moveUp.scroll", {
                	defaultDuration: 1,
                    calls: [
                    	[ { translateY: '0%', scale: '0.9' , boxShadowBlur: '40px' }, 0.60 ],
                    	[ { translateY: '0%', scale: '1', boxShadowBlur: '0'}, 0.40 ]
                    ]
                });
            $.Velocity
                .RegisterEffect("scaleDown.moveDown", {
                	defaultDuration: 1,
                    calls: [
                    	[ { translateY: '10%', scale: '0.9', boxShadowBlur: '40px'}, 0.20 ],
                    	[ { translateY: '100%' }, 0.60 ],
                    	[ { translateY: '100%', scale: '1', boxShadowBlur: '0'}, 0.20 ]
                    ]
                });
            $.Velocity
                .RegisterEffect("scaleDown.moveDown.scroll", {
                	defaultDuration: 1,
                    calls: [
                    	[ { translateY: '100%', scale: '0.9', boxShadowBlur: '40px' }, 0.60 ],
                    	[ { translateY: '100%', scale: '1', boxShadowBlur: '0' }, 0.40 ]
                    ]
                });
            $.Velocity
                .RegisterEffect("scaleUp.moveDown", {
                	defaultDuration: 1,
                    calls: [
                    	[ { translateY: '-90%', scale: '0.9', boxShadowBlur: '40px' }, 0.20 ],
                    	[ { translateY: '0%' }, 0.60 ],
                    	[ { translateY: '0%', scale: '1', boxShadowBlur: '0'}, 0.20 ]
                    ]
                });
            //catch up
            $.Velocity
                .RegisterEffect("translateUp.delay", {
                	defaultDuration: 1,
                    calls: [
                        [ { translateY: '0%'}, 0.8, { delay: 100 }],
                    ]
                });
            //opacity
            $.Velocity
                .RegisterEffect("hide.scaleUp", {
                	defaultDuration: 1,
                    calls: [
                        [ { opacity: '0', scale: '1.2'}, 1 ]
                    ]
                });
            $.Velocity
                .RegisterEffect("hide.scaleDown", {
                	defaultDuration: 1,
                    calls: [
                        [ { opacity: '0', scale: '0.8'}, 1 ]
                    ]
                });
            //parallax
            $.Velocity
                .RegisterEffect("translateUp.half", {
                	defaultDuration: 1,
                    calls: [
                        [ { translateY: '-50%'}, 1]
                    ]
                });


        });
        // let isScrolling = false;
        // $('.vc_section').each(function(i, elem){
        //     var waypoint = new Waypoint({
        //       element: $(elem),
        //       handler: function(direction) {
        //         console.log('Direction: ' + direction);
        //         let s = $(elem);
        //         isScrolling = true;
        //         if(direction=='down'){
        //             s = s.nextAll('.vc_section:first');
        //             $('body,html').animate({scrollTop: s.offset().top }, 1000);
        //         }else{
        //             s = s.prevAll('.vc_section:first');
        //             isScrolling = true;
        //             $('body,html').animate({scrollTop: s.offset().top }, 1000);
        //         }
        //         setTimeout(function(){
        //             isScrolling = false;
        //         }, 1000);
        //       }
        //   });
        // });



        //   var $elements = $('.vc_section')
        //
        //       $elements.each(function() {
        //         new Waypoint({
        //           element: this,
        //           handler: function(direction) {
        //               if(!isScrolling){
        //                 var previousWaypoint = this.previous()
        //                 var nextWaypoint = this.next()
        //
        //
        //                 isScrolling = true;
        //                 if(direction=='down'){
        //                     if (nextWaypoint && nextWaypoint.element) {
        //                       $('body,html').animate({scrollTop: $(nextWaypoint.element).offset().top }, 1000);
        //                     }
        //                 }else{
        //                     if (previousWaypoint && previousWaypoint.element) {
        //                       $('body,html').animate({scrollTop: $(previousWaypoint.element).offset().top }, 1000);
        //                     }
        //                 }
        //                 setTimeout(function(){
        //                     isScrolling = false;
        //                 }, 1000);
        //             }
        //
        //
        //           },
        //           offset: '50%',
        //           group: 'test'
        //       });
        // });




        // let isScrolling = false;
        // $('.vc_section').bind('mousewheel DOMMouseScroll', function(e) {
        //     var scrollTo = null;
        //     // console.log("here");
        //     if (e.type == 'mousewheel') {
        //         scrollTo = (e.originalEvent.wheelDelta * -1);
        //     }else if (e.type == 'DOMMouseScroll') {
        //         scrollTo = 40 * e.originalEvent.detail;
        //     }
        //     if(!isScrolling){
        //
        //         // console.log(scrollTo);
        //         // console.log();
        //
        //
        //         // if (scrollTo) {
        //         //     e.preventDefault();
        //         //     $(this).scrollTop(scrollTo + $(this).scrollTop());
        //         // }
        //         if (scrollTo > 100) {
        //             let s = $(this);
        //
        //             if(!s.hasClass('vc_section')){
        //                 s = $(this).closest('.vc_section');
        //             }
        //             console.log(s.attr('class'));
        //
        //             if(s.nextAll('.vc_section:first').length){
        //                 s = s.nextAll('.vc_section:first');
        //                 isScrolling = true;
        //                 $('body,html').animate({scrollTop: s.offset().top }, 1000);
        //                 setTimeout(function(){
        //                     isScrolling = false;
        //                 }, 1000);
        //
        //                 console.log("To:");
        //                 console.log(s.attr('class'));
        //             }
        //             // console.log(s);
        //             // console.log(s.html());
        //
        //         }else if (scrollTo < -100) {
        //             let s = $(this);
        //
        //             if(!s.hasClass('vc_section')){
        //                 s = $(this).closest('.vc_section');
        //             }
        //             console.log(s.attr('class'));
        //
        //
        //             if(s.prevAll('.vc_section:last').length){
        //                 s = s.prevAll('.vc_section:first');
        //                 isScrolling = true;
        //                 $('body,html').animate({scrollTop: s.offset().top }, 1000);
        //                 setTimeout(function(){
        //                     isScrolling = false;
        //                 }, 1000);
        //                 console.log("To:");
        //                 console.log(s.attr('class'));
        //             }
        //
        //
        //             // console.log(s);
        //             // console.log(s.html());
        //
        //         }else{
        //             e.preventDefault();
        //             $(this).scrollTop(scrollTo + $(this).scrollTop());
        //         }
        //     }else{
        //         e.preventDefault();
        //         $(this).scrollTop(scrollTo + $(this).scrollTop());
        //     }
        // });




        // pixDynamicPiling(function(){
        //     // console.log("Done piling!");
        //     // $('.vc_row-full-width.vc_clearfix').remove();
        //     // $('.vc_section').each(function(i, elem){
        //     //     $(elem).attr('class', 'pix_section');
        //     //     $(elem).attr('data-vc-full-width', '');
        //     //     $(elem).attr('data-vc-full-width-init', '');
        //     //     $(elem).attr('style', '');
        //     // });
        //     // $('.entry-content2').fullpage( {
        // 	// 	sectionsColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
        //     //     sectionSelector: '.pix_section',
        // 	// });
        //     // setTimeout(function(){
        //     //     $('.entry-content2').pagepiling({
        //     // 	    menu: null,
        //     //         anchors: [],
        //     //         scrollingSpeed: 700,
        //     //         easing: 'swing',
        //     //         sectionsColor: ['#333', '#ee005a', '#2C3E50', '#39C'],
    	// 	// 	    navigation: false,
        //     //         sectionSelector: '.pix_section',
    	// 	// 	    afterRender: function(){
        //     //             console.log("render");
    	// 	// 	    	$('#pp-nav').addClass('custom');
    	// 	// 	    },
    	// 	// 	    afterLoad: function(anchorLink, index){
    	// 	// 	    	if(index>1){
    	// 	// 	    		$('#pp-nav').removeClass('custom');
    	// 	// 	    	}else{
    	// 	// 	    		$('#pp-nav').addClass('custom');
    	// 	// 	    	}
    	// 	// 	    }
        //     // 	});
        //     // }, 500);
        //
        // });
    });

    window.pixLoadPiling = function(){
        if($('.pix-pixLoadPiling').length>0){
            if(!pilingScriptsLoaded){
                console.log("Piling Ready to load");
                if(!pilingScriptsStarted){
                    pixDynamicPiling();
                }
            }
        }
    }

})(jQuery);
