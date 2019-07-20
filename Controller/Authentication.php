<?php
/**
 * Created by PhpStorm.
 * User: jelly
 * Date: 22/04/2019
 * Time: 10:09
 */


require_once $_SERVER["DOCUMENT_ROOT"].'\Model\Database.php';
class Authentication
{

    //error handle with errorcode and $url to redirect
    private function errorHandle($code,$url)
    {
        header('location:'.$url.'?message='.$code);
    }

    //function verified if a user exist
    private function userExist($email)
    {
        $sql="select * from user where email= '$email'";
        $b=new Database();
        $req=$b->connexion()->prepare($sql);
        $req->execute();
        if($req->rowCount()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //function to register
    public function register(string $email, string $password,string $password_confirmation):void
    {
        if (isset($email) && isset($password) && isset($password_confirmation))
        {
            if (!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $this->errorHandle(101,'register');
            }
            else
            {
                if (empty($password))
                {
                    $this->errorHandle(102,'register');
                }
                else
                {
                    if (empty($password_confirmation))
                    {
                        $this->errorHandle(103,'register');
                    }
                    else
                    {
                        if ($password!=$password_confirmation)
                        {
                            $this->errorHandle(105,'register');
                        }
                        else
                        {

                            if (!$this->userExist($email))
                            {
                                $crypt_password=md5($password_confirmation);
                                $req="insert into user(email, password) VALUES ('$email','$crypt_password')";
                                $a=new Database();
                                $request=$a->connexion()->prepare($req);
                                $request->execute();
                                header('location:login.php?message=success');
                            }
                            else
                            {
                                $this->errorHandle(106,'register');
                            }

                        }
                    }
                }
            }
        }
        else {
                $this->errorHandle(100,'register');
            }
    }

    //function to log a user
    public function Login($email,$password)
    {
        if (isset($email) && isset($password))
        {
            if (!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $this->errorHandle(107,'login');
            }
            else
            {
                if (!$this->userExist($email))
                {
                    $this->errorHandle(106,'login');
                }
                else
                {
                    $sql="select password from user where email='$email'";
                    $a=new Database();
                    $req=$a->connexion()->prepare($sql);
                    $req->execute();
                    $passw=$req->fetch()['password'];

                    if (md5($password)==$passw)
                    {
                        session_start();
                        $_SESSION['user_data']=$email;
                        if (isset($_SERVER['HTTP_REFERER']))
                        {
                            header('location:'.$_SERVER['HTTP_REFERER']);
                        }
                        header('location:/home.php');
                    }
                    else
                    {
                        $this->errorHandle(108,'login');
                    }
                }
            }
        }

    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user_data']);
        header('location:/views/pages/auth/login.php');
    }

}