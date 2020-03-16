/*! For license information please see admin.js.LICENSE.txt */
!function(e){var t={};function n(o){if(t[o])return t[o].exports;var a=t[o]={i:o,l:!1,exports:{}};return e[o].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(o,a,function(t){return e[t]}.bind(null,a));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=1)}({1:function(e,t,n){e.exports=n("v0lo")},oBpX:function(e,t){jQuery.trumbowyg={langs:{en:{viewHTML:"View HTML",undo:"Undo",redo:"Redo",formatting:"Formatting",p:"Paragraph",blockquote:"Quote",code:"Code",header:"Header",bold:"Bold",italic:"Italic",strikethrough:"Strikethrough",underline:"Underline",strong:"Strong",em:"Emphasis",del:"Deleted",superscript:"Superscript",subscript:"Subscript",unorderedList:"Unordered list",orderedList:"Ordered list",insertImage:"Insert Image",link:"Link",createLink:"Insert link",unlink:"Remove link",justifyLeft:"Align Left",justifyCenter:"Align Center",justifyRight:"Align Right",justifyFull:"Align Justify",horizontalRule:"Insert horizontal rule",removeformat:"Remove format",fullscreen:"Fullscreen",close:"Close",submit:"Confirm",reset:"Cancel",required:"Required",description:"Description",title:"Title",text:"Text",target:"Target",width:"Width"}},plugins:{},svgPath:null,hideButtonTexts:null},Object.defineProperty(jQuery.trumbowyg,"defaultOptions",{value:{lang:"en",fixedBtnPane:!1,fixedFullWidth:!1,autogrow:!1,autogrowOnEnter:!1,imageWidthModalEdit:!1,prefix:"trumbowyg-",semantic:!0,semanticKeepAttributes:!1,resetCss:!1,removeformatPasted:!1,tabToIndent:!1,tagsToRemove:[],tagsToKeep:["hr","img","embed","iframe","input"],btns:[["viewHTML"],["undo","redo"],["formatting"],["strong","em","del"],["superscript","subscript"],["link"],["insertImage"],["justifyLeft","justifyCenter","justifyRight","justifyFull"],["unorderedList","orderedList"],["horizontalRule"],["removeformat"],["fullscreen"]],btnsDef:{},changeActiveDropdownIcon:!1,inlineElementsSelector:"a,abbr,acronym,b,caption,cite,code,col,dfn,dir,dt,dd,em,font,hr,i,kbd,li,q,span,strikeout,strong,sub,sup,u",pasteHandlers:[],plugins:{},urlProtocol:!1,minimalLinks:!1,defaultLinkTarget:void 0},writable:!1,enumerable:!0,configurable:!1}),function(e,t,n,o){"use strict";o.fn.trumbowyg=function(e,t){if(e===Object(e)||!e)return this.each((function(){o(this).data("trumbowyg")||o(this).data("trumbowyg",new a(this,e))}));if(1===this.length)try{var n=o(this).data("trumbowyg");switch(e){case"execCmd":return n.execCmd(t.cmd,t.param,t.forceCss,t.skipTrumbowyg);case"openModal":return n.openModal(t.title,t.content);case"closeModal":return n.closeModal();case"openModalInsert":return n.openModalInsert(t.title,t.fields,t.callback);case"saveRange":return n.saveRange();case"getRange":return n.range;case"getRangeText":return n.getRangeText();case"restoreRange":return n.restoreRange();case"enable":return n.setDisabled(!1);case"disable":return n.setDisabled(!0);case"toggle":return n.toggle();case"destroy":return n.destroy();case"empty":return n.empty();case"html":return n.html(t)}}catch(e){}return!1};var a=function(a,r){var i=this,s=o.trumbowyg;i.doc=a.ownerDocument||n,i.$ta=o(a),i.$c=o(a),null!=(r=r||{}).lang||null!=s.langs[r.lang]?i.lang=o.extend(!0,{},s.langs.en,s.langs[r.lang]):i.lang=s.langs.en,i.hideButtonTexts=null!=s.hideButtonTexts?s.hideButtonTexts:r.hideButtonTexts;var l=null!=s.svgPath?s.svgPath:r.svgPath;if(i.hasSvg=!1!==l,i.svgPath=i.doc.querySelector("base")?t.location.href.split("#")[0]:"",0===o("#trumbowyg-icons",i.doc).length&&!1!==l){if(null==l){for(var d=n.getElementsByTagName("script"),c=0;c<d.length;c+=1){var u=d[c].src,g=u.match("trumbowyg(.min)?.js");null!=g&&(l=u.substring(0,u.indexOf(g[0]))+"ui/icons.svg")}null==l&&console.warn("You must define svgPath: https://goo.gl/CfTY9U")}var f=i.doc.createElement("div");f.id="trumbowyg-icons",i.doc.body.insertBefore(f,i.doc.body.childNodes[0]),o.ajax({async:!0,type:"GET",contentType:"application/x-www-form-urlencoded; charset=UTF-8",dataType:"xml",crossDomain:!0,url:l,data:null,beforeSend:null,complete:null,success:function(e){f.innerHTML=(new XMLSerializer).serializeToString(e.documentElement)}})}var h=i.lang.header,p=function(){return(t.chrome||t.Intl&&Intl.v8BreakIterator)&&"CSS"in t};i.btnsDef={viewHTML:{fn:"toggle",class:"trumbowyg-not-disable"},undo:{isSupported:p,key:"Z"},redo:{isSupported:p,key:"Y"},p:{fn:"formatBlock"},blockquote:{fn:"formatBlock"},h1:{fn:"formatBlock",title:h+" 1"},h2:{fn:"formatBlock",title:h+" 2"},h3:{fn:"formatBlock",title:h+" 3"},h4:{fn:"formatBlock",title:h+" 4"},h5:{fn:"formatBlock",title:h+" 5"},h6:{fn:"formatBlock",title:h+" 6"},subscript:{tag:"sub"},superscript:{tag:"sup"},bold:{key:"B",tag:"b"},italic:{key:"I",tag:"i"},underline:{tag:"u"},strikethrough:{tag:"strike"},strong:{fn:"bold",key:"B"},em:{fn:"italic",key:"I"},del:{fn:"strikethrough"},createLink:{key:"K",tag:"a"},unlink:{},insertImage:{},justifyLeft:{tag:"left",forceCss:!0},justifyCenter:{tag:"center",forceCss:!0},justifyRight:{tag:"right",forceCss:!0},justifyFull:{tag:"justify",forceCss:!0},unorderedList:{fn:"insertUnorderedList",tag:"ul"},orderedList:{fn:"insertOrderedList",tag:"ol"},horizontalRule:{fn:"insertHorizontalRule"},removeformat:{},fullscreen:{class:"trumbowyg-not-disable"},close:{fn:"destroy",class:"trumbowyg-not-disable"},formatting:{dropdown:["p","blockquote","h1","h2","h3","h4"],ico:"p"},link:{dropdown:["createLink","unlink"]}},i.o=o.extend(!0,{},s.defaultOptions,r),i.o.hasOwnProperty("imgDblClickHandler")||(i.o.imgDblClickHandler=i.getDefaultImgDblClickHandler()),i.urlPrefix=i.setupUrlPrefix(),i.disabled=i.o.disabled||"TEXTAREA"===a.nodeName&&a.disabled,r.btns?i.o.btns=r.btns:i.o.semantic||(i.o.btns[3]=["bold","italic","underline","strikethrough"]),o.each(i.o.btnsDef,(function(e,t){i.addBtnDef(e,t)})),i.eventNamespace="trumbowyg-event",i.keys=[],i.tagToButton={},i.tagHandlers=[],i.pasteHandlers=[].concat(i.o.pasteHandlers),i.isIE=-1!==e.userAgent.indexOf("MSIE")||-1!==e.appVersion.indexOf("Trident/"),i.isMac=-1!==e.platform.toUpperCase().indexOf("MAC"),i.init()};a.prototype={DEFAULT_SEMANTIC_MAP:{b:"strong",i:"em",s:"del",strike:"del",div:"p"},init:function(){var e=this;e.height=e.$ta.height(),e.initPlugins();try{e.doc.execCommand("enableObjectResizing",!1,!1),e.doc.execCommand("defaultParagraphSeparator",!1,"p")}catch(e){}e.buildEditor(),e.buildBtnPane(),e.fixedBtnPaneEvents(),e.buildOverlay(),setTimeout((function(){e.disabled&&e.setDisabled(!0),e.$c.trigger("tbwinit")}))},addBtnDef:function(e,t){this.btnsDef[e]=o.extend(t,this.btnsDef[e]||{})},setupUrlPrefix:function(){var e=this.o.urlProtocol;if(e)return"string"!=typeof e?"https://":e.replace("://","")+"://"},buildEditor:function(){var e=this,n=e.o.prefix,a="";e.$box=o("<div/>",{class:n+"box "+n+"editor-visible "+n+e.o.lang+" trumbowyg"}),e.isTextarea=e.$ta.is("textarea"),e.isTextarea?(a=e.$ta.val(),e.$ed=o("<div/>"),e.$box.insertAfter(e.$ta).append(e.$ed,e.$ta)):(e.$ed=e.$ta,a=e.$ed.html(),e.$ta=o("<textarea/>",{name:e.$ta.attr("id"),height:e.height}).val(a),e.$box.insertAfter(e.$ed).append(e.$ta,e.$ed),e.syncCode()),e.$ta.addClass(n+"textarea").attr("tabindex",-1),e.$ed.addClass(n+"editor").attr({contenteditable:!0,dir:e.lang._dir||"ltr"}).html(a),e.o.tabindex&&e.$ed.attr("tabindex",e.o.tabindex),e.$c.is("[placeholder]")&&e.$ed.attr("placeholder",e.$c.attr("placeholder")),e.$c.is("[spellcheck]")&&e.$ed.attr("spellcheck",e.$c.attr("spellcheck")),e.o.resetCss&&e.$ed.addClass(n+"reset-css"),e.o.autogrow||e.$ta.add(e.$ed).css({height:e.height}),e.semanticCode(),e.o.autogrowOnEnter&&e.$ed.addClass(n+"autogrow-on-enter");var r,i=!1,s=!1;e.$ed.on("dblclick","img",e.o.imgDblClickHandler).on("keydown",(function(t){if(!t.ctrlKey&&!t.metaKey||t.altKey){if(e.o.tabToIndent&&"Tab"===t.key)try{return t.shiftKey?e.execCmd("outdent",!0,null):e.execCmd("indent",!0,null),!1}catch(e){}}else{i=!0;var n=e.keys[String.fromCharCode(t.which).toUpperCase()];try{return e.execCmd(n.fn,n.param),!1}catch(e){}}})).on("compositionstart compositionupdate",(function(){s=!0})).on("keyup compositionend",(function(t){if("compositionend"===t.type)s=!1;else if(s)return;var n=t.which;if(!(n>=37&&n<=40)){if(!t.ctrlKey&&!t.metaKey||89!==n&&90!==n)if(i||17===n)void 0===t.which&&e.semanticCode(!1,!1,!0);else{var o=!e.isIE||"compositionend"===t.type;e.semanticCode(!1,o&&13===n),e.$c.trigger("tbwchange")}else e.semanticCode(!1,!0),e.$c.trigger("tbwchange");setTimeout((function(){i=!1}),50)}})).on("mouseup keydown keyup",(function(t){(!t.ctrlKey&&!t.metaKey||t.altKey)&&setTimeout((function(){i=!1}),50),clearTimeout(r),r=setTimeout((function(){e.updateButtonPaneStatus()}),50)})).on("focus blur",(function(t){if("blur"===t.type&&e.clearButtonPaneStatus(),e.$c.trigger("tbw"+t.type),e.o.autogrowOnEnter){if(e.autogrowOnEnterDontClose)return;"focus"===t.type?(e.autogrowOnEnterWasFocused=!0,e.autogrowEditorOnEnter()):e.o.autogrow||(e.$ed.css({height:e.$ed.css("min-height")}),e.$c.trigger("tbwresize"))}})).on("keyup focus",(function(){e.$ta.val().match(/<.*>/)||setTimeout((function(){var t=e.isIE?"<p>":"p";e.doc.execCommand("formatBlock",!1,t),e.syncCode()}),0)})).on("cut drop",(function(){setTimeout((function(){e.semanticCode(!1,!0),e.$c.trigger("tbwchange")}),0)})).on("paste",(function(n){if(e.o.removeformatPasted){n.preventDefault(),t.getSelection&&t.getSelection().deleteFromDocument&&t.getSelection().deleteFromDocument();try{var a=t.clipboardData.getData("Text");try{e.doc.selection.createRange().pasteHTML(a)}catch(t){e.doc.getSelection().getRangeAt(0).insertNode(e.doc.createTextNode(a))}e.$c.trigger("tbwchange",n)}catch(t){e.execCmd("insertText",(n.originalEvent||n).clipboardData.getData("text/plain"))}}o.each(e.pasteHandlers,(function(e,t){t(n)})),setTimeout((function(){e.semanticCode(!1,!0),e.$c.trigger("tbwpaste",n),e.$c.trigger("tbwchange")}),0)})),e.$ta.on("keyup",(function(){e.$c.trigger("tbwchange")})).on("paste",(function(){setTimeout((function(){e.$c.trigger("tbwchange")}),0)})),o(e.doc.body).on("keydown."+e.eventNamespace,(function(t){if(27===t.which&&o("."+n+"modal-box").length>=1)return e.closeModal(),!1}))},autogrowEditorOnEnter:function(){var e=this;e.$ed.removeClass("autogrow-on-enter");var t=e.$ed[0].clientHeight;e.$ed.height("auto");var n=e.$ed[0].scrollHeight;e.$ed.addClass("autogrow-on-enter"),t!==n&&(e.$ed.height(t),setTimeout((function(){e.$ed.css({height:n}),e.$c.trigger("tbwresize")}),0))},buildBtnPane:function(){var e=this,t=e.o.prefix,n=e.$btnPane=o("<div/>",{class:t+"button-pane"});o.each(e.o.btns,(function(a,r){o.isArray(r)||(r=[r]);var i=o("<div/>",{class:t+"button-group "+(r.indexOf("fullscreen")>=0?t+"right":"")});o.each(r,(function(t,n){try{e.isSupportedBtn(n)&&i.append(e.buildBtn(n))}catch(e){}})),i.html().trim().length>0&&n.append(i)})),e.$box.prepend(n)},buildBtn:function(e){var t=this,n=t.o.prefix,a=t.btnsDef[e],r=a.dropdown,i=null==a.hasIcon||a.hasIcon,s=t.lang[e]||e,l=o("<button/>",{type:"button",class:n+e+"-button "+(a.class||"")+(i?"":" "+n+"textual-button"),html:t.hasSvg&&i?'<svg><use xlink:href="'+t.svgPath+"#"+n+(a.ico||e).replace(/([A-Z]+)/g,"-$1").toLowerCase()+'"/></svg>':t.hideButtonTexts?"":a.text||a.title||t.lang[e]||e,title:(a.title||a.text||s)+(a.key?" ("+(t.isMac?"Cmd":"Ctrl")+" + "+a.key+")":""),tabindex:-1,mousedown:function(){return r&&!o("."+e+"-"+n+"dropdown",t.$box).is(":hidden")||o("body",t.doc).trigger("mousedown"),!((t.$btnPane.hasClass(n+"disable")||t.$box.hasClass(n+"disabled"))&&!o(this).hasClass(n+"active")&&!o(this).hasClass(n+"not-disable"))&&(t.execCmd((!r?a.fn:"dropdown")||e,a.param||e,a.forceCss),!1)}});if(r){l.addClass(n+"open-dropdown");var d=n+"dropdown",c={class:d+"-"+e+" "+d+" "+n+"fixed-top "+(a.dropdownClass||"")};c["data-"+d]=e;var u=o("<div/>",c);o.each(r,(function(e,n){t.btnsDef[n]&&t.isSupportedBtn(n)&&u.append(t.buildSubBtn(n))})),t.$box.append(u.hide())}else a.key&&(t.keys[a.key]={fn:a.fn||e,param:a.param||e});return r||(t.tagToButton[(a.tag||e).toLowerCase()]=e),l},buildSubBtn:function(e){var t=this,n=t.o.prefix,a=t.btnsDef[e],r=null==a.hasIcon||a.hasIcon;return a.key&&(t.keys[a.key]={fn:a.fn||e,param:a.param||e}),t.tagToButton[(a.tag||e).toLowerCase()]=e,o("<button/>",{type:"button",class:n+e+"-dropdown-button "+(a.class||"")+(a.ico?" "+n+a.ico+"-button":""),html:t.hasSvg&&r?'<svg><use xlink:href="'+t.svgPath+"#"+n+(a.ico||e).replace(/([A-Z]+)/g,"-$1").toLowerCase()+'"/></svg>'+(a.text||a.title||t.lang[e]||e):a.text||a.title||t.lang[e]||e,title:a.key?"("+(t.isMac?"Cmd":"Ctrl")+" + "+a.key+")":null,style:a.style||null,mousedown:function(){return o("body",t.doc).trigger("mousedown"),t.execCmd(a.fn||e,a.param||e,a.forceCss),!1}})},isSupportedBtn:function(e){try{return this.btnsDef[e].isSupported()}catch(e){}return!0},buildOverlay:function(){var e=this;return e.$overlay=o("<div/>",{class:e.o.prefix+"overlay"}).appendTo(e.$box),e.$overlay},showOverlay:function(){var e=this;o(t).trigger("scroll"),e.$overlay.fadeIn(200),e.$box.addClass(e.o.prefix+"box-blur")},hideOverlay:function(){var e=this;e.$overlay.fadeOut(50),e.$box.removeClass(e.o.prefix+"box-blur")},fixedBtnPaneEvents:function(){var e=this,n=e.o.fixedFullWidth,a=e.$box;e.o.fixedBtnPane&&(e.isFixed=!1,o(t).on("scroll."+e.eventNamespace+" resize."+e.eventNamespace,(function(){if(a){e.syncCode();var r=o(t).scrollTop(),i=a.offset().top+1,s=e.$btnPane,l=s.outerHeight()-2;r-i>0&&r-i-e.height<0?(e.isFixed||(e.isFixed=!0,s.css({position:"fixed",top:0,left:n?0:"auto",zIndex:7}),e.$box.css({paddingTop:s.height()})),s.css({width:n?"100%":a.width()-1}),o("."+e.o.prefix+"fixed-top",a).css({position:n?"fixed":"absolute",top:n?l:l+(r-i),zIndex:15})):e.isFixed&&(e.isFixed=!1,s.removeAttr("style"),e.$box.css({paddingTop:0}),o("."+e.o.prefix+"fixed-top",a).css({position:"absolute",top:l}))}})))},setDisabled:function(e){var t=this,n=t.o.prefix;t.disabled=e,e?t.$ta.attr("disabled",!0):t.$ta.removeAttr("disabled"),t.$box.toggleClass(n+"disabled",e),t.$ed.attr("contenteditable",!e)},destroy:function(){var e=this,n=e.o.prefix;e.isTextarea?e.$box.after(e.$ta.css({height:""}).val(e.html()).removeClass(n+"textarea").show()):e.$box.after(e.$ed.css({height:""}).removeClass(n+"editor").removeAttr("contenteditable").removeAttr("dir").html(e.html()).show()),e.$ed.off("dblclick","img"),e.destroyPlugins(),e.$box.remove(),e.$c.removeData("trumbowyg"),o("body").removeClass(n+"body-fullscreen"),e.$c.trigger("tbwclose"),o(t).off("scroll."+e.eventNamespace+" resize."+e.eventNamespace),o(e.doc.body).off("keydown."+e.eventNamespace)},empty:function(){this.$ta.val(""),this.syncCode(!0)},toggle:function(){var e=this,t=e.o.prefix;e.o.autogrowOnEnter&&(e.autogrowOnEnterDontClose=!e.$box.hasClass(t+"editor-hidden")),e.semanticCode(!1,!0),e.$c.trigger("tbwchange"),setTimeout((function(){e.doc.activeElement.blur(),e.$box.toggleClass(t+"editor-hidden "+t+"editor-visible"),e.$btnPane.toggleClass(t+"disable"),o("."+t+"viewHTML-button",e.$btnPane).toggleClass(t+"active"),e.$box.hasClass(t+"editor-visible")?e.$ta.attr("tabindex",-1):e.$ta.removeAttr("tabindex"),e.o.autogrowOnEnter&&!e.autogrowOnEnterDontClose&&e.autogrowEditorOnEnter()}),0)},dropdown:function(e){var n=this,a=o("body",n.doc),r=n.o.prefix,i=o("[data-"+r+"dropdown="+e+"]",n.$box),s=o("."+r+e+"-button",n.$btnPane),l=i.is(":hidden");if(a.trigger("mousedown"),l){var d=s.offset().left;s.addClass(r+"active"),i.css({position:"absolute",top:s.offset().top-n.$btnPane.offset().top+s.outerHeight(),left:n.o.fixedFullWidth&&n.isFixed?d:d-n.$btnPane.offset().left}).show(),o(t).trigger("scroll"),a.on("mousedown."+n.eventNamespace,(function(e){i.is(e.target)||(o("."+r+"dropdown",n.$box).hide(),o("."+r+"active",n.$btnPane).removeClass(r+"active"),a.off("mousedown."+n.eventNamespace))}))}},html:function(e){var t=this;return null!=e?(t.$ta.val(e),t.syncCode(!0),t.$c.trigger("tbwchange"),t):t.$ta.val()},syncTextarea:function(){var e=this;e.$ta.val(e.$ed.text().trim().length>0||e.$ed.find(e.o.tagsToKeep.join(",")).length>0?e.$ed.html():"")},syncCode:function(e){var t=this;if(!e&&t.$ed.is(":visible"))t.syncTextarea();else{var n=o("<div>").html(t.$ta.val()),a=o("<div>").append(n);o(t.o.tagsToRemove.join(","),a).remove(),t.$ed.html(a.contents().html())}if(t.o.autogrow&&(t.height=t.$ed.height(),t.height!==t.$ta.css("height")&&(t.$ta.css({height:t.height}),t.$c.trigger("tbwresize"))),t.o.autogrowOnEnter){t.$ed.height("auto");var r=t.autogrowOnEnterWasFocused?t.$ed[0].scrollHeight:t.$ed.css("min-height");r!==t.$ta.css("height")&&(t.$ed.css({height:r}),t.$c.trigger("tbwresize"))}},semanticCode:function(e,t,n){var a=this;if(a.saveRange(),a.syncCode(e),a.o.semantic){if(a.semanticTag("b",a.o.semanticKeepAttributes),a.semanticTag("i",a.o.semanticKeepAttributes),a.semanticTag("s",a.o.semanticKeepAttributes),a.semanticTag("strike",a.o.semanticKeepAttributes),t){var r=a.o.inlineElementsSelector,i=":not("+r+")";a.$ed.contents().filter((function(){return 3===this.nodeType&&this.nodeValue.trim().length>0})).wrap("<span data-tbw/>");var s=function(e){if(0!==e.length){var t=e.nextUntil(i).addBack().wrapAll("<p/>").parent(),n=t.nextAll(r).first();t.next("br").remove(),s(n)}};s(a.$ed.children(r).first()),a.semanticTag("div",!0),o("[data-tbw]",a.$ed).contents().unwrap(),a.$ed.find("p:empty").remove()}n||a.restoreRange(),a.syncTextarea()}},semanticTag:function(e,t){var n;if(null!=this.o.semantic&&"object"==typeof this.o.semantic&&this.o.semantic.hasOwnProperty(e))n=this.o.semantic[e];else{if(!0!==this.o.semantic||!this.DEFAULT_SEMANTIC_MAP.hasOwnProperty(e))return;n=this.DEFAULT_SEMANTIC_MAP[e]}o(e,this.$ed).each((function(){var e=o(this);if(0===e.contents().length)return!1;e.wrap("<"+n+"/>"),t&&o.each(e.prop("attributes"),(function(){e.parent().attr(this.name,this.value)})),e.contents().unwrap()}))},createLink:function(){for(var e,t,n,a=this,r=a.doc.getSelection(),i=r.getRangeAt(0),s=r.focusNode,l=(new XMLSerializer).serializeToString(i.cloneContents())||i+"";["A","DIV"].indexOf(s.nodeName)<0;)s=s.parentNode;if(s&&"A"===s.nodeName){var d=o(s);l=d.text(),e=d.attr("href"),a.o.minimalLinks||(t=d.attr("title"),n=d.attr("target")||a.o.defaultLinkTarget);var c=a.doc.createRange();c.selectNode(s),r.removeAllRanges(),r.addRange(c)}a.saveRange();var u={url:{label:"URL",required:!0,value:e},text:{label:a.lang.text,value:l}};a.o.minimalLinks||o.extend(u,{title:{label:a.lang.title,value:t},target:{label:a.lang.target,value:n}}),a.openModalInsert(a.lang.createLink,u,(function(e){var t=a.prependUrlPrefix(e.url);if(!t.length)return!1;var n=o(['<a href="',t,'">',e.text||e.url,"</a>"].join(""));return e.title&&n.attr("title",e.title),(e.target||a.o.defaultLinkTarget)&&n.attr("target",e.target||a.o.defaultLinkTarget),a.range.deleteContents(),a.range.insertNode(n[0]),a.syncCode(),a.$c.trigger("tbwchange"),!0}))},prependUrlPrefix:function(e){if(!this.urlPrefix)return e;if(/^([a-z][-+.a-z0-9]*:|\/|#)/i.test(e))return e;return/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e)?"mailto:"+e:this.urlPrefix+e},unlink:function(){var e=this,t=e.doc.getSelection(),n=t.focusNode;if(t.isCollapsed){for(;["A","DIV"].indexOf(n.nodeName)<0;)n=n.parentNode;if(n&&"A"===n.nodeName){var o=e.doc.createRange();o.selectNode(n),t.removeAllRanges(),t.addRange(o)}}e.execCmd("unlink",void 0,void 0,!0)},insertImage:function(){var e=this;e.saveRange();var t={url:{label:"URL",required:!0},alt:{label:e.lang.description,value:e.getRangeText()}};e.o.imageWidthModalEdit&&(t.width={}),e.openModalInsert(e.lang.insertImage,t,(function(t){e.execCmd("insertImage",t.url,!1,!0);var n=o('img[src="'+t.url+'"]:not([alt])',e.$box);return n.attr("alt",t.alt),e.o.imageWidthModalEdit&&n.attr({width:t.width}),e.syncCode(),e.$c.trigger("tbwchange"),!0}))},fullscreen:function(){var e,n=this,a=n.o.prefix,r=a+"fullscreen",i=r+"-placeholder",s=n.$box.outerHeight();n.$box.toggleClass(r),(e=n.$box.hasClass(r))?n.$box.before(o("<div/>",{class:i}).css({height:s})):o("."+i).remove(),o("body").toggleClass(a+"body-fullscreen",e),o(t).trigger("scroll"),n.$c.trigger("tbw"+(e?"open":"close")+"fullscreen")},execCmd:function(e,t,n,o){var a=this;o=!!o||"","dropdown"!==e&&a.$ed.focus();try{a.doc.execCommand("styleWithCSS",!1,n||!1)}catch(e){}try{a[e+o](t)}catch(n){try{e(t)}catch(n){"insertHorizontalRule"===e?t=void 0:"formatBlock"===e&&a.isIE&&(t="<"+t+">"),a.doc.execCommand(e,!1,t),a.syncCode(),a.semanticCode(!1,!0)}"dropdown"!==e&&(a.updateButtonPaneStatus(),a.$c.trigger("tbwchange"))}},openModal:function(e,n,a){var r=this,i=r.o.prefix;if(a=!1!==a,o("."+i+"modal-box",r.$box).length>0)return!1;r.o.autogrowOnEnter&&(r.autogrowOnEnterDontClose=!0),r.saveRange(),r.showOverlay(),r.$btnPane.addClass(i+"disable");var s,l=o("<div/>",{class:i+"modal "+i+"fixed-top"}).css({top:r.$box.offset().top+r.$btnPane.height(),zIndex:99999}).appendTo(o(r.doc.body));r.$overlay.one("click",(function(){return l.trigger("tbwcancel"),!1})),s=a?o("<form/>",{action:"",html:n}).on("submit",(function(){return l.trigger("tbwconfirm"),!1})).on("reset",(function(){return l.trigger("tbwcancel"),!1})).on("submit reset",(function(){r.o.autogrowOnEnter&&(r.autogrowOnEnterDontClose=!1)})):n;var d=o("<div/>",{class:i+"modal-box",html:s}).css({top:"-"+r.$btnPane.outerHeight(),opacity:0,paddingBottom:a?null:"5%"}).appendTo(l).animate({top:0,opacity:1},100);return e&&o("<span/>",{text:e,class:i+"modal-title"}).prependTo(d),a&&(o("input:first",d).focus(),r.buildModalBtn("submit",d),r.buildModalBtn("reset",d),l.height(d.outerHeight()+10)),o(t).trigger("scroll"),r.$c.trigger("tbwmodalopen"),l},buildModalBtn:function(e,t){var n=this.o.prefix;return o("<button/>",{class:n+"modal-button "+n+"modal-"+e,type:e,text:this.lang[e]||e}).appendTo(o("form",t))},closeModal:function(){var e=this,t=e.o.prefix;e.$btnPane.removeClass(t+"disable"),e.$overlay.off();var n=o("."+t+"modal-box",o(e.doc.body));n.animate({top:"-"+n.height()},100,(function(){n.parent().remove(),e.hideOverlay(),e.$c.trigger("tbwmodalclose")})),e.restoreRange()},openModalInsert:function(e,t,n){var a=this,r=a.o.prefix,i=a.lang,s="";return o.each(t,(function(e,t){var n=t.label||e,o=t.name||e,a=t.attributes||{},l=Object.keys(a).map((function(e){return e+'="'+a[e]+'"'})).join(" ");s+='<label><input type="'+(t.type||"text")+'" name="'+o+'"'+("checkbox"===t.type&&t.value?' checked="checked"':' value="'+(t.value||"").replace(/"/g,"&quot;"))+'"'+l+'><span class="'+r+'input-infos"><span>'+(i[n]?i[n]:n)+"</span></span></label>"})),a.openModal(e,s).on("tbwconfirm",(function(){var e=o("form",o(this)),r=!0,i={};o.each(t,(function(t,n){var s=n.name||t,l=o('input[name="'+s+'"]',e);switch(l.attr("type").toLowerCase()){case"checkbox":i[s]=l.is(":checked");break;case"radio":i[s]=l.filter(":checked").val();break;default:i[s]=o.trim(l.val())}n.required&&""===i[s]?(r=!1,a.addErrorOnModalField(l,a.lang.required)):n.pattern&&!n.pattern.test(i[s])&&(r=!1,a.addErrorOnModalField(l,n.patternError))})),r&&(a.restoreRange(),n(i,t)&&(a.syncCode(),a.$c.trigger("tbwchange"),a.closeModal(),o(this).off("tbwconfirm")))})).one("tbwcancel",(function(){o(this).off("tbwconfirm"),a.closeModal()}))},addErrorOnModalField:function(e,t){var n=this.o.prefix,a=n+"msg-error",r=e.parent();e.on("change keyup",(function(){r.removeClass(n+"input-error"),setTimeout((function(){r.find("."+a).remove()}),150)})),r.addClass(n+"input-error").find("input+span").append(o("<span/>",{class:a,text:t}))},getDefaultImgDblClickHandler:function(){var e=this;return function(){var t=o(this),n=t.attr("src");0===n.indexOf("data:image")&&(n="(Base64)");var a={url:{label:"URL",value:n,required:!0},alt:{label:e.lang.description,value:t.attr("alt")}};return e.o.imageWidthModalEdit&&(a.width={value:t.attr("width")?t.attr("width"):""}),e.openModalInsert(e.lang.insertImage,a,(function(n){return"(Base64)"!==n.url&&t.attr({src:n.url}),t.attr({alt:n.alt}),e.o.imageWidthModalEdit&&(parseInt(n.width)>0?t.attr({width:n.width}):t.removeAttr("width")),!0})),!1}},saveRange:function(){var e=this,t=e.doc.getSelection();if(e.range=null,t&&t.rangeCount){var n,o=e.range=t.getRangeAt(0),a=e.doc.createRange();a.selectNodeContents(e.$ed[0]),a.setEnd(o.startContainer,o.startOffset),n=(a+"").length,e.metaRange={start:n,end:n+(o+"").length}}},restoreRange:function(){var e,t=this,n=t.metaRange,o=t.range,a=t.doc.getSelection();if(o){if(n&&n.start!==n.end){var r,i=0,s=[t.$ed[0]],l=!1,d=!1;for(e=t.doc.createRange();!d&&(r=s.pop());)if(3===r.nodeType){var c=i+r.length;!l&&n.start>=i&&n.start<=c&&(e.setStart(r,n.start-i),l=!0),l&&n.end>=i&&n.end<=c&&(e.setEnd(r,n.end-i),d=!0),i=c}else for(var u=r.childNodes,g=u.length;g>0;)g-=1,s.push(u[g])}try{a.removeAllRanges()}catch(e){}a.addRange(e||o)}},getRangeText:function(){return this.range+""},clearButtonPaneStatus:function(){var e=this,t=e.o.prefix,n=t+"active-button "+t+"active",a=t+"original-icon";o("."+t+"active-button",e.$btnPane).removeClass(n),o("."+a,e.$btnPane).each((function(){o(this).find("svg use").attr("xlink:href",o(this).data(a))}))},updateButtonPaneStatus:function(){var e=this,t=e.o.prefix,n=t+"active-button "+t+"active",a=t+"original-icon",r=e.getTagsRecursive(e.doc.getSelection().focusNode);e.clearButtonPaneStatus(),o.each(r,(function(r,i){var s=e.tagToButton[i.toLowerCase()],l=o("."+t+s+"-button",e.$btnPane);if(l.length>0)l.addClass(n);else try{var d=(l=o("."+t+"dropdown ."+t+s+"-dropdown-button",e.$box)).find("svg use"),c=l.parent().data(t+"dropdown"),u=o("."+t+c+"-button",e.$box),g=u.find("svg use");u.addClass(n),e.o.changeActiveDropdownIcon&&d.length>0&&(u.addClass(a).data(a,g.attr("xlink:href")),g.attr("xlink:href",d.attr("xlink:href")))}catch(e){}}))},getTagsRecursive:function(e,t){var n=this;if(t=t||(e&&e.tagName?[e.tagName]:[]),!e||!e.parentNode)return t;var a=(e=e.parentNode).tagName;return"DIV"===a?t:("P"===a&&""!==e.style.textAlign&&t.push(e.style.textAlign),o.each(n.tagHandlers,(function(o,a){t=t.concat(a(e,n))})),t.push(a),n.getTagsRecursive(e,t).filter((function(e){return null!=e})))},initPlugins:function(){var e=this;e.loadedPlugins=[],o.each(o.trumbowyg.plugins,(function(t,n){n.shouldInit&&!n.shouldInit(e)||(n.init(e),n.tagHandler&&e.tagHandlers.push(n.tagHandler),e.loadedPlugins.push(n))}))},destroyPlugins:function(){var e=this;o.each(this.loadedPlugins,(function(t,n){n.destroy&&n.destroy(e)}))}}}(navigator,window,document,jQuery)},v0lo:function(e,t,n){"use strict";n.r(t);n("oBpX");$(".trumbowyg-form").trumbowyg({svgPath:"/js/ui/icons.svg"}),$("#sidenavToggler").click((function(e){e.preventDefault(),$("body").toggleClass("sidenav-toggled")})),$('.navbar-sidenav [data-toggle="tooltip"]').tooltip({template:'<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'})}});