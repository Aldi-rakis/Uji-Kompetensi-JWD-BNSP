
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Beasiswa JWD</title>
    <script src="/script.js"></script>
    <style>
      
    </style>
</head>

<body>


   


<section id="home">

<!-- Navbar -->
<nav
        class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="Assets/logo (3).png" class="h-8" alt="Logo">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white max-sm:text-sm">Beasiswa
                    JWD</span>
            </a>
            <div class="flex md:order-2 space-x-2 md:space-x-0 rtl:space-x-reverse">
                <img class="w-10 h-10 rounded-full" src="Assets/avataaars.svg" alt="Rounded avatar">

                <a href="admin/dashboard.php"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Admin
                </a>

                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-start hidden md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-3 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="daftar.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Daftar</a>
                    </li>
                    <li>
                        <a href="hasil.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Hasil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- <img src="bg-atas.jpg" alt=""> -->

<header id="home" class="bg-red-200  max-sm:h-[700px] bg-[url('assets/bg-atas.jpg')] mb-5 grid lg:grid-cols-2 max-md:grid-cols-1 place-items-center">
<!-- Kolom Teks -->
<div data-aos="fade-up"
    data-aos-duration="1000"
    class="ml-[80px] mt-20px]  popins max-md:mt-20px] max-md:ml-[30px] max-md:order-last">
    <h1 class="text-white max-sm:text-md text-7xl max-lg:text-3xl">Make a <b>Dream </b> <br> come True</h1>
    <p class="text-2xl text-white">Kami hadir untuk memberikan layanan sistem informasi
        <br> yang unggul dan terpercaya</p>

    <button class="bg-[#86c127] hover:bg-green-700 mt-5 text-white font-bold py-2 px-4 rounded-md">
        Informasi Selengkapnya
    </button>
</div>

<!-- Kolom Gambar -->
<div data-aos="fade-down"
    data-aos-easing="linear"
    data-aos-duration="800"
    class="max-md:order-first">
    <img class="w-[650px] mr-5 pt-[45px] max-md:w-[350px] max-md:pt-[20px]" src="assets/asset_1.png" alt="">
</div>
</header>

</section>


     <!-- section product -->
     <section id="produk" class=" px-[80px] max-md:pt-[50px] max-lg:px-[0px]">

         <h1 class="text-4xl text-center poppins font-semibold max-md:text-3xl">Produk Kami </h1>
         <p class="text-xl text-center max-lg:text-[16px]">Produk unggulan untuk melengkapi kebutuhan anda</p>

         <div class="grid lg:grid-cols-2 gap-4 "
             data-aos="fade-down"
             data-aos-easing="linear"
             data-aos-duration="800">

             <div class=" justify-center items-center flex max-md:m-auto">
                 <img class="w-[300px]  mt-[20px] max-md:w-[300px]" src="assets/aset2.png">
             </div>

             <div class="p-5 pr-10">
                 <p class="text-xl mt-10 max-md:text-[15px] text-justify">AWH adalah sebuah produk layanan dari PT. Adhikari Inovasi
                     Indonesia yang memberikan kemudahan untuk melakukan
                     publikasi dan promosi melalui media Internet. Saat ini layanan
                     webite dan aplikasi Android semakin banyak digunakan Oleh
                     institusi, organisasi, perusahaan atau bisnis untuk berinteraksi
                     dengan seluruh penggunanya dengan praktis dan mudah
                     dimana saja dan kapan saja.</p>


                 <a href="https://awh.co.id/" target="_blank" class="bg-[#0367b3] hover:bg-blue-700 mt-8 text-white font-semibold py-2 px-4 rounded-lg inline-block">
                     Detail produk
                 </a>

             </div>

         </div>

     </section>



        <script>
            document.getElementById('random-ipk-btn').addEventListener('click', function() {
                // Generate random IPK
                const randomIPK = Math.random() < 0.5 ? 3.4 : 2.9;
                const ipkInput = document.getElementById('ipk-input');
                const programBeasiswa = document.getElementById('program_beasiswa');
                const fileUpload = document.getElementById('file_upload');
                const submitBtn = document.getElementById('submit-btn');

                // Set the generated IPK value
                ipkInput.value = randomIPK;

                // Check if IPK is below 3
                if (randomIPK < 3) {
                    // Disable program beasiswa, file upload, and submit button
                    programBeasiswa.disabled = true;
                    fileUpload.disabled = true;
                    submitBtn.disabled = true;
                } else {
                    // Enable program beasiswa, file upload, and submit button
                    programBeasiswa.disabled = false;
                    fileUpload.disabled = false;
                    submitBtn.disabled = false;
                }
            });
        </script>


</body>

</html>