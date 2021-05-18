<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\PaymentBundle\Entity\MethodTranslation;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class MethodTranslationRepository
 * @package LSB\PaymentBundle\Repository
 */
class MethodTranslationRepository extends BaseRepository implements MethodTranslationRepositoryInterface
{
    use PaginationRepositoryTrait;

    /**
     * MethodTranslationRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? MethodTranslation::class);
    }

}
