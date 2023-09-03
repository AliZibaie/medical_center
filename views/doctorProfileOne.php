<div class="overflow-x-auto flex w-1/2 justify-between">
    <table class="table ">
        <!-- head -->
        <thead>
        <tr>
            <th class="" style="width: 200px;">Full name</th>
            <th class="" style="width: 200px;">Expertise</th>
            <th>Experience</th>
            <th class="" style="width: 200px;">Day</th>
            <th class="" style="width: 200px;">Rating</th>
            <th class="" style="width: 200px;">Profile</th>
        </tr>
        </thead>
        <tbody class="">
        <?php foreach ($params as $key => $param){?>
            <tr style="width: 200px;" class="">
                <td>
                    <div class="flex items-center space-x-3 px-0 mx-0 w-16">
                        <div>
                            <div class="font-bold " name="" value="">
                                <?php echo $param->full_name ?>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="" name="expert"><?php echo $param->educational_info ?></div>
                </td>
                <td><?php echo  $param->experience ?></td>
                <th> <?php echo  $param->work_day ?></th>
                <th>
                    <div class="rating">
                        <button type="submit">
                            <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500" />
                        </button>
                        <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500"/>
                        <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500" checked  />
                        <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500" />
                        <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500" />
                    </div>
                </th>
                <th>
                    <form action="" method="post">
                        <input type="hidden" name="doctors-profile" value="<?php echo  $param->id?>">
                        <button type="submit" class="link link-success" >
                            <iconify-icon width="26" height="26" icon="pajamas:profile"></iconify-icon>
                        </button>
                    </form>
                </th>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>