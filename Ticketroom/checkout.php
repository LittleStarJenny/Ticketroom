<?php
include_once "header.php";
$pdo = connect();
$sum = 0; 
$_COOKIE['Produktnamn'];
$_COOKIE['Antal'];
$_COOKIE['Pris'];
$_COOKIE['Eventid'];

    if (isset($_POST['action'])) {
        if(isset($_POST['check'])){
        $idtickets = filter_input(INPUT_POST, '', FILTER_SANITIZE_INT);
        $eventId = filter_input(INPUT_COOKIE, 'Eventid', FILTER_SANITIZE_INT);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
        
      $sql = "INSERT INTO tickets (idtickets, eventId, firstname, quantity) 
        VALUES ('$idtickets', '$eventId', '$firstname', '$quantity')";
        $pdo->prepare($sql)->execute(); 
            header("Location:ticket.php");
            } else {
     echo "<script>alert('Please check the box!');</script>";
    }
 }
 //Calculate the sum
$rowsum = $_COOKIE['Antal'] * $_COOKIE['Pris'];
$sum += $rowsum; 

?>

<main class="checkout">
    <div class="checkout-wrap">
<table class="cart-table">
<form method="post" action="checkout.php">
<h3 class="h3cart">Varukorg</h3>
<tr>
<th>Produktnamn</th>
<th>ID</th>
<th>Antal</th>
<th>Pris</th>
<th>Summa</th>
</tr>
<tr>
<td id="t"><?php echo $_COOKIE['Produktnamn'];?></td>
<td id="i"><input type="hidden" name="eventId" value="<?php echo $_COOKIE['Eventid'];?>"><?php echo $_COOKIE['Eventid'];?></td>
<td id="q"><input type="hidden" name="quantity" value="<?php echo $_COOKIE['Antal'];?>"><?php echo $_COOKIE['Antal'];?></td>
<td id="p"><?php echo $_COOKIE['Pris'];?></td>
<td><?php echo $sum; ?></td>
</tr>
</table>
<table class="checkout-form">
<tr>
    <hr>
    <tr>
    <td><p>Namn:</p>
<input class="checkout-input" class="full-width" type="text" name="firstname"></td>
<tr>
<td><input type="checkbox" value="check" name="check">Köpvillkor</td>
        <td><input class="buy" type="submit" name="action" value="Bekräfta köp"></td>
        </tr>
</form>
</div>
</table>
</main>

<?php
include_once "footer.php";?>