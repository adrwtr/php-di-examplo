<?php
declare(strict_types=1);

namespace App\Domain\Model;

use JsonSerializable;

class Usuario implements JsonSerializable
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

    /**
     * @return string
     */
    public function setDsNome($ds_valor): string
    {
        $this->ds_nome = $ds_valor;
        return $this->ds_nome;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'ds_nome' => $this->ds_nome
        ];
    }
}
