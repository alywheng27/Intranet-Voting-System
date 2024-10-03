<?php
    class User{
        function addUser($dbc1, $firstName, $surname, $username, $password){
            try {
                $query = "INSERT INTO user (FirstName, Surname, Username, Password)
                        VALUES (:firstName, :surname, :username, :password) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':username', $username);
                $pdo->bindParam(':password', $password);
                $pdo->execute();

                $_SESSION['UserAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateUser($dbc1, $updateID, $firstName, $surname, $username, $password){
            try {
                $query = "UPDATE user SET FirstName = :firstName, Surname = :surname, Username = :username, Password = :password WHERE ID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':username', $username);
                $pdo->bindParam(':password', $password);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['UserUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteUser($dbc1, $deleteID){
            try {
                $query = "DELETE FROM user WHERE ID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['UserDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $u = new User();

    if(!isset($_GET['deleteID'])){
        $firstName = $_POST['firstName'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $u->updateUser($dbc1, $updateID, $firstName, $surname, $username, $password);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $u->deleteUser($dbc1, $deleteID);
    }else{
        $u->addUser($dbc1, $firstName, $surname, $username, $password);
    }
    
    header('Location: ?user=true');
?>