<?php

namespace Playmedia\Form\Sales;

use Playmedia\Form\AbstractForm;

class AcquisitionForm extends AbstractForm
{
    protected function getConstraints(array $data = array())
    {
        return array();
    }

    public function getData()
    {
        // Post processing
        $data = parent::getData();
        unset($data['emailConfirm'], $data['cgv'], $data['legalAge']);

        return $data;
    }
}
