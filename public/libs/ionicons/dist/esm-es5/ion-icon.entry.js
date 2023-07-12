import{r as registerInstance,h,H as Host,a as getElement}from"./index-f392fe63.js";import{i as isStr,g as getUrl,b as getName}from"./utils-b4648582.js";var validateContent=function(o){var e=document.createElement("div");e.innerHTML=o;for(var t=e.childNodes.length-1;t>=0;t--){if(e.childNodes[t].nodeName.toLowerCase()!=="svg"){e.removeChild(e.childNodes[t])}}var i=e.firstElementChild;if(i&&i.nodeName.toLowerCase()==="svg"){var n=i.getAttribute("class")||"";i.setAttribute("class",(n+" s-ion-icon").trim());if(isValid(i)){return e.innerHTML}}return""};var isValid=function(o){if(o.nodeType===1){if(o.nodeName.toLowerCase()==="script"){return false}for(var e=0;e<o.attributes.length;e++){var t=o.attributes[e].value;if(isStr(t)&&t.toLowerCase().indexOf("on")===0){return false}}for(var e=0;e<o.childNodes.length;e++){if(!isValid(o.childNodes[e])){return false}}}return true};var ioniconContent=new Map;var requests=new Map;var getSvgContent=function(o,e){var t=requests.get(o);if(!t){if(typeof fetch!=="undefined"&&typeof document!=="undefined"){t=fetch(o).then((function(t){if(t.ok){return t.text().then((function(t){if(t&&e!==false){t=validateContent(t)}ioniconContent.set(o,t||"")}))}ioniconContent.set(o,"")}));requests.set(o,t)}else{ioniconContent.set(o,"");return Promise.resolve()}}return t};var iconCss=":host{display:inline-block;width:1em;height:1em;contain:strict;fill:currentColor;-webkit-box-sizing:content-box !important;box-sizing:content-box !important}:host .ionicon{stroke:currentColor}.ionicon-fill-none{fill:none}.ionicon-stroke-width{stroke-width:32px;stroke-width:var(--ionicon-stroke-width, 32px)}.icon-inner,.ionicon,svg{display:block;height:100%;width:100%}:host(.flip-rtl) .icon-inner{-webkit-transform:scaleX(-1);transform:scaleX(-1)}:host(.icon-small){font-size:18px !important}:host(.icon-large){font-size:32px !important}:host(.ion-color){color:var(--ion-color-base) !important}:host(.ion-color-primary){--ion-color-base:var(--ion-color-primary, #3880ff)}:host(.ion-color-secondary){--ion-color-base:var(--ion-color-secondary, #0cd1e8)}:host(.ion-color-tertiary){--ion-color-base:var(--ion-color-tertiary, #f4a942)}:host(.ion-color-success){--ion-color-base:var(--ion-color-success, #10dc60)}:host(.ion-color-warning){--ion-color-base:var(--ion-color-warning, #ffce00)}:host(.ion-color-danger){--ion-color-base:var(--ion-color-danger, #f14141)}:host(.ion-color-light){--ion-color-base:var(--ion-color-light, #f4f5f8)}:host(.ion-color-medium){--ion-color-base:var(--ion-color-medium, #989aa2)}:host(.ion-color-dark){--ion-color-base:var(--ion-color-dark, #222428)}";var Icon=function(){function o(o){registerInstance(this,o);this.iconName=null;this.isVisible=false;this.mode=getIonMode();this.lazy=false;this.sanitize=true}o.prototype.connectedCallback=function(){var o=this;this.waitUntilVisible(this.el,"50px",(function(){o.isVisible=true;o.loadIcon()}))};o.prototype.disconnectedCallback=function(){if(this.io){this.io.disconnect();this.io=undefined}};o.prototype.waitUntilVisible=function(o,e,t){var i=this;if(this.lazy&&typeof window!=="undefined"&&window.IntersectionObserver){var n=this.io=new window.IntersectionObserver((function(o){if(o[0].isIntersecting){n.disconnect();i.io=undefined;t()}}),{rootMargin:e});n.observe(o)}else{t()}};o.prototype.loadIcon=function(){var o=this;if(this.isVisible){var e=getUrl(this);if(e){if(ioniconContent.has(e)){this.svgContent=ioniconContent.get(e)}else{getSvgContent(e,this.sanitize).then((function(){return o.svgContent=ioniconContent.get(e)}))}}}var t=this.iconName=getName(this.name,this.icon,this.mode,this.ios,this.md);if(!this.ariaLabel&&this.ariaHidden!=="true"){if(t){this.ariaLabel=t.replace(/\-/g," ")}}};o.prototype.render=function(){var o,e;var t=this.iconName;var i=this.mode||"md";var n=this.flipRtl||t&&(t.indexOf("arrow")>-1||t.indexOf("chevron")>-1)&&this.flipRtl!==false;return h(Host,{role:"img",class:Object.assign(Object.assign((o={},o[i]=true,o),createColorClasses(this.color)),(e={},e["icon-"+this.size]=!!this.size,e["flip-rtl"]=!!n&&this.el.ownerDocument.dir==="rtl",e))},this.svgContent?h("div",{class:"icon-inner",innerHTML:this.svgContent}):h("div",{class:"icon-inner"}))};Object.defineProperty(o,"assetsDirs",{get:function(){return["svg"]},enumerable:false,configurable:true});Object.defineProperty(o.prototype,"el",{get:function(){return getElement(this)},enumerable:false,configurable:true});Object.defineProperty(o,"watchers",{get:function(){return{name:["loadIcon"],src:["loadIcon"],icon:["loadIcon"]}},enumerable:false,configurable:true});return o}();var getIonMode=function(){return typeof document!=="undefined"&&document.documentElement.getAttribute("mode")||"md"};var createColorClasses=function(o){var e;return o?(e={"ion-color":true},e["ion-color-"+o]=true,e):null};Icon.style=iconCss;export{Icon as ion_icon};