<?php
declare(strict_types=1);

namespace App\Action\Usuario;

use Psr\Http\Message\ResponseInterface as Response;
use App\Action\Action;

class UsuarioListarAction extends Action
{

    protected function action(): Response
    {
        //$users = $this->userRepository->findAll();

        //$this->logger->info("Users list was viewed.");

        $data = array(
            array(
                'id' => 1,
                'nome' => "Adriano"
            ),
    
            array(
                'id' => 2,
                'nome' => "Matheus"
            )
        );
        // $payload = json_encode($data);

        return $this->respondWithData($data);
        // return $this->respond($payload);
    }
}
