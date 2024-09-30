<?php
    class Login extends QueryRepo{
        function Gologin($dbc1, $dbc2, $username){
            $query = "SELECT * FROM UserAccount 
                JOIN UserType ON UserAccount.UserTypeID = UserType.UserTypeID
                WHERE Username = :username ";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':username', $username);
            $pdo->execute();

            $row = $pdo->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        function getPrivileges($dbc1, $userTypeID){
            $query = "SELECT * FROM UserPrivilege 
                WHERE UserTypeID = :userTypeID ";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':userTypeID', $userTypeID);
            $pdo->execute();

            $row = $pdo->fetch(PDO::FETCH_ASSOC);

            return $row;
    }

        function activityLog($dbc1, $idNumber, $name){
            $action = "Login";
            $date = $_SESSION['dateER'];
            $time = $_SESSION['timeER'];
            $remarks = "$name $action at $date $time";

            $query = "INSERT INTO UserAction
            (IDNumber, Action, Date, Time, Remarks) VALUES
            (:idNumber, :action, :date, :time, :remarks) ";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':idNumber', $idNumber);
            $pdo->bindParam(':action', $action);
            $pdo->bindParam(':date', $date);
            $pdo->bindParam(':time', $time);
            $pdo->bindParam(':remarks', $remarks);
            $pdo->execute();
        }

    }

    $login = new Login();

    if(isset($_POST['username']) AND isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = strtolower($username);
        $password = strtolower($password);

        $row = $login->Gologin($dbc1, $dbc2, $username);

        $key = $login->key();
        $encryptedPassword = $username.$password.$key;

        if(password_verify($encryptedPassword, $row['Password'])){
            if($row['IsAccepted'] == True){
                if($row['IsBlocked'] == False){
                    $_SESSION['IDNumberER'] = $row['IDNumber'];
                    $_SESSION['UsernameER'] = $row['Username'];
                    $_SESSION['UserTypeER'] = $row['UserType'];
                    $_SESSION['UserTypeIDER'] = $row['UserTypeID'];
                    $_SESSION['IsNew'] = $row['IsNew'];
                    $_SESSION['IsAcceptedER'] = $row['IsAccepted'];
                    $_SESSION['IsBlockedER'] = $row['IsAccepted'];

                    $query = "SELECT FirstName, Surname FROM Employees 
                        WHERE EmployeeID = :employeeID ";
                    $pdo = $dbc2->prepare($query);
                    $pdo->bindParam(':employeeID', $row['IDNumber']);
                    $pdo->execute();
        
                    $row2 = $pdo->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['FirstNameER'] = $row2['FirstName'];
                    $_SESSION['SurnameER'] = $row2['Surname'];

                    $row3 = $login->getPrivileges($dbc1, $row['UserTypeID']);

                    $_SESSION['AllowUserSettings'] = $row3['AllowUserSettings'];
                    $_SESSION['AllowUserAccounts'] = $row3['AllowUserAccounts'];
                    $_SESSION['AllowActivityLog'] = $row3['AllowActivityLog'];
                    $_SESSION['AllowModeSwitch'] = $row3['AllowModeSwitch'];
                    $_SESSION['AllowUserPrivileges'] = $row3['AllowUserPrivileges'];
                    $_SESSION['AllowResetLimit'] = $row3['AllowResetLimit'];
                    $_SESSION['AllowMessenger'] = $row3['AllowMessenger'];
                    $_SESSION['AllowRequestList'] = $row3['AllowRequestList'];
                    $_SESSION['AllowReceivedRequest'] = $row3['AllowReceivedRequest'];
                    $_SESSION['AllowRejectedRequest'] = $row3['AllowRejectedRequest'];

                    $login->activityLog($dbc1, $_SESSION['IDNumberER'], $_SESSION['FirstNameER']);
        
                    if($_SESSION['IsNew'] != true){
                        if($_SESSION['Mode'] == 'Maintenance' AND $_SESSION['UserTypeER'] != 'Developer'){
                            header('Location: ?maintenance=true');
                        }else if($_SESSION['UserTypeER'] == 'Processor' || $_SESSION['UserTypeER'] == 'Developer' || $_SESSION['UserTypeER'] == 'Admin'){
                            header('Location: ?adminRequest=true'.$_SESSION['AllowUserSettings']);
                        }
                        // else if($_SESSION['UserTypeER'] == 'Admin'){
                        //     header('Location: index.php');
                        // }
                        
                        $login->setToActiveUser($dbc1, $_SESSION['IDNumberER']);
                    }else{
                        header('Location: ?initialChangePassword=true');
                    }
                }else{
                    $_SESSION['BlockedUserER'] = true;
                    header('Location: index.php?login=true');
                }
            }else{
                $_SESSION['UnacceptedUserER'] = true;
                header('Location: index.php?login=true');
            }
        }else{
            $_SESSION['ErrorPasswordER'] = true;
            header('Location: index.php?login=true');
        }
        
    }

?>