/*!CK:1594593853!*//*1433188947,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["qNYOv"]); }

__d("AirMailPaymentAsyncDialog",["AsyncDialog","AsyncRequest","CurrentUser"],function(a,b,c,d,e,f,g,h,i){b.__markCompiled&&b.__markCompiled();var j='372792269458814',k='airmail',l='/fbml/ajax/dialog',m={send:function(n,o){var p=new h().setURI(l).setData({_path:'pay',method:'pay',display:'async',app_id:j,action:k,dev_purchase_params:JSON.stringify({oscif:true}),product:i.getID()+':'+n});g.send(p,o);}};e.exports=m;},null);
__d("legacy:netego",["NetEgo"],function(a,b,c,d){b.__markCompiled&&b.__markCompiled();a.NetEgo=b('NetEgo');},3);