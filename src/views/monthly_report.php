<main class="content">
    <?php
        renderTitle(
            'Monthly Report',
            'Track Your Balance',
            'icofont-ui-calendar'
    );
    ?>
    <div>

    
    <form class="mb-4" action="#" method="post">
			<div class="input-group">
				<?php if($user->is_admin): ?>
					<select name="user" class="custom-select mr-2" placeholder="Select User">
                        <option value="">Select User</option>
                        <?php
                                    foreach($users as $user) {
                                        $selected = $user->id === $selectedUserId ? 'selected' : '';
                                        echo "<option value='{$user->id}' {$selected}>{$user->name}</option>";
                                    }
                                ?>
					</select>
				<?php endif ?>
				<select name="period" class="custom-select" placeholder="Select Period">
					<?php
						foreach($periods as $key => $month) {
							$selected = $key === $selectedPeriod ? 'selected' : '';
							echo "<option value='{$key}' {$selected}>{$month}</option>";
						}
					?>
				</select>
				<button class="btn btn-info ml-2">
					<i class="icofont-search"></i>
				</button>
                <button type="submit" name="export" value="export_pdf" class="btn btn-info ml-2" >
					<i class="icofont-file-pdf"></i>
                </button>
			</div>
		</form>

		<table class="table table-bordered table-striped table-hover">
			<thead>
                <th>Day</th>
                <th>Entry 1</th>
                <th>Exit 1</th>
                <th>Entry 2</th>
                <th>Exit 2</th>
                <th>Balance - 08h/Day</th>
            </thead>
            <tbody>
                <?php foreach ($report as $registry) { ?>
                      <tr>
                        <td><?= formatDateWithLocale($registry->work_date, '%A, %d %B %Y' )?></td>
                        <td><?= $registry->time1 ?></td>
                        <td><?= $registry->time2 ?></td>
                        <td><?= $registry->time3 ?></td>
                        <td><?= $registry->time4 ?></td>
                        <td><?= $registry->getBalance() ?></td>
                      </tr>
                <?php
                }
                ?>
                <tr class="bg-info text-white">
                    <td><strong>Worked Hours</strong></td>
                    <td colspan="3"><strong><?= $sumOfWorkedTime ?></strong></td>
                    <td><strong>Balance</strong></td>
                    <td><strong><?= $sign?> <?= $balance?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
