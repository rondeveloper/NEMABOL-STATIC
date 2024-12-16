<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function limpiar_enlace($cadena) {

    $String = str_replace(utf8_encode(array('á', 'à', 'â', 'ã', 'ª', 'ä')), "a", $cadena);
    $String = str_replace(utf8_encode(array('Á', 'À', 'Â', 'Ã', 'Ä')), "A", $String);
    $String = str_replace(utf8_encode(array('Í', 'Ì', 'Î', 'Ï')), "I", $String);
    $String = str_replace(utf8_encode(array('í', 'ì', 'î', 'ï')), "i", $String);
    $String = str_replace(utf8_encode(array('é', 'è', 'ê', 'ë')), "e", $String);
    $String = str_replace(utf8_encode(array('É', 'È', 'Ê', 'Ë')), "E", $String);
    $String = str_replace(utf8_encode(array('ó', 'ò', 'ô', 'õ', 'ö', 'º')), "o", $String);
    $String = str_replace(utf8_encode(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö')), "O", $String);
    $String = str_replace(utf8_encode(array('ú', 'ù', 'û', 'ü')), "u", $String);
    $String = str_replace(utf8_encode(array('Ú', 'Ù', 'Û', 'Ü')), "U", $String);
    $String = str_replace(array('[', '^', '´', '`', '¨', '~', ']'), "", $String);
    $String = str_replace("ç", "c", $String);
    $String = str_replace("Ç", "C", $String);
    $String = str_replace("ñ", "n", $String);
    $String = str_replace("Ñ", "N", $String);
    $String = str_replace("Ý", "Y", $String);
    $String = str_replace("ý", "y", $String);

    $String = str_replace("&aacute;", "a", $String);
    $String = str_replace("&Aacute;", "A", $String);
    $String = str_replace("&eacute;", "e", $String);
    $String = str_replace("&Eacute;", "E", $String);
    $String = str_replace("&iacute;", "i", $String);
    $String = str_replace("&Iacute;", "I", $String);
    $String = str_replace("&oacute;", "o", $String);
    $String = str_replace("&Oacute;", "O", $String);
    $String = str_replace("&uacute;", "u", $String);
    $String = str_replace("&Uacute;", "U", $String);

    $String = str_replace('–', '', $String);

    $busc = array('Ã¡', 'Ã©', 'Ã­', 'Ã³', 'Ãº', 'Ã±', '(', ')', '[', ']', ':', '"', "'", '´', '”', '“', '=', '°', '’', '³', '&', ';', 'acute', '\\', '#');
    $remm = array('a', 'e', 'i', 'o', 'u', 'n', '-', '-', '-', '-', '', '', "", '', '', '', '', '', '', '', '', '', '', '');

    $cadena = str_replace($busc, $remm, $String);

    $salida_0 = str_replace("Ãº", "u", str_replace("Ã³", "o", str_replace("Ã±", "n", str_replace("Ã¡", "a", str_replace("Ã©", "e", str_replace("Ã­", "i", strtolower($cadena)))))));
    $salida_0 = str_replace("?", "", str_replace(",", "", strtolower($salida_0)));
    $salida_0 = str_replace("/", "-", str_replace(",", "", strtolower($salida_0)));
    $salida_1 = str_replace("%", "", str_replace(".", "", str_replace(":", "", str_replace("_", "", str_replace(" ", "-", $salida_0)))));
    $salida = str_replace("Ã¡", "a", str_replace("Ã©", "e", str_replace("Ã­", "i", str_replace("Ã³", "o", str_replace("Ãº", "u", $salida_1)))));
    $salida_final = str_replace("--", "-", str_replace("---", "-", str_replace("Ã?", "a", str_replace("Ã‰", "e", str_replace("Ã?", "i", str_replace("Ã“", "o", str_replace("Ãš", "u", $salida)))))));
    return str_replace("\\", "", str_replace("--", "-", str_replace("---", "-", substr($salida_final, 0, 170))));
}

function limpiar_enlace22($cadena) {

    $cadena = str_replace(" ", "-", $cadena);

    $tofind = "Ã€Ã?Ã‚ÃƒÃ„Ã…Ã Ã¡Ã¢Ã£Ã¤Ã¥Ã’Ã“Ã”Ã•Ã–Ã˜Ã²Ã³Ã´ÃµÃ¶Ã¸ÃˆÃ‰ÃŠÃ‹Ã¨Ã©ÃªÃ«Ã‡Ã§ÃŒÃ?ÃŽÃ?Ã¬Ã­Ã®Ã¯Ã™ÃšÃ›ÃœÃ¹ÃºÃ»Ã¼Ã¿Ã‘Ã± ,.";
    $replac = "aeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiou";
    $cadena_sin_acentos = strtr(utf8_decode($cadena), utf8_decode($tofind), utf8_decode($replac));
    $cadena = ereg_replace("[^a-zA-Z0-9_.]", "-", $cadena_sin_acentos);

    $busc = array('Ã¡', 'Ã©', 'Ã­', 'Ã³', 'Ãº', 'Ã±', 'Ã?', 'Ã‰', 'Ã?', 'Ã“', 'Ãš', 'Ã‘', ' ', '?', ',', '/', '%', '.', ':', '@', 'Nuquot', ':', '"', "'", "acute", "quot-", "N", "-ntilde-", '(', ')', '[', ']', ':');
    $remm = array('a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N', '-', '', '', '', '', '', '', '', '-', ':', '', '', "", "-", "-", "n", '-', '-', '-', '-', '');
    $salida_0 = str_replace($busc, $remm, $cadena);
    $salida_0 = str_replace("-y-", "&y&&", $salida_0);
    $salida_0 = str_replace("y-", "-", $salida_0);
    $salida_0 = str_replace("&y&&", "-y-", $salida_0);
    $salida_final = str_replace("--", "-", str_replace("---", "-", $salida_0));

    return $salida_final;
}

function limpiar_enlace2($String) {
    $String = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $String);
    $String = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $String);
    $String = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $String);
    $String = str_replace(array('í', 'ì', 'î', 'ï'), "i", $String);
    $String = str_replace(array('é', 'è', 'ê', 'ë'), "e", $String);
    $String = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $String);
    $String = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $String);
    $String = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $String);
    $String = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $String);
    $String = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $String);
    $String = str_replace(array('[', '^', '´', '`', '¨', '~', ']'), "", $String);
    $String = str_replace("ç", "c", $String);
    $String = str_replace("Ç", "C", $String);
    $String = str_replace("ñ", "n", $String);
    $String = str_replace("Ñ", "N", $String);
    $String = str_replace("Ý", "Y", $String);
    $String = str_replace("ý", "y", $String);

    $String = str_replace("&aacute;", "a", $String);
    $String = str_replace("&Aacute;", "A", $String);
    $String = str_replace("&eacute;", "e", $String);
    $String = str_replace("&Eacute;", "E", $String);
    $String = str_replace("&iacute;", "i", $String);
    $String = str_replace("&Iacute;", "I", $String);
    $String = str_replace("&oacute;", "o", $String);
    $String = str_replace("&Oacute;", "O", $String);
    $String = str_replace("&uacute;", "u", $String);
    $String = str_replace("&Uacute;", "U", $String);

    $busc = array('Ã¡', 'Ã©', 'Ã­', 'Ã³', 'Ãº', 'Ã±', 'Ã?', 'Ã‰', 'Ã?', 'Ã“', 'Ãš', 'Ã‘', ' ', '?', ',', '/', '%', '.', ':', '@', 'Nuquot', ':', '"', "'", "acute", "quot-", "N", "-ntilde-", '(', ')', '[', ']', ':', '=');
    $remm = array('a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N', '-', '', '', '', '', '', '', '', '-', ':', '', '', "", "-", "-", "n", '-', '-', '-', '-', '', '');
    $salida_0 = str_replace($busc, $remm, $String);
    $salida_0 = str_replace("-y-", "&y&&", $salida_0);
    $salida_0 = str_replace("y-", "-", $salida_0);
    $salida_0 = str_replace("&y&&", "-y-", $salida_0);
    $salida_final = str_replace("--", "-", str_replace("---", "-", $salida_0));

    return $salida_final;
}

