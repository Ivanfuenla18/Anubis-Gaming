
document.addEventListener('keyup', e => {
if (e.target.matches('#buscador2')) {
// Obtener el valor del buscador
const busqueda = e.target.value;

// Guardar el valor en el almacenamiento local
localStorage.setItem('busqueda', busqueda);

// Redirigir a la página deseada
window.location.href = "http://localhost:3000/catalogo.php";
}
});

