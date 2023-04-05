const formulario = document.querySelector("#formulario-registro");

formulario.addEventListener("submit", e => {

    e.preventDefault();

    const nombre = document.querySelector("#registroNombre").value;
    const apellidos = document.querySelector("#registroApellido").value;
    const email = document.querySelector("#registroEmail").value;
    const password = document.querySelector("#registroPassword").value;

    const alertaPrevia = document.querySelector(".alert");

    const spinnerPrevio = document.querySelector(".spinner-border");

    if (spinnerPrevio) {
        spinnerPrevio.remove();
    }

    if (alertaPrevia) {
        alertaPrevia.remove();
    }

    const alerta = document.createElement("DIV");

    const spinner = document.createElement("DIV");

    alerta.classList.add("alert");

    if (nombre === "" || apellidos === "" || email === "" || password === "") {
        alerta.textContent = "Todos los campos son obligatorios";
        alerta.classList.add("alert-danger");
    } else {
        alerta.textContent = "Todo correcto, creando la cuenta...";
        alerta.classList.add("alert-success");
        spinner.classList.add("spinner-border", "text-success");
        ocultarModal();
    }

    formulario.appendChild(alerta);
    formulario.appendChild(spinner);

});


function ocultarModal() {
    const modalClose = document.querySelector('#modalRegistro');
    const modal = bootstrap.Modal.getInstance(modalClose);

    setTimeout(() => {
        modal.hide();
    }, 1500)
}
