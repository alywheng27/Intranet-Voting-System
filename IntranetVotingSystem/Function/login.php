<?php
    class Login extends QueryRepo{
        function loginAdmin($dbc1, $username, $password){
            $query = "SELECT COUNT(*) AS Count, ID, FirstName FROM User 
                WHERE Username = :username AND Password = :password";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':username', $username);
            $pdo->bindParam(':password', $password);
            $pdo->execute();

            $row = $pdo->fetch();

            $_SESSION['name'] = $row['FirstName'];
            $_SESSION['id'] = $row['ID'];

            return $row;
        }

        function loginVoter($dbc1, $username, $password){
            $query = "SELECT COUNT(*) AS Count, ID, Name FROM Voter 
                WHERE IDNumber = :username AND Password = :password AND HasVoted = 0";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':username', $username);
            $pdo->bindParam(':password', $password);
            $pdo->execute();

            $row = $pdo->fetch();

            $_SESSION['name'] = $row['Name'];
            $_SESSION['id'] = $row['ID'];

            return $row;
        }
    }

    $login = new Login();

    if(isset($_SESSION['name']) AND isset($_SESSION['id'])){
        unset($_SESSION['name']);
        unset($_SESSION['id']);
    }

    if(isset($_POST['username']) AND isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $row = $login->loginAdmin($dbc1, $username, $password);

        if($row['Count'] > 0){
            header('Location: ?dashboard=true');
        }else {
            $row = $login->loginVoter($dbc1, $username, $password);

            if($row['Count'] > 0) {
                header('Location: ?ballot=true');
            }else {
                $_SESSION['InvalidCredentials'] = true;
                header('Location: index.php');
            }
        }
    }else {
        $_SESSION['IncompleteCredentials'] = true;
        header('Location: index.php');
    }

    
?>