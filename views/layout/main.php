<!doctype html>
<html  data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <title>{{title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.6.2/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://d33wubrfki0l68.cloudfront.net/css/d9b5bc0170410859ddcaea7f3c3a80e070bcbc68/build/tailwind.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="">
    <div class="navbar bg-base-100 bg-success-content">
        <div class="navbar-start">
            <a class="btn btn-ghost normal-case text-xl">Bolbol </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="home">Home</a></li>
                <li><a href="departments">Departments</a></li>
                <li><a href="doctorList">DoctorList</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            <form action="" method="post">
                {{authentication}}
            </form>
        </div>
    </div>
</header>
<main class="mb-12 mt-8"><div class="mx-auto">{{content}}</div></main>
<footer class="footer p-10 bg-base-200 mt-36 text-base-content">
    <div>
        <span class="footer-title">Services</span>
        <a class="link link-hover">Branding</a>
        <a class="link link-hover">Design</a>
        <a class="link link-hover">Marketing</a>
        <a class="link link-hover">Advertisement</a>
    </div>
    <div>
        <span class="footer-title">Company</span>
        <a class="link link-hover">About us</a>
        <a class="link link-hover">Contact</a>
        <a class="link link-hover">Jobs</a>
        <a class="link link-hover">Press kit</a>
    </div>
    <div>
        <span class="footer-title">Legal</span>
        <a class="link link-hover">Terms of use</a>
        <a class="link link-hover">Privacy policy</a>
        <a class="link link-hover">Cookie policy</a>
    </div>
    <div>
        <span class="footer-title">Newsletter</span>
        <div class="form-control w-80">
            <label class="label">
                <span class="label-text">Enter your email address</span>
            </label>
            <div class="relative">
                <input type="text" placeholder="username@site.com" class="input input-bordered w-full pr-16" />
                <button class="btn btn-primary absolute top-0 right-0 rounded-l-none">Subscribe</button>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
</html>