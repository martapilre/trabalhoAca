<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Punch the Clock</title>
</head>

<body>
    <header class="header">
        <div class="logo">
                <span>Punch the</span>
                <i class="icofont-stopwatch mx-2"></i>
        </div>
        <div class="menu-toggle mx-1">
            <i class="icofont-navigation-menu"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <img class="avatar" 
                    src="<?= "http://www.gravatar.com/avatar.php?gravatar_id=" . md5(strtolower(trim($_SESSION['user']->email))) ?>" alt="user">
                <span class="ml-3">
                    <?= $_SESSION['user']->name ?>
                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout mr-2"></i>
                            Exit
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>