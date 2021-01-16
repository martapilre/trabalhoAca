<main class="content">
    <?php
        renderTitle(
            'User register',
            'Create or Update Users',
            'icofont-user'
        );

        include(TEMPLATE_PATH . "/messages.php");
    ?>

    <form action="#" method="post">
        <?php if($id): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Insert name here"
                    class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                    value="<?= $name ?>">
                <div class="invalid-feedback">
                    <?= $errors['name'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="E-mail "
                    class="form-control <?= $errors['email'] ? 'is-invalid' : '' ?>"
                    value="<?= $email ?>">
                <div class="invalid-feedback">
                    <?= $errors['email'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Insert here password "
                    class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?= $errors['password'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="confirm_password">Confirm password</label>
                <input type="password" id="confirm_password" name="confirm_password"
                    placeholder="Confirm password"
                    class="form-control <?= $errors['confirm_password'] ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?= $errors['confirm_password'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date"
                    class="form-control <?= $errors['start_date'] ? 'is-invalid' : '' ?>"
                    value="<?= $start_date ?>">
                <div class="invalid-feedback">
                    <?= $errors['start_date'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" name="end_date"
                    class="form-control <?= $errors['end_date'] ? 'is-invalid' : '' ?>"
                    value="<?= $end_date ?>">
                <div class="invalid-feedback">
                    <?= $errors['end_date'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-mb-2">
                    <label for="is_admin">Is Admin?</label>
                    <input type="checkbox" id="is_admin" name="is_admin"
                        class="form-control form-control-sm <?= $errors['is_admin'] ? 'is-invalid' : '' ?>"
                        <?= $is_admin ? 'checked' : '' ?>>
                <div class="invalid-feedback">
                    <?= $errors['is_admin'] ?>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-info btn-lg">Save</button>
            <a href="/users.php"
                class="btn btn-secondary btn-lg">Cancel</a>
        </div>
    </form>
</main>