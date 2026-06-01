const txtNombreLibro = document.getElementById("txtNombreLibro");
const txtEditorial = document.getElementById("txtEditorial");
const txtExistencias = document.getElementById("txtExistencias");
const btnGuardar = document.getElementById("btnGuardar");
const tablaLibros = document.getElementById("tablaLibros");
const mensaje = document.getElementById("mensaje");


async function cargarLibros()
{
    try
    {
        const respuesta = await fetch("./Controllers/obtener_libros.php");
        const libros = await respuesta.json();
        tablaLibros.innerHTML = "";
        if (libros.length === 0) 
            {
                mensaje.innerHTML = "No hay libros registrados";
            }else
            {
                libros.forEach(libro =>
                {
                    const fila = document.createElement("tr");
                    fila.innerHTML = 
                        '<td>'+libro.NumLibro+'</td>'+
                        '<td>'+libro.NombreLibro+'</td>'+
                        '<td>'+libro.Editorial+'</td>'+
                        '<td>'+libro.Existencias+'</td>'+
                        '<td><button onclick="eliminarLibro('+libro.NumLibro+')">Eliminar</button></td>';               
                    tablaLibros.appendChild(fila)
                
                });
            }
    }
    catch(error)
    {
        console.log(error);
    }
}

async function eliminarLibro(numLibro)
{
    const resultadoConfirmacion = await Swal.fire({
        title: '¿Eliminar libro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    });

    if(resultadoConfirmacion.isConfirmed)
    {
        try
        {
            const respuesta = await fetch("./Controllers/eliminar_libro.php",
                {
                    method: "POST",
                    headers:{"Content-Type": "application/json"},
                    body: JSON.stringify({NumLibro: numLibro})
                }
            );
            const resultado = await respuesta.json();
            mensaje.innerHTML = resultado.mensaje;
            setTimeout(() =>{mensaje.innerHTML = "";}, 2000);
            cargarLibros();
        }
        catch(error)
        {
            console.log(error);
        }
    }
}


btnGuardar.addEventListener("click", async () =>
{
    const datos = {
        NombreLibro: txtNombreLibro.value,
        Editorial: txtEditorial.value,
        Existencias: txtExistencias.value
    };

    try
    {
        const respuesta = await fetch("./Controllers/guardar_libro.php",
        {
            method: "POST",
            headers:{"Content-Type": "application/json"},
            body: JSON.stringify(datos)
        });

        const resultado = await respuesta.json();
        mensaje.innerHTML = resultado.mensaje;
        setTimeout(() =>{mensaje.innerHTML = "";}, 2000);
        txtNombreLibro.value = "";
        txtEditorial.value = "";
        txtExistencias.value = "";
        cargarLibros();
    }
    catch(error)
    {
        console.log(error);
    }
});


cargarLibros();