//post
function isset_post($name) {
    if (isset($_POST[$name])) {
        if ($_POST[$name] !== '') {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function post($name) {
    global $mysqli;
    $return = "";
    if (isset($_POST[$name])) {
        $return = mysqli_real_escape_string($mysqli, trim(str_replace("'",'',strip_tags($_POST[$name]))));
    }

    return $return;
}

function post_array($name) {
    $return = array();
    if (isset($_POST[$name])) {
        $return = $_POST[$name];
    }
    return $return;
}

function post_html($name) {
    global $mysqli;
    $return = "";
    if (isset($_POST[$name])) {
        $return = mysqli_real_escape_string($mysqli, $_POST[$name]);
    }

    return $return;
}

function get($name) {
    global $mysqli;
    $return = "";
    if (isset($_GET[$name])) {
        $return = mysqli_real_escape_string($mysqli,trim(str_replace("'",'',strip_tags($_GET[$name]))));
    }

    return $return;
}

function isset_get($name) {
    if (isset($_GET[$name])) {
        return true;
    } else {
        return false;
    }
}

function post_in($cad) {
    $busc = array(';', '`', 'TRUNCATE', 'DELETE', 'UPDATE', 'SELECT', 'truncate', 'delete', 'update', 'select');
    $remm = array('', '', '', '', '', '', '', '', '', '');
    return str_replace($busc, $remm, $cad);
}

function unAcent($cadena) {
    $String = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $cadena);
    $String = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $String);
    $String = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $String);
    $String = str_replace(array('í', 'ì', 'î', 'ï'), "i", $String);
    $String = str_replace(array('é', 'è', 'ê', 'ë'), "e", $String);
    $String = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $String);
    $String = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $String);
    $String = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $String);
    $String = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $String);
    $String = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $String);
    $String = str_replace(array('[', '^', '´', '`', '¨', '~', ']'), "", $String);
    $String = str_replace("ç", "c", $String);
    $String = str_replace("Ç", "C", $String);
    $String = str_replace("ñ", "n", $String);
    $String = str_replace("Ñ", "N", $String);
    $String = str_replace("Ý", "Y", $String);
    $String = str_replace("ý", "y", $String);

    return $String;
}

function encriptar($string) {
    $key = "s8djeuy";
    $result = "";
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result.=$char;
    }
    return base64_encode($result);
}

function desencriptar($string) {
    $key = "s8djeuy";
    $result = "";
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result.=$char;
    }
    return $result;
}

function query_not($sql) {
    //$ret = mysql_query($sql) or die(mysql_error() . " :->: " . $sql);
    $url_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
        $ip_actual = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_actual = $_SERVER['REMOTE_ADDR'];
    }
    $cabeceras = 'From: Alertas@infosicoes.com' . "\r\n" .
            'Reply-To: ' . "\r\n" .
            'X-Mailer: PHP/' . phpversion() .
            'Return-Path: ' . 'brayan.desteco@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //$ret = mysql_query($sql) or die(mail("brayan.desteco@gmail.com", 'Error SQL ' . date("Y-m-d H:i:s"), "<div>Error SQL en:<br/> $url_actual <hr/><br/>" . mysql_error() . "<hr/><br/>$sql<br/><hr/>IP: $ip_actual</div>", $cabeceras) . "<hr/><br/><b>Se ha producido un error</b> lamentamos la molestia, lo solucionaremos lo antes posible.<br/><hr/>");
    $ret = mysql_query($sql) or die("<div>Error SQL en:<br/> $url_actual <hr/><br/>" . mysql_error() . "<hr/><br/>$sql<br/><hr/>IP: $ip_actual</div>");
    return $ret;
}

