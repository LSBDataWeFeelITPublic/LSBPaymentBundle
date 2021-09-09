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

    /**
     * @return array
     */
    public function getAll(): array
    {
        $qb = $this->createQueryBuilder('m');
        $qb->orderBy('m.id', 'ASC');

        return $qb->getQuery()->execute();
    }

    /**
     * @return array
     */
    public function getEnabled(): array
    {
        $qb = $this->createQueryBuilder('m');
        $qb->where('m.isEnabled = TRUE')
            ->orderBy('m.id', 'ASC');

        return $qb->getQuery()->execute();
    }
}
