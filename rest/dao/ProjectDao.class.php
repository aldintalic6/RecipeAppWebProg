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

public function insertData($first_name, $last_name, $age) {

    $stmt = $this->pdo->prepare("INSERT INTO Users (firstName, lastName, age) VALUES (:first_name, :last_name, :age)");
    $result = $stmt->execute([':first_name' => $first_name, ':last_name' => $last_name, ':age' => $age]);
}

public function updateData($id, $first_name, $last_name, $age) {

    $stmt = $this->pdo->prepare("UPDATE Users SET firstName = :first_name, lastName = :last_name, age = :age WHERE id = $id");
    $result = $stmt->execute([':first_name' => $first_name, ':last_name' => $last_name, ':age' => $age]);
}

public function deleteData($id) {

    $stmt = $this->pdo->prepare("DELETE from Users WHERE id = :id");
    $stmt->bindParam(':id', $id);  // Prevents SQL injection
    $stmt->execute();
}

}
?>
