<?php

/* controllers/trailer/embed.twig */
class __TwigTemplate_b59e2dbb37cb8c7f3e1554d799025ccebf7f2fd50128c67bd7ca6e0571bb9468 extends Twig_Template
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
        echo "<!doctype html>
  <head>
    <meta charset=\"utf-8\">
    <style>
      html,
      body {
        margin: 0;
        overflow: hidden;
      }
    </style>
  </head>
  <body>

    ";
        // line 14
        if ( !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array()), "streams", array()), "paristream", array()))) {
            // line 15
            echo "      ";
            // line 22
            echo "
      ";
            // line 23
            if ((array_key_exists("isMobile", $context) && ((isset($context["isMobile"]) ? $context["isMobile"] : $this->getContext($context, "isMobile")) == true))) {
                // line 24
                echo "      <script type=\"text/javascript\" src=\"https://c.paristream.com/Zx89YmTe-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array()), "streams", array()), "paristream", array()), "id", array()), "html", null, true);
                echo ".js?autostart=0&w=";
                echo twig_escape_filter($this->env, (isset($context["pWidth"]) ? $context["pWidth"] : $this->getContext($context, "pWidth")), "html", null, true);
                echo "&h=";
                echo twig_escape_filter($this->env, (isset($context["pHeight"]) ? $context["pHeight"] : $this->getContext($context, "pHeight")), "html", null, true);
                echo "&t=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array()), "streams", array()), "paristream", array()), "token", array()), "html", null, true);
                echo "\"></script>
      ";
            } else {
                // line 26
                echo "      <script type=\"text/javascript\" src=\"https://c.paristream.com/Zx89YmTe-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array()), "streams", array()), "paristream", array()), "id", array()), "html", null, true);
                echo ".js?autostart=0&w=488&h=301&t=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array()), "streams", array()), "paristream", array()), "token", array()), "html", null, true);
                echo "\"></script>
      ";
            }
            // line 28
            echo "    ";
        } elseif (((isset($context["format"]) ? $context["format"] : $this->getContext($context, "format")) == "html5")) {
            // line 29
            echo "      <script type=\"text/javascript\" src=\"https://c.paristream.com/Zx89YmTe-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array()), "streams", array()), "paristream", array()), "id", array()), "html", null, true);
            echo ".js?autostart=0&w=488&h=301&t=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array()), "streams", array()), "paristream", array()), "token", array()), "html", null, true);
            echo "\"></script>
      ";
            // line 35
            echo "    ";
        } elseif (((isset($context["format"]) ? $context["format"] : $this->getContext($context, "format")) == "flash")) {
            // line 36
            echo "      ";
            // line 40
            echo "      <script src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array()), "streams", array()), "flash", array()), "html", null, true);
            echo "\"></script>
    ";
        }
        // line 42
        echo "
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "controllers/trailer/embed.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 42,  78 => 40,  76 => 36,  73 => 35,  66 => 29,  63 => 28,  55 => 26,  43 => 24,  41 => 23,  38 => 22,  36 => 15,  34 => 14,  19 => 1,);
    }
}
/* <!doctype html>*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <style>*/
/*       html,*/
/*       body {*/
/*         margin: 0;*/
/*         overflow: hidden;*/
/*       }*/
/*     </style>*/
/*   </head>*/
/*   <body>*/
/* */
/*     {% if program.trailer.streams.paristream is not empty %}*/
/*       {#*/
/*         player: 488x301*/
/*         +26px in height for control bar*/
/* */
/*         FIXME: autostart=true in script url does not properly autostart video (new browser policy)*/
/*         WORKAROUND: temporary set to 0*/
/*       #}*/
/* */
/*       {% if isMobile is defined and isMobile == true %}*/
/*       <script type="text/javascript" src="https://c.paristream.com/Zx89YmTe-{{ program.trailer.streams.paristream.id }}.js?autostart=0&w={{ pWidth }}&h={{ pHeight }}&t={{ program.trailer.streams.paristream.token }}"></script>*/
/*       {% else %}*/
/*       <script type="text/javascript" src="https://c.paristream.com/Zx89YmTe-{{ program.trailer.streams.paristream.id }}.js?autostart=0&w=488&h=301&t={{ program.trailer.streams.paristream.token }}"></script>*/
/*       {% endif %}*/
/*     {% elseif format == 'html5' %}*/
/*       <script type="text/javascript" src="https://c.paristream.com/Zx89YmTe-{{ program.trailer.streams.paristream.id }}.js?autostart=0&w=488&h=301&t={{ program.trailer.streams.paristream.token }}"></script>*/
/*       {#*/
/*       <video width="488" height="301" controls {% if autoplay %}autoplay{% endif %}>*/
/*         <source src="{{ program.trailer.streams.html5 }}" type="video/mp4">*/
/*       </video>*/
/*       #}*/
/*     {% elseif format == 'flash' %}*/
/*       {#*/
/*         player: 488x301*/
/*         +26px in height for control bar*/
/*       #}*/
/*       <script src="{{ program.trailer.streams.flash }}"></script>*/
/*     {% endif %}*/
/* */
/*   </body>*/
/* </html>*/
/* */
