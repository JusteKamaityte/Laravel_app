<?php
namespace App;

use App\Pixels\Pixel;
use Core\Databases\FileDB;
use Core\Session;
/**
 * Class App
 */
class App{

    /**
     * @var
     */
    public static $db;
    public static $session;
    public static $pixels;
    /**
     * App constructor.
     */
    public function __construct() {
        self::$db = new FileDB(DB_FILE);
        self::$db->load();

        self::$session = new Session();

//        self::$pixels= new Pixel();
    }
    public function __destruct()
    {
        self::$db->save();
    }
}