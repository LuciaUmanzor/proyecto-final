/*!CK:226388902!*//*1433198971,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["YzabM"]); }

__d("ChatSidebarOptionsListener",["Arbiter","ChatOptions","ChatSidebarActions","ChatSidebarStore"],function(a,b,c,d,e,f,g,h,i,j){b.__markCompiled&&b.__markCompiled();'use strict';var k={listen:function(){g.subscribe('chat/option-changed',function(l,m){if(m.name==='sidebar_mode'){var n=!!h.getSetting('sidebar_mode');if(n===j.getState().enabled)return;if(n){i.enable();}else i.disable();}});}};e.exports=k;},null);