!function(){function t(e,i,r){function a(n,o){if(!i[n]){if(!e[n]){var l="function"==typeof require&&require;if(!o&&l)return l(n,!0);if(s)return s(n,!0);var d=new Error("Cannot find module '"+n+"'");throw d.code="MODULE_NOT_FOUND",d}var u=i[n]={exports:{}};e[n][0].call(u.exports,function(t){var i=e[n][1][t];return a(i||t)},u,u.exports,t,e,i,r)}return i[n].exports}for(var s="function"==typeof require&&require,n=0;n<r.length;n++)a(r[n]);return a}return t}()({1:[function(t,e,i){e.exports=window.ptv=window.ptv||{}},{}],2:[function(t,e,i){var r=t("./_global-legacy"),a=t("./views-mobile/account/credit-card-infos"),s=t("./views-mobile/account/subscriptions"),n=t("./views-mobile/account-profile/index"),o=t("./views-mobile/newsletter/index");r.Utils.Themer.update("grey"),new a,new s,new n,new o},{"./_global-legacy":1,"./views-mobile/account-profile/index":3,"./views-mobile/account/credit-card-infos":4,"./views-mobile/account/subscriptions":5,"./views-mobile/newsletter/index":7}],3:[function(t,e,i){var r=t("./../base");e.exports=r.extend({el:".pmd-js-Content",events:{"submit .pmd-js-Profile-mainForm":"submitProfileForm","submit .pmd-js-Profile-notificationsForm":"submitNotificationsForm","submit .pmd-js-Profile-passwordForm":"submitPasswordForm","click .pmd-js-Profile-delete":"deleteAccount"},initialize:function(){return this.$mainAlert=this.$(".pmd-js-Profile-mainAlert"),this.$passwordAlert=this.$(".pmd-js-Profile-passwordAlert"),this.$notificationsAlert=this.$(".pmd-js-Profile-notificationsAlert"),this.$mainButtonSubmit=this.$(".pmd-js-Profile-mainButtonSubmit"),this.$passwordButtonSubmit=this.$(".pmd-js-Profile-passwordButtonSubmit"),this.$notificationsButtonSubmit=this.$(".pmd-js-Profile-notificationsButtonSubmit"),this.mainLaddaSubmit=Ladda.create(this.$mainButtonSubmit[0]),this.passwordLaddaSubmit=Ladda.create(this.$passwordButtonSubmit[0]),this.notificationsLaddaSubmit=Ladda.create(this.$notificationsButtonSubmit[0]),this},submitProfileForm:function(t){t.preventDefault();var e=this,i=t.target,r=$(i),a=r.serializeObject();e.mainLaddaSubmit.start(),$.ajax({url:r.attr("action"),type:r.attr("method"),dataType:"json",data:a}).always(function(){e.mainLaddaSubmit.stop()}).done(_.bind(e.updateProfileDone,e)).fail(_.bind(e.updateProfileFail,e))},updateProfileDone:function(){var t=this,e="Votre profil a bien été mis à jour.";t.$mainAlert.html(e),t.showSuccessAlert(t.$mainAlert)},updateProfileFail:function(t){var e=this,i="Oops, une erreur est survenue.";if(_.isObject(t.responseJSON)){var r=t.responseJSON,a=document.createElement("ul");_.each(r,function(t){var e=document.createElement("li");e.innerHTML=t,a.appendChild(e)}),i=a}e.$mainAlert.html(i),e.showErrorAlert(e.$mainAlert)},submitNotificationsForm:function(t){t.preventDefault();var e=this,i=t.target,r=$(i),a=r.serializeObject();e.notificationsLaddaSubmit.start(),$.ajax({url:r.attr("action"),type:r.attr("method"),dataType:"json",data:a}).always(function(){e.notificationsLaddaSubmit.stop()}).done(_.bind(e.updateNotificationsDone,e)).fail(_.bind(e.updateNotificationsFail,e))},updateNotificationsDone:function(){var t=this,e="Vos notifications a bien été mis à jour.";t.$notificationsAlert.html(e),t.showSuccessAlert(t.$notificationsAlert)},updateNotificationsFail:function(t){var e=this,i="Oops, une erreur est survenue.";if(_.isObject(t.responseJSON)){var r=t.responseJSON,a=document.createElement("ul");_.each(r,function(t){var e=document.createElement("li");e.innerHTML=t,a.appendChild(e)}),i=a}e.$notificationsAlert.html(i),e.showErrorAlert(e.$notificationsAlert)},submitPasswordForm:function(t){t.preventDefault();var e=this,i=t.target,r=$(i),a=r.serializeObject();e.passwordLaddaSubmit.start(),$.ajax({url:r.attr("action"),type:r.attr("method"),dataType:"json",data:a}).always(function(){e.passwordLaddaSubmit.stop()}).done(_.bind(e.updatePasswordDone,e)).fail(_.bind(e.updatePasswordFail,e))},updatePasswordDone:function(){var t=this,e="Votre mot de passe a bien été mis à jour.";t.$passwordAlert.html(e),t.showSuccessAlert(t.$passwordAlert)},updatePasswordFail:function(t){var e=this,i="Oops, une erreur est survenue.";if(_.isObject(t.responseJSON)){var r=t.responseJSON,a=document.createElement("ul");_.each(r,function(t){var e=document.createElement("li");e.innerHTML=t,a.appendChild(e)}),i=a}e.$passwordAlert.html(i),e.showErrorAlert(e.$passwordAlert)},deleteAccount:function(t){confirm("Voulez-vous réellement supprimer votre compte ?")||t.preventDefault()},showAlert:function(t){t.removeClass("pmd-Alert--success"),t.removeClass("pmd-Alert--error"),t.removeClass("pmd-Alert--hidden")},hideAlert:function(t){t.addClass("pmd-Alert--hidden")},showErrorAlert:function(t){this.showAlert(t),t.addClass("pmd-Alert--error")},showSuccessAlert:function(t){this.showAlert(t),t.addClass("pmd-Alert--success")}})},{"./../base":6}],4:[function(t,e,i){var r=t("./../base");e.exports=r.extend({el:".ptv-js-Payment",events:{"submit .ptv-js-Payment-form":"submitForm"},initialize:function(){this.$alert=this.$(".ptv-js-Payment-alert"),this.$action=this.$(".ptv-js-Payment-action"),this.$form=this.$(".ptv-js-Payment-form"),this.$paymillToken=this.$form.find(".ptv-js-Payment-paymillToken"),this.ladda=Ladda.create(this.$form.find(".ptv-js-Payment-updateAction").get(0)),this.cardDetector=new BrandDetection},submitForm:function(t){t.preventDefault();var e=this,i=e.verifyPaymill();$(t.currentTarget);e.ladda.start(),e.hideAlert(),_.isEmpty(i)?e.createPaymillToken():(e.ladda.stop(),e.formFail(i))},submitFinalForm:function(t){return $.ajax({type:"post",url:"/mon-compte/coordonnees-bancaires/",data:t,dataType:"json"})},createPaymillToken:function(){var t=this,e={amount_int:"0000",currency:"EUR",number:this.$form.find('input[data-name="card-number"]').val(),exp_month:this.$form.find('input[data-name="card-expiry-month"]').val(),exp_year:2e3+parseInt(this.$form.find('input[data-name="card-expiry-year"]').val(),10),cvc:this.$form.find('input[data-name="card-cvc"]').val()};paymill.createToken(e,_.bind(t.paymillResponseHandler,t))},paymillResponseHandler:function(t,e){var i=this;if(t){var r={error:t.apierror};i.formFail(r),i.ladda.stop()}else i.submitFinalForm("token="+e.token).done(function(){i.ladda.stop(),i.formDone()}).fail(function(t){i.ladda.stop(),i.formFail(JSON.parse(t.responseText))})},verifyPaymill:function(){var t={},e=this.$form.find('input[data-name="card-number"]').val();return"visa"!==this.cardDetector.detect(e)&&"carte-bleue"!==this.cardDetector.detect(e)&&"mastercard"!==this.cardDetector.detect(e)&&(t.cardNumber="Votre carte doit être une Carte Bleue, Visa, ou Mastercard."),!1===paymill.validateCardNumber(e)&&(t.cardNumber="Veuillez saisir les 12 chiffres de votre carte bancaire."),!1===paymill.validateCvc(this.$form.find('input[data-name="card-cvc"]').val())&&(t.cardCvc="Veuillez saisir les 3 chiffres au dos de votre carte bancaire."),!1===paymill.validateExpiry(this.$form.find('input[data-name="card-expiry-month"]').val(),2e3+parseInt(this.$form.find('input[data-name="card-expiry-year"]').val(),10))&&(t.cardExpiryDate="La date d'expiration de votre carte bancaire est invalide."),t},formDone:function(){var t=this,e="Vos coordonnées bancaires ont bien été mises à jour.";t.$alert.html(e),t.showAlertSuccess(),t.$action.remove()},formFail:function(t){var e=this,i="Oops, une erreur s'est produite. Veuillez réessayer.";if(_.isObject(t)){var r=document.createElement("ul");_.each(t,function(t){var e=document.createElement("li");e.innerHTML=t,r.appendChild(e)}),i=r}e.$alert.html(i),e.showAlertError()},showAlertSuccess:function(){this.showAlert(),this.$alert.addClass("pmd-Alert--success")},showAlertError:function(){this.showAlert(),this.$alert.addClass("pmd-Alert--error")},showAlert:function(){this.hideAlert(),this.$alert.addClass("pmd-Alert pmd-Alert--active")},hideAlert:function(){this.$alert.removeClass("pmd-Alert--active pmd-Alert--error pmd-Alert--success")}})},{"./../base":6}],5:[function(t,e,i){var r=t("./../base");e.exports=r.extend({el:".pmd-js-Content",events:{"submit .ptv-js-AccountProfile-removeSubscriptionForm":"cancelSubscription"},cancelSubscription:function(t){confirm("Êtes-vous sûr(e) de vouloir supprimer votre abonnement ?")||t.preventDefault()}})},{"./../base":6}],6:[function(t,e,i){var r=window.Backbone;e.exports=r.View.extend({elements:null,constructor:function(){r.View.apply(this,arguments)},storeElements:function(){var t=this.elements;null!==t&&"object"==typeof t&&Object.keys(t).forEach(function(e){this["$"+e]=this.$(t[e]),this[e]=this.$(t[e])[0]},this)},close:function(){this.stopListening(),this.undelegateEvents()}})},{}],7:[function(t,e,i){var r=t("./../base");e.exports=r.extend({el:".pmd-js-Content",events:{"submit .pmd-js-UnsubscribeMailing-form":"submitForm"},initialize:function(){return this.$alert=this.$(".pmd-js-UnsubscribeMailing-alert"),this.$buttonSubmit=this.$(".pmd-js-UnsubscribeMailing-buttonSubmit"),this.laddaSubmit=Ladda.create(this.$buttonSubmit[0]),this},submitForm:function(t){t.preventDefault();var e=this,i=t.target,r=$(i),a=r.serializeObject();e.laddaSubmit.start(),$.ajax({url:r.attr("action"),type:"post",dataType:"json",data:a}).always(function(){e.laddaSubmit.stop()}).done(_.bind(e.unsubscribeDone,e)).fail(_.bind(e.unsubscribeFail,e))},unsubscribeDone:function(){var t=this,e="Vous avez bien été désinscrit de la newsletter.";t.$alert.html(e),t.displaySuccessAlert(t.$notificationsAlert)},unsubscribeFail:function(t){var e=this,i="Oops, une erreur est survenue. Veuillez réessayer un peu plus tard.";if(_.isObject(t.responseJSON)){var r=t.responseJSON,a=document.createElement("ul");_.each(r,function(t){var e=document.createElement("li");e.innerHTML=t,a.appendChild(e)}),i=a}e.$alert.html(i),e.displayErrorAlert(e.$notificationsAlert)},displayAlert:function(){this.$alert.removeClass("pmd-Alert--success"),this.$alert.removeClass("pmd-Alert--error"),this.$alert.removeClass("pmd-Alert--hidden")},displaySuccessAlert:function(){this.displayAlert(),this.$alert.addClass("pmd-Alert--success")},displayErrorAlert:function(){this.displayAlert(),this.$alert.addClass("pmd-Alert--error")}})},{"./../base":6}]},{},[2]);