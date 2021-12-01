<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form method="POST">
        <label >Cadastrar</label><br>
        <input type="text" name="nome" placeholder="Coloque o nome"><br><br>
        <input type="email" name="email" placeholder="Coloque seu email"><br><br>
        <input type="password" name="senha" placeholder="Crie uma senha "><br><br>
        <input type="password" name="confsenha" placeholder="Confirme sua senha"><br><br>
        <input type="number" name="nivel" placeholder="Indique o nivel" maxlength="2"><br><br>
        <input type="submit" value="Cadastrar">
    </form>

    <?php
    ?>
    
</body>
</html>