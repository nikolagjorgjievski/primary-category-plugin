!function(t){var e={};function r(n){if(e[n])return e[n].exports;var o=e[n]={i:n,l:!1,exports:{}};return t[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=t,r.c=e,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{configurable:!1,enumerable:!0,get:n})},r.r=function(t){Object.defineProperty(t,"__esModule",{value:!0})},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="",r(r.s=9)}([function(t,e){!function(){t.exports=this.wp.element}()},function(t,e){!function(){t.exports=this.wp.data}()},function(t,e){!function(){t.exports=this.wp.i18n}()},function(t,e,r){var n=r(8),o=r(7),i=r(6);t.exports=function(t){return n(t)||o(t)||i()}},function(t,e){!function(){t.exports=this.wp.components}()},function(t,e){!function(){t.exports=this.wp.plugins}()},function(t,e){t.exports=function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}},function(t,e){t.exports=function(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}},function(t,e){t.exports=function(t){if(Array.isArray(t)){for(var e=0,r=new Array(t.length);e<t.length;e++)r[e]=t[e];return r}}},function(t,e,r){"use strict";r.r(e);var n=r(3),o=r.n(n),i=r(0),c=r(5),a=r(2),u=r(4),l=r(1),s=wp.editPost.PluginDocumentSettingPanel,p=function(t){var e=[{value:null,label:Object(a.__)("Select primary category:")}];if(t.categories){var r=t.categories.map(function(t){return{value:t.id,label:t.name}});e=[].concat(o()(e),o()(r))}return Object(i.createElement)(i.Fragment,null,Object(i.createElement)(u.SelectControl,{label:Object(a.__)("Select primary category:"),value:t.selectedPrimaryCategoryId,onChange:function(e){return t.onMetaFieldChange(e)},options:e}))};p=Object(l.withSelect)(function(t){return{selectedPrimaryCategoryId:t("core/editor").getEditedPostAttribute("meta")._primary_category_id,categories:t("core").getEntityRecords("taxonomy","category",{per_page:-1,orderby:"name",status:"publish"})}})(p),p=Object(l.withDispatch)(function(t){return{onMetaFieldChange:function(e){t("core/editor").editPost({meta:{_primary_category_id:e}})}}})(p);Object(c.registerPlugin)("primary-category-setting-panel",{render:function(){return Object(i.createElement)(s,{name:"primary-category",title:"Primary Category",className:"primary-category"},Object(i.createElement)(p,null))},icon:""})}]);