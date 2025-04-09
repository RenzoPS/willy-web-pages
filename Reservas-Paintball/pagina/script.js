

/*
window.onload = () => {
    mercadoPago();
  };
*/
function ocultar_mostrar(id1, id2){
    element1 = document.getElementById(id1);
    element2 = document.getElementById(id2);
    element1.classList.add('hidden');
    element2.classList.remove('hidden');
    
    if (element1.classList.contains('hidden') && element2.classList.contains('hidden')){
        document.getElementById('oscuridad').classList.add('hidden');
    }
    else{
        document.getElementById('oscuridad').classList.remove('hidden');

    }

}


function cerrar(id1,id2){
    document.getElementById(id1).classList.add('hidden');
    document.getElementById(id2).classList.add('hidden');
    document.getElementById('oscuridad').classList.add('hidden');
}

/*
Lógica para que aparezcan y desaparezcan imágenes cuando se toca un boton.
cambiarCampo es para el botón de la derecha y cambiarCampoReserva para el
de la izquierda.
*/
function cambiarCampo(){
    if (!document.getElementById('estandar').classList.contains('hidden')){
        document.getElementById('estandar').classList.add('hidden');
        document.getElementById('grande').classList.remove('hidden');
        document.getElementById('grandioso').classList.add('hidden');
        document.getElementById('grande').classList.add('flexeo');
        document.getElementById('estandar').classList.remove('flexeo');
        document.getElementById('grandioso').classList.remove('flexeo');

    }
    else if (!document.getElementById('grande').classList.contains('hidden')){
        document.getElementById('estandar').classList.add('hidden');
        document.getElementById('grande').classList.add('hidden');
        document.getElementById('grandioso').classList.remove('hidden');
        document.getElementById('grandioso').classList.add('flexeo');
        document.getElementById('estandar').classList.remove('flexeo');
        document.getElementById('grande').classList.remove('flexeo');
    }
    else if (!document.getElementById('grandioso').classList.contains('hidden')){
        document.getElementById('estandar').classList.remove('hidden');
        document.getElementById('grande').classList.add('hidden');
        document.getElementById('grandioso').classList.add('hidden');
        document.getElementById('estandar').classList.add('flexeo');
        document.getElementById('grande').classList.remove('flexeo');
        document.getElementById('grandioso').classList.remove('flexeo');
    }
}
function cambiarCampoReverso(){
    if (!document.getElementById('estandar').classList.contains('hidden')){
        document.getElementById('estandar').classList.add('hidden');
        document.getElementById('grande').classList.add('hidden');
        document.getElementById('grandioso').classList.remove('hidden');
        document.getElementById('grandioso').classList.add('flexeo');
        document.getElementById('estandar').classList.remove('flexeo');
        document.getElementById('grande').classList.remove('flexeo');

    }
    else if (!document.getElementById('grande').classList.contains('hidden')){
        document.getElementById('estandar').classList.remove('hidden');
        document.getElementById('grande').classList.add('hidden');
        document.getElementById('grandioso').classList.add('hidden');
        document.getElementById('estandar').classList.add('flexeo');
        document.getElementById('grande').classList.remove('flexeo');
        document.getElementById('grandioso').classList.remove('flexeo');
    }
    else if (!document.getElementById('grandioso').classList.contains('hidden')){
        document.getElementById('estandar').classList.add('hidden');
        document.getElementById('grande').classList.remove('hidden');
        document.getElementById('grandioso').classList.add('hidden');
        document.getElementById('grande').classList.add('flexeo');
        document.getElementById('estandar').classList.remove('flexeo');
        document.getElementById('grandioso').classList.remove('flexeo');
    }
}

/*
function opcionPago(){
    let i = document.getElementById('camposElegir').value;
    if (i==='Estandar'){     
        document.getElementById('pagoGrande').classList.add('hidden');
        document.getElementById('pagoGrandioso').classList.add('hidden');
        document.getElementById('pagoEstandar').classList.remove('hidden');
    }
    else if (i==='Grande'){
        document.getElementById('pagoGrande').classList.remove('hidden');
        document.getElementById('pagoGrandioso').classList.add('hidden');
        document.getElementById('pagoEstandar').classList.add('hidden');
    }
    else if (i==='Grandioso'){
        document.getElementById('pagoGrande').classList.add('hidden');
        document.getElementById('pagoGrandioso').classList.remove('hidden');
        document.getElementById('pagoEstandar').classList.add('hidden');
    }
}
*/-

