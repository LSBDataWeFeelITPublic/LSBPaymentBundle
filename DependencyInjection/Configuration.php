<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\DependencyInjection;

use LSB\PaymentBundle\Entity\PaymentInterface;
use LSB\PaymentBundle\Entity\EntityTranslationInterface;
use LSB\PaymentBundle\Factory\EntityFactory;
use LSB\PaymentBundle\Form\EntityTranslationType;
use LSB\PaymentBundle\Form\EntityType;
use LSB\PaymentBundle\LSBPaymentBundle;
use LSB\PaymentBundle\Manager\EntityManager;
use LSB\PaymentBundle\Repository\EntityRepository;
use LSB\UtilityBundle\DependencyInjection\BaseExtension as BE;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    const CONFIG_KEY = 'lsb_payment';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIG_KEY);

        $treeBuilder
            ->getRootNode()
            ->children()
            ->scalarNode(BE::CONFIG_KEY_TRANSLATION_DOMAIN)->defaultValue((new \ReflectionClass(LSBPaymentBundle::class))->getShortName())->end()
            ->arrayNode(BE::CONFIG_KEY_RESOURCES)
            ->children()
            // Start Product
//            ->resourceNode(
//                'payment',
//                Payment::class,
//                PaymentInterface::class,
//                PaymentFactory::class,
//                PaymentRepository::class,
//                PaymentManager::class,
//                PaymentType::class
//            )
            // End Product
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