function query($sql) {
    global $mysqli;
    //$ret = mysql_query($sql) or die(mysql_error() . " :->: " . $sql);
    $url_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
        $ip_actual = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_actual = $_SERVER['REMOTE_ADDR'];
    }
    $cabeceras = 'From: Alertas@infosicoes.com' . "\r\n" .
            'Reply-To: ' . "\r\n" .
            'X-Mailer: PHP/' . phpversion() .
            'Return-Path: ' . 'brayan.desteco@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //*$ret = mysql_query($sql) or die(mail("brayan.desteco@gmail.com", 'Error SQL ' . date("Y-m-d H:i:s"), "<div>Error SQL en:<br/> $url_actual <hr/><br/>" . mysql_error() . "<hr/><br/>$sql<br/><hr/>IP: $ip_actual</div>", $cabeceras) . "<hr/><br/><b>Se ha producido un error</b> lamentamos la molestia, lo solucionaremos lo antes posible.<br/><hr/>");
    //*$ret = mysql_query($sql) or die("<hr/><br/><b>Se ha producido un error</b> lamentamos la molestia, lo solucionaremos lo antes posible.<br/><hr/><hr/><hr/>"."<div>Error SQL en:<br/> $url_actual <hr/><br/>" . mysql_error() . "<hr/><br/>$sql<br/><hr/>IP: $ip_actual</div>");
    $ret = mysqli_query($mysqli, $sql) or die("<hr/><br/><b>Se ha producido un error</b> lamentamos la molestia, lo solucionaremos lo antes posible.<br/><hr/><hr/><hr/>"."<div>Error SQL en:<br/> $url_actual <hr/><br/>" . mysqli_error($mysqli) . "<hr/><br/>$sql<br/><hr/>IP: $ip_actual</div>");
    return $ret;
}
function fetch($result) {
    $ret = mysqli_fetch_array($result);
    return $ret;
}
function num_rows($result) {
    $ret = mysqli_num_rows($result);
    return $ret;
}
function insert_id() {
    global $mysqli;
    $ret = mysqli_insert_id($mysqli);
    return $ret;
}

//pre2 function encriptar($string) {
//    $key = 'abc';
//    $result = '';
//    for ($i = 0; $i < strlen($string); $i++) {
//        $char = substr($string, $i, 1);
//        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
//        $char = chr(ord($char) + ord($keychar));
//        $result.=$char;
//    }
//    return base64_encode($result);
//}
//
//function desencriptar($string) {
//    $key = 'abc';
//    $result = '';
//    $string = base64_decode($string);
//    for ($i = 0; $i < strlen($string); $i++) {
//        $char = substr($string, $i, 1);
//        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
//        $char = chr(ord($char) - ord($keychar));
//        $result.=$char;
//    }
//    return $result;
//}
// pre 1 function encriptar($string) {
//    $key = '4152';
//    $lsEncVar = mcrypt_ecb(MCRYPT_DES,$key, $string, MCRYPT_ENCRYPT);
//    return base64_encode($lsEncVar);
//}
//
//function desencriptar($string) {
//    $key = '4152';
//    $string = base64_decode($string);
//    $lsEncVar = mcrypt_ecb(MCRYPT_DES, $key, $string, MCRYPT_ENCRYPT);
//    return $lsEncVar;
//}

function url($cad) {
    echo $cad . '.adm';
}

function to_url($cad) {
    return $cad . '.adm';
}

function archivo($nombre) {
    if (is_uploaded_file($_FILES[$nombre]['tmp_name'])) {
        return $_FILES[$nombre]['tmp_name'];
    } else {
        return false;
    }
}

function isset_archivo($nombre) {
    if (is_uploaded_file($_FILES[$nombre]['tmp_name'])) {
        return true;
    } else {
        return false;
    }
}

function archivoName($nombre) {
    if (is_uploaded_file($_FILES[$nombre]['tmp_name'])) {
        return $_FILES[$nombre]['name'];
    } else {
        return false;
    }
}

//redimencionar imagen
function sube_imagen($imagen, $destino) {

    //move_uploaded_file($imagen, $nombre_imagen);
    //Ruta de la imagen original
    $rutaImagenOriginal = $imagen;

//Ancho y alto de la imagen original
    list($ancho, $alto, $tipo_img) = getimagesize($rutaImagenOriginal);

//Creamos una variable imagen a partir de la imagen original
    switch ($tipo_img) {
        case 1:
            $img_original = imagecreatefromgif($rutaImagenOriginal);
            break;
        case 2:
            $img_original = imagecreatefromjpeg($rutaImagenOriginal);
            break;
        case 3:
            $img_original = imagecreatefrompng($rutaImagenOriginal);
            break;
        case 15:
            $img_original = imagecreatefromwbmp($rutaImagenOriginal);
            break;
        default:
            $img_original = imagecreatefromjpeg($rutaImagenOriginal);
            break;
    }

//Se define el maximo ancho y alto que tendra la imagen final
    $max_ancho = 1300;
    $max_alto = 900;

//Se calcula ancho y alto de la imagen final
    $x_ratio = $max_ancho / $ancho;
    $y_ratio = $max_alto / $alto;

//Si el ancho y el alto de la imagen no superan los maximos,
//ancho final y alto final son los que tiene actualmente
    if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {//Si ancho
        $ancho_final = $ancho;
        $alto_final = $alto;
    }
    /*
     * si proporcion horizontal*alto mayor que el alto maximo,
     * alto final es alto por la proporcion horizontal
     * es decir, le quitamos al ancho, la misma proporcion que
     * le quitamos al alto
     *
     */ elseif (($x_ratio * $alto) < $max_alto) {
        $alto_final = ceil($x_ratio * $alto);
        $ancho_final = $max_ancho;
    }
    /*
     * Igual que antes pero a la inversa
     */ else {
        $ancho_final = ceil($y_ratio * $ancho);
        $alto_final = $max_alto;
    }

//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
    $tmp = imagecreatetruecolor($ancho_final, $alto_final);

//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
    imagecopyresampled($tmp, $img_original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);

//Se destruye variable $img_original para liberar memoria
    imagedestroy($img_original);

//Definimos la calidad de la imagen final
    $calidad = 100;
//Se crea la imagen final en el directorio indicado
    imagejpeg($tmp, $destino, $calidad);
}

