!function(t){var e={};function i(n){if(e[n])return e[n].exports;var s=e[n]={i:n,l:!1,exports:{}};return t[n].call(s.exports,s,s.exports,i),s.l=!0,s.exports}i.m=t,i.c=e,i.d=function(t,e,n){i.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:n})},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="",i(i.s=39)}({39:function(t,e,i){t.exports=i(40)},40:function(t,e){var i,n;i=jQuery,n=function(t,e,n){this.setting={axis:"y",reverse:!1,trigger:"click",speed:500,forceHeight:!1,forceWidth:!1,autoSize:!0,front:".front",back:".back"},this.setting=i.extend(this.setting,e),"string"!=typeof e.axis||"x"!==e.axis.toLowerCase()&&"y"!==e.axis.toLowerCase()||(this.setting.axis=e.axis.toLowerCase()),"boolean"==typeof e.reverse&&(this.setting.reverse=e.reverse),"string"==typeof e.trigger&&(this.setting.trigger=e.trigger.toLowerCase());var s=parseInt(e.speed);isNaN(s)||(this.setting.speed=s),"boolean"==typeof e.forceHeight&&(this.setting.forceHeight=e.forceHeight),"boolean"==typeof e.forceWidth&&(this.setting.forceWidth=e.forceWidth),"boolean"==typeof e.autoSize&&(this.setting.autoSize=e.autoSize),("string"==typeof e.front||e.front instanceof i)&&(this.setting.front=e.front),("string"==typeof e.back||e.back instanceof i)&&(this.setting.back=e.back),this.element=t,this.frontElement=this.getFrontElement(),this.backElement=this.getBackElement(),this.isFlipped=!1,this.init(n)},i.extend(n.prototype,{flipDone:function(t){var e=this;e.element.one(function(){var t,e=document.createElement("fakeelement"),i={transition:"transitionend",OTransition:"oTransitionEnd",MozTransition:"transitionend",WebkitTransition:"webkitTransitionEnd"};for(t in i)if(void 0!==e.style[t])return i[t]}(),function(){e.element.trigger("flip:done"),"function"==typeof t&&t.call(e.element)})},flip:function(t){if(!this.isFlipped){this.isFlipped=!0;var e="rotate"+this.setting.axis;this.frontElement.css({transform:e+(this.setting.reverse?"(-180deg)":"(180deg)"),"z-index":"0"}),this.backElement.css({transform:e+"(0deg)","z-index":"1"}),this.flipDone(t)}},unflip:function(t){if(this.isFlipped){this.isFlipped=!1;var e="rotate"+this.setting.axis;this.frontElement.css({transform:e+"(0deg)","z-index":"1"}),this.backElement.css({transform:e+(this.setting.reverse?"(180deg)":"(-180deg)"),"z-index":"0"}),this.flipDone(t)}},getFrontElement:function(){return this.setting.front instanceof i?this.setting.front:this.element.find(this.setting.front)},getBackElement:function(){return this.setting.back instanceof i?this.setting.back:this.element.find(this.setting.back)},init:function(t){var e=this,i=e.frontElement.add(e.backElement),n="rotate"+e.setting.axis,s={perspective:2*e.element["outer"+("rotatex"===n?"Height":"Width")](),position:"relative"},o={transform:n+"("+(e.setting.reverse?"180deg":"-180deg")+")","z-index":"0",position:"relative"},r={"backface-visibility":"hidden","transform-style":"preserve-3d",position:"absolute","z-index":"1"};e.setting.forceHeight?i.outerHeight(e.element.height()):e.setting.autoSize&&(r.height="100%"),e.setting.forceWidth?i.outerWidth(e.element.width()):e.setting.autoSize&&(r.width="100%"),(window.chrome||window.Intl&&Intl.v8BreakIterator)&&"CSS"in window&&(s["-webkit-transform-style"]="preserve-3d"),i.css(r).find("*").css({"backface-visibility":"hidden"}),e.element.css(s),e.backElement.css(o),setTimeout(function(){var n=e.setting.speed/1e3||.5;i.css({transition:"all "+n+"s ease-out"}),"function"==typeof t&&t.call(e.element)},20),e.attachEvents()},clickHandler:function(t){t||(t=window.event),this.element.find(i(t.target).closest('button, a, input[type="submit"]')).length||(this.isFlipped?this.unflip():this.flip())},hoverHandler:function(){var t=this;t.element.off("mouseleave.flip"),t.flip(),setTimeout(function(){t.element.on("mouseleave.flip",i.proxy(t.unflip,t)),t.element.is(":hover")||t.unflip()},t.setting.speed+150)},attachEvents:function(){"click"===this.setting.trigger?this.element.on(i.fn.tap?"tap.flip":"click.flip",i.proxy(this.clickHandler,this)):"hover"===this.setting.trigger&&(this.element.on("mouseenter.flip",i.proxy(this.hoverHandler,this)),this.element.on("mouseleave.flip",i.proxy(this.unflip,this)))},flipChanged:function(t){this.element.trigger("flip:change"),"function"==typeof t&&t.call(this.element)},changeSettings:function(t,e){var i=this,n=!1;if(void 0!==t.axis&&i.setting.axis!==t.axis.toLowerCase()&&(i.setting.axis=t.axis.toLowerCase(),n=!0),void 0!==t.reverse&&i.setting.reverse!==t.reverse&&(i.setting.reverse=t.reverse,n=!0),n){var s=i.frontElement.add(i.backElement),o=s.css(["transition-property","transition-timing-function","transition-duration","transition-delay"]);s.css({transition:"none"});var r="rotate"+i.setting.axis;i.isFlipped?i.frontElement.css({transform:r+(i.setting.reverse?"(-180deg)":"(180deg)"),"z-index":"0"}):i.backElement.css({transform:r+(i.setting.reverse?"(180deg)":"(-180deg)"),"z-index":"0"}),setTimeout(function(){s.css(o),i.flipChanged(e)},0)}else i.flipChanged(e)}}),i.fn.flip=function(t,e){return"function"==typeof t&&(e=t),"string"==typeof t||"boolean"==typeof t?this.each(function(){var n=i(this).data("flip-model");"toggle"===t&&(t=!n.isFlipped),t?n.flip(e):n.unflip(e)}):this.each(function(){if(i(this).data("flip-model")){var s=i(this).data("flip-model");!t||void 0===t.axis&&void 0===t.reverse||s.changeSettings(t,e)}else i(this).data("flip-model",new n(i(this),t||{},e))}),this}}});