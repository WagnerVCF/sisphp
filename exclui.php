<?php
    $posicao = $_GET['posicao'];
    $arquivo = fopen("pessoa.txt", "r");
    $arquivo2 = fopen("pessoa2.txt", "a+");
    while(!feof($arquivo))
    {
        $pessoa = explode("|", fgets($arquivo));
    }
    fclose($arquivo);
    $exclui = $posicao + 4;
    for($i = $posicao; $i<$exclui; $i++)
    {
        unset($pessoa[$i]);
    }
    $contato = array();
    foreach($pessoa as $pessoa2)
    {
        $contato[] = $pessoa2;
    }
    unlink("pessoa.txt");
    rename("pessoa2.txt", "pessoa.txt");
    $arquivo = fopen("pessoa.txt", "a+");
    $contador = count($contato);
    $i = 0;
    while($i <= $contador - 1)
    {
        $gravar = $contato[$i]."|";
        fwrite($arquivo, $gravar);
        $i++;
    }
    fclose($arquivo2);
    fclose($arquivo);
    echo "<script>
            alert('Contato excluido com sucesso!');
            window.location.href='dados.php';
         </script>";
?>