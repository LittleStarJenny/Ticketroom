<?php 
include_once "header.php";


$pdo = connect();
$limit = 10;
$offset = 0;
$result = get_all_events($pdo, $limit, $offset);


?>

<main>
<form action="ticketcontrol.php" method="post">
    <input type="text" name="search" placeholder="Biljettnummer">
    <input type="submit" value="search">
 </form>
<?php
    while ($row = $result->fetch()) {
        ?>
        
    <section class="product-gallery">
        <img src="<?php echo $row['Img'];?>" >
    <section class="productinfo">
    <input type="hidden" id="eventid" value="<?php echo $row['idEvent'];?>">
    <h1 id="title"><?php echo $row['Title']; ?></h1>
    <p><?php echo $row['Description']; ?></p>
        <span id="price"><?php echo $row['Price'];?></span><span>:-</span>
        <div class="addtocart">
           <input type="number" id="qty" value="1" min="1" max="6">
        <input type="submit" id="addtocart" class="addTocart" name="addtocart" value="Lägg i varukorg">
        <a href="checkout.php"><button>Till kassan</button></a>
</div>
<div class="clear">
    </div>
</section>
</main>
<?php
include_once "footer.php"; }?>