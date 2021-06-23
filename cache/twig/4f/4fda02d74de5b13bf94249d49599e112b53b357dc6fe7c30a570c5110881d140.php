<?php

/* controllers/player/_streamable.twig */
class __TwigTemplate_1733d8f73d9e8cab70e3119dc4c8834c2d1221de8febf6ffd888b80c2599c713 extends Twig_Template
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
        // line 5
        if (((((        // line 6
(isset($context["mode"]) ? $context["mode"] : $this->getContext($context, "mode")) == "default") && (        // line 7
(isset($context["device"]) ? $context["device"] : $this->getContext($context, "device")) == "mobile")) && (true == $this->getAttribute(        // line 8
(isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "require_login", array()))) && (false ==         // line 9
(isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected"))))) {
            // line 11
            echo "  <div class=\"pmd-PlayerContainer\">
    <a href=\"/connexion/\" class=\"pmd-js-LinkParent\" style=\"width: 100%; height: 100%; display: block; position: relative;\">
      <img
        src=\"";
            // line 14
            echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
            echo "/images/play-mobile.svg\"
        width=\"64\"
        height=\"64\"
        style=\"display: block;position: absolute; top: 50%; left: 50%; -webkit-transform: translate(-50%,-50%); transform: translate(-50%,-50%);\"
      >
    </a>
  </div>
  <script>
  document.querySelector('.pmd-js-LinkParent').addEventListener('click', function ( e ) {
    e.preventDefault()

    window.parent.location.href = this.getAttribute('href')
  })
  </script>
";
        } else {
            // line 29
            echo "  <div class=\"pmd-js-Player pmd-PlayerContainer\">
    <div id=\"pmd-Uniads\"></div>
  </div>
  <script>
    ;(function(win, doc, App) {

      App.Data = App.Data || {}
      App.Data = ";
            // line 36
            echo twig_jsonencode_filter((isset($context["live_parameters"]) ? $context["live_parameters"] : $this->getContext($context, "live_parameters")), twig_constant("JSON_PRETTY_PRINT"));
            echo "
      App.Data.viewLayout = '";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["layout"]) ? $context["layout"] : $this->getContext($context, "layout")), "html", null, true);
            echo "'

    })( window, window.document, window.pmd || ( window.pmd = {} ) );
  </script>
  <script src=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "page-player.js", array(), "array"), "html", null, true);
            echo "\"></script>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/player/_streamable.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 41,  61 => 37,  57 => 36,  48 => 29,  30 => 14,  25 => 11,  23 => 9,  22 => 8,  21 => 7,  20 => 6,  19 => 5,);
    }
}
/* {#*/
/*   default context (ie: player w/ full features) on a wireless device (mobile|tablet) redirects to login page if authentication is required.*/
/*   Otherwise, on any other devices, stream is played a couple of seconds, then stopped if still no logged in account triggering a login popin.*/
/* #}*/
/* {% if*/
/*   mode == 'default' and*/
/*   device == 'mobile' and*/
/*   true == channel.require_login and*/
/*   false == is_connected*/
/* %}*/
/*   <div class="pmd-PlayerContainer">*/
/*     <a href="/connexion/" class="pmd-js-LinkParent" style="width: 100%; height: 100%; display: block; position: relative;">*/
/*       <img*/
/*         src="{{ apps_base_url }}/images/play-mobile.svg"*/
/*         width="64"*/
/*         height="64"*/
/*         style="display: block;position: absolute; top: 50%; left: 50%; -webkit-transform: translate(-50%,-50%); transform: translate(-50%,-50%);"*/
/*       >*/
/*     </a>*/
/*   </div>*/
/*   <script>*/
/*   document.querySelector('.pmd-js-LinkParent').addEventListener('click', function ( e ) {*/
/*     e.preventDefault()*/
/* */
/*     window.parent.location.href = this.getAttribute('href')*/
/*   })*/
/*   </script>*/
/* {% else %}*/
/*   <div class="pmd-js-Player pmd-PlayerContainer">*/
/*     <div id="pmd-Uniads"></div>*/
/*   </div>*/
/*   <script>*/
/*     ;(function(win, doc, App) {*/
/* */
/*       App.Data = App.Data || {}*/
/*       App.Data = {{ live_parameters|json_encode(constant('JSON_PRETTY_PRINT'))|raw }}*/
/*       App.Data.viewLayout = '{{ layout }}'*/
/* */
/*     })( window, window.document, window.pmd || ( window.pmd = {} ) );*/
/*   </script>*/
/*   <script src="{{ assets.scripts['page-player.js'] }}"></script>*/
/* {% endif %}*/
/* */
