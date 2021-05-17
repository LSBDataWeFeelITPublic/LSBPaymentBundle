<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Entity;

use Payum\Core\Model\DirectDebitPaymentInterface;

/**
 * Interface PaymentInterface
 * @package LSB\PaymentBundle\Entity
 */
interface PaymentInterface extends \Payum\Core\Model\PaymentInterface, DirectDebitPaymentInterface
{
    const STATUS_PENDING = 10;
    const STATUS_PAID = 100;
}