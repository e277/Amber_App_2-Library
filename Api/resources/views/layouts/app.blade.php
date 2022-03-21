<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }
        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
    @livewireStyles
</head>
<body>

    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex justify-between flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">Stony Hill Library</span>
            </a>
            @auth
                <nav x-data="{ tab: 'books' }" class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
                    <a :class="{ 'active': tab === 'books' }" x-on:click.prevent="tab = 'books' " href="#" class="modal-open mr-5 hover:text-gray-900">Book</a>
                    <a :class="{ 'active': tab === 'loans' }" x-on:click.prevent="tab = 'loans' " href="#" class="mr-5 hover:text-gray-900">Member</a>
                    <a :class="{ 'active': tab === 'members' }" x-on:click.prevent="tab = 'members' " href="#" class="mr-5 hover:text-gray-900">Loan</a>
                </nav>
                <livewire:logout-user />
            @endauth

            @guest
                <a
                    class="inline-block px-4 py-2 border border-blue-300 text-blue-900 hover:bg-blue-400 hover:text-white transition-all rounded-md"
                    href="{{ route('login') }}">
                    Login
                </a>   
            @endguest
        </div>
      </header>
    
    @yield('content')

    @livewireScripts
</body>
</html>