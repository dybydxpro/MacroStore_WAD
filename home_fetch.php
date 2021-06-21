<?php 
            session_start();
            $system_userName= $_SESSION['regName'];
            $system_userID = $_SESSION['uid']; 

          function repeatStruct($rs_itemNo, $rs_name, $rs_unit, $rs_qty, $rs_unitprice, $rs_image){ ?>
            <form method = "post" action = "home.php?action=add&id=<?php echo $rs_itemNo; ?>">
            <div class="col">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rs_image); ?>" alt="Card image cap"width="200" height="200">
              <div class="card-body">
              <h3 class="card-title"><?php echo $rs_name; ?></h3>
                <ul>
                    <li>Item No: <?php echo $rs_itemNo;?></li>
                    <li>Quantity: <?php echo $rs_qty.$rs_unit; ?></li>
                    <li>Price: LKR. <?php echo $rs_unitprice; ?></li>
                  </ul>
                  <input type="hidden" name= "product_id" value='<?php echo $rs_itemNo;?>'> 

                  <p>Qty: <input type="text" id="qtyBox" name ="qtyBox" placeholder="" value = "<?php echo $rs_qty; ?>" required/></p>
                  <a href="cart_add.php" class="btn btn-primary" name = "add<?php echo $rs_itemNo ?>" onClick="<?php if(!empty($_POST["qtyBox".$rs_itemNo])){ $_SESSION['itemNo'] = $rs_itemNo; $_SESSION['cartQty'] = $_POST["qtyBox".$rs_itemNo];} else {echo "<script>alert('Empty qty...!')</script>";}?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg> Add to cart</a>
              </div>
            </div>
            </div>
            <br>
            <br>
            <br>
            </form>
  
        ?>
          <?php }
        ?>