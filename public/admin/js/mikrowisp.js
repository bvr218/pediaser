/**
 * This plug-in for DataTables represents the ultimate option in extensibility
 * for sorting date / time strings correctly. It uses
 * [Moment.js](http://momentjs.com) to create automatic type detection and
 * sorting plug-ins for DataTables based on a given format. This way, DataTables
 * will automatically detect your temporal information and sort it correctly.
 *
 * For usage instructions, please see the DataTables blog
 * post that [introduces it](//datatables.net/blog/2014-12-18).
 *
 * @name Ultimate Date / Time sorting
 * @summary Sort date and time in any format using Moment.js
 * @author [Allan Jardine](//datatables.net)
 * @depends DataTables 1.10+, Moment.js 1.7+
 *
 * @example
 *    $.fn.dataTable.moment( 'HH:mm MMM D, YY' );
 *    $.fn.dataTable.moment( 'dddd, MMMM Do, YYYY' );
 *
 *    $('#example').DataTable();
 */
var timeoutlogin;
(function (factory) {
	if (typeof define === "function" && define.amd) {
		define(["jquery", "moment", "datatables.net"], factory);
	} else {
		factory(jQuery, moment);
	}
}(function ($, moment) {

$.fn.dataTable.moment = function ( format, locale ) {
	var types = $.fn.dataTable.ext.type;

	// Add type detection
	types.detect.unshift( function ( d ) {
		if ( d ) {
			// Strip HTML tags and newline characters if possible
			if ( d.replace ) {
				d = d.replace(/(<.*?>)|(\r?\n|\r)/g, '');
			}

			// Strip out surrounding white space
			d = $.trim( d );
		}

		// Null and empty values are acceptable
		if ( d === '' || d === null ) {
			return 'moment-'+format;
		}

		return moment( d, format, locale, true ).isValid() ?
			'moment-'+format :
			null;
	} );

	// Add sorting method - use an integer for the sorting
	types.order[ 'moment-'+format+'-pre' ] = function ( d ) {
		if ( d ) {
			// Strip HTML tags and newline characters if possible
			if ( d.replace ) {
				d = d.replace(/(<.*?>)|(\r?\n|\r)/g, '');
			}

			// Strip out surrounding white space
			d = $.trim( d );
		}
		
		return !moment(d, format, locale, true).isValid() ?
			Infinity :
			parseInt( moment( d, format, locale, true ).format( 'x' ), 10 );
	};
};

}));

jQuery.extend( jQuery.fn.dataTableExt.oSort, {
"date-uk-pre": function ( a ) {
    var ukDatea = a.split('/');
    return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
},

"date-uk-asc": function ( a, b ) {
    return ((a < b) ? -1 : ((a > b) ? 1 : 0));
},

"date-uk-desc": function ( a, b ) {
    return ((a < b) ? 1 : ((a > b) ? -1 : 0));
}
} );

$.fn.dataTable.moment('DD/MM/YYYY h:mm a');
$.fn.dataTable.moment('DD/MM/YYYY h:mm:ss a');
$.fn.dataTable.moment = function ( format, locale ) {
    var types = $.fn.dataTable.ext.type;
 
    // Add type detection
    types.detect.unshift( function ( d ) {
        return moment( d, format, locale, true ).isValid() ?
            'moment-'+format :
            null;
    } );
 
    // Add sorting method - use an integer for the sorting
    types.order[ 'moment-'+format+'-pre' ] = function ( d ) {
        return moment( d, format, locale, true ).unix();
    };
};

/*!
 * jQuery Form Plugin
 * version: 3.51.0-2014.06.20
 * Requires jQuery v1.5 or later
 * Copyright (c) 2014 M. Alsup
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses.
 * https://github.com/malsup/form#copyright-and-license
 */
