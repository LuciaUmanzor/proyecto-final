/*!CK:1336256512!*//*1433188946,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["vYhQy"]); }

__d("legacy:dom-html",["HTML"],function(a,b,c,d){b.__markCompiled&&b.__markCompiled();a.HTML=b('HTML');},3);
__d("PluginOverflowItems",["CSS","Style","createArrayFromMixed"],function(a,b,c,d,e,f,g,h,i){b.__markCompiled&&b.__markCompiled();var j={adjust:function(k){setTimeout(function(){var l=k.parentNode.offsetHeight-2;i(k.parentNode.childNodes).forEach(function(n){if(n!==k)l-=n.offsetHeight;});h.apply(k,{height:l+'px',overflow:'hidden'});var m=0;i(k.childNodes).forEach(function(n){g.show(n);m+=n.offsetHeight+(parseInt(h.get(n,'margin-top'),10)||0)+(parseInt(h.get(n,'margin-bottom'),10)||0);if(m>l)g.hide(n);});},0);}};e.exports=j;},null);