<?php
declare(strict_types=1);

namespace App\Service;


use App\Domain\Repository\UsuarioRepository;

class UsuarioService
{
    /**
     * @var UsuarioRepository
     */
    protected $objUsuarioRepository;

    public function __construct(
        UsuarioRepository $objUsuarioRepository
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
}
