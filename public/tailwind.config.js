/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./index.php",
    "../views/layout/main.php",
    "../views/404.php",
    "../views/ourDoctors.php",
    "./dist/output.css",
    "./*.php"
  ],
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

