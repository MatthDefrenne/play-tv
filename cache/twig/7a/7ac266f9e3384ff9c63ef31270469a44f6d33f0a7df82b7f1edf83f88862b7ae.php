<?php

/* partials/gdpr-banner.twig */
class __TwigTemplate_ed122ca88eca416f15edcbdcf26e040a2d8b483b4d890e6cbec03f0a13d59e6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "<!-- Quantcast Choice. Consent Manager Tag -->
<script type=\"text/javascript\" async=true>
  var elem = document.createElement('script');
  elem.src = 'https://quantcast.mgr.consensu.org/cmp.js';
  elem.async = true;
  elem.type = \"text/javascript\";
  var scpt = document.getElementsByTagName('script')[0];
  scpt.parentNode.insertBefore(elem, scpt);
  (function() {
    var gdprAppliesGlobally = false;
    function addFrame() {
      if (!window.frames['__cmpLocator']) {
        if (document.body) {
          var body = document.body, iframe = document.createElement('iframe');
          iframe.style = 'display:none';
          iframe.name = '__cmpLocator';
          body.appendChild(iframe);
        } else {
          setTimeout(addFrame, 5);
        }
      }
    }
    addFrame();
    function cmpMsgHandler(event) {
      var msgIsString = typeof event.data === \"string\";
      var json;
      if (msgIsString) {
        json = event.data.indexOf(\"__cmpCall\") != -1 ? JSON.parse(event.data) : {};
      } else {
        json = event.data;
      }
      if (json.__cmpCall) {
        var i = json.__cmpCall;
        window.__cmp(i.command, i.parameter, function(retValue, success) {
          var returnMsg = {\"__cmpReturn\": {
            \"returnValue\": retValue,
            \"success\": success,
            \"callId\": i.callId
          }};
          event.source.postMessage(msgIsString ? JSON.stringify(returnMsg) : returnMsg, '*');
        });
      }
    }
    window.__cmp = function (c) {
      var b = arguments;
      if (!b.length) {
        return __cmp.a;
      } else if (b[0] === 'ping') {
        b[2]({\"gdprAppliesGlobally\": gdprAppliesGlobally, \"cmpLoaded\": false}, true);
      } else if (c == '__cmp')
        return false;
      else {
        if (typeof __cmp.a === 'undefined') {
          __cmp.a = [];
        }
        __cmp.a.push([].slice.apply(b));
      }
    }
    window.__cmp.gdprAppliesGlobally = gdprAppliesGlobally;
    window.__cmp.msgHandler = cmpMsgHandler;
    if (window.addEventListener) {
      window.addEventListener('message', cmpMsgHandler, false);
    }
    else {
      window.attachEvent('onmessage', cmpMsgHandler);
    }
  })();
  var onSetConsent = function() {
      window.__cmp('getConsentData', null, function(vendorConsentData, success) {
          if (success) {
            window._ptv__vcd = vendorConsentData;
          }
      });
  };
";
        // line 76
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 77
            echo "  window.__cmp('init', {
    'Language': 'fr',
    'Initial Screen Title Text': 'Comment sont utilis??es mes donn??es ?',
    'Initial Screen Reject Button Text': 'Je refuse',
    'Initial Screen Accept Button Text': 'J&#039;accepte',
    'Initial Screen Purpose Link Text': 'Param??trer les cookies',
    'Purpose Screen Title Text': 'Comment sont utilis??es mes donn??es ?',
    'Purpose Screen Body Text': 'En dehors des cookies n??cessaires au fonctionnement du site (comme la connexion ou la session), vous pouvez configurer vos r??glages et choisir comment vous souhaitez que vos donn??es personnelles soient utilis??es en fonction des objectifs ci-dessous. Vous pouvez configurer les r??glages de mani??re ind??pendante pour chaque partenaire. Vous trouverez une description de chacun des objectifs sur la fa??on dont nos partenaires et nous-m??mes utilisons vos donn??es personnelles.',
    'Purpose Screen Vendor Link Text': 'Afficher la liste compl??te des partenaires',
    'Purpose Screen Cancel Button Text': 'Annuler',
    'Purpose Screen Save and Exit Button Text': 'Enregistrer et quitter',
    'Vendor Screen Title Text': 'Comment sont utilis??es mes donn??es ?',
    'Vendor Screen Body Text': 'En dehors des cookies n??cessaires au fonctionnement du site (comme la connexion ou la session), vous pouvez configurer vos r??glages ind??pendamment pour chaque partenaire list?? ci-dessous. Afin de faciliter votre d??cision, vous pouvez d??velopper la liste de chaque entreprise pour voir ?? quelles fins il utilise les donn??es. Dans certains cas, les entreprises peuvent r??v??ler qu&#039;elles utilisent vos donn??es sans votre consentement, en fonction de leurs int??r??ts l??gitimes. Vous pouvez cliquer sur leurs politiques de confidentialit?? pour obtenir plus d&#039;informations et pour vous d??sinscrire.',
    'Vendor Screen Accept All Button Text': 'Tout Accepter',
    'Vendor Screen Reject All Button Text': 'Tout Refuser',
    'Vendor Screen Purposes Link Text': 'Revenir aux Objectifs',
    'Vendor Screen Cancel Button Text': 'Annuler',
    'Vendor Screen Save and Exit Button Text': 'Enregistrer et quitter',
    'Initial Screen Body Text': 'Nos partenaires et nous-m??mes utilisent diff??rentes technologies, telles que les cookies, pour personnaliser les contenus et les publicit??s, proposer des fonctionnalit??s sur les r??seaux sociaux et analyser le trafic. Merci de cliquer sur le bouton ci-dessous pour donner votre accord. Vous pouvez changer d???avis et modifier vos choix ?? tout moment',
    'Initial Screen Body Text Option': 1,
    'Publisher Purpose IDs': [1,2,3,4,5],
    'Display UI': 'inEU',
    'Publisher Name': 'Play TV',
    'No Option': false,
    'Default Value for Toggles': 'on',
    'Display Persistent Consent Link': false,
    'Consent Scope': 'service',
    'Non-Consent Display Frequency': 1,
  });
