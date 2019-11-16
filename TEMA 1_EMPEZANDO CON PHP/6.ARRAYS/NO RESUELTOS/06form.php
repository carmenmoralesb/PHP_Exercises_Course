
<form action='06.php' method='post'>
<p>Introduce números</p>
<input type='hidden' name='contador' value="<?= ++$contador ?>">
<input type='hidden' name='numTexto' value="<?php $numTexto . " " . $numeroIntroducido ?>">
<input type='hidden' name='numArray' value="<?php $numArray?>">
<input type='number' name='numeroIntroducido'>
<input type='submit' value='Continuar'>
</form>