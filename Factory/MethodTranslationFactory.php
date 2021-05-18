<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Factory;

use LSB\PaymentBundle\Entity\MethodTranslationInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class MethodTranslationFactory
 * @package LSB\PaymentBundle\Factory
 */
class MethodTranslationFactory extends BaseFactory implements MethodTranslationFactoryInterface
{

    /**
     * @return MethodTranslationInterface
     */
    public function createNew(): MethodTranslationInterface
    {
        return parent::createNew();
    }

}
