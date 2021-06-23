<?php

/* controllers/account/notifications_mobile.twig */
class __TwigTemplate_277c53f01384f822175606aedcd786ad1c6765d590bf232ff63a9053b10c0293 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/account/notifications_mobile.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/mobile.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"pmd-FormLayout\">

  <form action=\"/mon-compte/notifications/\" method=\"post\" class=\"pmd-js-Profile-notificationsForm pmd-Form\">
    <h3 class=\"pmd-FormLayout-heading\">Mes notifications :</h3>

    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["segments"]) ? $context["segments"] : $this->getContext($context, "segments")));
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            // line 10
            echo "        <div class=\"pmd-InputWrapper pmd-Cf pmd-ProfileFormInput\">
          <input type=\"checkbox\" name=\"mailing[]\" value=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["segment"], "id", array()), "html", null, true);
            echo "\" autocomplete=\"off\" ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["subscriptions"]) ? $context["subscriptions"] : $this->getContext($context, "subscriptions")));
            foreach ($context['_seq'] as $context["_key"] => $context["subscription"]) {
                if (($this->getAttribute($context["subscription"], "id", array()) == $this->getAttribute($context["segment"], "id", array()))) {
                    echo "checked";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "> <label class=\"pmd-Label pmd-ProfileForm-label\" for=\"mailing\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["segment"], "name", array()), "html", null, true);
            echo "</label>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "
    <div class=\"pmd-js-Profile-notificationsAlert pmd-Alert pmd-Alert--hidden\"></div>

    <button class=\"pmd-js-Profile-notificationsButtonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">Modifier mes notifications</span>
    </button>

  </form>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/account/notifications_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 14,  45 => 11,  42 => 10,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-FormLayout">*/
/* */
/*   <form action="/mon-compte/notifications/" method="post" class="pmd-js-Profile-notificationsForm pmd-Form">*/
/*     <h3 class="pmd-FormLayout-heading">Mes notifications :</h3>*/
/* */
/*     {% for segment in segments %}*/
/*         <div class="pmd-InputWrapper pmd-Cf pmd-ProfileFormInput">*/
/*           <input type="checkbox" name="mailing[]" value="{{ segment.id }}" autocomplete="off" {% for subscription in subscriptions %}{% if subscription.id == segment.id %}checked{% endif %}{% endfor %}> <label class="pmd-Label pmd-ProfileForm-label" for="mailing">{{ segment.name }}</label>*/
/*         </div>*/
/*     {% endfor %}*/
/* */
/*     <div class="pmd-js-Profile-notificationsAlert pmd-Alert pmd-Alert--hidden"></div>*/
/* */
/*     <button class="pmd-js-Profile-notificationsButtonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">Modifier mes notifications</span>*/
/*     </button>*/
/* */
/*   </form>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