!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e("undefined"!=typeof jQuery?jQuery:window.Zepto)}(function(e){"use strict";function t(t){var r=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(t.target).ajaxSubmit(r))}function r(t){var r=t.target,a=e(r);if(!a.is("[type=submit],[type=image]")){var n=a.closest("[type=submit]");if(0===n.length)return;r=n[0]}var i=this;if(i.clk=r,"image"==r.type)if(void 0!==t.offsetX)i.clk_x=t.offsetX,i.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var o=a.offset();i.clk_x=t.pageX-o.left,i.clk_y=t.pageY-o.top}else i.clk_x=t.pageX-r.offsetLeft,i.clk_y=t.pageY-r.offsetTop;setTimeout(function(){i.clk=i.clk_x=i.clk_y=null},100)}function a(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}var n={};n.fileapi=void 0!==e("<input type='file'/>").get(0).files,n.formdata=void 0!==window.FormData;var i=!!e.fn.prop;e.fn.attr2=function(){if(!i)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(t){function r(r){var a,n,i=e.param(r,t.traditional).split("&"),o=i.length,s=[];for(a=0;o>a;a++)i[a]=i[a].replace(/\+/g," "),n=i[a].split("="),s.push([decodeURIComponent(n[0]),decodeURIComponent(n[1])]);return s}function o(a){for(var n=new FormData,i=0;i<a.length;i++)n.append(a[i].name,a[i].value);if(t.extraData){var o=r(t.extraData);for(i=0;i<o.length;i++)o[i]&&n.append(o[i][0],o[i][1])}t.data=null;var s=e.extend(!0,{},e.ajaxSettings,t,{contentType:!1,processData:!1,cache:!1,type:u||"POST"});t.uploadProgress&&(s.xhr=function(){var r=e.ajaxSettings.xhr();return r.upload&&r.upload.addEventListener("progress",function(e){var r=0,a=e.loaded||e.position,n=e.total;e.lengthComputable&&(r=Math.ceil(a/n*100)),t.uploadProgress(e,a,n,r)},!1),r}),s.data=null;var c=s.beforeSend;return s.beforeSend=function(e,r){r.data=t.formData?t.formData:n,c&&c.call(this,e,r)},e.ajax(s)}function s(r){function n(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(r){a("cannot get iframe.contentWindow document: "+r)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(r){a("cannot get iframe.contentDocument: "+r),t=e.document}return t}function o(){function t(){try{var e=n(g).readyState;a("state = "+e),e&&"uninitialized"==e.toLowerCase()&&setTimeout(t,50)}catch(r){a("Server abort: ",r," (",r.name,")"),s(k),j&&clearTimeout(j),j=void 0}}var r=f.attr2("target"),i=f.attr2("action"),o="multipart/form-data",c=f.attr("enctype")||f.attr("encoding")||o;w.setAttribute("target",p),(!u||/post/i.test(u))&&w.setAttribute("method","POST"),i!=m.url&&w.setAttribute("action",m.url),m.skipEncodingOverride||u&&!/post/i.test(u)||f.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),m.timeout&&(j=setTimeout(function(){T=!0,s(D)},m.timeout));var l=[];try{if(m.extraData)for(var d in m.extraData)m.extraData.hasOwnProperty(d)&&l.push(e.isPlainObject(m.extraData[d])&&m.extraData[d].hasOwnProperty("name")&&m.extraData[d].hasOwnProperty("value")?e('<input type="hidden" name="'+m.extraData[d].name+'">').val(m.extraData[d].value).appendTo(w)[0]:e('<input type="hidden" name="'+d+'">').val(m.extraData[d]).appendTo(w)[0]);m.iframeTarget||v.appendTo("body"),g.attachEvent?g.attachEvent("onload",s):g.addEventListener("load",s,!1),setTimeout(t,15);try{w.submit()}catch(h){var x=document.createElement("form").submit;x.apply(w)}}finally{w.setAttribute("action",i),w.setAttribute("enctype",c),r?w.setAttribute("target",r):f.removeAttr("target"),e(l).remove()}}function s(t){if(!x.aborted&&!F){if(M=n(g),M||(a("cannot access response document"),t=k),t===D&&x)return x.abort("timeout"),void S.reject(x,"timeout");if(t==k&&x)return x.abort("server abort"),void S.reject(x,"error","server abort");if(M&&M.location.href!=m.iframeSrc||T){g.detachEvent?g.detachEvent("onload",s):g.removeEventListener("load",s,!1);var r,i="success";try{if(T)throw"timeout";var o="xml"==m.dataType||M.XMLDocument||e.isXMLDoc(M);if(a("isXml="+o),!o&&window.opera&&(null===M.body||!M.body.innerHTML)&&--O)return a("requeing onLoad callback, DOM not available"),void setTimeout(s,250);var u=M.body?M.body:M.documentElement;x.responseText=u?u.innerHTML:null,x.responseXML=M.XMLDocument?M.XMLDocument:M,o&&(m.dataType="xml"),x.getResponseHeader=function(e){var t={"content-type":m.dataType};return t[e.toLowerCase()]},u&&(x.status=Number(u.getAttribute("status"))||x.status,x.statusText=u.getAttribute("statusText")||x.statusText);var c=(m.dataType||"").toLowerCase(),l=/(json|script|text)/.test(c);if(l||m.textarea){var f=M.getElementsByTagName("textarea")[0];if(f)x.responseText=f.value,x.status=Number(f.getAttribute("status"))||x.status,x.statusText=f.getAttribute("statusText")||x.statusText;else if(l){var p=M.getElementsByTagName("pre")[0],h=M.getElementsByTagName("body")[0];p?x.responseText=p.textContent?p.textContent:p.innerText:h&&(x.responseText=h.textContent?h.textContent:h.innerText)}}else"xml"==c&&!x.responseXML&&x.responseText&&(x.responseXML=X(x.responseText));try{E=_(x,c,m)}catch(y){i="parsererror",x.error=r=y||i}}catch(y){a("error caught: ",y),i="error",x.error=r=y||i}x.aborted&&(a("upload aborted"),i=null),x.status&&(i=x.status>=200&&x.status<300||304===x.status?"success":"error"),"success"===i?(m.success&&m.success.call(m.context,E,"success",x),S.resolve(x.responseText,"success",x),d&&e.event.trigger("ajaxSuccess",[x,m])):i&&(void 0===r&&(r=x.statusText),m.error&&m.error.call(m.context,x,i,r),S.reject(x,"error",r),d&&e.event.trigger("ajaxError",[x,m,r])),d&&e.event.trigger("ajaxComplete",[x,m]),d&&!--e.active&&e.event.trigger("ajaxStop"),m.complete&&m.complete.call(m.context,x,i),F=!0,m.timeout&&clearTimeout(j),setTimeout(function(){m.iframeTarget?v.attr("src",m.iframeSrc):v.remove(),x.responseXML=null},100)}}}var c,l,m,d,p,v,g,x,y,b,T,j,w=f[0],S=e.Deferred();if(S.abort=function(e){x.abort(e)},r)for(l=0;l<h.length;l++)c=e(h[l]),i?c.prop("disabled",!1):c.removeAttr("disabled");if(m=e.extend(!0,{},e.ajaxSettings,t),m.context=m.context||m,p="jqFormIO"+(new Date).getTime(),m.iframeTarget?(v=e(m.iframeTarget),b=v.attr2("name"),b?p=b:v.attr2("name",p)):(v=e('<iframe name="'+p+'" src="'+m.iframeSrc+'" />'),v.css({position:"absolute",top:"-1000px",left:"-1000px"})),g=v[0],x={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var r="timeout"===t?"timeout":"aborted";a("aborting upload... "+r),this.aborted=1;try{g.contentWindow.document.execCommand&&g.contentWindow.document.execCommand("Stop")}catch(n){}v.attr("src",m.iframeSrc),x.error=r,m.error&&m.error.call(m.context,x,r,t),d&&e.event.trigger("ajaxError",[x,m,r]),m.complete&&m.complete.call(m.context,x,r)}},d=m.global,d&&0===e.active++&&e.event.trigger("ajaxStart"),d&&e.event.trigger("ajaxSend",[x,m]),m.beforeSend&&m.beforeSend.call(m.context,x,m)===!1)return m.global&&e.active--,S.reject(),S;if(x.aborted)return S.reject(),S;y=w.clk,y&&(b=y.name,b&&!y.disabled&&(m.extraData=m.extraData||{},m.extraData[b]=y.value,"image"==y.type&&(m.extraData[b+".x"]=w.clk_x,m.extraData[b+".y"]=w.clk_y)));var D=1,k=2,A=e("meta[name=csrf-token]").attr("content"),L=e("meta[name=csrf-param]").attr("content");L&&A&&(m.extraData=m.extraData||{},m.extraData[L]=A),m.forceSync?o():setTimeout(o,10);var E,M,F,O=50,X=e.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},C=e.parseJSON||function(e){return window.eval("("+e+")")},_=function(t,r,a){var n=t.getResponseHeader("content-type")||"",i="xml"===r||!r&&n.indexOf("xml")>=0,o=i?t.responseXML:t.responseText;return i&&"parsererror"===o.documentElement.nodeName&&e.error&&e.error("parsererror"),a&&a.dataFilter&&(o=a.dataFilter(o,r)),"string"==typeof o&&("json"===r||!r&&n.indexOf("json")>=0?o=C(o):("script"===r||!r&&n.indexOf("javascript")>=0)&&e.globalEval(o)),o};return S}if(!this.length)return a("ajaxSubmit: skipping submit process - no element selected"),this;var u,c,l,f=this;"function"==typeof t?t={success:t}:void 0===t&&(t={}),u=t.type||this.attr2("method"),c=t.url||this.attr2("action"),l="string"==typeof c?e.trim(c):"",l=l||window.location.href||"",l&&(l=(l.match(/^([^#]+)/)||[])[1]),t=e.extend(!0,{url:l,success:e.ajaxSettings.success,type:u||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var m={};if(this.trigger("form-pre-serialize",[this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(t.beforeSerialize&&t.beforeSerialize(this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var d=t.traditional;void 0===d&&(d=e.ajaxSettings.traditional);var p,h=[],v=this.formToArray(t.semantic,h);if(t.data&&(t.extraData=t.data,p=e.param(t.data,d)),t.beforeSubmit&&t.beforeSubmit(v,this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[v,this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var g=e.param(v,d);p&&(g=g?g+"&"+p:p),"GET"==t.type.toUpperCase()?(t.url+=(t.url.indexOf("?")>=0?"&":"?")+g,t.data=null):t.data=g;var x=[];if(t.resetForm&&x.push(function(){f.resetForm()}),t.clearForm&&x.push(function(){f.clearForm(t.includeHidden)}),!t.dataType&&t.target){var y=t.success||function(){};x.push(function(r){var a=t.replaceTarget?"replaceWith":"html";e(t.target)[a](r).each(y,arguments)})}else t.success&&x.push(t.success);if(t.success=function(e,r,a){for(var n=t.context||this,i=0,o=x.length;o>i;i++)x[i].apply(n,[e,r,a||f,f])},t.error){var b=t.error;t.error=function(e,r,a){var n=t.context||this;b.apply(n,[e,r,a,f])}}if(t.complete){var T=t.complete;t.complete=function(e,r){var a=t.context||this;T.apply(a,[e,r,f])}}var j=e("input[type=file]:enabled",this).filter(function(){return""!==e(this).val()}),w=j.length>0,S="multipart/form-data",D=f.attr("enctype")==S||f.attr("encoding")==S,k=n.fileapi&&n.formdata;a("fileAPI :"+k);var A,L=(w||D)&&!k;t.iframe!==!1&&(t.iframe||L)?t.closeKeepAlive?e.get(t.closeKeepAlive,function(){A=s(v)}):A=s(v):A=(w||D)&&k?o(v):e.ajax(t),f.removeData("jqxhr").data("jqxhr",A);for(var E=0;E<h.length;E++)h[E]=null;return this.trigger("form-submit-notify",[this,t]),this},e.fn.ajaxForm=function(n){if(n=n||{},n.delegation=n.delegation&&e.isFunction(e.fn.on),!n.delegation&&0===this.length){var i={s:this.selector,c:this.context};return!e.isReady&&i.s?(a("DOM not ready, queuing ajaxForm"),e(function(){e(i.s,i.c).ajaxForm(n)}),this):(a("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return n.delegation?(e(document).off("submit.form-plugin",this.selector,t).off("click.form-plugin",this.selector,r).on("submit.form-plugin",this.selector,n,t).on("click.form-plugin",this.selector,n,r),this):this.ajaxFormUnbind().bind("submit.form-plugin",n,t).bind("click.form-plugin",n,r)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(t,r){var a=[];if(0===this.length)return a;var i,o=this[0],s=this.attr("id"),u=t?o.getElementsByTagName("*"):o.elements;if(u&&!/MSIE [678]/.test(navigator.userAgent)&&(u=e(u).get()),s&&(i=e(':input[form="'+s+'"]').get(),i.length&&(u=(u||[]).concat(i))),!u||!u.length)return a;var c,l,f,m,d,p,h;for(c=0,p=u.length;p>c;c++)if(d=u[c],f=d.name,f&&!d.disabled)if(t&&o.clk&&"image"==d.type)o.clk==d&&(a.push({name:f,value:e(d).val(),type:d.type}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}));else if(m=e.fieldValue(d,!0),m&&m.constructor==Array)for(r&&r.push(d),l=0,h=m.length;h>l;l++)a.push({name:f,value:m[l]});else if(n.fileapi&&"file"==d.type){r&&r.push(d);var v=d.files;if(v.length)for(l=0;l<v.length;l++)a.push({name:f,value:v[l],type:d.type});else a.push({name:f,value:"",type:d.type})}else null!==m&&"undefined"!=typeof m&&(r&&r.push(d),a.push({name:f,value:m,type:d.type,required:d.required}));if(!t&&o.clk){var g=e(o.clk),x=g[0];f=x.name,f&&!x.disabled&&"image"==x.type&&(a.push({name:f,value:g.val()}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}))}return a},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var r=[];return this.each(function(){var a=this.name;if(a){var n=e.fieldValue(this,t);if(n&&n.constructor==Array)for(var i=0,o=n.length;o>i;i++)r.push({name:a,value:n[i]});else null!==n&&"undefined"!=typeof n&&r.push({name:this.name,value:n})}}),e.param(r)},e.fn.fieldValue=function(t){for(var r=[],a=0,n=this.length;n>a;a++){var i=this[a],o=e.fieldValue(i,t);null===o||"undefined"==typeof o||o.constructor==Array&&!o.length||(o.constructor==Array?e.merge(r,o):r.push(o))}return r},e.fieldValue=function(t,r){var a=t.name,n=t.type,i=t.tagName.toLowerCase();if(void 0===r&&(r=!0),r&&(!a||t.disabled||"reset"==n||"button"==n||("checkbox"==n||"radio"==n)&&!t.checked||("submit"==n||"image"==n)&&t.form&&t.form.clk!=t||"select"==i&&-1==t.selectedIndex))return null;if("select"==i){var o=t.selectedIndex;if(0>o)return null;for(var s=[],u=t.options,c="select-one"==n,l=c?o+1:u.length,f=c?o:0;l>f;f++){var m=u[f];if(m.selected){var d=m.value;if(d||(d=m.attributes&&m.attributes.value&&!m.attributes.value.specified?m.text:m.value),c)return d;s.push(d)}}return s}return e(t).val()},e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})},e.fn.clearFields=e.fn.clearInputs=function(t){var r=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var a=this.type,n=this.tagName.toLowerCase();r.test(a)||"textarea"==n?this.value="":"checkbox"==a||"radio"==a?this.checked=!1:"select"==n?this.selectedIndex=-1:"file"==a?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(t===!0&&/hidden/.test(a)||"string"==typeof t&&e(this).is(t))&&(this.value="")})},e.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each(function(){this.disabled=!e})},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each(function(){var r=this.type;if("checkbox"==r||"radio"==r)this.checked=t;else if("option"==this.tagName.toLowerCase()){var a=e(this).parent("select");t&&a[0]&&"select-one"==a[0].type&&a.find("option").selected(!1),this.selected=t}})},e.fn.ajaxSubmit.debug=!1});
/*!
	Autosize 4.0.0
	license: MIT
	http://www.jacklmoore.com/autosize
*/

!function(e,t){if("function"==typeof define&&define.amd)define(["module","exports"],t);else if("undefined"!=typeof exports)t(module,exports);else{var n={exports:{}};t(n,n.exports),e.autosize=n.exports}}(this,function(e,t){"use strict";var n,o,p="function"==typeof Map?new Map:(n=[],o=[],{has:function(e){return-1<n.indexOf(e)},get:function(e){return o[n.indexOf(e)]},set:function(e,t){-1===n.indexOf(e)&&(n.push(e),o.push(t))},delete:function(e){var t=n.indexOf(e);-1<t&&(n.splice(t,1),o.splice(t,1))}}),c=function(e){return new Event(e,{bubbles:!0})};try{new Event("test")}catch(e){c=function(e){var t=document.createEvent("Event");return t.initEvent(e,!0,!1),t}}function r(r){if(r&&r.nodeName&&"TEXTAREA"===r.nodeName&&!p.has(r)){var e,n=null,o=null,i=null,d=function(){r.clientWidth!==o&&a()},l=function(t){window.removeEventListener("resize",d,!1),r.removeEventListener("input",a,!1),r.removeEventListener("keyup",a,!1),r.removeEventListener("autosize:destroy",l,!1),r.removeEventListener("autosize:update",a,!1),Object.keys(t).forEach(function(e){r.style[e]=t[e]}),p.delete(r)}.bind(r,{height:r.style.height,resize:r.style.resize,overflowY:r.style.overflowY,overflowX:r.style.overflowX,wordWrap:r.style.wordWrap});r.addEventListener("autosize:destroy",l,!1),"onpropertychange"in r&&"oninput"in r&&r.addEventListener("keyup",a,!1),window.addEventListener("resize",d,!1),r.addEventListener("input",a,!1),r.addEventListener("autosize:update",a,!1),r.style.overflowX="hidden",r.style.wordWrap="break-word",p.set(r,{destroy:l,update:a}),"vertical"===(e=window.getComputedStyle(r,null)).resize?r.style.resize="none":"both"===e.resize&&(r.style.resize="horizontal"),n="content-box"===e.boxSizing?-(parseFloat(e.paddingTop)+parseFloat(e.paddingBottom)):parseFloat(e.borderTopWidth)+parseFloat(e.borderBottomWidth),isNaN(n)&&(n=0),a()}function s(e){var t=r.style.width;r.style.width="0px",r.offsetWidth,r.style.width=t,r.style.overflowY=e}function u(){if(0!==r.scrollHeight){var e=function(e){for(var t=[];e&&e.parentNode&&e.parentNode instanceof Element;)e.parentNode.scrollTop&&t.push({node:e.parentNode,scrollTop:e.parentNode.scrollTop}),e=e.parentNode;return t}(r),t=document.documentElement&&document.documentElement.scrollTop;r.style.height="",r.style.height=r.scrollHeight+n+"px",o=r.clientWidth,e.forEach(function(e){e.node.scrollTop=e.scrollTop}),t&&(document.documentElement.scrollTop=t)}}function a(){u();var e=Math.round(parseFloat(r.style.height)),t=window.getComputedStyle(r,null),n="content-box"===t.boxSizing?Math.round(parseFloat(t.height)):r.offsetHeight;if(n<e?"hidden"===t.overflowY&&(s("scroll"),u(),n="content-box"===t.boxSizing?Math.round(parseFloat(window.getComputedStyle(r,null).height)):r.offsetHeight):"hidden"!==t.overflowY&&(s("hidden"),u(),n="content-box"===t.boxSizing?Math.round(parseFloat(window.getComputedStyle(r,null).height)):r.offsetHeight),i!==n){i=n;var o=c("autosize:resized");try{r.dispatchEvent(o)}catch(e){}}}}function i(e){var t=p.get(e);t&&t.destroy()}function d(e){var t=p.get(e);t&&t.update()}var l=null;"undefined"==typeof window||"function"!=typeof window.getComputedStyle?((l=function(e){return e}).destroy=function(e){return e},l.update=function(e){return e}):((l=function(e,t){return e&&Array.prototype.forEach.call(e.length?e:[e],function(e){return r(e)}),e}).destroy=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],i),e},l.update=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],d),e}),t.default=l,e.exports=t.default});

