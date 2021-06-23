<?php

namespace Playmedia\Form;

/**
 * Dead simple form interface.
 * Shamefully inspired by Symfony's FormInterface, in order to be able to switch to it in a near future.
 *
 * @link https://github.com/symfony/symfony/blob/master/src/Symfony/Component/Form/FormInterface.php
 *
 * @author Alexandre Segura <alexandre.segura@playmedia.fr>
 */
interface FormInterface
{
    /**
     * Submits the form, i.e. validates the data that was sent by the browser.
     *
     * @param array $data the data sent by the browser ($_POST)
     */
    public function submit(array $data = array());

    /**
     * Returns true if the submitted data is valid, false otherwise.
     *
     * @return bool
     */
    public function isValid();

    /**
     * Returns the validation errors found during form submission, if any.
     *
     * @return array
     */
    public function getErrors();
}
