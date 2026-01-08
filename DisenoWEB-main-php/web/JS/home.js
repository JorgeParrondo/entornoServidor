document.addEventListener("DOMContentLoaded", () => {
    var noticias = document.querySelectorAll(".noticias-content p");
    let index = 0;

    function mostrarSiguienteNoticia() {
        noticias.forEach(n => n.classList.remove("active"));
        noticias[index].classList.add("active");
        index = (index + 1) % noticias.length;
    }

    // Muestra la primera noticia al cargar
    mostrarSiguienteNoticia();
    // Cambia cada 3 segundos
    setInterval(mostrarSiguienteNoticia, 3000);
});