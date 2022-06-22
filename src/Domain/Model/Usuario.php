<?php
declare(strict_types=1);

namespace App\Domain\Model;

class Usuario
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $ds_nome;

    /**
     * @param int|null  $id
     * @param string    $ds_nome
     */
    public function __construct(?int $id, string $ds_nome)
    {
        $this->id = $id;
        $this->ds_nome = $ds_nome;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDsNome(): string
    {
        return $this->ds_nome;
    }
}
