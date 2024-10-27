<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
      main {
        font-family: "Poppins", sans-serif;
      }
    </style>
  </head>
  <body>
    <main class="h-screen w-full flex justify-center items-center bg-[#F4EAE0]">
      <section
        class="overflow-hidden flex xl:w-[860px] md:w-[720px] w-[420px] h-[420px] xl:h-[480px] bg-[#F4DFC8] shadow-md rounded-lg"
      >
        <div class="h-full w-1/2 p-4 md:flex flex-col justify-between hidden">
          <p class="text-xl font-semibold uppercase tracking-tight">
            Database Alumni Lintas Masa SMK PGRI 3 Malang.
          </p>
          <h3 class="text-5xl font-bold max-w-1 tracking-tight leading-7">BKI <span class="text-3xl">SKARIGA.</span></h3>
        </div>
        <div class="h-full md:w-1/2 w-full p-3">
            <div class="w-full h-full bg-black rounded-lg flex flex-col justify-center text-center p-6">
                <h1 class="text-[#F4DFC8] text-2xl my-2 font-semibold">Login</h1>
                <form action="">
                    <div class="bg-[#F4EAE0] w-full rounded-md my-2 flex overflow-hidden items-center">
                        <label for="username" class="px-3">
                            <i class="fa-solid fa-user opacity-30 text-sm"></i>
                        </label>
                        <input type="text" id="username" name="username" class="bg-transparent placeholder:text-sm py-2.5 w-full outline-none focus:outline-none text-sm" placeholder="Username">
                    </div>
                    <div class="bg-[#F4EAE0] w-full rounded-md flex overflow-hidden items-center pr-2">
                        <label for="password" class="px-3">
                            <i class="fa-solid fa-key opacity-30 text-sm"></i>
                        </label>
                        <input type="password" id="password" name="password" class="bg-transparent placeholder:text-sm py-2.5 w-full outline-none focus:outline-none text-sm" placeholder="Password">
                    </div>
                    <button type="Submit" class="duration-150 bg-[#F4DFC8] hover:bg-[#FAF6F0] w-full px-4 py-2 rounded-md my-4">Login</button>
                  </form>
                  <div class="relative inline-flex items-center justify-center w-full">
                    <hr class="w-full h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <span class="absolute px-3 text-[#F4DFC8] bg-black">or</span>
                  </div>
                  <button class="flex justify-center duration-150 bg-[#FAF6F0] hover:bg-[#F4DFC8] w-full px-2 py-2 rounded-md my-4 text-sm items-center gap-2">
                    <div class="text-[#F4DFC8] bg-black px-2 py-1 rounded-md">
                      <i class="fa-brands fa-google"></i>
                    </div>
                    <p>Continue With Google</p>
                  </button>
            </div>
        </div>
      </section>
    </main>
  </body>
</html>
