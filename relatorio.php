<?php
//session_start();
//include '../login/validaLogin.php';
//habilitar quando colocar o sistema de login
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>

<body>
    <div class="menu">
        <form action="relatorio.php" method="post">
            <select name="dataacesso">
                <option selected>

                </option>
                <?php
                            include './banco/banco.php';
                            $pdo = BancoAnalistar::conectar();
                            $sql = 'SELECT distinct dataacesso FROM usuario order by dataacesso DESC';

                            foreach ($pdo->query($sql)as $row) {
                                ?>
                <option value="<?php echo $row['dataacesso'] ?>">
                    <?php echo $row['dataacesso'] ?>
                </option>
                <?php
                            }
                            BancoAnalistar::desconectar();
                            ?>

            </select>
            <select name="siteprincipal">
                <option selected>

                </option>
                <?php
                            include_once './banco/banco.php';
                            $pdo = BancoAnalistar::conectar();
                            $sql = 'SELECT DISTINCT siteprincipal FROM usuario';

                            foreach ($pdo->query($sql)as $row) {
                                ?>
                <option value="<?php echo $row['siteprincipal'] ?>">
                    <?php echo $row['siteprincipal'] ?>
                </option>
                <?php
                            }
                            BancoAnalistar::desconectar();
                            ?>

            </select>
            <input type="submit" value="carregar">
        </form>
    </div>
<br><br><br>
    <div class="div-viewport">

        <?php
                    $pdo = BancoAnalistar::conectar();
                    $databusca = $_POST['dataacesso'];
                    $sitebusca = $_POST['siteprincipal'];
                    if ($databusca == NULL and $sitebusca == NULL) {
                        $sql = 'SELECT * FROM usuario order by id DESC limit 10';
                        foreach ($pdo->query($sql)as $row) {
                            ?>

        <div>
            <div class="dadoGerado">
                <table>
                    <thead>
                        <tr>
                            <th class="colunaFixa3" colspan="8">Informações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="colunaFixa">ID</td>
                            <td>
                                <?php echo $row['id'] ?>
                            </td>


                            <td class="colunaFixa">IP:</td>
                            <td colspan="2" class="colunaFixa2">
                                <?php echo $row['ip'] ?>
                            </td>
                            <td class="colunaFixa">Pessoa</td>
                            <td colspan="2" class="colunaFixa2">
                                <?php echo $row['pessoa'] ?>
                            </td>

                        </tr>
                        <tr>
                            <td class="colunaFixa">SO</td>
                            <td colspan="7">
                                <?php echo $row['so'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="colunaFixa">Data</td>
                            <td colspan="4">
                                <?php echo $row['datahora'] ?>
                            </td>
                            <td class="colunaFixa">Acesso</td>
                            <td colspan="2">
                                <?php echo $row['click'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="colunaFixa">Site</td>
                            <td colspan="7">
                                <?php echo $row['siteprincipal'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <?php
                        }
                    } else {
                       
                        if($databusca!=NULL){
                            $sqlBanco='SELECT * FROM usuario where dataacesso like"' . $databusca . '" order by id DESC ';
                        }else{
                            $sqlBanco='SELECT * FROM usuario where siteprincipal like"' . $sitebusca . '" order by id DESC ';
                        }
                        $sql = $sqlBanco;
                        foreach ($pdo->query($sql)as $row) {
                            ?>

        <div class="dadoGerado">
            <table>
                <thead>
                    <tr>
                        <th class="colunaFixa3" colspan="8">Informações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="colunaFixa">ID</td>
                        <td>
                            <?php echo $row['id'] ?>
                        </td>


                        <td class="colunaFixa">IP:</td>
                        <td colspan="2" class="colunaFixa2">
                            <?php echo $row['ip'] ?>
                        </td>
                        <td class="colunaFixa">Pessoa</td>
                        <td colspan="2" class="colunaFixa2">
                            <?php echo $row['pessoa'] ?>
                        </td>

                    </tr>
                    <tr>
                        <td class="colunaFixa">SO</td>
                        <td colspan="7">
                            <?php echo $row['so'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="colunaFixa">Data</td>
                        <td colspan="4">
                            <?php echo $row['datahora'] ?>
                        </td>
                        <td class="colunaFixa">Acesso</td>
                        <td colspan="2">
                            <?php echo $row['click'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="colunaFixa">Site</td>
                        <td colspan="7">
                            <?php echo $row['siteprincipal'] ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>



        <?php
                        }
                    }
                    BancoAnalistar::desconectar();
                    ?>

    </div>


</body>

</html>