function form100($cad) {
    $pagina = $cad;
    $pagina = str_replace('<td width="13%" class="Formulario">', '<td width="13%" class="Formulario" style="display:none;">', $pagina);
    $pagina = str_replace('<td width="15%" align="center">', '<td width="15%" align="center" style="display:none;">', $pagina);
    $pagina = str_replace('<td width="73%" class="FormularioTitulo">', '<td width="73%" class="FormularioTitulo" style="display:none;">', $pagina);
    $pagina = str_replace('<td width="12%" align="center">', '<td><h3>INFOSICOES</h3></td><td width="12%" align="center">', $pagina);
    $pagina = str_replace('link', 'meta', $pagina);
    $pagina = str_replace('script', 'section', $pagina);
    $pagina = str_replace('src="..', 'src="https://www.sicoes.gob.bo', $pagina);
    $pagina = str_replace('href="..', 'href="https://www.sicoes.gob.bo', $pagina);
    $pagina = str_replace('../lib/descargar.php', 'https://www.sicoes.gob.bo/lib/descargar.php', $pagina);

    $array_form_1 = explode('<body>', $pagina);
    $formulario_limpio = '';
    for ($i = 1; $i < count($array_form_1); $i++) {
        $array_form_2 = explode("</body>", $array_form_1[$i]);
        $formulario_limpio = $formulario_limpio . $array_form_2[0];
    }

    return $formulario_limpio;
}

function form100E($cad) {
    $arr = explode('</head>', $cad);
    $busc = array('body', '</html>');
    $remm = array('div', '');
    $cont1 = str_replace($busc, $remm, $arr[1]);
    return $cont1;
}

function form180($cad) {
    $busc = array('<head', '</head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">', 'body', 'html');
    $remm = array('<div style="display:none;" ', '</div>', 'div', 'div');
    $cont1 = str_replace($busc, $remm, $cad);
    return $cont1;
}

function form400($cad) {
    $arr = explode('<body', str_replace('onload="borrar()"', '', $cad));
    $arr2 = explode('</body>', $arr[1]);
    $cad = '<div' . $arr2[0] . '</div>';
    $cad = str_replace('<input', '<input style="display:none;"', str_replace('../imagenes/', 'https://www.sicoes.gob.bo/imagenes/', str_replace('../lib/', 'https://www.sicoes.gob.bo/lib/', $cad)));
    return $cad;
}

function form0($cad) {
    $pagina = $cad;
    $pagina = str_replace('<td width="13%" class="Formulario">', '<td width="13%" class="Formulario" style="display:none;">', $pagina);
    $pagina = str_replace('<td width="15%" align="center">', '<td width="15%" align="center" style="display:none;">', $pagina);
    $pagina = str_replace('<td width="73%" class="FormularioTitulo">', '<td width="73%" class="FormularioTitulo" style="display:none;">', $pagina);
    $pagina = str_replace('<td width="12%" align="center">', '<td><h3>INFOSICOES</h3></td><td width="12%" align="center">', $pagina);
    $pagina = str_replace('link', 'meta', $pagina);
    $pagina = str_replace('script', 'section', $pagina);
    $pagina = str_replace('src="..', 'src="https://www.sicoes.gob.bo', $pagina);
    $pagina = str_replace('href="..', 'href="https://www.sicoes.gob.bo', $pagina);
    $pagina = str_replace('../lib/descargar.php', 'https://www.sicoes.gob.bo/lib/descargar.php', $pagina);

    $busc_body = array('<body onload="inicio()">', '<body >');
    $remm_body = '<body>';
    $pagina = str_replace($busc_body, $remm_body, $pagina);

    $array_form_1 = explode('<body>', $pagina);
    $array_form_11 = explode('</body>', $array_form_1[1]);
    $url_content_min = str_replace('type="button"', 'type="hidden"', $array_form_11[0]);
    $url_content_min = str_replace('src="https://www.sicoes.gob.bo/imagenes/logo_mefp_forms.gif"', 'src="" style="width:0px;height:0px;"', str_replace('type="button"', 'type="hidden"', $url_content_min));

    return $url_content_min;
}

function form00($cad) {
    $busc = array(
        '<head',
        '</head>',
        '<script',
        '</script>',
        'body',
        'html',
        'src="../imagenes/',
        'href="../lib/',
        'onClick="window.close();"',
        '{',
        '}',
        '<link',
        '<meta',
        'name="btnImprimir"'
    );
    $remm = array(
        '<div style="display:none;" ',
        '</div>',
        '<div style="display:none;" ',
        '</div>',
        'div',
        'div',
        'src="https://www.sicoes.gob.bo/imagenes/',
        'href="https://www.sicoes.gob.bo/lib/'
        , ' style="display:none;" ',
        '[',
        ']',
        '<br',
        '<br',
        ' style="display:none;" '
    );
    $cont1 = str_replace($busc, $remm, $cad);
    return $cont1;
}

function verificarGet($cad) {
    $busc = array('truncate', 'TRUNCATE', 'delete', 'DELETE', 'update', 'UPDATE', ' select', 'SELECT', ' FROM ', ' from ', '`');
    $remm = 'none';
    return str_replace($busc, $remm, $cad);
}

function my_date_time($cad) {
    if (strlen($cad) > 15) {
        $arr1 = explode(' ', $cad);
        if (date("Y-m-d") == $arr1[0]) {
            $fecha = "Hoy!";
        } else {
            $arr2 = explode('-', $arr1[0]);
            $fecha = $arr2[2] . '/' . $arr2[1] . '/' . $arr2[0];
        }
        $cad = $fecha . ' ' . substr($arr1[1], 0, 5);
    }
    return $cad;
}

