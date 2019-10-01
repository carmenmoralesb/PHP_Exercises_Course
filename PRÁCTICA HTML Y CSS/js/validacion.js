function validacion() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById('apellido').value;
    var edad = document.getElementById('edad').value;
    var tlf = document.getElementById('telefono').value;
    var email = document.getElementById('email').value;
    var contrasena = document.getElementById('contrasena').value;
    var repetircontra = document.getElementById('repetir').value;

    // quitar espacios
    var nom = nombre.trim();

    // nombre
    if (nom == "") {
        alert("Introduce al menos una letra");
        document.getElementById("nombre").focus();
        return false;
    }

    // email 
    email = email.trim();

    if (!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(email))) {
        alert("Tienes que introducir una dirección de correo válida");
        document.getElementById("email").focus();
        return false;
    }

    // edad
    if (isNaN(edad)) {
        alert("Tienes que introducir un número entero en su edad.");
        document.getElementById("edad").focus();
        return false;
    }
    else if (edad < 18 || edad >= 100) {
        alert("Debe ser mayor de 18 y menor de 100 años.");
    }

    //Móvil
    tlf = tlf.trim();// expresión regular de móviles de 9 cifras que empiecen por 6
    if (!(/^[6]{1}([0-9]+){8}$/i.test(tlf))) {
        alert("Tienes que introducir un móvil válido");
        document.getElementById("telefono").focus();
        return false;
    }

    if (contrasena!=repetircontra) {
       alert("Las contraseñas no coinciden");
       document.getElementById("repetir").focus();
       return false;
    }

    return true;
}
