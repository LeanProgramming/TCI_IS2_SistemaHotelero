btn_hab_alta = document.getElementById("btn_hab_alta");
btn_hab_baja = document.getElementById("btn_hab_baja");
btn_agregar_hab = document.querySelector("#btn_agregar_hab");

tabla_hab_altas = document.querySelector("#tabla_hab_altas");
tabla_hab_bajas = document.querySelector("#tabla_hab_bajas");

if(btn_hab_alta != null) {
    btn_hab_alta.addEventListener("click", function () {
        tabla_hab_altas.classList.toggle('d-none');
        tabla_hab_bajas.classList.toggle('d-none');
        btn_agregar_hab.classList.toggle('d-none');
        btn_hab_alta.disabled = true;
        btn_hab_baja.disabled = false;
    });
}

if(btn_hab_baja != null) {
    btn_hab_baja.addEventListener("click", function () {
        tabla_hab_bajas.classList.toggle('d-none');
        tabla_hab_altas.classList.toggle('d-none');
        btn_agregar_hab.classList.toggle('d-none');
        btn_hab_alta.disabled = false;
        btn_hab_baja.disabled = true;
    });    
}

table_header = document.querySelectorAll('.sort-table');
table_header.forEach(header => {
    header.addEventListener('click', function (e) {
        colIndex = e.explicitOriginalTarget.cellIndex;
        table = e.explicitOriginalTarget.parentNode.parentNode.parentNode;
        sortTable(table, colIndex);
    });
});

function sortTable(table, columnIndex) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = table;
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc"; 
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[columnIndex];
            y = rows[i + 1].getElementsByTagName("TD")[columnIndex];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir == "asc") {
                if (Number.parseInt(x.innerHTML.toLowerCase()) > Number.parseInt(y.innerHTML.toLowerCase())) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (Number.parseInt(x.innerHTML.toLowerCase()) < Number.parseInt(y.innerHTML.toLowerCase())) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount ++;
        } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

select_tipoHab = document.querySelector('.select-tipoHab');
select_tipoCama = document.querySelector('.select-tipoCama');
precio_hab = document.querySelector('#hab-precio');
cant_camas = document.querySelector('#cant_camas')



if(select_tipoHab != null) {
    select_tipoHab.addEventListener('change', () => {
        selected = select_tipoHab.selectedOptions[0];
        monto = Number.parseInt(selected.classList.item(0));
        
        if(select_tipoCama.selectedOptions[0].value != 0) {
            selectedTipoCama = select_tipoCama.selectedOptions[0];
            monto += Number.parseInt(selectedTipoCama.classList.item(0))  * cant_camas.value;
        }

        precio_hab.value = monto;
    });
}

if(select_tipoCama != null) {
    select_tipoCama.addEventListener('change', () => {
        selected = select_tipoCama.selectedOptions[0];
        monto = Number.parseInt(selected.classList.item(0)) * cant_camas.value;

        if(select_tipoHab.selectedOptions[0].value != 0) {
            selectedTipoHab = select_tipoHab.selectedOptions[0];
            monto += Number.parseInt(selectedTipoHab.classList.item(0));
        }
  
        precio_hab.value = monto;
    });
}

if(cant_camas != null) {
    cant_camas.addEventListener('change', () => {
        monto = 0;

        if(select_tipoHab.selectedOptions[0].value != 0) {
            selectedTipoHab = select_tipoHab.selectedOptions[0];
            monto += Number.parseInt(selectedTipoHab.classList.item(0));
        }

        if(select_tipoCama.selectedOptions[0].value != 0) {
            selectedTipoCama = select_tipoCama.selectedOptions[0];
            monto += Number.parseInt(selectedTipoCama.classList.item(0)) * cant_camas.value;

            
        }

        precio_hab.value = monto;

    })
}