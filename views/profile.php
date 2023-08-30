<form action="" method="post" enctype="multipart/form-data">
     <div class="flex justify-between items-start">
         <div class="w-1/2">
             <div class="carousel w-full">
                 <?php foreach ($params['profiles'] as $key =>  $param){ ?>
                 <div id="item<?php echo $param->id ?>" class="carousel-item w-full flex justify-center items-center">
                     <img src="<?php echo $param->source_path ?>" class="w-48 mx-auto" />
                 </div>
                 <?php } ?>
             </div>

             <div class="flex justify-center w-full py-2 gap-2">
                 <?php foreach ($params['profiles'] as $key =>  $param){ ?>
                 <a href="#item<?php echo $param->id ?>" class="btn btn-xs"><?php echo ++$key ?></a>
                 <?php } ?>
             </div>

             <div class="mx-auto flex flex-col justify-center items-center mt-12 space-y-4">
                 <select class="select select-success w-full max-w-xs" name="department">
                     <option disabled selected>Pick your department</option>
                     <?php
                     foreach ($params[0] as $department){?>
                     <option value="<?php echo $department->department_name ?>"><?php echo $department->department_name ?></option>

                     <?php }?>
                 </select>
                 <div class=" ">
                     <input type="text" placeholder="rename" class="input input-bordered input-success w-80 max-w-xs" name="name" value="<?php echo $_SESSION['name'] ?>">
                 </div>
                 <div>
                     <input type="text" class="textarea textarea-success w-80" name="experience" value="<?php echo $params['experience']?>" placeholder="tell us about your experience"></input>
                 </div>
                 <div>
                     <input type="text" class="textarea textarea-success w-80"  value="<?php echo $params['edu']?>"  name="bio" placeholder="Bio"></input>
                 </div>
                 <div>
                     <input type="file" class="file-input file-input-bordered file-input-success w-full max-w-xs" name="profile">
                 </div>
             </div>
         </div>
         <div class="w-1/2">
             <div class="mx-auto flex flex-col justify-center items-center mt-12 space-y-4 w-1/2">
                 <table class="table">
                     <!-- head -->
                     <thead>

                     <tr>
                         <th></th>
                         <th class="text-green-700 ">days of the week</th>
                     </tr>
                     </thead>
                     <tbody>
                     <!-- row 1 -->
                     <tr>
                         <th>
                             <label>
                                 <input type="checkbox" class="checkbox  checkbox-success" name="saturday" value="saturday">
                             </label>
                         </th>
                         <th>saturday</th>
                     </tr>
                     <tr>
                         <th>
                             <label>
                                 <input type="checkbox" class="checkbox checkbox-success" name="sunday" value="sunday">
                             </label>
                         </th>
                         <th>sunday</th>
                     </tr>
                     <tr>
                         <th>
                             <label>
                                 <input type="checkbox" class="checkbox checkbox-success"  name="monday" value="monday">
                             </label>
                         </th>
                         <th>monday</th>
                     </tr>
                     <tr>
                         <th>
                             <label>
                                 <input type="checkbox" class="checkbox checkbox-success"  name="tuesday" value="tuesday">
                             </label>
                         </th>
                         <th>tuesday</th>
                     </tr>
                     <tr>
                         <th>
                             <label>
                                 <input type="checkbox" class="checkbox checkbox-success"  name="wednesday" value="wednesday">
                             </label>
                         </th>
                         <th>wednesday</th>
                     </tr>
                     <tr>
                         <th>
                             <label>
                                 <input type="checkbox" class="checkbox checkbox-success" name="thursday" value="thursday">
                             </label>
                         </th>
                         <th>thursday</th>
                     </tr>
                     <tr>
                         <th>
                             <label>
                                 <input type="checkbox" class="checkbox checkbox-success"  name="friday" value="friday">
                             </label>
                         </th>
                         <th>friday</th>
                     </tr>
                     </tbody>
                     <!-- foot -->


                 </table>
             </div>

         </div>
     </div>
     <div class="divider my-8"></div>
     <div class="flex justify-between">
         <div class="flex justify-between mx-auto space-x-3">
             <button type="submit" class="btn btn-primary btn-outline flex justify-center items-center w-24 mx-auto">
                 Update
             </button>
             <button type="submit" class="btn btn-error btn-outline flex justify-center items-center w-24 mx-auto">
                 Delete
             </button>
         </div>
         <a href="home" class="btn btn-success  flex justify-center items-center w-24 mx-auto">home</a>
     </div>
 </form>
