<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Courses</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Courses</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Course List</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('courses/create_course') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus-circle"></i> Add New Course
                            </a>
                        </div>
                    </div>

                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <table id="coursesTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credits</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($courses)): ?>
                                    <?php foreach($courses as $course): ?>
                                        <tr>
                                            <td><?= $course['course_id'] ?></td>
                                            <td><?= $course['course_code'] ?></td>
                                            <td><?= $course['course_title'] ?></td>
                                            <td><?= $course['credits'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No courses found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#coursesTable').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        });
    });
</script>
