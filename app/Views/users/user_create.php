<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h4>Add User</h4>
            </div>
            <div class="card-body">
                <form id='user_form' method="POST">

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="firstname">First Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="lastname">Last Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="lastname">NIC<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="nic" id="nic" value="<?= set_value('nic') ?>">

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="email">Email address<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="email">Username<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
                                    <span id="username_error" class="text-danger"></span>

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="user_type">User Type<span class="text-danger"> *</span></label>
                                    <select name="user_type" class="form-control" id="user_type">
                                        <option value=" " selected>Choose...</option>
                                        <?php foreach ($user_types as $types):?>
                                        <option value="<?= $types['user_type_id'] ?>"><?= $types['user_type_name'] ?></option>
                                        <?php endforeach;?>
                                    </select>

                                </div>

                            </div>
                            <div class="col-6">

                                <div class="form-group">

                                    <label for="status">User Status<span class="text-danger"> *</span></label>
                                    <select name="status" class="form-control" id="status">
                                        <option value=" " selected>Choose...</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="password">Password<span class="text-danger"> *</span></label>
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                    <span id="password_error" class="text-danger"></span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Add" />

                </form>
            </div>

        </div>
    </div>
</div>




