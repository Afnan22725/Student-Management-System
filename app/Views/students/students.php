<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Students</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Students</li>
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
                        <h3 class="card-title">Student List</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('students/create_student') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-user-plus"></i> Add New Student
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
                        <table id="studentsTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Registration Number</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Name with Initials</th>
                                    <th>NIC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($students)): ?>
                                    <?php foreach($students as $student): ?>
                                        <tr>
                                            <td><?= $student['student_id'] ?></td>
                                            <td><?= $student['reg_no'] ?></td>
                                            <td><?= $student['first_name'] ?></td>
                                            <td><?= $student['last_name'] ?></td>
                                            <td><?= $student['name_with_initials'] ?></td>
                                            <td><?= $student['nic'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No students found</td>
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
        $('#studentsTable').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        });
    });
</script>
