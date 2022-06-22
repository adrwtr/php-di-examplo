<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\User;

class UsuarioRepository implements IUsuarioRepository
{
    /**
     * @var Usuario[]
     */
    private $arrUsuarios;

    /**
     * constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $arrUsuarios = null)
    {
        $this->arrUsuarios = $arrUsuarios ?? [
            1 => new User(1, 'Bill Gates'),
            2 => new User(2, 'Steve Jobs'),
            3 => new User(3, 'Mark Zuckerberg'),
            4 => new User(4, 'Evan Spiegel'),
            5 => new User(5, 'Jack Dorsey'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->usuarios);
    }

    /**
     * {@inheritdoc}
     */
    public function findUsuarioById(int $id): User
    {
        if (!isset($this->usuarios[$id])) {
            throw new Exception("Usuario " . $id . " não encontrado");
        }

        return $this->usuarios[$id];
    }
}
