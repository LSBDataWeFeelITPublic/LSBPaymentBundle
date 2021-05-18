<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\PaymentBundle\Entity\Method;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class MethodRepository
 * @package LSB\PaymentBundle\Repository
 */
class MethodRepository extends BaseRepository implements MethodRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * MethodRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Method::class);
    }

}
