<?php

namespace Caique\Mocks\Service;

use Caique\Mocks\Dao\Leilao;

class Encerrador
{
    private $dao;

    public function __construct(Leilao $dao)
    {
        $this->dao = $dao;
    }

    public function encerra()
    {
        $leiloes = $this->dao->recuperarNaoFinalizados();

        foreach ($leiloes as $leilao) {
            if ($leilao->temMaisDeUmaSemana()) {
                $leilao->finaliza();
                $this->dao->atualiza($leilao);
            }
        }
    }
}
