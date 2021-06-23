<?php

/* controllers/account/notifications.twig */
class __TwigTemplate_8a94e1470d99e76607f03f19993bbf80493cb4d032f2eafdbe6239f8516fd20d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/account/notifications.twig", 1);
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
        echo "
  ";
        // line 5
        $this->loadTemplate("controllers/account/notifications.twig", "controllers/account/notifications.twig", 5, "112207282")->display(array_merge($context, array("tab_selected" => "notifications")));
        // line 12
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/account/notifications.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 12,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}


/* controllers/account/notifications.twig */
class __TwigTemplate_8a94e1470d99e76607f03f19993bbf80493cb4d032f2eafdbe6239f8516fd20d_112207282 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("controllers/account/skeleton.twig", "controllers/account/notifications.twig", 5);
        $this->blocks = array(
            'embed_content' => array($this, 'block_embed_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "controllers/account/skeleton.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_embed_content($context, array $blocks = array())
    {
        // line 8
        echo "      ";
        $this->loadTemplate("controllers/account/_form-notifications.twig", "controllers/account/notifications.twig", 8)->display($context);
        // line 9
        echo "    ";
    }

    public function getTemplateName()
    {
        return "controllers/account/notifications.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 9,  85 => 8,  82 => 7,  65 => 5,  36 => 12,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% embed "controllers/account/skeleton.twig" with {"tab_selected": "notifications"} %}*/
/* */
/*     {% block embed_content %}*/
/*       {% include "controllers/account/_form-notifications.twig" %}*/
/*     {% endblock %}*/
/* */
/*   {% endembed %}*/
/* */
/* {% endblock %}*/
/* */
