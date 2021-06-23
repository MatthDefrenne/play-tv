<?php

namespace Playmedia\Form\Account;

use Playmedia\Form\AbstractForm;
use Symfony\Component\Validator\Constraints;

class ChangePasswordForm extends AbstractForm
{
    protected function getConstraints(array $data = array())
    {
        $constraints = array(
            'password' => array(
                new Constraints\NotBlank(array(
                  'message' => 'Votre nouveau mot de passe ne doit pas être vide.',
                )),
                new Constraints\Length(array(
                    'min' => 6,
                    'minMessage' => 'Votre mot de passe doit faire au moins 6 caractères.',
                    'max' => 4096,
                    'maxMessage' => 'Votre mot de passe doit faire au plus 4096 caractères.',
                )
            ), ),
            'confirmPassword' => array(
                new Constraints\NotBlank(array(
                  'message' => 'Votre confirmation de mot de passe ne doit pas être vide.',
                )),
                new Constraints\EqualTo(array(
                'value' => $data['password'],
                'message' => 'Les 2 mots de passe ne coincident pas.',
                )),
            ),
        );

        if (isset($data['oldPassword'])) {
            $constraints['password'][] = new Constraints\NotEqualTo(array(
                'value' => $data['oldPassword'],
                'message' => "Vous nouveau mot de passe ne doit pas être le même que l'ancien.",
            ));

            $constraints['oldPassword'] = array(
                new Constraints\NotBlank(array(
                  'message' => 'Votre ancien mot de passe ne doit pas être vide.',
                )),
                new Constraints\Length(array(
                    'min' => 6,
                    'minMessage' => 'Votre mot de passe doit faire au moins 6 caractères.',
                    'max' => 4096,
                    'maxMessage' => 'Votre mot de passe doit faire au plus 4096 caractères.',
                )),
            );
        }

        return $constraints;
    }
}