function enlaceDescartarLicitacion($id_empresa, $id_licitacion) {
    $enlace = "ast";
    $aux1 = $id_empresa + 3241;
    $aux2 = substr($aux1, 0, 4);
    $enlace .= $aux2 . $id_empresa . '0905';
    $aux3 = $id_licitacion + 4153;
    $aux4 = substr($aux3, 0, 4);
    $enlace .= $aux4 . $id_licitacion;

    return $enlace;
}

function enlaceMonitorearLicitacion($id_empresa, $id_licitacion) {
    $enlace = "ths";
    $aux1 = $id_empresa + 3241;
    $aux2 = substr($aux1, 0, 4);
    $enlace .= $aux2 . $id_empresa . '0905';
    $aux3 = $id_licitacion + 4153;
    $aux4 = substr($aux3, 0, 4);
    $enlace .= $aux4 . $id_licitacion;

    return $enlace;
}

function enlaceDarDeBaja($id_empresa) {
    $enlace = "tws";
    $aux1 = ($id_empresa * 3144) + 125145812246153;
    $aux2 = substr($aux1, 0, 14);
    $aux3 = ($id_empresa * 9514 + 2515421512151);
    $aux4 = substr($aux3, 0, 12);

    $enlace .= $aux2 . $id_empresa . $aux4;

    return $enlace;
}

function enlaceDarDeBaja2($id_empresa) {
    $enlace = "1Th01";
    $aux1 = ($id_empresa * 3144) + 125145812246153;
    $aux2 = substr($aux1, 0, 14);
    $aux3 = ($id_empresa * 9514 + 2515421512151);
    $aux4 = substr($aux3, 0, 12);

    $enlace .= $aux2 . $id_empresa . $aux4;

    return $enlace;
}

//administradores
function isset_administrador() {
    if (isset($_SESSION['admin_id'])) {
        $return = true;
    } else {
        $return = false;
    }
    return $return;
}

function administrador($name) {
    if (isset($_SESSION['admin_' . $name])) {
        $return = $_SESSION['admin_' . $name];
    } else {
        $return = 'Not-Exist';
    }
    return $return;
}

function administradorSet($name, $dat) {
    $_SESSION['admin_' . $name] = $dat;
}

//usuarios
function isset_usuario() {
    if (isset($_SESSION['user_id'])) {
        $return = true;
    } else {
        $return = false;
    }
    return $return;
}

function usuario($name) {
    if (isset($_SESSION['user_' . $name])) {
        $return = $_SESSION['user_' . $name];
    } else {
        $return = 'Not-Exist';
    }
    return $return;
}

function usuarioSet($name, $dat) {
    $_SESSION['user_' . $name] = $dat;
}

function tinyAdmin() {
    ?>
    <script src="contenido/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            language: 'es',
            theme: "modern",
            mode: "textareas",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak table",
                "searchreplace wordcount visualblocks visualchars fullscreen insertdatetime media nonbreaking emoticons textcolor",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            elements: "formulario",
            theme_advanced_buttons1: "mybutton,bold,italic,underline,forecolor,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,cleanup,code",
            theme_advanced_buttons2: "formatselect,fontselect,fontsizeselect,separator,pastetext,pasteword,selectall,image,media,preview",
            theme_advanced_buttons3: "",
            theme_advanced_toolbar_location: "top",
            plugin_preview_width: "700",
            plugin_preview_height: "450",
            paste_auto_cleanup_on_paste: true,
            relative_urls: false,
            toolbar: "insertfile undo redo preview | fontselect | fontsizeselect | forecolor backcolor emoticons | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | media fullpage",
            fontsize_formats: "9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 18pt 20pt 22pt 24pt",
            font_formats: "Andale Mono=andale mono,times;" +
                    "Arial=arial,helvetica,sans-serif;" +
                    "Arial Black=arial black,avant garde;" +
                    "Book Antiqua=book antiqua,palatino;" +
                    "Comic Sans MS=comic sans ms,sans-serif;" +
                    "Courier New=courier new,courier;" +
                    "Georgia=georgia,palatino;" +
                    "Helvetica=helvetica;" +
                    "Impact=impact,chicago;" +
                    "Symbol=symbol;" +
                    "Tahoma=tahoma,arial,helvetica,sans-serif;" +
                    "Terminal=terminal,monaco;" +
                    "Times New Roman=times new roman,times;" +
                    "Trebuchet MS=trebuchet ms,geneva;" +
                    "Verdana=verdana,geneva;" +
                    "Webdings=webdings;" +
                    "Wingdings=wingdings,zapf dingbats",
        });
    </script>
    <?php
}

//editor 
function editorTinyMCE($id_elemento) {
    ?><script src="contenido/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            language: 'es',
            theme: "modern",
            mode: "exact",
            plugins: [
                "advlist autolink link image lists charmap  preview hr anchor pagebreak table",
                "searchreplace visualblocks visualchars fullscreen insertdatetime media nonbreaking emoticons textcolor",
                "save table contextmenu directionality emoticons template paste textcolor imgsurfer"
            ],
            elements: "<?php echo $id_elemento; ?>",
            theme_advanced_buttons1: "mybutton,bold,italic,underline,forecolor,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,cleanup,code",
            theme_advanced_buttons2: "formatselect,fontselect,fontsizeselect,separator,pastetext,pasteword,selectall,image,media,preview",
            theme_advanced_buttons3: "",
            theme_advanced_toolbar_location: "top",
            plugin_preview_width: "700",
            plugin_preview_height: "450",
            paste_auto_cleanup_on_paste: true,
            relative_urls: false,
            toolbar: "insertfile undo redo preview | fontselect | fontsizeselect | forecolor backcolor emoticons | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | media fullpage | imgsurfer",
            fontsize_formats: "9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 18pt 20pt 22pt 24pt",
            font_formats: "Andale Mono=andale mono,times;" +
                    "Arial=arial,helvetica,sans-serif;" +
                    "Arial Black=arial black,avant garde;" +
                    "Book Antiqua=book antiqua,palatino;" +
                    "Comic Sans MS=comic sans ms,sans-serif;" +
                    "Courier New=courier new,courier;" +
                    "Georgia=georgia,palatino;" +
                    "Helvetica=helvetica;" +
                    "Impact=impact,chicago;" +
                    "Symbol=symbol;" +
                    "Tahoma=tahoma,arial,helvetica,sans-serif;" +
                    "Terminal=terminal,monaco;" +
                    "Times New Roman=times new roman,times;" +
                    "Trebuchet MS=trebuchet ms,geneva;" +
                    "Verdana=verdana,geneva;" +
                    "Webdings=webdings;" +
                    "Wingdings=wingdings,zapf dingbats",
        });
    </script><?php
}



