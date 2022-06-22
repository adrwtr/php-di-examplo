<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Usuario;

class UsuarioRepository implements IUsuarioRepository
{
    /**
     * @var Usuario[]
     */
    private $arrUsuarios;

    /**
     * constructor.
     *
     * @param array|null $arrUsuarios
     */
    public function __construct(array $arrUsuarios = null)
    {
        $this->arrUsuarios = $arrUsuarios ?? [
            1 => new Usuario(1, 'Bill Gates'),
            2 => new Usuario(2, 'Steve Jobs'),
            3 => new Usuario(3, 'Mark Zuckerberg'),
            4 => new Usuario(4, 'Evan Spiegel'),
            5 => new Usuario(5, 'Jack Dorsey'),
        ];
    }

    public function findAll(): array
    {
        return array_values($this->arrUsuarios);
    }

    public function findUsuarioById(int $id): Usuario
    {
        if (!isset($this->arrUsuarios[$id])) {
            throw new Exception("Usuario " . $id . " não encontrado");
        }

        return $this->arrUsuarios[$id];
    }
}
