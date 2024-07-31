<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <title>LudoFashion</title>
</head>
<body>
    <?php @require"header.php"; ?>
    <main>
        <section>
            <div id="menu">
                <p class="menu-icon"><img src="../img/perfil-perfil.png" alt="" width="30px" height="30px"><a href="" id="perfil-menu">Minha Conta</a></p>
                <p  class="menu-icon"><img src="../img/coracao-perfil.png" alt="" width="30px" height="30px"><a href="desejos.php" id="coracaoperf">Listas de Desejos</a></p>
                <p  class="menu-icon"><img src="../img/menu-perfil.png" alt="" width="40px" height="40px" id="categ"><a href="categorias.php" id="catego-perfil">Categorias</a></p>
                <p  class="menu-icon"><img src="../img/caixa-perfil.png" alt="" width="30px" height="30px"><a href="produtos.php" id="prod">Produtos</a></p>
            </div>
            <div id="perfil">
                <div id="titulo-perfil">
                    <h1 class="titulo">Meu perfil</h1>
                    <p class="titulo">Gerenciar e proteger sua conta</p>
                </div>
                
                <div id="perfil-grid">
                    <form action="">
                        <label for="" id="nome-usuario" >Nome do usuário:</label>
                        <input type="text" name="nome-usuario" class="input" placeholder="Fulano123" id="nomeuser"> <br>

                        <label for="" id="nome">Nome:</label>
                        <input type="text" name="nome" placeholder="Fulano da Silva Costa" id="nome"> <br>

                        <label for="">Número de telefone:</label>
                        <input type="tel" name="telefone" placeholder="(98) 9 3576-9232" class="input"> <a href="" class="editar" id="edit">Editar</a> <br>

                        <label for="">Email:</label>
                        <input type="email" name="email" id="email" placeholder="fulanocosta@gmail.com" class="input"><a href="" class="editar" id="editar">Editar</a> <br>

                        <label for=""  class="input">Sexo:</label>
                        <input type="radio" name="sexo"  > Masculino
                        <input type="radio" name="sexo"  > Feminino
                        <input type="radio" name="sexo"  > Outros<br>

                        <label for="">Nome/CPF</label>
                        <input type="text" name="cpf" class="input" placeholder="Fulano Costa - 071.843.281-23"> <a href="" class="editar" id="editar">Editar</a> <br>

                        <label for="" name="nascimento" id="nascimento">Data de nascimento:</label>
                        <input type="text" class="input" placeholder="03/06/2000"> <br>

                        <input type="submit" value="Gravar" id="gravar">
                    </form>
                    
                </div>
            </div>
        </section>
    </main>
    <?php @require"footer.php"; ?>
</body>
</html> 