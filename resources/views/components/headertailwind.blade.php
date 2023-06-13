<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/cormorant-2" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <!-- CDN Tailwind-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- dropdown menu -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <title>Our Service</title>
    <style>
        body {
            width: 100%;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        .swiper-button-disabled {
            cursor: not-allowed;
            opacity: 0.5;
        }

        .swiper-button-next-unique .fa-solid .swiper-button-disabled,
        .swiper-button-prev-unique .fa-solid .swiper-button-disabled {
            color: #DADADA;

        }
    </style>
</head>



<body class=" ">
    <header
        class="border-b md:flex md:items-center md:justify-between  shadow-lg py-[25px] h-[80px] bg-[#283D70] pl-[134px] pr-[33px]">

        <!-- Logo text or image -->
        <div class="flex items-center justify-between mb-4 md:mb-0">
            <a class="" href="{{ route('home') }}">
                <img class="" src="{{ asset('/images/logonavbar.png ') }}">
            </a>

            <a class="text-black hover:text-orange md:hidden" href="#">
                <i class="fa fa-2x fa-bars"></i>
            </a>
        </div>
        <!-- END Logo text or image -->

        <!-- Search field -->

        <div
            class="flex flex-row bg-[#FFFFFF] border-2  p-2 rounded-lg  mb-4 w-[449px] md:mb-0 md:w-[449px] h-[40px] relative ">
            <img src="{{ asset('/images/search.png ') }}" class=" w-[15.7px] h-[15.7px]  relative" alt="">
            <form class="">
                <input class="bg-transparent w-[449px] h-[40px] rounded-lg absolute ml-[-23px] mt-[-10.5px] pl-[35px]"
                    placeholder="What lesson do you want to find?" type="text">
            </form>
        </div>
        <!-- END Search field -->

        <!-- User menu dropdown -->
        <nav>
            <div x-data="{ open: false }" class="relative">
                <div @click="open = !open" class="py-2 px-4 rounded inline-flex items-center cursor-pointer">
                    @if ($user->image && $user->image !== 'user.png')
                        <img id="img-preview" src="{{ asset('storage/' . $user->image) }}"
                            class="w-[40px] rounded-full h-[40px]" alt="">
                    @else
                        <div class="bg-[#FFFFFF] w-[40px] h-[40px] rounded-full"></div>
                    @endif
                    <svg x-show="!open" class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20 "
                        fill="#FABB5A">
                        <path fill-rule="evenodd"
                            d="M7.293 7.293a1 1 0 0 1 1.414 0L10 8.586l1.293-1.293a1 1 0 1 1 1.414 1.414l-2 2a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 0-1.414z" />
                    </svg>
                    <svg x-show="open" class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="#FABB5A">
                        <path fill-rule="evenodd"
                            d="M10 12.586l-1.293 1.293a1 1 0 0 1-1.414-1.414l2-2a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1-1.414 1.414L10 12.586z" />
                    </svg>
                </div>

                <ul x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 py-2 w-48 bg-white rounded shadow-xl z-10">
                    <li><a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a></li>

                    <a class="block px-4 py-2 text-gray-800 hover:bg-gray-200" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>

            </li>
            </ul>
            </div>
        </nav>
        <!-- END User menu dropdown -->

    </header>
</body>

</html>
