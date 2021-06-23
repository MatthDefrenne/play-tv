<?php

namespace Playmedia\Form\Account;

use Playmedia\Form\AbstractForm as BaseAbstractForm;
use Symfony\Component\Validator\Constraints;
use DateTime;

abstract class AbstractForm extends BaseAbstractForm
{
    protected function preprocess(array $data = array())
    {
        $birthdate = false;
        $age = false;

        if (isset($data['month'], $data['day'], $data['year'])
        &&  checkdate($data['month'], $data['day'], $data['year'])) {
            $birthdate = sprintf('%d-%02d-%02d', (int) $data['year'], (int) $data['month'], (int) $data['day']);
        }

        if ($birthdate) {
            $date = new DateTime($birthdate);
            $now = new DateTime();
            $age = $now->diff($date)->y;
        }

        $data['birthdate'] = $birthdate;
        $data['age'] = $age;

        return $data;
    }

    protected function getConstraints(array $data = array())
    {
        $constraints = array(
            'username' => new Constraints\NotBlank(array(
                'message' => "Votre nom d'utilisateur ne doit pas être vide.",
            )),
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
            'birthdate' => array(
                new Constraints\NotBlank(array(
                    'message' => 'Vous devez entrer une date de naissance.',
                )),
                new Constraints\Date(array(
                    'message' => "Votre date de naissance n'est pas correcte.",
                )),
            ),
            'gender' => array(
                new Constraints\Choice(array(
                    'choices' => array('male', 'female'),
                    'message' => 'Vous devez choisir votre sexe.',
                )),
            ),
        );

        if (isset($data['birthdate']) && false !== $data['birthdate']) {
            $constraints['age'] = array(
                new Constraints\GreaterThanOrEqual(array(
                    'value' => 13,
                    'message' => $this->getBirthdateMessage(),
                )),
                new Constraints\LessThanOrEqual(array(
                    'value' => 130,
                    'message' => 'Vous ne pouvez pas avoir plus de 130 ans.',
                )),
            );
        }

        return $constraints;
    }

    abstract protected function getBirthdateMessage();
}
