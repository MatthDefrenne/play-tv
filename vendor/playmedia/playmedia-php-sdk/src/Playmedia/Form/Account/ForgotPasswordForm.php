<?php

namespace Playmedia\Form\Account;

use Playmedia\Form\AbstractForm;
use Symfony\Component\Validator\Constraints;

class ForgotPasswordForm extends AbstractForm
{
    protected function getConstraints(array $data = array())
    {
        return array(
            'email' => array(
                new Constraints\NotBlank(array(
                    'message' => 'Votre email ne doit pas être vide.',
                )),
                new Constraints\Email(array(
                    'strict' => true,
                    'checkHost' => true,
                    'message' => "Votre email n'est pas formé correctement.",
                )),
            ),
        );
    }
}