//EVENTOS
!function(e){function t(n){if(o[n])return o[n].exports;var r=o[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var o={};t.m=e,t.c=o,t.d=function(e,o,n){t.o(e,o)||Object.defineProperty(e,o,{configurable:!1,enumerable:!0,get:n})},t.n=function(e){var o=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(o,"a",o),o},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,o){"use strict";var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r=o(1),u={passive:!0,capture:!1},i=["scroll","wheel","touchstart","touchmove","touchenter","touchend","touchleave","mouseout","mouseleave","mouseup","mousedown","mousemove","mouseenter","mousewheel","mouseover"],s=function(e,t){return void 0!==e?e:-1!==i.indexOf(t)&&u.passive},c=function(e){var t=Object.getOwnPropertyDescriptor(e,"passive");return t&&!0!==t.writable&&void 0===t.set?Object.assign({},e):e};if((0,r.eventListenerOptionsSupported)()){var p=EventTarget.prototype.addEventListener;!function(e){EventTarget.prototype.addEventListener=function(t,o,r){var i="object"===(void 0===r?"undefined":n(r))&&null!==r,p=i?r.capture:r;r=i?c(r):{},r.passive=s(r.passive,t),r.capture=void 0===p?u.capture:p,e.call(this,t,o,r)},EventTarget.prototype.addEventListener._original=e}(p)}},function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});t.eventListenerOptionsSupported=function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("test",null,t),window.removeEventListener("test",null,t)}catch(e){}return e}}]);



