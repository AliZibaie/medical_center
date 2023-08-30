<div class="flex justify-evenly items-start">
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
                            <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500" />
                            <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500"/>
                            <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500" checked  />
                            <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500" />
                            <input type="radio" name="rating-<?php echo $key ?>" class="mask mask-star-2  bg-green-500" />
                        </div>
                    </th>

                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <form action="" method="post">
    <div class="join w-1/4">
        <div>
            <div>
                <input class="input input-bordered join-item" placeholder="Search" name="search">
            </div>
        </div>
        <select class="select select-bordered join-item w-24" name="filter">
            <option disabled selected>Filter</option>
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
            <option value="all">All</option>
        </select>
        <div class="indicator">
            <button class="btn btn-accent btn-outline join-item" type="submit">Search</button>
        </div>
    </div>
    </form>
</div>