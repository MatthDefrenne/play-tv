!function(){function t(e,r,i){function s(a,o){if(!r[a]){if(!e[a]){var l="function"==typeof require&&require;if(!o&&l)return l(a,!0);if(n)return n(a,!0);var u=new Error("Cannot find module '"+a+"'");throw u.code="MODULE_NOT_FOUND",u}var d=r[a]={exports:{}};e[a][0].call(d.exports,function(t){var r=e[a][1][t];return s(r||t)},d,d.exports,t,e,r,i)}return r[a].exports}for(var n="function"==typeof require&&require,a=0;a<i.length;a++)s(i[a]);return s}return t}()({1:[function(t,e,r){e.exports=window.ptv=window.ptv||{}},{}],2:[function(t,e,r){var i=t("./_global-legacy"),s=t("./views-mobile/support/index");i.Utils.Themer.update("grey"),new s},{"./_global-legacy":1,"./views-mobile/support/index":4}],3:[function(t,e,r){var i=window.Backbone;e.exports=i.View.extend({elements:null,constructor:function(){i.View.apply(this,arguments)},storeElements:function(){var t=this.elements;null!==t&&"object"==typeof t&&Object.keys(t).forEach(function(e){this["$"+e]=this.$(t[e]),this[e]=this.$(t[e])[0]},this)},close:function(){this.stopListening(),this.undelegateEvents()}})},{}],4:[function(t,e,r){var i=t("./../base"),s=t("./../../_global-legacy");e.exports=i.extend({el:".pmd-js-Content",events:{"submit .pmd-js-Support-form":"submitForm"},initialize:function(){return this.$alert=this.$(".pmd-js-Support-alert"),this.$buttonSubmit=this.$(".pmd-js-Support-buttonSubmit"),this.ladda=Ladda.create(this.$buttonSubmit[0]),this},submitForm:function(t){t.preventDefault();var e=this,r=t.target,i=$(r),n=i.serializeObject();n.flashVersion=s.Utils.Video.isFlashSupported(),e.ladda.start(),$.ajax({url:i.attr("action"),type:i.attr("method"),dataType:"json",data:n}).always(function(){e.ladda.stop()}).done(_.bind(e.submitDone,e)).fail(_.bind(e.submitFail,e))},submitDone:function(){var t=this,e="Votre email a été envoyé.";t.$alert.html(e),t.displaySuccessAlert(),t.$buttonSubmit.attr("disabled",!0)},submitFail:function(t){var e=this,r="Oops, une erreur est survenue.";if(_.isObject(t.responseJSON)){var i=t.responseJSON,s=document.createElement("ul");_.each(i,function(t){var e=document.createElement("li");e.innerHTML=t,s.appendChild(e)}),r=s}e.$alert.html(r),e.displayErrorAlert()},displayAlert:function(){this.$alert.removeClass("pmd-Alert--success"),this.$alert.removeClass("pmd-Alert--error"),this.$alert.removeClass("pmd-Alert--hidden")},hideAlert:function(){this.$alert.addClass("pmd-Alert--hidden")},displayErrorAlert:function(){this.displayAlert(),this.$alert.addClass("pmd-Alert--error")},displaySuccessAlert:function(){this.displayAlert(),this.$alert.addClass("pmd-Alert--success")}})},{"./../../_global-legacy":1,"./../base":3}]},{},[2]);