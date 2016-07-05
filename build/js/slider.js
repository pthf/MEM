var Swiper=function(e,t){function i(e){return document.querySelectorAll?document.querySelectorAll(e):jQuery(e)}function r(){var e=M-A;return t.freeMode&&(e=M-A),t.slidesPerView>E.slides.length&&(e=0),0>e&&(e=0),e}function n(){function e(e){var i=new Image;i.onload=function(){E.imagesLoaded++,E.imagesLoaded==E.imagesToLoad.length&&(E.reInit(),t.onImagesReady&&t.onImagesReady(E))},i.src=e}if(E.browser.ie10?(E.h.addEventListener(E.wrapper,E.touchEvents.touchStart,f,!1),E.h.addEventListener(document,E.touchEvents.touchMove,h,!1),E.h.addEventListener(document,E.touchEvents.touchEnd,g,!1)):(E.support.touch&&(E.h.addEventListener(E.wrapper,"touchstart",f,!1),E.h.addEventListener(E.wrapper,"touchmove",h,!1),E.h.addEventListener(E.wrapper,"touchend",g,!1)),t.simulateTouch&&(E.h.addEventListener(E.wrapper,"mousedown",f,!1),E.h.addEventListener(document,"mousemove",h,!1),E.h.addEventListener(document,"mouseup",g,!1))),t.autoResize&&E.h.addEventListener(window,"resize",E.resizeFix,!1),o(),E._wheelEvent=!1,t.mousewheelControl){void 0!==document.onmousewheel&&(E._wheelEvent="mousewheel");try{WheelEvent("wheel"),E._wheelEvent="wheel"}catch(r){}E._wheelEvent||(E._wheelEvent="DOMMouseScroll"),E._wheelEvent&&E.h.addEventListener(E.container,E._wheelEvent,l,!1)}if(t.keyboardControl&&E.h.addEventListener(document,"keydown",a,!1),t.updateOnImagesReady){document.querySelectorAll?E.imagesToLoad=E.container.querySelectorAll("img"):window.jQuery&&(E.imagesToLoad=i(E.container).find("img"));for(var n=0;E.imagesToLoad.length>n;n++)e(E.imagesToLoad[n].getAttribute("src"))}}function o(){if(t.preventLinks){var e=[];document.querySelectorAll?e=E.container.querySelectorAll("a"):window.jQuery&&(e=i(E.container).find("a"));for(var r=0;e.length>r;r++)E.h.addEventListener(e[r],"click",u,!1)}if(t.releaseFormElements)for(var n=document.querySelectorAll?E.container.querySelectorAll("input, textarea, select"):i(E.container).find("input, textarea, select"),r=0;n.length>r;r++)E.h.addEventListener(n[r],E.touchEvents.touchStart,c,!0);if(t.onSlideClick)for(var r=0;E.slides.length>r;r++)E.h.addEventListener(E.slides[r],"click",d,!1);if(t.onSlideTouch)for(var r=0;E.slides.length>r;r++)E.h.addEventListener(E.slides[r],E.touchEvents.touchStart,p,!1)}function s(){if(t.onSlideClick)for(var e=0;E.slides.length>e;e++)E.h.removeEventListener(E.slides[e],"click",d,!1);if(t.onSlideTouch)for(var e=0;E.slides.length>e;e++)E.h.removeEventListener(E.slides[e],E.touchEvents.touchStart,p,!1);if(t.releaseFormElements)for(var r=document.querySelectorAll?E.container.querySelectorAll("input, textarea, select"):i(E.container).find("input, textarea, select"),e=0;r.length>e;e++)E.h.removeEventListener(r[e],E.touchEvents.touchStart,c,!0);if(t.preventLinks){var n=[];document.querySelectorAll?n=E.container.querySelectorAll("a"):window.jQuery&&(n=i(E.container).find("a"));for(var e=0;n.length>e;e++)E.h.removeEventListener(n[e],"click",u,!1)}}function a(e){var t=e.keyCode||e.charCode;if(37==t||39==t||38==t||40==t){for(var i=!1,r=E.h.getOffset(E.container),n=E.h.windowScroll().left,o=E.h.windowScroll().top,s=E.h.windowWidth(),a=E.h.windowHeight(),l=[[r.left,r.top],[r.left+E.width,r.top],[r.left,r.top+E.height],[r.left+E.width,r.top+E.height]],d=0;l.length>d;d++){var p=l[d];p[0]>=n&&n+s>=p[0]&&p[1]>=o&&o+a>=p[1]&&(i=!0)}if(!i)return}R?((37==t||39==t)&&(e.preventDefault?e.preventDefault():e.returnValue=!1),39==t&&E.swipeNext(),37==t&&E.swipePrev()):((38==t||40==t)&&(e.preventDefault?e.preventDefault():e.returnValue=!1),40==t&&E.swipeNext(),38==t&&E.swipePrev())}function l(e){var i,n=E._wheelEvent;if(e.detail?i=-e.detail:"mousewheel"==n?i=e.wheelDelta:"DOMMouseScroll"==n?i=-e.detail:"wheel"==n&&(i=Math.abs(e.deltaX)>Math.abs(e.deltaY)?-e.deltaX:-e.deltaY),t.freeMode){R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y");var o,s;R?(o=E.getWrapperTranslate("x")+i,s=E.getWrapperTranslate("y"),o>0&&(o=0),-r()>o&&(o=-r())):(o=E.getWrapperTranslate("x"),s=E.getWrapperTranslate("y")+i,s>0&&(s=0),-r()>s&&(s=-r())),E.setWrapperTransition(0),E.setWrapperTranslate(o,s,0)}else 0>i?E.swipeNext():E.swipePrev();return t.autoplay&&E.stopAutoplay(),e.preventDefault?e.preventDefault():e.returnValue=!1,!1}function d(){E.allowSlideClick&&(E.clickedSlide=this,E.clickedSlideIndex=E.slides.indexOf(this),t.onSlideClick(E))}function p(){E.clickedSlide=this,E.clickedSlideIndex=E.slides.indexOf(this),t.onSlideTouch(E)}function u(e){return E.allowLinks?void 0:(e.preventDefault?e.preventDefault():e.returnValue=!1,!1)}function c(e){return e.stopPropagation?e.stopPropagation():e.returnValue=!1,!1}function f(e){if(t.preventLinks&&(E.allowLinks=!0),E.isTouched||t.onlyExternal)return!1;if(t.noSwiping&&e.target&&e.target.className&&e.target.className.indexOf(t.noSwipingClass)>-1)return!1;if(q=!1,E.isTouched=!0,_="touchstart"==e.type,!_||1==e.targetTouches.length){t.loop&&E.fixLoop(),E.callPlugins("onTouchStartBegin"),_||(e.preventDefault?e.preventDefault():e.returnValue=!1);var i=_?e.targetTouches[0].pageX:e.pageX||e.clientX,r=_?e.targetTouches[0].pageY:e.pageY||e.clientY;E.touches.startX=E.touches.currentX=i,E.touches.startY=E.touches.currentY=r,E.touches.start=E.touches.current=R?i:r,E.setWrapperTransition(0),E.positions.start=E.positions.current=R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y"),R?E.setWrapperTranslate(E.positions.start,0,0):E.setWrapperTranslate(0,E.positions.start,0),E.times.start=(new Date).getTime(),P=void 0,t.moveStartThreshold>0&&(H=!1),t.onTouchStart&&t.onTouchStart(E),E.callPlugins("onTouchStartEnd")}}function h(e){if(E.isTouched&&!t.onlyExternal&&(!_||"mousemove"!=e.type)){var i=_?e.targetTouches[0].pageX:e.pageX||e.clientX,n=_?e.targetTouches[0].pageY:e.pageY||e.clientY;if(void 0===P&&R&&(P=!!(P||Math.abs(n-E.touches.startY)>Math.abs(i-E.touches.startX))),void 0!==P||R||(P=!!(P||Math.abs(n-E.touches.startY)<Math.abs(i-E.touches.startX))),P)return void(E.isTouched=!1);if(e.assignedToSwiper)return void(E.isTouched=!1);if(e.assignedToSwiper=!0,E.isMoved=!0,t.preventLinks&&(E.allowLinks=!1),t.onSlideClick&&(E.allowSlideClick=!1),t.autoplay&&E.stopAutoplay(),!_||1==e.touches.length){if(E.callPlugins("onTouchMoveStart"),e.preventDefault?e.preventDefault():e.returnValue=!1,E.touches.current=R?i:n,E.positions.current=(E.touches.current-E.touches.start)*t.touchRatio+E.positions.start,E.positions.current>0&&t.onResistanceBefore&&t.onResistanceBefore(E,E.positions.current),E.positions.current<-r()&&t.onResistanceBefore&&t.onResistanceAfter(E,Math.abs(E.positions.current+r())),t.resistance&&"100%"!=t.resistance){if(E.positions.current>0){var o=1-E.positions.current/A/2;E.positions.current=.5>o?A/2:E.positions.current*o}if(E.positions.current<-r()){var s=(E.touches.current-E.touches.start)*t.touchRatio+(r()+E.positions.start),o=(A+s)/A,a=E.positions.current-s*(1-o)/2,l=-r()-A/2;E.positions.current=l>a||0>=o?l:a}}if(t.resistance&&"100%"==t.resistance&&(E.positions.current>0&&(!t.freeMode||t.freeModeFluid)&&(E.positions.current=0),E.positions.current<-r()&&(!t.freeMode||t.freeModeFluid)&&(E.positions.current=-r())),!t.followFinger)return;return t.moveStartThreshold?Math.abs(E.touches.current-E.touches.start)>t.moveStartThreshold||H?(H=!0,R?E.setWrapperTranslate(E.positions.current,0,0):E.setWrapperTranslate(0,E.positions.current,0)):E.positions.current=E.positions.start:R?E.setWrapperTranslate(E.positions.current,0,0):E.setWrapperTranslate(0,E.positions.current,0),(t.freeMode||t.watchActiveIndex)&&E.updateActiveSlide(E.positions.current),t.grabCursor&&(E.container.style.cursor="move",E.container.style.cursor="grabbing",E.container.style.cursor="-moz-grabbin",E.container.style.cursor="-webkit-grabbing"),F||(F=E.touches.current),O||(O=(new Date).getTime()),E.velocity=(E.touches.current-F)/((new Date).getTime()-O)/2,2>Math.abs(E.touches.current-F)&&(E.velocity=0),F=E.touches.current,O=(new Date).getTime(),E.callPlugins("onTouchMoveEnd"),t.onTouchMove&&t.onTouchMove(E),!1}}}function g(){if(P&&E.swipeReset(),!t.onlyExternal&&E.isTouched){E.isTouched=!1,t.grabCursor&&(E.container.style.cursor="move",E.container.style.cursor="grab",E.container.style.cursor="-moz-grab",E.container.style.cursor="-webkit-grab"),E.positions.current||0===E.positions.current||(E.positions.current=E.positions.start),t.followFinger&&(R?E.setWrapperTranslate(E.positions.current,0,0):E.setWrapperTranslate(0,E.positions.current,0)),E.times.end=(new Date).getTime(),E.touches.diff=E.touches.current-E.touches.start,E.touches.abs=Math.abs(E.touches.diff),E.positions.diff=E.positions.current-E.positions.start,E.positions.abs=Math.abs(E.positions.diff);var e=E.positions.diff,i=E.positions.abs,n=E.times.end-E.times.start;if(5>i&&300>n&&0==E.allowLinks&&(t.freeMode||0==i||E.swipeReset(),t.preventLinks&&(E.allowLinks=!0),t.onSlideClick&&(E.allowSlideClick=!0)),setTimeout(function(){t.preventLinks&&(E.allowLinks=!0),t.onSlideClick&&(E.allowSlideClick=!0)},100),!E.isMoved)return E.isMoved=!1,t.onTouchEnd&&t.onTouchEnd(E),void E.callPlugins("onTouchEnd");E.isMoved=!1;var o=r();if(E.positions.current>0)return E.swipeReset(),t.onTouchEnd&&t.onTouchEnd(E),void E.callPlugins("onTouchEnd");if(-o>E.positions.current)return E.swipeReset(),t.onTouchEnd&&t.onTouchEnd(E),void E.callPlugins("onTouchEnd");if(t.freeMode){if(t.freeModeFluid){var s,a=1e3*t.momentumRatio,l=E.velocity*a,d=E.positions.current+l,p=!1,u=20*Math.abs(E.velocity)*t.momentumBounceRatio;-o>d&&(t.momentumBounce&&E.support.transitions?(-u>d+o&&(d=-o-u),s=-o,p=!0,q=!0):d=-o),d>0&&(t.momentumBounce&&E.support.transitions?(d>u&&(d=u),s=0,p=!0,q=!0):d=0),0!=E.velocity&&(a=Math.abs((d-E.positions.current)/E.velocity)),R?E.setWrapperTranslate(d,0,0):E.setWrapperTranslate(0,d,0),E.setWrapperTransition(a),t.momentumBounce&&p&&E.wrapperTransitionEnd(function(){q&&(t.onMomentumBounce&&t.onMomentumBounce(E),R?E.setWrapperTranslate(s,0,0):E.setWrapperTranslate(0,s,0),E.setWrapperTransition(300))}),E.updateActiveSlide(d)}return(!t.freeModeFluid||n>=300)&&E.updateActiveSlide(E.positions.current),t.onTouchEnd&&t.onTouchEnd(E),void E.callPlugins("onTouchEnd")}b=0>e?"toNext":"toPrev","toNext"==b&&300>=n&&(30>i||!t.shortSwipes?E.swipeReset():E.swipeNext(!0)),"toPrev"==b&&300>=n&&(30>i||!t.shortSwipes?E.swipeReset():E.swipePrev(!0));var c=0;if("auto"==t.slidesPerView){for(var f,h=Math.abs(R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y")),g=0,v=0;E.slides.length>v;v++)if(f=R?E.slides[v].getWidth(!0):E.slides[v].getHeight(!0),g+=f,g>h){c=f;break}c>A&&(c=A)}else c=C*t.slidesPerView;"toNext"==b&&n>300&&(i>=.5*c?E.swipeNext(!0):E.swipeReset()),"toPrev"==b&&n>300&&(i>=.5*c?E.swipePrev(!0):E.swipeReset()),t.onTouchEnd&&t.onTouchEnd(E),E.callPlugins("onTouchEnd")}}function v(e,i,r){function n(){s+=a,d="toNext"==l?s>e:e>s,d?(R?E.setWrapperTranslate(Math.round(s),0):E.setWrapperTranslate(0,Math.round(s)),E._DOMAnimating=!0,window.setTimeout(function(){n()},1e3/60)):(t.onSlideChangeEnd&&t.onSlideChangeEnd(E),R?E.setWrapperTranslate(e,0):E.setWrapperTranslate(0,e),E._DOMAnimating=!1)}if(E.support.transitions||!t.DOMAnimation){R?E.setWrapperTranslate(e,0,0):E.setWrapperTranslate(0,e,0);var o="to"==i&&r.speed>=0?r.speed:t.speed;E.setWrapperTransition(o)}else{var s=R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y"),o="to"==i&&r.speed>=0?r.speed:t.speed,a=Math.ceil((e-s)/o*(1e3/60)),l=s>e?"toNext":"toPrev",d="toNext"==l?s>e:e>s;if(E._DOMAnimating)return;n()}E.updateActiveSlide(e),t.onSlideNext&&"next"==i&&t.onSlideNext(E,e),t.onSlidePrev&&"prev"==i&&t.onSlidePrev(E,e),t.onSlideReset&&"reset"==i&&t.onSlideReset(E,e),("next"==i||"prev"==i||"to"==i&&1==r.runCallbacks)&&w()}function w(){if(E.callPlugins("onSlideChangeStart"),t.onSlideChangeStart)if(t.queueStartCallbacks&&E.support.transitions){if(E._queueStartCallbacks)return;E._queueStartCallbacks=!0,t.onSlideChangeStart(E),E.wrapperTransitionEnd(function(){E._queueStartCallbacks=!1})}else t.onSlideChangeStart(E);if(t.onSlideChangeEnd)if(E.support.transitions)if(t.queueEndCallbacks){if(E._queueEndCallbacks)return;E._queueEndCallbacks=!0,E.wrapperTransitionEnd(t.onSlideChangeEnd)}else E.wrapperTransitionEnd(t.onSlideChangeEnd);else t.DOMAnimation||setTimeout(function(){t.onSlideChangeEnd(E)},10)}function m(){for(var e=E.paginationButtons,t=0;e.length>t;t++)E.h.removeEventListener(e[t],"click",T,!1)}function S(){for(var e=E.paginationButtons,t=0;e.length>t;t++)E.h.addEventListener(e[t],"click",T,!1)}function T(e){for(var t,i=e.target||e.srcElement,r=E.paginationButtons,n=0;r.length>n;n++)i===r[n]&&(t=n);E.swipeTo(t)}function y(){E.calcSlides(),t.loader.slides.length>0&&0==E.slides.length&&E.loadSlides(),t.loop&&E.createLoop(),E.init(),n(),t.pagination&&t.createPagination&&E.createPagination(!0),t.loop||t.initialSlide>0?E.swipeTo(t.initialSlide,0,!1):E.updateActiveSlide(0),t.autoplay&&E.startAutoplay()}if(document.body.__defineGetter__&&HTMLElement){var x=HTMLElement.prototype;x.__defineGetter__&&x.__defineGetter__("outerHTML",function(){return(new XMLSerializer).serializeToString(this)})}if(window.getComputedStyle||(window.getComputedStyle=function(e){return this.el=e,this.getPropertyValue=function(t){var i=/(\-([a-z]){1})/g;return"float"===t&&(t="styleFloat"),i.test(t)&&(t=t.replace(i,function(){return arguments[2].toUpperCase()})),e.currentStyle[t]?e.currentStyle[t]:null},this}),Array.prototype.indexOf||(Array.prototype.indexOf=function(e,t){for(var i=t||0,r=this.length;r>i;i++)if(this[i]===e)return i;return-1}),(document.querySelectorAll||window.jQuery)&&void 0!==e&&(e.nodeType||0!==i(e).length)){var E=this;E.touches={start:0,startX:0,startY:0,current:0,currentX:0,currentY:0,diff:0,abs:0},E.positions={start:0,abs:0,diff:0,current:0},E.times={start:0,end:0},E.id=(new Date).getTime(),E.container=e.nodeType?e:i(e)[0],E.isTouched=!1,E.isMoved=!1,E.activeIndex=0,E.activeLoaderIndex=0,E.activeLoopIndex=0,E.previousIndex=null,E.velocity=0,E.snapGrid=[],E.slidesGrid=[],E.imagesToLoad=[],E.imagesLoaded=0,E.wrapperLeft=0,E.wrapperRight=0,E.wrapperTop=0,E.wrapperBottom=0;var L,C,M,b,P,A,W={mode:"horizontal",touchRatio:1,speed:300,freeMode:!1,freeModeFluid:!1,momentumRatio:1,momentumBounce:!0,momentumBounceRatio:1,slidesPerView:1,slidesPerGroup:1,simulateTouch:!0,followFinger:!0,shortSwipes:!0,moveStartThreshold:!1,autoplay:!1,onlyExternal:!1,createPagination:!0,pagination:!1,paginationElement:"span",paginationClickable:!1,paginationAsRange:!0,resistance:!0,scrollContainer:!1,preventLinks:!0,noSwiping:!1,noSwipingClass:"swiper-no-swiping",initialSlide:0,keyboardControl:!1,mousewheelControl:!1,useCSS3Transforms:!0,loop:!1,loopAdditionalSlides:0,calculateHeight:!1,updateOnImagesReady:!0,releaseFormElements:!0,watchActiveIndex:!1,visibilityFullFit:!1,offsetPxBefore:0,offsetPxAfter:0,offsetSlidesBefore:0,offsetSlidesAfter:0,centeredSlides:!1,queueStartCallbacks:!1,queueEndCallbacks:!1,autoResize:!0,resizeReInit:!1,DOMAnimation:!0,loader:{slides:[],slidesHTMLType:"inner",surroundGroups:1,logic:"reload",loadAllSlides:!1},slideElement:"div",slideClass:"swiper-slide",slideActiveClass:"swiper-slide-active",slideVisibleClass:"swiper-slide-visible",wrapperClass:"swiper-wrapper",paginationElementClass:"swiper-pagination-switch",paginationActiveClass:"swiper-active-switch",paginationVisibleClass:"swiper-visible-switch"};t=t||{};for(var k in W)if(k in t&&"object"==typeof t[k])for(var I in W[k])I in t[k]||(t[k][I]=W[k][I]);else k in t||(t[k]=W[k]);E.params=t,t.scrollContainer&&(t.freeMode=!0,t.freeModeFluid=!0),t.loop&&(t.resistance="100%");var R="horizontal"===t.mode;E.touchEvents={touchStart:E.support.touch||!t.simulateTouch?"touchstart":E.browser.ie10?"MSPointerDown":"mousedown",touchMove:E.support.touch||!t.simulateTouch?"touchmove":E.browser.ie10?"MSPointerMove":"mousemove",touchEnd:E.support.touch||!t.simulateTouch?"touchend":E.browser.ie10?"MSPointerUp":"mouseup"};for(var G=E.container.childNodes.length-1;G>=0;G--)if(E.container.childNodes[G].className)for(var B=E.container.childNodes[G].className.split(" "),D=0;B.length>D;D++)B[D]===t.wrapperClass&&(L=E.container.childNodes[G]);E.wrapper=L,E._extendSwiperSlide=function(e){return e.append=function(){return t.loop?(e.insertAfter(E.slides.length-E.loopedSlides),E.removeLoopedSlides(),E.calcSlides(),E.createLoop()):E.wrapper.appendChild(e),E.reInit(),e},e.prepend=function(){return t.loop?(E.wrapper.insertBefore(e,E.slides[E.loopedSlides]),E.removeLoopedSlides(),E.calcSlides(),E.createLoop()):E.wrapper.insertBefore(e,E.wrapper.firstChild),E.reInit(),e},e.insertAfter=function(i){if(void 0===i)return!1;var r;return t.loop?(r=E.slides[i+1+E.loopedSlides],E.wrapper.insertBefore(e,r),E.removeLoopedSlides(),E.calcSlides(),E.createLoop()):(r=E.slides[i+1],E.wrapper.insertBefore(e,r)),E.reInit(),e},e.clone=function(){return E._extendSwiperSlide(e.cloneNode(!0))},e.remove=function(){E.wrapper.removeChild(e),E.reInit()},e.html=function(t){return void 0===t?e.innerHTML:(e.innerHTML=t,e)},e.index=function(){for(var t,i=E.slides.length-1;i>=0;i--)e===E.slides[i]&&(t=i);return t},e.isActive=function(){return e.index()===E.activeIndex},e.swiperSlideDataStorage||(e.swiperSlideDataStorage={}),e.getData=function(t){return e.swiperSlideDataStorage[t]},e.setData=function(t,i){return e.swiperSlideDataStorage[t]=i,e},e.data=function(t,i){return i?(e.setAttribute("data-"+t,i),e):e.getAttribute("data-"+t)},e.getWidth=function(t){return E.h.getWidth(e,t)},e.getHeight=function(t){return E.h.getHeight(e,t)},e.getOffset=function(){return E.h.getOffset(e)},e},E.calcSlides=function(e){var i=E.slides?E.slides.length:!1;E.slides=[],E.displaySlides=[];for(var r=0;E.wrapper.childNodes.length>r;r++)if(E.wrapper.childNodes[r].className)for(var n=E.wrapper.childNodes[r].className,a=n.split(" "),l=0;a.length>l;l++)a[l]===t.slideClass&&E.slides.push(E.wrapper.childNodes[r]);for(r=E.slides.length-1;r>=0;r--)E._extendSwiperSlide(E.slides[r]);i&&(i!==E.slides.length||e)&&(s(),o(),E.updateActiveSlide(),t.createPagination&&E.params.pagination&&E.createPagination(),E.callPlugins("numberOfSlidesChanged"))},E.createSlide=function(e,i,r){var i=i||E.params.slideClass,r=r||t.slideElement,n=document.createElement(r);return n.innerHTML=e||"",n.className=i,E._extendSwiperSlide(n)},E.appendSlide=function(e,t,i){return e?e.nodeType?E._extendSwiperSlide(e).append():E.createSlide(e,t,i).append():void 0},E.prependSlide=function(e,t,i){return e?e.nodeType?E._extendSwiperSlide(e).prepend():E.createSlide(e,t,i).prepend():void 0},E.insertSlideAfter=function(e,t,i,r){return void 0===e?!1:t.nodeType?E._extendSwiperSlide(t).insertAfter(e):E.createSlide(t,i,r).insertAfter(e)},E.removeSlide=function(e){if(E.slides[e]){if(t.loop){if(!E.slides[e+E.loopedSlides])return!1;E.slides[e+E.loopedSlides].remove(),E.removeLoopedSlides(),E.calcSlides(),E.createLoop()}else E.slides[e].remove();return!0}return!1},E.removeLastSlide=function(){return E.slides.length>0?(t.loop?(E.slides[E.slides.length-1-E.loopedSlides].remove(),E.removeLoopedSlides(),E.calcSlides(),E.createLoop()):E.slides[E.slides.length-1].remove(),!0):!1},E.removeAllSlides=function(){for(var e=E.slides.length-1;e>=0;e--)E.slides[e].remove()},E.getSlide=function(e){return E.slides[e]},E.getLastSlide=function(){return E.slides[E.slides.length-1]},E.getFirstSlide=function(){return E.slides[0]},E.activeSlide=function(){return E.slides[E.activeIndex]};var N=[];for(var z in E.plugins)if(t[z]){var V=E.plugins[z](E,t[z]);V&&N.push(V)}E.callPlugins=function(e,t){t||(t={});for(var i=0;N.length>i;i++)e in N[i]&&N[i][e](t)},E.browser.ie10&&!t.onlyExternal&&(R?E.wrapper.classList.add("swiper-wp8-horizontal"):E.wrapper.classList.add("swiper-wp8-vertical")),t.freeMode&&(E.container.className+=" swiper-free-mode"),E.initialized=!1,E.init=function(e,i){var r=E.h.getWidth(E.container),n=E.h.getHeight(E.container);if(r!==E.width||n!==E.height||e){E.width=r,E.height=n,A=R?r:n;var o=E.wrapper;if(e&&E.calcSlides(i),"auto"===t.slidesPerView){var s=0,a=0;t.slidesOffset>0&&(o.style.paddingLeft="",o.style.paddingRight="",o.style.paddingTop="",o.style.paddingBottom=""),o.style.width="",o.style.height="",t.offsetPxBefore>0&&(R?E.wrapperLeft=t.offsetPxBefore:E.wrapperTop=t.offsetPxBefore),t.offsetPxAfter>0&&(R?E.wrapperRight=t.offsetPxAfter:E.wrapperBottom=t.offsetPxAfter),t.centeredSlides&&(R?(E.wrapperLeft=(A-this.slides[0].getWidth(!0))/2,E.wrapperRight=(A-E.slides[E.slides.length-1].getWidth(!0))/2):(E.wrapperTop=(A-E.slides[0].getHeight(!0))/2,E.wrapperBottom=(A-E.slides[E.slides.length-1].getHeight(!0))/2)),R?(E.wrapperLeft>=0&&(o.style.paddingLeft=E.wrapperLeft+"px"),E.wrapperRight>=0&&(o.style.paddingRight=E.wrapperRight+"px")):(E.wrapperTop>=0&&(o.style.paddingTop=E.wrapperTop+"px"),E.wrapperBottom>=0&&(o.style.paddingBottom=E.wrapperBottom+"px"));var l=0,d=0;E.snapGrid=[],E.slidesGrid=[];for(var p=0,u=0;E.slides.length>u;u++){var c=E.slides[u].getWidth(!0),f=E.slides[u].getHeight(!0);t.calculateHeight&&(p=Math.max(p,f));var h=R?c:f;if(t.centeredSlides){var g=u===E.slides.length-1?0:E.slides[u+1].getWidth(!0),v=u===E.slides.length-1?0:E.slides[u+1].getHeight(!0),w=R?g:v;if(h>A){for(var m=0;Math.floor(h/(A+E.wrapperLeft))>=m;m++)0===m?E.snapGrid.push(l+E.wrapperLeft):E.snapGrid.push(l+E.wrapperLeft+A*m);E.slidesGrid.push(l+E.wrapperLeft)}else E.snapGrid.push(d),E.slidesGrid.push(d);d+=h/2+w/2}else{if(h>A)for(var m=0;Math.floor(h/A)>=m;m++)E.snapGrid.push(l+A*m);else E.snapGrid.push(l);E.slidesGrid.push(l)}l+=h,s+=c,a+=f}t.calculateHeight&&(E.height=p),R?(M=s+E.wrapperRight+E.wrapperLeft,o.style.width=s+"px",o.style.height=E.height+"px"):(M=a+E.wrapperTop+E.wrapperBottom,o.style.width=E.width+"px",o.style.height=a+"px")}else if(t.scrollContainer){o.style.width="",o.style.height="";var S=E.slides[0].getWidth(!0),T=E.slides[0].getHeight(!0);M=R?S:T,o.style.width=S+"px",o.style.height=T+"px",C=R?S:T}else{if(t.calculateHeight){var p=0,T=0;R||(E.container.style.height=""),o.style.height="";for(var u=0;E.slides.length>u;u++)E.slides[u].style.height="",p=Math.max(E.slides[u].getHeight(!0),p),R||(T+=E.slides[u].getHeight(!0));var f=p;if(R)var T=f;A=E.height=f,R||(E.container.style.height=A+"px")}else var f=R?E.height:E.height/t.slidesPerView,T=R?E.height:E.slides.length*f;var c=R?E.width/t.slidesPerView:E.width,S=R?E.slides.length*c:E.width;C=R?c:f,t.offsetSlidesBefore>0&&(R?E.wrapperLeft=C*t.offsetSlidesBefore:E.wrapperTop=C*t.offsetSlidesBefore),t.offsetSlidesAfter>0&&(R?E.wrapperRight=C*t.offsetSlidesAfter:E.wrapperBottom=C*t.offsetSlidesAfter),t.offsetPxBefore>0&&(R?E.wrapperLeft=t.offsetPxBefore:E.wrapperTop=t.offsetPxBefore),t.offsetPxAfter>0&&(R?E.wrapperRight=t.offsetPxAfter:E.wrapperBottom=t.offsetPxAfter),t.centeredSlides&&(R?(E.wrapperLeft=(A-C)/2,E.wrapperRight=(A-C)/2):(E.wrapperTop=(A-C)/2,E.wrapperBottom=(A-C)/2)),R?(E.wrapperLeft>0&&(o.style.paddingLeft=E.wrapperLeft+"px"),E.wrapperRight>0&&(o.style.paddingRight=E.wrapperRight+"px")):(E.wrapperTop>0&&(o.style.paddingTop=E.wrapperTop+"px"),E.wrapperBottom>0&&(o.style.paddingBottom=E.wrapperBottom+"px")),M=R?S+E.wrapperRight+E.wrapperLeft:T+E.wrapperTop+E.wrapperBottom,o.style.width=S+"px",o.style.height=T+"px";var l=0;E.snapGrid=[],E.slidesGrid=[];for(var u=0;E.slides.length>u;u++)E.snapGrid.push(l),E.slidesGrid.push(l),l+=C,E.slides[u].style.width=c+"px",E.slides[u].style.height=f+"px"}E.initialized?E.callPlugins("onInit"):E.callPlugins("onFirstInit"),E.initialized=!0}},E.reInit=function(e){E.init(!0,e)},E.resizeFix=function(e){if(E.callPlugins("beforeResizeFix"),E.init(t.resizeReInit||e),t.freeMode){var i=R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y");if(-r()>i){var n=R?-r():0,o=R?0:-r();E.setWrapperTransition(0),E.setWrapperTranslate(n,o,0)}}else t.loop?E.swipeTo(E.activeLoopIndex,0,!1):E.swipeTo(E.activeIndex,0,!1);E.callPlugins("afterResizeFix")},E.destroy=function(){E.browser.ie10?(E.h.removeEventListener(E.wrapper,E.touchEvents.touchStart,f,!1),E.h.removeEventListener(document,E.touchEvents.touchMove,h,!1),E.h.removeEventListener(document,E.touchEvents.touchEnd,g,!1)):(E.support.touch&&(E.h.removeEventListener(E.wrapper,"touchstart",f,!1),E.h.removeEventListener(E.wrapper,"touchmove",h,!1),E.h.removeEventListener(E.wrapper,"touchend",g,!1)),t.simulateTouch&&(E.h.removeEventListener(E.wrapper,"mousedown",f,!1),E.h.removeEventListener(document,"mousemove",h,!1),E.h.removeEventListener(document,"mouseup",g,!1))),t.autoResize&&E.h.removeEventListener(window,"resize",E.resizeFix,!1),s(),t.paginationClickable&&m(),t.mousewheelControl&&E._wheelEvent&&E.h.removeEventListener(E.container,E._wheelEvent,l,!1),t.keyboardControl&&E.h.removeEventListener(document,"keydown",a,!1),t.autoplay&&E.stopAutoplay(),E.callPlugins("onDestroy")},t.grabCursor&&(E.container.style.cursor="move",E.container.style.cursor="grab",E.container.style.cursor="-moz-grab",E.container.style.cursor="-webkit-grab"),E.allowSlideClick=!0,E.allowLinks=!0;var H,F,O,_=!1,q=!0;E.swipeNext=function(e){!e&&t.loop&&E.fixLoop(),E.callPlugins("onSwipeNext");var i=R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y"),n=i;if("auto"==t.slidesPerView){for(var o=0;E.snapGrid.length>o;o++)if(-i>=E.snapGrid[o]&&E.snapGrid[o+1]>-i){n=-E.snapGrid[o+1];break}}else{var s=C*t.slidesPerGroup;n=-(Math.floor(Math.abs(i)/Math.floor(s))*s+s)}return-r()>n&&(n=-r()),n==i?!1:(v(n,"next"),!0)},E.swipePrev=function(e){!e&&t.loop&&E.fixLoop(),!e&&t.autoplay&&E.stopAutoplay(),E.callPlugins("onSwipePrev");var i,r=Math.ceil(R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y"));if("auto"==t.slidesPerView){i=0;for(var n=1;E.snapGrid.length>n;n++){if(-r==E.snapGrid[n]){i=-E.snapGrid[n-1];break}if(-r>E.snapGrid[n]&&E.snapGrid[n+1]>-r){i=-E.snapGrid[n];break}}}else{var o=C*t.slidesPerGroup;i=-(Math.ceil(-r/o)-1)*o}return i>0&&(i=0),i==r?!1:(v(i,"prev"),!0)},E.swipeReset=function(){E.callPlugins("onSwipeReset");var e,i=R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y"),n=C*t.slidesPerGroup;if(-r(),"auto"==t.slidesPerView){e=0;for(var o=0;E.snapGrid.length>o;o++){if(-i===E.snapGrid[o])return;if(-i>=E.snapGrid[o]&&E.snapGrid[o+1]>-i){e=E.positions.diff>0?-E.snapGrid[o+1]:-E.snapGrid[o];break}}-i>=E.snapGrid[E.snapGrid.length-1]&&(e=-E.snapGrid[E.snapGrid.length-1]),-r()>=i&&(e=-r())}else e=0>i?Math.round(i/n)*n:0;return t.scrollContainer&&(e=0>i?i:0),-r()>e&&(e=-r()),t.scrollContainer&&A>C&&(e=0),e==i?!1:(v(e,"reset"),!0)},E.swipeTo=function(e,i,n){e=parseInt(e,10),E.callPlugins("onSwipeTo",{index:e,speed:i}),t.loop&&(e+=E.loopedSlides);var o=R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y");if(!(e>E.slides.length-1||0>e)){var s;return s="auto"==t.slidesPerView?-E.slidesGrid[e]:-e*C,-r()>s&&(s=-r()),s==o?!1:(n=n!==!1,v(s,"to",{index:e,speed:i,runCallbacks:n}),!0)}},E._queueStartCallbacks=!1,E._queueEndCallbacks=!1,E.updateActiveSlide=function(e){if(E.initialized&&0!=E.slides.length){if(E.previousIndex=E.activeIndex,e>0&&(e=0),void 0===e&&(e=R?E.getWrapperTranslate("x"):E.getWrapperTranslate("y")),"auto"==t.slidesPerView){if(E.activeIndex=E.slidesGrid.indexOf(-e),0>E.activeIndex){for(var i=0;E.slidesGrid.length-1>i&&!(-e>E.slidesGrid[i]&&E.slidesGrid[i+1]>-e);i++);var r=Math.abs(E.slidesGrid[i]+e),n=Math.abs(E.slidesGrid[i+1]+e);E.activeIndex=n>=r?i:i+1}}else E.activeIndex=t.visibilityFullFit?Math.ceil(-e/C):Math.round(-e/C);if(E.activeIndex==E.slides.length&&(E.activeIndex=E.slides.length-1),0>E.activeIndex&&(E.activeIndex=0),E.slides[E.activeIndex]){E.calcVisibleSlides(e);for(var o=RegExp("\\s*"+t.slideActiveClass),s=RegExp("\\s*"+t.slideVisibleClass),i=0;E.slides.length>i;i++)E.slides[i].className=E.slides[i].className.replace(o,"").replace(s,""),E.visibleSlides.indexOf(E.slides[i])>=0&&(E.slides[i].className+=" "+t.slideVisibleClass);if(E.slides[E.activeIndex].className+=" "+t.slideActiveClass,t.loop){var a=E.loopedSlides;E.activeLoopIndex=E.activeIndex-a,E.activeLoopIndex>=E.slides.length-2*a&&(E.activeLoopIndex=E.slides.length-2*a-E.activeLoopIndex),0>E.activeLoopIndex&&(E.activeLoopIndex=E.slides.length-2*a+E.activeLoopIndex)}else E.activeLoopIndex=E.activeIndex;t.pagination&&E.updatePagination(e)}}},E.createPagination=function(e){t.paginationClickable&&E.paginationButtons&&m();var r="",n=E.slides.length,o=n;t.loop&&(o-=2*E.loopedSlides);for(var s=0;o>s;s++)r+="<"+t.paginationElement+' class="'+t.paginationElementClass+'"></'+t.paginationElement+">";E.paginationContainer=t.pagination.nodeType?t.pagination:i(t.pagination)[0],E.paginationContainer.innerHTML=r,E.paginationButtons=[],document.querySelectorAll?E.paginationButtons=E.paginationContainer.querySelectorAll("."+t.paginationElementClass):window.jQuery&&(E.paginationButtons=i(E.paginationContainer).find("."+t.paginationElementClass)),e||E.updatePagination(),E.callPlugins("onCreatePagination"),t.paginationClickable&&S()},E.updatePagination=function(e){if(!(1>E.slides.length)){if(document.querySelectorAll)var r=E.paginationContainer.querySelectorAll("."+t.paginationActiveClass);else if(window.jQuery)var r=i(E.paginationContainer).find("."+t.paginationActiveClass);if(r){for(var n=E.paginationButtons,o=0;n.length>o;o++)n[o].className=t.paginationElementClass;var s=t.loop?E.loopedSlides:0;if(t.paginationAsRange){E.visibleSlides||E.calcVisibleSlides(e);for(var a=[],o=0;E.visibleSlides.length>o;o++){var l=E.slides.indexOf(E.visibleSlides[o])-s;t.loop&&0>l&&(l=E.slides.length-2*E.loopedSlides+l),t.loop&&l>=E.slides.length-2*E.loopedSlides&&(l=E.slides.length-2*E.loopedSlides-l,l=Math.abs(l)),a.push(l)}for(o=0;a.length>o;o++)n[a[o]]&&(n[a[o]].className+=" "+t.paginationVisibleClass);t.loop?n[E.activeLoopIndex].className+=" "+t.paginationActiveClass:n[E.activeIndex].className+=" "+t.paginationActiveClass}else t.loop?n[E.activeLoopIndex].className+=" "+t.paginationActiveClass+" "+t.paginationVisibleClass:n[E.activeIndex].className+=" "+t.paginationActiveClass+" "+t.paginationVisibleClass}}},E.calcVisibleSlides=function(e){var i=[],r=0,n=0,o=0;R&&E.wrapperLeft>0&&(e+=E.wrapperLeft),!R&&E.wrapperTop>0&&(e+=E.wrapperTop);for(var s=0;E.slides.length>s;s++){r+=n,n="auto"==t.slidesPerView?R?E.h.getWidth(E.slides[s],!0):E.h.getHeight(E.slides[s],!0):C,o=r+n;var a=!1;t.visibilityFullFit?(r>=-e&&-e+A>=o&&(a=!0),-e>=r&&o>=-e+A&&(a=!0)):(o>-e&&-e+A>=o&&(a=!0),r>=-e&&-e+A>r&&(a=!0),-e>r&&o>-e+A&&(a=!0)),a&&i.push(E.slides[s])}0==i.length&&(i=[E.slides[E.activeIndex]]),E.visibleSlides=i};var Y=void 0;E.startAutoplay=function(){return void 0!==Y?!1:(t.autoplay&&!t.loop&&(Y=setInterval(function(){E.swipeNext(!0)||E.swipeTo(0)},t.autoplay)),t.autoplay&&t.loop&&(autoPlay=setInterval(function(){E.swipeNext()},t.autoplay)),void E.callPlugins("onAutoplayStart"))},E.stopAutoplay=function(){Y&&clearInterval(Y),Y=void 0,E.callPlugins("onAutoplayStop")},E.loopCreated=!1,E.removeLoopedSlides=function(){if(E.loopCreated)for(var e=0;E.slides.length>e;e++)E.slides[e].getData("looped")===!0&&E.wrapper.removeChild(E.slides[e])},E.createLoop=function(){if(0!=E.slides.length){E.loopedSlides=t.slidesPerView+t.loopAdditionalSlides;for(var e="",i="",r=0;E.loopedSlides>r;r++)e+=E.slides[r].outerHTML;for(r=E.slides.length-E.loopedSlides;E.slides.length>r;r++)i+=E.slides[r].outerHTML;for(L.innerHTML=i+L.innerHTML+e,E.loopCreated=!0,E.calcSlides(),r=0;E.slides.length>r;r++)(E.loopedSlides>r||r>=E.slides.length-E.loopedSlides)&&E.slides[r].setData("looped",!0);E.callPlugins("onCreateLoop")}},E.fixLoop=function(){if(E.activeIndex<E.loopedSlides){var e=E.slides.length-3*E.loopedSlides+E.activeIndex;E.swipeTo(e,0,!1)}else if(E.activeIndex>E.slides.length-2*t.slidesPerView){var e=-E.slides.length+E.activeIndex+E.loopedSlides;E.swipeTo(e,0,!1)}},E.loadSlides=function(){var e="";E.activeLoaderIndex=0;for(var i=t.loader.slides,r=t.loader.loadAllSlides?i.length:t.slidesPerView*(1+t.loader.surroundGroups),n=0;r>n;n++)e+="outer"==t.loader.slidesHTMLType?i[n]:"<"+t.slideElement+' class="'+t.slideClass+'" data-swiperindex="'+n+'">'+i[n]+"</"+t.slideElement+">";E.wrapper.innerHTML=e,E.calcSlides(!0),t.loader.loadAllSlides||E.wrapperTransitionEnd(E.reloadSlides,!0)},E.reloadSlides=function(){var e=t.loader.slides,i=parseInt(E.activeSlide().data("swiperindex"),10);
if(!(0>i||i>e.length-1)){E.activeLoaderIndex=i;var r=Math.max(0,i-t.slidesPerView*t.loader.surroundGroups),n=Math.min(i+t.slidesPerView*(1+t.loader.surroundGroups)-1,e.length-1);if(i>0){var o=-C*(i-r);R?E.setWrapperTranslate(o,0,0):E.setWrapperTranslate(0,o,0),E.setWrapperTransition(0)}if("reload"===t.loader.logic){E.wrapper.innerHTML="";for(var s="",a=r;n>=a;a++)s+="outer"==t.loader.slidesHTMLType?e[a]:"<"+t.slideElement+' class="'+t.slideClass+'" data-swiperindex="'+a+'">'+e[a]+"</"+t.slideElement+">";E.wrapper.innerHTML=s}else{for(var l=1e3,d=0,a=0;E.slides.length>a;a++){var p=E.slides[a].data("swiperindex");r>p||p>n?E.wrapper.removeChild(E.slides[a]):(l=Math.min(p,l),d=Math.max(p,d))}for(var a=r;n>=a;a++){if(l>a){var u=document.createElement(t.slideElement);u.className=t.slideClass,u.setAttribute("data-swiperindex",a),u.innerHTML=e[a],E.wrapper.insertBefore(u,E.wrapper.firstChild)}if(a>d){var u=document.createElement(t.slideElement);u.className=t.slideClass,u.setAttribute("data-swiperindex",a),u.innerHTML=e[a],E.wrapper.appendChild(u)}}}E.reInit(!0)}},y()}};Swiper.prototype={plugins:{},wrapperTransitionEnd:function(e,t){function i(){if(e(r),r.params.queueEndCallbacks&&(r._queueEndCallbacks=!1),!t)for(var s=0;o.length>s;s++)n.removeEventListener(o[s],i,!1)}var r=this,n=r.wrapper,o=["webkitTransitionEnd","transitionend","oTransitionEnd","MSTransitionEnd","msTransitionEnd"];if(e)for(var s=0;o.length>s;s++)n.addEventListener(o[s],i,!1)},getWrapperTranslate:function(e){var t,i,r=this.wrapper;if(window.WebKitCSSMatrix){var n=new WebKitCSSMatrix(window.getComputedStyle(r,null).webkitTransform);t=(""+n).split(",")}else{var n=window.getComputedStyle(r,null).MozTransform||window.getComputedStyle(r,null).OTransform||window.getComputedStyle(r,null).MsTransform||window.getComputedStyle(r,null).msTransform||window.getComputedStyle(r,null).transform||window.getComputedStyle(r,null).getPropertyValue("transform").replace("translate(","matrix(1, 0, 0, 1,");t=(""+n).split(",")}return this.params.useCSS3Transforms?("x"==e&&(i=16==t.length?parseFloat(t[12]):window.WebKitCSSMatrix?n.m41:parseFloat(t[4])),"y"==e&&(i=16==t.length?parseFloat(t[13]):window.WebKitCSSMatrix?n.m42:parseFloat(t[5]))):("x"==e&&(i=parseFloat(r.style.left,10)||0),"y"==e&&(i=parseFloat(r.style.top,10)||0)),i||0},setWrapperTranslate:function(e,t,i){var r=this.wrapper.style;e=e||0,t=t||0,i=i||0,this.params.useCSS3Transforms?this.support.transforms3d?r.webkitTransform=r.MsTransform=r.msTransform=r.MozTransform=r.OTransform=r.transform="translate3d("+e+"px, "+t+"px, "+i+"px)":(r.webkitTransform=r.MsTransform=r.msTransform=r.MozTransform=r.OTransform=r.transform="translate("+e+"px, "+t+"px)",this.support.transforms||(r.left=e+"px",r.top=t+"px")):(r.left=e+"px",r.top=t+"px"),this.callPlugins("onSetWrapperTransform",{x:e,y:t,z:i})},setWrapperTransition:function(e){var t=this.wrapper.style;t.webkitTransitionDuration=t.MsTransitionDuration=t.msTransitionDuration=t.MozTransitionDuration=t.OTransitionDuration=t.transitionDuration=e/1e3+"s",this.callPlugins("onSetWrapperTransition",{duration:e})},h:{getWidth:function(e,t){var i=window.getComputedStyle(e,null).getPropertyValue("width"),r=parseFloat(i);return(isNaN(r)||i.indexOf("%")>0)&&(r=e.offsetWidth-parseFloat(window.getComputedStyle(e,null).getPropertyValue("padding-left"))-parseFloat(window.getComputedStyle(e,null).getPropertyValue("padding-right"))),t&&(r+=parseFloat(window.getComputedStyle(e,null).getPropertyValue("padding-left"))+parseFloat(window.getComputedStyle(e,null).getPropertyValue("padding-right"))),r},getHeight:function(e,t){if(t)return e.offsetHeight;var i=window.getComputedStyle(e,null).getPropertyValue("height"),r=parseFloat(i);return(isNaN(r)||i.indexOf("%")>0)&&(r=e.offsetHeight-parseFloat(window.getComputedStyle(e,null).getPropertyValue("padding-top"))-parseFloat(window.getComputedStyle(e,null).getPropertyValue("padding-bottom"))),t&&(r+=parseFloat(window.getComputedStyle(e,null).getPropertyValue("padding-top"))+parseFloat(window.getComputedStyle(e,null).getPropertyValue("padding-bottom"))),r},getOffset:function(e){var t=e.getBoundingClientRect(),i=document.body,r=e.clientTop||i.clientTop||0,n=e.clientLeft||i.clientLeft||0,o=window.pageYOffset||e.scrollTop,s=window.pageXOffset||e.scrollLeft;return document.documentElement&&!window.pageYOffset&&(o=document.documentElement.scrollTop,s=document.documentElement.scrollLeft),{top:t.top+o-r,left:t.left+s-n}},windowWidth:function(){return window.innerWidth?window.innerWidth:document.documentElement&&document.documentElement.clientWidth?document.documentElement.clientWidth:void 0},windowHeight:function(){return window.innerHeight?window.innerHeight:document.documentElement&&document.documentElement.clientHeight?document.documentElement.clientHeight:void 0},windowScroll:function(){return"undefined"!=typeof pageYOffset?{left:window.pageXOffset,top:window.pageYOffset}:document.documentElement?{left:document.documentElement.scrollLeft,top:document.documentElement.scrollTop}:void 0},addEventListener:function(e,t,i,r){e.addEventListener?e.addEventListener(t,i,r):e.attachEvent&&e.attachEvent("on"+t,i)},removeEventListener:function(e,t,i,r){e.removeEventListener?e.removeEventListener(t,i,r):e.detachEvent&&e.detachEvent("on"+t,i)}},setTransform:function(e,t){var i=e.style;i.webkitTransform=i.MsTransform=i.msTransform=i.MozTransform=i.OTransform=i.transform=t},setTranslate:function(e,t){var i=e.style,r={x:t.x||0,y:t.y||0,z:t.z||0},n=this.support.transforms3d?"translate3d("+r.x+"px,"+r.y+"px,"+r.z+"px)":"translate("+r.x+"px,"+r.y+"px)";i.webkitTransform=i.MsTransform=i.msTransform=i.MozTransform=i.OTransform=i.transform=n,this.support.transforms||(i.left=r.x+"px",i.top=r.y+"px")},setTransition:function(e,t){var i=e.style;i.webkitTransitionDuration=i.MsTransitionDuration=i.msTransitionDuration=i.MozTransitionDuration=i.OTransitionDuration=i.transitionDuration=t+"ms"},support:{touch:window.Modernizr&&Modernizr.touch===!0||function(){return!!("ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch)}(),transforms3d:window.Modernizr&&Modernizr.csstransforms3d===!0||function(){var e=document.createElement("div");return"webkitPerspective"in e.style||"MozPerspective"in e.style||"OPerspective"in e.style||"MsPerspective"in e.style||"perspective"in e.style}(),transforms:window.Modernizr&&Modernizr.csstransforms===!0||function(){var e=document.createElement("div").style;return"transform"in e||"WebkitTransform"in e||"MozTransform"in e||"msTransform"in e||"MsTransform"in e||"OTransform"in e}(),transitions:window.Modernizr&&Modernizr.csstransitions===!0||function(){var e=document.createElement("div").style;return"transition"in e||"WebkitTransition"in e||"MozTransition"in e||"msTransition"in e||"MsTransition"in e||"OTransition"in e}()},browser:{ie8:function(){var e=-1;if("Microsoft Internet Explorer"==navigator.appName){var t=navigator.userAgent,i=RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");null!=i.exec(t)&&(e=parseFloat(RegExp.$1))}return-1!=e&&9>e}(),ie10:window.navigator.msPointerEnabled}},(window.jQuery||window.Zepto)&&function(e){e.fn.swiper=function(t){var i=new Swiper(e(this)[0],t);return e(this).data("swiper",i),i}}(window.jQuery||window.Zepto);