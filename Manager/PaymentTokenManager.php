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
use Payum\Core\GatewayInterface;
use Payum\Core\Payum;
use Payum\Core\Security\TokenInterface;
use Symfony\Component\HttpFoundation\Request;

/**
* Class PaymentTokenManager
* @package LSB\PaymentBundle\Manager
*/
class PaymentTokenManager extends BaseManager
{
    /**
     * @var Payum
     */
    protected Payum $payum;

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
        ?BaseEntityType $form,
        Payum $payum
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
        $this->payum = $payum;
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

    /**
     * @return \Payum\Core\Security\GenericTokenFactoryInterface
     */
    public function getPayumFactory()
    {
        return $this->payum->getTokenFactory();
    }

    /**
     * @param $gatewayName
     * @param $model
     * @param $afterPath
     * @param array $afterParameters
     * @return TokenInterface
     */
    public function createCaptureToken($gatewayName, $model, $afterPath, array $afterParameters = []): TokenInterface
    {
        return $this->getPayumFactory()->createCaptureToken($gatewayName, $model, $afterPath, $afterParameters);
    }

    /**
     * @param $gatewayName
     * @param null $model
     * @return TokenInterface
     */
    public function createNotifyToken($gatewayName, $model = null): TokenInterface
    {
        return $this->getPayumFactory()->createNotifyToken($gatewayName, $model);
    }

    /**
     * @param $gatewayName
     * @param $model
     * @param $afterPath
     * @param array $afterParameters
     * @return TokenInterface
     */
    public function createAuthorizeToken($gatewayName, $model, $afterPath, array $afterParameters = []): TokenInterface
    {
        return $this->getPayumFactory()->createAuthorizeToken($gatewayName, $model, $afterPath, $afterParameters = []);
    }

    /**
     * @param Request $request
     * @return TokenInterface|null
     * @throws \Exception
     */
    public function getTokenFromRequest(Request $request): ?TokenInterface
    {
        return $this->payum->getHttpRequestVerifier()->verify($request);
    }

    /**
     * @param TokenInterface $token
     * @return TokenInterface|null
     */
    public function invalidateToken(TokenInterface $token): ?TokenInterface
    {
        return $this->payum->getHttpRequestVerifier()->invalidate($token);
    }

    /**
     * @param TokenInterface $token
     * @return \Payum\Core\GatewayInterface
     */
    public function getGatewayFromToken(TokenInterface $token): GatewayInterface
    {
        return $this->payum->getGateway($token->getGatewayName());
    }
}
