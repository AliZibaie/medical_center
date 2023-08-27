<form action="" method="post">

<div class="overflow-x-auto flex justify-between mx-auto" style="width: 1000px;">
    <table class="table ">
        <!-- head -->
        <thead>
        <tr>
            <th class="" style="width: 200px;">Full name</th>
            <th class="" style="width: 200px;">Job</th>
            <th class="" style="width: 200px;">status</th>
            <th class="" style="width: 200px;">Actions</th>
            <th class="" style="width: 200px;">item</th>
        </tr>
        </thead>
        <tbody class="">
        <?php foreach ($params[0] as $key => $param){?>
        <tr style="width: 200px;" class="">
            <td>
                <div class="flex items-center space-x-3 px-0 mx-0 w-16">
                    <div>
                        <div class="font-bold " name="" value=""><?php echo  $param->full_name ?></div>
                    </div>
                </div>
            </td>
            <td>
                <div class="badge badge-ghost badge-sm" name="job"><?php echo $params["job"] ?></div>
            </td>
            <td><?php echo  $param->confirmation_status ? 'confirmed' : 'pending' ?></td>

            <th>
                    <button type="submit" name="reject">
                        <iconify-icon  width="26" class="text-red-800" height="26" icon="mdi:delete"></iconify-icon>
                    </button>
                    <button type="submit" name="accept" value="<?php echo  $param->id?>">
                        <iconify-icon width="26" height="26" class="text-green-800" icon="mdi:add-bold"></iconify-icon>
                    </button>
            </th>
            <td>#<?php echo  ++$key; ?></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</form>
<form action="" method="get">
    <div class="flex justify-center items-center mt-20 space-x-3.5">
        <button type="submit" class="btn btn-outline" name="doctor">doctors</button>
        <button type="submit" class="btn btn-outline" name="manager">managers</button>
<!--        <button type="submit" class="btn btn-outline" name="all">all</button>-->
    </div>
</form>