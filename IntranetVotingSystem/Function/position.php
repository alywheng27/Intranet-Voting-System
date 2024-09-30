<?php
    class Position{
        function addPosition($dbc1, $position, $order, $count){
            try {
                $query = "INSERT INTO position (Name, Decree, Count)
                VALUES (:position, :order, :count) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':position', $position);
                $pdo->bindParam(':order', $order);
                $pdo->bindParam(':count', $count);
                $pdo->execute();

                $_SESSION['PositionAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updatePosition($dbc1, $updateID, $position, $order, $count){
            try {
                $query = "UPDATE position SET Name = :position, Decree = :order, Count = :count WHERE ID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':position', $position);
                $pdo->bindParam(':order', $order);
                $pdo->bindParam(':count', $count);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['PositionUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deletePosition($dbc1, $deleteID){
            try {
                $query = "DELETE FROM position WHERE ID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['PositionDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $p = new Position();

    if(!isset($_GET['deleteID'])){
        $position = $_POST['position'];
        $order = $_POST['order'];
        $count = $_POST['count'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $p->updatePosition($dbc1, $updateID, $position, $order, $count);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $p->deletePosition($dbc1, $deleteID);
    }else{
        $p->addPosition($dbc1, $position, $order, $count);
    }
    
    header('Location: ?position=true');
?>