<form method="post"  id="signupform">
    <div class="container mx-auto my-20 space-y-5 flex flex-col justify-between px-5 py-8 rounded-2xl bg-wood hover:bg-wood2 hover:shadow-2xl border-2 border-black" style="width: 500px;">
        <!-- header title -->
        <div class="header flex justify-center text-3xl text-black">Register Form</div>

        <!-- full name -->
        <div class="input-group flex flex-col space-y-5">
            <label for="username" class="text-2xl text-black">Username</label>
            <input type="text" name="username" id="username" class="border-2 border-gray-500 p-3 rounded-md text-lg focus:text-green-700 focus:outline-blue-700" placeholder="Enter your username">
        </div>
        <!-- password -->
        <div class="input-group flex flex-col space-y-5">
            <label for="password" class="text-2xl text-black ">Password</label>
            <input type="password" name="password" id="password" class="border-2 border-gray-500 p-3 rounded-md text-lg focus:text-green-700 focus:outline-blue-700" placeholder="Enter your password">
        </div>
        <!-- select role-->
        <div class="input-group flex flex-col space-y-5 w-full">
            <select class="select select-success w-full max-w-xs"  name="role" >
                <option  disabled selected class="text-xl text-black " >Pick your role</option>
                <option class="text-xl text-black " value="manager">manager</option>
                <option class="text-xl text-black " value="doctor">doctor</option>
                <option class="text-xl text-black " value="sick">sick</option>
            </select>
        </div>

        <!-- links -->
        <div class="btn-group flex justify-between items-center">
            <button type="submit" class="bg-green-700 text-white py-2 px-6 rounded-full text-xl font-normal hover:bg-green-600 cursor-pointer">Sign Up</button>
            <div class="text-red-700 text-lg hover:text-red-500 cursor-pointer" id="login"><a href="login">already have an account? login here</a></div>
        </div>
        <!-- social media icons -->
        <div class="border 2xl:border-solid border-gray-500"></div>
        <div class="flex justify-between">
            <div class="bg-wood border border-gray-600 rounded-xl px-5 py-1 hover:bg-wood3">
                <iconify-icon width="36" height="36" icon="devicon:facebook"></iconify-icon>
            </div>
            <div class="bg-wood border border-gray-600 rounded-xl px-5 py-1 hover:bg-wood3">
                <iconify-icon width="36" height="36" icon="flat-color-icons:google"></iconify-icon>
            </div>
            <div class="bg-wood border border-gray-600 rounded-xl px-5 py-1 hover:bg-wood3">
                <iconify-icon width="36" height="36" icon="basil:apple-solid"></iconify-icon>
            </div>
            <div class="bg-wood border border-gray-600 rounded-xl px-5 py-1 hover:bg-wood3">
                <iconify-icon width="36" height="36" icon="logos:whatsapp-icon"></iconify-icon>
            </div>
        </div>
    </div>
</form>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    wood: '#EDD59E',
                    subtle_gray:'#EDF1FF',
                    wood2:'#ebd193',
                    wood3:'#e7c87e',
                }
            }
        }
    }
</script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<!--      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/login.js"></script>
<script src='../assets/js/forms_jquery.js'>
</script>