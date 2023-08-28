 <form action="" method="post" enctype="multipart/form-data">
     <div class="flex justify-between items-center">
         <div class="w-1/2">
             <div class="carousel w-full">
                 <div id="item1" class="carousel-item w-full flex justify-center items-center">
                     <img src="/asset/img/01-Nightingale-DaneMarket-min.jpg" class="w-96" />
                 </div>
                 <div id="item2" class="carousel-item w-full  flex justify-center items-center">
                     <img src="/asset/img/01-Nightingale-DaneMarket-min.jpg" class="w-96 " />
                 </div>
                 <div id="item3" class="carousel-item w-full  flex justify-center items-center">
                     <img src="/asset/img/01-Nightingale-DaneMarket-min.jpg" class="w-96 " />
                 </div>
                 <div id="item4" class="carousel-item w-full  flex justify-center items-center">
                     <img src="/asset/img/01-Nightingale-DaneMarket-min.jpg" class="w-96 " />
                 </div>
             </div>
             <div class="flex justify-center w-full py-2 gap-2">
                 <a href="#item1" class="btn btn-xs">1</a>
                 <a href="#item2" class="btn btn-xs">2</a>
                 <a href="#item3" class="btn btn-xs">3</a>
                 <a href="#item4" class="btn btn-xs">4</a>
             </div>
             <div class="mx-auto flex flex-col justify-center items-center mt-12 space-y-4">
                 <div class=" ">
                     <input type="text" placeholder="enter your doctor code" class="input input-bordered input-success w-80 max-w-xs" name="code">
                 </div>
                 <div class=" ">
                     <input type="text" placeholder="rename" class="input input-bordered input-success w-80 max-w-xs" name="name">
                 </div>
                 <div>
                     <textarea class="textarea textarea-success w-80" name="experience" placeholder="tell us about your experience"></textarea>
                 </div>
                 <div>
                     <textarea class="textarea textarea-success w-80" name="bio" placeholder="Bio"></textarea>
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
                         <th>days of the week</th>
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
         <button type="submit" class="btn btn-primary btn-outline flex justify-center items-center w-24 mx-auto">
             Update
         </button>
         <a href="home" class="btn btn-success  flex justify-center items-center w-24 mx-auto">home</a>
     </div>
 </form>
