btn_hab_alta = document.getElementById("btn_hab_alta");
btn_hab_baja = document.getElementById("btn_hab_baja");
btn_agregar_hab = document.querySelector("#btn_agregar_hab");

tabla_hab_altas = document.querySelector("#tabla_hab_altas");
tabla_hab_bajas = document.querySelector("#tabla_hab_bajas");

btn_hab_alta.addEventListener("click", function () {
    tabla_hab_altas.classList.toggle('d-none');
    tabla_hab_bajas.classList.toggle('d-none');
    btn_agregar_hab.classList.toggle('d-none');
    btn_hab_alta.disabled = true;
    btn_hab_baja.disabled = false;
});

btn_hab_baja.addEventListener("click", function () {
    tabla_hab_bajas.classList.toggle('d-none');
    tabla_hab_altas.classList.toggle('d-none');
    btn_agregar_hab.classList.toggle('d-none');
    btn_hab_alta.disabled = false;
    btn_hab_baja.disabled = true;
});