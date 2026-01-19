<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Student Courses</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Student Courses</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        
        <!-- Assign Course Form -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Assign Course to Student</h3>
                    </div>

                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= base_url('courses/student_courses') ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="student_id">Student<span class="text-danger"> *</span></label>
                                        <select name="student_id" class="form-control" id="student_id" required>
                                            <option value="">Choose Student...</option>
                                            <?php if(!empty($students)): ?>
                                                <?php foreach($students as $student): ?>
                                                    <option value="<?= $student['student_id'] ?>">
                                                        <?= $student['reg_no'] ?> - <?= $student['first_name'] ?> <?= $student['last_name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="course_id">Course<span class="text-danger"> *</span></label>
                                        <select name="course_id" class="form-control" id="course_id" required>
                                            <option value="">Choose Course...</option>
                                            <?php if(!empty($courses)): ?>
                                                <?php foreach($courses as $course): ?>
                                                    <option value="<?= $course['course_id'] ?>">
                                                        <?= $course['course_code'] ?> - <?= $course['course_title'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Assign Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Student Courses Table -->
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Student Course Assignments</h3>
                    </div>

                    <div class="card-body">
                        <table id="studentCoursesTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Reg. No.</th>
                                    <th>Student Name</th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($student_courses)): ?>
                                    <?php foreach($student_courses as $sc): ?>
                                        <tr>
                                            <td><?= $sc['reg_no'] ?></td>
                                            <td><?= $sc['first_name'] ?> <?= $sc['last_name'] ?></td>
                                            <td><?= $sc['course_code'] ?></td>
                                            <td><?= $sc['course_title'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No course assignments found</td>
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
        $('#studentCoursesTable').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        });
    });
</script>

                                  