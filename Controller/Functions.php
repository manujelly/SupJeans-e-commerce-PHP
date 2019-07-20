<?php
/**
 * Created by PhpStorm.
 * User: jelly
 * Date: 22/04/2019
 * Time: 10:09
 */


class Functions
{


    public function AddToCart()
    {
        if (isset($_POST['id']) && isset($_POST['product_name']) && isset($_POST['price']))
        {
            $product_name=$_POST['product_name'];
            $price=$_POST['price'];
            $id=$_POST['id'];
            $img=$_POST['img'];
            if (!empty($product_name) && !empty($price) && !empty($id))
            {
                session_start();

                if (isset($_SESSION['mycart']))
                {
                    $data=array('id'=>$id,'product_name'=>$product_name,'price'=>$price,'img'=>$img);
                    $verif=0;
                    foreach ($_SESSION['mycart'] as $v)
                    {

                        if ($data==$v)
                        {
                            $verif++;
                        }
                    }
                    if ($verif<1)
                    {
                        array_push($_SESSION['mycart'],$data);
                    }
                    echo sizeof($_SESSION['mycart']);
                }
                else
                {
                    $_SESSION['timeout']=time();
                    $_SESSION['mycart'][0]=array('id'=>$id,'product_name'=>$product_name,'price'=>$price,'img'=>$img);
                    echo sizeof($_SESSION['mycart']);
                }
            }
        }
    }
    public function getMyCart()
    {
        header('location:../views/pages/mycart.php');
    }

    public function emptycart()
    {
        session_start();
        $_SESSION['mycart']=null;
        header('location:/home.php?message=resetcart');
    }

    public function payement()
    {
        session_start();
        if (!isset($_SESSION['mycart']) || empty($_SESSION['mycart']) || !isset($_SESSION['user_data']))
        {
            header('location:/home.php?message=warning');
        }
        require '../Model/Receipt.php';
        require '../Model/Database.php';

        $a=new Database();
        $sql="select * from user where email='".$_SESSION['user_data']."'";
        $c=$a->connexion()->prepare($sql);
        $c->execute();
        $d=$c->fetch();
        $receipt_ref=rand();
        $endprice=0;
        foreach ($_SESSION['mycart'] as $t)
        {

            $endprice=$endprice+$t['price'];
            $newreceipt=new Receipt();
            $newreceipt->setJsName($t['product_name']);
            $newreceipt->setPrice($t['price']);
            $newreceipt->setUser($_SESSION['user_data']);
            $newreceipt->setTransactionDate(new DateTime());
            $newreceipt->setDeliveryAdress($d['delivery_address']);
            $newreceipt->setBillingAdress($d['billing_address']);

            $product_name=$newreceipt->getJsName();
            $price=$newreceipt->getPrice();
            $user=$newreceipt->getUser();
            $date=$newreceipt->getTransactionDate()->format("Y/m/d H:i:s");

            $delivery=$newreceipt->getDeliveryAdress();
            $billing=$newreceipt->getBillingAdress();
            $sql_t="insert into products(receipt_ref,product_name, price, user, transaction_date, billing_address, delivery_address)
                  values ($receipt_ref, '$product_name', $price, '$user', '$date', '$billing', '$delivery')";
            $send=$a->connexion()->prepare($sql_t);
            $send->execute();
        }

        $time=new DateTime();
        if ($d['status']=='admin')
        {
            $this->generateReceipt($receipt_ref,$_SESSION['mycart'],$endprice,$user,$date,$delivery,$billing,$time->format("Y/m/d H:i:s") );
        }
        else
        {
            header('location:/views/pages/recent_orders.php?message=success');
        }
        $_SESSION['mycart']=null;
    }
    public function addInfo()
    {
        if (isset($_POST['submit']))
        {
            if (isset($_POST['b_address']) && isset($_POST['d_address']))
            {
                if (!empty($_POST['b_address']) && !empty($_POST['d_address']))
                {
                    session_start();
                    $b=$_POST['b_address'];
                    $d=$_POST['d_address'];
                    $e=$_SESSION['user_data'];

                    require $_SERVER['DOCUMENT_ROOT'].'/Model/Database.php';
                    $a=new Database();
                    $sql = "UPDATE user SET delivery_address='$d', billing_address='$b' WHERE email='$e'";
                    $req=$a->connexion()->prepare($sql);
                    $req->execute();


                    header('location:/views/pages/mycart.php?message=success');
                }
            }
        }
    }

