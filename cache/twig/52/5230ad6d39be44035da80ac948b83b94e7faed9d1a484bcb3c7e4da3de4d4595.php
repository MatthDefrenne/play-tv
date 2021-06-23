<?php

/* controllers/faq/adblock.twig */
class __TwigTemplate_dae275f68ea8ba767013f1ace81f7a0c7de6739e95b6777cbb782298f2b9dc74 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/adblock.twig", 2);
        $this->blocks = array(
            'faq_content' => array($this, 'block_faq_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "controllers/faq/_header.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_faq_content($context, array $blocks = array())
    {
        // line 4
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 5
            echo "<div class=\"ptv-Notifier ptv-Notifier--alert ptv-Notifier--active\">
  <p>";
            // line 6
            echo $this->env->getExtension('translator')->getTranslator()->trans("Warning, the latest version of Adblock Plus isn't compatible anymore with our website. Please <a href=\"#adb-happen\" style=\"color: white;\">see why</a>.", array(), "messages");
            echo "</p>
</div>
";
        }
        // line 9
        echo "<h2 class=\"margin\">";
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            echo "1.4. ";
        }
        echo $this->env->getExtension('translator')->getTranslator()->trans("My browser has been redirected after I wanted to watch a stream", array(), "messages");
        echo "</h2>
<p>
  <strong>";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("You have been redirected because we think you are using Adblock Plus.", array(), "messages");
        echo "</strong>
</p>
<p>
  ";
        // line 14
        echo $this->env->getExtension('translator')->getTranslator()->trans("We do not detect you have a plugin, we simply verify if the ads are well displayed after the loading of the page. If it's not the case, the access of our service is defiend and we assume you use this kind of software. <strong>You are free to disable or not the plugin on our website.</strong>", array(), "messages");
        echo "</strong>
</p>
<p>";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("You are also free not to come on our website.", array(), "messages");
        echo "</p>
<!-- <p>
  Nous avons fait le choix d'un modèle basé sur la publicité mais gratuit pour l'utilisateur final contrairement à d'autres opérateurs qui proposent un abonnement payant. Ces recettes nous permettent de couvrir notamment une partie des charges de diffusion. Ce modèle permet à des millions d'internautes de profiter de programmes en direct chaque mois.
</p> -->
<p>
  ";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("Our system has detected that you are blocking ads with <a href=\"https://adblockplus.org/\" target=\"_blank\" rel=\"nofollow\"><strong>Adblock Plus</strong></a> or a similar software.", array(), "messages");
        // line 24
        echo "</p>
<p class=\"bigger\">
  <strong>
  ";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("To watch TV on %host%, please disable this software.", array("%host%" => $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array())), "messages");
        // line 28
        echo "  </strong>.
</p>
<h3>
  ";
        // line 31
        echo $this->env->getExtension('translator')->getTranslator()->trans("How to disable Adblock Plus for %host%?", array("%host%" => $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array())), "messages");
        // line 34
        echo "</h3>
<div class=\"image\">
  <img src=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-adblock.png\" alt=\"Adblock\">
</div>
<ol>
  <li>
    ";
        // line 40
        echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Find the Adblock Plus icon</strong> in your web browser (Mozilla Firefox, Google Chrome etc.).", array(), "messages");
        // line 43
        echo "    <br>
    <span class=\"clear-grey\">
    ";
        // line 45
        echo $this->env->getExtension('translator')->getTranslator()->trans("Generally it is located at the right of the address bar, or at the bottom right of the window.", array(), "messages");
        // line 48
        echo "    </span>
  </li>
  <li>
    <p>";
        // line 51
        echo $this->env->getExtension('translator')->getTranslator()->trans("Click on the icon and then (depending on browser):", array(), "messages");
        echo "</p>
    <ul>
      <li>
        <strong>Mozilla Firefox</strong>
        <br>
        ";
        // line 56
        echo $this->env->getExtension('translator')->getTranslator()->trans("Click on « Disable <strong>everywhere</strong> ». (Yes, <strong>everywhere</strong>).", array(), "messages");
        // line 59
        echo "      </li>
      <li>
        <strong>";
        // line 61
        echo $this->env->getExtension('translator')->getTranslator()->trans("Google Chrome and others", array(), "messages");
        echo "</strong>
        <br>
        ";
        // line 63
        echo $this->env->getExtension('translator')->getTranslator()->trans("Click on « Disable on %host% ».", array("%host%" => $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array())), "messages");
        // line 66
        echo "      </li>
    </ul>
  </li>
  <li>";
        // line 69
        echo $this->env->getExtension('translator')->getTranslator()->trans("Try accessing the previous page again or <a href=\"/\"><strong>click here</strong></a>.", array(), "messages");
        echo "</li>
