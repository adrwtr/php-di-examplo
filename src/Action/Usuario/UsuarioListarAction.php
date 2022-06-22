<?php
declare(strict_types=1);

namespace App\Action\Usuario;

use Psr\Http\Message\ResponseInterface as Response;
use App\Action\Action;
use App\Service\UsuarioService;

class UsuarioListarAction extends Action
{
    protected function action(): Response
    {
        $objUsuarioService = new UsuarioService();

        $arrUsuarios = $objUsuarioService->listarUsuarios();

        // $payload = json_encode($data);

        return $this->respondWithData($arrUsuarios);
        // return $this->respond($payload);
    }
}
