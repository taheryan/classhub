<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
    ثبت نام کاربر
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>ثبت نام</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="http://localhost/classhub/public/auth/signup">
                        <!-- CSRF Token -->
                        <?= csrf_field() ?>

                        <!-- First Name Input -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label">نام</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('first_name') ? 'is-invalid' : '' ?>" id="first_name" name="first_name" placeholder="نام خود را وارد کنید" value="<?= old('first_name') ?>" required>
                            <?php if (isset($validation) && $validation->hasError('first_name')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('first_name') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Last Name Input -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label">نام خانوادگی</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('last_name') ? 'is-invalid' : '' ?>" id="last_name" name="last_name" placeholder="نام خانوادگی خود را وارد کنید" value="<?= old('last_name') ?>" required>
                            <?php if (isset($validation) && $validation->hasError('last_name')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('last_name') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Username Input -->
                        <div class="mb-3">
                            <label for="username" class="form-label">نام کاربری</label>
                            <input type="text" class="form-control <?= isset($validation) && $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="نام کاربری خود را وارد کنید" value="<?= old('username') ?>" required>
                            <?php if (isset($validation) && $validation->hasError('username')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">کلمه عبور</label>
                            <input type="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="کلمه عبور خود را وارد کنید" required>
                            <?php if (isset($validation) && $validation->hasError('password')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">تایید کلمه عبور</label>
                            <input type="password" class="form-control <?= isset($validation) && $validation->hasError('confirm_password') ? 'is-invalid' : '' ?>" id="confirm_password" name="confirm_password" placeholder="کلمه عبور خود را دوباره وارد کنید" required>
                            <?php if (isset($validation) && $validation->hasError('confirm_password')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('confirm_password') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Role Selection -->
                        <div class="mb-3">
                            <label for="role" class="form-label">نقش کاربری</label>
                            <select class="form-select <?= isset($validation) && $validation->hasError('role') ? 'is-invalid' : '' ?>" id="role" name="role" required>
                                <option value="دانشجو" <?= old('role') == 'دانشجو' ? 'selected' : '' ?>>دانشجو</option>
                                <option value="مدرس" <?= old('role') == 'مدرس' ? 'selected' : '' ?>>مدرس</option>
                                <option value="کارشناس آموزش" <?= old('role') == 'کارشناس آموزش' ? 'selected' : '' ?>>کارشناس آموزش</option>
                            </select>
                            <?php if (isset($validation) && $validation->hasError('role')): ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('role') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">ثبت نام</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
