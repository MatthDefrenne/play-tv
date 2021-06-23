<?php

namespace Playmedia\Form;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints;

/**
 * Base implementation of FormInterface
 * Child classes just need to implement the getConstraints() method
 * to define validation constraints for each field.
 *
 * @author Alexandre Segura <alexandre.segura@playmedia.fr>
 */
abstract class AbstractForm implements FormInterface
{
    protected $validator;
    protected $errors = array();
    private $data = array();

    /**
     * @param Validator $validator a Symfony Validator instance
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function submit(array $data = array())
    {
        $this->errors = array();

        $this->data = $this->preprocess($data);

        $constraints = new Constraints\Collection(array(
            'fields' => $this->getConstraints($this->data),
            'allowExtraFields' => true,
        ));

        $violations = $this->validator->validate($this->data, $constraints);

        if (count($violations)) {
            foreach ($violations as $violation) {
                $propertyPath = $violation->getPropertyPath();

                if (preg_match("/^\[(.+)\]$/", $propertyPath, $matches)) {
                    $propertyPath = $matches[1];
                }

                if (!isset($this->errors[$propertyPath])) {
                    $this->errors[$propertyPath] = $violation->getMessage();
                }
            }
        }
    }

    public function isValid()
    {
        return count($this->errors) == 0;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * Called before validating the data.
     * The default implementation does nothing, but child classes can override
     * this method to perform custom data processing.
     *
     * @param array $data
     *
     * @return array
     */
    protected function preprocess(array $data = array())
    {
        return $data;
    }

    /**
     * Returns an array of Constraint, indexed by field name.
     *
     * @param array $data
     *
     * @return array
     */
    abstract protected function getConstraints(array $data = array());
}