//FUNCIONES DE EXTRACCION
function limpp($cadena) {
    $cadena = trim($cadena);
    $cadena_r = strip_tags($cadena);
    //$cadena_r = utf8_decode($cadena);
    $cadena_r = str_replace("'", "\'", $cadena_r);
    $cadena_r = str_replace('"', '\"', $cadena_r);
    return $cadena_r;
}

function limp_to_link($cadena) {
    $busc = array("'", '"', '\\', '\\\\', '/', '//', '`', '”', '“');
    $remm = array('', '', '', '', '', '', '', '', '');
    $cadena_r = str_replace($busc, $remm, $cadena);
    return trim($cadena_r);
}


function encrypt($string) {
    $key = "asdgsdgsdg";
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result.=$char;
    }
    return urlencode(str_replace('+', 'plus', base64_encode($result)));
}

function decrypt($string) {
    $key = "asdgsdgsdg";
    $result = '';
    $string = base64_decode(str_replace('plus', '+', urldecode($string)));
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result.=$char;
    }
    return $result;
}

/* funcion de muestra css */

function enc_css($data) {
    return date("mdH") . '-' . encrypt($data . '/' . date("H")) . '.estilo'; 
}

function enc_class($data) {
    return "css" . md5(date("mdH") . '-' . encrypt($data . '/' . date("H")));
}

/* muestra de paginas html estaticas - HOME */

function static_html_page() {
    if (!isset_get('seccion') && !isset_usuario()) {
        $filedir = 'contenido/htmls/static_html__inicio.txt';
        if (file_exists($filedir)) {
            $fichero_texto = fopen($filedir, "r");
            $contenido_fichero = fread($fichero_texto, filesize($filedir));
            echo $contenido_fichero;
            exit;
        }
    }
}




/* verifica si dominio esta registrado en base a content whois */
function is_domain_registered_by_whoiscontent($content_result, $extension) {
    switch ($extension) {
        case '.bo':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0 || strpos($content_result, 'CONTACTO ADMINISTRATIVO:') > 0) {
                $result = true;
            }
            break;
        case '.com.bo':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0 || strpos($content_result, 'CONTACTO ADMINISTRATIVO:') > 0) {
                $result = true;
            }
            break;
        case '.net.bo':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0 || strpos($content_result, 'CONTACTO ADMINISTRATIVO:') > 0) {
                $result = true;
            }
            break;
        case '.org.bo':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0 || strpos($content_result, 'CONTACTO ADMINISTRATIVO:') > 0) {
                $result = true;
            }
            break;
        case '.gob.bo':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0 || strpos($content_result, 'CONTACTO ADMINISTRATIVO:') > 0) {
                $result = true;
            }
            break;
        case '.edu.bo':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0 || strpos($content_result, 'CONTACTO ADMINISTRATIVO:') > 0) {
                $result = true;
            }
            break;
        case '.tv.bo':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0 || strpos($content_result, 'CONTACTO ADMINISTRATIVO:') > 0) {
                $result = true;
            }
            break;
        case '.com':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0) {
                $result = true;
            }
            break;
        case '.net':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0) {
                $result = true;
            }
            break;
        case '.org':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0) {
                $result = true;
            }
            break;
        case '.info':
            $result = true;
            if (strpos($content_result, 'NOT FOUND') > 0 || strpos($content_result, 'Not a valid domain search pattern') > 0) {
                $result = false;
            }
            break;
        case '.tv':
            $result = true;
            if (strpos($content_result, 'No match for') > 0) {
                $result = false;
            }
            break;
        case '.tk':
            $result = false;
            if (strpos($content_result, '[registered] => yes') > 0) {
                $result = true;
            }
            break;
        default:
            $result = true;
            break;
    }
    return $result;
}
/* validacion entrada de dominio */
function validate_domain($dat){
    $busc = array('https://','http://','www.','ww.','w.');
    $r = str_replace($busc,'',strtolower($dat));
    $ar1 = explode('.',$r);
    $r1 = str_replace('-', '112518452181245',str_replace('_', '7781554581145', $ar1[0]));
    $r2 = preg_replace('/[^a-zA-Z0-9]/','',$r1);
    $r3 = str_replace('112518452181245', '-', str_replace('7781554581145', '_', $r2));
    return $r3;
}

/* ************ */

/* formato contenido correo */
function content_correo($subasunto,$htm){
    $contenido_correo = "<div style='font-family:arial;line-height: 2;color:#333;background:#f3f0f0;'>"
            . "<h2 style='text-align:center;background:#de0707;color:#FFF;border-radius:5px;padding:5px;'>$subasunto</h2>";
    $contenido_correo .= "<center><img style='width: 200px;border: 1px solid #f39191;border-radius: 10%;padding: 10px;margin: 10px 0px;' src='https://www.promo94sanfrancisco.com/contenido/imagenes/images/logo-promo.jpg'/></center>";
    $contenido_correo .= "<div style='background: #FFF;margin: 0px 20px;padding: 15px;margin-bottom: 30px;border-radius: 10px;border: 1px dashed #ffa9a9;'>".$htm."</div>";
    $contenido_correo .= "<h2 style='background:#de0707;color:#FFF;border-radius:5px;padding:5px;font-size: 15pt;'>Promoci&oacute;n 94 San Francisco de la T.O.</h2>"
            . "</div>";
    return $contenido_correo;
}

