<?php
/**
 * Created by PhpStorm.
 * User: jelly
 * Date: 22/04/2019
 * Time: 09:48
 */

class User
{
    /**
     *@var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $billing_adress;
    /**
     * @var string
     */
    private $delivery_adress;
    /**
     * @var string
     */
    private $role;

    public function __construct()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Database.php';
        if(isset($_SESSION['user_data']))
        {
            $email=$_SESSION['user_data'];
            $sql="select * from user where email= '$email'";
            $b=new Database();
            $req=$b->connexion()->prepare($sql);
            $req->execute();

            $arr=$req->fetch();
            $this->id=$arr[0];
            $this->email=$arr[1];
            $this->billing_adress=$arr[2];
            $this->delivery_adress=$arr[3];
            $this->role=$arr[5];
        }

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getBillingAdress():? string
    {
        return $this->billing_adress;
    }

    /**
     * @param string $billing_adress
     */
    public function setBillingAdress(string $billing_adress): void
    {
        $this->billing_adress = $billing_adress;
    }

    /**
     * @return string
     */
    public function getDeliveryAdress(): ?string
    {
        return $this->delivery_adress;
    }

    /**
     * @param string $delivery_adress
     */
    public function setDeliveryAdress(string $delivery_adress): void
    {
        $this->delivery_adress = $delivery_adress;
    }

    /**
     * @return string
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }


}