</ol>
<h3>";
        // line 71
        echo $this->env->getExtension('translator')->getTranslator()->trans("Video tutorial", array(), "messages");
        echo "</h3>
<iframe width=\"100%\" height=\"360\" data-src=\"//www.youtube-nocookie.com/embed/_EbBIugKcUs?rel=0\" src=\"about:blank\" onload=\"lzld(this)\" frameborder=\"0\" allowfullscreen></iframe>
<h3>";
        // line 73
        echo $this->env->getExtension('translator')->getTranslator()->trans("I can't disable Adblock Plus", array(), "messages");
        echo "</h3>
<p>
  ";
        // line 75
        echo $this->env->getExtension('translator')->getTranslator()->trans("If you can't find the Adblock button or you can't manage to disable Adblock, you can try <strong>uninstalling completely the software</strong> in the options of your web browser.", array(), "messages");
        // line 78
        echo "</p>
<ul>
  <li>
    <strong>Mozilla Firefox</strong>
    <br>
    ";
        // line 83
        echo $this->env->getExtension('translator')->getTranslator()->trans("Open your \"Add-ons Manager\" by going to \"Firefox\" > \"Add-ons\" (for Mac OS X / Linux, select \"Tools\" from the menubar > \"Add-Ons\"). Here you will find an overview of your currently installed add-ons. Find Adblock Plus here, and simply click on \"Remove\"", array(), "messages");
        // line 86
        echo "  </li>
  <li>
    <strong>Google Chrome</strong>
    <br>
    ";
        // line 90
        echo $this->env->getExtension('translator')->getTranslator()->trans("Go to \"Settings\" in the menu in the top right corner. Then, select \"Extensions\" on the left side. Find Adblock Plus here, and select the small trashcan icon on the right side.", array(), "messages");
        // line 93
        echo "  </li>
  <li>
    <strong>Apple Safari</strong>
    <br>
    ";
        // line 97
        echo $this->env->getExtension('translator')->getTranslator()->trans("Go to Preferences > Extensions, select the extension from the list on the left, and click \"Uninstall\".", array(), "messages");
        // line 100
        echo "  </li>
</ul>
";
        // line 102
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 103
            echo "<h3 id=\"adb-happen\">Que se passe-t-il avec la nouvelle version d'Adblock</h3>
<p>Depuis la dernière version, nous avons constaté qu'Adblock ne prend plus en compte vos paramétrages sur notre site. Il semblerait que la cause soit une règle spécifique à notre site (voir la règle <a href=\"https://listefr-adblock.googlecode.com/hg/liste_fr.txt\" target=\"_blank\">ici</a> et chercher le terme \"playtv\"). Le problème de cette règle est qu'elle ne prend malheureusement plus du tout en compte les choix que vous pouvez faire sur Adblock comme par exemple désactiver Adblock <em>uniquement</em> pour Play TV. Cette règle est <strong>persistante</strong> et ne peut être annulée qu'<strong>en désactivant totalement Adblock</strong>.</p>
<p>N'oubliez pas de réactiver Adblock une fois votre navigation sur Play TV terminée.</p>
<p>Nous sommes désolés du désagrément et nous vous invitons à <a href=\"https://adblockplus.org/fr/bugs#reporting\" target=\"_blank\">signaler ce léger</a> souci aux développeurs de cette application.</p>
";
        }
        // line 108
        echo "<h3 style=\"margin-top:10px;\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Still redirected?", array(), "messages");
        echo "</h3>
<p>";
        // line 109
        echo $this->env->getExtension('translator')->getTranslator()->trans("You haven't installed AdBlock or you have disabled Adblock for <strong>%host%</strong> but you are still redirected to this page.", array("%host%" => $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array())), "messages");
        echo "</p>
<p>";
        // line 110
        echo $this->env->getExtension('translator')->getTranslator()->trans("This may be a false positive.", array(), "messages");
        echo "</p>