/* envia email */
function envia_mail($email, $titulo, $cont_correo){
    $cabeceras = 'From:' . 'Promo 94 San Fransisco <info@promo94sanfrancisco.com>' . "\r\n" .
        'Reply-To:' . 'info@promo94sanfrancisco.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion() .
        'Return-Path:' . 'info@promo94sanfrancisco.com' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    mail($email, $titulo, $cont_correo, $cabeceras);
}


/* hashpass */
function hashpass($data){
    return md5(md5($data) . 'of77_02');
}

/* recaptcha */

//RECAPTCHA
class ReCaptchaResponse {

    public $success;
    public $errorCodes;

}

class ReCaptcha {

    private static $_signupUrl = "https://www.google.com/recaptcha/admin";
    private static $_siteVerifyUrl = "https://www.google.com/recaptcha/api/siteverify?";
    private $_secret;
    private static $_version = "php_1.0";

    /**
     * Constructor.
     *
     * @param string $secret shared secret between site and ReCAPTCHA server.
     */
    public function __construct($secret)
    {
        // Constructor's functionality here, if you have any.
    //}
    //function ReCaptcha($secret) {
        if ($secret == null || $secret == "") {
            die("To use reCAPTCHA you must get an API key from <a href='"
                    . self::$_signupUrl . "'>" . self::$_signupUrl . "</a>");
        }
        $this->_secret = $secret;
    }

    /**
     * Encodes the given data into a query string format.
     *
     * @param array $data array of string elements to be encoded.
     *
     * @return string - encoded request.
     */
    private function _encodeQS($data) {
        $req = "";
        foreach ($data as $key => $value) {
            $req .= $key . '=' . urlencode(stripslashes($value)) . '&';
        }
        // Cut the last '&'
        $req = substr($req, 0, strlen($req) - 1);
        return $req;
    }

    /**
     * Submits an HTTP GET to a reCAPTCHA server.
     *
     * @param string $path url path to recaptcha server.
     * @param array  $data array of parameters to be sent.
     *
     * @return array response
     */
    private function _submitHTTPGet($path, $data) {
        $req = $this->_encodeQS($data);
        $response = file_get_contents($path . $req);
        return $response;
    }

    /**
     * Calls the reCAPTCHA siteverify API to verify whether the user passes
     * CAPTCHA test.
     *
     * @param string $remoteIp   IP address of end user.
     * @param string $response   response string from recaptcha verification.
     *
     * @return ReCaptchaResponse
     */
    public function verifyResponse($remoteIp, $response) {
        // Discard empty solution submissions
        if ($response == null || strlen($response) == 0) {
            $recaptchaResponse = new ReCaptchaResponse();
            $recaptchaResponse->success = false;
            $recaptchaResponse->errorCodes = 'missing-input';
            return $recaptchaResponse;
        }
        $getResponse = $this->_submitHttpGet(
                self::$_siteVerifyUrl, array(
            'secret' => $this->_secret,
            'remoteip' => $remoteIp,
            'v' => self::$_version,
            'response' => $response
                )
        );
        $answers = json_decode($getResponse, true);
        $recaptchaResponse = new ReCaptchaResponse();
        if (trim($answers ['success']) == true) {
            $recaptchaResponse->success = true;
        } else {
            $recaptchaResponse->success = false;
            $recaptchaResponse->errorCodes = $answers [error - codes];
        }
        return $recaptchaResponse;
    }

}
/* recaptcha */



/* LOG DE MOVIMIENTOS */
function log_acciones($movimiento, $proceso, $objeto, $id_objeto) {
    if (isset_administrador()) {
        $id_usuario = administrador('id');
        $usuario = administrador('type');
    } else {
        $id_usuario = '0';
        $usuario = 'SIN-SESION';
    }
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '') {
        $ip_registro = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_registro = $_SERVER['REMOTE_ADDR'];
    }
    query("INSERT INTO log_acciones (movimiento,proceso,objeto,id_objeto,usuario,id_usuario,ip,fecha) VALUES ('$movimiento','$proceso','$objeto','$id_objeto','$usuario','$id_usuario','$ip_registro',NOW()) ");
}
/* END - LOG DE MOVIMIENTOS */



function emailValido($dat) {
    $array_correos_excepciones = array();
    if (filter_var(trim($dat), FILTER_VALIDATE_EMAIL) || (in_array(trim($dat), $array_correos_excepciones))) {
        return true;
    } else {
        return false;
    }
}

function SISTsendEmail($correo_a_enviar, $asunto, $contenido_correo) {
    global $___datamail_Host,$___datamail_Username,$___datamail_Password,$___datamail_SMTPSecure,$___datamail_Port,$___datamail_From,$___datamail_NameFrom;
    if (emailValido($correo_a_enviar)) {
        try {
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $___datamail_Host;
            $mail->SMTPAuth = true;
            $mail->Username = $___datamail_Username;
            $mail->Password = $___datamail_Password;
            $mail->SMTPSecure = $___datamail_SMTPSecure;
            $mail->Port = $___datamail_Port;
            /* Recipients */
            $mail->setFrom($___datamail_From, $___datamail_NameFrom);
            $mail->addAddress($correo_a_enviar);
            $mail->AddReplyTo('info@nemabol.com', 'NEMABOL');
            /* Content */
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = $contenido_correo;
            $mail->Send();
        } catch (phpmailerException $e) {
            echo "Message:: " . $e->errorMessage();
        }
    }else{
        echo "<hr>EMAIL INVALIDO [$correo_a_enviar]<hr>";
    }
}

/* des suscribir */
function urlUnsubscribe($correo){
    global $dominio;
    return $dominio.'unsubscribe/' . $correo . '/0001/' . md5($correo . 'dardebaja') . '.html';
}

