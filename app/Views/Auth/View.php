<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="<?= base_url('js/tailwindConfig.js') ?>"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    main {
      font-family: "Poppins", sans-serif;
    }
  </style>
</head>

<body>
  <main class="h-screen w-full flex justify-center items-center bg-white">
    <section
      class="overflow-hidden flex xl:w-[860px] md:w-[720px] w-[420px] h-[420px] xl:h-[480px] bg-gozi-50 shadow-md rounded-lg">
      <div class="h-full w-1/2 p-4 md:flex flex-col hidden">
        <div class="flex gap-6 items-center">
          <img class="w-14 mix-blend-multiply object-contain image-rendering-crisp"
            style="image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges;"
            src="<?= base_url('assets/img/BKI-orange.jpg'); ?>" alt="BKI-Logo"
          >
          <div class="w-[1px] h-9 bg-gray-400"></div>
          <h3 class="text-4xl text-gray-600 pt-3 max-w-1 tracking-tight leading-4 font-bold">BKI <span class="text-2xl">SKARIGA.</span></h3>
        </div>
        <p class="text-2xl text-gray-600 mt-5 font-semibold uppercase tracking-tight leading-6">
          <!-- Database Alumni Lintas Masa SMK PGRI 3 Malang. -->
        </p>
      </div>
      <div class="h-full md:w-1/2 w-full p-3">
        <div class="w-full h-full bg-white rounded-lg flex flex-col justify-center text-center p-6">
          <h1 class="text-2xl my-2 text-gray-500 font-semibold">Login</h1>
          <form action="<?= base_url('login/localAuth'); ?>" method="post">
            <div class="bg-gozi-50 w-full rounded-md my-2 flex overflow-hidden items-center">
              <label for="username" class="px-3">
                <i class="fa-solid fa-user opacity-30 text-sm"></i>
              </label>
              <input type="text" id="username" name="username" class="bg-transparent placeholder:text-sm py-2.5 w-full outline-none focus:outline-none text-sm text-gray-800" placeholder="Username">
            </div>
            <div class="bg-gozi-50 w-full rounded-md flex overflow-hidden items-center pr-2">
              <label for="password" class="px-3">
                <i class="fa-solid fa-key opacity-30 text-sm"></i>
              </label>
              <input type="password" id="password" name="password" class="bg-transparent placeholder:text-sm py-2.5 w-full outline-none focus:outline-none text-sm text-gray-800" placeholder="Password">
            </div>
            <button type="submit" class="duration-150 bg-gozi-500 hover:bg-gozi-600 text-gozi-50 w-full px-4 py-2 rounded-md my-4">Login</button>
            <div class="relative inline-flex items-center justify-center w-full">
              <hr class="w-full h-px bg-gray-300 border-0">
              <span class="absolute px-2 text-gozi-950 bg-white">or</span>
            </div>
            <a href="<?= $link; ?>" class="flex justify-center duration-150 border-2 bg-gozi-50 hover:bg-gozi-100 w-full px-2 py-1.5 rounded-md my-4 font-medium text-gray-600 text-sm items-center gap-3">
              <div class="">
                <svg width="30px" height="30px" viewBox="0" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg">
                  <path d="M23.75,16A7.7446,7.7446,0,0,1,8.7177,18.6259L4.2849,22.1721A13.244,13.244,0,0,0,29.25,16" fill="#00ac47" />
                  <path d="M23.75,16a7.7387,7.7387,0,0,1-3.2516,6.2987l4.3824,3.5059A13.2042,13.2042,0,0,0,29.25,16" fill="#4285f4" />
                  <path d="M8.25,16a7.698,7.698,0,0,1,.4677-2.6259L4.2849,9.8279a13.177,13.177,0,0,0,0,12.3442l4.4328-3.5462A7.698,7.698,0,0,1,8.25,16Z" fill="#ffba00" />
                  <polygon fill="#2ab2db" points="8.718 13.374 8.718 13.374 8.718 13.374 8.718 13.374" />
                  <path d="M16,8.25a7.699,7.699,0,0,1,4.558,1.4958l4.06-3.7893A13.2152,13.2152,0,0,0,4.2849,9.8279l4.4328,3.5462A7.756,7.756,0,0,1,16,8.25Z" fill="#ea4435" />
                  <polygon fill="#2ab2db" points="8.718 18.626 8.718 18.626 8.718 18.626 8.718 18.626" />
                  <path d="M29.25,15v1L27,19.5H16.5V14H28.25A1,1,0,0,1,29.25,15Z" fill="#4285f4" />
                </svg>
              </div>
              <p>Continue With Google</p>
            </a>
          </form>
        </div>
      </div>
    </section>
  </main>
</body>

</html>