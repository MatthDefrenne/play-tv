<?php

/* controllers/account/skeleton.twig */
class __TwigTemplate_d68b1dfe7a3048de8fbe7830eaf1c1b3dec29cba40d06a8eaaf4c026ddc696b1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'embed_content' => array($this, 'block_embed_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"pmd-AccountProfile\">

  <div class=\"pmd-AccountProfileHeader\">

    <div class=\"container\">

      <div class=\"pmd-AccountProfileHeader-avatar\">
        <img src=\"";
        // line 8
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : null), "getAvatar", array(0 => 106, 1 => 106), "method", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : null), "getAvatar", array(0 => 106, 1 => 106), "method"), ((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/avatars/user-picture.png"))) : (((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/avatars/user-picture.png"))), "html", null, true);
        echo "\" alt=\"\">
      </div>

      <div class=\"pmd-AccountProfileHeader-main\">

        <p class=\"pmd-AccountProfileHeader-nickname\">
          ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getUsername", array(), "method"), "html", null, true);
        echo "
        </p>

        <p class=\"pmd-AccountProfileHeader-name\">
          ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getFirstName", array(), "method"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getLastName", array(), "method"), "html", null, true);
        echo "
        </p>

      </div>

      <div class=\"pmd-AccountProfileHeader-thirdParty\">

        <div class=\"ptv-js-AccountThirdPartiesFacebook\">
          ";
        // line 26
        $this->loadTemplate("controllers/ui/block-account-facebook-connect.twig", "controllers/account/skeleton.twig", 26)->display($context);
        // line 27
        echo "        </div>

      </div>


    </div>

  </div>

  <div class=\"sub-menu pmd-AccountProfileContent\">

    <div class=\"container\">
      <ul>
        <li";
        // line 40
        if (((isset($context["tab_selected"]) ? $context["tab_selected"] : $this->getContext($context, "tab_selected")) == "subscriptions")) {
            echo " class=\"tab-selected\"";
        }
        echo ">
          <a href=\"/mon-compte/abonnements/\">
            <span class=\"sub-menu_text\">Mes abonnements</span>
          </a>
        </li>
        <li";
        // line 45
        if (((isset($context["tab_selected"]) ? $context["tab_selected"] : $this->getContext($context, "tab_selected")) == "profile")) {
            echo " class=\"tab-selected\"";
        }
        echo ">
          <a href=\"/mon-compte/profil/\">
            <span class=\"sub-menu_text\">Mes informations</span>
          </a>
        </li>
        <li";
        // line 50
        if (((isset($context["tab_selected"]) ? $context["tab_selected"] : $this->getContext($context, "tab_selected")) == "notifications")) {
            echo " class=\"tab-selected\"";
        }
        echo ">
          <a href=\"/mon-compte/notifications/\">
            <span class=\"sub-menu_text\">Mes notifications</span>
          </a>
        </li>
        ";
        // line 55
        if ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "hasPaymill", array())) {
            // line 56
            echo "        <li";
            if (((isset($context["tab_selected"]) ? $context["tab_selected"] : $this->getContext($context, "tab_selected")) == "credit-card")) {
                echo " class=\"tab-selected\"";
            }
            echo ">
          <a href=\"/mon-compte/coordonnees-bancaires/\">
            <span class=\"sub-menu_text\">Mes coordonnées bancaires</span>
          </a>
        </li>
        ";
        }
        // line 62
        echo "      </ul>
    </div>

  </div>

</div>

<div id=\"content\">
  <div class=\"container ptv-js-AccountProfile\">
    ";
        // line 71
        $this->displayBlock('embed_content', $context, $blocks);
        // line 72
        echo "  </div>
</div>
<!-- /#content -->
";
    }

    // line 71
    public function block_embed_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "controllers/account/skeleton.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 71,  132 => 72,  130 => 71,  119 => 62,  107 => 56,  105 => 55,  95 => 50,  85 => 45,  75 => 40,  60 => 27,  58 => 26,  45 => 18,  38 => 14,  29 => 8,  20 => 1,);
    }
}
/* <div class="pmd-AccountProfile">*/
/* */
/*   <div class="pmd-AccountProfileHeader">*/
/* */
/*     <div class="container">*/
/* */
/*       <div class="pmd-AccountProfileHeader-avatar">*/
/*         <img src="{{ current_account.getAvatar(106, 106)|default(apps_base_url ~ "/images/avatars/user-picture.png") }}" alt="">*/
/*       </div>*/
/* */
/*       <div class="pmd-AccountProfileHeader-main">*/
/* */
/*         <p class="pmd-AccountProfileHeader-nickname">*/
/*           {{ current_account.getUsername() }}*/
/*         </p>*/
/* */
/*         <p class="pmd-AccountProfileHeader-name">*/
/*           {{ current_account.getFirstName() }} {{ current_account.getLastName() }}*/
/*         </p>*/
/* */
/*       </div>*/
/* */
/*       <div class="pmd-AccountProfileHeader-thirdParty">*/
/* */
/*         <div class="ptv-js-AccountThirdPartiesFacebook">*/
/*           {% include "controllers/ui/block-account-facebook-connect.twig" %}*/
/*         </div>*/
/* */
/*       </div>*/
/* */
/* */
/*     </div>*/
/* */
/*   </div>*/
/* */
/*   <div class="sub-menu pmd-AccountProfileContent">*/
/* */
/*     <div class="container">*/
/*       <ul>*/
/*         <li{% if tab_selected == "subscriptions" %} class="tab-selected"{% endif %}>*/
/*           <a href="/mon-compte/abonnements/">*/
/*             <span class="sub-menu_text">Mes abonnements</span>*/
/*           </a>*/
/*         </li>*/
/*         <li{% if tab_selected == "profile" %} class="tab-selected"{% endif %}>*/
/*           <a href="/mon-compte/profil/">*/
/*             <span class="sub-menu_text">Mes informations</span>*/
/*           </a>*/
/*         </li>*/
/*         <li{% if tab_selected == "notifications" %} class="tab-selected"{% endif %}>*/
/*           <a href="/mon-compte/notifications/">*/
/*             <span class="sub-menu_text">Mes notifications</span>*/
/*           </a>*/
/*         </li>*/
/*         {% if current_account.hasPaymill %}*/
/*         <li{% if tab_selected == "credit-card" %} class="tab-selected"{% endif %}>*/
/*           <a href="/mon-compte/coordonnees-bancaires/">*/
/*             <span class="sub-menu_text">Mes coordonnées bancaires</span>*/
/*           </a>*/
/*         </li>*/
/*         {% endif %}*/
/*       </ul>*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
/* <div id="content">*/
/*   <div class="container ptv-js-AccountProfile">*/
/*     {% block embed_content %}{% endblock %}*/
/*   </div>*/
/* </div>*/
/* <!-- /#content -->*/
/* */
