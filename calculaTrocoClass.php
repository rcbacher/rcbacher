<?php

/**
 * Descrição de calculaTrocoClass
 *
 * @author rangel
 */
class calculaTrocoClass {

    private $pago;
    private $custoproduto;

    public function __construct($pago, $custoproduto) {
        $this->pago = $pago;
        $this->custoproduto = $custoproduto;
    }

    public function getTroco() {
        return $this->custoproduto - $this->pago;
    }

    public function retornaTroco() {

        // calcula o troco
        $troco = $this->pago - $this->custoproduto;
        echo '<div class="alert alert-success" role="alert">Troco Total: R$ ' . $troco . '<br></div>';
        $valor = array(5000, 2000, 1000, 500, 100, 50, 10, 5, 2, 1, 0.50, 0.10, 0.05, 0.01);

        $seu_troco = array();
        foreach ($valor as $el) {
            $seu_troco[$el] = 0;
        }

        $sobra = $troco * 100;

        reset($valor);
        do {

            $valor_atual = current($valor);

            if ($valor_atual > $sobra) {

                next($valor);
            } else {

                $sobra = (int) ($sobra - $valor_atual);

                $seu_troco[$valor_atual] ++;
            }
        } while ($sobra > 0);

        $test = 0;
        foreach ($seu_troco as $key => $montante) {

            if (!empty($montante)) {
                echo '<div class="alert alert-success" role="alert">Forneça ao seu cliente ' . $montante . ' nota de R$ ' . ($key / 100) . '<br></div>';
            }

            $test += ($key / 100) * $montante;
        }
        return;
        $test;
    }

}
