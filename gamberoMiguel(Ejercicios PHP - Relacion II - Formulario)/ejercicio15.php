<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 ">Ejercicio 15</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method ="POST" id="formulario">
                    <div class="mb-3">
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Numero</label>
                        <input type="number" class="form-control" name="numero" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Factorial</label>
                        <input type="number" class="form-control" name="factorial" required>
                    </div>  
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div id="resultado15"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const formElement = document.getElementById('formulario');

        if (formElement) {
            formElement.addEventListener('submit', function(e) {
                e.preventDefault(); // evitar recarga
                const formData = new FormData(formElement);

                const numeroRaw = formData.get('numero');
                const numero = Number(numeroRaw);
                const resultadoEl = document.getElementById('resultado15');
                resultadoEl.innerHTML = '';

                if (numeroRaw === null || numeroRaw === '' || Number.isNaN(numero) || !Number.isInteger(numero) || numero < 0) {
                    resultadoEl.textContent = 'El número debe ser un entero positivo.';
                    return;
                }

                if (numero === 0) {
                    resultadoEl.textContent = 'El factorial de 0 es 1.';
                    return;
                }

                let factorial = 1;
                const pasos = [];
                for (let i = 1; i <= numero; i++) {
                    factorial *= i;
                    pasos.push(i);
                }

                resultadoEl.innerHTML = `Cálculo del factorial de ${numero}:<br>${pasos.join(' x ')} = ${factorial}`;
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>