function md5(str){var RotateLeft=function(lValue,iShiftBits){return(lValue<<iShiftBits)|(lValue>>>(32-iShiftBits));};var AddUnsigned=function(lX,lY){var lX4,lY4,lX8,lY8,lResult;lX8=(lX&0x80000000);lY8=(lY&0x80000000);lX4=(lX&0x40000000);lY4=(lY&0x40000000);lResult=(lX&0x3FFFFFFF)+(lY&0x3FFFFFFF);if(lX4&lY4){return(lResult^0x80000000^lX8^lY8);}
if(lX4|lY4){if(lResult&0x40000000){return(lResult^0xC0000000^lX8^lY8);}else{return(lResult^0x40000000^lX8^lY8);}}else{return(lResult^lX8^lY8);}};var F=function(x,y,z){return(x&y)|((~x)&z);};var G=function(x,y,z){return(x&z)|(y&(~z));};var H=function(x,y,z){return(x^y^z);};var I=function(x,y,z){return(y^(x|(~z)));};var FF=function(a,b,c,d,x,s,ac){a=AddUnsigned(a,AddUnsigned(AddUnsigned(F(b,c,d),x),ac));return AddUnsigned(RotateLeft(a,s),b);};var GG=function(a,b,c,d,x,s,ac){a=AddUnsigned(a,AddUnsigned(AddUnsigned(G(b,c,d),x),ac));return AddUnsigned(RotateLeft(a,s),b);};var HH=function(a,b,c,d,x,s,ac){a=AddUnsigned(a,AddUnsigned(AddUnsigned(H(b,c,d),x),ac));return AddUnsigned(RotateLeft(a,s),b);};var II=function(a,b,c,d,x,s,ac){a=AddUnsigned(a,AddUnsigned(AddUnsigned(I(b,c,d),x),ac));return AddUnsigned(RotateLeft(a,s),b);};var ConvertToWordArray=function(str){var lWordCount;var lMessageLength=str.length;var lNumberOfWords_temp1=lMessageLength+8;var lNumberOfWords_temp2=(lNumberOfWords_temp1-(lNumberOfWords_temp1%64))/64;var lNumberOfWords=(lNumberOfWords_temp2+1)*16;var lWordArray=Array(lNumberOfWords-1);var lBytePosition=0;var lByteCount=0;while(lByteCount<lMessageLength){lWordCount=(lByteCount-(lByteCount%4))/4;lBytePosition=(lByteCount%4)*8;lWordArray[lWordCount]=(lWordArray[lWordCount]|(str.charCodeAt(lByteCount)<<lBytePosition));lByteCount++;}
lWordCount=(lByteCount-(lByteCount%4))/4;lBytePosition=(lByteCount%4)*8;lWordArray[lWordCount]=lWordArray[lWordCount]|(0x80<<lBytePosition);lWordArray[lNumberOfWords-2]=lMessageLength<<3;lWordArray[lNumberOfWords-1]=lMessageLength>>>29;return lWordArray;};var WordToHex=function(lValue){var WordToHexValue="",WordToHexValue_temp="",lByte,lCount;for(lCount=0;lCount<=3;lCount++){lByte=(lValue>>>(lCount*8))&255;WordToHexValue_temp="0"+lByte.toString(16);WordToHexValue=WordToHexValue+WordToHexValue_temp.substr(WordToHexValue_temp.length-2,2);}
return WordToHexValue;};var x=Array();var k,AA,BB,CC,DD,a,b,c,d;var S11=7,S12=12,S13=17,S14=22;var S21=5,S22=9,S23=14,S24=20;var S31=4,S32=11,S33=16,S34=23;var S41=6,S42=10,S43=15,S44=21;str=utf8_encode(str);x=ConvertToWordArray(str);a=0x67452301;b=0xEFCDAB89;c=0x98BADCFE;d=0x10325476;xl=x.length;for(k=0;k<xl;k+=16){AA=a;BB=b;CC=c;DD=d;a=FF(a,b,c,d,x[k+0],S11,0xD76AA478);d=FF(d,a,b,c,x[k+1],S12,0xE8C7B756);c=FF(c,d,a,b,x[k+2],S13,0x242070DB);b=FF(b,c,d,a,x[k+3],S14,0xC1BDCEEE);a=FF(a,b,c,d,x[k+4],S11,0xF57C0FAF);d=FF(d,a,b,c,x[k+5],S12,0x4787C62A);c=FF(c,d,a,b,x[k+6],S13,0xA8304613);b=FF(b,c,d,a,x[k+7],S14,0xFD469501);a=FF(a,b,c,d,x[k+8],S11,0x698098D8);d=FF(d,a,b,c,x[k+9],S12,0x8B44F7AF);c=FF(c,d,a,b,x[k+10],S13,0xFFFF5BB1);b=FF(b,c,d,a,x[k+11],S14,0x895CD7BE);a=FF(a,b,c,d,x[k+12],S11,0x6B901122);d=FF(d,a,b,c,x[k+13],S12,0xFD987193);c=FF(c,d,a,b,x[k+14],S13,0xA679438E);b=FF(b,c,d,a,x[k+15],S14,0x49B40821);a=GG(a,b,c,d,x[k+1],S21,0xF61E2562);d=GG(d,a,b,c,x[k+6],S22,0xC040B340);c=GG(c,d,a,b,x[k+11],S23,0x265E5A51);b=GG(b,c,d,a,x[k+0],S24,0xE9B6C7AA);a=GG(a,b,c,d,x[k+5],S21,0xD62F105D);d=GG(d,a,b,c,x[k+10],S22,0x2441453);c=GG(c,d,a,b,x[k+15],S23,0xD8A1E681);b=GG(b,c,d,a,x[k+4],S24,0xE7D3FBC8);a=GG(a,b,c,d,x[k+9],S21,0x21E1CDE6);d=GG(d,a,b,c,x[k+14],S22,0xC33707D6);c=GG(c,d,a,b,x[k+3],S23,0xF4D50D87);b=GG(b,c,d,a,x[k+8],S24,0x455A14ED);a=GG(a,b,c,d,x[k+13],S21,0xA9E3E905);d=GG(d,a,b,c,x[k+2],S22,0xFCEFA3F8);c=GG(c,d,a,b,x[k+7],S23,0x676F02D9);b=GG(b,c,d,a,x[k+12],S24,0x8D2A4C8A);a=HH(a,b,c,d,x[k+5],S31,0xFFFA3942);d=HH(d,a,b,c,x[k+8],S32,0x8771F681);c=HH(c,d,a,b,x[k+11],S33,0x6D9D6122);b=HH(b,c,d,a,x[k+14],S34,0xFDE5380C);a=HH(a,b,c,d,x[k+1],S31,0xA4BEEA44);d=HH(d,a,b,c,x[k+4],S32,0x4BDECFA9);c=HH(c,d,a,b,x[k+7],S33,0xF6BB4B60);b=HH(b,c,d,a,x[k+10],S34,0xBEBFBC70);a=HH(a,b,c,d,x[k+13],S31,0x289B7EC6);d=HH(d,a,b,c,x[k+0],S32,0xEAA127FA);c=HH(c,d,a,b,x[k+3],S33,0xD4EF3085);b=HH(b,c,d,a,x[k+6],S34,0x4881D05);a=HH(a,b,c,d,x[k+9],S31,0xD9D4D039);d=HH(d,a,b,c,x[k+12],S32,0xE6DB99E5);c=HH(c,d,a,b,x[k+15],S33,0x1FA27CF8);b=HH(b,c,d,a,x[k+2],S34,0xC4AC5665);a=II(a,b,c,d,x[k+0],S41,0xF4292244);d=II(d,a,b,c,x[k+7],S42,0x432AFF97);c=II(c,d,a,b,x[k+14],S43,0xAB9423A7);b=II(b,c,d,a,x[k+5],S44,0xFC93A039);a=II(a,b,c,d,x[k+12],S41,0x655B59C3);d=II(d,a,b,c,x[k+3],S42,0x8F0CCC92);c=II(c,d,a,b,x[k+10],S43,0xFFEFF47D);b=II(b,c,d,a,x[k+1],S44,0x85845DD1);a=II(a,b,c,d,x[k+8],S41,0x6FA87E4F);d=II(d,a,b,c,x[k+15],S42,0xFE2CE6E0);c=II(c,d,a,b,x[k+6],S43,0xA3014314);b=II(b,c,d,a,x[k+13],S44,0x4E0811A1);a=II(a,b,c,d,x[k+4],S41,0xF7537E82);d=II(d,a,b,c,x[k+11],S42,0xBD3AF235);c=II(c,d,a,b,x[k+2],S43,0x2AD7D2BB);b=II(b,c,d,a,x[k+9],S44,0xEB86D391);a=AddUnsigned(a,AA);b=AddUnsigned(b,BB);c=AddUnsigned(c,CC);d=AddUnsigned(d,DD);}
var temp=WordToHex(a)+WordToHex(b)+WordToHex(c)+WordToHex(d);return temp.toLowerCase();}
function utf8_encode(string){string=(string+'').replace(/\r\n/g,"\n").replace(/\r/g,"\n");var utftext="";var start,end;var stringl=0;start=end=0;stringl=string.length;for(var n=0;n<stringl;n++){var c1=string.charCodeAt(n);var enc=null;if(c1<128){end++;}else if((c1>127)&&(c1<2048)){enc=String.fromCharCode((c1>>6)|192)+String.fromCharCode((c1&63)|128);}else{enc=String.fromCharCode((c1>>12)|224)+String.fromCharCode(((c1>>6)&63)|128)+String.fromCharCode((c1&63)|128);}
if(enc!=null){if(end>start){utftext+=string.substring(start,end);}
utftext+=enc;start=end=n+1;}}
if(end>start){utftext+=string.substring(start,string.length);}
return utftext;}
function base64_encode(data){var b64="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";var o1,o2,o3,h1,h2,h3,h4,bits,i=ac=0,enc="",tmp_arr=[];data=utf8_encode(data);do{o1=data.charCodeAt(i++);o2=data.charCodeAt(i++);o3=data.charCodeAt(i++);bits=o1<<16|o2<<8|o3;h1=bits>>18&0x3f;h2=bits>>12&0x3f;h3=bits>>6&0x3f;h4=bits&0x3f;tmp_arr[ac++]=b64.charAt(h1)+b64.charAt(h2)+b64.charAt(h3)+b64.charAt(h4);}while(i<data.length);enc=tmp_arr.join('');switch(data.length%3){case 1:enc=enc.slice(0,-2)+'==';break;case 2:enc=enc.slice(0,-1)+'=';break;}
return enc;}

