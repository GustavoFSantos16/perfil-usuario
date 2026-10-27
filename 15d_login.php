<?php
session_start(); // Deve ser a primeira linha do código!

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os valores enviados pelo formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $cor = $_POST['cor'];

    // Conecta ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "Senai@118";
    $dbname = "exercicio";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Consulta o usuário no BD
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = $conn->query($sql);

    // Verifica se encontrou o usuário
    if ($result && $result->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['cor'] = $cor; // Salva a cor escolhida na sessão

        header("Location: 15d_perfil.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }

    // Fecha a conexão
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="login-container">
        <header class="header">
            <h2>Login de usuário</h2>
            <p>Insira suas credenciais nos campos abaixo</p>
        </header>

        <?php if (isset($erro)): ?>
            <div class="alert-error"><?php echo htmlspecialchars($erro); ?></div>
        <?php endif; ?>

        <main class="form-div">
            <form method="post" action="">
                <div class="form-group">
                    <label for="usuario">Usuário:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <div class="form-group">
                    <label for="cor">Cor de fundo:</label>
                    <select name="cor" id="cor">
                        <option value="">Selecione uma cor</option>
                        <option value="#90b4e4">Azul</option>
                        <option value="#ff6b6b">Vermelho</option>
                        <option value="#bf83ff">Roxo</option>
                    </select>
                </div>

                <button type="submit" class="btn-primary">Entrar</button>
            </form>
        </main>
    </div>

</body>

</html>