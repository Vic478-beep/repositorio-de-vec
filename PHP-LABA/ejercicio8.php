<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        select:focus {
            border-color: #007BFF;
        }

        .input-error {
            border-color: red !important;
        }

        textarea {
            resize: vertical;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 8px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group.radio-group {
            display: flex;
            flex-wrap: wrap;
        }

        .form-group.radio-group label {
            margin-right: 16px;
        }

        .form-group.checkbox-group {
            display: flex;
            align-items: center;
        }

        .form-group.checkbox-group input {
            margin-right: 10px;
            margin-left: 10px;
        }

        .form-group.checkbox-group label {
            margin-right: 10px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 4px;
            margin-bottom: 12px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
    $errors = [
        'nombre' => '',
        'apellido' => '',
        'correo' => '',
        'comentarios' => '',
        'idioma' => '',
        'musica' => '',
        'pasatiempo' => '',
    ];

    if (isset($_POST['submit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"] ?? '';
            $apellido = $_POST["apellido"] ?? '';
            $correo = $_POST["correo"] ?? '';
            $comentarios = $_POST["comentarios"] ?? '';
            $idioma = $_POST["idioma"] ?? '';
            $musica = $_POST["musica"] ?? '';
            $pasatiempos = $_POST["pasatiempo"] ?? [];
    
            if (empty($nombre)) {
                $errors['nombre'] = "El campo 'Nombre' es obligatorio.";
            } elseif (strlen($nombre) <= 3 || strlen($nombre) >= 20) {
                $errors['nombre'] = "El campo 'Nombre' debe tener más de 3 y menos de 20 caracteres.";
            }
    
            if (empty($apellido)) {
                $errors['apellido'] = "El campo 'Apellido' es obligatorio.";
            } elseif (strlen($apellido) <= 3 || strlen($apellido) >= 20) {
                $errors['apellido'] = "El campo 'Apellido' debe tener más de 3 y menos de 20 caracteres.";
            }
    
            if (empty($correo)) {
                $errors['correo'] = "El campo 'Correo' es obligatorio.";
            } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $errors['correo'] = "El formato del 'Correo' no es válido.";
            }
    
            if (empty($comentarios)) {
                $errors['comentarios'] = "El campo 'Comentarios' es obligatorio.";
            } elseif (strlen($comentarios) <= 5 || strlen($comentarios) >= 50) {
                $errors['comentarios'] = "El campo 'Comentarios' debe tener más de 5 y menos de 50 caracteres.";
            } elseif (preg_match('/[\*.,\/@]/', $comentarios)) {
                $errors['comentarios'] = "El campo 'Comentarios' no debe contener los caracteres *, ., /, @.";
            }
            
            if (empty($idioma)) {
                $errors['idioma'] = "El campo 'Idioma' es obligatorio.";
            }
    
            if (empty($musica)) {
                $errors['musica'] = "El campo 'Musica' es obligatorio.";
            }
    
            if (empty($pasatiempos)) {
                $errors['pasatiempo'] = "El campo 'Pasatiempo' es obligatorio.";
            }
    
            if (array_filter($errors)) {
                // Do nothing
            } else {
                echo "Formulario enviado correctamente.<br>";
    
                $saludo = "Hola " . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . ",<br>";
                $saludo .= "Tu correo es " . htmlspecialchars($correo) . ".<br>";
                $saludo .= "Tus comentarios son: " . htmlspecialchars($comentarios) . ".<br>";
                $saludo .= "Tu idioma es " . htmlspecialchars($idioma) . ".<br>";
                $saludo .= "Tu tipo de música es " . htmlspecialchars($musica) . ".<br>";
    
                if (!is_array($pasatiempos)) {
                    $pasatiempos = [$pasatiempos];
                }
    
                $pasatiempos_list = implode(', ', array_map('htmlspecialchars', $pasatiempos));
                $saludo .= "Tus pasatiempos son: " . $pasatiempos_list . ".<br>";
    
                echo $saludo;
            }
        }
    }
?>

    <form action="" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="<?php echo !empty($errors['nombre']) ? 'input-error' : ''; ?>">
            <div class="error-message"><?php echo htmlspecialchars($errors['nombre']); ?></div>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" class="<?php echo !empty($errors['apellido']) ? 'input-error' : ''; ?>">
            <div class="error-message"><?php echo htmlspecialchars($errors['apellido']); ?></div>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" class="<?php echo !empty($errors['correo']) ? 'input-error' : ''; ?>">
            <div class="error-message"><?php echo htmlspecialchars($errors['correo']); ?></div>
        </div>
        <div class="form-group">
            <label for="comentarios">Comentarios:</label>
            <textarea name="comentarios" id="comentarios" class="<?php echo !empty($errors['comentarios']) ? 'input-error' : ''; ?>"></textarea>
            <div class="error-message"><?php echo htmlspecialchars($errors['comentarios']); ?></div>
        </div>
        <div class="form-group">
            <label for="idioma">Idioma:</label>
            <select name="idioma" id="idioma" class="<?php echo !empty($errors['idioma']) ? 'input-error' : ''; ?>">
                <!-- <option value="">Seleccione el idioma</option>
                <option value="es">Español</option>
                <option value="in">Inglés</option>
                <option value="fr">Francés</option>
                <option value="ay">Aymara</option>
                <option value="port">Portugués</option> -->
                <?php
                for ($i=0;$i<count($idiomas_array); $i++){
                    echo "<option value'".$i."'>".$idiomas_array[$i]."</option>";
                    echo count($idiomas_array);
                }
                ?>
            </select>
            <div class="error-message"><?php echo htmlspecialchars($errors['idioma']); ?></div>
        </div>
        <div class="form-group radio-group">
            <label>Musica:</label>
            <label for="musica-rock">Rock</label>
            <input type="radio" name="musica" id="musica-rock" value="rock" class="<?php echo !empty($errors['musica']) ? 'input-error' : ''; ?>">
            <label for="musica-classico">Clásico</label>
            <input type="radio" name="musica" id="musica-classico" value="classico" class="<?php echo !empty($errors['musica']) ? 'input-error' : ''; ?>">
            <label for="musica-folklore">Folklore</label>
            <input type="radio" name="musica" id="musica-folklore" value="folklore" class="<?php echo !empty($errors['musica']) ? 'input-error' : ''; ?>">
            <label for="musica-otros">Otros</label>
            <input type="radio" name="musica" id="musica-otros" value="otros" class="<?php echo !empty($errors['musica']) ? 'input-error' : ''; ?>">
            <div class="error-message" style="flex-basis: 100%;"><?php echo htmlspecialchars($errors['musica']); ?></div>
        </div>
        <div class="form-group checkbox-group">
            <label for="pasatiempo">Pasatiempo:</label>
            <label for="pasatiempo-jugar">Jugar</label>
            <input type="checkbox" name="pasatiempo[]" id="pasatiempo-jugar" value="jugar" class="<?php echo !empty($errors['pasatiempo']) ? 'input-error' : ''; ?>">
            <label for="pasatiempo-cantar">Cantar</label>
            <input type="checkbox" name="pasatiempo[]" id="pasatiempo-cantar" value="cantar" class="<?php echo !empty($errors['pasatiempo']) ? 'input-error' : ''; ?>">
            <label for="pasatiempo-programar">Programar</label>
            <input type="checkbox" name="pasatiempo[]" id="pasatiempo-programar" value="programar" class="<?php echo !empty($errors['pasatiempo']) ? 'input-error' : ''; ?>">
            <div class="error-message" style="flex-basis: 100%;"><?php echo htmlspecialchars($errors['pasatiempo']); ?></div>
        </div>

        <button type="submit" name="submit">Enviar</button>
    </form>
</body>
</html>