function roundto(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}

//--> MAC FORMAT
(function($) {
	var MacKeydown,MacKeyup,MacKeyblur;
	$.fn.extend({
		triggerInputMac : function(arg){
			if(this.attr("type") != "text" && this.attr("type") != "textarea"){
				throw this[0].innerHTML + " is not input/text or input/textarea";
				return;
			}
			arg = arg || {};
			var upperCase  = arg.upperCase;
			var splitor = arg.splitor || ":";

			function format(string){
				var mac = string || "";
				var m = "";
				for(var i = 0;i<mac.length;i++){
					var c = mac.charCodeAt(i);
					if((c>96&&c<103)||(c>47&&c<58)||(c>64&&c<71)){
						m = m+mac.charAt(i);
					}
				}
				mac = m.length > 12 ? m.substring(0,12) : m;
				var formatedMac = "";
				var count = 0;
				while(count<mac.length && count < 17){
					formatedMac += mac.charAt(count++);
					if(count%2==0 && count < mac.length){
						formatedMac+= splitor;
					}
				}
				// 最后添加 splitor
				if(formatedMac.length < 15 && (formatedMac.length-2)%3 === 0){
					formatedMac+= splitor;
				}
				if(upperCase == null){
					// 不自动转换大小写
					return formatedMac;
				}
				return upperCase ? formatedMac.toUpperCase() : formatedMac.toLowerCase();
			};
			
			MacKeydown = function MacKeydown(e){
				if(e.keyCode == 32){//空格
					return false;
				}
			}
			MacKeyup = function MacKeyup(e){
				if(e.keyCode == 37 || e.keyCode == 39 || e.keyCode == 8 || e.keyCode == 32){
					// ← & → & backspace & blankspace
					return;
				}
				this.value = format(this.value);
			}
			MacKeyBlur = function MacKeyBlur(){
				this.value = format(this.value);
			}
			this.on("keydown",MacKeydown).on("keyup",MacKeyup).on("blur",MacKeyBlur);
			return this;
		},
		destroyInputMac : 	function(){
			if(this.attr("type") != "text" && this.attr("type") != "textarea"){
				throw this[0].innerHTML + " is not input/text or input/textarea";
				return;
			}
			try{this.off("keydown",MacKeydown)}catch(e){}
			try{this.off("keyup",MacKeyup)}catch(e){}
			try{this.off("blur",MacKeyBlur)}catch(e){}
		}
	});
})(jQuery);


