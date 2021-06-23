<?php

/* partials/item-product.twig */
class __TwigTemplate_4182e28ecbd5caf6b4b409b6e0c4fdd88b010cd4ac1995bd37a28d24cf9af357 extends Twig_Template
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
        $context["priceInteger"] = twig_round(($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "price", array()) / 100), 0, "floor");
        // line 2
        $context["priceCurrency"] = "€";
        // line 3
        $context["priceDecimal"] = twig_split_filter($this->env, ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "price", array()) / 100), ".");
        // line 4
        echo "
";
        // line 5
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "pack")) {
            // line 6
            echo "  <div class=\"pmd-ProductPackBox\">

    <div class=\"pmd-ProductPackBox-heading\">
      <p class=\"pmd-ProductPackBox-title\">";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "name", array()), "html", null, true);
            echo "</p>
    </div>

    <div class=\"pmd-ProductPackBoxPrice\">
      <div class=\"pmd-ProductPackBoxPrice-inner\">
        <span class=\"pmd-ProductPackBoxPrice-number\">";
            // line 14
            echo twig_escape_filter($this->env, (isset($context["priceInteger"]) ? $context["priceInteger"] : $this->getContext($context, "priceInteger")), "html", null, true);
            echo "</span>
        <span class=\"pmd-ProductPackBoxPrice-info\">";
            // line 15
            echo twig_escape_filter($this->env, (isset($context["priceCurrency"]) ? $context["priceCurrency"] : $this->getContext($context, "priceCurrency")), "html", null, true);
            if (($this->getAttribute((isset($context["priceDecimal"]) ? $context["priceDecimal"] : null), 1, array(), "any", true, true) && ($this->getAttribute((isset($context["priceDecimal"]) ? $context["priceDecimal"] : $this->getContext($context, "priceDecimal")), 1, array()) != "00"))) {
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["priceDecimal"]) ? $context["priceDecimal"] : $this->getContext($context, "priceDecimal")), 1, array()), "html", null, true);
            }
            echo " / mois<br>sans engagement</span>
      </div>
    </div>

    ";
            // line 19
            ob_start();
            // line 20
            echo "      <div class=\"pmd-js-ProductPackChannelsWrapper-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "alias", array()), "html", null, true);
            echo " pmd-ProductPackBox-channels\">
        ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "channels", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
                // line 22
                echo "          <span class=\"pmd-js-TooltipChannel\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
                echo "\">
            <img class=\"pmd-ProductPackBox-channel\" src=\"";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel"], "images", array()), "mini", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
                echo "\" width=\"36\" height=\"36\">
          </span>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "      </div>
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 28
            echo "
    ";
            // line 29
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "channels", array())) > 15)) {
                // line 30
                echo "      <a href=\"#\" data-toggle=\"collapse\" data-target=\".pmd-js-ProductPackChannelsWrapper-";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "alias", array()), "html", null, true);
                echo "\" data-toggle-class=\"pmd-ProductPackBox-channels--full\" class=\"pmd-ProductPackBox-more\">Voir toutes les chaines</a>
    ";
            } else {
                // line 32
                echo "      <span class=\"pmd-ProductPackBox-more\"> </span>
    ";
            }
            // line 34
            echo "
    <div class=\"pmd-ProductPackBox-actionWrapper\">
      <form action=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full_secure", array()), "html", null, true);
            echo "/panier/\" method=\"post\">
        <input type=\"hidden\" name=\"product_alias\" value=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "alias", array()), "html", null, true);
            echo "\">
        ";
            // line 38
            if ((((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "hasTrialPeriod", array(), "method"))) {
                // line 39
                echo "          <button type=\"submit\" class=\"pmd-ProductPackBox-action pmd-Button pmd-Button--lg pmd-Button--block pmd-Button--";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "alias", array()), "html", null, true);
                echo "\">
            <span>Essayer gratuitement</span>
          </button>
        ";
            } else {
                // line 43
                echo "          <button type=\"submit\" class=\"pmd-ProductPackBox-action pmd-Button pmd-Button--lg pmd-Button--block pmd-Button--icon pmd-Button--";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "alias", array()), "html", null, true);
                echo "\">
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--cart pmd-Svg--white\">
              <use xlink:href=\"#pmd-Svg--cart\"></use>
            </svg>
            <span>M'abonner</span>
          </button>
        ";
            }
            // line 50
            echo "      </form>
    </div>

  </div>

