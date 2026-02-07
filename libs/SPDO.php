<?php
// Clase que hereda de PDO y utiliza el patrón Singleton
class SPDO extends PDO
{
    // Atributo para la instancia única
    private static $instancia = null;

    // Constructor que captura las variables de entorno de Railway
    public function __construct()
    {
        $host = getenv('MYSQLHOST');
        $db   = getenv('MYSQLDATABASE');
        $user = getenv('MYSQLUSER');
        $pass = getenv('MYSQLPASSWORD');
        $port = getenv('MYSQLPORT');

        // DSN corregido con 'dbname'
        $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8";

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
