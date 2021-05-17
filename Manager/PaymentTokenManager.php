<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Manager;

use LSB\PaymentBundle\Entity\PaymentTokenInterface;
use LSB\PaymentBundle\Factory\PaymentTokenFactoryInterface;
use LSB\PaymentBundle\Repository\PaymentTokenRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
* Class PaymentTokenManager
* @package LSB\PaymentBundle\Manager
*/
class PaymentTokenManager extends BaseManager
{

    /**
     * PaymentTokenManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param PaymentTokenFactoryInterface $factory
     * @param PaymentTokenRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        PaymentTokenFactoryInterface $factory,
        PaymentTokenRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return PaymentTokenInterface|object
     */
    public function createNew(): PaymentTokenInterface
    {
        return parent::createNew();
    }

    /**
     * @return PaymentTokenFactoryInterface|FactoryInterface
     */
    public function getFactory(): PaymentTokenFactoryInterface
    {
        return parent::getFactory();
    }

    /**
     * @return PaymentTokenRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): PaymentTokenRepositoryInterface
    {
        return parent::getRepository();
    }
}
