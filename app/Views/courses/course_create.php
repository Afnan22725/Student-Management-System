<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Course</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('courses/view_courses') ?>">Courses</a></li>
                    <li class="breadcrumb-item active">Add Course</li>
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
                        <h3 class="card-title">Course Information</h3>
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

                    <form method="POST" action="<?= base_url('courses/create_course') ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="course_code">Course Code<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="course_code" id="course_code" 
                                       placeholder="Enter course code (e.g., CS101)" value="<?= set_value('course_code') ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="course_title">Course Title<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="course_title" id="course_title" 
                                       placeholder="Enter course title" value="<?= set_value('course_title') ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="credits">Credits<span class="text-danger"> *</span></label>
                                <input type="number" class="form-control" name="credits" id="credits" 
                                       placeholder="Enter credits" value="<?= set_value('credits') ?>" min="1" max="10" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Add Course
                            </button>
                            <a href="<?= base_url('courses/view_courses') ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
