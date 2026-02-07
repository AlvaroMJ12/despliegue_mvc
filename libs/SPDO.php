<?php
// Clase que hereda de PDO y utiliza el patrón Singleton
class SPDO extends PDO
{
    // Atributo para la instancia única
    private static $instancia = null;

    public function __construct()
{
    // Usamos $_ENV para asegurar que Railway nos pase los datos
    $host = $_ENV['MYSQLHOST'] ?? 'error';
    $db   = $_ENV['MYSQLDATABASE'] ?? 'error';
    $user = $_ENV['MYSQLUSER'] ?? 'error';
    $pass = $_ENV['MYSQLPASSWORD'] ?? 'error';
    $port = $_ENV['MYSQLPORT'] ?? '3306';

    // DSN corregido
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

