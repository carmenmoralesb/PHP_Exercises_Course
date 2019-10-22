<?php
echo "<form action='index.php' method='post'>
<input type='text' name='numeroIntroducido'>
<input type='hidden' name='oportunidades' value=' $oportunidades '>
<input type='submit' value='Continuar'>
</form>
<p>Te quedan $oportunidades oportunidades para adivinar el número.<br/> Introduce un
número del 0 al 100</p>"
?>