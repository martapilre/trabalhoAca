<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Puch the Clock</title>
    <style>
        body{
            font-family: Helvetica, sans-serif;
            font-size: 0.7rem;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        thead{
            background-color: #ddd;
            padding: 10px;
        }

        th .footer {
            border-color: white;
            border-style: 0.5px solid;
        }

        th,
        td {
            text-align: left;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Punch the Clock</h1>
    <h3>Monthy Report - <?= formatDateWithLocale($selectedPeriod, '%B %Y')?></h3>
    <br>
    <hr>
    <p>User Name: <?= $users[$selectedUserId-1]->name?></p>
    <p>User E-mail: <?= $users[$selectedUserId-1]->email?></p>
    <br>
    <table class="bordered">
        <thead>
            <tr>
                <th>Day</th>
                <th>Entry 1</th>
                <th>Exit 1</th>
                <th>Entry 2</th>
                <th>Exit 2</th>
                <th>Balance - 08h/Day</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($report as $registry) : ?>
                <tr>
                    <td><?= formatDateWithLocale($registry->work_date, '%A, %d %B %Y') ?></td>
                    <td><?= $registry->time1 ?></td>
                    <td><?= $registry->time2 ?></td>
                    <td><?= $registry->time3 ?></td>
                    <td><?= $registry->time4 ?></td>
                    <td><?= $registry->getBalance() ?></td>
                </tr>
            <?php
            endforeach;
            ?>
            <tr class="footer">
                <td><strong>Worked Hours</strong></td>
                <td colspan="3"><strong><?= getTimeStringFromSeconds($sumOfWorkedTime) ?></strong></td>
                <td><strong>Balance</strong></td>
                <td><strong><?= $sign ?><?= $balance ?></strong></td>
            </tr>
        </tbody>
    </table>
    <br>
    <?php if($user->is_admin){ ?>
    <p>Document created by Admin: <?= $user->name?>,  <?= $user->email?></p>
    <?php } else {?>
    <p>Document created by User</p>
        <?php }?>
</body>

</html>