function letras_numeros(keypress) {
    // Verifica se o caractere é uma letra ou número
    if ((keypress >= 48 && keypress <= 57) || // Números (0 a 9)
        (keypress >= 65 && keypress <= 90) || // Letras maiúsculas (A a Z)
        (keypress >= 97 && keypress <= 122)) { // Letras minúsculas (a a z)
        return true; // É um caractere válido
    } else {
        return false; // É um caractere especial
    }
}