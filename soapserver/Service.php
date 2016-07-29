<?php
require(__DIR__ . '/../vendor/autoload.php');

/**
 * Created by PhpStorm.
 * User: qinchong
 * Date: 2016/7/28
 * Time: 11:42
 */
class Service extends ActiveRecord
{
    public $table = 'user';
    public $primaryKey = 'id';
    public static $dbs = null;

    /**
     *
     */
    public static function connect()
    {
        $dbms = 'mysql';
        $host = '10.1.20.84';
        //数据库主机名
        $dbName = 'soap';
        //使用的数据库
        $user = 'bruce';
        //数据库连接用户名
        $pass = '123456';
        //对应的密码
        $dsn = "$dbms:host=$host; dbname=$dbName";
        try {
            if (!self::$dbs) {
                self::$dbs = new PDO($dsn, $user, $pass);
            }
            return self::$dbs;
        } catch (PDOException $e) {
            die('error' . $e->getMessage());
        }
    }

    public function updatepassword($id, $newpass)
    {
        ActiveRecord::$db = self::connect();
        $user = $this->find($id);
        $user->password = md5($newpass);
        return $user->update() ? 0 : 1;
    }
}