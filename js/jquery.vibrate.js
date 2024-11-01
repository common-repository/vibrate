/**
* @file
* Vibration API
*  Copyright (C) 2014  Ilias Ismanalijev
*  
*  This program is free software: you can redistribute it and/or modify
*  it under the terms of the GNU Affero General Public License as
*  published by the Free Software Foundation, either version 3 of the
*  License, or (at your option) any later version.
*  
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU Affero General Public License for more details.
*  
*  You should have received a copy of the GNU Affero General Public License
*  along with this program.  If not, see http://www.gnu.org/licenses/
*/

(function(){"use strict";var t;t=jQuery,t.fn.vibrate=function(a){var i,e;if(e=function(){},null!=a)if(null!=a.debug&&a.debug===!0&&(e=function(t){return console.log("Vibration : "+t)}),"string"==typeof a)switch(a){case"short":a={duration:20},e("Duration = 20");break;case"medium":case"default":a={duration:50},e("Duration = 50");break;case"long":a={duration:100},e("Duration = 100")}else"number"==typeof a&&(isNaN(a)||(a={duration:a}),e("Duration = "+a));else a={};return i="vibrate"in navigator||"mozVibrate"in navigator,e("Can Vibrate = "+i),i===!0?t(this).each(function(){var i,r;return i=t(this),i.defaults={trigger:"click",duration:50,vibrateClass:"vibrate",debug:!1},"object"==typeof a&&(i.defaults=t.extend(i.defaults,a)),r=null,"mousedown"===i.defaults.trigger&&(r="mouseup",e("StopEvent = mouseup")),"touchstart"===i.defaults.trigger&&(r="touchend",e("StopEvent = touchend")),i.hasClass("vibrate")||i.addClass(i.defaults.vibrateClass),e("Class = "+i.defaults.vibrateClass),i.bind(i.defaults.trigger,function(){return e("Vibrate "+i.defaults.duration+"ms"),"vibrate"in navigator?navigator.vibrate(i.defaults.pattern||i.defaults.duration):"mozVibrate"in navigator?navigator.mozVibrate(i.defaults.pattern||i.defaults.duration):void 0}),null!=r?i.bind(r,function(){return e("Vibrate Stop"),"vibrate"in navigator?navigator.vibrate(0):"mozVibrate"in navigator?navigator.mozVibrate(0):void 0}):void 0}):void 0}}).call(this);
