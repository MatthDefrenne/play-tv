<?php

/* controllers/faq/compte-utilisateur.twig */
class __TwigTemplate_1f532c8ddb34b022de60229cec5e25fca96b306e7cc39e562f63499a09764d5e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/compte-utilisateur.twig", 1);
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
        echo "  <h2 class=\"margin\">3.5. Je ne parviens pas à m'identifier</h2>

  <h3>
    <strong>A. Identification par Email</strong>
  </h3>

  <h4>a. Je n'ai pas reçu d'Email de validation</h4>

  <p>Si vous n'avez pas reçu votre Email de validation de compte, vérifiez d'abord qu'il n'a pas été placé dans vos Courriers Indésirables. Si l'Email reste introuvable, vous pouvez renseigner une seconde fois votre adresse pour que nous procédions à un second envoi en <a href=\"#\" class=\"pmd-js-askEmailHandler\" rel=\"nofollow\">cliquant ici</a>.</p>

  <h4>b. Si vous rencontrez un autre problème, contactez nous via ce <a href=\"/aide/support/\">formulaire</a>.</h4>

  <h3>
    <strong>B. Identification avec Facebook</strong>
  </h3>

  <h4>a. Je ne parviens pas à m'identifier avec Facebook</h4>

  <p>En cliquant sur le bouton Facebook une fenêtre (pop-up) s'ouvre pour vous demander de valider au sein de Facebook, votre identification avec Play TV. Attention, cette fenêtre peut être bloquée par votre navigateur.</p>

  <ul>
    <li>
      <strong>Sous Firefox</strong>
    </li>
  </ul>

  <div class=\"image\">
    <img src=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-popup-firefox.png\" alt=\"Enlever le popup blocker sur Firefox\">
  </div>

  <ul>
    <li>
      <strong>Sous Chrome</strong>
    </li>
  </ul>

  <div class=\"image\">
    <img src=\"";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-popup-chrome.png\" alt=\"Enlever le popup blocker sur Chrome\">
  </div>

  <p>Dans ce cas, il faut autoriser votre navigateur à afficher la popup.</p>

  <h4>b. Si vous rencontrez un autre problème, contactez nous via ce <a href=\"/aide/support/\">formulaire</a>.</h4>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/compte-utilisateur.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 41,  60 => 31,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">3.5. Je ne parviens pas à m'identifier</h2>*/
/* */
/*   <h3>*/
/*     <strong>A. Identification par Email</strong>*/
/*   </h3>*/
/* */
/*   <h4>a. Je n'ai pas reçu d'Email de validation</h4>*/
/* */
/*   <p>Si vous n'avez pas reçu votre Email de validation de compte, vérifiez d'abord qu'il n'a pas été placé dans vos Courriers Indésirables. Si l'Email reste introuvable, vous pouvez renseigner une seconde fois votre adresse pour que nous procédions à un second envoi en <a href="#" class="pmd-js-askEmailHandler" rel="nofollow">cliquant ici</a>.</p>*/
/* */
/*   <h4>b. Si vous rencontrez un autre problème, contactez nous via ce <a href="/aide/support/">formulaire</a>.</h4>*/
/* */
/*   <h3>*/
/*     <strong>B. Identification avec Facebook</strong>*/
/*   </h3>*/
/* */
/*   <h4>a. Je ne parviens pas à m'identifier avec Facebook</h4>*/
/* */
/*   <p>En cliquant sur le bouton Facebook une fenêtre (pop-up) s'ouvre pour vous demander de valider au sein de Facebook, votre identification avec Play TV. Attention, cette fenêtre peut être bloquée par votre navigateur.</p>*/
/* */
/*   <ul>*/
/*     <li>*/
/*       <strong>Sous Firefox</strong>*/
/*     </li>*/
/*   </ul>*/
/* */
/*   <div class="image">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-popup-firefox.png" alt="Enlever le popup blocker sur Firefox">*/
/*   </div>*/
/* */
/*   <ul>*/
/*     <li>*/
/*       <strong>Sous Chrome</strong>*/
/*     </li>*/
/*   </ul>*/
/* */
/*   <div class="image">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-popup-chrome.png" alt="Enlever le popup blocker sur Chrome">*/
/*   </div>*/
/* */
/*   <p>Dans ce cas, il faut autoriser votre navigateur à afficher la popup.</p>*/
/* */
/*   <h4>b. Si vous rencontrez un autre problème, contactez nous via ce <a href="/aide/support/">formulaire</a>.</h4>*/
/* {% endblock faq_content %}*/
/* */
