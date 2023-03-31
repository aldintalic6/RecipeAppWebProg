<?php
class ProjectDao {

    private $pdo;

    public function __construct(){
        try {
        $host = 'localhost'; // Replace with your host name
        $dbname = 'lab3_db'; // Replace with your database name
        $user = 'root'; // Replace with your MySQL username
        $pass = 'root'; // Replace with your MySQL password
            
        // Create a new PDO connection
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        // Set the PDO error mode to exception
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Echo a message to confirm that the connection was successful
        echo "Connected successfully to database $dbname on host $host";
 
    } catch(PDOException $e) {
        // If an error occurs, catch the exception and display the error message
        echo "Connection failed: " . $e->getMessage();
    }
    }

public function getAll() {

    $stmt = $this->pdo->prepare("SELECT * FROM Users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getUserByID($id) {

    $stmt = $this->pdo->prepare("SELECT * FROM Users WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function insertData($users) {
    
    $stmt = $this->pdo->prepare("INSERT INTO Users (firstName, lastName, age) VALUES (:firstName, :lastName, :age)");
    $stmt->execute($users);
    $users['id'] = $this->pdo->lastInsertID();
    return $users;
}

public function updateData($users, $id) {  
    $users['id'] = $id;
    $stmt = $this->pdo->prepare("UPDATE Users SET firstName = :firstName, lastName = :lastName, age = :age WHERE id = :id");
    $stmt->execute($users);
    return $users;
}

public function deleteByID($id) {

    $stmt = $this->pdo->prepare("DELETE FROM Users WHERE id = :id");
    $stmt->bindParam(':id', $id);  // Prevents SQL injection
    $stmt->execute();
}

}
?>
