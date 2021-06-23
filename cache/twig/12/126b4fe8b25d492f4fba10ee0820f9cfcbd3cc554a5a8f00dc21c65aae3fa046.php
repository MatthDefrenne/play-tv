<?php

/* controllers/trailer/index.twig */
class __TwigTemplate_96b82eb222decd44a44bedf2b26529839a3624628bc1e43ca574fbcd824417a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/trailer/index.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/full.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  <div class=\"ptv-Trailer ptv-js-Trailer\" data-title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
        echo "\" data-subtitle=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subtitle", array()), "html", null, true);
        echo "\" data-program-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "id", array()), "html", null, true);
        echo "\" data-program-alias=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "alias", array()), "html", null, true);
        echo "\">
    <a href=\"#\" class=\"ptv-Trailer-action ptv-js-Trailer-action ptv-Trailer-action--hidden\"><i>Play</i></a>
    <div id=\"ptv-Trailer-uniAds\" class=\"ptv-js-Trailer-uniAds ptv-Trailer-uniAds ptv-Trailer-uniAds--hidden\"></div>
    <div class=\"ptv-js-TrailerAd-container ptv-TrailerAd-container ptv-TrailerAd-container--hiden\">
      <div class=\"ptv-TrailerAd-content\">
        <video class=\"ptv-js-TrailerAd-video ptv-TrailerAd-content-element\"></video>
      </div>
      <div class=\"ptv-js-TrailerAd-adcontainer ptv-TrailerAd-adcontainer\"></div>
    </div>
    <iframe class=\"ptv-Trailer-iframe ptv-Trailer-iframe--hidden ptv-js-Trailer-iframe\" src=\"\" data-src=\"/trailer/embed/";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "id", array()), "html", null, true);
        echo "/?autoplay=";
        echo (((isset($context["autoplay"]) ? $context["autoplay"] : $this->getContext($context, "autoplay"))) ? ("1") : ("0"));
        echo "&skin=minimal\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>
  </div>

  <script>
  ;(function(win, doc, app) {
    app.Data = app.Data || {};
    app.Data.Trailer = app.Data.Trailer || {};
    app.Data.Trailer.autoplay = ";
        // line 20
        echo (((isset($context["autoplay"]) ? $context["autoplay"] : $this->getContext($context, "autoplay"))) ? ("true") : ("false"));
        echo ";
    app.Data.uniroll = ";
        // line 21
        echo twig_jsonencode_filter((isset($context["uniroll"]) ? $context["uniroll"] : $this->getContext($context, "uniroll")), twig_constant("JSON_PRETTY_PRINT"));
        echo ";
    ";
        // line 23
        echo "    ";
        if ((array_key_exists("isMobile", $context) && ((isset($context["isMobile"]) ? $context["isMobile"] : $this->getContext($context, "isMobile")) == true))) {
            // line 24
            echo "    var w = window.innerWidth;
    var h = w / (16/9);
    [
      '.ptv-js-Trailer',
      '.ptv-js-Trailer-action',
      '.ptv-js-Trailer-iframe',
    ].forEach(function(s) {
      var e = document.querySelector(s);
      if (e) {
        e.style.width = w+'px';
        e.style.height = h+'px';
      }
    });
    var e = document.querySelector('.ptv-js-Trailer-iframe');
    if (e) {
      var u = e.getAttribute('data-src');
      e.setAttribute('data-src', u += '&w=' + w + '&h=' + h);
    }
    ";
        }
        // line 43
        echo "  })(window, window.document, window.ptv || (window.ptv = {}));
  </script>
";
    }

    public function getTemplateName()
    {
        return "controllers/trailer/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 43,  73 => 24,  70 => 23,  66 => 21,  62 => 20,  50 => 13,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div class="ptv-Trailer ptv-js-Trailer" data-title="{{ program.fulltitle }}" data-subtitle="{{ program.subtitle }}" data-program-id="{{ program.id }}" data-program-alias="{{ program.alias }}">*/
/*     <a href="#" class="ptv-Trailer-action ptv-js-Trailer-action ptv-Trailer-action--hidden"><i>Play</i></a>*/
/*     <div id="ptv-Trailer-uniAds" class="ptv-js-Trailer-uniAds ptv-Trailer-uniAds ptv-Trailer-uniAds--hidden"></div>*/
/*     <div class="ptv-js-TrailerAd-container ptv-TrailerAd-container ptv-TrailerAd-container--hiden">*/
/*       <div class="ptv-TrailerAd-content">*/
/*         <video class="ptv-js-TrailerAd-video ptv-TrailerAd-content-element"></video>*/
/*       </div>*/
/*       <div class="ptv-js-TrailerAd-adcontainer ptv-TrailerAd-adcontainer"></div>*/
/*     </div>*/
/*     <iframe class="ptv-Trailer-iframe ptv-Trailer-iframe--hidden ptv-js-Trailer-iframe" src="" data-src="/trailer/embed/{{ program.id }}/?autoplay={{ autoplay ? '1' : '0' }}&skin=minimal" frameborder="0" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>*/
/*   </div>*/
/* */
/*   <script>*/
/*   ;(function(win, doc, app) {*/
/*     app.Data = app.Data || {};*/
/*     app.Data.Trailer = app.Data.Trailer || {};*/
/*     app.Data.Trailer.autoplay = {{ autoplay ? 'true' : 'false' }};*/
/*     app.Data.uniroll = {{ uniroll|json_encode(constant('JSON_PRETTY_PRINT'))|raw }};*/
/*     {# Ugly hack to resize player in mobile version #}*/
/*     {% if isMobile is defined and isMobile == true %}*/
/*     var w = window.innerWidth;*/
/*     var h = w / (16/9);*/
/*     [*/
/*       '.ptv-js-Trailer',*/
/*       '.ptv-js-Trailer-action',*/
/*       '.ptv-js-Trailer-iframe',*/
/*     ].forEach(function(s) {*/
/*       var e = document.querySelector(s);*/
/*       if (e) {*/
/*         e.style.width = w+'px';*/
/*         e.style.height = h+'px';*/
/*       }*/
/*     });*/
/*     var e = document.querySelector('.ptv-js-Trailer-iframe');*/
/*     if (e) {*/
/*       var u = e.getAttribute('data-src');*/
/*       e.setAttribute('data-src', u += '&w=' + w + '&h=' + h);*/
/*     }*/
/*     {% endif %}*/
/*   })(window, window.document, window.ptv || (window.ptv = {}));*/
/*   </script>*/
/* {% endblock content %}*/
/* */
