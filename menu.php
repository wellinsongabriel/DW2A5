<?php
$url = $_SERVER["REQUEST_URI"];
$inicio="";
$sobre="";
$faqs="";
$contato="";

if ($_SERVER["SCRIPT_NAME"]=="/site/inicio.php"){
    echo'<ul class="nav nav-pills">    
    <li class="nav-item"><a href="inicio.php" class="nav-link active" aria-current="page">Início</a></li>
    <li class="nav-item"><a href="sobre.php" class="nav-link">Sobre</a></li>
    <li class="nav-item"><a href="faqs.php" class="nav-link">FAQs</a></li>
    <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>

</ul>';
}
if ($_SERVER["SCRIPT_NAME"]=="/site/sobre.php"){
    echo'<ul class="nav nav-pills">    
    <li class="nav-item"><a href="inicio.php" class="nav-link" aria-current="page">Início</a></li>
    <li class="nav-item"><a href="sobre.php" class="nav-link active">Sobre</a></li>
    <li class="nav-item"><a href="faqs.php" class="nav-link ">FAQs</a></li>
    <li class="nav-item"><a href="contato.php" class="nav-link ">Contato</a></li>

</ul>';
}
if ($_SERVER["SCRIPT_NAME"]=="/site/faqs.php"){
    echo'<ul class="nav nav-pills">    
    <li class="nav-item"><a href="inicio.php" class="nav-link" aria-current="page">Início</a></li>
    <li class="nav-item"><a href="sobre.php" class="nav-link ">Sobre</a></li>
    <li class="nav-item"><a href="faqs.php" class="nav-link active">FAQs</a></li>
    <li class="nav-item"><a href="contato.php" class="nav-link ">Contato</a></li>

</ul>';
}
if ($_SERVER["SCRIPT_NAME"]=="/site/contato.php"){
    echo'<ul class="nav nav-pills">    
    <li class="nav-item"><a href="inicio.php" class="nav-link" aria-current="page">Início</a></li>
    <li class="nav-item"><a href="sobre.php" class="nav-link ">Sobre</a></li>
    <li class="nav-item"><a href="faqs.php" class="nav-link ">FAQs</a></li>
    <li class="nav-item"><a href="contato.php" class="nav-link active">Contato</a></li>

</ul>';
}

?>



