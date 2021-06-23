<?php

/* controllers/account/_form-notifications.twig */
class __TwigTemplate_1da432cdd7b1c0e4087ad51e2af87b1ffa451a5bf27f7e5c5261079fad198d50 extends Twig_Template
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
        echo "<div class=\"ptv-js-AccountNotifications main ptv-AccountProfile\">

  <h3 class=\"ptv-AccountProfile-heading\">
    <span class=\"ptv-AccountProfile-headingMain\">Notifications</span>
  </h3>

  <div class=\"content ptv-AccountProfileContent\">

    <form method=\"post\" action=\"/mon-compte/notifications/\" class=\"ptv-js-AccountNotifications-form\">

      ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["segments"]) ? $context["segments"] : $this->getContext($context, "segments")));
        foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
            // line 12
            echo "        <div class=\"ptv-AccountProfileLine\">
          <p class=\"ptv-AccountProfileLine-inputField\">
            <input type=\"checkbox\" name=\"mailing[]\" value=\"";
            // line 14
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
            echo "> <label class=\"ptv-AccountProfileLine-label\" for=\"mailing\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["segment"], "name", array()), "html", null, true);
            echo "</label>
          </p>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
      <div class=\"ptv-js-AccountNotifications-alert ptv-Alert ptv-AccountProfileAlert\"></div>

      <p class=\"ptv-AccountProfileAction pmd-Text--right\">
        <button class=\"ptv-Button ptv-Button--large\">Enregistrer les modifications</button>
      </p>

    </form>
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/account/_form-notifications.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 18,  39 => 14,  35 => 12,  31 => 11,  19 => 1,);
    }
}
/* <div class="ptv-js-AccountNotifications main ptv-AccountProfile">*/
/* */
/*   <h3 class="ptv-AccountProfile-heading">*/
/*     <span class="ptv-AccountProfile-headingMain">Notifications</span>*/
/*   </h3>*/
/* */
/*   <div class="content ptv-AccountProfileContent">*/
/* */
/*     <form method="post" action="/mon-compte/notifications/" class="ptv-js-AccountNotifications-form">*/
/* */
/*       {% for segment in segments %}*/
/*         <div class="ptv-AccountProfileLine">*/
/*           <p class="ptv-AccountProfileLine-inputField">*/
/*             <input type="checkbox" name="mailing[]" value="{{ segment.id }}" autocomplete="off" {% for subscription in subscriptions %}{% if subscription.id == segment.id %}checked{% endif %}{% endfor %}> <label class="ptv-AccountProfileLine-label" for="mailing">{{ segment.name }}</label>*/
/*           </p>*/
/*         </div>*/
/*       {% endfor %}*/
/* */
/*       <div class="ptv-js-AccountNotifications-alert ptv-Alert ptv-AccountProfileAlert"></div>*/
/* */
/*       <p class="ptv-AccountProfileAction pmd-Text--right">*/
/*         <button class="ptv-Button ptv-Button--large">Enregistrer les modifications</button>*/
/*       </p>*/
/* */
/*     </form>*/
/*   </div>*/
/* */
/* </div>*/
/* */
