
<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['ROL'] === 'ADMIN'){ 
    header("Location: /examenInterciclo/publica/user/login.html"); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<?php
$Codigo = trim($_GET['codigo']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" type="text/css" href="texto.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="cambiar.js"></script>
</head>


<body onload="cambiar('dos')">

    <header>
        <h1 class='elegantshadow'>Floristeria "La Casa de las Flores"</h1>
        </header>
        <nav>
            <ul>
                <li>

                    <a href="#" onclick="cambiar('uno')">
                        <div class="name" data-text="Home">Inicio</div>
                        <div class="icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </div>

                    </a>

                </li>
                <li><a href="#" onclick="cambiar('dos')">
                        <div class="name" data-text="Home">Compras</div>
                        <div class="icon">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        </div>

                    </a>
                </li>
                <li><a href="#" onclick="cambiar('tres')">
                        <div class="name" data-text="Home">QuienesSomos</div>
                        <div class="icon">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="cambiar('cuatro')">
                        <div class="name" data-text="Home">Mision</div>
                        <div class="icon">
                            <i class="fa fa-telegram" aria-hidden="true"></i>
                            <i class="fa fa-telegram" aria-hidden="true"></i>
                        </div>

                    </a>
                </li>
                <li>
                    <a href="#" onclick="cambiar('cinco')">
                        <div class="name" data-text="Home">Vision</div>
                        <div class="icon">
                            <i class="fa fa-envira" aria-hidden="true"></i>
                            <i class="fa fa-envira" aria-hidden="true"></i>
                        </div>

                    </a>
                </li>

                <li>
                    <a href="#" onclick="cambiar('seis')">
                        <div class="name" data-text="Home">Contacto</div>
                        <div class="icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>

                    </a>
                </li>

                <li>
                    <a href="../user/IndexUsuario.php?codigo=<?php echo "$Codigo"; ?>">
                        <div class="name" data-text="Home">Administrar mi cuenta</div>
                        <div class="icon">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </div>

                    </a>

                </li>
            </ul>
        </nav>

    

    <div class="contenedor" style="border: solid 2px red" id='uno'>
        <section>
            <article>
                <h1>Floristeria "Aura".</h1>
                <p id="colorTxt">
                    Pensando en enviar flores? "Aura"y su red de floristerias en Cuenca son su mejor opción. Contamos
                    con la más amplia red de floristerias en Cuenca, Ecuador y ofrecemos una amplia variedad de arreglos
                    florales
                    ideales para regalar en cualquier ocasión. Adicionalmente, cada envio de flores a Cuenca que usted
                    realice a través
                    nuestro será de la más alta calidad y frescura. Calidad,
                    con sus muchos años de experiencia le puede ofrecer. Confíenos su orden de flores a Cuenca y no se
                    arrepentirá!
                    Es la floristeria mas grande del sur del pais, contamos con varios clases de flores, asi tambien
                    realizamos todo tipo de diseño y arreglo floral,
                    con Lo que empezó como una empresa familiar muy pronto se convertiría en un negocio que revolucionó
                    la
                    industria, no sólo en el país, sino en toda la región de América Latina. "Aura", los mejores
                    productos
                    de la tierra,
                    100% naturales, flores cultivadas organicamente.
                    Los ramos de flores a domicilio que se envían pueden llevar una tarjeta de felicitación sin coste
                    añadido en la que se puede escribir una frase de amor, de amistad, de agradecimiento o el
                    sentimiento
                    que se quiera expresar a la persona que recibirá las flores.

                    El precio de ramos de flores se muestra en cada uno de ellos y se envían a casa de quien nos diga el
                    cliente
                    en el mismo día si es lo que se desea o también podemos enviar en 24 horas flores a domicilio
                    baratas,
                    pues
                    hemos habilitado una sección de floristería low cost en la que se confeccionan ramos de flores
                    mixtos y
                    ramos
                    de rosas con flores de primera calidad, seleccionadas dependiendo de cada época del año para poder
                    tener
                    un servicio
                    de envío de ramos de flores a domicilio económico sin que la calidad y la frescura de estas se
                    resienta.
                    Tenemos una
                    selección de ramos con
                    flores especialmente diseñados por nuestros floristas para poder ofrecer a nuestros clientes a unos
                    precios muy económicos.
                </p>
                <img class="imgr" id="imgRenderizable" src="img/1.jpg" alt="">
                <img class="imgr" id="imgRenderizable" src="img/2.jpg" alt="">
                <img class="imgr" id="imgRenderizable" src="img/3.jpg" alt="">
                <img class="imgr" id="imgRenderizable" src="img/4.jpg" alt="">
                <img class="imgr" id="imgRenderizable" src="img/5.jpg" alt="">
                <img class="imgr" id="imgRenderizable" src="img/6.jpg" alt="">
            </article>
        </section>
    </div>
    <div class="contenedor" id='dos'><br><br>
        <?php include '../../config/conexionBD.php'; ?>
        <form id='formCarrito' method="POST">
            <div style="width: 100%; text-align: center">
                <select class="txt" id='local' name='local' required>
                    <option value="0" style="padding-top:7px;text-align:center;width:30px;height:30px;">Seleccione Local </option>
                    <?php
                    $sql = "SELECT * FROM local WHERE loc_eliminado = 0";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=" . $row['loc_id'] . ">" . $row['loc_nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div><br><br>
            <input id="codigo" name="codigo" value="<?php echo $Codigo ?>" hidden>
            <input type="hidden" id="listaCodigos" name="listaCodigos" value="" />
            <input type="hidden" id="listaCantidad" name="listaCantidad" value="" />
            <?php

            $sql = "SELECT * FROM productos WHERE pro_eliminado = 0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <fieldset style="text-align: center; float: left;">
                        <?php echo '<img style="width: 383px; height: 245px;" src="data:image/jpg;base64,' . base64_encode($row['pro_imagen']) . '">'; ?>
                        <h1 style="border: double  black 10px;"> <?php echo $row['pro_nombre']; ?></h1>
                        <b style="border: dotted  black 2px;"> <?php echo "$ " . $row['pro_precio'] ?></b> <br><br>
                        <i style="border: solid  black 2px;"> <?php echo "Unidades Disponibles: " . $row['pro_stock']; ?></i><br><br>
                        <label class="switch">
                            <input type="checkbox" onclick="cantidad(<?php echo $row['pro_stock']; ?>, this, <?php echo $row['pro_codigo']; ?>)">
                            <span class="slider"></span>
                        </label>

                    </fieldset>
                <?php
            }
            ?>
                <input type="button" name="button" id='btnCarrito' onclick="carrito()" value="COMPRAR PRODUCTOS" style="height:54%;width:54%;border-radius: 54px;border: 4px solid #48304D; background-color: #F7949C">
            <?php
        } else {
            echo "<tr>";
            echo " <td colspan='7'> NO EXISTEN PRODUCTOS </td> ";
            echo "</tr>";
        }
        $conn->close();
        ?>
        </form>>
    </div>
    <div class="contenedor" style="border: solid 2px red" id='tres'>
        <section>
            <article>
                <h1>Quienes Somos</h1>
                <p>
                    Somos, una empresa joven y dinámica que entiende la venta y creación de arreglos florales de calidad
                    para el
                    deleite de nuestros clentes.
                    Son muchos ya los visitantes fieles de nuestro sitio y deseamos que sean
                    muchos más en el futuro.
                    Nuestros proyectos inmediatos: ampliación de nuestra sección de arreglos florales dedicadas eventos
                    corporativos o fiestas ; incorporación de tipos de plantas de diferentes especies
                    personalidades de rabiosa actualidad en nuestra sección de reportajes; ampliación de nuestro
                    diccionario base;
                    creación de un foro de documentación y consultas; y muchos más, siempre al servicio de nuestros
                    visitantes.
                    Ofrecemos un Servicio distinto. Un Servicio de Floristería con detalles Persas.Arte Iraní con flores
                    exóticas
                    y de exportación. Modelos exclusivos para cada ocasión. Arreglos exóticos en cristales Persas,
                    troncos,
                    bases
                    de cerámica, yute, bejuco, madera, canastas, cajas y complementados con telas, lazos portatajeteros
                    y
                    tarjetas
                    exclusivas.Decoraciones de Salones, Iglesias, Casas y Locales para todo Evento, con detalles Persas,
                    bajo la supervisión de expertos decoradores Iraníes.
                    Es una floristería online para enviar flores a domicilio que puede ser por muy diversos motivos
                    como para felicitar por un cumpleaños a una amiga o para agradecer un favor que nos han hecho
                    o para dar la enhorabuena por el nacimiento de un bebé enviando un centro de flores a la maternidad
                    del hospital.
                    Si has llegado hasta aquí es por que quieres saber qué motivos te podemos dar para que confíes
                    en nosotros para hacer una compra de flores en esta web
                    Arreglos Florales para:
                    <li type="disc">Matrimonios</li>
                    <li type="disc">Quince años</li>
                    <li type="disc">Bautizos</li>
                    <li type="disc">Funerales</li>
                    <li type="disc">Eventos especiales en Salones de Actos</li>
                    <li type="disc">Nacimientos</li>
                    <li type="disc">Cumpleaños</li>
                    <li type="disc">Y todo compromiso Social</li>
                    Servicio a domicilio las 24 horas.
                    Visite nuestros locales en Guayaquíl, Quito y Cuenca.
                    Sus mejores expresiones de amor, expréselas con Flores de Aura Flor... Un Servicio de corte
                    Internacional,
                    a Precios Nacionales.
                </p>
            </article>
        </section>
    </div>
    <div class="contenedor" style="border: solid 2px red" id='cuatro'>
        <section>
            <article>
                <h1>Mision</h1>
                <p>
                    Somos, una empresa joven y dinámica que entiende la venta y creación de arreglos florales de calidad
                    para el
                    deleite de nuestros clentes.
                    Son muchos ya los visitantes fieles de nuestro sitio y deseamos que sean
                    muchos más en el futuro.
                    Nuestros proyectos inmediatos: ampliación de nuestra sección de arreglos florales dedicadas eventos
                    corporativos o fiestas ; incorporación de tipos de plantas de diferentes especies
                    personalizadas a su gusto, en la actualidad en nuestra sección de reportajes disfrutara de varios modelos; ampliación de nuestro
                    catalogo base;
                    creación de un foro de documentación y consultas; y muchos más, siempre al servicio de nuestros
                    visitantes.
                    Ayudar a nuestros clientes hacer distintivas, duraderas y sustanciales mejoras en su desempeño
                    y construir una gran firma que atrae, desarrolla, excita y retiene personas excepcionales.
                    Ofrecer servicios portuarios de excelencia, agregando valor a la cadena logística de nuestros
                    clientes y apoyando el fortalecimiento del comercio exterior del país.
                    Generando rentabilidad a nuestros accionistas. Contando con un equipo humano competente
                    e infraestructura de alto nivel que nos permita ser competitivos en el sector portuario.
                    Preservando la seguridad y salud de nuestros colaboradores, y actuando de manera
                    responsable con el medio ambiente y la sociedad.
                </p>
                <img class="imgT" id="imgRenderizable" src="img/m1.jpg" alt="">
                <img class="imgT" id="imgRenderizable" src="img/m2.jpg" alt="">
                <img class="imgT" id="imgRenderizable" src="img/m3.jpg" alt="">
                <img class="imgT" id="imgRenderizable" src="img/m4.jpg" alt="">
                <img class="imgT" id="imgRenderizable" src="img/m5.jpg" alt="">
                <img class="imgT" id="imgRenderizable" src="img/m5.jpg" alt="">
            </article>
        </section>
    </div>
    <div class="contenedor" style="border: solid 2px red" id='cinco'>
        <section>
            <article>
                <h1>Vision</h1>
                <p>Ser la empresa líder en Ecuador, reconocida por la calidad, excelencia operativa
                    y continua innovación, impulsada por el talento de nuestra gente, guiada por un
                    modelo de negocio que comparte el riesgo y la rentabilidad.
                    Ofrecer productos de calidad e interés general, muy participativo,
                    y promover lo nuestro, con una excelente atencion, decorado
                    producción y estilo único, estableciendo asi una excelente relacion,
                    con el cliente.
                    Además de ofrecer nuestro producto a tarifas y planes de inversión
                    adaptadas a la realidad económica del país a nivel nacional e internacional
                    llegando a todo el mundo.
                    Inspirar y crear, dos actos que van de la mano.
                    Creacion.

                    <li>Una empresa con marcas líderes y confiables para nuestros consumidores.</li>
                    <li>El proveedor preferido de nuestros clientes.</li>
                    <li>Una empresa innovadora, que mira hacia el futuro.</li>
                    <li>Una empresa financieramente sólida.</li>
                    <li> Un lugar extraordinario para trabajar.</li>
                    <br>
                    Trabajamos para crear un mejor futuro todos los días; Ayudamos a la gente a
                    sentirse bien, verse bien y mejorar su calidad de vida con marcas y servicios
                    que son buenos para ellos y para otros;
                    Inspiramos a la gente para que tome pequeñas acciones en el día
                    a día que pueden hacer una gran diferencia en el mundo.

                </p>
                <!-- <img class="imgT" id="imgRenderizable" src="img/m1.jpg" alt=""> -->
                <div style=”text-align: center”><iframe width="1320" height="615" src="https://www.youtube.com/embed/8KYiKkPWvMs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </article>
        </section>
    </div>
    <div class="contenedor" style="border: solid 2px red" id='seis'>
        <section>
            <form class="for">
                <a href="https://www.facebook.com/ " target="_blank" class="fa fa-facebook-square"></a>
                <a href="https://twitter.com/" target="_blank" class="fa fa-twitter-square"></a>
                <a href="https://plus.google.com/" target="_blank" class="fa fa-google-plus-square"></a>
                <a href="https://ve.linkedin.com/" target="_blank" class="fa fa-linkedin-square"></a>
            </form>
            <h1>Floristeria "La Casa de las Flores"</h1>
            <p>Las flores mas bonitas los encuentras en "Floristeria "La Casa de las Flores"". La flor es siempre una
                rama terminal que consiste en un tallo
                modificado: el eje floral o receptáculo. El eje floral lleva entre uno y cuatro tipos de apéndices
                especializados
                u hojas modificadas, por lo general dispuestos en verticilos en las flores más evolucionadas
                y en espiral en las más primitivas.
                Las flores con sépalos, pétalos, estambres y carpelos se llaman completas, e incompletas las que carecen
                de alguno de estos verticilos.
                Algunas flores pueden presentar 2 o más verticilos de sépalos o de pétalos. Cuando falta el perianto se
                dice que la flor es
                aclamídea o desnuda, como la de los sauces y chopos. Las flores son unisexuales cuando les falta el
                androceo o
                el gineceo; si sólo lleva pistilos, se dice que la flor es pistilada o femenina, y estaminada o
                masculina cuando sólo lleva estambres.
            </p>
            <aside>
                <h1>Informacion de Ventas</h1>
                <p>Informacion sobre distribuidores por pais, si quieres ser un distribuidor envianos un correo
                    electrónico
                    a info@flores.com</p>
            </aside>
            <aside>
                <h4>Solicitudes de Prensa</h4>
                <p>Si eres un miembro de la prensa, puedes encontrar material fotografico, en caso de necesitar otro
                    material por favor envianos un correo electrónico.</p>
            </aside>
        </section>
        <section>
            <aside>
                <h4>Tienda Online</h4>
                <p>Quieres comprar nuestros chocolates Pacari en una tienda, puedes hacerlo en Tiendas
                </p>
            </aside>
            <header>
                <h4 class="tctCentro">Contactanos</h4>
            </header>

        </section>
    </div>
    <div class="contenedor" style="border: solid 2px red" id='siete'>

    </div>

    <script src="//code.jquery.com/jquery-latest.js"></script>
</body>
<footer style="float: left">
    Andres,Fanny,Juan,Ricardo. &#8226; Universidad Politecnica Salesiana &#8226;
    &#169; “Todos los derechos reservados”.
</footer>

</html>