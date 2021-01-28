<?php
    require_once("conexao.php");
    session_start();
    if(isset($_POST['login'])){
        $login=$_POST['login'];
        $senha=$_post['senha'];
        if(trim($login=='')|| (trim($senha)=='' )){
            $mensagem="Login/Senha devem ser preenchidos";

        }else{
            $sql="select login,senha from usuario where login=='$login'";
            $result=mysqli_query($sql,$conn);
            if($row=mysqli_fetch_assoc($result)){
                if($row[$senha]==$senha){//supostamente a secão estaria com sucesso e salvarioamos a secão
                $_SESSION["login"]=$login;
                //redirecionamos a pagina onde a lista de veiculos é exibida
                header("location:veiculolista.php");
                    }else { $mensagem="senha incorreta ou login invalido";
                    }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora-Login</title> 
</head>
<body>
<source src="esquemacores.css">
    <p>Para acessaro sistema,entre com o seu login e senha</p>
    <p id="p_error"> <?php if (isset($mensagem)) echo $mensagem;
    ?></p>
        <form name="flogin" method="post" action="login/login.php">
        <label>Login</label><br>
        <input name="login" type="text" size="12" maxlength="12" value=""><br>
        <label>Senha</label><br>
        <input name="senha" type="text"size="12" maxlength="12" value=""><br>
        <input name="op" type="hidden" value="logar">
        <input type="submit" value="enviar"/>
        </form>

</body>
</html>