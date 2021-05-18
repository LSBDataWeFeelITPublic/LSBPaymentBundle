<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Entity;

use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;

/**
 * Interface MethodTranslationInterface
 * @package LSB\PaymentBundle\Entity
 */
interface MethodTranslationInterface extends TranslationInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): self;
}