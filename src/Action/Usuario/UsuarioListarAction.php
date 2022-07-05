<?php
declare(strict_types=1);

namespace App\Action\Usuario;

use Psr\Http\Message\ResponseInterface as Response;
use App\Action\Action;
use App\Service\UsuarioService;
use App\Domain\Repository\UsuarioRepository;

class UsuarioListarAction extends UsuarioAction
{
    protected function action(): Response
    {
        // $objUsuarioService = new UsuarioService($this->getUsuarioService());
        $arrUsuarios = $this->getUsuarioService()->listarUsuarios();

        return $this->respondWithData($arrUsuarios);
    }
}
