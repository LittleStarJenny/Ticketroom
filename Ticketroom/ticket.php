<?php
include_once "header.php";
$pdo = connect();

$stmt = $pdo->prepare("SELECT t.idtickets, t.firstname, t.quantity, e.Title FROM 
tickets AS t
JOIN events AS e ON t.eventId = e.idEvent
ORDER BY idtickets DESC LIMIT 1");

$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="ticketcheckout">
<form method="post" action="ticket.php"> 
<?php 
foreach($rows as $row){
        ?>       
      
            <div class="ticketproduct-details">
            <h2><?php echo $row['Title']; ?></h2>
            <p>Ditt namn: <?php echo $row['firstname']; ?></p>
            <p>Antal platser: <?php echo $row['quantity'] ?></p>
            <p>Biljettnummer: <?php echo $row['idtickets'] ?></p>
            <strong>Spara biljettnumret!</strong>
            </div>
</main>

            <?php } ?> 
