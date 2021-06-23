<?php

namespace Playmedia\Form\Account;

use Playmedia\Form\AbstractForm;
use Symfony\Component\Validator\Constraints;

class LoginForm extends AbstractForm
{
    protected function getConstraints(array $data = array())
    {
        return array(
            'email' => array(
                new Constraints\NotBlank(array(
                    'message' => "Votre email ou nom d'utilisateur ne doit pas être vide.",
                )),
            ),
            'password' => array(
                new Constraints\NotBlank(array(
                    'message' => 'Votre mot de passe ne doit pas être vide.',
                )),
            ),
        );
    }
}
