<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="day_records.php">
                    <i class="icofont-ui-check mr-2"></i>
                    Punch Here
                    </a>
            </li>
            <li class="nav-item">
                <a href="monthly_report.php">
                    <i class="icofont-ui-calendar mr-2"></i>
                    Monthly Report
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="icofont-chart-histogram mr-2"></i>
                    Human Resources
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="icofont-users mr-2"></i>
                    Users
                </a>
            </li>
        </ul>
    </nav>
    <div class="sidebar-widgets">
        <div class="sidebar-widget">
            <i class="icon icofont-hour-glass text-info"></i>
            <div class="info">
                <span class="main text-info"
                    <?= $activeClock === 'workedInterval' ? 'active-clock' : '' ?>>
                    <?= $workedInterval ?>
                </span>
                <span class="label text-muted">Worked Hours</span>
                </div>
        </div>
        <div class="division my-3"></div>
        <div class="sidebar-widget">
            <i class="icon icofont-ui-alarm text-danger"></i>
            <div class="info">
                <span class="main text-danger"
                    <?= $activeClock === 'exitTime' ? 'active-clock' : '' ?>>
                    <?= $exitTime ?>
                </span>
                <span class="label text-muted">Exit Time</span>
            </div>
        </div>
    </div>
</aside>