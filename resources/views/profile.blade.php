<!-- resources/views/profile.blade.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

@include('components.headertailwind')

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
    <div style="font-family: 'Poppins', sans-serif;" class="bg-[#F2F2F2]">
        <div class="mx-[234px] py-[25px]">
            <div class="flex flex-row gap-[134px]">
                <div class="flex justify-center items-center mb-24">
                    <div class="w-[237px] h-[237px] relative">
                        <img id="img-preview" src="{{ asset('storage/' . $user->image) }}"
                            class="w-[237px] rounded-full h-[237px]" alt="">
                        <label for="image" class="text-white mb-2 rounded-full absolute bottom-2 right-2 space-x-4">
                            <img class="rounded-full" src="images/cam.svg" alt="Change your profile picture">
                        </label>
                        <input id="image" class="rounded-full" type="file" name="image"
                            onchange="loadFile(event)" hidden>
                    </div>

                </div>
                <div class="flex gap-4 flex-col">
                    <div class="flex gap-1 flex-col">
                        <label class="ml-4 font-semibold text-sm text-black" for="Full Name">Full Name</label>
                        <div class="w-[553px] h-[50px] relative">
                            <input type="text" name="name" id="name" value="{{ $user->name }}"
                                class="w-[553px] pr-10 h-[50px] shadow-md pl-4 shadow-black rounded-xl">
                            <img class="absolute bottom-[26%] right-4" src="images/Edit.svg" alt="">
                        </div>
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label class="ml-4 font-semibold text-sm text-black" for="email">Email</label>
                        <div class="w-[553px] h-[50px] relative">
                            <input type="email" name="email" id="email" value="{{ $user->email }}"
                                class="w-[553px] pr-10 h-[50px] shadow-md pl-4 shadow-black rounded-xl">
                            <img class="absolute bottom-[26%] right-4" src="images/Edit.svg" alt="">
                        </div>
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label class="ml-4 font-semibold text-sm text-black" for="nrp">NRP</label>
                        <div class="w-[553px] h-[50px] relative">
                            <input type="text" name="nrp" id="nrp" value="{{ $user->nrp }}"
                                class="w-[553px] pr-10 h-[50px] shadow-md pl-4 shadow-black rounded-xl">
                            <img class="absolute bottom-[26%] right-4" src="images/Edit.svg" alt="">
                        </div>
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label class="ml-4 font-semibold text-sm text-black" for="date">Date of Birth</label>
                        <div class="w-[553px] h-[50px] relative">
                            <input type="date" name="date" id="date" value="{{ $user->date }}"
                                class="w-[553px] pr-4 h-[50px] appearance-none shadow-md text-[##9ca3af] pl-4 shadow-black rounded-xl">
                        </div>
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label class="ml-4 font-semibold text-sm text-black" for="password">Password</label>
                        <div class="w-[553px] h-[50px] relative">
                            <input type="password" name="password" id="password"
                                class="w-[553px] pr-10 h-[50px] shadow-md pl-4 shadow-black rounded-xl">
                            <img class="absolute bottom-[26%] right-4" src="images/Edit.svg" alt="">
                        </div>
                    </div>
                    <div class="flex gap-1 flex-col">
                        <label class="ml-4 font-semibold text-sm text-black"
                            for="password_confirmation">Password</label>
                        <div class="w-[553px] h-[50px] relative">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-[553px] pr-10 h-[50px] shadow-md pl-4 shadow-black rounded-xl">
                            <img class="absolute bottom-[26%] right-4" src="images/Edit.svg" alt="">
                        </div>
                    </div>

                    <div class="flex flex-row justify-center mt-[40px]">
                        <button type="submit"
                            class="w-[193px] flex justify-center font-light items-center text-white rounded-[25px] bg-[#FABB5A] h-[40px]">Update
                            Profil</button>
                    </div>


                </div>

            </div>
        </div>
    </div>
</form>