";
        } elseif ((        // line 55
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "retail")) {
            // line 56
            echo "
  <div class=\"pmd-ProductPackBox\">

    <div class=\"pmd-ProductPackBox-heading pmd-ProductPackBoxAlternativeHeading ";
            // line 59
            if ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "hasAdultChannel", array())) {
                echo "pmd-ProductRetailBox-adult--highlight";
            }
            echo "\">
      ";
            // line 60
            if ($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "hasAdultChannel", array())) {
                // line 61
                echo "        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--minus18 pmd-ProductRetailBox-adultIcon pmd-Svg--white pmd-SvgEvent\">
          <use xlink:href=\"#pmd-Svg--minus18\"></use>
        </svg>
      ";
            }
            // line 65
            echo "      <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "channel", array()), "images", array()), "small", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "channel", array()), "name", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "channel", array()), "name", array()), "html", null, true);
            echo "\" class=\"pmd-js-Tooltip pmd-ProductPackBoxAlternativeHeading-logo\" width=\"60\" height=\"60\">
      <p class=\"pmd-ProductPackBoxAlternativeHeading-title pmd-Text--truncate\">";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "name", array()), "html", null, true);
            echo "</p>
      <p class=\"pmd-ProductPackBoxAlternativeHeading-description pmd-Text--truncate\">&nbsp;</p>
    </div>

    <div class=\"pmd-ProductPackBoxPrice\">
      <div class=\"pmd-ProductPackBoxPrice-inner\">
        <span class=\"pmd-ProductPackBoxPrice-number\">";
            // line 72
            echo twig_escape_filter($this->env, (isset($context["priceInteger"]) ? $context["priceInteger"] : $this->getContext($context, "priceInteger")), "html", null, true);
            echo "</span>
        <span class=\"pmd-ProductPackBoxPrice-info\">";
            // line 73
            echo twig_escape_filter($this->env, (isset($context["priceCurrency"]) ? $context["priceCurrency"] : $this->getContext($context, "priceCurrency")), "html", null, true);
            if (($this->getAttribute((isset($context["priceDecimal"]) ? $context["priceDecimal"] : null), 1, array(), "any", true, true) && ($this->getAttribute((isset($context["priceDecimal"]) ? $context["priceDecimal"] : $this->getContext($context, "priceDecimal")), 1, array()) != "00"))) {
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["priceDecimal"]) ? $context["priceDecimal"] : $this->getContext($context, "priceDecimal")), 1, array()), "html", null, true);
            }
            echo " / mois<br>sans engagement</span>
      </div>
    </div>

    <div class=\"pmd-ProductPackBox-actionWrapper\">
      <form action=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full_secure", array()), "html", null, true);
            echo "/panier/\" method=\"post\">
        <input type=\"hidden\" name=\"product_alias\" value=\"";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "alias", array()), "html", null, true);
            echo "\">
        ";
            // line 80
            if ((((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "hasTrialPeriod", array(), "method"))) {
                // line 81
                echo "          <button type=\"submit\" class=\"pmd-ProductPackBox-action pmd-Button pmd-Button--lg pmd-Button--block pmd-Button--default\">
            <span>Essayer gratuitement</span>
          </button>
        ";
            } else {
                // line 85
                echo "          <button type=\"submit\" class=\"pmd-ProductPackBox-action pmd-Button pmd-Button--lg pmd-Button--block pmd-Button--icon pmd-Button--default\">
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--cart pmd-Svg--black\">
              <use xlink:href=\"#pmd-Svg--cart\"></use>
            </svg>
            <span>M'abonner</span>
          </button>
        ";
            }
            // line 92
            echo "      </form>
    </div>

  </div>

";
        }
    }

    public function getTemplateName()
    {
        return "partials/item-product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 92,  215 => 85,  209 => 81,  207 => 80,  203 => 79,  199 => 78,  187 => 73,  183 => 72,  174 => 66,  165 => 65,  159 => 61,  157 => 60,  151 => 59,  146 => 56,  144 => 55,  137 => 50,  126 => 43,  118 => 39,  116 => 38,  112 => 37,  108 => 36,  104 => 34,  100 => 32,  94 => 30,  92 => 29,  89 => 28,  85 => 26,  74 => 23,  69 => 22,  65 => 21,  60 => 20,  58 => 19,  47 => 15,  43 => 14,  35 => 9,  30 => 6,  28 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set priceInteger = (product.price/100)|round(0, 'floor') %}*/
/* {% set priceCurrency = '€' %}*/
/* {% set priceDecimal = (product.price/100)|split('.') %}*/
/* */
/* {% if type == 'pack' %}*/
/*   <div class="pmd-ProductPackBox">*/
/* */
/*     <div class="pmd-ProductPackBox-heading">*/
/*       <p class="pmd-ProductPackBox-title">{{ product.name }}</p>*/
/*     </div>*/
/* */
/*     <div class="pmd-ProductPackBoxPrice">*/
/*       <div class="pmd-ProductPackBoxPrice-inner">*/
/*         <span class="pmd-ProductPackBoxPrice-number">{{ priceInteger }}</span>*/
/*         <span class="pmd-ProductPackBoxPrice-info">{{ priceCurrency }}{% if priceDecimal.1 is defined and priceDecimal.1 != '00' %},{{ priceDecimal.1 }}{% endif %} / mois<br>sans engagement</span>*/
/*       </div>*/
/*     </div>*/
/* */
/*     {% spaceless %}*/
/*       <div class="pmd-js-ProductPackChannelsWrapper-{{ product.alias }} pmd-ProductPackBox-channels">*/
/*         {% for channel in product.channels %}*/
/*           <span class="pmd-js-TooltipChannel" title="{{ channel.name }}">*/
/*             <img class="pmd-ProductPackBox-channel" src="{{ channel.images.mini }}" alt="{{ channel.name }}" width="36" height="36">*/
/*           </span>*/
/*         {% endfor %}*/
/*       </div>*/
/*     {% endspaceless %}*/
/* */
/*     {% if product.channels|length > 15 %}*/
/*       <a href="#" data-toggle="collapse" data-target=".pmd-js-ProductPackChannelsWrapper-{{ product.alias }}" data-toggle-class="pmd-ProductPackBox-channels--full" class="pmd-ProductPackBox-more">Voir toutes les chaines</a>*/
/*     {% else %}*/
/*       <span class="pmd-ProductPackBox-more"> </span>*/
/*     {% endif %}*/
/* */
/*     <div class="pmd-ProductPackBox-actionWrapper">*/
/*       <form action="{{ hosts.current_full_secure }}/panier/" method="post">*/
/*         <input type="hidden" name="product_alias" value="{{ product.alias }}">*/
/*         {% if is_connected == false or current_account.hasTrialPeriod() %}*/
/*           <button type="submit" class="pmd-ProductPackBox-action pmd-Button pmd-Button--lg pmd-Button--block pmd-Button--{{ product.alias }}">*/
/*             <span>Essayer gratuitement</span>*/
/*           </button>*/
/*         {% else %}*/
/*           <button type="submit" class="pmd-ProductPackBox-action pmd-Button pmd-Button--lg pmd-Button--block pmd-Button--icon pmd-Button--{{ product.alias }}">*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--cart pmd-Svg--white">*/
/*               <use xlink:href="#pmd-Svg--cart"></use>*/
/*             </svg>*/
/*             <span>M'abonner</span>*/
/*           </button>*/
/*         {% endif %}*/
/*       </form>*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/* {% elseif type == 'retail' %}*/
/* */
/*   <div class="pmd-ProductPackBox">*/
/* */
/*     <div class="pmd-ProductPackBox-heading pmd-ProductPackBoxAlternativeHeading {% if product.hasAdultChannel %}pmd-ProductRetailBox-adult--highlight{% endif %}">*/
/*       {% if product.hasAdultChannel %}*/
/*         <svg role="img" class="pmd-Svg pmd-Svg--minus18 pmd-ProductRetailBox-adultIcon pmd-Svg--white pmd-SvgEvent">*/
/*           <use xlink:href="#pmd-Svg--minus18"></use>*/
/*         </svg>*/
/*       {% endif %}*/
/*       <img src="{{ product.channel.images.small }}" alt="{{ product.channel.name }}" title="{{ product.channel.name }}" class="pmd-js-Tooltip pmd-ProductPackBoxAlternativeHeading-logo" width="60" height="60">*/
/*       <p class="pmd-ProductPackBoxAlternativeHeading-title pmd-Text--truncate">{{ product.name }}</p>*/
/*       <p class="pmd-ProductPackBoxAlternativeHeading-description pmd-Text--truncate">&nbsp;</p>*/
/*     </div>*/
/* */
/*     <div class="pmd-ProductPackBoxPrice">*/
/*       <div class="pmd-ProductPackBoxPrice-inner">*/
/*         <span class="pmd-ProductPackBoxPrice-number">{{ priceInteger }}</span>*/
/*         <span class="pmd-ProductPackBoxPrice-info">{{ priceCurrency }}{% if priceDecimal.1 is defined and priceDecimal.1 != '00' %},{{ priceDecimal.1 }}{% endif %} / mois<br>sans engagement</span>*/
/*       </div>*/
/*     </div>*/
/* */
/*     <div class="pmd-ProductPackBox-actionWrapper">*/
/*       <form action="{{ hosts.current_full_secure }}/panier/" method="post">*/
/*         <input type="hidden" name="product_alias" value="{{ product.alias }}">*/
/*         {% if is_connected == false or current_account.hasTrialPeriod() %}*/
/*           <button type="submit" class="pmd-ProductPackBox-action pmd-Button pmd-Button--lg pmd-Button--block pmd-Button--default">*/
/*             <span>Essayer gratuitement</span>*/
/*           </button>*/
/*         {% else %}*/
/*           <button type="submit" class="pmd-ProductPackBox-action pmd-Button pmd-Button--lg pmd-Button--block pmd-Button--icon pmd-Button--default">*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--cart pmd-Svg--black">*/
/*               <use xlink:href="#pmd-Svg--cart"></use>*/
/*             </svg>*/
/*             <span>M'abonner</span>*/
/*           </button>*/
/*         {% endif %}*/
/*       </form>*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/* {% endif %}*/
/* */
