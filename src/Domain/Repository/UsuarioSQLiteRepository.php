<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Usuario;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class UsuarioSQLiteRepository implements IUsuarioRepository
{
    private EntityManager $em;
    private EntityRepository $objRepository;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;

        $this->objRepository = $this->em->getRepository(
            \App\Domain\Model\Usuario::class
        );
    }

    public function getRepository()
    {
        return $this->objRepository;
    }

    public function findAll(): array
    {
        return $this->getRepository()
            ->findAll();
    }

    public function findUsuarioById(int $id): Usuario
    {
        $arrUsuario = $this->em->find(
            \App\Domain\Model\Usuario::class,
            $id
        );

        if ($arrUsuario == null) {
            throw new \Exception("Usuario " . $id . " não encontrado");
        }

        return $arrUsuario;
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
