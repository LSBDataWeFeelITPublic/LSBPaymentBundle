<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\PaymentBundle\Entity\PaymentToken;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class PaymentTokenRepository
 * @package LSB\PaymentBundle\Repository
 */
class PaymentTokenRepository extends BaseRepository implements PaymentTokenRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * PaymentTokenRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? PaymentToken::class);
    }

}
