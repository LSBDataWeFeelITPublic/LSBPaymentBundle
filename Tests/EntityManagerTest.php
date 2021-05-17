<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Tests;

use LSB\PaymentBundle\Entity\PaymentInterface;
use LSB\PaymentBundle\Factory\EntityFactory;
use LSB\PaymentBundle\Factory\EntityFactoryInterface;
use LSB\PaymentBundle\Manager\EntityManager;
use LSB\PaymentBundle\Repository\EntityRepository;
use LSB\PaymentBundle\Repository\EntityRepositoryInterface;
use LSB\UtilityBundle\Manager\ObjectManager;
use PHPUnit\Framework\TestCase;

/**
 * Class EntityManagerTest
 * @package LSB\PaymentBundle\Tests
 */
class EntityManagerTest extends TestCase
{
    /**
     * Assert returned interfaces
     * @throws \Exception
     */
    public function testReturnedInterfaces()
    {
        $objectManagerMock = $this->createMock(ObjectManager::class);
        $entityFactoryMock = $this->createMock(EntityFactory::class);
        $entityRepositoryMock = $this->createMock(EntityRepository::class);

        $entityManager = new EntityManager($objectManagerMock, $entityFactoryMock, $entityRepositoryMock, null);

        $this->assertInstanceOf(PaymentInterface::class, $entityManager->createNew());
        $this->assertInstanceOf(EntityFactoryInterface::class, $entityManager->getFactory());
        $this->assertInstanceOf(EntityRepositoryInterface::class, $entityManager->getRepository());
    }
}
