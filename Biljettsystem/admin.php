<?php  $session_test = session_start();
        if(!$session_test) {
            echo "session not started";
        }

        include_once 'header.php';
        $pdo = connect();

if(!(isset($_SESSION['Admin']))) {
        echo '<meta HTTP-EQUIV=REFRESH CONTENT="1; \'admin.php\'">';
    }

    $query = $pdo->prepare("SELECT * FROM tickets"); {
        if($query->execute()) { 
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
        }
    } 

  if(isset($_POST['delete'])){
    $ticketid = filter_input(INPUT_POST, 'ticketId', FILTER_SANITIZE_NUMBER_INT);
var_dump($ticketid);

 $stmt = $pdo->prepare("DELETE FROM tickets WHERE idtickets=$ticketid"); 
 if($stmt->execute()) {
   echo "<script>alert('Biljetten är borttagen');</script>";
 }
}

?>

<h1>Admin</h1>
        <?php 
                foreach($data as $row){
        ?>
        <section class="ticket-container">
        <div class="ticket">
            
            <p><?php echo('Biljettnummer: ' . $row ['idtickets']); ?></p>
            <p><?php echo('Kundensnamn: ' . $row['firstname']); ?></p>
            <p><?php echo('Evenemang: ' . $row['eventId']); ?></p>

            <div class="update-delete-buttons">
            <form method="post" action="admin.php"> 
                <input type="hidden" name="ticketId" value="<?php echo $row['idtickets'] ?>">
                <input type="submit" class="buttonUpdate" name="update" value="Update">
                <input type="submit" id="buttondel" name="delete" value="Delete">
            </form>
            </div>
        </div>
 </section>
        <?php 
        }
        ?>
