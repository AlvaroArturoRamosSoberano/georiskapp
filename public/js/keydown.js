< script >
    // Obtener todos los campos de entrada en el formulario
    const inputs = document.querySelectorAll('input, select, textarea');

// Agregar el evento keydown a cada campo de entrada
inputs.forEach(input => {
    input.addEventListener('keydown', event => {
        // Si se presiona Enter
        if (event.keyCode === 13) {
            // Obtener el índice del campo actual
            const currentIndex = Array.from(inputs).indexOf(event.target);
            // Obtener el índice del siguiente campo
            const nextIndex = currentIndex + 1;
            // Si el siguiente campo existe, mover el foco a él
            if (inputs[nextIndex]) {
                inputs[nextIndex].focus();
                event.preventDefault();
            }
        }
    });
}); <
/script>