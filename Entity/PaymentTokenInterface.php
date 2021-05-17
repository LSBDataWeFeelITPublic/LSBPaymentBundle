<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Entity;

use Payum\Core\Security\TokenInterface;

/**
 * Interface PaymentTokenInterface
 * @package LSB\PaymentBundle\Entity
 */
interface PaymentTokenInterface extends TokenInterface
{

}