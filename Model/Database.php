<?php
/**
 * Created by PhpStorm.
 * User: jelly
 * Date: 22/04/2019
 * Time: 11:06
 */

class Database
{
    /**
     * @var string
     */
    private $dsn;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;

    public function __construct()
    {
        // A modifier à la correction
        $this->dsn="mysql:host=localhost;dbname=supjeans";
        $this->username="root";
        $this->password="";
    }

    /**
     * @return string
     */
    public function getDsn(): string
    {
        return $this->dsn;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return PDO
     */
    public function connexion():PDO
    {
        try
        {
            $conn=new PDO($this->getDsn(),$this->username,$this->password);
        }
        catch (Exception $exception)
        {
            echo '<h1 class="display-3" ">'.$exception->getMessage();die.'</h1>';
        }
        return $conn;
    }
}