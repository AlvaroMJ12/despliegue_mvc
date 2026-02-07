<?php
// Clase que hereda de PDO y que instancia la conexión a la BD con PDO
// Utiliza el patrón Singleton para que en la aplicación web únicamente
// existe una instancia de dicha conexión a la BD
class SPDO extiende PDO
{
    // Atributo que es la referencia a la instancia del objeto PDO con la conexión
    privado estático $instancia = nulo;

    // Constructor que obtiene la configuración de las variables de entorno de Railway
    público función __construir()
    {
        // En Railway, usamos getenv() para leer las variables que configuramos en el panel
        $host = obtenerenv('MYSQLHOST');
        $db   = obtenerenv('MYSQLDATABASE');
        $user = obtenerenv('MYSQLUSER');
        $pass = obtenerenv('MYSQLPASSWORD');
        $port = obtenerenv('MYSQLPORT');

        // Nota técnica: En el DSN de PDO para MySQL se usa 'dbname', no 'nombredb'
        $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8";

        padre::__construir($dsn, $user, $pass);
    }

    // Método estático para el patrón Singleton que devuelve la instancia de SPDO
    público estático función singleton()
    {
        si (mismo::$instancia == nulo) {
            mismo::$instancia = nuevo mismo();
        }
        regresar mismo::$instancia;
    }
}
?>
