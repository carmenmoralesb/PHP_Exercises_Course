<?php
echo "<form action='01.php' method='post'>
<p>¿Qué combinación vas a probar?</p>
<input type='text' name='numeroIntroducido'>
<input type='hidden' name='oportunidades' value=' $oportunidades '>
<input type='submit' value='Continuar'>
</form>
<p>Te quedan $oportunidades oportunidades para adivinar la combinación.<br/> Introduce un
número de 4 cifras</p>"
?>