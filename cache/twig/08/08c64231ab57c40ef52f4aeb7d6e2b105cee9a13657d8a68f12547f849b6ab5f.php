<?php

/* controllers/player/_not-subscribed.twig */
class __TwigTemplate_12fd4cc9da0ce6e9d309ea6197f45dcf9b8c59a93eb5499492c481a52d918d2c extends Twig_Template
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
        echo "<div class=\"pmd-HandleChannel-subtitle\">
  <span>
  ";
        // line 3
        if ((((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "hasTrialPeriod", array(), "method"))) {
            // line 4
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("not_subcribed.tagline_trial_period", array("%days%" => (isset($context["trial_period_days"]) ? $context["trial_period_days"] : $this->getContext($context, "trial_period_days"))), "player");
            // line 5
            echo "  ";
        } else {
            // line 6
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("not_subcribed.tagline", array("%price%" => twig_number_format_filter($this->env, ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "price", array()) / 100), 2, ","), "%currency%" => "€"), "player");
            // line 7
            echo "  ";
        }
        // line 8
        echo "  </span>
</div>

<div class=\"pmd-HandleChannel-container\">
  <ul class=\"pmd-HandleChannel-list\">
    <li class=\"pmd-HandleChannel-listItem\">
      <span class=\"pmd-HandleChannel-text\">
        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--noentry pmd-Svg--white pmd-HandleChannel-svg\">
          <use xlink:href=\"#pmd-Svg--noentry\"></use>
        </svg> ";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("no_ads", array(), "player");
        // line 18
        echo "      </span>
    </li>

    <li class=\"pmd-HandleChannel-listItem\">
      <span class=\"pmd-HandleChannel-text\">
        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--hd pmd-Svg--white pmd-HandleChannel-svg\">
          <use xlink:href=\"#pmd-Svg--hd\"></use>
        </svg> ";
        // line 25
        echo $this->env->getExtension('translator')->getTranslator()->trans("hi_quality", array(), "player");
        // line 26
        echo "      </span>
    </li>

    <li class=\"pmd-HandleChannel-listItem\">
      <span class=\"pmd-HandleChannel-text\">
        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--tick2 pmd-Svg--white pmd-HandleChannel-svg\">
          <use xlink:href=\"#pmd-Svg--tick2\"></use>
        </svg> ";
        // line 33
        echo $this->env->getExtension('translator')->getTranslator()->trans("free_of_engagement", array(), "player");
        // line 34
        echo "      </span>
    </li>
  </ul>
</div>

