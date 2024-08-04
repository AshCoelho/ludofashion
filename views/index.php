<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Ludo Fashion</title> 
</head>
<body>
    <?php @require"header.php"; ?>
    <?php include_once 'includes/header.php'; ?> <!-- Incluímos o cabeçalho -->

<a href="create.php" class="btn btn-primary mb-3">Adicionar Usuário</a> <!-- Link para a página de criação de usuário -->

<?php
// Incluímos os arquivos necessários.
include_once 'Database.php';
include_once 'Usuario.php';

// Criamos uma nova instância da classe Database e obtemos a conexão.
$database = new Database();
$db = $database->getConnection();

// Criamos uma nova instância da classe User e passamos a conexão.
$user = new Usuario($db);
// Chamamos o método read() para obter todos os usuários.
$stmt = $user->read();

// Iniciamos a tabela.
echo '<table class="table table-bordered">';
echo '<tr><th>ID</th><th>Nome</th><th>Email</th></tr>';

// Iteramos sobre os resultados e exibimos os usuários.
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row); // Extraímos os dados do array associativo
    echo '<tr>';
    echo '<td>' . $id . '</td>'; // Exibimos o ID
    echo '<td>' . $name . '</td>'; // Exibimos o nome
    echo '<td>' . $email . '</td>'; 
    echo '<td>' . $cpf . '</td>';
    echo '<td>' . $telefone . '</td>';
    echo '<td>' . $nascimento . '</td>';// Exibimos o email
    echo '</tr>';
}

// Fechamos a tabela.
echo '</table>';
?>

<?php include_once 'includes/footer.php'; ?> <!-- Incluímos o rodapé -->

        <?php
    session_start();
    require 'config.php';

    // Verificar login do usuário
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Buscar informações do usuário
        $stmt = $pdo->prepare('SELECT perfil FROM usuarios WHERE id = ?');
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();

        // Redirecionar para a página de dashboard com base no perfil
        if ($user['perfil'] === 'administrador') {
            header('Location: dashboard_admin.php');
        } else {
            header('Location: dashboard_normal.php');
        }
        exit();
    } else {
        // Redirecionar para a página de login
        header('Location: login.php');
        exit();
    }
    ?>


    <main>
        <section id="banner">
                <div id="txt-banner">
                    <p style="font-size: 25px;">Promoção</p>
                    <p style="font-size: 80px;">50%</p>
                    <p style="font-size: 80px;">OFF</p>
                    <p style="font-size: 25px;">Desconto em toda a coleção de verão</p>
                </div>
        </section>

        <section class="conteudo">
            <h1><em>Desconto em toda a coleção de verão </em></h1>

            <div class="card-container">
                <div class="teste">
                    <div class="card">
                        <img src="../img/conj-azul.jpg" alt="" width="100%">
                    </div>
                </div>

                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/conjunto-nude.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/canga.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/conj-laranja.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/conju-azil.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="teste">
                    <div class="card">
                        <img src="../img/calça-pan.jpg" alt="" width="100%">
                    </div>
                </div>

                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/biquine.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/blusa-azul.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/calça-verde.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
                <div class="teste">
                    <div class="card">
                        <div class="card-img">
                            <img src="../img/jaqueta.jpg" alt="" width="100%">
                        </div>
                    </div>
                </div>
             </div>
        </section>
    </main>
    <?php @require"footer.php"; ?>
</body>
</html>