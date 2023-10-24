<?php
function check_login($con, $shift)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        if ($shift == 1)

        {
            $query = "select * from users where user_id = '$id' limit 1";
        }
        else if ($shift == 2)
        {
            $query = "select * from cashier where user_id = '$id' limit 1";
        }

        $result = mysqli_query($con,$query);
        if ($result && mysqli_num_rows($result)>0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    else
    {
        // redirect to login
        if ($shift == 1)
        {
            header("Location: managerlogin.php");
            die;
        }
        else if ($shift == 2)
        {
            header("Location: cashierlogin.php");
            die;
        }
    }
}

function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }
    $len = rand(4, $length);

    for ($i=0; $i < $len; $i++) { 
        $text .= rand(0,9);
    }
    return $text;
}

function insert($con)
{
    
    $_SESSION;
    if($con)
    {
        echo "Connection Successful";
    }
    else
    {
        echo "Connection not Successful";
    }
    $fetchquery = "select * from tempinvoices where indexing = (select max(indexing) from tempinvoices ) limit 1";
    $result = mysqli_query($con, $fetchquery);
    if($result && mysqli_num_rows($result)>0)
    {
        $invoicedata = mysqli_fetch_assoc($result);
    }
    $InvoiceID = $invoicedata['tempInvoiceID'];
    $paracet = $invoicedata['paracet'];
    $croc = $invoicedata['croc'];
    $dett = $invoicedata['dett'];
    $vitD3 = $invoicedata['vitD3'];
    $thermo = $invoicedata['thermo'];
    $HimTonic = $invoicedata['HimTonic'];
    $DiloSyrup = $invoicedata['DiloSyrup'];
    $query = "insert into invoices (InvoiceID, paracetamol, crocin, dettol, vitaminD3, thermometer, HimalayaTonic, DiloDxSyrup) values ('$InvoiceID','$paracet','$croc','$dett','$vitD3','$thermo','$HimTonic','$DiloSyrup')";
    $success = mysqli_query($con, $query);
    if($success)
    {
        header("Location: invoice.php");
        die;
    }
}

function fetch_invoice($con)
{
    if($con)
    {
        $query = "SELECT * FROM `invoices` ORDER BY Id DESC LIMIT 1;";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result)>0)
        {
            $invoice = mysqli_fetch_assoc($result);
            return $invoice;
        }
        else
        {
            $error = "Bhai result fetch nahi hua !";
            return $error;
        }
    }
}

function get_price($con)
{
    $query = "SELECT * FROM `items`;";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result)>0)
    {
        $pricedata = mysqli_fetch_assoc($result);
        return $pricedata;
    }
    else
    {
        $error = "Bhai price fetch nahi ho paa rahi hai !";
        return $error;
    }
}