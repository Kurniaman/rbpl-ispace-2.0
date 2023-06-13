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
    <title>File Page</title>
</head>

<body class="bg-[#ededed]">
    <nav>
        @include('components.headertailwind_pagemateri')
    </nav>



    <div class="py-[50px]">
        <div class="bg-white w-[857px] h-[800px] mx-auto rounded-[20px] pl-[99px] pt-[41px]">
            <h1 class="font-bold text-[32px] text-[#283D70] mb-[14px]">Matematika 1</h1>
            <p class="opacity-50 text-[#142F64] text-[12px] mb-[12px]">Published by {{ $post->owner }}
                {{ $post->created_at }}
            </p>
            <p class="font-bold text-[20px] text-[#283D70] mb-[12px]">{{ $post->file_name }}</p>
            <div
                class="border-solid border-2 border-[#142F64] border-opacity-40 rounded-[16px] w-[88px] h-[20px] mb-[17px]">
                <p class="text-center font-medium text-[10px]">Semester 1</p>
            </div>

            <div>
                <iframe
                    class="mb-[49px] w-[579px] h-[421px] shadow-xl rounded-[31px] border-solid border-2 border-[#142F64]"
                    src="{{ asset('storage/uploads/' . $post->upload_file) }}" alt="materi 1">
                </iframe>
            </div>



            <a id="downloadBtn" href="{{ url('/download/' . $post->id) }}" class="text-white bg-[#68CE93] w-[200px] h-[53.8px] flex items-center justify-center rounded-[25px] ">Download
                Now</a>


        </div>
    </div>

        <!-- alert -->

        <div>
            {{-- <button id="downloadBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
         Download
            </button> --}}

            <script>
                document.getElementById("downloadBtn").addEventListener("click", function() {
                    var alertDiv = document.createElement("div");
                    alertDiv.className =
                        "bg-white rounded-[30px] border-2 border-[#283D70] pl-[37px] text-[#283D70] w-[586px] h-[94px] fixed top-8 right-8 gap-4";

                    var heading = document.createElement("h1");
                    heading.className = "text-[20px] mb-[6px] mt-[11px] font-bold";
                    heading.textContent = "Download";

                    var contentDiv = document.createElement("div");
                    contentDiv.className = "flex flex-row items-center gap-[7px]";

                    var image = document.createElement("img");
                    image.src = "{{ asset('images/logo-download.png') }}";
                    image.alt = "";

                    var message = document.createElement("h1");
                    message.textContent = "“Bilangan Kompleks” telah berhasil diunduh";

                    // var closeButton = document.createElement("button");
                    // closeButton.className = "ml-auto mt-[-50px] p-2 rounded-full hover:bg-gray-200";
                    // closeButton.innerHTML =
                    //     '<svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 1a11 11 0 1 0 11 11A11 11 0 0 0 12 1zm5.9 14.7a1 1 0 0 1-1.4 1.4L12 13.42l-4.5 4.5a1 1 0 1 1-1.4-1.42l4.5-4.5-4.5-4.5a1 1 0 0 1 1.4-1.4l4.5 4.5 4.5-4.5a1 1 0 0 1 1.4 1.4L13.42 12l4.5 4.5z"/></svg>';
                    // closeButton.addEventListener("click", function() {
                    //     alertDiv.remove();
                    // });

                    contentDiv.appendChild(image);
                    contentDiv.appendChild(message);
                    // contentDiv.appendChild(closeButton);

                    alertDiv.appendChild(heading);
                    alertDiv.appendChild(contentDiv);

                    document.body.appendChild(alertDiv);

                    setTimeout(function() {
                        alertDiv.remove();
                    }, 3000);
                });
            </script>
        </div>

        <!-- alert -->

</body>

</html>
