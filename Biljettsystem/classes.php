<?php 
include_once 'functions.php';


Class Admin {

    //Properties

    public $admin = ['idAdmin' => 0, 'Name' => "something", 'Password' => "something"];

    //methods

    public function get_admin() {
        $pdo = connect();

        $sql = "SELECT * FROM admindata WHERE Name = '". $this->{"Name"} . "'"; // sql statement

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;
    } 
   
    public function check_login() {
        $pdo = connect();
        if($this->{"Name"} != ""){
            $sql = "SELECT * FROM admindata WHERE Name = '" . $this->{"Name"} . "'";
            $toGet = $pdo->prepare($sql); // prepared statement
            $toGet->execute(); // execute sql statment
            $result = $toGet->fetch();

            if($result == FALSE){
                return "No such table";
            } else {

                $session1 = password_verify($this->{"Password"}, $result['Password']);

                if(isset($result['Name'])) {
                    if($session1) {
                        return TRUE;
                    } else {
                        return "Wrong Password";
                    }
                } else {
                    return "No such user";
                }

            }
        } else {
            return "No user specified";
        }
    }    
}

//Get Events
Class Events {
    public function get_event() {
        $pdo = connect();

        $sql = "SELECT * FROM events
                WHERE idEvent = '" . $this->{"idEvent"} . "'"; // sql statementS

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }

    //Create a new event
    public function create_event() {
        $pdo = connect();

        $sql = "INSERT INTO events (idEvent, Title, Description, Price, Date, Img)
                VALUES ('" . $this->{"idEvent"} . "', '" . $this->{"Title"} . "', '" . $this->{"Description"} . "', '" . $this->{"Price"} . "', '" . $this->{"Date"} . "', '" . $this->{"Img"} . "')"; // sql statement

        $toCreate = $pdo->prepare($sql); // prepared statement
        $return = $toCreate->execute(); // execute sql statment

        return $return;
    } 

    public function create_customer() {
        $pdo = connect();

        $sql = "INSERT INTO customers (idcustomers, Firstname, Lastname, Address, Zipcode, City, Email, Phone)
                VALUES ('" . $this->{"idcustomers"} . "', '" . $this->{"Firstname"} . "', '" . $this->{"Lastname"} . "', '" . $this->{"Address"} . "', '" . $this->{"Zipcode"} . "', '" . $this->{"City"} . "', '" . $this->{"Email"} . "', '" . $this->{"Phone"} . "')"; // sql statements

        $toCreate = $pdo->prepare($sql); // prepared statement
        $toCreate->execute(); // execute sql statment

        return $return;
    }
}

  //Get Ticket
Class Ticket {

    public $idtickets = 0;
    public $eventId = 'something';
    public $customerId = 'something';


    public function get_ticket() {
        $pdo = connect();

        $sql = "SELECT t.idtickets, c.Firstname, e.Title FROM 
        tickets AS t
        JOIN customers AS c ON t.customerId = c.idcustomers
        JOIN events AS e ON t.eventId = e.idEvent
        WHERE t.idtickets = '" . $this->{"t.idtickets"} . "', c.Firstname = '" . $this->{"c.Firstname"} . "', e.Title = '" . $this->{"e.Title"} . "' ";
        

        $toGet = $pdo->prepare($sql); // prepared statement
        $toGet->execute(); // execute sql statment

        return $toGet;

    }  
}