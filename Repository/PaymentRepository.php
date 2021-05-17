<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\PaymentBundle\Entity\Payment;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class PaymentRepository
 * @package LSB\PaymentBundle\Repository
 */
class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface, PaginationInterface
{
    use PaginationRepositoryTrait;

    /**
     * PaymentRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Payment::class);
    }

}
