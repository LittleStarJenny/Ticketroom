<?php
include_once "header.php";
$pdo = connect();

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $data1 = []; 

    // prepares the dtaabase.. if the statement is true we'll get the wanted info otherwise the message will appear.
    $stmt = $pdo->prepare("SELECT t.idtickets, t.firstname, t.quantity, e.Title FROM 
    tickets AS t
    JOIN events AS e ON t.eventId = e.idEvent
    WHERE idtickets LIKE '$search'");

    if($stmt->execute()) {
        if($stmt->rowCount() > 0) { 
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data1[] = $row; 
            }
        } else {        
           echo "<script>alert('Det finns ingen biljett med det ID');</script>";
        }
    }}
            ?>
              
              <main class="ticketcheckout">
<form method="post" action="ticketcontrol.php"> 
<?php 
foreach($data1 as $row){
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
