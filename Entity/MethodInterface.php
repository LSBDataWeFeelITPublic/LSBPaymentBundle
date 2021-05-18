<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Entity;

use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;

/**
 * Interface MethodInterface
 * @package LSB\PaymentBundle\Entity
 */
interface MethodInterface extends TranslatableInterface
{
    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): self;
}