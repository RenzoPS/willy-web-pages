<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit">

    <link rel="shortcut icon" href="./imagenes/logoPaintball.png">
    <title>Reservas de campo de PaintBall</title>
</head>
<body>

    <img src="imagenes/fondo.jpg"  class="" id="fondo">
    <div id="oscuridad" class="hidden" onclick="cerrar('registrarse', 'iniciar_sesion')"></div>
    <div id="parteArriba">
        <header>
            <a href="index.php"><h1 class="zoom">PAINTBALL</h1></a>
            <?php 
                    
                if (isset($_SESSION['nombre_apellido'])) {
                    echo '
                        <div id="nombreSesion">
                            <img src="imagenes/sesionIniciada.png" id="imgUsuario" alt="Logo Usuario" class="zoom" onclick="mostrarCerrarSesion()">
                            <p>' . htmlspecialchars($_SESSION['nombre_apellido'], ENT_QUOTES, 'UTF-8') . '</p>      
                        </div>
                        <a id="boton_ver_reservas" class="hidden" href="ver_reservas.php">Ver Reservas</a>
                        <a id="cerrar_sesion" class="hidden" href="php/cerrar_sesion.php">Cerrar Sesion</a>
                    ';
                } else {
                    echo '
                        <button onclick="ocultar_mostrar(\'registrarse\', \'iniciar_sesion\')" class="zoom" id="botonIniciarSesion">INICIAR SESIÓN</button>
                    ';
                }
            ?>
            
            
            
        </header>
        <nav>
            <ul>
                <li id="_campos_tiro" class="zoom"><a href="#campos_tiro">CAMPOS DE TIRO</a></li>
                <li id="_ubicacion" class="zoom"><a href="#ubicacionGeneral">UBICACIÓN</a></li>
                <li id="_quienes_somos" class="zoom"><a href="#quienes_somos">¿QUIENES SOMOS?</a></li>
                <li id="_preguntas_frecuentes" class="zoom"><a href="#preguntas_frecuentes">PREGUNTAS FRECUENTES</a></li>
            </ul>
        </nav>
    </div>
    <main>
        <div class="formularios">
            <form action="php/registro_usuario.php" method="POST" class="registro_usuario hidden" id="registrarse" >
                <label for="nombre_apellido">Nombre y Apellido:</label>
                <br>
                <input type="text" name="nombre_apellido" placeholder="Ingrese su nombre y apellido" required>
                <br>
                <label for="contrasena">Contraseña:</label>
                <br>
                <input type="password" name="contrasena" placeholder="Ingrese su contraseña" required>
                <br>
                <label for="telefono">Télefono:</label>
                <br>
                <input type="number" name="telefono" placeholder="Ingrese su télefono" required>
                <br>
                <label for="correo_electronico">Email:</label>
                <br>
                <input type="email" name="correo_electronico" placeholder="Ingrese su email" required>
                <br>
                <button class="zoom">Registrarse</button>
            </form>
            <form action="php/inicio_usuario.php" class="inicio_sesion_usuario hidden" id="iniciar_sesion" method="POST">
                <label for="correo_electronico">Email:</label>
                <br>
                <input type="email" name="correo_electronico" placeholder="Ingrese su email" required>
                <br>
                <label for="contrasena">Contraseña:</label>
                <br>
                <input type="password" name="contrasena" placeholder="Ingrese su contraseña" required>
                <br>
                <button type="submit" class="zoom">Ingresar</button>
                <br>
                <button type="button" onclick="ocultar_mostrar('iniciar_sesion','registrarse')" class="zoom">Crear cuenta</button>
            </form>
        </div>
        <div id="_reserva">
        <img src="./imagenes/imagenReserva2.png" alt="imgReserva">
        
        <div id="derecha_reserva">
            <p>¿ESTAS PREPARADO PARA LA VERDADERA BATALLA?</p>
            <?php 
                    
                    if (isset($_SESSION['nombre_apellido'])) {
                        echo '
                            <a href="reserva.php" id="as"><button id="reserva_ya" class="zoom">RESERVA YA</button></a>

                        ';
                    } else {
                        echo '
                            <a onclick="ocultar_mostrar(\'registrarse\', \'iniciar_sesion\')" id="as"><button id="reserva_ya" class="zoom">RESERVA YA</button></a>
                        ';
                    }
                ?>
        </div>
        
        </div>
        
        <div id="campos_tiro" class="sombra_interior">
            <div class="fondo-tiro">
                <div id="campos_tiro_arriba">

                </div>
                <div id="campos">
                    <button class="botonDesplazamiento" onclick="cambiarCampoReverso()" id="botonIzquierda"><</button>
                    <div id="estandar" class="flexeo">
                        <img src="imagenes/estandar.jpg" class="campos-img-borde" alt="">
                        <div>
                            <h3>ESTANDAR</h3>
                            <p>Precio: $10.000/h</p>
                            <p>Capacidad: 10 personas</p>
                            <p>Tamaño: 40mx20m</p>
                        </div>
                    </div>
                    <div id="grande" class="hidden">
                        <img src="imagenes/grande.avif" class="campos-img-borde" alt="">
                        <div>
                            <h3>GRANDE</h3>
                            <p>Precio: $20.000/h</p>
                            <p>Capacidad: 20 personas</p>
                            <p>Tamaño: 40mx30m</p>
                        </div>
                    </div>
                    <div id="grandioso" class="hidden">
                        <img src="imagenes/grandioso.png" class="campos-img-borde" alt="">
                        <div>
                            <h3>GRANDIOSO</h3>
                            <div></div>
                            <p>Precio: $30.000/h</p>
                            <p>Capacidad: 30 personas</p>
                            <p>Tamaño: 50mx40m</p>
                        </div>
                    </div>
                    <button class="botonDesplazamiento" onclick="cambiarCampo()" id="botonDerecha">></button>
                </div>
                <div id="campos_tiro_abajo">

                </div>
            </div>  
        </div> 

        <div id="ubicacionGeneral">
            <div class="fondo-ubi">
                <div id="ubicacion">
                    <div id="infoUbicacion">
                        <h3>UBICACION</h3>
                        <div><a href="https://maps.app.goo.gl/gVdYHQoDNxWtDSiv8" target="_blank"><img src="imagenes/ubicacionIcono.png" alt="Ubiación" class="zoom"></a><p>Av. Martín Comodoro Rivadavia 1420</p></div>
                    </div>
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1954.1760677301788!2d-58.46277835987173!3d-34.540404884018876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb41f92c82e29%3A0x8c5df9315b3eb40d!2sUrban%20Paintball%20Extremo%20(Sede%20Administrativa)!5e0!3m2!1ses!2sar!4v1726351567924!5m2!1ses!2sar" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="" id="imgsUbicacion">
                        <img id="imgUbicacion" src="imagenes/ubicacion1.png" alt="">
                        <div id="puntos">
                            <img src="imagenes/ubicacion1.png" id="imgUbicacion1" alt="" onclick="cambiarImgUbicacion('imagenes/ubicacion1.png')" class="zoom">
                            <img src="imagenes/ubicacion2.png" id="imgUbicacion2" alt=""  onclick="cambiarImgUbicacion('imagenes/ubicacion2.png')" class="oscurecer zoom">
                            <img src="imagenes/ubicacion3.png" id="imgUbicacion3" alt=""  onclick="cambiarImgUbicacion('imagenes/ubicacion3.png')" class="oscurecer zoom">
                        </div> 
                    </div>
                </div>
            </div>

            
        </div>

        <section id="quienes_somos">
            <div class="fondo-qs">
                <div class="transparencia-qs">
                    <h2>¿QUIENES SOMOS?</h2>
                </div>
            <div class="container-qs"> 
            <div>
                <div><img src="imagenes/iconoPresentacion.png" alt="iconoPresentacion" class="zoom"><p>Instruimos a los aficionados del Paintball</p></div>
                <div><img src="imagenes/iconoExperiencia.png" alt="iconoExperiencia" class="zoom"><p>Ofrecemos diversión y adrenalina desde 2010</p></div>
                <div><img src="imagenes/iconoTecnologia.png" alt="iconoTecnologia" class="zoom"><p>Instalaciones y equipamiento de última generación para tu batalla y seguridad.</p></div>
            </div>
            <div>
                <div><img src="imagenes/iconoEquipo.png" alt="iconoEquipo" class="zoom"><p>Equipo instruido para proporcionar experiencias únicas.</p></div>
                <div><img src="imagenes/iconoCompromiso.png" alt="iconoCompromiso" class="zoom"><p>Tu diversión es nuestro objetivo. ¡Disfruten del Paintball con Urban Extremo!</p></div>
            </div>
                
            </div>
            </div>
        </section>
        <section id="preguntas_frecuentes" class="fondo-pf">
            <div>
                <h2>Preguntas frecuentes</h2>
            </div>
            <div class="container-pf">
                <div class="pregunta">
                    <h3 class="zoomP" onclick="mostrarRespuesta('r1', 'r2', 'r3', 'r4', 'r5', 'r6','r7')">¿CUÁLES SON LOS HORARIOS DISPONIBLES PARA RESERVAR LOS CAMPOS?</h3>
                    <p class="hidden" id="r1" >Los campos están disponibles para reserva de lunes a domingo, desde las 9:00 am hasta las 12:00 am. Puedes elegir la duración de tu partida al momento de reservar.</p>
                </div>
                <div class="pregunta">
                    <h3 class="zoomP" onclick="mostrarRespuesta('r2', 'r1', 'r3', 'r4', 'r5', 'r6','r7')">¿CÓMO PUEDO REALIZAR UNA RESERVA?</h3>
                    <p class="hidden" id="r2" >Para hacer una reserva, solo debes registrarte en nuestra página, seleccionar el campo que prefieras, elegir la fecha y la duración de tu partida, y realizar el pago online.</p>
                </div>
                <div class="pregunta">
                    <h3 class="zoomP" onclick="mostrarRespuesta('r3', 'r2', 'r1', 'r4', 'r5', 'r6','r7')">¿QUÉ SUCEDE SI EL CAMPO QUE QUIERO YA ESTÁ RESERVADO?</h3>
                    <p class="hidden" id="r3" >Si el campo que deseas ya está reservado, te sugerimos elegir otro campo disponible o probar con otro horario. Nuestro sistema previene reservas dobles.</p>
                </div>
                <div class="pregunta">
                    <h3 class="zoomP" onclick="mostrarRespuesta('r4', 'r2', 'r3', 'r1', 'r5', 'r6','r7')">¿HAY ALGÚN REQUISITO DE EDAD PARA JUGAR?</h3>
                    <p class="hidden" id="r4" >Sí, la edad mínima para participar es de 12 años, y los menores de 18 años deben estar acompañados por un adulto o tener un permiso firmado.</p>
                </div>
                <div class="pregunta">
                    <h3 class="zoomP" onclick="mostrarRespuesta('r5', 'r2', 'r3', 'r4', 'r1', 'r6','r7')">¿QUÉ INCLUYE LA RESERVA DEL CAMPO?</h3>
                    <p class="hidden" id="r5" >La reserva incluye el acceso al campo por el tiempo que hayas elegido, el equipo de protección necesario y un set inicial de balas de paintball. Puedes comprar balas adicionales si lo deseas dentro de la sucursal.</p>
                </div>
                <div class="pregunta">
                    <h3 class="zoomP" onclick="mostrarRespuesta('r6', 'r2', 'r3', 'r4', 'r5', 'r1','r7')">¿CUÁLES SON LAS MEDIDAS DE SEGURIDAD QUE TIENEN EN EL CAMPO?</h3>
                    <p class="hidden" id="r6" >Contamos con instructores capacitados en todo momento, proporcionamos equipo de protección completo y seguimos las normativas de seguridad para garantizar una experiencia segura para todos los jugadores.</p>
                </div>
                <div class="pregunta">
                    <h3 class="zoomP" onclick="mostrarRespuesta('r7', 'r2', 'r3', 'r4', 'r5', 'r6','r1')">¿PUEDO TRAER MI PROPIO EQUIPO DE PAINTBALL?</h3>
                    <p class="hidden" id="r7" >Sí, puedes traer tu propio equipo, pero debe cumplir con nuestras normas de seguridad. Deberás pasar una revisión de nuestro personal antes de comenzar a jugar.</p>
                </div>
           </div>
        </section>
    </main>
    <footer>
    </footer>
    <script src="script.js"></script>
</body>
</html>