<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\EventListener;

use LSB\PaymentBundle\Entity\PaymentInterface;
use Payum\Core\Bridge\Symfony\Event\ExecuteEvent;
use Payum\Core\Request\Generic;
use Payum\Core\Request\GetHumanStatus;
use Payum\Core\Request\GetStatusInterface;

/**
 * Class BasePayumGatewayListener
 * @package LSB\PaymentBundle\EventListener
 */
abstract class BasePayumGatewayListener
{
    /**
     * @param ExecuteEvent $executeEvent
     */
    public function onPayumGatewayExecute(ExecuteEvent $executeEvent)
    {

    }

    /**
     * @param ExecuteEvent $event
     */
    public function onPayumGatewayPostExecute(ExecuteEvent $event)
    {
        $context = $event->getContext();

        if ($context->getPrevious()) {
            return;
        }

        /** @var Generic $request */
        $request = $context->getRequest();

        if (false === $request instanceof Generic) {
            return;
        }

        if ($request instanceof GetStatusInterface) {
            return;
        }

        if ($request->getFirstModel() instanceof PaymentInterface) {
            /** @var PaymentInterface $payment */
            $payment = $request->getFirstModel();
            $context->getGateway()->execute($status = new GetHumanStatus($payment));
            $payment->setStatus($status->isCaptured() ? PaymentInterface::STATUS_PAID : PaymentInterface::STATUS_PENDING);
        }
    }
}