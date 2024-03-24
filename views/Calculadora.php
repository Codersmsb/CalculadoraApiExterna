<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        /* Estilo adicional */
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Calculadora</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="calculadoraForm">
                    <div class="form-group">
                        <input type="text" class="form-control" name="numero1" id="numero1" placeholder="Número 1" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="numero2" id="numero2" placeholder="Número 2" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="operacion" id="operacion" required>
                            <option value="+" selected>Suma</option>
                            <option value="-">Resta</option>
                            <option value="*">Multiplicación</option>
                            <option value="/">División</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Calcular</button>
                </form>
                <div id="resultado" class="mt-3 text-center"></div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#calculadoraForm').submit(function(e) {
            e.preventDefault();

            // Se obtienen los valores del formulario
            var numero1 = $('#numero1').val();
            var numero2 = $('#numero2').val();
            var operacion = $('#operacion').val();

            // Se realiza la solicitud AJAX para calcular
            $.ajax({
                url: 'index.php?action=calcular',
                type: 'POST',
                dataType: 'json',
                data: {
                    numero1: numero1,
                    numero2: numero2,
                    operacion: operacion
                },
                success: function(response) {
                    // Se muestra el resultado utilizando Sweet Alert
                    Swal.fire({
                        icon: 'success',
                        title: 'Resultado',
                        text: 'El resultado es: ' + response,
                    });
                },
                error: function(xhr, status, error) {
                    // Se muestra el mensaje de error utilizando Sweet Alert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseText,
                    });
                }
            });
        });
    });
</script>

</body>
</html>
