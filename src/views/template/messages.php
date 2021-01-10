<?php

$errors = [];

if($exception) {
    $message = [
        //type of information
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    //if was a ValidationException, insert all errors in variable errors
    if(get_class($exception) === 'ValidationException'){
        $errors = $exception->getErrors();
    }
}


$alertType = '';
if($message['type'] ==='error') {
    $alertType = 'danger';
} else {
    $alertType = 'success';
}
?>

<?php if($message): ?>
    <div  role="alert" class="my-3 alert alert-<?= $alertType ?>">
        <?= $message['message'] ?>
    </div>
<?php endif ?>