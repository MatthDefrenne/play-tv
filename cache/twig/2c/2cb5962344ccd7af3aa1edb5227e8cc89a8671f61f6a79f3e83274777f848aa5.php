<?php

/* controllers/player/_external-iframe.twig */
class __TwigTemplate_bad0f8822c8cf480b3a567bba017bf2970f938588ca0d8ff979a666c1f3f7215 extends Twig_Template
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
        echo "<div class=\"pmd-js-ExternalIframe pmd-PlayerContainer\">
  <div id=\"pmd-Uniads\"></div>
</div>
<script>
  ;(function(win, doc, App) {
    App.Data = App.Data || {}
    App.Data = ";
        // line 7
        echo twig_jsonencode_filter((isset($context["live_parameters"]) ? $context["live_parameters"] : $this->getContext($context, "live_parameters")), twig_constant("JSON_PRETTY_PRINT"));
        echo "
    App.Data.viewLayout = '";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["layout"]) ? $context["layout"] : $this->getContext($context, "layout")), "html", null, true);
        echo "'
  })( window, window.document, window.pmd || ( window.pmd = {} ) );
</script>
<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "page-player-external-iframe.js", array(), "array"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "controllers/player/_external-iframe.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 11,  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <div class="pmd-js-ExternalIframe pmd-PlayerContainer">*/
/*   <div id="pmd-Uniads"></div>*/
/* </div>*/
/* <script>*/
/*   ;(function(win, doc, App) {*/
/*     App.Data = App.Data || {}*/
/*     App.Data = {{ live_parameters|json_encode(constant('JSON_PRETTY_PRINT'))|raw }}*/
/*     App.Data.viewLayout = '{{ layout }}'*/
/*   })( window, window.document, window.pmd || ( window.pmd = {} ) );*/
/* </script>*/
/* <script src="{{ assets.scripts['page-player-external-iframe.js'] }}"></script>*/
/* */
