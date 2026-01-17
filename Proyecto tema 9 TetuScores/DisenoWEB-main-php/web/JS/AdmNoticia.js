document.addEventListener("DOMContentLoaded", () => {
    const modalAdd = document.getElementById("modal-add");
    const modalDel = document.getElementById("modal-del");

    const openModal = modal => modal && (modal.style.display = "flex");
    const closeModal = modal => modal && (modal.style.display = "none");

    /* ABRIR MODAL AÑADIR */
    document.getElementById("modal-btn-add")?.addEventListener("click", e => {
        e.preventDefault();
        openModal(modalAdd);
    });

    /* ELIMINAR (desde tabla) */
    document.querySelectorAll("form .modal-btn-del").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();

            const formFila = btn.closest(".form-del-tabla");
            const noticia = formFila.querySelector("input[name='noticiaTabla']").value;

            // Insertar usuario en el modal
            let inputNoticia = modalDel.querySelector("input[name='noticiaTabla']");
            if (!inputNoticia) {
                inputNoticia = document.createElement("input");
                inputNoticia.type = "hidden";
                inputNoticia.name = "noticiaTabla";
                modalDel.querySelector("form").appendChild(inputNoticia);
            }
            inputNoticia.value = noticia;

            openModal(modalDel);
        });
    });

    /* CERRAR MODALES */
    document.querySelectorAll(".close-modal").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            closeModal(btn.closest(".modal"));
        });
    });

    document.querySelectorAll(".modal").forEach(modal => {
        modal.addEventListener("click", e => {
            if (e.target === modal) closeModal(modal);
        });
    });
});
