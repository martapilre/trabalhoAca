<main class="content">
    <?php
        renderTitle(
            'Manager',
            'Summary - Hours worked by Users',
            'icofont-chart-histogram'
        );
    ?>
 <div class="summary-boxes">
        <div class="summary-box bg-info">
            <i class="icon icofont-users"></i>
            <p class="title">Number of Users</p>
            <h3 class="value"><?= $activeUsersCount ?></h3>
        </div>
        <div class="summary-box bg-danger">
            <i class="icon icofont-close"></i>
            <p class="title">Faults</p>
            <h3 class="value"><?= count($absentUsers) ?></h3>
        </div>
        <div class="summary-box bg-success">
            <i class="icon icofont-clock-time"></i>
            <p class="title">Hours in Month</p>
            <h3 class="value"><?= $hoursInMonth ?></h3>
        </div>
    </div>

    <?php if(count($absentUsers) > 0): ?>
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Users who are missing work</h4>
                <p class="card-category mb-0">List of Users who have not Punch Me yet</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <th>Name</th>
                    </thead>
                    <tbody>
                        <?php foreach($absentUsers as $name): ?>
                            <tr>
                                <td><?= $name ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>
</main>