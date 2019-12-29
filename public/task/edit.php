<?php use App\Config; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Book</title>
        <?php require_once('public/template/meta.php') ?>
	</head>
    <body>
        <div class="container">
            <h1 class="text-center mt-5">Edit Task</h1> 
            <form action="/tasks/<?php echo $task['id'] ?>/update" method="post" class="mx-auto w-50">
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="name" class="form-control" value="<?php echo $task['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control" required>
                        <?php foreach (Config::STATUS as $key => $value) : ?>
                            <?php if ($task['status'] == $key): ?>
                                <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                                <option value="<?php echo $key ?>" ><?php echo $value ?></option>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" value="<?php echo $task['start_date'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control" value="<?php echo $task['end_date'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Update" class="btn btn-primary w-100">
                </div>
            </form>
        </div>
    </body>
</html>
