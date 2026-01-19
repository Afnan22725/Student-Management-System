<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Student</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('students/view_students') ?>">Students</a></li>
                    <li class="breadcrumb-item active">Add Student</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student Information</h3>
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

                    <form method="POST" action="<?= base_url('students/create_student') ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="reg_no">Registration Number<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="reg_no" id="reg_no" 
                                       placeholder="Enter registration number" value="<?= set_value('reg_no') ?>" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" 
                                               placeholder="Enter first name" value="<?= set_value('first_name') ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" 
                                               placeholder="Enter last name" value="<?= set_value('last_name') ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name_with_initials">Name with Initials<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="name_with_initials" id="name_with_initials" 
                                       placeholder="Enter name with initials (e.g., K.A.B. Silva)" value="<?= set_value('name_with_initials') ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="nic">NIC Number<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="nic" id="nic" 
                                       placeholder="Enter NIC number" value="<?= set_value('nic') ?>" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Add Student
                            </button>
                            <a href="<?= base_url('students/view_students') ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
