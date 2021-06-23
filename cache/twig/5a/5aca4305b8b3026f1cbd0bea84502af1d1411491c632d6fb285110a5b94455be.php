<?php

/* controllers/account/profile.twig */
class __TwigTemplate_b1e396355a6ed275dde2a5b44bf522520ee899af4f570405649a8e75ffc974db extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/account/profile.twig", 1);
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
        $this->loadTemplate("controllers/account/profile.twig", "controllers/account/profile.twig", 5, "908063558")->display(array_merge($context, array("tab_selected" => "profile")));
        // line 16
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/account/profile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 16,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}


/* controllers/account/profile.twig */
class __TwigTemplate_b1e396355a6ed275dde2a5b44bf522520ee899af4f570405649a8e75ffc974db_908063558 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("controllers/account/skeleton.twig", "controllers/account/profile.twig", 5);
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
        $this->loadTemplate("controllers/account/_form-profile.twig", "controllers/account/profile.twig", 8)->display($context);
        // line 9
        echo "      ";
        $this->loadTemplate("controllers/account/_form-password.twig", "controllers/account/profile.twig", 9)->display($context);
        // line 10
        echo "       <p class=\"ptv-AccountProfileDisable\">
        <a href=\"/mon-compte/suppression/\" class=\"ptv-js-AccountProfile-disableLink ptv-Button ptv-Button--danger ptv-Button--large ptv-AccountProfileDisable-link\" style=\"color: white;\" ";
        // line 11
        if ((isset($context["delete_subscriptions"]) ? $context["delete_subscriptions"] : $this->getContext($context, "delete_subscriptions"))) {
            echo "data-delete-subscriptions";
        }
        echo ">Supprimer mon compte</a>
      </p>
    ";
    }

    public function getTemplateName()
    {
        return "controllers/account/profile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 11,  91 => 10,  88 => 9,  85 => 8,  82 => 7,  65 => 5,  36 => 16,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% embed "controllers/account/skeleton.twig" with {"tab_selected": "profile"} %}*/
/* */
/*     {% block embed_content %}*/
/*       {% include "controllers/account/_form-profile.twig" %}*/
/*       {% include "controllers/account/_form-password.twig" %}*/
/*        <p class="ptv-AccountProfileDisable">*/
/*         <a href="/mon-compte/suppression/" class="ptv-js-AccountProfile-disableLink ptv-Button ptv-Button--danger ptv-Button--large ptv-AccountProfileDisable-link" style="color: white;" {% if delete_subscriptions %}data-delete-subscriptions{% endif %}>Supprimer mon compte</a>*/
/*       </p>*/
/*     {% endblock %}*/
/* */
/*   {% endembed %}*/
/* */
/* {% endblock %}*/
/* */