/* PLANTILLA DE ENVIO DE EMAIL 1 */
function platillaEmailUno($bodyEmail,$tituloEmail,$enviarAEmail,$urlUnsubscribeEmail,$nomUsuarioEmail) {
    global $dominio;

    $busc = array('class="img-pag-static"', 'font-size: 12pt', 'font-size: 13pt', 'font-size: 14pt', 'font-size: 15pt', 'font-size: 16pt');
    $remm = array(' style="width: 100%;" ', 'font-size: 10pt', 'font-size: 10pt', 'font-size: 10pt', 'font-size: 12pt', 'font-size: 12pt');
    $bodycont = str_replace($busc, $remm, $bodyEmail);
    $titulo_mensaje = $tituloEmail;
    $correo_a_enviar = $enviarAEmail;
    $url_unsubscribe = $urlUnsubscribeEmail;

    $cont = '<div bgcolor="#e6e6e6" style="width:100%;min-width:100%;background-color:#e6e6e6;margin:0px;padding:0px" align="center">
<table style="text-align:center;min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>

<tr>
<td align="center">
<div style="background-color:#e6e6e6">
<table style="background-color:#e6e6e6" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#e6e6e6">
<tbody>
<tr>
<td align="center">
<table style="width:612px" width="612" cellspacing="0" cellpadding="0" border="0" align="center">
<tbody>
<tr>
<td style="padding:15px 5px" valign="top" align="center">
<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
<tbody>
<tr>
<td style="background-color:#869198;padding:1px;border-bottom: 1px solid #989898;" valign="top" bgcolor="#869198" align="center">
<table style="background-color:#869198" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#869198" align="center">
<tbody>
<tr>
<td style="background-color:#ffffff;padding:0px" valign="top" bgcolor="#ffffff" align="center">
<div>
<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td width="100%" valign="top" align="">
<div>
<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding-top:0px;padding-bottom:0px;border-bottom: 1px solid #828282;" valign="top" align="center">

<div style="background: #ffffff;border-bottom: 15px solid #d48f18;padding: 20px 180px;">
<img alt="" style="display:block;height:auto!important;max-width:100%!important;" width="599" vspace="0" hspace="0" border="0" src="'.$dominio.'contenido/imagenes/img-prods/logo-nemabol.png">
</div>

</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>

<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td width="100%" valign="top" align="left">
<div>
<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="font-family:Arial,Verdana,Helvetica,sans-serif;font-size:14px;color:#403f42;text-align:left;display:block;word-wrap:break-word;line-height:1.2;padding:10px 20px" valign="top" align="left">
<div></div>
<div>
<div>
<br>
<div><span style="font-size:14px;color:rgb(0,0,0);font-family:Arial,Verdana,Helvetica,sans-serif">Estimad@ '.$nomUsuarioEmail.',</span></div>
<div><br>
</div>
<div>
<span style="font-size:14px;color:rgb(0,0,0);font-family:Arial,Verdana,Helvetica,sans-serif">
Esperamos que usted y sus seres queridos est&eacute;n a salvo y les vaya bien en estos tiempos dif&iacute;ciles.
</span>
</div>

<div>
<br>
</div>

</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>



<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="background-color:rgb(191,191,191)" width="100%" valign="top" bgcolor="BFBFBF" align="">
<div>
<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="font-family:Arial,Verdana,Helvetica,sans-serif;font-size:14px;color:#403f42;text-align:left;display:block;word-wrap:break-word;line-height:1.2;padding:10px 20px" valign="top" align="left">
<div></div>
<div>
<div>
<div style="text-align:center" align="center"><span style="font-size:20px;color:rgb(0,0,0)">' . $titulo_mensaje . '</span></div>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td width="100%" valign="top" align="">
<div>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td valign="top" align="center">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding-bottom:10px;height:1px;line-height:1px" width="100%" valign="top" align="center">
<div><img alt="" style="display:block;height:1px;width:5px" width="5" vspace="0" hspace="0" height="1" border="0" src="https://ci5.googleusercontent.com/proxy/prjVWi9agcvHo6wWwSY0NoWHiaFTUW1GFE88HIUk5LrHN5aeEIX3D6pJtDlEPNI6Dvf_Ou5XHLexQ1ajT_5sVXHMGfcLsqoinYvkNDmXc8HzvBff2Y637Q=s0-d-e1-ft#https://imgssl.constantcontact.com/letters/images/1101116784221/S.gif"></div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td width="100%" valign="top" align="">
<div>
<table style="min-width:100%" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="line-height: 1.4;font-family:Arial,Verdana,Helvetica,sans-serif;font-size:12px;color:#403f42;text-align:left;display:block;word-wrap:break-word;padding:10px 20px" valign="top" align="left">

<div>
' . $bodycont . '
</div>

</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
<tr>
<td></td>
</tr>
</tbody>
</table>
<table style="background:#ffffff;margin-left:auto;margin-right:auto;table-layout:auto!important" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff">
<tbody>
<tr>
<td style="width:100%" width="100%" valign="top" align="center">
<div style="margin-left:auto;margin-right:auto;max-width:100%" align="center">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="padding:16px 0px" valign="top" align="center">
<table style="width:580px" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="color:#5d5d5d;font-family:Verdana,Geneva,sans-serif;font-size:12px;padding:4px 0px" valign="top" align="center">
<span>NEMABOL<span> |
</span></span>
</span></span><span></span><span></span><span>Network Marketing Bolivia</span><span></span>
</td>
</tr>
<tr>
<td style="padding:10px 0px" valign="top" align="center">
<table cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td style="color:#5d5d5d;font-family:Verdana,Geneva,sans-serif;font-size:12px;padding:4px 0px" valign="top" align="center">
<a href="'.$dominio.'" style="color:#5d5d5d" target="_blank">Acerca de nosotros</a> | 
enviado a (' . $correo_a_enviar . ') | 
<a href="' . $url_unsubscribe . '" style="color:#5d5d5d" target="_blank">Dejar de recibir correos</a>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
</div>';
    return $cont;
}