";
        // line 39
        if (((isset($context["mode"]) ? $context["mode"] : $this->getContext($context, "mode")) == "embeddable")) {
            // line 40
            echo "<div>
  <button type=\"button\" class=\"pmd-js-ExternalPaymentLink r-ResetButton pmd-Button pmd-Button--premium pmd-Button--lg pmd-PromoteRetailChannel-button pmd-Button--boldAlt\">
  ";
            // line 42
            if ((((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "hasTrialPeriod", array(), "method"))) {
                // line 43
                echo "    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("try_for_free", array(), "player");
                // line 44
                echo "  ";
            } else {
                // line 45
                echo "    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("discover_channel", array(), "player");
                // line 46
                echo "  ";
            }
            // line 47
            echo "  </button>
</div>
<script>
  (function() {
    document.querySelector('.pmd-js-ExternalPaymentLink').addEventListener('click', function( e ) {
      e.preventDefault()

      var popup = window.open('";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full_secure", array()), "html", null, true);
            echo "/panier/?product_alias=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "alias", array()), "html", null, true);
            echo "', 'Play TV - Paiement', \"width=1024,height=768,resizable=1,scrollbars=yes\")

      // check if popup is closed or not
      var timer = setInterval(function() {
        if( popup.closed ) {
          clearInterval( timer )
          window.location.href = window.location.href
        }
      }, 3000)
    })
  })()
</script>
";
        } else {
            // line 67
            echo "<div>
  <button
    type=\"button\"
    class=\"pmd-js-LinkParent r-ResetButton pmd-Button pmd-Button--premium pmd-Button--lg pmd-PromoteRetailChannel-button pmd-Button--boldAlt\"
    data-href=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full_secure", array()), "html", null, true);
            echo "/panier/?product_alias=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "alias", array()), "html", null, true);
            echo "\"
  >
  ";
            // line 73
            if ((((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "hasTrialPeriod", array(), "method"))) {
                // line 74
                echo "    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("try_for_free", array(), "player");
                // line 75
                echo "  ";
            } else {
                // line 76
                echo "    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("discover_channel", array(), "player");
                // line 77
                echo "  ";
            }
            // line 78
            echo "  </button>
</div>

<script>
document.querySelector('.pmd-js-LinkParent').addEventListener('click', function ( e ) {
  e.preventDefault()

  window.parent.location.href = this.getAttribute('data-href')
})
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/player/_not-subscribed.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 78,  150 => 77,  147 => 76,  144 => 75,  141 => 74,  139 => 73,  132 => 71,  126 => 67,  108 => 54,  99 => 47,  96 => 46,  93 => 45,  90 => 44,  87 => 43,  85 => 42,  81 => 40,  79 => 39,  72 => 34,  70 => 33,  61 => 26,  59 => 25,  50 => 18,  48 => 17,  37 => 8,  34 => 7,  31 => 6,  28 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="pmd-HandleChannel-subtitle">*/
/*   <span>*/
/*   {% if is_connected == false or current_account.hasTrialPeriod() %}*/
/*     {% trans with {'%days%': trial_period_days} from "player" %}not_subcribed.tagline_trial_period{% endtrans %}*/
/*   {% else %}*/
/*     {% trans with {'%price%': (product.price/100)|number_format(2, ','), '%currency%': '€'} from "player" %}not_subcribed.tagline{% endtrans %}*/
/*   {% endif %}*/
/*   </span>*/
/* </div>*/
/* */
/* <div class="pmd-HandleChannel-container">*/
/*   <ul class="pmd-HandleChannel-list">*/
/*     <li class="pmd-HandleChannel-listItem">*/
/*       <span class="pmd-HandleChannel-text">*/
/*         <svg role="img" class="pmd-Svg pmd-Svg--noentry pmd-Svg--white pmd-HandleChannel-svg">*/
/*           <use xlink:href="#pmd-Svg--noentry"></use>*/
/*         </svg> {% trans from "player" %}no_ads{% endtrans %}*/
/*       </span>*/
/*     </li>*/
/* */
/*     <li class="pmd-HandleChannel-listItem">*/
/*       <span class="pmd-HandleChannel-text">*/
/*         <svg role="img" class="pmd-Svg pmd-Svg--hd pmd-Svg--white pmd-HandleChannel-svg">*/
/*           <use xlink:href="#pmd-Svg--hd"></use>*/
/*         </svg> {% trans from "player" %}hi_quality{% endtrans %}*/
/*       </span>*/
/*     </li>*/
/* */
/*     <li class="pmd-HandleChannel-listItem">*/
/*       <span class="pmd-HandleChannel-text">*/
/*         <svg role="img" class="pmd-Svg pmd-Svg--tick2 pmd-Svg--white pmd-HandleChannel-svg">*/
/*           <use xlink:href="#pmd-Svg--tick2"></use>*/
/*         </svg> {% trans from "player" %}free_of_engagement{% endtrans %}*/
/*       </span>*/
/*     </li>*/
/*   </ul>*/
/* </div>*/
/* */
/* {% if mode == 'embeddable' %}*/
/* <div>*/
/*   <button type="button" class="pmd-js-ExternalPaymentLink r-ResetButton pmd-Button pmd-Button--premium pmd-Button--lg pmd-PromoteRetailChannel-button pmd-Button--boldAlt">*/
/*   {% if is_connected == false or current_account.hasTrialPeriod() %}*/
/*     {% trans from "player" %}try_for_free{% endtrans %}*/
/*   {% else %}*/
/*     {% trans from "player" %}discover_channel{% endtrans %}*/
/*   {% endif %}*/
/*   </button>*/
/* </div>*/
/* <script>*/
/*   (function() {*/
/*     document.querySelector('.pmd-js-ExternalPaymentLink').addEventListener('click', function( e ) {*/
/*       e.preventDefault()*/
/* */
/*       var popup = window.open('{{ hosts.current_full_secure }}/panier/?product_alias={{ product.alias }}', 'Play TV - Paiement', "width=1024,height=768,resizable=1,scrollbars=yes")*/
/* */
/*       // check if popup is closed or not*/
/*       var timer = setInterval(function() {*/
/*         if( popup.closed ) {*/
/*           clearInterval( timer )*/
/*           window.location.href = window.location.href*/
/*         }*/
/*       }, 3000)*/
/*     })*/
/*   })()*/
/* </script>*/
/* {% else %}*/
/* <div>*/
/*   <button*/
/*     type="button"*/
/*     class="pmd-js-LinkParent r-ResetButton pmd-Button pmd-Button--premium pmd-Button--lg pmd-PromoteRetailChannel-button pmd-Button--boldAlt"*/
/*     data-href="{{ hosts.current_full_secure }}/panier/?product_alias={{ product.alias }}"*/
/*   >*/
/*   {% if is_connected == false or current_account.hasTrialPeriod() %}*/
/*     {% trans from "player" %}try_for_free{% endtrans %}*/
/*   {% else %}*/
/*     {% trans from "player" %}discover_channel{% endtrans %}*/
/*   {% endif %}*/
/*   </button>*/
/* </div>*/
/* */
/* <script>*/
/* document.querySelector('.pmd-js-LinkParent').addEventListener('click', function ( e ) {*/
/*   e.preventDefault()*/
/* */
/*   window.parent.location.href = this.getAttribute('data-href')*/
/* })*/
/* </script>*/
/* {% endif %}*/
/* */
