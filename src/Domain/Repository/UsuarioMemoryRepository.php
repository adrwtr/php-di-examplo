<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Usuario;

class UsuarioMemoryRepository implements IUsuarioRepository
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
            throw new \Exception("Usuario " . $id . " não encontrado");
        }

        return $this->arrUsuarios[$id];
    }

    public function insert(array $arrValores): Usuario
    {
        if (!isset($arrValores['ds_nome'])) {
            throw new \Exception('Campo ds_nome não informado');
        }

        $objNovo = new Usuario(
            count($this->arrUsuarios) + 1,
            $arrValores['ds_nome']
        );

        $this->arrUsuarios[] = $objNovo;

        return $objNovo;
    }

    public function update(int $id, array $arrValores): bool
    {
        if (!isset($arrValores['ds_nome'])) {
            throw Exception('Campo ds_nome não informado');
        }

        if (!isset($this->arrUsuarios[$id])) {
            throw Exception(
                'Id informado não existe. ID: '
                . $id
            );
        }

        $objNovo = $this->arrUsuarios[$id];
        $objNovo->setDsNome($arrValores['ds_nome']);

        return true;
    }

    public function delete(int $id): bool
    {
        if (!isset($this->arrUsuarios[$id])) {
            return false;
        }

        unset($this->arrUsuarios[$id]);

        return true;
    }
}