    private function generateReceipt($ref,$product_name,$price,$user_data,$date,$delivery_address,$billing_address,$time)
    {
        require "../public/fpdf/fpdf.php";


        $pdf = new FPDF();
        $pdf->AddPage();
        // Police Arial gras 15
        $pdf->SetFont('Arial','B',25);
        // Décalage
        $pdf->Cell(5);
        // Titre encadré
        $pdf->Cell(180,10,'PAYMENT RECEIPT FROM SUPJEANS',1,0,'C');
        // Saut de ligne
        $pdf->Ln(20);
        $pdf->SetFont('Times','',13);
        $pdf->Cell(5);
        $pdf->Cell(170,10,'This receipt was generated automatically by supjeans. It gives you a summary of your order.',0,'C');
        $pdf->Ln(20);
        $pdf->SetFont('courier','',10);
        $pdf->Cell(30,10,'Client:'.$user_data,0,'C');

        $pdf->Ln(10);

        $pdf->SetFont('courier','',10);
        $pdf->Cell(30,10,'Receipt reference:'.$ref,0,'C');

        $pdf->Ln(10);

        $pdf->SetFont('courier','',10);
        $pdf->Cell(30,10,'Delivery address:'.$delivery_address,0,'C');

        $pdf->Ln(10);
        $pdf->SetFont('courier','',10);
        $pdf->Cell(30,10,'Billing address:'.$billing_address,0,'C');
        $pdf->Ln(10);
        $pdf->SetFont('courier','',10);
        $pdf->Cell(30,10,'Transaction date:'.$date,0,'C');

        $pdf->Ln(10);
        $pdf->SetFont('courier','',10);
        $pdf->Cell(30,10,'Generate at:'.$time,0,'C');

        $pdf->Ln(20);
        if (is_array($product_name))
        {
            foreach ($product_name as $t)
            {
                $pdf->SetFont('Times','',18);
                $pdf->Cell(10,10,$t['product_name'],0,'C');
                $pdf->Ln(10);

            }
        }
        else
        {
            $pdf->SetFont('Times','',18);
            $pdf->Cell(10,10,$product_name,0,'C');
            $pdf->Ln(10);
        }

        $pdf->Ln(5);
        $pdf->SetFont('courier','',10);
        $pdf->Cell(180,10,'Description:This is a wider card with supporting text belowas a natural lead-in to
                            additional content. This content is a little bit longer.',1,'C');
        $pdf->Ln(10);
        $pdf->SetFont('courier','',10);
        $pdf->Cell(30,10,'Price:'.$price.'$',1,'C');

        $pdf->Ln(20);

        $pdf->Ln(20);

        $pdf->Cell(32);
        $pdf->SetFont('Times','',15);
        $pdf->Cell(30,10,'THANK YOU FOR YOUR VISIT. SEE YOU SOON ;)',0,'C');

        $pdf->Ln(10);
        $pdf->Cell(40);

        $pdf->SetFont('courier','',10);
        $pdf->Cell(30,10,'SupJeans-Supinfo International University Project',0,'C');

        $pdf->Output();

    }
    public function grant()
    {
        if (isset($_GET['ref']))
        {
            if (!empty($_GET['ref']))
            {
                session_start();
                require $_SERVER['DOCUMENT_ROOT'].'/Model/User.php';
                $nu=new User();
                if ($nu->getId()==$_GET['ref'])
                {
                    header('location:/views/pages/admin/user_list.php');
                }
                else
                {
                    $d=$_GET['ref'];
                    $sql="Update user set supjeans.user.status='admin' where supjeans.user.id='$d'";
                    $a=new Database();
                    $req=$a->connexion()->prepare($sql);
                    $req->execute();
                    header('Location:/views/pages/admin/user_list.php?message=successg');

                }
            }
            else
            {
                header('location:/views/pages/admin/user_list.php');
            }
        }
        else{
            header('location:/views/pages/admin/receipts.php');
        }
    }
    public function removeItem()
    {
        if (isset($_GET['ref']))
        {
            $a=$_GET['ref'];
            if (!empty($a))
            {
                session_start();
                foreach ($_SESSION['mycart'] as $key=>$item)
                {
                    $b=array_search($a,$item);
                    if ($b)
                    {
                        unset($_SESSION['mycart'][$key]);
                        header('location:/views/pages/mycart.php');
                    }

                }
            }
        }
        else
        {
            header('location:/home.php?message=warning');
        }
    }
    public function ManualReceipt()
    {
        if (isset($_GET['ref']))
        {
            if (!empty($_GET['ref']))
            {
                $d=$_GET['ref'];
                require $_SERVER['DOCUMENT_ROOT'].'/Model/Database.php';

                $sql="select * from products where id='$d'";
                $a=new Database();
                $req=$a->connexion()->prepare($sql);
                $req->execute();
                $data=$req->fetch();
                $currectime=new DateTime();
                if ($data!=null)
                {
                    $this->generateReceipt($data['receipt_ref'],$data['product_name'],$data['price'],$data['user'],$data['transaction_date'],$data['delivery_address'],$data['billing_address'],$currectime->format("Y/m/d H:i:s"));
                }
                else
                {
                    header('location:/views/pages/admin/receipts.php?message=error');
                }
            }
            else
            {
                header('location:/views/pages/admin/receipts.php');
            }
        }
        else{
            header('location:/views/pages/admin/receipts.php');
        }
    }
    public function deny()
    {
        if (isset($_GET['ref']))
        {
            if (!empty($_GET['ref']))
            {
                session_start();
                require $_SERVER['DOCUMENT_ROOT'].'/Model/User.php';
                $nu=new User();
                if ($nu->getId()==$_GET['ref'])
                {
                    header('location:/views/pages/admin/user_list.php');
                }
                else
                {
                    $d=$_GET['ref'];

                    $sql="Update user set supjeans.user.status='user' where supjeans.user.id='$d'";
                    $a=new Database();
                    $req=$a->connexion()->prepare($sql);
                    $req->execute();
                    header('Location:/views/pages/admin/user_list.php?message=successd');

                }
            }
            else
            {
                header('location:/views/pages/admin/receipts.php');
            }
        }
        else{
            header('location:/views/pages/admin/receipts.php');
        }

    }

}

$a=new Functions();
if (isset($_GET['action']))
{

    switch ($_GET['action'])
    {
        case 'addtocart':
            $a->AddToCart();
            break;
        case 'mycart':
            $a->getMyCart();
            break;
        case 'cartempty':
            $a->emptycart();
            break;
        case 'payement':
            $a->payement();
            break;
        case 'addinfo':
            header('location:../views/pages/add_info.php');
            break;
        case 'update':
            $a->addInfo();
            break;
        case 'removeitem':
            $a->removeItem();
            break;
        default:
            header('location:/home.php');
            break;
    }
}

if (isset($_GET['search']))
{
    if (!empty($_GET['search']))
    {
        header('location:/views/pages/result_search.php?search='.$_GET['search']);
    }
    else
    {
        header('location:/home.php');
    }
}

if (isset($_GET['req']))
{
    switch ($_GET['req'])
    {
        case 'user_list':
            header('location:/views/pages/admin/user_list.php');
            break;
        case 'receipts':
            header('location:/views/pages/admin/receipts.php');
            break;
        case 'view_receipt':
            $a->ManualReceipt();
        break;
        case 'grant_user':
            $a->grant();
            break;
        case 'deny_user':
        $a->deny();
        break;
        default:
            header('location:/views/pages/admin/user_list.php');
        break;
    }
}
