<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>File Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/filepage.css') }}">
    

</head>

<body style="background-color: #F2F2F2">
    @extends('components.header')
    @section('content')
    <div style="width: 857px;height: 800px; background-color: white" class="mx-auto rounded-5">
        <div class="studoc-4 screen">

            <div class="main" style="padding-left: 99px;padding-top: 41px">
                <h1 class="title" style="font-weight: bold;font-size: 32px;color: #283D70">Matematika 1</h1>
                <p class="owner opacity-50" style="color: #142F64">Published by {{Auth::user()->name}} {{$post->created_at}}</p>
                <div class="name " style="font-weight: bold;font-size: 20px;color: #283D70">{{$post->file_name}}</div>
                <div class="border border-2 border-black rounded-4"
                    style="width: 88px;height: 20px;margin-top: 12px;margin-bottom: 17px;">
                    <p class="text-center font-medium " style="font-size: 10px">Semester 1</p>
                </div>

                <img class="materi" src="{{ asset('storage/app/'.$post->upload_file) }}" alt="materi 1" style="width: 579px;height: 421px;">
                <div class="group-download" style="">
                    <a class="btn rounded-5 d-flex align-items-center justify-content-center"
                        style="width: 250px;height: 50px;background-color:#68CE93; color: #ffff;margin-top: 49px">Download
                        Now</a>
                </div>
            </div>

        </div>
    </div>

    @endsection
</body>

</html>
