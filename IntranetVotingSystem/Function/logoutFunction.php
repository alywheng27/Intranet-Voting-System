<?php
    class Logout extends QueryRepo{
        function goLogout(){
            unset($_SESSION['AdminRequest']);
            unset($_SESSION['receivedList']);
            unset($_SESSION['rejectedList']);

            unset($_SESSION['dateAndTimeER']);
            unset($_SESSION['dateER']);
            unset($_SESSION['timeER']);

            unset($_SESSION['IDNumberER']);
            unset($_SESSION['UsernameER']);
            unset($_SESSION['UserTypeER']);
            unset($_SESSION['UserTypeIDER']);
            unset($_SESSION['IsNew']);
            unset($_SESSION['IsAcceptedER']);
            unset($_SESSION['IsBlockedER']);

            unset($_SESSION['FirstNameER']);
            unset($_SESSION['SurnameER']);

            unset($_SESSION['chatCount']);
            unset($_SESSION['allCount']);
            unset($_SESSION['PrependLimit']);

            unset($_SESSION['RequestNotification']);
            unset($_SESSION['MessageNotification']);

            unset($_SESSION['AllowUserSettings']);
            unset($_SESSION['AllowUserAccounts']);
            unset($_SESSION['AllowActivityLog']);
            unset($_SESSION['AllowModeSwitch']);
            unset($_SESSION['AllowUserPrivileges']);
            unset($_SESSION['AllowResetLimit']);
            unset($_SESSION['AllowMessenger']);
            unset($_SESSION['AllowRequestList']);
            unset($_SESSION['AllowReceivedRequest']);
            unset($_SESSION['AllowRejectedRequest']);
            
            header("Location: index.php");
        }

        function activityLog($dbc1, $idNumber, $name){
            $action = "Logout";
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

    $logout = new Logout();

    $logout->activityLog($dbc1, $_SESSION['IDNumberER'], $_SESSION['FirstNameER']);
    $logout->setToInactiveUser($dbc1, $_SESSION['IDNumberER']);

    $logout->goLogout();
    
?>