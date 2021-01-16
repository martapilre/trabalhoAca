<main class="content">
    <?php
        renderTitle(
            'User register',
            'Keep Users data up to date',
            'icofont-users'
        );

        include(TEMPLATE_PATH . "/messages.php");
    ?>

    <a class="btn btn-lg btn-info mb-3"
        href="save_user.php">New User</a>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th></th>
        </thead>
        <tbody>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->start_date ?></td>
                    <td><?= $user->end_date ?></td>
                <td>
                        <a href="save_user.php?update=<?= $user->id ?>" 
                            class="btn btn-outline-info mr-2">
                            Edit
                        </a>
                        <a href="?delete=<?= $user->id ?>"
                            class="btn btn-outline-danger">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</main>