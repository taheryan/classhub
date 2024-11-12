<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
    Course Management Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <!-- Title Section -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Dashboard</h2>
            <p class="text-center text-muted">Manage your courses, teachers, and students efficiently</p>
        </div>
    </div>

    <!-- Grid for Courses, Teachers, Students -->
    <div class="row">
        <!-- Courses Section -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Courses</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Active Courses</h6>
                    <ul class="list-group">
                        <?php foreach ($courses as $course): ?>
                            <li class="list-group-item">
                                <strong><?= esc($course['course_name']) ?></strong>
                                <p class="text-muted"><?= esc($course['course_description']) ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?= site_url('courses') ?>" class="btn btn-primary btn-sm mt-3">View All Courses</a>
                </div>
            </div>
        </div>

        <!-- Teachers Section -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Teachers</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Our Teachers</h6>
                    <ul class="list-group">
                        <?php foreach ($teachers as $teacher): ?>
                            <li class="list-group-item">
                                <strong><?= esc($teacher['first_name']) . ' ' . esc($teacher['last_name']) ?></strong>
                                <p class="text-muted"><?= esc($teacher['email']) ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?= site_url('teachers') ?>" class="btn btn-success btn-sm mt-3">View All Teachers</a>
                </div>
            </div>
        </div>

        <!-- Students Section -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Students</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Registered Students</h6>
                    <ul class="list-group">
                        <?php foreach ($students as $student): ?>
                            <li class="list-group-item">
                                <strong><?= esc($student['first_name']) . ' ' . esc($student['last_name']) ?></strong>
                                <p class="text-muted"><?= esc($student['email']) ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?= site_url('students') ?>" class="btn btn-info btn-sm mt-3">View All Students</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
