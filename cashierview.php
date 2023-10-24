<?php
    $paracet = '';
    $croc = '';
    $dett = '';
    $vitD3 = '';
    $thermo = '';
    $HimTonic = '';
    $DiloSyrup = '';

    session_start();
        $_SESSION;
        include("connection.php");
        include("variables.php");
        include("functions.php");
        $shift = 2;
        $user_data = check_login($con, $shift);
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      // the quantity of items selected each
      $paracetamol = intval($_POST['paracetamol']);
      $crocin = intval($_POST['crocin']);
      $dettol = intval($_POST['dettol']);
      $vitaminD3 = intval($_POST['vitaminD3']);
      $thermometer = intval($_POST['thermometer']);
      $HimalayaTonic = intval($_POST['HimalayaTonic']);
      $DiloDxSyrup = intval($_POST['DiloDxSyrup']);
      $text = 'Total quantity : ';
      $result = $paracetamol + $crocin + $dettol + $vitaminD3 + $thermometer + $HimalayaTonic + $DiloDxSyrup;
      
      if(empty($paracetamol) && empty($crocin) && empty($dettol) && empty($vitaminD3) && empty($thermometer) && empty($HimalayaTonic) && empty($DiloDxSyrup))
      {

      }
      else
      {
        $paracet = $paracetamol;
        $croc = $crocin;
        $dett = $dettol;
        $vitD3 = $vitaminD3;
        $thermo = $thermometer;
        $HimTonic = $HimalayaTonic;
        $DiloSyrup = $DiloDxSyrup;
        $tempInvoiceID = random_num(5);
        $query = "insert into tempinvoices (tempInvoiceID, paracet, croc, dett, vitD3, thermo, HimTonic, DiloSyrup) values ('$tempInvoiceID', '$paracet', '$croc', '$dett', '$vitD3', '$thermo', '$HimTonic', '$DiloSyrup')";
        mysqli_query($con, $query);
      } 
    }
      
      // supplying the values to the function on clicking generate bill
      if(array_key_exists('generatebill', $_POST))
      {
        insert($con);
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier-Dashboard</title>
    <link rel="icon" href="title.png" type="image/x-icon">
    <link rel="stylesheet" href="cashierdashboard.css">
</head>
<body>
    
<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#about">About Us</a>
    <a href="#Terms">Terms And Conditions</a>
    <a href="#Contact">Contact Us</a>
    <a class="logout" href="logout.php">Logout</a>
    <div class="username">
    <?php echo "Welcome Mr. ",$user_data['username'];?>
    </div>
  </div>
  <form method="POST">
    <div class="mainbody">
      <div class="contentText">
        <h1>GPN PHARMA SHOP</h1>
      </div>
      <div class="container">
        <h1>Please select the medicines you want to buy and click on view cart to check details</h1>

        <div class="cart">
          <div class="products">
            <div class="product">
              <img src="paracetamol-1.png" />

              <div class="product-info">
                <h3 class="product-name">PARACETAMOL TABLET</h3>

                <h4 class="product-price">PRICE:- ₹ 50/-</h4>

                <h4 class="product-offer">OFFER:- 10% off</h4>

                <p class="product-quantity">Enter Quantity: <input type="number" value="" min="0" name="paracetamol"></p>
              
              </div>
            </div>
            <div class="product">
              <img src="download1.png" />

              <div class="product-info">
                <h3 class="product-name">CROCIN TABLET</h3>

                <h4 class="product-price">PRICE:- ₹ 75/-</h4>

                <h4 class="product-offer">OFFER:- 10% off</h4>

                <p class="product-quantity">Enter Quantity: <input type="number" value="" min="0" name="crocin"></p>

              </div>
            </div>
            <div class="product">
              <img src="dettol.png" />

              <div class="product-info">
                <h3 class="product-name">DETTOL</h3>

                <h4 class="product-price">PRICE:- ₹ 100/-</h4>

                <h4 class="product-offer">OFFER:- 10% off</h4>

                <p class="product-quantity">Enter Quantity: <input type="number" value="" min="0" name="dettol"></p>

              </div>
            </div>
            <div class="product">
              <img src="vitimen.png" />

              <div class="product-info">
                <h3 class="product-name">VITAMIN-D3</h3>

                <h4 class="product-price">PRICE:- ₹ 150/-</h4>

                <h4 class="product-offer">OFFER:- 10% off</h4>

                <p class="product-quantity">Enter Quantity: <input type="number" value="" min="0" name="vitaminD3"></p>

              </div>
            </div>
            <div class="product">
              <img src="thermo.png" />

              <div class="product-info">
                <h3 class="product-name">DIGITAL THERMOMETER</h3>

                <h4 class="product-price">PRICE:- ₹ 200/-</h4>

                <h4 class="product-offer">OFFER:- 10% off</h4>

                <p class="product-quantity">Enter Quantity: <input type="number" value="" min="0" name="thermometer"></p>

              </div>
            </div>

            <div class="products">
              <div class="product">
                <img src="liver.png" />

                <div class="product-info">
                  <h3 class="product-name">HIMALAYA TONIC</h3>

                  <h4 class="product-price">PRICE:- ₹ 300/-</h4>

                  <h4 class="product-offer">OFFER:- 10% off</h4>

                  <p class="product-quantity">Enter Quantity: <input type="number" value="" min="0" name="HimalayaTonic"></p>

                </div>
              </div>


              <div class="product">
                <img src="dilo-dx-syrup.PNG" />

                <div class="product-info">
                  <h3 class="product-name">DILO-DX SYRUP</h3>

                  <h4 class="product-price">PRICE:- ₹ 150/-</h4>

                  <h4 class="product-offer">OFFER:- 10% off</h4>

                  <p class="product-quantity">Enter Quantity: <input type="number" value="" min="0" name="DiloDxSyrup"></p>

                </div>
              </div>
            </div>
            <div class="viewcart">
              <div class="CartItems">
                <h2><?php 
                          
                          if($paracetamol != 0)
                          {
                            echo "Paracetamol                 : ",$paracet;
                          }
                ?></h2>
                <h2><?php if($crocin != 0)
                          {
                            echo "Crocin                    \t  : ",$crocin;
                          }
                ?></h2>
                <h2><?php if($dettol != 0)
                          {
                            echo "Dettol","                ",": ",$dettol;
                          }
                ?></h2>
                <h2><?php if($vitaminD3 != 0)
                          {
                            echo "Vitamin-D3                  : ",$vitaminD3;
                          }
                ?></h2>
                <h2><?php if($thermometer != 0)
                          {
                            echo "Thermometer                 : ",$thermometer;
                          }
                ?></h2>
                <h2><?php if($HimalayaTonic != 0)
                          {
                            echo "Himalaya Tonic              : ",$HimalayaTonic;
                          }
                ?></h2>
                <h2><?php if($DiloDxSyrup != 0)
                          {
                            echo "Dilo-Dx_Syrup         : ",$DiloDxSyrup;
                          }
                ?></h2><br><br>
                <h3>
                <?php
                if($result == 0)
                {
                  echo"Please select any item";
                }
                else
                  echo $text,$result;
                ?>
                </h3>
              </div>
              
            <input class="btn" type="submit" value="View Cart">
            <input class="billgenerate" type="submit" name="generatebill" value="Generate Bill">
            </div>

          </div>
        </div>
      </div>
      <footer>
        <h4>&copy2021-2030 Gpn Pharma</h4>
        <div class="address"> All Rights Reservd </div>
      </footer>

    </div>
  </form>
</body>
</html>