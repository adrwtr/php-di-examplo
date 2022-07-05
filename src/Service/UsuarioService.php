<?php
declare(strict_types=1);

namespace App\Service;


use App\Domain\Repository\UsuarioMemoryRepository;

class UsuarioService
{
    /**
     * @var UsuarioMemoryRepository
     */
    protected $objUsuarioRepository;

    public function __construct(
        UsuarioMemoryRepository $objUsuarioRepository
    ) {
        $this->objUsuarioRepository = $objUsuarioRepository;
    }

    public function getUsuarioRepository() {
        return $this->objUsuarioRepository;
    }

    public function listarUsuarios(): array
    {
        return $this->getUsuarioRepository()->findAll();
    }

    public function procurarUsuario($id): array
    {
        return $this->getUsuarioRepository()
            ->findUsuarioById($id)
            ->jsonSerialize();
    }
}
