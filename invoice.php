<?php
    session_start();
        $_SESSION;
        include('connection.php');
        include('functions.php');
        $invoicedata = fetch_invoice($con);
        $pricedata = get_price($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill-Invoice</title>
    <link rel="icon" href="title.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css" />
    <script src="html2pdf.bundle.min.js"></script>
        <script> function generatepdf(){
            const element = document.getElementById("invoice");
            html2pdf()
            .from(element)
            .save();
        }
    </script>
</head>
<body class="myback">
          <div id="invoice" class="maindiv">
         
            <header>
                <h1>Invoice</h1>
                <address>
                    <p>GPN Pharma</p>
                    <p>Mangalwari Bazar, Sadar<br>Nagpur, 440001</p>
                    <p>(91) 947329473</p>
                </address>
                <img class="gpnlogo" src="title.png" alt="GPN logo">
            </header>
                <?php
                    $totalbill = ($invoicedata['paracetamol'] * $pricedata['paracetamol']) + ($invoicedata['crocin'] * $pricedata['crocin']) + ($invoicedata['dettol'] * $pricedata['dettol']) + ($invoicedata['vitaminD3'] * $pricedata['vitaminD3']) + ($invoicedata['thermometer'] * $pricedata['thermometer']) + ($invoicedata['HimalayaTonic'] * $pricedata['HimalayaTonic']) + ($invoicedata['DiloDxSyrup'] * $pricedata['DiloDxSyrup']);
                    $finalbill = $totalbill -(0.1 * $totalbill);
                ?>
            <article>
                <!-- <h1>Recipient</h1> -->
                <address contenteditable>
                    <p> Customer name : #####    </p>
                    <p>Number : #####   </p>
                </address>
                <table class="meta">
                    <tr>
                        <th><span>Invoice Id</span></th>
                        <td><span><?php echo $invoicedata['InvoiceID'];?></span></td>
                    </tr>
                    <tr>
                        <th><span>Date</span></th>
                        <td><span contenteditable>November 10, 2021</span></td>
                    </tr>
                    <tr>
                        <th><span>Amount Due</span></th>
                        <td><span>₹ <?php echo $finalbill;?></span></td>
                    </tr>
                </table>
                <table class="inventory">
                    <thead>
                        <tr>
                            <th><span>Item</span></th>
                            <!-- <th><span contenteditable>Description</span></th> -->
                            <th><span>Rate</span></th>
                            <th><span>Quantity</span></th>
                            <th><span>Price</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td><?php if($invoicedata['paracetamol'] != 0)
                        {
                            echo"Paracetamol";
                        }
                        else
                        {

                        }?></td>
                        <td><?php if($invoicedata['paracetamol'] != 0)
                        {
                            echo $pricedata['paracetamol'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['paracetamol'] != 0)
                        {
                            echo $invoicedata['paracetamol'];
                        }
                        else
                        {

                        }
                        ?></td><td><?php if($invoicedata['paracetamol'] != 0)
                        {
                            echo $invoicedata['paracetamol'] * $pricedata['paracetamol'];
                        }
                        else
                        {

                        }
                        ?></td></tr>

                        <tr><td><?php if($invoicedata['crocin'] != 0)
                        {
                            echo"Crocin";
                        }
                        else
                        {
                            
                        }?></td><td><?php if($invoicedata['crocin'] != 0)
                        {
                            echo $pricedata['crocin'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['crocin'] != 0)
                        {
                            echo $invoicedata['crocin'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['crocin'] != 0)
                        {
                            echo $invoicedata['crocin'] * $pricedata['crocin'];
                        }
                        else
                        {

                        }?></td></tr>
                        
                        <tr><td><?php if($invoicedata['dettol'] != 0)
                        {
                            echo"Dettol";
                        }
                        else
                        {
                            
                        }?></td><td><?php if($invoicedata['dettol'] != 0)
                        {
                            echo $pricedata['dettol'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['dettol'] != 0)
                        {
                            echo $invoicedata['dettol'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['dettol'] != 0)
                        {
                            echo $invoicedata['dettol'] * $pricedata['dettol'];
                        }
                        else
                        {

                        }?></td></tr>
                        
                        <tr><td><?php if($invoicedata['vitaminD3'] != 0)
                        {
                            echo"Vitamin-D3";
                        }
                        else
                        {
                            
                        }?></td><td><?php if($invoicedata['vitaminD3'] != 0)
                        {
                            echo $pricedata['vitaminD3'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['vitaminD3'] != 0)
                        {
                            echo $invoicedata['vitaminD3'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['vitaminD3'] != 0)
                        {
                            echo $invoicedata['vitaminD3'] * $pricedata['vitaminD3'];
                        }
                        else
                        {

                        }?></td></tr>
                        
                        <tr><td><?php if($invoicedata['thermometer'] != 0)
                        {
                            echo"Thermometer";
                        }
                        else
                        {
                            
                        }?></td><td><?php if($invoicedata['thermometer'] != 0)
                        {
                            echo $pricedata['thermometer'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['thermometer'] != 0)
                        {
                            echo $invoicedata['thermometer'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['thermometer'] != 0)
                        {
                            echo $invoicedata['thermometer'] * $pricedata['thermometer'];
                        }
                        else
                        {

                        }?></td></tr>
                        
                        <tr><td><?php if($invoicedata['HimalayaTonic'] != 0)
                        {
                            echo"Himalaya Tonic";
                        }
                        else
                        {
                            
                        }?></td><td><?php if($invoicedata['HimalayaTonic'] != 0)
                        {
                            echo $pricedata['HimalayaTonic'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['HimalayaTonic'] != 0)
                        {
                            echo $invoicedata['HimalayaTonic'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['HimalayaTonic'] != 0)
                        {
                            echo $invoicedata['HimalayaTonic'] * $pricedata['HimalayaTonic'];
                        }
                        else
                        {

                        }?></td></tr>
                        
                        <tr><td><?php if($invoicedata['DiloDxSyrup'] != 0)
                        {
                            echo"Dilo-Dx-syrup";
                        }
                        else
                        {
                            
                        }?></td><td><?php if($invoicedata['DiloDxSyrup'] != 0)
                        {
                            echo $pricedata['DiloDxSyrup'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['DiloDxSyrup'] != 0)
                        {
                            echo $invoicedata['DiloDxSyrup'];
                        }
                        else
                        {

                        }?></td><td><?php if($invoicedata['DiloDxSyrup'] != 0)
                        {
                            echo $invoicedata['DiloDxSyrup'] * $pricedata['DiloDxSyrup'];
                        }
                        else
                        {

                        }?></td></tr>
                    </tbody>
                </table>
                    
                <table class="balance">
                    <tr>
                        <th><span>Total-Bill</span></th>
                        <td><span data-prefix>₹</span><span><?php echo $totalbill;?></span></td>
                    </tr>
                    <tr>
                        <th><span>Discount (10%)</span></th>
                        <td><span data-prefix>₹</span><span><?php echo (0.1 * $totalbill);?></span></td>
                    </tr>
                    <tr>
                        <th><span>Final-bill</span></th>
                        <td><span data-prefix>₹</span><span><?php echo $finalbill;?></span></td>
                    </tr>
                </table>
            </article>
            <aside>
                <h1><span>Additional Notes</span></h1>
                <div >
                    <td valign="top">
                    <h6 style="text-align: center;">If you have any query about this invoice, please contact us at</h8>
                    <h6 style="text-align: center;">GPN PHARMA, gpnpharma@gmail.com, 9876543210</h8></td>
                </div>
            </aside>
            <!-- HTML !-->
    
            <button onclick="generatepdf()" class="button-34" >Print</button>
            <button class="button-34" role="button"><a href="cashierview.php">Inventory</a></button>
        </div>
        </body>
</html>