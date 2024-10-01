<?php
    class Login extends QueryRepo{
        function loginAdmin($dbc1, $username, $password){
            $query = "SELECT COUNT(*) AS Count FROM User 
                WHERE Username = :username AND Password = :password";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':username', $username);
            $pdo->bindParam(':password', $password);
            $pdo->execute();

            $row = $pdo->fetch();

            return $row;
        }

        function loginVoter($dbc1, $username, $password){
            $query = "SELECT COUNT(*) AS Count FROM Voter 
                WHERE IDNumber = :username AND Password = :password";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':username', $username);
            $pdo->bindParam(':password', $password);
            $pdo->execute();

            $row = $pdo->fetch();

            return $row;
        }
    }

    $login = new Login();

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