<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- swiper css cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- cdn aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    {{-- cdn icone bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Presto.it</title>
    
</head>
<body class="bodyCus ">
    <x-navbar />
    
    
    <div class="min-vh-100">
        {{ $slot }} 
    </div>
    
    <div class="mt-5">
        <x-footer />
    </div>
    {{-- CDN fontawesome Js --}}
    <script src="https://kit.fontawesome.com/ed7737f13d.js" crossorigin="anonymous"></script>
    <!-- cdn js swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    
    
    
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "cards",
            grabCursor: true,
            
          
            // autoplay
            // autoplay: {
            //     delay: 2500,
            //     disableOnInteraction: false,
            // },
            
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
    
</body>
</html>