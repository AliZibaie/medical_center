
<div class="overflow-x-auto w-3/4 mx-auto flex items-start">
    <table class="table table-zebra">
        <!-- head -->
        <thead>
        <tr>
            <th>Item</th>
            <th>Departments</th>
            <th>Actions</th>
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
                    <input type="hidden" name="departmentAction" value="<?php echo $param->id ?>">
                    <button type="submit" name="deleteDepartment">
                        <iconify-icon  width="26" class="text-red-800" height="26" icon="mdi:delete"></iconify-icon>
                    </button>
                    <button  type="button" onclick="my_modal_<?php   echo 20+$param->id  ?>.showModal()">
                        <iconify-icon width="26" height="26" class="text-yellow-800" icon="fluent:edit-20-filled"></iconify-icon>
                    </button>
                </form>
                <form action="" method="post">
                    <dialog id="my_modal_<?php   echo 20+$param->id  ?>" class="modal modal-bottom sm:modal-middle w-80 h-40  m-auto">
                        <form method="dialog" class="modal-box">
                            <h3 class="font-bold text-lg m-0 p-0 text-green-800">Edit department</h3>
                            <div class="flex items-start justify-between space-x-4">

                                <input type="hidden"  name="editDepartment"   value="<?php echo  10+$param->id  ?> " >
                                <input type="text" name="editted-name" class="input  input-bordered input-accent w-full max-w-xs"   placeholder="enter new name">
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                            </div>
                        </form>
                    </dialog>
                </form>
            </td>
        </tr>
        <?php } ?>

        </tbody>
    </table>
    <button type="button" onclick="my_modal_5.showModal()">
        <iconify-icon width="26" height="26" class="text-green-800" icon="mdi:add-bold"></iconify-icon>
    </button>

    <form action="" method="post">
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle w-80 h-40  m-auto">
            <form method="dialog" class="modal-box">
                <h3 class="font-bold text-lg m-0 p-0 text-green-800">Add new department</h3>
                <div class="flex items-start justify-between space-x-4">
                    <input type="text" class="input  input-bordered input-accent w-full max-w-xs"  name="addDepartment" placeholder="enter new name">
                        <button type="submit" class="btn btn-success">
                            Add
                        </button>
                </div>
            </form>
        </dialog>
    </form>

</div>