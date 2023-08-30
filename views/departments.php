
<div class="overflow-x-auto w-1/2 mx-auto flex items-start">
    <table class="table table-zebra">
        <!-- head -->
        <thead>
        <tr>
            <th>Item</th>
            <th>Departments</th>
            <th></th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        <!-- rows -->
        <?php foreach ($params as $key => $param){ ?>

            <tr>
                <th><?php echo ++$key ?></th>
                <td><?php echo $param->department_name ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden"name="departmentDoctors" value="<?php echo $param->id?>">
                        <button type="submit" class="link link-success" >
                            show related doctors

                        </button>
                    </form>
                </td>
                <td><?php echo $param->created_at ?></td>
                <td>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>