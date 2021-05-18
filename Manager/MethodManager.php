<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Manager;

use LSB\PaymentBundle\Entity\MethodInterface;
use LSB\PaymentBundle\Factory\MethodFactoryInterface;
use LSB\PaymentBundle\Repository\MethodRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class MethodManager
* @package LSB\PaymentBundle\Manager
*/
class MethodManager extends BaseManager
{

    /**
     * MethodManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param MethodFactoryInterface $factory
     * @param MethodRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        MethodFactoryInterface $factory,
        MethodRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return MethodInterface|object
     */
    public function createNew(): MethodInterface
    {
        return parent::createNew();
    }

    /**
     * @return MethodFactoryInterface|FactoryInterface
     */
    public function getFactory(): MethodFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return MethodRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): MethodRepositoryInterface
    {
        return parent::getRepository();
    }
}
