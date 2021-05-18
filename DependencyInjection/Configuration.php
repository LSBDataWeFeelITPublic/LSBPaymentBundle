<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\DependencyInjection;

use LSB\PaymentBundle\Entity\Method;
use LSB\PaymentBundle\Entity\MethodInterface;
use LSB\PaymentBundle\Entity\MethodTranslation;
use LSB\PaymentBundle\Entity\MethodTranslationInterface;
use LSB\PaymentBundle\Entity\Payment;
use LSB\PaymentBundle\Entity\PaymentInterface;
use LSB\PaymentBundle\Entity\PaymentToken;
use LSB\PaymentBundle\Entity\PaymentTokenInterface;
use LSB\PaymentBundle\Factory\MethodFactory;
use LSB\PaymentBundle\Factory\PaymentFactory;
use LSB\PaymentBundle\Factory\PaymentTokenFactory;
use LSB\PaymentBundle\Form\MethodTranslationType;
use LSB\PaymentBundle\Form\MethodType;
use LSB\PaymentBundle\Form\PaymentTokenType;
use LSB\PaymentBundle\Form\PaymentType;
use LSB\PaymentBundle\LSBPaymentBundle;
use LSB\PaymentBundle\Manager\MethodManager;
use LSB\PaymentBundle\Manager\PaymentManager;
use LSB\PaymentBundle\Manager\PaymentTokenManager;
use LSB\PaymentBundle\Repository\MethodRepository;
use LSB\PaymentBundle\Repository\PaymentRepository;
use LSB\PaymentBundle\Repository\PaymentTokenRepository;
use LSB\UtilityBundle\DependencyInjection\BaseExtension as BE;
use LSB\UtilityBundle\Config\Definition\Builder\TreeBuilder;
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
            ->resourceNode(
                'payment',
                Payment::class,
                PaymentInterface::class,
                PaymentFactory::class,
                PaymentRepository::class,
                PaymentManager::class,
                PaymentType::class
            )
            ->end()
            ->resourceNode(
                'payment_token',
                PaymentToken::class,
                PaymentTokenInterface::class,
                PaymentTokenFactory::class,
                PaymentTokenRepository::class,
                PaymentTokenManager::class,
                PaymentTokenType::class
            )
            ->end()
            ->translatedResourceNode(
                'method',
                Method::class,
                MethodInterface::class,
                MethodFactory::class,
                MethodRepository::class,
                MethodManager::class,
                MethodType::class,
                MethodTranslation::class,
                MethodTranslationInterface::class,
                MethodTranslationType::class
            )
            ->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
