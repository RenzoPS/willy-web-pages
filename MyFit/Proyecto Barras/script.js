function ocultarMostrar(id1){
    element1 = document.getElementById(id1);
    
    if (element1.classList.contains('hidden')){
        document.getElementById(id1).classList.remove('hidden');
    }
    else{
        document.getElementById(id1).classList.add('hidden');
    }
    
    if (element1 === 'ingresoMateriales'){
        element1.classList.add('flexeo')
    }
}
function cerrar(id1){
    document.getElementById(id1).classList.add('hidden');
    document.getElementById('oscuridad').classList.add('hidden');
}

function cambiarResto(){
    let elemento1 = document.getElementById('tipoBarra').value;
    let elemento2 = parseFloat(document.getElementById('cantidadFabricar').value);

    if (elemento2 != NaN){ 
        let resta;
        if(!elemento2){
            elemento2 = 0;
        }
        if(elemento1 === 'Barra chica'){
            resta = 1 * elemento2;
        }
        else if(elemento1 === 'Barra mediana'){
            resta = 1.5 * elemento2;

        }
        else if(elemento1 === 'Barra grande'){
            resta = 2 * elemento2;
        }
        document.getElementById('resta').innerText = '-' + resta;
    }
}