function cambiarImgUbicacion(imagen){
    document.getElementById('imgUbicacion').src = imagen;
    if(imagen==='imagenes/ubicacion1.png'){
        document.getElementById('imgUbicacion1').classList.remove('oscurecer');
        document.getElementById('imgUbicacion2').classList.add('oscurecer');
        document.getElementById('imgUbicacion3').classList.add('oscurecer');
    }
    if(imagen==='imagenes/ubicacion2.png'){
        document.getElementById('imgUbicacion1').classList.add('oscurecer');
        document.getElementById('imgUbicacion2').classList.remove('oscurecer');
        document.getElementById('imgUbicacion3').classList.add('oscurecer');
    }
    if(imagen==='imagenes/ubicacion3.png'){
        document.getElementById('imgUbicacion1').classList.add('oscurecer');
        document.getElementById('imgUbicacion2').classList.add('oscurecer');
        document.getElementById('imgUbicacion3').classList.remove('oscurecer');
    }
}
/*
// DETECTAR SI SE HIZO EL PAGO (CHATGPT)
// Selecciona el cuerpo completo del documento (puedes cambiarlo si el div se agrega en otra parte)
const targetNode = document.body;

// Configura el observador
const config = { childList: true, subtree: true };

// Crea el observador de mutaciones
const observer = new MutationObserver((mutationsList, observer) => {
  mutationsList.forEach((mutation) => {
    mutation.addedNodes.forEach((node) => {
      // Verifica si es un elemento HTML (nodo tipo 1)
      if (node.nodeType === 1) {
        // Busca el div con las clases congrats y congrats--approved en los nodos recién agregados
        if (node.classList && node.classList.contains('congrats') && node.classList.contains('congrats--approved')) {
          console.log('¡Se ha detectado el div de MercadoPago!', node);
          // Detén el observador si ya no es necesario seguir observando
          observer.disconnect();
        }
      }
    });
  });
});

// Empieza a observar el documento
observer.observe(targetNode, config);

// También puedes hacer una verificación manual periódica como refuerzo
setInterval(() => {
  const congratsDiv = document.querySelector('div.congrats.congrats--approved');
  if (congratsDiv) {
    console.log('¡Se ha detectado el div de MercadoPago por verificación manual!', congratsDiv);
    observer.disconnect(); // Desconecta el observador si ya se encontró el div
  }
}, 1000); // Verificación manual cada 1 segundo


function habilitarPagos(){
    document.getElementById('pagos').classList.remove('hidden');
}
*/

function mostrarCerrarSesion(){
    if (!document.getElementById('cerrar_sesion').classList.contains('hidden')){
        document.getElementById('cerrar_sesion').classList.add('hidden');
        document.getElementById('boton_ver_reservas').classList.add('hidden');
    }else{
        document.getElementById('cerrar_sesion').classList.remove('hidden');
        document.getElementById('boton_ver_reservas').classList.remove('hidden');

    }
   
}

function mostrarRespuesta(id1, id2, id3, id4,id5,id6,id7){
    if(document.getElementById(id1).classList.contains('hidden')){
        document.getElementById(id1).classList.remove('hidden');
        
        
    }else{
        document.getElementById(id1).classList.add('hidden');
    }
    document.getElementById(id2).classList.add('hidden');
    document.getElementById(id3).classList.add('hidden');
    document.getElementById(id4).classList.add('hidden');
    document.getElementById(id5).classList.add('hidden');
    document.getElementById(id6).classList.add('hidden');
    document.getElementById(id7).classList.add('hidden');
}

/*
function mercadoPago(){
    // Reemplaza 'TU_PUBLIC_KEY' con tu clave pública de MercadoPago
    const mp = new MercadoPago('TEST-615fa219-bc48-4bc6-bc07-1214bb91bc34', {
        locale: 'es-AR' // Cambia la región si es necesario
    });

    // Llamar a la API para crear la preferencia de pago
    fetch('/crear_preferencia', {
        method: 'POST'
    })
    .then(response => response.json())
    .then(preference => {
        // Crea el botón de pago
        mp.checkout({
            preference: {
                id: preference.id // ID de la preferencia creada en el backend
            },
            render: {
                container: '#checkout-button', // ID del contenedor donde se renderizará el botón
                label: 'Pagar', // Etiqueta del botón
            }
        });
    })
    .catch(error => {
        console.error('Error al crear la preferencia:', error);
    });
}
*/
