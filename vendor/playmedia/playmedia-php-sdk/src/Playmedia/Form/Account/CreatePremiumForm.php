<?php

namespace Playmedia\Form\Account;

use Symfony\Component\Validator\Constraints;
use Playmedia\Form\AbstractForm as BaseForm;

/**
 * Premium form.
 * Lighter account requirements.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class CreatePremiumForm extends BaseForm
{
    protected function getConstraints(array $data = array())
    {
        $constraints = array(
            'username' => new Constraints\NotBlank(array(
                'message' => "Votre nom d'utilisateur ne doit pas être vide.",
            )),
            'password' => array(
                new Constraints\NotBlank(array(
                    'message' => 'Votre mot de passe ne doit pas être vide.',
                )),
                new Constraints\Length(array(
                    'min' => 6,
                    'minMessage' => 'Votre mot de passe doit faire au moins 6 caractères.',
                    'max' => 4096,
                    'maxMessage' => 'Votre mot de passe doit faire au plus 4096 caractères.',
                )),
            ),
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
            'emailConfirm' => array(
                new Constraints\NotBlank(array(
                    'message' => 'Vous devez confirmer votre adresse email.',
                )),
            ),
        );

        if (isset($data['email'])) {
            $constraints['emailConfirm'][] = new Constraints\EqualTo(array(
                'value' => $data['email'],
                'message' => 'Vous devez confirmer votre adresse email.',
            ));
        }

        $constraints['cgv'] = new Constraints\Choice(array(
            'choices' => array('true'),
            'message' => "Vous devez accepter les conditions d'utilisation de Play TV.",
        ));

        return $constraints;
    }
}
