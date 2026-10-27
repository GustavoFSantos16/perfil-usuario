<?php
// Página restrita
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit();
}

// Resgata a cor escolhida na sessão (ou usa branco como padrão caso não tenha sido selecionada)
$corFundo = $_SESSION['cor'] ?? '#ffffff';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background-color: <?php echo $_SESSION['cor']; ?>">

    <main class="profile-card">
        <header class="profile-header">
            <h2>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h2>
        </header>
        
        <p>Esta é uma página restrita, visível apenas para usuários logados.</p>
        
        <footer class="profile-footer">
            <a href="15d_logout.php" class="btn-logout">Sair do sistema</a>
        </footer>
    </main>

</body>

</html>