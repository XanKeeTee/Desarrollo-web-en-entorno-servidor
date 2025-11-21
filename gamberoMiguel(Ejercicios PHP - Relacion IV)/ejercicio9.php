<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 9 - Cuentas Bancarias</h5>
            </div>
            <div class="card-body">
                <?php
                abstract class CuentaBancaria
                {
                    private string $numeroCuenta;
                    protected string $nombreTitular;
                    protected float $saldo;
                    protected int $operaciones;

                    public function __construct(string $numero, string $nombre, float $saldoInicial = 0)
                    {
                        $this->numeroCuenta = $numero;
                        $this->nombreTitular = $nombre;
                        $this->saldo = $saldoInicial;
                        $this->operaciones = 0;
                    }
                    public function __destruct()
                    {
                    }

                    public function __toString(): string
                    {
                        $output = "<div class='border p-3 mb-3'>";
                        $output .= "<h4>{$this->numeroCuenta}</h4>";
                        $output .= "<p><strong>Titular: </strong> {$this->nombreTitular}</p>";
                        $output .= "<p><strong>Saldo: </strong> " . number_format($this->saldo, 2) . " €</p>";
                        $output .= "<p><strong>Operaciones : </strong>{$this->operaciones}</p>";
                        $output .= "</div>";
                        return $output;
                    }
                    public function depositarDinero(float $dinero): void
                    {
                        $this->saldo += $dinero;
                        $this->operaciones++;
                    }

                    abstract public function extraerDinero(float $dinero): void;

                    public function transferirDinero(float $dinero, self $cuentaDestino): void
                    {
                        $saldoAntesExtraccion = $this->saldo;
                        $this->extraerDinero($dinero);
                        if ($this->saldo < $saldoAntesExtraccion) {
                            $cuentaDestino->depositarDinero($dinero);
                        }
                    }
                }

                class CuentaDebito extends CuentaBancaria
                {
                    public function extraerDinero(float $dinero): void
                    {
                        if ($this->saldo >= $dinero) {
                            $this->saldo -= $dinero;
                            $this->operaciones++;
                        } else {
                            echo "<div class='alert alert-danger'>Operación denegada en cuenta de débito: Saldo insuficiente.</div>";
                        }
                    }
                }

                class CuentaCredito extends CuentaBancaria
                {
                    private float $limiteNegativo;

                    public function __construct(string $numero, string $nombre, float $saldoInicial = 0, float $limite = -100)
                    {
                        parent::__construct($numero, $nombre, $saldoInicial);
                        $this->limiteNegativo = $limite;
                    }

                    public function extraerDinero(float $dinero): void
                    {
                        if (($this->saldo - $dinero) >= $this->limiteNegativo) {
                            $this->saldo -= $dinero;
                            $this->operaciones++;
                        } else {
                            echo "<div class='alert alert-danger'>Operación denegada en cuenta de crédito: Límite de crédito excedido.</div>";
                        }
                    }
                }

                echo "<h5>Creando cuentas...</h5>";
                $cuentaDebito = new CuentaDebito("DB-001", "Juan Pérez");
                $cuentaCredito = new CuentaCredito("CR-002", "Ana García", 0, -500);

                echo $cuentaDebito;
                echo $cuentaCredito;

                echo "<hr><h5>Realizando operaciones...</h5>";

                echo "<p>Ingresando 200€ en la cuenta de débito y 100€ en la de crédito...</p>";
                $cuentaDebito->depositarDinero(200);
                $cuentaCredito->depositarDinero(100);

                echo "<p>Extrayendo 50€ de la cuenta de débito...</p>";
                $cuentaDebito->extraerDinero(50);

                echo "<p>Intentando extraer 200€ de la cuenta de débito (debería fallar)...</p>";
                $cuentaDebito->extraerDinero(200);

                echo "<p>Transfiriendo 250€ desde la cuenta de crédito a la de débito (la de crédito quedará en negativo)...</p>";
                $cuentaCredito->transferirDinero(250, $cuentaDebito);

                echo "<hr><h5>Estado final de las cuentas:</h5>";
                echo $cuentaDebito;
                echo $cuentaCredito;
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>