//---->Dafault datatables config
function configtable(idtabla,texto){
$.extend( true, $.fn.dataTable.defaults, {
	"table-layout": 'fixed',
	language: {
		url: "js/Datatables-es.json?time=",//+$.now(),
		searchPlaceholder: "Buscar...",
		buttons: {
        pageLength: {
                _: "%d ",
                '-1': "Todos"
            }
        }
        },
		pageLength : 15,
        stateSave: true,
		responsive: true,
		colReorder: true,
		dom: 'B<"tooltablas">frtip',  
        lengthMenu: [
            [15, 25, 50,100, -1],
            [ '15 Registros', '25 Registros', '50 Registros', '100 Registros', 'Mostrar todos' ]
        ],
	
        buttons: [
        'pageLength',
		{
            extend: 'colvis',
            text: '<i class="fas fa-list-ul"></i>'
        },
			
		{
         extend: 'collection',
		 autoClose: true,
         text: '<i class="far fa-save fa-lg"></i></span> ',
         buttons: [ 
		 {
            extend: 'print',
			exportOptions: {
             columns: ':visible'
             },
			title:'Lista de '+texto,
            text: '<i class="fas fa-print fa-lg"></i> Imprimir',
        },
		 {
            extend: 'csv',
			title:'Lista de '+texto,
            text: '<i class="far fa-file-excel fa-lg"></i> Exportar csv',
        },
		{
            extend: 'excel',
			title:'Lista de '+texto,
            text: '<i class="far fa-file-excel fa-lg"></i> Exportar a Excel',
        },
		 {
            extend: 'pdf',
			exportOptions: {
             columns: ':visible'
             },
			title:'Lista de '+texto,
			orientation: 'landscape',
            text: '<i class="far fa-file-pdf fa-lg"></i> Exportar a PDF',
        }
		 ]
      }  
        ],
} );
}

