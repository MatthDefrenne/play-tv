<?php

/* partials/quantcast-pixel.twig */
class __TwigTemplate_9c501bfdb4efadbbcc4fe0e1503235560200ae58605ef10cffe3c665e1b366ca extends Twig_Template
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
        echo "<!-- Quantcast Tag -->
<script type=\"text/javascript\">
var _qevents = _qevents || [];

(function() {
  var elem = document.createElement('script');
  elem.src = (document.location.protocol == \"https:\" ? \"https://secure\" : \"http://edge\") + \".quantserve.com/quant.js\";
  elem.async = true;
  elem.type = \"text/javascript\";
  var scpt = document.getElementsByTagName('script')[0];
  scpt.parentNode.insertBefore(elem, scpt);
})();

_qevents.push({
  qacct:\"p-gHccyG_Rp6PDL\"
});
</script>
<noscript>
    <div style=\"display:none;\">
        <img src=\"//pixel.quantserve.com/pixel/p-gHccyG_Rp6PDL.gif\" border=\"0\" height=\"1\" width=\"1\" alt=\"Quantcast\"/>
    </div>
</noscript>
<!-- End Quantcast tag -->
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/quantcast-pixel.twig";
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* <!-- Quantcast Tag -->*/
/* <script type="text/javascript">*/
/* var _qevents = _qevents || [];*/
/* */
/* (function() {*/
/*   var elem = document.createElement('script');*/
/*   elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";*/
/*   elem.async = true;*/
/*   elem.type = "text/javascript";*/
/*   var scpt = document.getElementsByTagName('script')[0];*/
/*   scpt.parentNode.insertBefore(elem, scpt);*/
/* })();*/
/* */
/* _qevents.push({*/
/*   qacct:"p-gHccyG_Rp6PDL"*/
/* });*/
/* </script>*/
/* <noscript>*/
/*     <div style="display:none;">*/
/*         <img src="//pixel.quantserve.com/pixel/p-gHccyG_Rp6PDL.gif" border="0" height="1" width="1" alt="Quantcast"/>*/
/*     </div>*/
/* </noscript>*/
/* <!-- End Quantcast tag -->*/
/* {% endspaceless %}*/
/* */
