<?php

/* controllers/account/_offer.twig */
class __TwigTemplate_dfa73b70682b46b83fdba311b23c7881db271119ea3bd79be1263a0b76564de9 extends Twig_Template
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
        echo "<div class=\"ptv-AccountProfile\">

  ";
        // line 3
        if ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isFreemium", array())) {
            // line 4
            echo "
    <h3 class=\"ptv-AccountProfile-heading pmd-FormLayout-heading\">
      <span class=\"ptv-AccountProfile-headingMain\">Mes abonnements en cours</span>
    </h3>

    <div class=\"ptv-AccountProfileContent\">

      <div class=\"pmd-Alert pmd-Alert--note\">
        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--warning pmd-Svg--orange pmd-Alert--noteWarning\">
          <use xlink:href=\"#pmd-Svg--warning\"></use>
        </svg>
        <p>Vous profitez actuellement de Play TV gratuitement. Pour regarder <strong>plus de chaînes, sans publicité et en haute qualité</strong>, découvrez l’offre PREMIUM ou les packs exclusifs.</p>
      </div>

      <div class=\"pmd-ProductList\">

        ";
            // line 20
            if (((isset($context["device"]) ? $context["device"] : $this->getContext($context, "device")) == "mobile")) {
                // line 21
                echo "        <a class=\"pmd-Button pmd-Button--block pmd-Button--blue pmd-Form-buttonSubmit\" href=\"/nos-offres/\">
          <span>Découvrir les offres</span>
        </a>
        ";
            } else {
                // line 25
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["suggested_products"]) ? $context["suggested_products"] : $this->getContext($context, "suggested_products")));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 26
                    echo "
            ";
                    // line 27
                    if (($this->getAttribute($context["product"], "type", array()) == "pack")) {
                        // line 28
                        echo "              ";
                        $this->loadTemplate("partials/item-product.twig", "controllers/account/_offer.twig", 28)->display(array_merge($context, array("type" => "pack")));
                        // line 29
                        echo "            ";
                    } elseif (($this->getAttribute($context["product"], "type", array()) == "retail")) {
                        // line 30
                        echo "              ";
                        $this->loadTemplate("partials/item-product.twig", "controllers/account/_offer.twig", 30)->display(array_merge($context, array("type" => "retail")));
                        // line 31
                        echo "            ";
                    }
                    // line 32
                    echo "
          ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 34
                echo "        ";
            }
            // line 35
            echo "      </div>

    </div>

  ";
        } else {
            // line 40
            echo "
    ";
            // line 41
            $context["prepaid"] = array();
            // line 42
            echo "    ";
            $context["running"] = array();
            // line 43
            echo "    ";
            $context["cancelled"] = array();
            // line 44
            echo "
    ";
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "subscriptions", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["subscription"]) {
                // line 46
                echo "      ";
                if (($this->getAttribute($this->getAttribute($context["subscription"], "product", array()), "type", array()) == "prepaid")) {
                    // line 47
                    echo "        ";
                    $context["prepaid"] = twig_array_merge((isset($context["prepaid"]) ? $context["prepaid"] : $this->getContext($context, "prepaid")), array($this->getAttribute($context["loop"], "index0", array()) => $context["subscription"]));
                    // line 48
                    echo "      ";
                } elseif ($this->getAttribute($context["subscription"], "cancelledAt", array(), "any", true, true)) {
                    // line 49
                    echo "        ";
                    $context["cancelled"] = twig_array_merge((isset($context["cancelled"]) ? $context["cancelled"] : $this->getContext($context, "cancelled")), array($this->getAttribute($context["loop"], "index0", array()) => $context["subscription"]));
                    // line 50
                    echo "      ";
                } else {
                    // line 51
                    echo "        ";
                    $context["running"] = twig_array_merge((isset($context["running"]) ? $context["running"] : $this->getContext($context, "running")), array($this->getAttribute($context["loop"], "index0", array()) => $context["subscription"]));
                    // line 52
                    echo "      ";
                }
                // line 53
                echo "    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "
    ";
            // line 55
            if ((twig_length_filter($this->env, (isset($context["running"]) ? $context["running"] : $this->getContext($context, "running"))) > 0)) {
                // line 56
                echo "
      <h3 class=\"ptv-AccountProfile-heading pmd-FormLayout-heading\">
        <span class=\"ptv-AccountProfile-headingMain\">Mes abonnements en cours</span>
      </h3>

      <div class=\"ptv-AccountProfileContent ptv-AccountProfileOffer\">

        ";
                // line 63
                if (array_key_exists("error", $context)) {
                    // line 64
                    echo "        <div class=\"pmd-Alert pmd-Alert--danger pmd-Alert--active\">
          <p>";
                    // line 65
                    echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                    echo "</p>
        </div>
        ";
                }
                // line 68
                echo "
        <table class=\"pmd-AccountSubscriptionsList\">
          <thead class=\"pmd-AccountSubscriptionsList-heading\">
            <th>Produit</th>
            ";
                // line 73
                echo "            ";
                // line 74
                echo "            <th>Montant</th>
            <th></th>
          </thead>
          <tbody>
            ";
                // line 78
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["running"]) ? $context["running"] : $this->getContext($context, "running")));
                foreach ($context['_seq'] as $context["_key"] => $context["subscription"]) {
                    // line 79
                    echo "              <tr class=\"pmd-AccountSubscriptionsList-row\">
                <td>";
                    // line 80
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["subscription"], "product", array()), "name", array()), "html", null, true);
                    echo "</td>
                ";
                    // line 87
                    echo "                <td>
                  ";
                    // line 88
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($this->getAttribute($context["subscription"], "product", array()), "price", array()) / 100), 2, ","), "html", null, true);
                    echo "€ /mois
                </td>
                <td>
                  <form action=\"/mon-compte/abonnements/resilier/\" method=\"post\" class=\"ptv-js-AccountProfile-removeSubscriptionForm\">
                    <input type=\"hidden\" name=\"product_id\" value=\"";
                    // line 92
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["subscription"], "product", array()), "id", array()), "html", null, true);
                    echo "\">
                    <button type=\"submit\" class=\"pmd-Button pmd-Button--link\">Résilier</button>
                  </form>
                </td>
              </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 98
                echo "          </tbody>
        </table>

      </div>

    ";
            }
            // line 104
            echo "
    ";
            // line 105
            if ((twig_length_filter($this->env, (isset($context["prepaid"]) ? $context["prepaid"] : $this->getContext($context, "prepaid"))) > 0)) {
                // line 106
                echo "    <h3 class=\"ptv-AccountProfile-heading pmd-FormLayout-heading\">
      <span class=\"ptv-AccountProfile-headingMain\">Mes abonnements prépayés</span>
    </h3>

    <div class=\"ptv-AccountProfileContent ptv-AccountProfileOffer\">

      <table class=\"pmd-AccountSubscriptionsList\">
        <thead class=\"pmd-AccountSubscriptionsList-heading\">
          <th>Produit</th>
          <th>Créé le</th>
          <th>Expire le</th>
        </thead>
        <tbody>
          ";
                // line 119
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["prepaid"]) ? $context["prepaid"] : $this->getContext($context, "prepaid")));
                foreach ($context['_seq'] as $context["_key"] => $context["subscription"]) {
                    // line 120
                    echo "            <tr class=\"pmd-AccountSubscriptionsList-row\">
              <td>";
                    // line 121
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["subscription"], "product", array()), "name", array()), "html", null, true);
                    echo "</td>
              <td>";
                    // line 122
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["subscription"], "createdAt", array()), "d/m/Y"), "html", null, true);
                    echo "</td>
              <td>
                ";
                    // line 124
                    if ($this->getAttribute($this->getAttribute($context["subscription"], "product", array()), "isEndless", array())) {
                        // line 125
                        echo "                  Abonnement à vie
                ";
                    } else {
                        // line 127
                        echo "                  ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["subscription"], "expiredAt", array()), "d/m/Y"), "html", null, true);
                        echo "
                ";
                    }
                    // line 129
                    echo "              </td>
            </tr>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 132
                echo "        </tbody>
      </table>

    </div>

    ";
            }
            // line 138
            echo "
    ";
            // line 139
            if ((twig_length_filter($this->env, (isset($context["cancelled"]) ? $context["cancelled"] : $this->getContext($context, "cancelled"))) > 0)) {
                // line 140
                echo "    <h3 class=\"ptv-AccountProfile-heading pmd-FormLayout-heading\">
      <span class=\"ptv-AccountProfile-headingMain\">Mes abonnements en cours de résiliation</span>
    </h3>

    <div class=\"ptv-AccountProfileContent ptv-AccountProfileOffer\">

      <table class=\"pmd-AccountSubscriptionsList\">
        <thead class=\"pmd-AccountSubscriptionsList-heading\">
          <th>Produit</th>
          <th>Expire le</th>
          ";
                // line 151
                echo "          <th>Montant</th>
          ";
                // line 153
                echo "        </thead>
        <tbody>
          ";
                // line 155
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["cancelled"]) ? $context["cancelled"] : $this->getContext($context, "cancelled")));
                foreach ($context['_seq'] as $context["_key"] => $context["subscription"]) {
                    // line 156
                    echo "            <tr class=\"pmd-AccountSubscriptionsList-row\">
              <td>";
                    // line 157
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["subscription"], "product", array()), "name", array()), "html", null, true);
                    echo "</td>
              <td>
                ";
                    // line 159
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["subscription"], "expiredAt", array()), "d/m/Y"), "html", null, true);
                    echo "
              </td>
