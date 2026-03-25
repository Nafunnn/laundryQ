<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-lg font-bold">LaundryQ</a>
            <div class="space-x-4">
                <a href="#" class="text-white">Home</a>
                <a href="#" class="text-white">Services</a>
                <a href="#" class="text-white">About</a>
                <a href="#" class="text-white">Contact</a>
            </div>
        </div>
    </nav>

    <section class="py-28 bg-blue-100 relative">
        <div class="container mx-auto text-center">
            <h1 class="text-8xl font-bold text-gray-800 transform scale-x-95">
                <span class="bg-blue-500 px-3 py-1 text-white">LaundryQ</span>
                Made Easy
            </h1>
            <br>
            <p class="mt-4 font-semibold text-xl spacing-2 tracking-wide">
                Effortless laundry, fresh clothes-<span class="bg-blue-500 px-2 py-1 text-white">delivered to you
                    door</span>.<br><br>
                Ready to
                <span class="mx-2 bg-blue-500 px-3 py-1 text-white inline-block rotate-15">
                    simplify
                </span>
                your life?
            </p>
        </div>
        <img src="{{ asset('svg/buble-remove.png') }}" width="120" height="120" class="absolute top-20 right-100"
            alt="bubble">
        <img src="{{ asset('svg/buble-remove.png') }}" width="120" height="120" class="absolute bottom-30 left-100"
            alt="bubble">
    </section>


    <section class="bg-cover bg-center ">
        <div class="bg-blue-500 text-white py-12">

            <div class="max-w-6xl mx-auto px-6">

                <div class="text-center mb-10">
                    <h2 class="text-5xl font-bold"><span class="bg-white px-2 py-1 text-black">Clean</span> and Fresh
                        Laundry</h2>
                    <p class="mt-4 pt-2 text-lg italic">Experience the <span
                            class="bg-white px-2 py-1 text-black font-medium "> convenience </span> of LaundryQ.</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-0">
                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg">

                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg">

                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg">

                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">

                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">

                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">
                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">
                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">
                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">
                    <img class="w-full h-40 object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">
                </div>
            </div>
        </div>
    </section>
    <section class="py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Our Services</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-xl font-semibold">Wash & Fold</h3>
                    <br>
                    <img class="w-full h-80 rounded-sm object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">
                    <p class="mt-2 text-gray-600">Quick and efficient wash and fold service.</p>
                </div>
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-xl font-semibold">Dry Cleaning</h3>
                    <br>
                    <img class="w-full h-80 rounded-sm object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">
                    <p class="mt-2 text-gray-600">Professional dry cleaning for all your garments.</p>
                </div>
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-xl font-semibold">Ironing</h3>
                    <br>
                    <img class="w-full h-80 rounded-sm object-cover"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg">
                    <p class="mt-2 text-gray-600">Perfectly pressed clothes, every time.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="py-12 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Why Choose LaundryQ?</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-xl font-semibold">Convenience</h3>
                    <p class="mt-2 text-gray-600">Pick-up and delivery services at your doorstep.</p>
                </div>
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-xl font-semibold">Quality</h3>
                    <p class="mt-2 text-gray-600">We use the best products and techniques for superior results.</p>
                </div>
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-xl font-semibold">Affordability</h3>
                    <p class="mt-2 text-gray-600">Competitive pricing without compromising on quality.</p>
                </div>
            </div>
        </div>
    </section>

    @include('layout.footer')

</body>

</html>
