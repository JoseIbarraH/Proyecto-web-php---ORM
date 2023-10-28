function habilitarBotones() {

    const botonEditar = document.getElementById("editar");
    const botonEliminar = document.getElementById("eliminar");
    const campoNombre = document.getElementById("nombre");
    const campoClave = document.getElementById("pass");
    const campoEmail = document.getElementById("correo");

    campoNombre.addEventListener("input", () => {
        if (campoNombre.value === "") {
            botonEditar.disabled = true;
            botonEliminar.disabled = true;
        } else {
            botonEditar.disable = false;
        }
    });

    if (campoNombre.value === "") {
        botonEditar.disabled = true;
        botonEliminar.disabled = true;
        campoNombre.setAttribute("readonly", true);
        campoClave.setAttribute("readonly", true);
        campoEmail.setAttribute("readonly", true);
    }
    else {
        botonEditar.disabled = false;
        botonEliminar.disabled = false;
        campoNombre.removeAttribute("readonly");
        campoClave.removeAttribute("readonly");
        campoEmail.removeAttribute("readonly");
    }
}

function habilitarBotonesGastos() {
    const botonEditar = document.getElementById("editar");
    const botonEliminar = document.getElementById("eliminar");
    const campoValor = document.getElementById("valor");
    const campoFecha = document.getElementById("fecha");
    const campoDetalles = document.getElementById("detalles");

    // Manejar el evento "input" en campoValor
    campoValor.addEventListener("input", () => {
        if (campoValor.value === "") {
            botonEditar.disabled = true;
            botonEliminar.disabled = true;
        } else {
            botonEditar.disabled = false;
        }
    });

    // Verificar el valor inicial de campoValor al cargar la página
    if (campoValor.value === "") {
        botonEditar.disabled = true;
        botonEliminar.disabled = true;
        campoValor.setAttribute("readonly", true);
        campoFecha.setAttribute("readonly", true);
        campoDetalles.setAttribute("readonly", true);
    } else {
        botonEditar.disabled = false;
        botonEliminar.disabled = false;
        campoValor.removeAttribute("readonly");
        campoFecha.removeAttribute("readonly");
        campoDetalles.removeAttribute("readonly");
    }
}

function confirmarOperacion() {
    const botonEditar = document.getElementById("editar");
    const botonEliminar = document.getElementById("eliminar");

    botonEditar.addEventListener("click", (event) => {
        mensaje = "¿Desea Modificar los datos de este lugar?";
        return confirmar(mensaje, event);
    });

    botonEliminar.addEventListener("click", (event) => {
        mensaje = "¿Desea Eliminar los datos de este lugar?";
        confirmar(mensaje, event);
    });
}

function confirmar(mensaje, evento) {
    const respuesta = confirm(mensaje);

    if (!respuesta) {
        evento.preventDefault();
    }
}

