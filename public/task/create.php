<?php use App\Config; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Book</title>
        <?php require_once('public/template/meta.php') ?>
	</head>
    <body>
        <div class="container">
            <h1 class="text-center mt-5">Add Task</h1> 
            <form action="/tasks/store" method="post" class="mx-auto w-50">
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="" class="form-control" required>
                        <?php foreach (Config::STATUS as $key => $value) : ?>
                            <option value="<?php echo $key ?>" ><?php echo $value ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Create" class="btn btn-primary w-100">
                </div>
            </form>
        </div>
    </body>
</html>
