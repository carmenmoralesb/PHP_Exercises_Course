<form action="08.php" method="get">
<input type='hidden' name='contador' value="<?= ++$contador ?>">
<input type='hidden' name='contadorCorrectas' value="<?= ++$contadorCorrectas ?>">
<input type='hidden' name='contadorIncorrectas' value="<?= ++$contadorIncorrectas ?>">
<label for="palabra">Palabra en inglés</label> <input type="text" name ="palabra">
<input type='submit' value='Continuar'>
</form>
