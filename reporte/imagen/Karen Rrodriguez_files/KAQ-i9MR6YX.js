/*!CK:1790080929!*//*1430736527,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["EKXdB"]); }

__d("rayInterceptsBox",["invariant"],function(a,b,c,d,e,f,g){b.__markCompiled&&b.__markCompiled();function h(j,k){var l=Object.keys(j);k.forEach(function(m){g(l.indexOf(m)!==-1);g(typeof j[m]==='number');});}var i={check:function(j,k){h(j,['minX','maxX','minY','maxY']);h(k,['x','y','dx','dy']);g(j.maxX>j.minX&&j.maxY>j.minY);if(k.dx===0&&k.dy===0)return false;if(k.x>=j.minX&&k.x<=j.maxX&&k.y>=j.minY&&k.y<=j.maxY)return true;var l=(j.minX-k.x)/k.dx,m=(j.maxX-k.x)/k.dx,n=(j.minY-k.y)/k.dy,o=(j.maxY-k.y)/k.dy,p=Math.max(Math.min(l,m),Math.min(n,o)),q=Math.min(Math.max(l,m),Math.max(n,o));if(p<0)return false;if(p>q)return false;return true;}};e.exports=i;},null);
__d("AdsMouseStateStore",["Arbiter","DOM","Event","Vector","$","copyProperties","invariant","keyMirror","rayInterceptsBox","throttle"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p){b.__markCompiled&&b.__markCompiled();'use strict';var q=30,r=500,s=n({STATIONARY:null,INTENT:null,HOVER:null,NO_INTENT:null}),t,u,v,w,x;function y(){t=s.STATIONARY;u=0;v=0;w=Date.now();x='pagelet_ego_pane';}y();function z(event){try{return {x:event.clientX||event.x,y:event.clientY||event.y};}catch(ba){var ca=Math.random()*1000;return {x:ca,y:ca};}}var aa=l(new g(),{getState:function(){return t;},updateRhcID:function(ba){m(k(ba));x=ba;},getRhcID:function(){return x;},onPageTransition:function(event){y();},onMouseMove:function(event){this.calculateState(z(event));},__updateMousePos:function(ba){u=ba.x;v=ba.y;},isRhcPresent:function(){if(!h.scry(document.body,'#'+x).length)return false;var ba=this.getRhcDimensions();return (ba.y>0&&ba.x>0);},getRhc:function(){return k(x);},getRhcPosition:function(){return j.getElementPosition(this.getRhc());},getRhcScreenPos:function(){var ba=j.getScrollPosition(),ca=this.getRhcPosition();return {x:ca.x-ba.x,y:ca.y-ba.y};},getRhcDimensions:function(){return j.getElementDimensions(this.getRhc());},getRhcBoundingBox:function(){var ba=this.getRhcDimensions(),ca=this.getRhcScreenPos();return {minX:ca.x,maxX:ca.x+ba.x,minY:ca.y,maxY:ca.y+ba.y};},isPosContainedInRhc:function(ba){var ca=this.getRhcBoundingBox();return (ba.x>=ca.minX&&ba.x<=ca.maxX&&ba.y>=ca.minY&&ba.y<=ca.maxY);},hasMovedMinDistance:function(ba){var ca=ba.x-u,da=ba.y-v;return (ca*ca+da*da)>=q*q;},tooSoon:function(){return Date.now()-w<r;},_updateTime:function(){w=Date.now();},calculateState:function(ba){if(this.tooSoon())return;this._updateTime();if(!this.isRhcPresent())return;if(this.isPosContainedInRhc(ba)){this.transitionToState(s.HOVER);this.__updateMousePos(ba);this.scheduleCheckup();return;}else if(!this.hasMovedMinDistance(ba)){this.transitionToState(s.STATIONARY);return;}var ca=(this.isMovingTowardsRhc(ba))?s.INTENT:s.NO_INTENT;this.transitionToState(ca);this.__updateMousePos(ba);this.scheduleCheckup();},isMovingTowardsRhc:function(ba){var ca={x:u,y:v};if(this.isPosContainedInRhc(ca))return true;var da=this.getRhcBoundingBox(),ea={x:u,y:v,dx:ba.x-u,dy:ba.y-v};return o.check(da,ea);},scheduleCheckup:function(){var ba={x:u,y:v};setTimeout(function(){this.calculateState(ba);}.bind(this),r*1.5);},transitionToState:function(ba){if(ba===t)return;t=ba;aa.inform('change');}});i.listen(document,'mousemove',p(aa.onMouseMove.bind(aa),r));g.subscribe('page_transition',aa.onPageTransition);aa.STATES=s;aa.MIN_MOVE_DISTANCE=q;aa.THROTTLE_TIME=r;e.exports=aa;},null);
__d("AdsPagerConstants",["keyMirror"],function(a,b,c,d,e,f,g){b.__markCompiled&&b.__markCompiled();var h=g({ADD_PAGE:null,PAGE_TRANSITION:null,REQUEST_PAGE:null}),i=g({VIEW_ACTION:null,SERVER_ACTION:null});e.exports={ActionTypes:h,PayloadSources:i};},null);
__d("AdsPagerDispatcher",["AdsPagerConstants","Dispatcher","copyProperties"],function(a,b,c,d,e,f,g,h,i){b.__markCompiled&&b.__markCompiled();'use strict';var j=g.PayloadSources;function k(m){return function(n){this.dispatch({payloadSource:m,action:n});};}var l=i(new h(),{handleUpdateFromViewAction:k(j.VIEW_ACTION),handleUpdateFromServerAction:k(j.SERVER_ACTION)});e.exports=l;},null);
__d("AdsRefreshHandler",["AdsMouseStateStore","AdsPagerDispatcher","AdsPagerConstants","Arbiter","Animation","DOM","Event","SubscriptionsHandler","UIPagelet","csx","debounceAcrossTransitions","mergeObjects"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r){b.__markCompiled&&b.__markCompiled();var s=g.STATES,t=600;function u(v,w,x){"use strict";if(!x.data||!x.pid)return;this.$AdsRefreshHandler0=v;this.$AdsRefreshHandler1=Date.now();this.$AdsRefreshHandler2=w;this.$AdsRefreshHandler3=x;this.$AdsRefreshHandler4=0;this.$AdsRefreshHandler5=false;this.$AdsRefreshHandler6=true;this.$AdsRefreshHandler7=q(this.reloadAdsIfNeeded.bind(this),this.$AdsRefreshHandler2.delay);this.$AdsRefreshHandler8=new n();this.$AdsRefreshHandler8.addSubscriptions(m.listen(this.$AdsRefreshHandler0,'mouseenter',this.setMouseOver.bind(this,true)),m.listen(this.$AdsRefreshHandler0,'mouseleave',this.setMouseOver.bind(this,false)),g.subscribe('change',this.onMouseStateStoreChange.bind(this)),j.subscribe('AdsPreferencesDialog/opened',this.stopRefreshingRHC.bind(this)),j.subscribe('AdsPreferencesDialog/closed',this.startRefreshingRHC.bind(this)));h.register(this.handlePageDispatch.bind(this));}u.prototype.handlePageDispatch=function(v){"use strict";var w=v.action||{};if(w.actionType===i.ActionTypes.REQUEST_PAGE)this.reloadAds();};u.prototype.setMouseOver=function(v){"use strict";this.$AdsRefreshHandler9=v;};u.prototype.subscribeDefaultEventsForRefresh=function(){"use strict";this.$AdsRefreshHandler8.addSubscriptions(m.listen(window,'scroll',this.$AdsRefreshHandler7),m.listen(window,'resize',this.$AdsRefreshHandler7));return this;};u.prototype.reloadWithDebounce=function(){"use strict";this.$AdsRefreshHandler7();};u.prototype.reloadWithoutDebounce=function(){"use strict";this.reloadAdsIfNeeded();};u.prototype.stopRefreshingRHC=function(v,w){"use strict";this.$AdsRefreshHandler6=false;};u.prototype.startRefreshingRHC=function(v,w){"use strict";this.$AdsRefreshHandler1=Date.now();this.$AdsRefreshHandler6=true;};u.prototype.forceLoadIfEnoughTimePassed=function(v){"use strict";if(Date.now()-this.$AdsRefreshHandler1>v)this.reloadAds();};u.prototype.containsPremium=function(){"use strict";var v=l.scry(this.$AdsRefreshHandler0,"div._4u8");return !!v.filter(function(w){return JSON.parse(w.getAttribute('data-ad')).segment==='premium';}).length;};u.prototype.reloadAdsIfNeeded=function(){"use strict";if(!this.$AdsRefreshHandler0)return;j.inform('AdsRefreshHandler/CheckingReload');if(this.$AdsRefreshHandler2.stateRefresh){this.reloadAdsIfNeededStateBased();return;}if(this.containsPremium()||this.$AdsRefreshHandler9||!this.$AdsRefreshHandler2.interval)return;if(Date.now()-this.$AdsRefreshHandler1>=this.$AdsRefreshHandler2.interval)this.reloadAds();};u.prototype.reloadAdsIfNeededStateBased=function(){"use strict";if(Date.now()-this.$AdsRefreshHandler1<this.$AdsRefreshHandler2.interval)return;if(this.containsPremium())return;if(!this.$AdsRefreshHandler2.interval)return;this.$AdsRefreshHandler5=true;j.inform('AdsRefreshHandler/RefreshScheduled');this.checkScheduledRefresh();};u.prototype.getRefreshScheduled=function(){"use strict";return this.$AdsRefreshHandler5;};u.prototype.onMouseStateStoreChange=function(){"use strict";this.checkScheduledRefresh();};u.prototype.checkScheduledRefresh=function(){"use strict";if(!this.$AdsRefreshHandler5)return;if(this.$AdsRefreshHandler9)return;var v=g.getState(),w=false;switch(v){case s.HOVER:case s.NO_INTENT:w=true;break;default:break;}if(!w)return;this.$AdsRefreshHandler5=false;this.reloadAds();};u.prototype.reloadAds=function(){"use strict";if(!this.$AdsRefreshHandler0)return;this.$AdsRefreshHandler1=Date.now();if(!this.$AdsRefreshHandler6)return;var v=this.$AdsRefreshHandler3&&this.$AdsRefreshHandler3.data,w=r(v,{refresh_num:++this.$AdsRefreshHandler4});o.loadFromEndpoint('WebEgoPane',this.$AdsRefreshHandler0,{dom_id:l.getID(this.$AdsRefreshHandler0),pid:this.$AdsRefreshHandler3.pid,data:w},{bundle:false,handler:this.onLoadHandler.bind(this)});j.inform('AdsRefreshHandler/AdsLoading');};u.prototype.onLoadHandler=function(){"use strict";j.inform('AdsRefreshHandler/AdsLoaded');if(!this.$AdsRefreshHandler2.fade)return;(new k(this.$AdsRefreshHandler0)).from('opacity',0).to('opacity',1).duration(t).go();};u.prototype.cleanup=function(){"use strict";this.$AdsRefreshHandler0=null;this.$AdsRefreshHandler8.release();this.$AdsRefreshHandler7.reset();};e.exports=u;},null);
__d("EgoAdsObjectSet",["DOM","csx"],function(a,b,c,d,e,f,g,h){b.__markCompiled&&b.__markCompiled();function i(){"use strict";this._allEgoUnits=[];this._egoUnits=[];}i.prototype.init=function(k){"use strict";this._allEgoUnits=k;this._egoUnits=[];this._allEgoUnits.forEach(function(l){var m=j(l);if(!m||!m.holdout)this._egoUnits.push(l);},this);};i.prototype.getCount=function(){"use strict";return this._egoUnits.length;};i.prototype.forEach=function(k,l){"use strict";this._egoUnits.forEach(k,l);};i.prototype.getUnit=function(k){"use strict";return this._egoUnits[k];};i.prototype.getHoldoutAdIDsForSpace=function(k,l){"use strict";if(!k||!l)return [];var m=[];for(var n=0;k>0&&n<this._allEgoUnits.length;n++){var o=this._allEgoUnits[n],p=l(o),q=j(o);if(k>=p&&q&&q.holdout)m.push(q.adid);k-=p;}return m;};i.prototype.getHoldoutAdIDsForNumAds=function(k){"use strict";k=Math.min(k,this._allEgoUnits.length);var l=[];for(var m=0;m<k;m++){var n=this._allEgoUnits[m],o=j(n);if(o&&o.holdout)l.push(o.adid);}return l;};function j(k){var l=g.scry(k,"div._4u8")[0],m=l&&l.getAttribute('data-ad');return m&&JSON.parse(m)||(void 0);}e.exports=i;},null);
__d("HomeRHCAdsBasicRefresh",["AdsRefreshHandler","Arbiter","NavigationMessage","Run","SubscriptionsHandler","ge"],function(a,b,c,d,e,f,g,h,i,j,k,l){b.__markCompiled&&b.__markCompiled();var m,n,o,p;function q(){if(m){m.cleanup();m=null;}if(n){n.release();n=null;}o=null;}function r(){var u=l(p);if(u&&o){u.appendChild(o);o=null;}}function s(u,v){o=v;m&&m.forceLoadIfEnoughTimePassed(0);}var t={init:function(u,v,w){p=u;m=new g(l(u),v,w).subscribeDefaultEventsForRefresh();n=new k();n.addSubscriptions(h.subscribe(i.NAVIGATION_BEGIN,q),h.subscribe('ProfileQuestionAnswered',s),h.subscribe('AdsRefreshHandler/AdsLoaded',r));j.onLeave(q);}};e.exports=t;},null);
__d("AsyncLayout",["AjaxPipeRequest","Arbiter","AsyncRequest","AsyncResponse","CSS","DOM","HTML","NavigationMessage","PageTransitions","URI","$","emptyFunction","ge","goURI"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t){b.__markCompiled&&b.__markCompiled();function u(v){"use strict";this.canvasID=v;if(s('rightCol'))this.auxiliaryID='rightCol';if(s('headerArea'))this.headerID='headerArea';if(s('toolbarContainer'))this.toolbarID='toolbarContainer';this.waitingForAux=false;o.registerHandler(this.catchPageTransition.bind(this));this.subscription=h.subscribe(n.NAVIGATION_BEGIN,this.onNavigate.bind(this));h.inform('AsyncLayout/initialized',null,h.BEHAVIOR_STATE);}u.prototype.catchPageTransition=function(v){"use strict";this.subscription.unsubscribe();return false;};u.prototype.getCanvasID=function(v){"use strict";return v.sidecol?'contentCol':'contentArea';};u.prototype.onNavigate=function(v,w){"use strict";var x=w.useAjaxPipe;w=w.params;if(w.endpoint){if(this.request){this.request.setFinallyHandler(r);this.request.abort();}if(this.sideRequest)this.sideRequest.abort();if(x){this.request=new g().setURI(w.endpoint).setData(w).setCanvasId(this.getCanvasID(w)).setFinallyHandler(this.finallyHandler.bind(this)).setErrorHandler(this.errorHandler.bind(this)).setFirstResponseCallback(this.firstResponseCallback.bind(this)).send();}else{w.handled=true;this.waitingForAux=w.sidecol;var y=!!w.iframe,z=new i().setOption('useIframeTransport',y).setURI(new p(w.endpoint)).setReadOnly(true).setMethod('GET').setData(w).setHandler(this.onResponse.bind(this)).setErrorHandler(this.errorHandler.bind(this)).setFinallyHandler(this.finallyHandler.bind(this));this.request=z;z.send();}}};u.prototype.onSideResponse=function(v){"use strict";var w=v.getPayload();if(w&&this.auxiliaryID)this.receivedAux(w);};u.prototype.receivedAux=function(v){"use strict";!this.waitingForAux;this.waitingForAux=false;l.setContent(q(this.auxiliaryID),m(v));};u.prototype.onResponse=function(v){"use strict";var w=v.getPayload();if(w.redirect){t(w.redirect);}else{var x=w.html||w;l.setContent(q(this.canvasID),m(x));if(w.side_html&&this.auxiliaryID)this.receivedAux(w.side_html);if(this.headerID&&!w.keep_header){var y=q(this.headerID);l.setContent(y,m(w.header_html||''));k.conditionShow(y,w.header_html);}if(w.toolbar_html&&this.toolbarID)l.setContent(q(this.toolbarID),m(w.toolbar_html));if(w.js)(new Function(w.js))();k.conditionClass('contentCol','hasRightCol',this.auxiliaryID&&!w.noRightSide);var z=s('rightCol');if(z&&w.noRightSide)l.empty(z);}var aa=v.getRequest().getData();h.inform(n.NAVIGATION_COMPLETED,aa.key);};u.prototype.errorHandler=function(v){"use strict";j.verboseErrorHandler(v);h.inform(n.NAVIGATION_FAILED);this.request=null;};u.prototype.firstResponseCallback=function(v){"use strict";window.scrollTo(0,0);h.inform(n.NAVIGATION_FIRST_RESPONSE);};u.prototype.finallyHandler=function(v){"use strict";this.request=null;o.transitionComplete(true);h.inform(n.NAVIGATION_COMPLETED);};e.exports=u;},null);
__d("DirectionalDockingElement",["ArbiterMixin","CSS","DOM","DOMDimensions","Event","Run","Scroll","Style","SubscriptionsHandler","ViewportBounds","getElementPosition","mixin","queryThenMutateDOM","removeFromArray"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t){b.__markCompiled&&b.__markCompiled();var u,v=[],w=true,x=false,y='unfixed',z='fixed_top',aa='fixed_middle',ba=r(g);for(var ca in ba)if(ba.hasOwnProperty(ca))ea[ca]=ba[ca];var da=ba===null?null:ba.prototype;ea.prototype=Object.create(da);ea.prototype.constructor=ea;ea.__superConstructor__=ba;function ea(fa){"use strict";this.$DirectionalDockingElement0=fa;this.$DirectionalDockingElement1=0;if(!u){var ga=s.bind(null,function(){for(var ha=0,ia=v.length;ha<ia;ha++)v[ha].$DirectionalDockingElement2();},function(){for(var ha=0,ia=v.length;ha<ia;ha++)v[ha].$DirectionalDockingElement3();},'DirectionalDockingElement');u=new o();u.addSubscriptions(k.listen(window,'scroll',ga),k.listen(window,'resize',ga));l.onLeave(function(){while(v.length)v.pop().destroy();u.release();u=null;});}v.push(this);this.$DirectionalDockingElement4=p.getTop();this.$DirectionalDockingElement5=z;n.set(this.$DirectionalDockingElement0,'width',j.getElementDimensions(this.$DirectionalDockingElement0).width+'px');this.$DirectionalDockingElement6=i.create('div');n.set(this.$DirectionalDockingElement6,'position','relative');i.replace(this.$DirectionalDockingElement0,this.$DirectionalDockingElement6);i.appendContent(this.$DirectionalDockingElement6,this.$DirectionalDockingElement0);this.update();}ea.prototype.$DirectionalDockingElement2=function(){"use strict";var fa=-q(this.$DirectionalDockingElement6).y;if(fa!==this.$DirectionalDockingElement7){this.$DirectionalDockingElement8=fa>this.$DirectionalDockingElement7?x:w;this.$DirectionalDockingElement7=fa;}this.$DirectionalDockingElement9=j.getElementDimensions(this.$DirectionalDockingElement0);this.$DirectionalDockingElementa=h.hasClass(document.documentElement,'tinyViewport');this.$DirectionalDockingElementb=m.getTop(document.body)+document.documentElement.clientHeight>document.documentElement.scrollHeight;};ea.prototype.$DirectionalDockingElementc=function(fa,ga){"use strict";if(this.$DirectionalDockingElementd!==fa||this.$DirectionalDockingElemente!==ga){n.apply(this.$DirectionalDockingElement0,{position:fa,top:ga+'px'});this.$DirectionalDockingElementd=fa;this.$DirectionalDockingElemente=ga;}};ea.prototype.$DirectionalDockingElementf=function(){"use strict";this.$DirectionalDockingElement5=z;this.$DirectionalDockingElementc('fixed',this.$DirectionalDockingElement4);};ea.prototype.$DirectionalDockingElementg=function(){"use strict";this.$DirectionalDockingElement5=aa;this.$DirectionalDockingElementc('fixed',this.$DirectionalDockingElement1);};ea.prototype.$DirectionalDockingElementh=function(){"use strict";this.$DirectionalDockingElement5=y;this.$DirectionalDockingElementc('absolute',this.$DirectionalDockingElementi);};ea.prototype.$DirectionalDockingElement3=function(){"use strict";var fa=this.$DirectionalDockingElement9.height;if(fa!==this.$DirectionalDockingElementj){n.set(this.$DirectionalDockingElement6,'height',fa+'px');this.$DirectionalDockingElementj=fa;this.inform('changedheight');}if(this.$DirectionalDockingElement5===z){this.$DirectionalDockingElementi=this.$DirectionalDockingElement7+this.$DirectionalDockingElement4;}else if(this.$DirectionalDockingElement5===aa)this.$DirectionalDockingElementi=this.$DirectionalDockingElement7+this.$DirectionalDockingElement1;if(this.$DirectionalDockingElementb)return;if(this.$DirectionalDockingElement7+this.$DirectionalDockingElement4<=0||this.$DirectionalDockingElementa){this.$DirectionalDockingElementi=0;this.$DirectionalDockingElementh();return;}if(this.$DirectionalDockingElement8===x&&this.$DirectionalDockingElement7+this.$DirectionalDockingElement1>=this.$DirectionalDockingElementi){this.$DirectionalDockingElementg();}else if(this.$DirectionalDockingElement8===w&&this.$DirectionalDockingElement7+this.$DirectionalDockingElement4<=this.$DirectionalDockingElementi){this.$DirectionalDockingElementf();}else this.$DirectionalDockingElementh();};ea.prototype.update=function(){"use strict";this.$DirectionalDockingElement2();this.$DirectionalDockingElement3();};ea.prototype.destroy=function(){"use strict";if(v.indexOf(this)===-1)return;t(v,this);if(this.$DirectionalDockingElement6&&this.$DirectionalDockingElement6.parentNode){i.remove(this.$DirectionalDockingElement6);this.$DirectionalDockingElement6=null;}};ea.prototype.setOffset=function(fa){"use strict";this.$DirectionalDockingElement1=fa;this.update();return this;};e.exports=ea;},null);
__d("DockingElement",["ArbiterMixin","CSS","DOM","DOMDimensions","Event","Run","Style","SubscriptionsHandler","getElementPosition","mixin","queryThenMutateDOM","removeFromArray"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r){b.__markCompiled&&b.__markCompiled();var s,t=[],u=p(g);for(var v in u)if(u.hasOwnProperty(v))x[v]=u[v];var w=u===null?null:u.prototype;x.prototype=Object.create(w);x.prototype.constructor=x;x.__superConstructor__=u;function x(y){"use strict";this.$DockingElement0=y;this.$DockingElement1=0;if(!t.length){var z=q.bind(null,function(){for(var aa=0,ba=t.length;aa<ba;aa++)t[aa].getRect();},function(){for(var aa=0,ba=t.length;aa<ba;aa++)t[aa].updateWithCache();},'DockingElement');s=new n();s.addSubscriptions(k.listen(window,'scroll',z),k.listen(window,'resize',z));l.onLeave(function(){while(t.length)t.pop().destroy();});}t.push(this);this.update();}x.prototype.getRect=function(){"use strict";var y=this.$DockingElement2?this.getPlaceholder():this.$DockingElement0;this.$DockingElement3=o(y);this.$DockingElement4=j.getElementDimensions(y);this.$DockingElement5=h.hasClass(document.documentElement,'tinyViewport');};x.prototype.updateWithCache=function(){"use strict";var y=this.$DockingElement1,z=this.getPlaceholder();if(!this.$DockingElement5&&this.$DockingElement3.y<=y){if(!this.$DockingElement2){if(!this.$DockingElement6){i.insertAfter(this.$DockingElement0,z);this.$DockingElement6=true;}h.addClass(this.$DockingElement0,'fixed_elem');h.show(z);this.$DockingElement2=true;}var aa;if(this.$DockingElement7!==y){aa={};aa.top=y+'px';this.$DockingElement7=y;}var ba=this.$DockingElement4.width;if(ba!==this.$DockingElement8){aa=aa||{};aa.width=ba+'px';this.$DockingElement8=ba;}aa&&m.apply(this.$DockingElement0,aa);var ca=this.$DockingElement4.height;if(ca!==this.$DockingElement9){m.set(z,'height',ca+'px');this.$DockingElement9=ca;this.inform('changedheight');}}else if(this.$DockingElement2){m.apply(this.$DockingElement0,{top:'',width:''});h.removeClass(this.$DockingElement0,'fixed_elem');h.hide(z);this.$DockingElement2=false;this.$DockingElement8=null;this.$DockingElement7=null;}};x.prototype.update=function(){"use strict";this.getRect();this.updateWithCache();};x.prototype.getPlaceholder=function(){"use strict";if(!this.$DockingElementa)this.$DockingElementa=i.create('div');return this.$DockingElementa;};x.prototype.destroy=function(){"use strict";if(t.indexOf(this)===-1)return;r(t,this);if(this.$DockingElementa&&this.$DockingElementa.parentNode){i.remove(this.$DockingElementa);this.$DockingElementa=null;}if(!t.length){s.release();s=null;}};x.prototype.setOffset=function(y){"use strict";this.$DockingElement1=y;this.update();return this;};e.exports=x;},null);
__d("StickyRHC",["Arbiter","DirectionalDockingElement","DockingElement","DOMQuery","DOMDimensions","Event","Run","SubscriptionsHandler","ViewportBounds","$","csx","ge","getElementPosition","removeFromArray","throttle"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u){b.__markCompiled&&b.__markCompiled();var v=35,w=[],x;function y(ca,da){if(!da||!da.dom_id){w.forEach(z);return;}var ea=p(da.dom_id);for(var fa=0;fa<w.length;fa++)if(j.contains(w[fa].getRoot(),ea)){z(w[fa]);return;}}function z(ca){var da=ca.getRoot(),ea=ca.updateOffset.bind(ca),fa=j.scry(da,'img.img');fa.forEach(function(ga){if(ga.complete||ga.getAttribute('height')||(typeof ga.naturalHeight!=='undefined'&&ga.naturalHeight!==0))return;var ha=function(){ea();ia.remove();ja.remove();ka.remove();},ia=l.listen(ga,'load',ha),ja=l.listen(ga,'error',ha),ka=l.listen(ga,'abort',ha);});ea();}function aa(){w.forEach(function(ca){ca.updateOffset();});}function ba(ca,da){"use strict";this.$StickyRHC0=ca;this.$StickyRHC1=da?new h(ca):new i(ca);this.$StickyRHC2=0;this.$StickyRHC1.subscribe('changedheight',this.updateOffset.bind(this));this.updateOffset();z(this);if(!w.length){x=new n();x.addSubscriptions(g.subscribe('header_loaded',aa),g.subscribe('netego_loaded',y),l.listen(window,'resize',u(aa)));}m.onLeave(this.destroy.bind(this));w.push(this);}ba.getInstances=function(){"use strict";return w;};ba.prototype.getRoot=function(){"use strict";return this.$StickyRHC0;};ba.prototype.destroy=function(){"use strict";this.$StickyRHC1.destroy();t(w,this);if(!w.length){x.release();x=null;}};ba.prototype.updateOffset=function(){"use strict";var ca=j.scry(this.$StickyRHC0,"._4-u2"),da=j.scry(this.$StickyRHC0,"._4-u3"),ea=j.scry(this.$StickyRHC0,"._5eh2"),fa=j.scry(this.$StickyRHC0,'.uiHeader'),ga=j.scry(this.$StickyRHC0,'.ego_unit'),ha=[].concat(ca,da,ea,fa,ga),ia=[];ha.forEach(function(sa){ia.push(s(sa).y);});ia.sort(function(sa,ta){return sa-ta;});var ja=s(this.$StickyRHC0).y,ka=k.getElementDimensions(this.$StickyRHC0).height;ka+=this.$StickyRHC2;var la=o.getTop(),ma=k.getViewportDimensions().height-la;ma-=v;if(typeof this.$StickyRHC3==='undefined'){var na=r('pageFooter');this.$StickyRHC3=na?k.getElementDimensions(na).height:0;}ma-=this.$StickyRHC3;var oa=ma-ka;if(ka<ma){oa=la;}else for(var pa=0,qa=ia.length;pa<qa;pa++){var ra=ia[pa]-ja;if(ka-ra<ma){oa=la-ra;break;}}this.$StickyRHC1.setOffset(oa+this.$StickyRHC2);};ba.prototype.setOffset=function(ca){"use strict";this.$StickyRHC2=ca;this.updateOffset();};ba.prototype.getOffset=function(ca){"use strict";return this.$StickyRHC2;};e.exports=ba;},null);
__d("legacy:adware-scanner",["AdwareScaner"],function(a,b,c,d){b.__markCompiled&&b.__markCompiled();a.AdwareScaner=b('AdwareScaner');},3);