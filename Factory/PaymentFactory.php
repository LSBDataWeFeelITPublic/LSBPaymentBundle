<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Factory;

use LSB\PaymentBundle\Entity\PaymentInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class PaymentFactory
 * @package LSB\PaymentBundle\Factory
 */
class PaymentFactory extends BaseFactory implements PaymentFactoryInterface
{

    /**
     * @return PaymentInterface
     */
    public function createNew(): PaymentInterface
    {
        return parent::createNew();
    }

}
