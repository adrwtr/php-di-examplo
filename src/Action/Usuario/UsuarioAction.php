<?php
declare(strict_types=1);

namespace App\Action\Usuario;

use Psr\Http\Message\ResponseInterface as Response;
use App\Action\Action;
use App\Service\UsuarioService;

abstract class UsuarioAction extends Action
{
    /**
     * @var UsuarioService
     */
    protected $objUsuarioService;

    public function __construct(
        UsuarioService $objUsuarioService
    ) {
        $this->objUsuarioService = $objUsuarioService;
    }

    public function getUsuarioService() {
        return $this->objUsuarioService;
    }
}
