<?php

/* partials/ads-impactify.twig */
class __TwigTemplate_b1d1b46bd5b577247d46b1bfc190b4ac3aa19945ca5acb015df0b21b585ddb51 extends Twig_Template
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
        echo "<script>
  window.impactifyTag = window.impactifyTag || [];
  impactifyTag.push({
    appId: 'playtv.fr',
    format: 'screen'
  });
  (function(d, s, id) {
    var js, ijs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.async = true;
    js.src = 'https://ad.impactify.io/static/ad/tag.js';
    ijs.parentNode.insertBefore(js, ijs);
  }(document, 'script', 'impactify-sdk'));
</script>
";
    }

    public function getTemplateName()
    {
        return "partials/ads-impactify.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <script>*/
/*   window.impactifyTag = window.impactifyTag || [];*/
/*   impactifyTag.push({*/
/*     appId: 'playtv.fr',*/
/*     format: 'screen'*/
/*   });*/
/*   (function(d, s, id) {*/
/*     var js, ijs = d.getElementsByTagName(s)[0];*/
/*     if (d.getElementById(id)) return;*/
/*     js = d.createElement(s);*/
/*     js.id = id;*/
/*     js.async = true;*/
/*     js.src = 'https://ad.impactify.io/static/ad/tag.js';*/
/*     ijs.parentNode.insertBefore(js, ijs);*/
/*   }(document, 'script', 'impactify-sdk'));*/
/* </script>*/
/* */
