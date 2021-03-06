<?php

namespace DoctrineORMModule\Service;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectRadio;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;
use Laminas\ServiceManager\FactoryInterface;

/**
 * Factory for {@see ObjectRadio}
 *
 * @license MIT
 * @link    http://www.doctrine-project.org/
 * @author  Daniel Gimenes <daniel@danielgimenes.com.br>
 */
class ObjectRadioFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return ObjectRadio
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get(EntityManager::class);
        $element       = new ObjectRadio;

        $element->getProxy()->setObjectManager($entityManager);

        return $element;
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container->getServiceLocator(), ObjectRadio::class);
    }
}
