<?php
$euro = (int)($_POST['euro']);
$valorPeseta = 166.386;
$pesetas = $valorPeseta*$euro;

echo "El valor de  $euro euro(s) es $pesetas pesetas";
    ?>