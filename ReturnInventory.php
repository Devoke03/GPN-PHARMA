<?php
    session_start();
    include('connection.php');
    include('functions.php');
    if(isset($_SESSION['tempInvoiceID']))
    {
        echo "Bhai Invoice Id se fetch toh kar rha hai !!";
        unset($_SESSION['tempInvoiceID']);
        header("Location: cashierview.php");
        die;
    }
    else
    {
        echo"Bhai invoice id fetch nahi ho paa rahi hai !";
        header("Location: cashierview.php");
        
    }
?>