<p class=\"xmargin\">";
        // line 111
        echo $this->env->getExtension('translator')->getTranslator()->trans("Please <a href=\"%href%\"><strong>contact our support</strong></a>.", array("%href%" => $this->env->getExtension('routing')->getPath("help_support")), "messages");
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/adblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 111,  200 => 110,  196 => 109,  191 => 108,  184 => 103,  182 => 102,  178 => 100,  176 => 97,  170 => 93,  168 => 90,  162 => 86,  160 => 83,  153 => 78,  151 => 75,  146 => 73,  141 => 71,  136 => 69,  131 => 66,  129 => 63,  124 => 61,  120 => 59,  118 => 56,  110 => 51,  105 => 48,  103 => 45,  99 => 43,  97 => 40,  90 => 36,  86 => 34,  84 => 31,  79 => 28,  77 => 27,  72 => 24,  70 => 21,  62 => 16,  57 => 14,  51 => 11,  42 => 9,  36 => 6,  33 => 5,  31 => 4,  28 => 3,  11 => 2,);
    }
}
/* {# https://adblockplus.org/en/getting_started #}*/
/* {% extends "controllers/faq/_header.twig" %}*/
/* {% block faq_content %}*/
/* {% if is_website_fr %}*/
/* <div class="ptv-Notifier ptv-Notifier--alert ptv-Notifier--active">*/
/*   <p>{% trans %}Warning, the latest version of Adblock Plus isn't compatible anymore with our website. Please <a href="#adb-happen" style="color: white;">see why</a>.{% endtrans %}</p>*/
/* </div>*/
/* {% endif %}*/
/* <h2 class="margin">{% if is_website_fr %}1.4. {% endif %}{% trans %}My browser has been redirected after I wanted to watch a stream{% endtrans %}</h2>*/
/* <p>*/
/*   <strong>{% trans %}You have been redirected because we think you are using Adblock Plus.{% endtrans %}</strong>*/
/* </p>*/
/* <p>*/
/*   {% trans %}We do not detect you have a plugin, we simply verify if the ads are well displayed after the loading of the page. If it's not the case, the access of our service is defiend and we assume you use this kind of software. <strong>You are free to disable or not the plugin on our website.</strong>{% endtrans %}</strong>*/
/* </p>*/
/* <p>{% trans %}You are also free not to come on our website.{% endtrans %}</p>*/
/* <!-- <p>*/
/*   Nous avons fait le choix d'un modèle basé sur la publicité mais gratuit pour l'utilisateur final contrairement à d'autres opérateurs qui proposent un abonnement payant. Ces recettes nous permettent de couvrir notamment une partie des charges de diffusion. Ce modèle permet à des millions d'internautes de profiter de programmes en direct chaque mois.*/
/* </p> -->*/
/* <p>*/
/*   {% trans %}*/
/*   Our system has detected that you are blocking ads with <a href="https://adblockplus.org/" target="_blank" rel="nofollow"><strong>Adblock Plus</strong></a> or a similar software.*/
/*   {% endtrans %}*/
/* </p>*/
/* <p class="bigger">*/
/*   <strong>*/
/*   {% trans with {'%host%': request.host} %}To watch TV on %host%, please disable this software.{% endtrans %}*/
/*   </strong>.*/
/* </p>*/
/* <h3>*/
/*   {% trans with {'%host%': request.host} %}*/
/*   How to disable Adblock Plus for %host%?*/
/*   {% endtrans %}*/
/* </h3>*/
/* <div class="image">*/
/*   <img src="{{ apps_base_url }}/images/faq/faq-adblock.png" alt="Adblock">*/
/* </div>*/
/* <ol>*/
/*   <li>*/
/*     {% trans %}*/
/*     <strong>Find the Adblock Plus icon</strong> in your web browser (Mozilla Firefox, Google Chrome etc.).*/
/*     {% endtrans %}*/
/*     <br>*/
/*     <span class="clear-grey">*/
/*     {% trans %}*/
/*     Generally it is located at the right of the address bar, or at the bottom right of the window.*/
/*     {% endtrans %}*/
/*     </span>*/
/*   </li>*/
/*   <li>*/
/*     <p>{% trans %}Click on the icon and then (depending on browser):{% endtrans %}</p>*/
/*     <ul>*/
/*       <li>*/
/*         <strong>Mozilla Firefox</strong>*/
/*         <br>*/
/*         {% trans %}*/
/*         Click on « Disable <strong>everywhere</strong> ». (Yes, <strong>everywhere</strong>).*/
/*         {% endtrans %}*/
/*       </li>*/
/*       <li>*/
/*         <strong>{% trans %}Google Chrome and others{% endtrans %}</strong>*/
/*         <br>*/
/*         {% trans with {'%host%': request.host} %}*/
/*         Click on « Disable on %host% ».*/
/*         {% endtrans %}*/
/*       </li>*/
/*     </ul>*/
/*   </li>*/
/*   <li>{% trans %}Try accessing the previous page again or <a href="/"><strong>click here</strong></a>.{% endtrans %}</li>*/
/* </ol>*/
/* <h3>{% trans %}Video tutorial{% endtrans %}</h3>*/
/* <iframe width="100%" height="360" data-src="//www.youtube-nocookie.com/embed/_EbBIugKcUs?rel=0" src="about:blank" onload="lzld(this)" frameborder="0" allowfullscreen></iframe>*/
/* <h3>{% trans %}I can't disable Adblock Plus{% endtrans %}</h3>*/
/* <p>*/
/*   {% trans %}*/
/*   If you can't find the Adblock button or you can't manage to disable Adblock, you can try <strong>uninstalling completely the software</strong> in the options of your web browser.*/
/*   {% endtrans %}*/
/* </p>*/
/* <ul>*/
/*   <li>*/
/*     <strong>Mozilla Firefox</strong>*/
/*     <br>*/
/*     {% trans %}*/
/*     Open your "Add-ons Manager" by going to "Firefox" > "Add-ons" (for Mac OS X / Linux, select "Tools" from the menubar > "Add-Ons"). Here you will find an overview of your currently installed add-ons. Find Adblock Plus here, and simply click on "Remove"*/
/*     {% endtrans %}*/
/*   </li>*/
/*   <li>*/
/*     <strong>Google Chrome</strong>*/
/*     <br>*/
/*     {% trans %}*/
/*     Go to "Settings" in the menu in the top right corner. Then, select "Extensions" on the left side. Find Adblock Plus here, and select the small trashcan icon on the right side.*/
/*     {% endtrans %}*/
/*   </li>*/
/*   <li>*/
/*     <strong>Apple Safari</strong>*/
/*     <br>*/
/*     {% trans %}*/
/*     Go to Preferences > Extensions, select the extension from the list on the left, and click "Uninstall".*/
/*     {% endtrans %}*/
/*   </li>*/
/* </ul>*/
/* {% if is_website_fr %}*/
/* <h3 id="adb-happen">Que se passe-t-il avec la nouvelle version d'Adblock</h3>*/
/* <p>Depuis la dernière version, nous avons constaté qu'Adblock ne prend plus en compte vos paramétrages sur notre site. Il semblerait que la cause soit une règle spécifique à notre site (voir la règle <a href="https://listefr-adblock.googlecode.com/hg/liste_fr.txt" target="_blank">ici</a> et chercher le terme "playtv"). Le problème de cette règle est qu'elle ne prend malheureusement plus du tout en compte les choix que vous pouvez faire sur Adblock comme par exemple désactiver Adblock <em>uniquement</em> pour Play TV. Cette règle est <strong>persistante</strong> et ne peut être annulée qu'<strong>en désactivant totalement Adblock</strong>.</p>*/
/* <p>N'oubliez pas de réactiver Adblock une fois votre navigation sur Play TV terminée.</p>*/
/* <p>Nous sommes désolés du désagrément et nous vous invitons à <a href="https://adblockplus.org/fr/bugs#reporting" target="_blank">signaler ce léger</a> souci aux développeurs de cette application.</p>*/
/* {% endif %}*/
/* <h3 style="margin-top:10px;">{% trans %}Still redirected?{% endtrans %}</h3>*/
/* <p>{% trans with {'%host%': request.host} %}You haven't installed AdBlock or you have disabled Adblock for <strong>%host%</strong> but you are still redirected to this page.{% endtrans %}</p>*/
/* <p>{% trans %}This may be a false positive.{% endtrans %}</p>*/
/* <p class="xmargin">{% trans with { "%href%": path('help_support') } %}Please <a href="%href%"><strong>contact our support</strong></a>.{% endtrans %}</p>*/
/* {% endblock faq_content %}*/
/* */
