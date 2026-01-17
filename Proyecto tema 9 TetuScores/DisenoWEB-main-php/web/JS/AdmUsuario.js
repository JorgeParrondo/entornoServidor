document.addEventListener("DOMContentLoaded", () => {
    const modalAdd = document.getElementById("modal-add");
    const modalDel = document.getElementById("modal-del");
    const modalEdit = document.getElementById("modal-edit");

    const openModal = modal => modal && (modal.style.display = "flex");
    const closeModal = modal => modal && (modal.style.display = "none");

    // ABRIR MODAL AÑADIR 
    document.getElementById("modal-btn-add")?.addEventListener("click", e => {
        e.preventDefault();
        openModal(modalAdd);
    });

    // EDITAR (desde la tabla)
    document.querySelectorAll(".form-edit-tabla .modal-btn-edit").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            const formFila = btn.closest("form");
            
            // Extraer TODOS los datos de la fila (usando los nombres de tus inputs hidden)
            const campos = [
                'idTabla', 'usuarioTabla', 'emailTabla', 'passwdTabla', 'partidosTabla', 
                'golesTabla', 'asistenciasTabla', 'faltasTabla', 'edadTabla', 
                'nombreTabla', 'ape1Tabla', 'ape2Tabla'
            ];

            const datos = {};
            campos.forEach(campo => {
                datos[campo] = formFila.querySelector(`input[name='${campo}']`).value;
            });

            // Rellenar los inputs del MODAL
            modalEdit.querySelector("input[name='NewUsuario']").value = datos.usuarioTabla;
            modalEdit.querySelector("input[name='NewEmail']").value = datos.emailTabla;
            modalEdit.querySelector("input[name='NewContraseña']").value = ""; // Por seguridad vacío
            modalEdit.querySelector("input[name='NewPartidos']").value = datos.partidosTabla;
            modalEdit.querySelector("input[name='NewGoles']").value = datos.golesTabla;
            modalEdit.querySelector("input[name='NewAsistencias']").value = datos.asistenciasTabla;
            modalEdit.querySelector("input[name='NewFaltas']").value = datos.faltasTabla;
            modalEdit.querySelector("input[name='NewEdad']").value = datos.edadTabla;
            modalEdit.querySelector("input[name='NewNombre']").value = datos.nombreTabla;
            modalEdit.querySelector("input[name='NewApe1']").value = datos.ape1Tabla;
            modalEdit.querySelector("input[name='NewApe2']").value = datos.ape2Tabla;

            // Asegurarnos de que el ID se envíe
            let inputId = modalEdit.querySelector("input[name='id_usuario_edit']");
            if (!inputId) {
                inputId = document.createElement("input");
                inputId.type = "hidden";
                inputId.name = "id_usuario_edit";
                modalEdit.querySelector("form").appendChild(inputId);
            }
            inputId.value = datos.idTabla;

            openModal(modalEdit);
        });
    });

    // ELIMINAR (desde tabla)
    document.querySelectorAll("form .modal-btn-del").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();

            const formFila = btn.closest("form");
            const usuario = formFila.querySelector("input[name='usuarioTabla']").value;

            // Insertar usuario en el modal
            let inputUsuario = modalDel.querySelector("input[name='usuario']");
            if (!inputUsuario) {
                inputUsuario = document.createElement("input");
                inputUsuario.type = "hidden";
                inputUsuario.name = "usuario";
                modalDel.querySelector("form").appendChild(inputUsuario);
            }
            inputUsuario.value = usuario;

            openModal(modalDel);
        });
    });

    // CERRAR MODALES
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
