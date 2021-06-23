<?php

/* partials/sdk-facebook.twig */
class __TwigTemplate_1459f83670cb81804139ea2fcb892f2eb3b0f1299c3ac71d69c47733965b40ad extends Twig_Template
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
        echo "<div id=\"fb-root\"></div>
<script>
  var facebookScope = ['public_profile', 'email'];
  window.fbAsyncInit = function() {
    FB.init({
      version: 'v3.2',
      appId: '";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["external_apis"]) ? $context["external_apis"] : $this->getContext($context, "external_apis")), "facebook", array()), "appId", array()), "html", null, true);
        echo "',
      cookie: false,
      status: false,
      xfbml: true
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = \"//connect.facebook.net/";
        // line 19
        echo twig_escape_filter($this->env, (((isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")) . "_") . twig_upper_filter($this->env, (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")))), "html", null, true);
        echo "/sdk";
        if ((true == (isset($context["debug"]) ? $context["debug"] : $this->getContext($context, "debug")))) {
            echo "/debug";
        }
        echo ".js\";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/sdk-facebook.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 19,  29 => 8,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* <div id="fb-root"></div>*/
/* <script>*/
/*   var facebookScope = ['public_profile', 'email'];*/
/*   window.fbAsyncInit = function() {*/
/*     FB.init({*/
/*       version: 'v3.2',*/
/*       appId: '{{ external_apis.facebook.appId }}',*/
/*       cookie: false,*/
/*       status: false,*/
/*       xfbml: true*/
/*     });*/
/*   };*/
/* */
/*   (function(d, s, id) {*/
/*     var js, fjs = d.getElementsByTagName(s)[0];*/
/*     if (d.getElementById(id)) return;*/
/*     js = d.createElement(s); js.id = id;*/
/*     js.src = "//connect.facebook.net/{{ locale~"_"~locale|upper }}/sdk{% if true == debug %}/debug{% endif %}.js";*/
/*     fjs.parentNode.insertBefore(js, fjs);*/
/*   }(document, 'script', 'facebook-jssdk'));*/
/* </script>*/
/* {% endspaceless %}*/
/* */
