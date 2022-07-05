<?php
declare(strict_types=1);

namespace App\Action\Usuario;

use Psr\Http\Message\ResponseInterface as Response;
use App\Action\Action;
use App\Service\UsuarioService;
use App\Domain\Repository\UsuarioRepository;

class UsuarioAlterarAction extends UsuarioAction
{
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');
        $objJsonBody = $this->getFormData();
     
        $arrUsuarios = $this->getUsuarioService()->alterarUsuario(
            $id,
            $objJsonBody
        );

        return $this->respondWithData($arrUsuarios);
    }
}
