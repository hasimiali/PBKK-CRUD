<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* Additional custom styling */
        .btn-custom-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-custom-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-custom-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('message'); ?>
                    </div>
                <?php endif ?>

                <a href="<?php echo base_url('crud/create') ?>" class="btn btn-md btn-custom-success mb-3">Add Data</a>
                
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cruds as $key => $data) : ?>
                            <tr>
                                <td><?php echo $data['title'] ?></td>
                                <td><?php echo $data['content'] ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('crud/edit/' . $data['id']) ?>" class="btn btn-sm btn-custom-primary">Edit</a>
                                    <a href="<?php echo base_url('crud/delete/' . $data['id']) ?>" class="btn btn-sm btn-custom-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php echo $pager->links('crud', 'bootstrap_pagination') ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
