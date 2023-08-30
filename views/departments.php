
<div class="overflow-x-auto w-3/4 mx-auto flex items-start">
    <table class="table table-zebra">
        <!-- head -->
        <thead>
        <tr>
            <th>Item</th>
            <th>Departments</th>
        </tr>
        </thead>
        <tbody>
        <!-- rows -->
        <?php foreach ($params as $key => $param){ ?>

            <tr>
                <th><?php echo ++$key ?></th>
                <td><?php echo $param->department_name ?></td>
                <td>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>