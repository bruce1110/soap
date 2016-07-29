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
        //���ݿ�������
        $dbName = 'soap';
        //ʹ�õ����ݿ�
        $user = 'bruce';
        //���ݿ������û���
        $pass = '123456';
        //��Ӧ������
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