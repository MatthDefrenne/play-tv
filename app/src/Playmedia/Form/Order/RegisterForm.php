<?php

namespace Playmedia\Form\Order;

use Playmedia\Form\Account\CreatePremiumForm;

class RegisterForm extends CreatePremiumForm
{
    protected function getConstraints(array $data = array())
    {
        $constraints = parent::getConstraints($data);

        unset($constraints['cgv']);

        return $constraints;
    }
}
