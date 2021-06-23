<?php

namespace Playmedia\Form\Account;

class ModifyForm extends AbstractForm
{
    protected function getBirthdateMessage()
    {
        return 'Vous devez avoir plus de 13 ans pour modifier un compte.';
    }
}