";
                    // line 166
                    echo "              <td>
                ";
                    // line 167
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($this->getAttribute($context["subscription"], "product", array()), "price", array()) / 100), 2, ","), "html", null, true);
                    echo "€ /mois
              </td>
";
                    // line 177
                    echo "            </tr>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 179
                echo "        </tbody>
      </table>

    </div>

    ";
            }
            // line 185
            echo "
  ";
        }
        // line 187
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/account/_offer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  389 => 187,  385 => 185,  377 => 179,  370 => 177,  365 => 167,  362 => 166,  357 => 159,  352 => 157,  349 => 156,  345 => 155,  341 => 153,  338 => 151,  326 => 140,  324 => 139,  321 => 138,  313 => 132,  305 => 129,  299 => 127,  295 => 125,  293 => 124,  288 => 122,  284 => 121,  281 => 120,  277 => 119,  262 => 106,  260 => 105,  257 => 104,  249 => 98,  237 => 92,  230 => 88,  227 => 87,  223 => 80,  220 => 79,  216 => 78,  210 => 74,  208 => 73,  202 => 68,  196 => 65,  193 => 64,  191 => 63,  182 => 56,  180 => 55,  177 => 54,  163 => 53,  160 => 52,  157 => 51,  154 => 50,  151 => 49,  148 => 48,  145 => 47,  142 => 46,  125 => 45,  122 => 44,  119 => 43,  116 => 42,  114 => 41,  111 => 40,  104 => 35,  101 => 34,  86 => 32,  83 => 31,  80 => 30,  77 => 29,  74 => 28,  72 => 27,  69 => 26,  51 => 25,  45 => 21,  43 => 20,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="ptv-AccountProfile">*/
/* */
/*   {% if current_account.isFreemium %}*/
/* */
/*     <h3 class="ptv-AccountProfile-heading pmd-FormLayout-heading">*/
/*       <span class="ptv-AccountProfile-headingMain">Mes abonnements en cours</span>*/
/*     </h3>*/
/* */
/*     <div class="ptv-AccountProfileContent">*/
/* */
/*       <div class="pmd-Alert pmd-Alert--note">*/
/*         <svg role="img" class="pmd-Svg pmd-Svg--warning pmd-Svg--orange pmd-Alert--noteWarning">*/
/*           <use xlink:href="#pmd-Svg--warning"></use>*/
/*         </svg>*/
/*         <p>Vous profitez actuellement de Play TV gratuitement. Pour regarder <strong>plus de chaînes, sans publicité et en haute qualité</strong>, découvrez l’offre PREMIUM ou les packs exclusifs.</p>*/
/*       </div>*/
/* */
/*       <div class="pmd-ProductList">*/
/* */
/*         {% if device == 'mobile' %}*/
/*         <a class="pmd-Button pmd-Button--block pmd-Button--blue pmd-Form-buttonSubmit" href="/nos-offres/">*/
/*           <span>Découvrir les offres</span>*/
/*         </a>*/
/*         {% else %}*/
/*           {% for product in suggested_products %}*/
/* */
/*             {% if product.type == "pack" %}*/
/*               {% include "partials/item-product.twig" with {'type': "pack"} %}*/
/*             {% elseif product.type == "retail" %}*/
/*               {% include "partials/item-product.twig" with {'type': "retail"} %}*/
/*             {% endif %}*/
/* */
/*           {% endfor %}*/
/*         {% endif %}*/
/*       </div>*/
/* */
/*     </div>*/
/* */
/*   {% else %}*/
/* */
/*     {% set prepaid = [] %}*/
/*     {% set running = [] %}*/
/*     {% set cancelled = [] %}*/
/* */
/*     {% for subscription in current_account.subscriptions %}*/
/*       {% if subscription.product.type == 'prepaid' %}*/
/*         {% set prepaid = prepaid|merge({ (loop.index0) : subscription }) %}*/
/*       {% elseif subscription.cancelledAt is defined %}*/
/*         {% set cancelled = cancelled|merge({ (loop.index0) : subscription }) %}*/
/*       {% else %}*/
/*         {% set running = running|merge({ (loop.index0) : subscription }) %}*/
/*       {% endif %}*/
/*     {% endfor %}*/
/* */
/*     {% if running|length > 0 %}*/
/* */
/*       <h3 class="ptv-AccountProfile-heading pmd-FormLayout-heading">*/
/*         <span class="ptv-AccountProfile-headingMain">Mes abonnements en cours</span>*/
/*       </h3>*/
/* */
/*       <div class="ptv-AccountProfileContent ptv-AccountProfileOffer">*/
/* */
/*         {% if error is defined %}*/
/*         <div class="pmd-Alert pmd-Alert--danger pmd-Alert--active">*/
/*           <p>{{ error }}</p>*/
/*         </div>*/
/*         {% endif %}*/
/* */
/*         <table class="pmd-AccountSubscriptionsList">*/
/*           <thead class="pmd-AccountSubscriptionsList-heading">*/
/*             <th>Produit</th>*/
/*             {# <th>Expire le</th> #}*/
/*             {# <th>Etat</th> #}*/
/*             <th>Montant</th>*/
/*             <th></th>*/
/*           </thead>*/
/*           <tbody>*/
/*             {% for subscription in running %}*/
/*               <tr class="pmd-AccountSubscriptionsList-row">*/
/*                 <td>{{ subscription.product.name }}</td>*/
/*                 {# <td>-</td> #}*/
/* {#                 <td>*/
/*                   <svg role="img" class="pmd-Svg pmd-Svg--tick pmd-Svg--green">*/
/*                     <use xlink:href="#pmd-Svg--tick"></use>*/
/*                   </svg>*/
/*                 </td> #}*/
/*                 <td>*/
/*                   {{ (subscription.product.price/100)|number_format(2, ',') }}€ /mois*/
/*                 </td>*/
/*                 <td>*/
/*                   <form action="/mon-compte/abonnements/resilier/" method="post" class="ptv-js-AccountProfile-removeSubscriptionForm">*/
/*                     <input type="hidden" name="product_id" value="{{ subscription.product.id }}">*/
/*                     <button type="submit" class="pmd-Button pmd-Button--link">Résilier</button>*/
/*                   </form>*/
/*                 </td>*/
/*               </tr>*/
/*             {% endfor %}*/
/*           </tbody>*/
/*         </table>*/
/* */
/*       </div>*/
/* */
/*     {% endif %}*/
/* */
/*     {% if prepaid|length > 0 %}*/
/*     <h3 class="ptv-AccountProfile-heading pmd-FormLayout-heading">*/
/*       <span class="ptv-AccountProfile-headingMain">Mes abonnements prépayés</span>*/
/*     </h3>*/
/* */
/*     <div class="ptv-AccountProfileContent ptv-AccountProfileOffer">*/
/* */
/*       <table class="pmd-AccountSubscriptionsList">*/
/*         <thead class="pmd-AccountSubscriptionsList-heading">*/
/*           <th>Produit</th>*/
/*           <th>Créé le</th>*/
/*           <th>Expire le</th>*/
/*         </thead>*/
/*         <tbody>*/
/*           {% for subscription in prepaid %}*/
/*             <tr class="pmd-AccountSubscriptionsList-row">*/
/*               <td>{{ subscription.product.name }}</td>*/
/*               <td>{{ subscription.createdAt|date("d/m/Y") }}</td>*/
/*               <td>*/
/*                 {% if subscription.product.isEndless %}*/
/*                   Abonnement à vie*/
/*                 {% else %}*/
/*                   {{ subscription.expiredAt|date("d/m/Y") }}*/
/*                 {% endif %}*/
/*               </td>*/
/*             </tr>*/
/*           {% endfor %}*/
/*         </tbody>*/
/*       </table>*/
/* */
/*     </div>*/
/* */
/*     {% endif %}*/
/* */
/*     {% if cancelled|length > 0 %}*/
/*     <h3 class="ptv-AccountProfile-heading pmd-FormLayout-heading">*/
/*       <span class="ptv-AccountProfile-headingMain">Mes abonnements en cours de résiliation</span>*/
/*     </h3>*/
/* */
/*     <div class="ptv-AccountProfileContent ptv-AccountProfileOffer">*/
/* */
/*       <table class="pmd-AccountSubscriptionsList">*/
/*         <thead class="pmd-AccountSubscriptionsList-heading">*/
/*           <th>Produit</th>*/
/*           <th>Expire le</th>*/
/*           {# <th>Etat</th> #}*/
/*           <th>Montant</th>*/
/*           {# <th></th> #}*/
/*         </thead>*/
/*         <tbody>*/
/*           {% for subscription in cancelled %}*/
/*             <tr class="pmd-AccountSubscriptionsList-row">*/
/*               <td>{{ subscription.product.name }}</td>*/
/*               <td>*/
/*                 {{ subscription.expiredAt|date("d/m/Y") }}*/
/*               </td>*/
/* {#               <td>*/
/*                 <svg role="img" class="pmd-Svg pmd-Svg--cross pmd-Svg--red">*/
/*                   <use xlink:href="#pmd-Svg--cross"></use>*/
/*                 </svg>*/
/*               </td> #}*/
/*               <td>*/
/*                 {{ (subscription.product.price/100)|number_format(2, ',') }}€ /mois*/
/*               </td>*/
/* {#               <td>*/
/*                 <a class="ptv-Button ptv-Button--disabled">*/
/*                   <svg role="img" class="pmd-Svg pmd-Svg--tick pmd-Svg--white">*/
/*                     <use xlink:href="#pmd-Svg--tick"></use>*/
/*                   </svg>*/
/*                   Résilié*/
/*                 </a>*/
/*               </td> #}*/
/*             </tr>*/
/*           {% endfor %}*/
/*         </tbody>*/
/*       </table>*/
/* */
/*     </div>*/
/* */
/*     {% endif %}*/
/* */
/*   {% endif %}*/
/* */
/* </div>*/
/* */
