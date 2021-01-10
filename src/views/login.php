<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets\css\login.css">
    <link rel="stylesheet" type="text/css" href="assets\css\comum.css">
    <link rel="stylesheet" type="text/css" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets\css\icofont.min.css">
    <title>Sistema de Entradas e Saída</title>
</head>

<body>
    <form class="form-login" action="#" method="post">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-light">Entrada</span>
                <span class="font-weight-bold">&</span>
                <span class="font-weight-light">Saida</span>
                <i class="icofont-runner-alt-1 ml-2"></i>
            </div>
            <div class="card-body">
                <?php include(TEMPLATE_PATH . '/messages.php') ?>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email"
                        class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
                        value="<?= $email ?>"
                        placeholder="Insert your e-mail here" autofocus>
                        <div class="invalid-feedback">
                            <?= $errors['email'] ?>
                        </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>"
                        placeholder="Insert your password here">
                        <div class="invalid-feedback">
                            <?= $errors['password'] ?>
                        </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Login</button>
            </div>
        </div>
    </form>
</body>

</html>