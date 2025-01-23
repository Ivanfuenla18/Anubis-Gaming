
document.addEventListener('keyup', e => {
    if (e.target.matches('#buscador')) {
        document.querySelectorAll('.articulo').forEach(carta => {
          tipo = carta.textContent.toLowerCase().includes(e.target.value);
            texto = carta.parentNode;
            div = texto.parentNode;
            console.log(div);
            if (tipo == false) {
                div.classList.add('filtro');
            }else {
                div.classList.remove('filtro');
            }
      })
    }
})
document.addEventListener('keyup', e => {
    if (e.target.matches('#buscador2')) {      
        document.querySelectorAll('.articulo').forEach(carta => {
            tipo = carta.textContent.toLowerCase().includes(e.target.value);
            texto = carta.parentNode;
            div = texto.parentNode;
            console.log(div);
            if (tipo == false) {
                div.classList.add('filtro');
            }else {
                div.classList.remove('filtro');
            }
        }) 
    }
})