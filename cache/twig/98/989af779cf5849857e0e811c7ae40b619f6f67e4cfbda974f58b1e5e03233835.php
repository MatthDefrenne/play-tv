<?php

/* partials/sdk-livereload.twig */
class __TwigTemplate_ecc2c9c7408e73c3aed2ab0c1a91017138640691d5a38c128f75aa1e22c80aaa extends Twig_Template
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
        if (("dev" == (isset($context["app_env"]) ? $context["app_env"] : $this->getContext($context, "app_env")))) {
            // line 3
            echo "<!-- <script src=\"http://kud.dev:1337/vorlon.js\"></script> -->
<!-- <script src=\"http://kud.dev:8080/target/target-script-min.js#anonymous\"></script> -->
";
        }
    }

    public function getTemplateName()
    {
        return "partials/sdk-livereload.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 3,  19 => 1,);
    }
}
/* {% if 'dev' == app_env %}*/
/* {# <script async defer src="http://localhost:35729/livereload.js"></script> #}*/
/* <!-- <script src="http://kud.dev:1337/vorlon.js"></script> -->*/
/* <!-- <script src="http://kud.dev:8080/target/target-script-min.js#anonymous"></script> -->*/
/* {% endif %}*/
/* */
