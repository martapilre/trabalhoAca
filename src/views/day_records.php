<main class="content">
    <?php
        renderTitle(
            'Register your times',
            'Keep your Records on day!',
            'icofont-check-alt'
        );
        include(TEMPLATE_PATH . "/messages.php");
        ?>
<div class="card">
        <div class="card-header">
            <h3><?= $today ?></h3>
            <p class="mb-0">Today Time Records</p>
            </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entry AM 1: <?= $workingHours->time1 ?? '---' ?></span>
                <span class="record">Exit AM 1: <?= $workingHours->time2 ?? '---' ?></span>
           </div>
           <div class="d-flex m-5 justify-content-around">
                <span class="record">Entry PM 2: <?= $workingHours->time3 ?? '---' ?></span>
                <span class="record">Exit PM 2: <?= $workingHours->time4 ?? '---' ?></span>
           </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="punch.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Punch
            </a>
        </div>
    </div>

    <form class="mt-5" action="punch.php" method="post">
    <div class="input-group no-border">
            <input type="text" name="forcedTime" class="form-control" placeholder="Insert hour here to silumate a punch!">
            <button class="btn btn-danger ml-3">
                Punch Simulator
            </button>
        </div>
    </form>

</main>