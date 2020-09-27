!function(t){function e(n){if(r[n])return r[n].exports;var o=r[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,e),o.l=!0,o.exports}var r={};e.m=t,e.c=r,e.i=function(t){return t},e.d=function(t,r,n){e.o(t,r)||Object.defineProperty(t,r,{configurable:!1,enumerable:!0,get:n})},e.n=function(t){var r=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(r,"a",r),r},e.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},e.p="",e(e.s=4)}([function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=function(){function t(e,r){this.options={},this.options=t.merge(e,r)}return t.merge=function(t,e){var r={};for(var n in t)r[n]=t[n];for(var n in e)r[n]=e[n];return r},t.flatten=function(e){var r=t.merge(e,{});return r.properties={},t.merge(r,e.properties)},t.isEqual=function(t,e){for(var r in t)if(t[r]!==e[r])return!1;for(var r in e)if(e[r]!==t[r])return!1;return!0},t}();e.Integration=n},function(t,e,r){"use strict";function n(){return"https://v.shopify.com/"}function o(t){var e=[];for(var r in t)("number"==typeof t[r]||t[r])&&("object"==typeof t[r]&&0===Object.keys(t[r]).length||e.push(encodeURIComponent(r)+"="+encodeURIComponent(t[r])));return e.join("&")}function i(t){var e=new Image(1,1);return e.src=t,e.style.display="none",e}function a(t,e,r){return i(n()+t+"/"+e+"?"+o(r))}function s(t,e){return a("internal_errors","page",{name:t.name,line:t.lineNumber||t.line,script:t.fileName||t.sourceURL||t.script,stack:t.stackTrace||t.stack||t.description,message:t.message,url:window.location,context:void 0!==e?e:null})}Object.defineProperty(e,"__esModule",{value:!0}),e.base=n,e.queryString=o,e.img=i,e.load=a,e.internalError=s},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=r(8);e.exportVar="analytics",e.trekkieClass=n.Trekkie,e.enabledIntegrations=[];var o=r(6);e.enabledIntegrations.push(["LastShop",o.LastShop]);var i=r(7);e.enabledIntegrations.push(["Performance",i.Performance]);var a=r(5);e.enabledIntegrations.push(["Clickstream",a.Clickstream])},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=r(0),o=r(2),i=r(1),a=function(){function t(t,e){this.integrations=[];var r=1+o.enabledIntegrations.length,n=this.waitFor(r,function(){try{e()}catch(t){i.internalError(t)}});this.trekkie=new o.trekkieClass(t.Trekkie,n),this.integrations.push(this.trekkie);for(var a=0,s=o.enabledIntegrations;a<s.length;a++){var u=s[a],c=t[u[0]],p=u[1];if(c&&"object"==typeof c)try{this.integrations.push(new p(c,this.trekkie,n))}catch(t){n(),i.internalError(t)}else n()}}return t.prototype.identify=function(t,e){void 0===t&&(t=""),void 0===e&&(e={});try{t instanceof Object&&(e=t,t="");for(var r=0,n=this.integrations;r<n.length;r++){n[r].identify({id:t,properties:e})}}catch(t){i.internalError(t)}},t.prototype.page=function(t,e){void 0===t&&(t=""),void 0===e&&(e={});try{t instanceof Object&&(e=t,t="");var r=this.pageDefaults();r.name=t,r.properties=n.Integration.merge(r.properties,e);for(var o=0,a=this.integrations;o<a.length;o++){a[o].page(r)}}catch(t){i.internalError(t)}},t.prototype.track=function(t,e){void 0===t&&(t=""),void 0===e&&(e={});try{t instanceof Object&&(e=t,t="");for(var r=0,n=this.integrations;r<n.length;r++){n[r].track({event:t,properties:e})}}catch(t){i.internalError(t)}},t.prototype.trackForm=function(t,e,r){var n=this;void 0===e&&(e=""),void 0===r&&(r={});try{t.addEventListener("submit",function(o){o.preventDefault(),n.track(e,r),setTimeout(function(){try{t.submit()}catch(t){i.internalError(t)}},0)})}catch(t){i.internalError(t)}},t.prototype.trackLink=function(t,e,r){var n=this;void 0===e&&(e=""),void 0===r&&(r={});try{t.addEventListener("click",function(o){var i=t.getAttribute("href")||t.getAttributeNS("http://www.w3.org/1999/xlink","href")||t.getAttribute("xlink:href");n.track(e,r),i&&"_blank"!==t.target&&!n.isMeta(o)&&(o.preventDefault(),setTimeout(function(){n.setLocation(i)},0))})}catch(t){i.internalError(t)}},t.prototype.isMeta=function(t){if(t instanceof KeyboardEvent&&(t.metaKey||t.altKey||t.ctrlKey||t.shiftKey))return!0;if(t instanceof MouseEvent){var e=t.which,r=t.button;if(!e&&void 0!==r)return 1===r||2===r;if(2===e)return!0}return!1},t.prototype.setLocation=function(t){window.location.href=t},t.prototype.ready=function(t){setTimeout(t,0)},t.prototype.waitFor=function(t,e){return function(){--t>0||0===t&&setTimeout(e,0)}},t.prototype.pageDefaults=function(){var t=window.location.href,e=t.indexOf("?");return t=-1===e?"":t.slice(e),e=t.indexOf("#"),t=-1===e?t:t.slice(0,e),t="?"===t?"":t,{path:window.location.pathname,referrer:document.referrer,search:t,title:document.title,url:this.url(),properties:{}}},t.prototype.canonical=function(){for(var t=document.getElementsByTagName("link"),e=0;e<t.length;e++){var r=t[e];if("canonical"===r.getAttribute("rel"))return r.getAttribute("href")}return""},t.prototype.url=function(){var t=this.canonical();if(t)return t.indexOf("?")>0?t:t+window.location.search;var e=window.location.href,r=e.indexOf("#");return-1===r?e:e.slice(0,r)},t}();e.Tricorder=a},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=r(3),o=r(2),i=r(1);try{var a=window[o.exportVar].config;if(a)var s=window[o.exportVar],u=window.trekkie=new n.Tricorder(a,function(){window[o.exportVar]=u;for(var t=0,e=s;t<e.length;t++){var r=e[t],n=r[0];u[n]&&u[n].apply(u,r.slice(1))}window._visit={tag:function(){},multitrackToken:function(){return u.trekkie.defaultAttributes.uniqToken}},u.user=function(){return{traits:function(){return{uniqToken:u.trekkie.defaultAttributes.uniqToken}}}}})}catch(t){i.internalError(t)}},function(t,e,r){"use strict";var n=this&&this.__extends||function(){var t=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var r in e)e.hasOwnProperty(r)&&(t[r]=e[r])};return function(e,r){function n(){this.constructor=e}t(e,r),e.prototype=null===r?Object.create(r):(n.prototype=r.prototype,new n)}}();Object.defineProperty(e,"__esModule",{value:!0});var o=r(0),i=r(15),a=r(11),s=r(12),u=r(1),c=function(t){function e(e,r,n){var o=t.call(this,{},e)||this;o.requestType="clickstream",o.config={storageKey:"_trekkie_cs",eventName:"click",customEventName:"trekkie-clickstream",validTargets:["a","button","input","select"],validInputSubTypes:["submit","file","radio","checkbox","text"],appName:null,flushInterval:5},o.trekkie=r,o.config.appName=r.options.appName;var i=e.flushInterval;return void 0!==i&&"number"==typeof i&&(o.config.flushInterval=i),"iframe"===r.options.embedMode?o.clickQueue=o.createPostingQueue():o.clickQueue=o.createPersistedQueue(),o.flushClickEvents(),o.setClickListener(),o.setFlushInterval(),n(),o}return n(e,t),e.prototype.identify=function(t){},e.prototype.page=function(t){this.flushClickEvents()},e.prototype.track=function(t){var e=this;t.event===this.config.eventName&&setTimeout(function(){e.trekkie.emit(e.requestType,t)},0)},e.prototype.createPostingQueue=function(){return new s.PostingQueue(this.trekkie,this.requestType,this.config.eventName)},e.prototype.createPersistedQueue=function(){return new a.PersistedQueue(this.config.storageKey)},e.prototype.setFlushInterval=function(){var t=this;this.config.flushInterval>0&&setInterval(function(){t.flushClickEvents()},1e3*this.config.flushInterval)},e.prototype.flushClickEvents=function(){for(var t=0,e=this.clickQueue.all();t<e.length;t++){var r=e[t];this.track({event:this.config.eventName,properties:r})}this.clickQueue.clear()},e.prototype.setClickListener=function(){var t=this;document.documentElement.addEventListener("click",function(e){t.trackClick(e)},!0)},e.prototype.trackClick=function(t){var e;try{if(this.shouldTrack(t)){var r=t.target;try{e=i.cssPath(t.target)}catch(t){e="[unavailable]"}var n={app_name:this.config.appName,url:window.location.href,css_path:e,target_text:this.getTextLabelFromHTMLElement(r),target_tagname:r.tagName,target_classname:this.getClassName(r),target_id:r.id,target_trekkie_context:this.getAdditionalContext(r),target_url:r.getAttribute("href"),target_form_input_type:this.isHTMLFormInputSubType(r)?r.type:null,target_form_action:this.isHTMLFormInputSubType(r)?this.getHTMLFormAction(r):null,target_form_relative_position:this.isHTMLFormInputSubType(r)?this.getFormRelativePosition(r):null};this.clickQueue.push(n);try{var o=this.trekkie.options,a={detail:n};"iframe"===o.embedMode&&o.embedParentOrigin?this.trekkie.getEmbedParent().postMessage(JSON.stringify({event:"trekkie:customEvent:v1",payload:{eventType:this.config.customEventName,data:a}}),o.embedParentOrigin):document.dispatchEvent(new CustomEvent(this.config.customEventName,a))}catch(t){}}}catch(t){u.internalError(t,e)}},e.prototype.getClassName=function(t){return"object"==typeof t.className?t.parentElement.getAttribute("class"):t.className},e.prototype.shouldTrack=function(t){var e=t.target.tagName;if(e)switch(e=e.toLowerCase(),this.config.validTargets[this.config.validTargets.indexOf(e)]){case void 0:return this.isAnyAncestorValidClickTarget(t.target);case"input":return this.config.validInputSubTypes.indexOf(t.target.type.toLowerCase())>=0;default:return!0}},e.prototype.isAnyAncestorValidClickTarget=function(t){for(;t.parentNode;)if(t=t.parentNode,t.tagName&&-1!==this.config.validTargets.indexOf(t.tagName.toLowerCase()))return!0;return!1},e.prototype.getTextLabelFromHTMLElement=function(t){switch(t.tagName.toLowerCase()){case"input":return"text"===t.type?t.name:t.value;case"select":var e=t.options.selectedIndex;return e>-1?t.options[e].text:"No value chosen";default:return this.getTargetText(t)||this.getTextLabelFromParentHTMLElement(t)}},e.prototype.getTextLabelFromParentHTMLElement=function(t){for(;t.parentNode;)if(t=t.parentNode,t.tagName&&-1!==this.config.validTargets.indexOf(t.tagName.toLowerCase()))return this.getTargetText(t)},e.prototype.getTargetText=function(t){var e=t.innerText||t.textContent;if(e)return this.dedupTargetText(e.replace(/\s+/g," ").trim())},e.prototype.dedupTargetText=function(t){if(-1===t.indexOf(" "))return t;var e={};return t.split(" ").filter(function(t){return!e.hasOwnProperty(t)&&(e[t]=!0)}).join(" ")},e.prototype.getAdditionalContext=function(t){for(var e={};t.parentNode;){for(var r=0,n=Array.prototype.slice.call(t.attributes);r<n.length;r++){var o=n[r];o&&o.value&&o.name.match(/^data-trekkie-.*/)&&(e[o.name]=o.value)}t=t.parentNode}return Object.getOwnPropertyNames(e).length>0?JSON.stringify(e):null},e.prototype.getHTMLFormAction=function(t){for(;t.parentNode;)if((t=t.parentNode)&&t.tagName&&"form"===t.tagName.toLowerCase()){var e=t.attributes.getNamedItem("action");if(e&&e.value)return e.value}return""},e.prototype.isHTMLFormInputSubType=function(t){return-1!==["input","select"].indexOf(t.tagName.toLowerCase())},e.prototype.getFormRelativePosition=function(t){switch(t.tagName.toLowerCase()){case"select":return t.options.selectedIndex;default:return null}},e}(o.Integration);e.Clickstream=c},function(t,e,r){"use strict";var n=this&&this.__extends||function(){var t=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var r in e)e.hasOwnProperty(r)&&(t[r]=e[r])};return function(e,r){function n(){this.constructor=e}t(e,r),e.prototype=null===r?Object.create(r):(n.prototype=r.prototype,new n)}}();Object.defineProperty(e,"__esModule",{value:!0});var o=r(0),i=r(13),a=function(t){function e(e,r,n){var o=t.call(this,{},e)||this,a=encodeURIComponent(window.location.hostname);return i.script({src:"https://v.shopify.com/last_shop?shop="+a,className:"tricorder-lastshop"}),n(),o}return n(e,t),e.prototype.identify=function(t){},e.prototype.page=function(t){},e.prototype.track=function(t){},e}(o.Integration);e.LastShop=a},function(t,e,r){"use strict";var n=this&&this.__extends||function(){var t=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var r in e)e.hasOwnProperty(r)&&(t[r]=e[r])};return function(e,r){function n(){this.constructor=e}t(e,r),e.prototype=null===r?Object.create(r):(n.prototype=r.prototype,new n)}}();Object.defineProperty(e,"__esModule",{value:!0});var o=r(0),i=function(t){function e(r,n,o){var i=t.call(this,e.defaultOptions,r)||this;return i.trekkie=n,o(),i}return n(e,t),e.prototype.identify=function(t){},e.prototype.page=function(t){var e={event:"navigation_performance_metrics",properties:o.Integration.flatten(t)},r=this.options;r.navigationTimingApiMeasurementsEnabled&&r.navigationTimingApiMeasurementsSampleRate>=Math.random()&&(e.properties=o.Integration.merge(this.pagePerformance(),e.properties),this.trekkie.track(e))},e.prototype.track=function(t){},e.prototype.pagePerformance=function(){return(new a).collect()},e}(o.Integration);i.defaultOptions={navigationTimingApiMeasurementsEnabled:!0,navigationTimingApiMeasurementsSampleRate:.001},e.Performance=i;var a=function(){function t(){}return t.prototype.timing=function(){return!(!window.performance||!window.performance.timing)&&window.performance.timing},t.prototype.userAgent=function(){return window.navigator.userAgent},t.prototype.collect=function(){var e=this,r={},n=function(){for(var e=0,n=t.perfAttrs;e<n.length;e++){var o=n[e];r["nt:"+o]=0}r["nt:valid"]=!1};if(this.timing()&&!function(){return new RegExp("MSIE 9.0|Firefox/7.0|Firefox/8.0").test(e.userAgent())}())try{for(var o=0,i=t.perfAttrs;o<i.length;o++){var a=i[o];r["nt:"+a]=this.timing()[a]}r["nt:valid"]=!0}catch(t){n()}else n();return r},t}();a.perfAttrs=["connectEnd","connectStart","domComplete","domContentLoadedEventEnd","domContentLoadedEventStart","domInteractive","domLoading","domainLookupEnd","domainLookupStart","fetchStart","loadEventEnd","loadEventStart","navigationStart","redirectEnd","redirectStart","requestStart","responseEnd","responseStart","secureConnectionStart","unloadEventEnd","unloadEventStart"],e.PagePerformance=a},function(t,e,r){"use strict";var n=this&&this.__extends||function(){var t=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(t,e){t.__proto__=e}||function(t,e){for(var r in e)e.hasOwnProperty(r)&&(t[r]=e[r])};return function(e,r){function n(){this.constructor=e}t(e,r),e.prototype=null===r?Object.create(r):(n.prototype=r.prototype,new n)}}();Object.defineProperty(e,"__esModule",{value:!0});var o=r(0),i=r(1),a=r(14),s=function(t){function e(e,r){var n=t.call(this,{},e)||this,i="",s="",u="";return"iframe"!==e.embedMode&&(i=a.longTerm(),s=a.shortTerm(),u=a.firstSeen()),n.defaultAttributes={appName:e.appName,uniqToken:i,visitToken:s,microSessionId:a.buildToken(),microSessionCount:0,firstSeen:u},e.defaultAttributes&&(n.defaultAttributes=o.Integration.merge(e.defaultAttributes,n.defaultAttributes)),"parent"===e.embedMode&&n.installFrameListener(),r(),n}return n(e,t),e.prototype.identify=function(t){this.emit("identify",t)},e.prototype.page=function(t){e.isEqualPage(this.lastPage,t)||(this.lastPage=t,this.emit("page",t))},e.prototype.track=function(t){this.emit("track",t)},e.prototype.emit=function(t,e,r){void 0===r&&(r={});var n=this.options;r.microSessionCount||++this.defaultAttributes.microSessionCount,e=o.Integration.flatten(e);var a=o.Integration.merge(e,this.defaultAttributes);a.eventType=t,a=o.Integration.merge(a,r);var s=n.development?"testing":a.appName;if("iframe"===n.embedMode&&n.embedParentOrigin)try{this.getEmbedParent().postMessage(JSON.stringify({event:"trekkie:emit:v1",payload:{requestType:t,args:a,overrideAttributes:{microSessionId:a.microSessionId,microSessionCount:a.microSessionCount}}}),n.embedParentOrigin)}catch(t){i.internalError(t)}else i.load(s,t,a)},e.prototype.installFrameListener=function(){var t=this;window.addEventListener("message",function(e){t.handleEmbedEvent(e)})},e.prototype.handleEmbedEvent=function(t){try{if(t&&t.origin.match(/(shopify.com|shopifyapps.com|myshopify.io)$/)&&t.data){var e=JSON.parse(t.data);if(e.event&&e.event.match(/^trekkie:/))switch(e.event){case"trekkie:emit:v1":var r=e.payload;r&&r.requestType&&r.args&&this.emit(r.requestType,r.args,r.overrideAttributes);break;case"trekkie:customEvent:v1":var r=e.payload;r&&r.eventType&&document.dispatchEvent(new CustomEvent(r.eventType,r.data));break;case"trekkie:xtldToken:v1":case"trekkie:xtldLastShop:v1":break;default:!function(t,e){i.internalError(new Error,JSON.stringify(e))}(e.event,e)}}}catch(e){"SyntaxError"!==e.name&&i.internalError(e,JSON.stringify(t))}},e.prototype.getEmbedParent=function(){return window.top||window.parent},e.isEqualPage=function(t,e){return t&&e&&t.path===e.path&&t.referrer===e.referrer&&t.search===e.search&&t.title===e.title&&t.url===e.url&&t.name===e.name&&o.Integration.isEqual(t.properties,e.properties)},e}(o.Integration);e.Trekkie=s},function(t,e,r){"use strict";function n(t){return e.cookie.read(t)}function o(t,e,r){void 0===r&&(r={}),a(t,e,r.permanent,i(window.location.hostname)),a(t,e,r.permanent,f),a(t,e,r.permanent,r.domain),a(t,e,r.permanent,"")}function i(t){var e=t.indexOf(c);return 0===e?"."+t:e>0?t.slice(e-1):p}function a(t,r,n,o){var i={maxage:n?u:s,domain:o,path:"/"};e.cookie.write(t,r,i)}Object.defineProperty(e,"__esModule",{value:!0});var s=18e5,u=62208e6,c="shopify",p=".shopify.com",f=".myshopify.com";e.cookie={parse:function(t){for(var e={},r=0,n=t.split(/ *; */);r<n.length;r++){var o=n[r],i=o.split("=");try{e[decodeURIComponent(i[0])]=decodeURIComponent(i[1])}catch(t){}}return e},read:function(t){if(e.cookie.enabled())return e.cookie.parse(document.cookie)[t]},write:function(t,r,n){if(void 0===n&&(n={}),e.cookie.enabled()){var o=encodeURIComponent(t)+"="+encodeURIComponent(r);return n.maxage&&(n.expires=new Date(Date.now()+n.maxage)),n.path&&(o+="; path="+n.path),n.domain&&(o+="; domain="+n.domain),n.expires&&(o+="; expires="+n.expires.toUTCString()),n.secure&&(o+="; secure"),document.cookie=o,o}},clear:function(t,r){return void 0===r&&(r={}),r.maxage=-1,e.cookie.write(t,"",r)},enabled:function(){try{return void 0!==document.cookie&&window.navigator.cookieEnabled}catch(t){return!1}}},e.read=n,e.write=o,e.shopifyCookieDomain=i},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=function(){function t(t){this.storageName=t,this.storage=localStorage,this.storageEnabled=this.checkLocalStorageAvailability()}return t.prototype.get=function(){return this.storageEnabled?this.storage.getItem(this.storageName):null},t.prototype.set=function(t){this.storageEnabled&&this.storage.setItem(this.storageName,t)},t.prototype.checkLocalStorageAvailability=function(){try{return this.storage.setItem("test","ok"),this.storage.removeItem("test"),!0}catch(t){return(22===t.code||1014===t.code)&&(this.storage.clear(),!0)}},t}();e.LocalStorage=n},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=r(10),o=function(){function t(t){this.queue=[],this.storage=new n.LocalStorage(t);var e=this.storage.get();null!==e&&(this.queue=JSON.parse(e))}return t.prototype.push=function(t){this.queue.push(t),this.persist()},t.prototype.all=function(){return this.queue},t.prototype.clear=function(){this.queue=[],this.persist()},t.prototype.persist=function(){this.storage.set(JSON.stringify(this.queue))},t}();e.PersistedQueue=o},function(t,e,r){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=function(){function t(t,e,r){this.trekkie=t,this.requestType=e,this.eventName=r}return t.prototype.push=function(t){this.trekkie.emit(this.requestType,{event:this.eventName,properties:t})},t.prototype.all=function(){return[]},t.prototype.clear=function(){},t}();e.PostingQueue=n},function(t,e,r){"use strict";function n(t){var e=document.createElement("script");return e.src=t.src,e.async=!0,t.onLoad&&i(e,t.onLoad),t.className&&(e.className=t.className),document.body.appendChild(e),e}function o(t){var e=document.createElement("iframe");return e.src=t.src,e.style.display="none",t.onLoad&&i(e,t.onLoad),t.className&&(e.className=t.className),document.body.appendChild(e),e}function i(t,e){return t.addEventListener("load",e,!1),t}Object.defineProperty(e,"__esModule",{value:!0}),e.script=n,e.iframe=o},function(t,e,r){"use strict";function n(){return!!p.read(e.shortTermKey)||!!p.read(e.deprecatedShortTermKey)}function o(){return!!p.read(e.longTermKey)||!!p.read(e.deprecatedLongTermKey)}function i(){return d.fetchOrSet(!1,e.deprecatedShortTermKey,e.shortTermKey)}function a(){return d.fetchOrSet(!0,e.deprecatedLongTermKey,e.longTermKey)}function s(){return d.build()}function u(){return h.fetchOrSet(e.firstSeenKey)}function c(){return d.hexTime()}Object.defineProperty(e,"__esModule",{value:!0});var p=r(9);e.deprecatedShortTermKey="_s",e.shortTermKey="_shopify_s",e.deprecatedLongTermKey="_y",e.longTermKey="_shopify_y",e.firstSeenKey="_shopify_fs";var f="00000000",l="xxxx-4xxx-xxxx-xxxxxxxxxxxx",d={fetch:function(t){return p.read(t)},fetchOrSet:function(t,e,r){if(!p.cookie.enabled())return"00000000-0000-0000-4000-000000000000";var n=d.fetch(r)||d.fetch(e)||d.build(),o={permanent:t};return p.write(e,n,o),p.write(r,n,o),n},build:function(){var t="";try{var e=window.crypto||window.msCrypto,r=new Uint16Array(31);e.getRandomValues(r);var n=0;t=l.replace(/[x]/g,function(t){for(var e=[],o=1;o<arguments.length;o++)e[o-1]=arguments[o];var i=r[n]%16,a="x"===t?i:3&i|8;return n++,a.toString(16)}).toUpperCase()}catch(e){t=l.replace(/[x]/g,function(t){for(var e=[],r=1;r<arguments.length;r++)e[r-1]=arguments[r];var n=16*Math.random()|0;return("x"===t?n:3&n|8).toString(16)}).toUpperCase()}return d.hexTime()+"-"+t},hexTime:function(){var t=0,e=0;try{t=Date.now()>>>0}catch(e){t=(new Date).getTime()>>>0}try{e=performance.now()>>>0}catch(t){e=0}var r=Math.abs(t+e).toString(16).toLowerCase();return f.substr(0,8-r.length)+r}},h={fetch:function(t){return p.read(t)},fetchOrSet:function(t){var r=h.fetch(t)||(new Date).toJSON(),n={permanent:!0};return p.write(e.firstSeenKey,r,n),r}};e.hasShortTerm=n,e.hasLongTerm=o,e.shortTerm=i,e.longTerm=a,e.buildToken=s,e.firstSeen=u,e.hexTime=c},function(t,e){DOMPresentationUtils={},DOMPresentationUtils.DOMNodePathStep=function(t,e){this.value=t,this.optimized=e||!1},DOMPresentationUtils.DOMNodePathStep.prototype={toString:function(){return this.value}},DOMPresentationUtils.cssPath=function(t,e){if(t.nodeType!==Node.ELEMENT_NODE)return"";for(var r=[],n=t;n;){var o=DOMPresentationUtils._cssPathStep(n,!!e,n===t);if(!o)break;if(r.push(o),o.optimized)break;n=n.parentNode}return r.reverse(),r.join(" > ")},DOMPresentationUtils._cssPathStep=function(t,e,r){function n(t){var e=t.getAttribute("class");return e?e.split(/\s+/g).filter(Boolean).map(function(t){return"$"+t}):[]}function o(t){return"#"+i(t)}function i(t){if(c(t))return t;var e=/^(?:[0-9]|-[0-9-]?)/.test(t),r=t.length-1;return t.replace(/./g,function(t,n){return e&&0===n||!u(t)?a(t,n===r):t})}function a(t,e){return"\\"+s(t)+(e?"":" ")}function s(t){var e=t.charCodeAt(0).toString(16);return 1===e.length&&(e="0"+e),e}function u(t){return!!/[a-zA-Z0-9_-]/.test(t)||t.charCodeAt(0)>=160}function c(t){return/^-?[a-zA-Z_][a-zA-Z0-9_-]*$/.test(t)}function p(t){for(var e={},r=0;r<t.length;++r)e[t[r]]=!0;return e}if(t.nodeType!==Node.ELEMENT_NODE)return null;var f=t.getAttribute("id");if(e){if(f)return new DOMPresentationUtils.DOMNodePathStep(o(f),!0);var l=t.nodeName().toLowerCase();if("body"===l||"head"===l||"html"===l)return new DOMPresentationUtils.DOMNodePathStep(t.nodeName.toLowerCase(),!0)}var d=t.nodeName.toLowerCase();if(f)return new DOMPresentationUtils.DOMNodePathStep(d+o(f),!0);var h=t.parentNode;if(!h||h.nodeType===Node.DOCUMENT_NODE)return new DOMPresentationUtils.DOMNodePathStep(d,!0);for(var m=n(t),v=!1,g=!1,y=-1,k=-1,b=h.children,w=0;(-1===y||!g)&&w<b.length;++w){var _=b[w];if(_.nodeType===Node.ELEMENT_NODE)if(k+=1,_!==t){if(!g&&_.nodeName.toLowerCase()===d){v=!0;var T=p(m),O=0;for(var x in T)++O;if(0!==O)for(var E=n(_),N=0;N<E.length;++N){var P=E[N];if(T.hasOwnProperty(P)&&(delete T[P],!--O)){g=!0;break}}else g=!0}}else y=k}var S=d;if(r&&"input"===d.toLowerCase()&&t.getAttribute("type")&&!t.getAttribute("id")&&!t.getAttribute("class")&&(S+='[type="'+t.getAttribute("type")+'"]'),g)S+=":nth-child("+(y+1)+")";else if(v)for(var M in p(m))S+="."+i(M.substr(1));return new DOMPresentationUtils.DOMNodePathStep(S,!1)},t.exports=DOMPresentationUtils}]);