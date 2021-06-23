<?php

namespace Playmedia\Form\Feedback;

use Playmedia\Form\AbstractForm;
use Symfony\Component\Validator\Constraints;

class SupportForm extends AbstractForm
{
    protected function getConstraints(array $data = array())
    {
        return array(
            'email' => array(
                new Constraints\NotBlank(array(
                    'message' => 'Vous devez spécifier une adresse email.',
                )),
                new Constraints\Email(array(
                    'strict' => true,
                    'checkHost' => true,
                    'message' => 'Vous devez spécifier une adresse email valide.',
                )),
            ),
            'message' => new Constraints\NotBlank(array(
                'message' => 'Vous devez spécifier un message.',
            )),
        );
    }
}