";
        } else {
            // line 107
            echo "  window.__cmp('init', {
    'Language': 'en',
    'Initial Screen Title Text': 'How are my data used ?',
    'Purpose Screen Title Text': 'How are my data used ?',
    'Vendor Screen Title Text': 'How are my data used ?',
    'Initial Screen Body Text Option': 1,
    'Publisher Purpose IDs': [1,2,3,4,5],
    'Display UI': 'inEU',
    'Publisher Name': 'Play TV',
    'No Option': false,
    'Default Value for Toggles': 'on',
    'Display Persistent Consent Link': false,
    'Consent Scope': 'service',
    'Non-Consent Display Frequency': 1,
  });
";
        }
        // line 123
        echo "  window.__cmp('setConsentUiCallback', onSetConsent);
</script>
<!-- End Quantcast Choice. Consent Manager Tag -->
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/gdpr-banner.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 123,  131 => 107,  99 => 77,  97 => 76,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* <!-- Quantcast Choice. Consent Manager Tag -->*/
/* <script type="text/javascript" async=true>*/
/*   var elem = document.createElement('script');*/
/*   elem.src = 'https://quantcast.mgr.consensu.org/cmp.js';*/
/*   elem.async = true;*/
/*   elem.type = "text/javascript";*/
/*   var scpt = document.getElementsByTagName('script')[0];*/
/*   scpt.parentNode.insertBefore(elem, scpt);*/
/*   (function() {*/
/*     var gdprAppliesGlobally = false;*/
/*     function addFrame() {*/
/*       if (!window.frames['__cmpLocator']) {*/
/*         if (document.body) {*/
/*           var body = document.body, iframe = document.createElement('iframe');*/
/*           iframe.style = 'display:none';*/
/*           iframe.name = '__cmpLocator';*/
/*           body.appendChild(iframe);*/
/*         } else {*/
/*           setTimeout(addFrame, 5);*/
/*         }*/
/*       }*/
/*     }*/
/*     addFrame();*/
/*     function cmpMsgHandler(event) {*/
/*       var msgIsString = typeof event.data === "string";*/
/*       var json;*/
/*       if (msgIsString) {*/
/*         json = event.data.indexOf("__cmpCall") != -1 ? JSON.parse(event.data) : {};*/
/*       } else {*/
/*         json = event.data;*/
/*       }*/
/*       if (json.__cmpCall) {*/
/*         var i = json.__cmpCall;*/
/*         window.__cmp(i.command, i.parameter, function(retValue, success) {*/
/*           var returnMsg = {"__cmpReturn": {*/
/*             "returnValue": retValue,*/
/*             "success": success,*/
/*             "callId": i.callId*/
/*           }};*/
/*           event.source.postMessage(msgIsString ? JSON.stringify(returnMsg) : returnMsg, '*');*/
/*         });*/
/*       }*/
/*     }*/
/*     window.__cmp = function (c) {*/
/*       var b = arguments;*/
/*       if (!b.length) {*/
/*         return __cmp.a;*/
/*       } else if (b[0] === 'ping') {*/
/*         b[2]({"gdprAppliesGlobally": gdprAppliesGlobally, "cmpLoaded": false}, true);*/
/*       } else if (c == '__cmp')*/
/*         return false;*/
/*       else {*/
/*         if (typeof __cmp.a === 'undefined') {*/
/*           __cmp.a = [];*/
/*         }*/
/*         __cmp.a.push([].slice.apply(b));*/
/*       }*/
/*     }*/
/*     window.__cmp.gdprAppliesGlobally = gdprAppliesGlobally;*/
/*     window.__cmp.msgHandler = cmpMsgHandler;*/
/*     if (window.addEventListener) {*/
/*       window.addEventListener('message', cmpMsgHandler, false);*/
/*     }*/
/*     else {*/
/*       window.attachEvent('onmessage', cmpMsgHandler);*/
/*     }*/
/*   })();*/
/*   var onSetConsent = function() {*/
/*       window.__cmp('getConsentData', null, function(vendorConsentData, success) {*/
/*           if (success) {*/
/*             window._ptv__vcd = vendorConsentData;*/
/*           }*/
/*       });*/
/*   };*/
/* {% if is_website_fr %}*/
/*   window.__cmp('init', {*/
/*     'Language': 'fr',*/
/*     'Initial Screen Title Text': 'Comment sont utilis??es mes donn??es ?',*/
/*     'Initial Screen Reject Button Text': 'Je refuse',*/
/*     'Initial Screen Accept Button Text': 'J&#039;accepte',*/
/*     'Initial Screen Purpose Link Text': 'Param??trer les cookies',*/
/*     'Purpose Screen Title Text': 'Comment sont utilis??es mes donn??es ?',*/
/*     'Purpose Screen Body Text': 'En dehors des cookies n??cessaires au fonctionnement du site (comme la connexion ou la session), vous pouvez configurer vos r??glages et choisir comment vous souhaitez que vos donn??es personnelles soient utilis??es en fonction des objectifs ci-dessous. Vous pouvez configurer les r??glages de mani??re ind??pendante pour chaque partenaire. Vous trouverez une description de chacun des objectifs sur la fa??on dont nos partenaires et nous-m??mes utilisons vos donn??es personnelles.',*/
/*     'Purpose Screen Vendor Link Text': 'Afficher la liste compl??te des partenaires',*/
/*     'Purpose Screen Cancel Button Text': 'Annuler',*/
/*     'Purpose Screen Save and Exit Button Text': 'Enregistrer et quitter',*/
/*     'Vendor Screen Title Text': 'Comment sont utilis??es mes donn??es ?',*/
/*     'Vendor Screen Body Text': 'En dehors des cookies n??cessaires au fonctionnement du site (comme la connexion ou la session), vous pouvez configurer vos r??glages ind??pendamment pour chaque partenaire list?? ci-dessous. Afin de faciliter votre d??cision, vous pouvez d??velopper la liste de chaque entreprise pour voir ?? quelles fins il utilise les donn??es. Dans certains cas, les entreprises peuvent r??v??ler qu&#039;elles utilisent vos donn??es sans votre consentement, en fonction de leurs int??r??ts l??gitimes. Vous pouvez cliquer sur leurs politiques de confidentialit?? pour obtenir plus d&#039;informations et pour vous d??sinscrire.',*/
/*     'Vendor Screen Accept All Button Text': 'Tout Accepter',*/
/*     'Vendor Screen Reject All Button Text': 'Tout Refuser',*/
/*     'Vendor Screen Purposes Link Text': 'Revenir aux Objectifs',*/
/*     'Vendor Screen Cancel Button Text': 'Annuler',*/
/*     'Vendor Screen Save and Exit Button Text': 'Enregistrer et quitter',*/
/*     'Initial Screen Body Text': 'Nos partenaires et nous-m??mes utilisent diff??rentes technologies, telles que les cookies, pour personnaliser les contenus et les publicit??s, proposer des fonctionnalit??s sur les r??seaux sociaux et analyser le trafic. Merci de cliquer sur le bouton ci-dessous pour donner votre accord. Vous pouvez changer d???avis et modifier vos choix ?? tout moment',*/
/*     'Initial Screen Body Text Option': 1,*/
/*     'Publisher Purpose IDs': [1,2,3,4,5],*/
/*     'Display UI': 'inEU',*/
/*     'Publisher Name': 'Play TV',*/
/*     'No Option': false,*/
/*     'Default Value for Toggles': 'on',*/
/*     'Display Persistent Consent Link': false,*/
/*     'Consent Scope': 'service',*/
/*     'Non-Consent Display Frequency': 1,*/
/*   });*/
/* {% else %}*/
/*   window.__cmp('init', {*/
/*     'Language': 'en',*/
/*     'Initial Screen Title Text': 'How are my data used ?',*/
/*     'Purpose Screen Title Text': 'How are my data used ?',*/
/*     'Vendor Screen Title Text': 'How are my data used ?',*/
/*     'Initial Screen Body Text Option': 1,*/
/*     'Publisher Purpose IDs': [1,2,3,4,5],*/
/*     'Display UI': 'inEU',*/
/*     'Publisher Name': 'Play TV',*/
/*     'No Option': false,*/
/*     'Default Value for Toggles': 'on',*/
/*     'Display Persistent Consent Link': false,*/
/*     'Consent Scope': 'service',*/
/*     'Non-Consent Display Frequency': 1,*/
/*   });*/
/* {% endif %}*/
/*   window.__cmp('setConsentUiCallback', onSetConsent);*/
/* </script>*/
/* <!-- End Quantcast Choice. Consent Manager Tag -->*/
/* {% endspaceless %}*/
/* */
