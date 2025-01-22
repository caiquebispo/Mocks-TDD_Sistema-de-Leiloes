<?php

namespace Caique\Mocks\Dao\Mocks;

use Caique\Mocks\Dao\Leilao;
use Caique\Mocks\Model\Leilao as ModelLeilao;

class LeilaoDaoMock extends Leilao
{

    private $leiloes = [];

    public function salva(ModelLeilao $leilao): void
    {
        $this->leiloes[] = $leilao;
    }

    public function recuperarFinalizados(): array
    {
        return array_filter($this->leiloes, fn(ModelLeilao $leilao) => $leilao->estaFinalizado());
    }

    public function recuperarNaoFinalizados(): array
    {
        return array_filter($this->leiloes, fn(ModelLeilao $leilao) => !$leilao->estaFinalizado());
    }

    public function atualiza(ModelLeilao $leilao): void {}
}
