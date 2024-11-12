<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
    نمایش دوره‌ها، اساتید و دانشجویان
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">دوره‌ها، اساتید و دانشجویان</h2>

    <div class="row">
        <!-- Courses Button Grid -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">دوره‌ها</h5>
                    <a href="<?= site_url('courses') ?>" class="btn btn-primary w-100 mb-3">مشاهده دوره‌ها</a>
                    <!-- Example of multiple buttons representing individual courses -->
                    <a href="<?= site_url('courses/1') ?>" class="btn btn-outline-primary w-100 mb-2">دوره 1</a>
                    <a href="<?= site_url('courses/2') ?>" class="btn btn-outline-primary w-100 mb-2">دوره 2</a>
                    <a href="<?= site_url('courses/3') ?>" class="btn btn-outline-primary w-100 mb-2">دوره 3</a>
                </div>
            </div>
        </div>

        <!-- Teachers Button Grid -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">اساتید</h5>
                    <a href="<?= site_url('teachers') ?>" class="btn btn-success w-100 mb-3">مشاهده اساتید</a>
                    <!-- Example of multiple buttons representing individual teachers -->
                    <a href="<?= site_url('teachers/1') ?>" class="btn btn-outline-success w-100 mb-2">استاد 1</a>
                    <a href="<?= site_url('teachers/2') ?>" class="btn btn-outline-success w-100 mb-2">استاد 2</a>
                    <a href="<?= site_url('teachers/3') ?>" class="btn btn-outline-success w-100 mb-2">استاد 3</a>
                </div>
            </div>
        </div>

        <!-- Students Button Grid -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">دانشجویان</h5>
                    <a href="<?= site_url('students') ?>" class="btn btn-warning w-100 mb-3">مشاهده دانشجویان</a>
                    <!-- Example of multiple buttons representing individual students -->
                    <a href="<?= site_url('students/1') ?>" class="btn btn-outline-warning w-100 mb-2">دانشجو 1</a>
                    <a href="<?= site_url('students/2') ?>" class="btn btn-outline-warning w-100 mb-2">دانشجو 2</a>
                    <a href="<?= site_url('students/3') ?>" class="btn btn-outline-warning w-100 mb-2">دانشجو 3</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
