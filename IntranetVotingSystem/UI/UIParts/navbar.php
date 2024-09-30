<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <?php
            if(isset($_SESSION['AdminRequest'])){
                echo '
                <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php?adminRequest=true" class="nav-link"><i class="fas fa-home"></i>&nbsp; Home</a>
                </li>     
                ';
            }else{
                echo '
                <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link"><i class="fas fa-home"></i>&nbsp; Home</a>
                </li>     
                ';
            }
        ?>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <div class="form-inline ml-3">
        <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" id="search" placeholder="Search" aria-label="Search" autocomplete="off">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="button">
            <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
    </div> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php
        if(isset($_SESSION['UserTypeER'])){
            echo '
            <li class="nav-item dropdown">
                <a class="nav-link" href="IntranetVotingSystem/Manual/eRequest Document.pdf" target="_blank">
                    <i class="far fa-question-circle"></i>
                </a>
            </li>';
            if($_SESSION['AllowMessenger'] == true){
                echo '<li class="nav-item dropdown">
                    <a class="nav-link" href="?chat=true">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-primary navbar-badge" id="message-badge"></span>
                    </a>
                </li>';
            }
            echo '<li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">User Menu</span>';
                    if($_SESSION['AllowUserSettings'] == true){
                        echo '<div class="dropdown-divider"></div>
                        <a href="?settings=true" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> User Settings
                        </a>';
                    }
                    if($_SESSION['AllowUserAccounts'] == true){
                        echo '
                        <div class="dropdown-divider"></div>
                        <a href="?userAccounts=true" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> User Accounts
                        </a>
                        ';
                    }
                    if($_SESSION['AllowActivityLog'] == true){
                        echo '
                        <div class="dropdown-divider"></div>
                        <a href="?activityLog=true" class="dropdown-item">
                            <i class="fas fa-history mr-2"></i> Activity Log
                        </a>';
                        echo '
                        <div class="dropdown-divider"></div>
                        <a href="?statistics=true" class="dropdown-item">
                            <i class="fas fa-chart-pie mr-2"></i> Statistics
                        </a>';
                        echo '
                        <div class="dropdown-divider"></div>
                        <a href="?ratings=true" class="dropdown-item">
                            <i class="fas fa-chart-bar mr-2"></i> Ratings
                        </a>';
                    }
                    if($_SESSION['AllowResetLimit'] == true){
                        echo '<div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#reset">
                            <i class="fas fa-sync mr-2"></i> Reset Limit
                        </a>';
                    }
                    if($_SESSION['AllowUserPrivileges'] == true){
                        echo '
                        <div class="dropdown-divider"></div>
                        <a href="?userPrivileges=true" class="dropdown-item">
                            <i class="fas fa-user-edit mr-2"></i> User Privileges
                        </a>';
                    }
                    if($_SESSION['AllowModeSwitch'] == true){
                        if($_SESSION['Mode'] == 'Live'){
                            echo '
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#maintenance">
                                    <i class="fas fa-hammer mr-2"></i> Maintenance Mode
                                </a>
                            ';
                        }else if($_SESSION['Mode'] == 'Maintenance'){
                            echo '
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#live">
                                    <i class="fas fa-plug mr-2"></i> Live Mode
                                </a>
                            ';
                        }
                    }
                    echo '
                    <div class="dropdown-divider"></div>
                    <a href="#" data-toggle="modal" data-target="#logout" class="dropdown-item dropdown-footer"><i class="fas fa-power-off"></i>&nbsp; Logout</a>
                </div>
            </li>
            ';
        }else{
            echo '
            <li class="nav-item dropdown">
                <a class="nav-link" href="?login=true">
                    <i class="far fa-user"></i>
                </a>
            </li>
            ';
        }
        ?> 
    </ul>
</nav>