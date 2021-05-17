<?php
declare(strict_types=1);

namespace LSB\PaymentBundle;

use LSB\PaymentBundle\DependencyInjection\Compiler\AddManagerResourcePass;
use LSB\PaymentBundle\DependencyInjection\Compiler\AddResolveEntitiesPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class LSBTemplateVendorSF5Bundle
 * @package LSB\PaymentBundle
 */
class LSBPaymentBundle extends Bundle
{
    public function build(ContainerBuilder $builder)
    {
        parent::build($builder);

        $builder
            ->addCompilerPass(new AddManagerResourcePass())
            ->addCompilerPass(new AddResolveEntitiesPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 1);
        ;
    }
}
