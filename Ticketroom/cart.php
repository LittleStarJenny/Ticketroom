<?php 
include_once 'header.php'; 

$sum = 0; 
if (!isset($_COOKIE['Antal'])) {
    echo ''; }
    else {
$rowsum = $_COOKIE['Antal'] * $_COOKIE['Pris'];
$sum += $rowsum; 
}

if (isset($_POST['remove'])) {
     //  To redirect form on a particular page
     header("Location:cart.php");
    }

?>
<main class="checkout">
<table class="cart-table">
<h3 class="h3cart">Varukorg</h3>
<tr>
<th>Produktnamn</th>
<th>ID</th>
<th>Antal</th>
<th>Pris</th>
<th>Summa</th>
</tr>
<tr>
<?php if (!isset($_COOKIE['Antal'])) {
    echo "";
}
else { ?>
<form method="post" action="cart.php">
<td id="t"><?php echo $_COOKIE['Produktnamn'];?></td>
<td id="i"><?php echo $_COOKIE['Eventid'];?></td>
<td id="q"><?php echo $_COOKIE['Antal'];?></td>
<td id="p"><?php echo $_COOKIE['Pris'];?></td>
<td><?php echo $sum; ?></td>

<td><input type="submit"  id="remove" name="remove" value="Ta bort"></td></form>
<td><a href="checkout.php"><button>Till kassan</button></a></td>
</tr>
</table>
</main>

    <?php
include_once "footer.php";}?>