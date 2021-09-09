<?php
declare(strict_types=1);

namespace LSB\PaymentBundle\Repository;

use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\RepositoryInterface;

/**
 * Interface MethodRepositoryInterface
 * @package LSB\PaymentBundle\Repository
 */
interface MethodRepositoryInterface extends RepositoryInterface
{
    public function getEnabled(): array;

    public function getAll(): array;
}
