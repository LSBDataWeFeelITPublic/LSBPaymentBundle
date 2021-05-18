<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Factory;

use LSB\PaymentBundle\Entity\MethodInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class MethodFactory
 * @package LSB\PaymentBundle\Factory
 */
class MethodFactory extends BaseFactory implements MethodFactoryInterface
{

    /**
     * @return MethodInterface
     */
    public function createNew(): MethodInterface
    {
        return parent::createNew();
    }

}
