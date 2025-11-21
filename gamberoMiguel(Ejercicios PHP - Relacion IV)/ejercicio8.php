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
                <h5 class="mb-0">Ejercicio 8</h5>
            </div>
            <div class="card-body">
                <?php
                class cuentaBancaria
                {
                    private string $numeroCuenta;
                    private string $nombreTitular;
                    private float $saldo;
                    private int $operaciones;

                    public function __construct(string $numero, string $nombre)
                    {
                        $this->numeroCuenta = $numero;
                        $this->nombreTitular = $nombre;
                        $this->saldo = 0;
                        $this->operaciones = 0;
                    }
                    public function __destruct() {}

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
                    public function depositarDinero(int $dinero){
                        $this->saldo += $dinero;
                        $this->operaciones++;
                    }

                    public function extraerDinero(float $dinero): void {
                        $this->saldo -= $dinero;
                        $this->operaciones++;
                    }

                    public function transferirDinero(float $dinero, self $cuentaDestino): void {
                        $this->extraerDinero($dinero);
                        $cuentaDestino -> depositarDinero($dinero);
                    }
                }
                
                $cuenta1 = new cuentaBancaria("N-111-222-333","MiguelAngel");
                $cuenta2 = new cuentaBancaria("N-999-888-777","DanielManuel");

                $cuenta1->depositarDinero(50);
                $cuenta2->depositarDinero(100);

                $cuenta2->extraerDinero(25);

                $cuenta2->transferirDinero(25,$cuenta1);

                echo $cuenta1->__toString();
                echo $cuenta2->__toString();
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>