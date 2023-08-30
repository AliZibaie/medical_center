
<div class="overflow-x-auto w-1/2 mx-auto flex items-start">
    <table class="table table-zebra">
        <!-- head -->
        <thead>
        <tr>
            <th>Item</th>
            <th>Related Doctors</th>
            <th>Experience</th>
            <th>Days of Week</th>
            <th>Education</th>
        </tr>
        </thead>
        <tbody>
        <!-- rows -->
        <?php foreach ($params as $key => $param){ ?>

            <tr>
                <th><?php echo ++$key ?></th>
                <td><?php echo $param->full_name ?></td>
                <td><?php echo $param->experience ?></td>
                <td><?php echo $param->work_day ?></td>
                <td><?php echo $param->educational_info ?></td>
                <td>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>