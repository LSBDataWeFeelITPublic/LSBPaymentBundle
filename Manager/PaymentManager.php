<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Manager;

use LSB\PaymentBundle\Entity\PaymentInterface;
use LSB\PaymentBundle\Factory\PaymentFactoryInterface;
use LSB\PaymentBundle\Repository\PaymentRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class PaymentManager
* @package LSB\PaymentBundle\Manager
*/
class PaymentManager extends BaseManager
{

    /**
     * PaymentManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param PaymentFactoryInterface $factory
     * @param PaymentRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        PaymentFactoryInterface $factory,
        PaymentRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return PaymentInterface|object
     */
    public function createNew(): PaymentInterface
    {
        return parent::createNew();
    }

    /**
     * @return PaymentFactoryInterface|FactoryInterface
     */
    public function getFactory(): PaymentFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return PaymentRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): PaymentRepositoryInterface
    {
        return parent::getRepository();
    }
}
