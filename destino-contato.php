<?php
require 'header.php'
?>

<?php
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, "mensagem", FILTER_SANITIZE_STRING);
date_default_timezone_set('America/Sao_Paulo');
$data = date('d-m-Y H:i:s');
$d = date('d');
$m = date('m');
$a = date('Y');
$h = date('h');
$mm = date('i');
$s = date('s');


//Variável arquivo armazena o nome e extensão do arquivo.
$arquivo = "contatos/Contato_" . $d . "_" . $m . "_" . $a . "_" . $h . $mm . $s . ".txt";

//Variável $fp armazena a conexão com o arquivo e o tipo de ação.
$fp = fopen($arquivo, "a+");




echo  "
            <h2>Dados enviados</h2>
            <hr>
            
            <p name='nomee'>Nome: $nome</p>
            <p name='email'>Email: $email</p>
            <p name'mensagem'>Mensagem: $mensagem</p>            
            <p>Data: $data</p>
            <button onclick='voltar()'>
                Voltar
            </button>
            <script>
                function voltar(){
                    window.alert('hello world')
                    window.history.back()
                }
            </script>
            ";

//Escreve no arquivo aberto.
fwrite($fp, "Contato via site: 
                \r\nData: $d/$m/$a - $h:$mm:$s
                \r\nNome: $nome  \rEmail: $email \rMensagem: $mensagem
                        ");
//Fecha o arquivo.
fclose($fp);

?>




<?php
require 'footer.php';
?>