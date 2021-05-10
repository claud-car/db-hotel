<?php 

    include_once __DIR__.'/../db.php';

    header('Content-type: application/json');

    if(!empty($_GET) && $_GET['id']) {
        $id = $_GET['id'];
        $result=[];

        $stmt = $conn->prepare("SELECT * FROM stanze Where id = ?"); //prepara query
        $stmt->bind_param("i",$id);

        $stmt->execute(); //esegue il codice sequel
        $rows = $stmt->get_result(); //salva in una variabile il risultato
        while($row = $rows->fetch_assoc()) {//mentre cicla i risultati,li trasform in array associativi
            $result[] = $row; //pusha l'array associativo in quello dei risultati
        }

        echo json_encode([
            "response"=> $result,
            "success" => true,
        ]);
    } else {
        $sql = "SELECT * FROM stanze";
        $rows = $conn->query($sql);

        $result=[];

        if($rows && $rows->num_rows > 0) {
            while ($row = $rows->fetch_assoc()){
                $result[] = $row;
            }
        }

        echo json_encode([
            "response"=> $result,
            "success" => true,
        ]);

    }

    $conn->close();

?>