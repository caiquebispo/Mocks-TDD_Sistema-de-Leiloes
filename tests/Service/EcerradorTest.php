<?php

namespace Tests\Service;

use Caique\Mocks\Dao\Leilao as DaoLeilao;
use Caique\Mocks\Dao\Mocks\LeilaoDaoMock;
use Caique\Mocks\Model\Leilao;
use Caique\Mocks\Service\Encerrador;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class EcerradorTest extends TestCase
{
    public function test_leiloes_com_mais_de_uma_semana_deve_ser_encerrados()
    {

        $fiat = new Leilao('Fiat Uno 0km', new DateTimeImmutable('8 days ago'));
        $porsche = new Leilao('Porsche 911 Turbo', new DateTimeImmutable('10 days ago'));

        $dao = $this->createMock(DaoLeilao::class);
        $dao->method('recuperarNaoFinalizados')->willReturn([$fiat, $porsche]);
        $dao->method('recuperarFinalizados')->willReturn([$fiat, $porsche]);


        $finalizador = new Encerrador($dao);
        $finalizador->encerra();

        $leiloes = [$fiat, $porsche];

        $this->assertCount(2, $leiloes);
        $this->assertEquals('Fiat Uno 0km', $leiloes[0]->recuperarDescricao());
        $this->assertEquals('Porsche 911 Turbo', $leiloes[1]->recuperarDescricao());
    }
}
