<?php
declare(strict_types=1);

namespace App\Domain\Repository;

interface IUsuarioRepository
{
    /**
     * @return Usuario[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Usuario
     * @throws Exception
     */
    public function findUsuarioById(int $id): Usuario;
}
