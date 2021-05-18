<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Gedmo\Mapping\Annotation as Gedmo;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use LSB\UtilityBundle\Translatable\TranslatableTrait;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\UuidTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Method
 * @package LSB\PaymentBundle\Entity
 * @UniqueEntity(fields={"code"})
 * @MappedSuperclass
 */
class Method implements MethodInterface
{
    use UuidTrait;
    use TranslatableTrait;
    use CreatedUpdatedTrait;

    /**
     * Code
     *
     * @var string
     * @ORM\Column(type="string", length=30)
     * @Gedmo\Slug(fields={"name"}, updatable=false, separator="-")
     * @Assert\Length(max=30, groups={"Default"})
     */
    protected string $code;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getCode();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->generateUuid();
    }

    /**
     * @throws \Exception
     */
    public function __clone()
    {
        $this->id = null;
        $this->generateUuid(true);
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
}
