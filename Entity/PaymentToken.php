<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Payum\Core\Model\Token;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * @MappedSuperclass
 */
class PaymentToken extends Token implements PaymentTokenInterface
{

}