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
use Payum\Core\Payum;
use Payum\Core\Storage\StorageInterface;
use Symfony\Component\HttpFoundation\Request;

/**
* Class PaymentManager
* @package LSB\PaymentBundle\Manager
*/
class PaymentManager extends BaseManager
{
    protected Payum $payum;

    /**
     * PaymentManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param PaymentFactoryInterface $factory
     * @param PaymentRepositoryInterface $repository
     * @param BaseEntityType|null $form
     * @param Payum $payum
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        PaymentFactoryInterface $factory,
        PaymentRepositoryInterface $repository,
        ?BaseEntityType $form,
        Payum $payum
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
        $this->payum = $payum;
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

    /**
     * @return Payum
     */
    public function getPayum(): Payum
    {
        return $this->getPayum();
    }

    /**
     * @param $identity
     * @return StorageInterface
     */
    public function getStorage($identity = null): StorageInterface
    {
        return $this->payum->getStorage($identity ?? $this->getFactory()->getClassName());
    }

    /**
     * @return PaymentInterface
     */
    public function createStorage(): PaymentInterface
    {
        return $this->getStorage()->create();
    }

    /**
     * @param PaymentInterface $payment
     */
    public function updateStorage(PaymentInterface $payment): void
    {
        $this->getStorage()->update($payment);
    }
}
