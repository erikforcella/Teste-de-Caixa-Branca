function letras(keypress) {
    // Verifica se o caractere é uma letra ou número
    if ((keypress >= 65 && keypress <= 90) || // Letras maiúsculas (A a Z)
        (keypress >= 97 && keypress <= 122)) { // Letras minúsculas (a a z)
        return true; // É um caractere válido
    } else {
        return false; // É um caractere especial ou são Números (0 a 9)
    }
}