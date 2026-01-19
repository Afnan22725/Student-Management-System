<div class="row justify-content-center" style="min-height: 100vh;">
    <div class="col-md-8 col-lg-6">
        <div class="card mt-5">
            <div class="card-header">
                <h4>Users' List</h4>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>NIC</th>
                        <th>User Type</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['firstname'] ?></td>
                            <td><?= $user['lastname'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['nic'] ?></td>
                            <td><?= $user['user_type_name'] ?></td>
                            <td><?= $user['user_status']==1?'Active':'Inactive' ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('#table').DataTable();
</script>
