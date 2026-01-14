
// --- Funciones de renderizado (se mantienen igual) ---

function tablefromJSON(respuesta) {
    const tobjs = respuesta.data;
    let txt = "<table border='1'>";
    for (let n in tobjs) {
        txt += "<tr>" +
            "<td>" + tobjs[n].cod_cliente + "</td>" +
            "<td>" + tobjs[n].nombre + "</td>" +
            "<td>" + tobjs[n].veces + "</td>" +
            "</tr>";
    }
    txt += "</table>";
    document.getElementById("resu").innerHTML = txt;
}

function VerObjectoJSON(respuesta) {
    const cli = respuesta.data;
    let txt = "<table border='1'>";
    txt += "<tr>" +
        "<td>" + cli.cod_cliente + "</td>" +
        "<td>" + cli.nombre + "</td>" +
        "<td>" + cli.veces + "</td>" +
        "</tr>";
    txt += "</table>";
    document.getElementById("resu").innerHTML = txt;
}

// --- Peticiones REST usando Fetch API (Sustituye a Axios) ---

function getAllRequest() {
    fetch('../srv/server.php/clientes/')
        .then(response => {
            if (!response.ok) throw new Error('Error en la red');
            return response.json();
        })
        .then(data => {
            tablefromJSON({ data: data });
            console.log(data);
        })
        .catch(error => console.log('Hubo un problema:', error));
}

function getByIdRequest() {
    const id = document.getElementById("codigo").value;
    fetch('../srv/server.php/clientes/' + id)
        .then(response => {
            if (!response.ok) throw new Error('Cliente no encontrado');
            return response.json();
        })
        .then(data => {
            VerObjectoJSON({ data: data });
            console.log(data);
        })
        .catch(error => {
            document.getElementById("resu").innerHTML = error.message;
            console.log(error);
        })
}

function postRequest() {
    const id = document.getElementById("codigo").value;
    const datos = {
        nombre: 'Pepillo',
        clave: '34909d',
        veces: '1'
    };

    fetch('../srv/server.php/clientes/' + id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    })
    .then(response => response.json())
    .then(data => {
        tablefromJSON({ data: data });
        console.log(data);
    })
    .catch(error => console.log(error));
}

function deleteRequest() {
    const id = document.getElementById("codigo").value;
    fetch('../srv/server.php/clientes/' + id, {
        method: 'DELETE'
    })
    .then(response => response.json())
    .then(data => {
        tablefromJSON({ data: data });
        console.log(data);
    })
    .catch(error => console.log(error));
}

function putRequest() {
    const id = document.getElementById("codigo").value;
    const incremento = document.getElementById("valor").value;

    fetch('../srv/server.php/clientes/' + id, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ valor: incremento })
    })
    .then(response => response.json())
    .then(data => {
        tablefromJSON({ data: data });
        console.log(data);
    })
    .catch(error => console.log(error));
}