//--->Loader Update datatables
function loaderout(idclase){
$(idclase).removeClass('panel-loading');
$(idclase).find('.panel-loader').remove()	
}

//--->Loader IN
function loaderin(idclase){
var targetBody = $(idclase).find('.panel-body');
var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
$(idclase).addClass('panel-loading');
$(targetBody).prepend(spinnerHtml); 	
}

//--->Load Tooltip
$('body').tooltip({
    selector: '[data-toggle=tooltip]'
});

var timechar,interval;


//--->Block Submit enter
$(document).on('keypress','#content form,#tmp form,#tmp2 form', function(e) {
var keyCode = e.keyCode || e.which;
if (keyCode ===13) { 
return false;
}
});

//--->Contraseña aleatoria
function passwordaleatorio(t) {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 15; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
$('[name="'+t+'"]').val(text);

}

//--->User aleatoria
function useraleatorio(t) {
  var text = "";
  var possible = "abcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 6; i++)
text += possible.charAt(Math.floor(Math.random() * possible.length));
$('[name="'+t+'"]').val('user-'+text);

}

//---->Load TAB AJAX
$(document).on('click','.nav-ajax [data-toggle=tab]', function(e) {
if(timechar){
clearTimeout(timechar);	
clearInterval(interval);
}

if(interval){
clearInterval(interval);
}
var $this = $(this),
targ= $this.attr('href'),
loadurl=$this.attr('data-url');
if(!loadurl){
return false;
}
	
$(this).tab('show');
e.preventDefault();
	
$(targ).empty().html('<div class="fa-lg text-center"><i class="fas fa-spinner fa-spin"></i> cargando...</div>');
$.get(loadurl, function( data ) {
$(targ).empty().html(data);
});
return false;
});

//---->remove readonly
$(document).on('click','.no', function(e) {
e.preventDefault();
$(this).prop('readonly',false);
});

//----->Modal MAPA USER
$(document).on('click','a[data-mapa]',function () {
getmodal('ajax/viewuser?action=mapauser&idservicio='+$(this).data('mapa'),'Ubicación Cliente','lg');
});

//---->PopoVer Mbps/kbps
$(document).on('click','.popkbpsdown li', function(e) {
$('[name="descarga"]').val($(this).data('down'));
$('.bst').trigger('keyup');
$('[data-toggle="popover"]').popover('hide'); 
});

$(document).on('click','.popkbpsup li', function(e) {
$('[name="subida"]').val($(this).data('down'));
$('.bst').trigger('keyup');
$('[data-toggle="popover"]').popover('hide'); 
});

//---->Popover AJAX
$(document).on('click','*[data-ajaxpopup]',function (dd) {
 dd.preventDefault;
$("*").each(function () {
var popover = $.data(this, "bs.popover");
if (popover)
$(this).popover('hide');
})
	
    var e=$(this);
    $.get(e.data('ajaxpopup'),function(d) {
	var options = {
    content: d,
	title:'Herramientas <button type="button" class="close" onclick="closeall()">×</button>',
	trigger : 'click', 
	html: true,
};		
	e.popover('dispose');
	//setTimeout(function () {
	e.popover(options).popover('show');
	//},170);
		
    });
});

//---->UPDATE METER
function update_meter(d, c) {
    var a = Math.floor(100 * d / c);
    if (a > 100) {
        a = 100
    }
    $("#signalbar").css({
        width: "" + a + "%"
    });
    if (typeof beeps != "undefined") {
        beeps.replay(Math.floor(5 - (a / 20)))
    }
}

//-->Convert Bytes
function formatBytes(a,b){if(0==a)return"0 Bytes";var c=1000,d=b||2,e=["Bytes","KiB","MiB","GiB","TiB","PiB","EiB","ZiB","YiB"],f=Math.floor(Math.log(a)/Math.log(c));return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]}


//---->Close all popover
function closeall(){
$("*").each(function () {
var popover = $.data(this, "bs.popover");
if (popover)
$(this).popover('dispose');
})
$('.tooltip').remove();
}

//---->GET
function $_GET(param) {
    var vars = {};
location.hash.replace(/[?&]+([^=&]+)=?([^&]*)?/gi, function(m, key, value) {
        vars[key] = value !== undefined ? value : '';
    });
    if (param) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
} 

//--->Password HASH
function password_hash(p1,p2) {
    return md5(p1)+":"+p2;
}

