<?php
declare(strict_types=1);

namespace App\Action\Usuario;

use Psr\Http\Message\ResponseInterface as Response;
use App\Action\Action;
use App\Service\UsuarioService;
use App\Domain\Repository\UsuarioRepository;

class UsuarioListarAction extends Action
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
    
    protected function action(): Response
    {
        $objUsuarioService = new UsuarioService($this->getUsuarioRepository());
        $arrUsuarios = $objUsuarioService->listarUsuarios();

        return $this->respondWithData($arrUsuarios);
    }
}
