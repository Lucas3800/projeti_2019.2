<?php
//rotinas para habilitar a exibicao de erros na pagina. Tire se nao quiser.
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
ini_set('display_errors', '1');
 
include "PhpSerial.php"; //import da biblioteca de serial com php
$read = "";
 
$serial = new phpSerial(); //Cria um novo objeto para comunicacao serial
$serial->deviceSet("/dev/ttyACM0"); //associa esse objeto com a serial do Arduino
$serial->confBaudRate(9600); //configura baudrate em 9600
$serial->confParity("none"); //sem paridade
$serial->confCharacterLength(8); //8 bits de mensagem
$serial->confStopBits(1); //1 bit de parada
$serial->confFlowControl("none"); //sem controle de fluxo
$serial->deviceOpen(); //abre o dispositivo serial para comunicacao
 
//Se receber 'a' via GET na Pagina
if(isset($_GET['a'])){
 //sleep(2);
 $serial->sendMessage("a"); //envia o caractere 'a' via Serial pro Arduino
 sleep(1); //delay para o Arduino enviar a resposta.
 $read = $serial->readPort(); //faz a leitura da resposta na variavel $read
 echo $read; //echo para mostrar a resposta recebida do Arduino
}
 
//Se receber 'd' via GET na pagina
if(isset($_GET['d'])){
 //sleep(2);
 $serial->sendMessage("d"); //envia o caractere 'd' via Serial pro Arduino
 sleep(1); //delay para o Arduino enviar a resposta
 $read = $serial->readPort(); //faz a leitura da resposta na variavel $read
 echo $read; //echo para mostrar a resposta recebida do Arduino
}
$serial->deviceClose(); //encerra a conexao serial
 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Sistema de Automação</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Dispositivo 01</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Abrir dispositivo</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Dispositivo selecionado</h4>
        </div>
        <div class="modal-body">
          <p>Pronto para uso.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default">Ligar</button>    
        </div>
      </div>
    </div>
  </div>
</div>
<input type="button" onclick="location.href='/serial.php?a=1' value='Ativo'">

<input type="button" onclick="location.href='/serial.php?d=1' value='Inativo'">

<?
$resultado = explode(",",$read);
echo "<p> Estado do botao: " . $resultado[1] . "</p>";
echo "<p> Estado do LED: " . $resultado[2] . "</p>";
?>
</body>
</html>
