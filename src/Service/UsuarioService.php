<?php
declare(strict_types=1);

namespace App\Service;


use App\Domain\Repository\UsuarioRepository;

class UsuarioService
{
    public function listarUsuarios(): array
    {
        $objUsuarioRepository = new UsuarioRepository();
        return $objUsuarioRepository->findAll();
    }
}
