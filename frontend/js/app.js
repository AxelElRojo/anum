var imagen = '';

function encodeImgtoBase64(){
    var file = $("#foto").files[0];
    var reader = new FileReader();
    reader.onloadend = () => {
        imagen = reader.result;
        console.log(imagen);
    }
}

//http://localhost/anum/FRONTEND/animal/altaanimal.html
function altaAnimal()
{
    var nombre = $("#nombre").val();
    var edad = $("#edad").val();
    var especie = $("#especie").val();
   
    $.ajax({
        url: "http://localhost/anum/backend/animal/nuevo.php",
        data: {
            nombre: nombre,
            edad: edad,
            idEspecie: especie
        },
        method: "POST",

        success : ( response ) => {
            console.log( response );
        },
        error : ( request, status, error ) => {
            console.log(request.responseText, status, error);
        }
    });

}

//http://localhost/anum/FRONTEND/enfermedad/AltaEnfermedad.html
function altaEnfermedad()
{
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    var idAnimal = $("#idAnimal").val();
    var tratoEspecial = $("#tratoEspecial").val();
    console.log(idAnimal);

    $.ajax({
        url: "http://localhost/anum/backend/enfermedad/nuevo.php",
        data: {
            nombre: nombre,
            tratoEspecial: tratoEspecial,
            descripcion: descripcion,
            idAnimal: idAnimal
        },
        method: "POST",

        success : ( response ) => {
            console.log( response );
        },
        error : ( request, status, error ) => {
            console.log(request.responseText, status, error);
        }
    });

}

//http://localhost/anum/FRONTEND/especie/AltaEspecie.html
function altaEspecie()
{
    var especie = $("#especie").val();
    $.ajax({
        url: "http://localhost/anum/backend/especie/nuevo.php",
        data: {
            nombre: especie
        },
        method: "POST",

        success : ( response ) => {
            console.log( response );
        },
        error : ( request, status, error ) => {
            console.log(request.responseText, status, error);
        }
    });
}


//http://localhost/anum/frontend/Altatratamiento/AltaTratamiento.html
function altaTratamiento()
{
    var duracion = $("#duracion").val();
    var frecuencia = $("#frecuencia").val();
    var descripcion = $("#descripcion").val();
    var idAnimal = $("#idAnimal").val();

    $.ajax({
        url: "http://localhost/anum/backend/tratamiento/nuevo.php",
        data: {
            duracion: duracion,
            frecuencia: frecuencia,
            descripcion: descripcion,
            idAnimal: idAnimal
        },
        method: "POST",

        success : ( response ) => {
            if(response.exito)
            {
                console.log( response );
                alert("listo");
                window.reload();
            }
            else
            {
                alert("nel pastel");
            }

        },
        error : ( request, status, error ) => {
            console.log(request.responseText, status, error);
        }
    });

}

//http://localhost/anum/frontend/Altavacunacion/Altavacunacion.html
function altaVacunacion()
{
    var tipo = $("#tipo").val();
    var marca = $("#marca").val();
    var fecha = $("#fecha").val();
    var idAnimal = $("#idAnimal").val();

    $.ajax({
        url: "http://localhost/anum/backend/vacunacion/nuevo.php",
        data: {
            tipo: tipo,
            marca: marca,
            fecha: fecha,
            idAnimal: idAnimal
        },
        method: "POST",

        success : ( response ) => {
            console.log( response );
        },
        error : ( request, status, error ) => {
            console.log(request.responseText, status, error);
        }
    });
}



