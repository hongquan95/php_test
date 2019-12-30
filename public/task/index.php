<?php use App\Config;?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home Page</title>
        <?php require_once('public/template/meta.php') ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    </head>
	<style>
        th {
            border: 0!important;
        }
    </style>
    <body>
        <div class="container mt-5">
            <?php require_once('public/template/nav.php') ?>
            <table class="table table-striped">
                <tr class="bg-warning">
                    <th>#</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th class="text-left">Action</th>
                </tr>
                <?php foreach ($tasks as $key => $task) : ?>
                <tr>
                    <td class="font-weight-bold"><?php echo $key ?></td>
                    <td><p class="text-info"><?php echo $task['name'] ?></p></td>
                    <td><p class="text-info"><?php echo $task['start_date'] ?></p></td>
                    <td><p class="text-info"><?php echo $task['end_date'] ?></p></td>
                    <td>
                        <span class="badge badge-<?php echo Config::STATUS_LABEL[$task['status']]?>"><?php echo Config::STATUS[$task['status']] ?></span></td>
                    <td class="btn-group text-center">
                        <a class="btn btn-secondary"href="/tasks/<?php echo $task['id'] ?>/edit"><i class="fas fa-edit"></i></a>
                        <a onClick="return confirm('Are you sure?')" class="btn btn-danger" href="/tasks/<?php echo $task['id'] ?>/delete"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <div class="form-group text-center mt-4">
                <a href="/tasks/create" class="btn btn-primary w-50">Add Task</a>
            </div>
        </div>
    </body>
</html>
