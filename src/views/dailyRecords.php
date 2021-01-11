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
        <div class="class-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entry AM 1: <?= $records->time1 ?? '---' ?></span>
                <span class="record">Exit AM 1: <?= $records->time2 ?? '---' ?></span>
           </div>
           <div class="d-flex m-5 justify-content-around">
                <span class="record">Entry PM 2: <?= $records->time3 ?? '---' ?></span>
                <span class="record">Exit PM 2: <?= $records->time4 ?? '---' ?></span>
           </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="#" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Punch
            </a>
        </div>
    </div>
</main>