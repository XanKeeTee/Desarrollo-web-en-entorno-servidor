<!doctype html>
<html lang="es">
    <head>
        <title>Ejercicio 5 - Validación JS</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <div class="container mt-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 ">Ejercicio 5 - Validación Formulario</h5>
                </div>
                <div class="card-body">
                    <form method="POST" id="formularioValidacion">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="text" class="form-control" name="correo" id="correo" required>
                                <div id="emailError" class="text-danger mt-1 small"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                                <select class="form-select" name="tipoDocumento" id="tipoDocumento" required>
                                    <option value="">Selecciona...</option>
                                    <option value="DNI">DNI</option>
                                    <option value="NIE">NIE</option>
                                    <option value="TIE">TIE</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="numeroDocumento" class="form-label">Número de Documento</label>
                                <input type="text" class="form-control" name="numeroDocumento" id="numeroDocumento" required>
                                <div id="documentError" class="text-danger mt-1 small"></div>
                            </div>
                            <div class="col-md-4 mb-3" id="numeroSoporteTIEGroup" style="display: none;">
                                <label for="numeroSoporteTIE" class="form-label">Número de Soporte TIE</label>
                                <input type="text" class="form-control" name="numeroSoporteTIE" id="numeroSoporteTIE">
                                <div id="tieSupportError" class="text-danger mt-1 small"></div>
                            </div>
                        </div>

                        <hr>
                        <h6 class="mt-4">Notas de Evaluación</h6>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Inicial</label>
                                <input type="number" class="form-control" name="inicial" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Primera</label>
                                <input type="number" class="form-control" name="primera" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Segunda</label>
                                <input type="number" class="form-control" name="segunda" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Tercera</label>
                                <input type="number" class="form-control" name="tercera" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>

                        <?php 
                        if ($_SERVER['REQUEST_METHOD'] === 'POST'):
                            $rubrica = ["inicial" => 0.1, "primera" => 0.25, "segunda" => 0.25, "tercera" => 0.4];
                            $notas = [
                                "inicial" => isset($_POST['inicial']) ? (float)$_POST['inicial'] : 0,
                                "primera" => isset($_POST['primera']) ? (float)$_POST['primera'] : 0,
                                "segunda" => isset($_POST['segunda']) ? (float)$_POST['segunda'] : 0,
                                "tercera" => isset($_POST['tercera']) ? (float)$_POST['tercera'] : 0
                            ];
                            $nota_final = ($rubrica["inicial"] * $notas["inicial"]) + ($rubrica["primera"] * $notas["primera"]) + ($rubrica["segunda"] * $notas["segunda"]) + ($rubrica["tercera"] * $notas["tercera"]);

                            $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
                            $correo = isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : '';
                            $tipoDocumento = isset($_POST['tipoDocumento']) ? htmlspecialchars($_POST['tipoDocumento']) : '';
                            $numeroDocumento = isset($_POST['numeroDocumento']) ? htmlspecialchars($_POST['numeroDocumento']) : '';
                            $numeroSoporteTIE = isset($_POST['numeroSoporteTIE']) ? htmlspecialchars($_POST['numeroSoporteTIE']) : '';
                        ?>
                            <div class="alert alert-info mt-4">
                                <h5 class="alert-heading">Datos Recibidos</h5>
                                <p><strong>Usuario:</strong> <?php echo $nombre; ?> con correo <strong><?php echo $correo; ?></strong></p>
                                <p><strong>Documento:</strong> <?php echo $tipoDocumento . " - " . $numeroDocumento; ?></p>
                                <?php if ($tipoDocumento === 'TIE' && !empty($numeroSoporteTIE)): ?>
                                    <p><strong>Número de Soporte TIE:</strong> <?php echo $numeroSoporteTIE; ?></p>
                                <?php endif; ?>
                                <hr>
                                <p><strong>Nota Final:</strong> <?php echo number_format($nota_final, 2); ?></p>
                                <p class="mb-0"><strong>Resultado:</strong> <?php echo ($nota_final >= 5) ? "Aprobado" : "Suspendido"; ?></p>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('formularioValidacion');
                const emailInput = document.getElementById('correo');
                const tipoDocumentoSelect = document.getElementById('tipoDocumento');
                const numeroDocumentoInput = document.getElementById('numeroDocumento');
                const numeroSoporteTIEInput = document.getElementById('numeroSoporteTIE');
                const numeroSoporteTIEGroup = document.getElementById('numeroSoporteTIEGroup');

                const emailError = document.getElementById('emailError');
                const documentError = document.getElementById('documentError');
                const tieSupportError = document.getElementById('tieSupportError');

                const dniLetters = 'TRWAGMYFPDXBNJZSQVHLCKE';

                function validateEmail(email) {
                    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return re.test(String(email).toLowerCase());
                }

                function validateDNI(dni) {
                    const dniRegex = /^\d{8}[A-Z]$/;
                    if (!dniRegex.test(dni)) return false;
                    const number = parseInt(dni.substring(0, 8), 10);
                    const letter = dni.substring(8, 9);
                    return dniLetters[number % 23] === letter;
                }

                function validateNIE(nie) {
                    const nieRegex = /^[XYZ]\d{7}[A-Z]$/;
                    if (!nieRegex.test(nie)) return false;
                    let niePrefix = nie.substring(0, 1);
                    let nieNumberStr = nie.substring(1, 8);
                    let nieLetter = nie.substring(8, 9);

                    let initialNumber;
                    if (niePrefix === 'X') initialNumber = '0';
                    else if (niePrefix === 'Y') initialNumber = '1';
                    else if (niePrefix === 'Z') initialNumber = '2';
                    else return false;

                    const number = parseInt(initialNumber + nieNumberStr, 10);
                    return dniLetters[number % 23] === nieLetter;
                }

                function validateTIESupportNumber(supportNumber) {
                    const tieSupportRegex = /^E\d{8}$/;
                    return tieSupportRegex.test(supportNumber);
                }

                tipoDocumentoSelect.addEventListener('change', function() {
                    if (this.value === 'TIE') {
                        numeroSoporteTIEGroup.style.display = 'block';
                        numeroSoporteTIEInput.setAttribute('required', 'required');
                    } else {
                        numeroSoporteTIEGroup.style.display = 'none';
                        numeroSoporteTIEInput.removeAttribute('required');
                        tieSupportError.textContent = '';
                    }
                });

                form.addEventListener('submit', function(e) {
                    let isValid = true;
                    emailError.textContent = '';
                    documentError.textContent = '';
                    tieSupportError.textContent = '';

                    if (!validateEmail(emailInput.value)) {
                        emailError.textContent = 'Por favor, introduce un correo electrónico válido.';
                        isValid = false;
                    }

                    const selectedDocumentType = tipoDocumentoSelect.value;
                    const documentNumber = numeroDocumentoInput.value.toUpperCase();

                    if (selectedDocumentType === 'DNI' && !validateDNI(documentNumber)) {
                        documentError.textContent = 'El DNI no es válido (ej: 12345678A).';
                        isValid = false;
                    } else if (selectedDocumentType === 'NIE' && !validateNIE(documentNumber)) {
                        documentError.textContent = 'El NIE no es válido (ej: X1234567B).';
                        isValid = false;
                    } else if (selectedDocumentType === 'TIE') {
                        if (!validateNIE(documentNumber)) {
                            documentError.textContent = 'El número de TIE (formato NIE) no es válido.';
                            isValid = false;
                        }
                        const tieSupportNumber = numeroSoporteTIEInput.value.toUpperCase();
                        if (!validateTIESupportNumber(tieSupportNumber)) {
                            tieSupportError.textContent = 'El nº de soporte no es válido (ej: E00123456).';
                            isValid = false;
                        }
                    } else if (selectedDocumentType === '') {
                        documentError.textContent = 'Selecciona un tipo de documento.';
                        isValid = false;
                    }

                    if (!isValid) {
                        e.preventDefault();
                    }
                });
            });
        </script>
    </body>
</html>
