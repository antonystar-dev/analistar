<?php
include 'banco/banco.php';
$ip = $_SERVER['REMOTE_ADDR'];
$sistemaoperacional = $_SERVER['HTTP_USER_AGENT'];
$dataacesso=date("d/m/Y");
date_default_timezone_set('America/Sao_Paulo');
$dataacesso=date("d/m/Y");
$datahora = date('d/m/Y \à\s H:i');
 //$datahora="testte";
$click = $_SERVER['REQUEST_URI'];
//$pessoa=$_SESSION["usuario"];
$pessoa ="uso futuro";
$sitePrincipal="http://$_SERVER[HTTP_HOST]";
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO usuario (ip,so,datahora,click,pessoa,dataacesso,siteprincipal) VALUES(?,?,?,?,?,?,?)";
$q = $pdo->prepare($sql);
$q->execute(array($ip,$sistemaoperacional,$datahora,$click,$pessoa,$dataacesso,$sitePrincipal));
Banco::desconectar();
?>