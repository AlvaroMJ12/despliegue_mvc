<?php
// Clase que hereda de PDO y utiliza el patrón Singleton
class SPDO extends PDO
{
    // Atributo para la instancia única
    private static $instancia = null;

   public function __construct()
{
    // Usamos getenv() que es mucho más fiable en entornos cloud
    $host = getenv('MYSQLHOST');
    $db   = getenv('MYSQLDATABASE');
    $user = getenv('MYSQLUSER');
    $pass = getenv('MYSQLPASSWORD');
    $port = getenv('MYSQLPORT') ?: '3306';

    // Si las variables no llegan, lanzamos un error que nos explique qué falta
    if (!$host || !$db || !$user) {
        throw new Exception("Error crítico: Las variables de entorno de Railway no se detectan.");
    }

    $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8";

    // Llamamos al constructor del padre (PDO)
    parent::__construct($dsn, $user, $pass);
}
    // Método Singleton para obtener la instancia
    public static function singleton()
    {
        if (self::$instancia == null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }
}
?>



