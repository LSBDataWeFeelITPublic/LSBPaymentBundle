<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Factory;

use LSB\PaymentBundle\Entity\PaymentTokenInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class PaymentTokenFactory
 * @package LSB\PaymentBundle\Factory
 */
class PaymentTokenFactory extends BaseFactory implements PaymentTokenFactoryInterface
{

    /**
     * @return PaymentTokenInterface
     */
    public function createNew(): PaymentTokenInterface
    {
        return parent::createNew();
    }

}
