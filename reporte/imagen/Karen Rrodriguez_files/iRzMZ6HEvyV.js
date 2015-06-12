/*!CK:3773839467!*//*1433188951,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["mGioz"]); }

__d("legacy:MetaComposerMessageBox",["MetaComposerMessageBox"],function(a,b,c,d){b.__markCompiled&&b.__markCompiled();a.MetaComposerMessageBox=b('MetaComposerMessageBox');},3);
__d("EgoSectionExpander",["Animation","Arbiter","CSS","DOM"],function(a,b,c,d,e,f,g,h,i,j){b.__markCompiled&&b.__markCompiled();e.exports={expand:function(k,l){if(!k)return;var m=j.scry(k,'^.ego_section');if(!l||!m.length||i.hasClass(m[0],'ego_section_expanded'))return;m=m[0];i.addClass(m,'ego_section_expanded');g.appendInsert(m.lastChild,l);h.inform('netego_sectionExpanded');}};},null);