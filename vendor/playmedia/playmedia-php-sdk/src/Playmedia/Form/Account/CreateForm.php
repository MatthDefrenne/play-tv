<?php

namespace Playmedia\Form\Account;

use Symfony\Component\Validator\Constraints;

class CreateForm extends ModifyForm
{
    protected function getConstraints(array $data = array())
    {
        $constraints = parent::getConstraints($data);

        $constraints['password'] = array(
            new Constraints\NotBlank(array(
                'message' => 'Votre mot de passe ne doit pas être vide.',
            )),
            new Constraints\Length(array(
                'min' => 6,
                'minMessage' => 'Votre mot de passe doit faire au moins 6 caractères.',
                'max' => 4096,
                'maxMessage' => 'Votre mot de passe doit faire au plus 4096 caractères.',
            )),
        );

        $constraints['emailConfirm'] = array(
            new Constraints\NotBlank(array(
                'message' => 'Vous devez confirmer votre adresse email.',
            )),
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

    protected function getBirthdateMessage()
    {
        return 'Vous devez avoir plus de 13 ans pour créer un compte.';
    }
}
