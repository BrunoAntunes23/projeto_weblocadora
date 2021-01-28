<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><p>LISTA DE VEICULOS</p>
<a herf="veiculo.php">Novo Veiculo</a>
<a href="sair.php">Sair</a>
<br><br>
<source src="esquemacores.css">
<?php
    require_once"conexao.php";
    $sql="select id,nome,tipo from veiculo order by nome";
    $result=mysqli_query($sql,$conn);
    $linhas=mysqli_num_rows($result);
    if($linhas<1){
        echo"nenhum registro encontrado";
    }else{
        ?>
    <table id="tabela_veiculo">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Abrir</th>
        </tr>
        <?php   while($row=mysqli_fetch_assoc($result)){
            extract($row);?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nome;?></td>
            </tr>
                <?php switch ($tipo){
                    case 1:
                        echo "basico";
                    break;
                        case 2:
                            echo "basico com adicionais";
                        break;
                }    
                ?>
                </td><td><a href="veiculo.php?op=abrir&id=<?php echo $id;?>">abrir</a></td>
                </tr>
                
            
        <?php}?>
</table>
    <?php}?>
</source> 
</body>
</html>