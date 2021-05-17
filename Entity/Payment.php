<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;
use Payum\Core\Model\Payment as BasePayment;

/**
 * Class Payment
 * @package LSB\PaymentBundle\Entity
 * @MappedSuperclass
 */
class Payment extends BasePayment implements PaymentInterface
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @var int|null
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $status;

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     * @return Payment
     */
    public function setStatus(?int $status): Payment
    {
        $this->status = $status;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
}
