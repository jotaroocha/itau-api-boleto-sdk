<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Modelos;

use DateTime;

class Boleto
{
    private int $id;
    private float $total;
    private DateTime $dataVencimento;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    public function getDataVencimento(): DateTime
    {
        return $this->dataVencimento;
    }

    public function setDataVencimento(DateTime $dataVencimento): void
    {
        $this->dataVencimento = $dataVencimento;
    }


}
