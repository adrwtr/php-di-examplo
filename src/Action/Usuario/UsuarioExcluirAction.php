<?php
declare(strict_types=1);

namespace App\Action\Usuario;

use Psr\Http\Message\ResponseInterface as Response;
use App\Action\Action;
use App\Service\UsuarioService;
use App\Domain\Repository\UsuarioRepository;

class UsuarioExcluirAction extends UsuarioAction
{
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');

        $arrUsuarios = $this->getUsuarioService()
            ->excluirUsuario(
                $id
            );

        return $this->respondWithData($arrUsuarios);
    }
}
