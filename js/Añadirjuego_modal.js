document.getElementById("vaciar-carrito").addEventListener("click", function () {
    localStorage.removeItem('cart');

    let cartTable = document.getElementById("lista-carrito");
    let rows = cartTable.getElementsByTagName("tr");

    while (rows.length > 1) {
        cartTable.deleteRow(1);
    }

});



document.getElementById('añadir_juego').addEventListener('click', function () {
    var gameName = this.dataset.gameName;
    var gamePrice = this.dataset.gamePrice;
    var gameImage = this.dataset.gameImage;

    var game = {
        'name': gameName,
        'price': gamePrice,
        'image': gameImage
    }

    addToCart(game);





    /*
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cesta.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('&name=' + gameName + '&price=' + gamePrice + '&image=' + gameImage);
    
        xhr.onload = function() {
            if (this.status == 200) {
                console.log(this.responseText);
                const respuestaServidor = JSON.parse(xhr.responseText);
                addToCart(respuestaServidor);
            }
        }*/
});

function imprimir(game) {
    let cartTable = document.getElementById("lista-carrito");
    let rows = cartTable.getElementsByTagName("tr");

    while (rows.length > 1) {
        cartTable.deleteRow(1);
    }
    game.forEach(element => {
        // Obtenemos la tabla del carrito del DOM.
        let cartTable = document.getElementById("lista-carrito");

        // Creamos una nueva fila para la tabla.
        let row = document.createElement("tr");

        // Creamos las celdas que van en la fila.
        let imgCell = document.createElement("td");
        let nameCell = document.createElement("td");
        let priceCell = document.createElement("td");

        // Asignamos los valores a las celdas.
        imgCell.innerHTML = `<img src="${element.image}" alt="${element.name}" style="width:50px;height:50px;">`;
        nameCell.textContent = element.name;
        priceCell.textContent = `${element.price}€`;

        // Agregamos las celdas a la fila.
        row.appendChild(imgCell);
        row.appendChild(nameCell);
        row.appendChild(priceCell);

        // Agregamos la fila a la tabla del carrito.
        cartTable.appendChild(row);
    });




}




function addToCart(game) {
    let cart = [];
    if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart')); // convierte la cadena de texto JSON almacenada en un array de objetos
    }

    cart.push(game); // añade el nuevo juego al array
    localStorage.setItem('cart', JSON.stringify(cart)); // convierte el array de objetos en una cadena de texto JSON y la almacena
    imprimir(cart);
}





