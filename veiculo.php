<?php
    require_once"autenticacao.php";
    require_once"conexao.php";
        $op="novo";
        if(isset($_GET['op'])){
            $op="abrir";
        }elseif(isset($_POST["op"])){
            $op=$_POST["op"];
        }

        if(isset($_POST["excluir"])){
            $id=$_POST["id"];
            $sql="delete from veiculo where id=$id";
            $result=mysqli_query($sql,$conn);
            if($result){
                header("location:veiculolista.php");
                exit;
            }else $mensagem="não foi possivel excluir!";
        }else{
            if($op=="novo"){
                $op="cadastar";
                $nome="";
                $tipo=1;

            }elseif($op=="cadastrar"){
                $nome=trim($_POST["nome"]);
                $tipo=trim($_POST["tipo"]);

                if($nome==""){
                    $mensagem= "o campo deve ser preenchido";

                }else{
                    $sql="insert into veiculo (nome,tipo) values($nome,$tipo)";

                }$result=mysqli_query($sql,$conn);
                    if($result){
                        header("location:veiculolista.php");
                        exit;
            }else {$mensagem='Falha ao cadastrar verifique os dados ou entre em contato com o administrador do servidor de banco de dados';
            }

            }elseif($op=="abrir"){
                $op="atualizar";
                $id=$_GET["id"];
                $sql=" select nome,tipo from veiculo where id=$id";
                $result=mysqli_query($sql,$conn);
                $row=mysqli_fetch_assoc($result);
                extract($row);
            }else if($op=="atualizar"){
                $id=$_POST["id"];
                $nome=trim($_POST["nome"]);
                $tipo=$_POST["tipo"];
                if($nome==""){
                    $mensagem="o campo deve ser preenchido";

                }else{
                    $sql="update veiculos set nome=$nome,tipo=$tipo";
                    $result=mysqli_query($sql,$conn);
                        if($result){
                            header("location:veiculolista.php");
                            exit;
                        }else $mensagem="Não foi possivel atualizar .Verifique os dados ";
                }

            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veiculo-Cadastro</title>
</head>
<body>
    <?php if(isset($mensagem)) echo $mensagem;?>
    <form nane="fveiculo" method="post" action="veiculo.php">
        <label>nome</label><br>
        <select name="tipo" size=1>
            <option value=1><?php if($tipo==1) echo"selected";?>Basico</option>
            <option value=2><?php if($tipo==2) echo"selected";?>Basico com opcionais</option> 
            </select><br>
            <?php if($op !="cadastrar"){
                ?><input type="checkbox" name="excluir" value="excluir">Excluir<br><?php}?>
                <?php if($op=="atualizar"){?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <?php } ?>
             <input type="hiddden" name="op" value="<?php echo $op ?>">
             <input type="submit" value="Enviar">   
            <a href="javascript:void(null);"onclick="location.href='veiculolista.php';">Voltar</a>
    </form>   
</body>
</html>