//--->REEnviar sms
function resendsms(id){
	
	
$.confirm({
theme: 'supervan',
draggable: false,
closeIcon: true,
animationBounce: 2.5,
escapeKey: false,
content: 'Esta seguro que desea volver enviar este mensaje?',
title: '<i class="far fa-question-circle fa-lg icodialog"></i> Enviar SMS',
buttons: {
Eliminar: {
text: '<i class="far fa-share-square icodialog"></i> Si, enviar', // With spaces and symbols
action: function () {

$('.tooltip').remove();
$.post( "ajax/usuarios", { action: "resendsms", id: id })
  .done(function( data ) {
 alerta('exito','El sms esta en cola para su envío.');
if ( $("#data-sms-e" ).length ) {
update_enviados();
}else{
$('a[href="#nav-tab-5"]').trigger('click');	
}	
  });	
 
}}}
});

}

//--->Conter SMS
function maximosms(caja){
if($(caja).val().length>=160){
$(caja).val($(caja).val().substring(0,160));
 }
$('.counter').html('Carácteres <b>'+$(caja).val().length+'/160</b>');
}

//--->REEnviar EMAIL
function resendmail(id){
$.confirm({
theme: 'supervan',
draggable: false,
closeIcon: true,
animationBounce: 2.5,
escapeKey: false,
content: 'Esta seguro que desea volver enviar este mensaje?',
title: '<i class="far fa-question-circle fa-lg icodialog"></i> Enviar Correo',
buttons: {
Eliminar: {
text: '<i class="far fa-share-square icodialog"></i> Si, enviar', // With spaces and symbols
action: function () {
$('.tooltip').remove();
$.post( "ajax/usuarios", { action: "resendmail", id: id })
  .done(function( data ) {
 alerta('exito','El correo esta en cola para su envío.');
$('a[href="#nav-tab-5"]').trigger('click');
$('.btncorreos').trigger('click');
  });	
 
}}}
});
}

//---->Carga URL
function loadurl(url){
$('.tooltip').remove();
$(".ajaxlink").attr("href", url);
$(".ajaxlink")[0].click();
}
	
//---->Modal Boostrap
function getmodal(url,titulo,tamano){
$('#tmp,#tmp2').empty().html('');
$('.tooltip').remove();
$('#modal-loader').modal({backdrop: 'static', keyboard: false});
setTimeout(function(){
$.get( url)
  .done(function( data ) {
$('#modal-loader').modal('hide');
 $('#tmp').html('<div class="modal" id="modaltmp" role="dialog">'+
'<div class="modal-dialog modal-dialog-centered modal-'+tamano+'" role="document">'+
'<div class="modal-content">'+
'<div class="modal-header">'+
'<h5 class="modal-title">'+titulo+'</h5>'+
'<button type="button" class="close" data-dismiss="modal" aria-hidden="true" ><i class="fa fa-times" aria-hidden="true"></i></button>'+
'</div>'+data+'</div></div></div>');
  }).fail(function(data) {
$('#modal-loader').modal('hide');
alerta('error',data['statusText']);
  });
}, 200);
}

//--->Alertas
function alerta(tipo,texto){
if(tipo=="error"){
$.gritter.add({
title: 'ERROR!',
text: texto,
time: '5000',
image: '<i class="fas fa-exclamation-triangle"></i>',
class_name: 'alerta-error'
});
}

if(tipo=="login"){
$.gritter.add({
title: 'ERROR!',
text: texto,
time: '6000',
image: '<i class="fas fa-exclamation-triangle"></i>',
class_name: 'alerta-error'
});
}

if(tipo=="warning"){
$.gritter.add({
title: 'ATENCIÓN!',
text: texto,
time: '40000',
image: '<i class="fas fa-exclamation-triangle"></i>',
class_name: 'alerta-warning'
});
}

if(tipo=="error500"){
$.gritter.add({
title: 'ERROR!',
text: texto,
image: '<i class="fas fa-exclamation-triangle"></i>',
sticky: true,
time: '',
class_name: 'alerta-error'
});
}

if(tipo=="exito"){
$.gritter.add({
title: 'Operación Exitosa!',
image: '<i class="fa fa-thumbs-up"></i>',
text: texto,
time: '4000',
class_name: 'alerta-exito'
});
}

if(tipo=="loader"){
if(texto){
texto=texto;
}else{
texto='Enviando datos';
}
	
$.gritter.add({
image: '<i class="fa fa-spinner fa-lg fa-spin"></i>',
title: 'PROCESANDO...',
text: texto,
sticky: true,
time: '',
class_name: 'alerta-loader'
});
}

}

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
				alwaysShowClose: true,
				});
});

function btnloader(e,t){
if(t){
$(e+' .btn-loader').prop('disabled', false).html(t);
}else{
$(e+' .btn-loader').prop('disabled', true).html('<i class="fa fa-spinner fa-lg fa-spin"></i> Procesando...');	
}
}

function successubi(pos) {
var crd = pos.coords;
$('input[name="servicio\[coordenadas\]"]').val(crd.latitude+','+crd.longitude);
$('.btn-ubi').html('<i class="fas fa-location-arrow"></i>');
$('[data-toggle="tooltip"]').tooltip('hide');
}

function errorubi(err) {
alerta('warning','No es posible Obtener su ubicación actual ('+err.message+')');
$('.btn-ubi').html('<i class="fas fa-location-arrow"></i>');
$('[data-toggle="tooltip"]').tooltip('hide');
}

function getubicacion(){
$('[data-toggle="tooltip"]').tooltip('hide');
$('.btn-ubi').html('<i class="fa fa-spinner fa-lg fa-spin"></i>')
var options = {
  enableHighAccuracy: true,
  timeout: 15000,
  maximumAge: 0
};
navigator.geolocation.getCurrentPosition(successubi,errorubi, options);
}

function getgrafico() {
$('#ping_grafico').attr('src','ajax/emisores?action=grafico&id='+$('#id_ping_chart').val()+'&tipo='+$('#ping_grafico_tipo').val()+'&grafico=ping');	
};

function openping(id){
$('#id_ping_chart').val(id);
getgrafico();
$('#modal-ping').modal('show');
}

//-->segundos a horas
function segundos_horas(seconds) {
 const h = Math.floor(seconds / 3600);
  const m = Math.floor((seconds % 3600) / 60);
  const s = seconds % 60;
  return [
    h,
    m > 9 ? m : (h ? '0' + m : m || '0'),
    s > 9 ? s : '0' + s,
  ].filter(a => a).join(':');
}

var pasarela;

$( document ).ajaxComplete(function( event, xhr, settings ) {
 startTimer();
});

//--->Resize all datatables
$(document).on('shown.bs.tab', function (e) {
$('.tooltip').remove();
$($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
})