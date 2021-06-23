<?php

namespace Playmedia\Api\Entity;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use Guzzle\Service\Command\ResponseClassInterface;
use Guzzle\Service\Command\OperationCommand;
use ArrayAccess;
use IteratorAggregate;
use ArrayIterator;
use BadMethodCallException;

/**
 * Base class for entities.
 * This class is responsible for transforming a Guzzle response into an object.
 * It also implements ArrayAccess & IteratorAggregate for objects to be used as arrays.
 *
 * @author Alexandre Segura <alexandre.segura@playmedia.fr>
 */
abstract class Entity implements ArrayAccess, IteratorAggregate, ResponseClassInterface
{
    public function offsetExists($offset)
    {
        if (isset($this->$offset)) {
            return true;
        }

        $values = $this->toArray();

        return isset($values[$offset]);
    }

    public function offsetGet($offset)
    {
        if (isset($this->$offset)) {
            return $this->$offset;
        }

        $values = $this->toArray();
        if (isset($values[$offset])) {
            return $values[$offset];
        }

        return;
    }

    public function offsetSet($offset, $value)
    {
        throw new BadMethodCallException("Class properties can't be modified via ArrayAccess");
    }

    public function offsetUnset($offset)
    {
        throw new BadMethodCallException("Class properties can't be modified via ArrayAccess");
    }

    public function getIterator()
    {
        return new ArrayIterator(get_object_vars($this));
    }

    protected static function getSerializer()
    {
        $normalizer = new GetSetMethodNormalizer();
        $normalizer->setIgnoredAttributes(array('iterator'));

        return new Serializer(array($normalizer), array());
    }

    public static function toObject(array $data, $class)
    {
        return self::getSerializer()->denormalize($data, $class);
    }

    public static function toCollection(array $data, $class)
    {
        array_walk($data, function (&$item, $key) use ($class) {
            $item = self::toObject($item, $class);
        });

        return $data;
    }

    public function toArray()
    {
        return self::getSerializer()->normalize($this);
    }

    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();

        if (!$response->isSuccessful()) {
            return;
        }

        $data = $response->json();
        $class = $command->getOperation()->getData('class');
        $type = $command->getOperation()->getData('type');

        if ('object' == $type) {
            return self::toObject($data, $class);
        }

        if ('array' == $type) {
            return self::toCollection($data, $class);
        }
    }
}
