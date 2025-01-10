<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> Frontdesk</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
            rel="stylesheet">
        @livewireStyles
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="font-sans antialiased dark:text-white/50">

        <header class="bg-gradient-to-r from-blue-600 to-blue-400 text-white px-5 lg:px-44 pt-5 pb-28">

            <div class="flex justify-between items-baseline">
                <div>
                    <h1 class="text-3xl font-semibold">Frontdesk</h1>
                </div>

                <div class="lg:hidden block relative" x-data="{ open: false }">
                    <div>
                        <button x-show="! open" @click="open = !open">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>


                    </div>

                    <div x-show="open"
                        class="fixed w-full h-full bg-gradient-to-r from-blue-600 to-zinc-400 inset-0 z-10 py-5 px-10">
                        <button @click="open = !open" class="float-right">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <div class="mt-20 flex flex-col gap-y-4">
                            <a href="#" class="hover:underline">Dashboard</a>
                            <a href="#" class="hover:underline">Features</a>
                            <a href="#" class="hover:underline">How it Works</a>
                            <a href="#" class="hover:underline">Pricing</a>
                            <a href="#" class="hover:underline">Contact</a>
                            <button class="py-2 px-7 border-white border-2 rounded-md hover:underline">Log
                                In</button>
                        </div>
                    </div>
                </div>


                <div class="hidden lg:block font-normal text-base space-x-4">
                    <a href="#" class="hover:underline">Dashboard</a>
                    <a href="#" class="hover:underline">Features</a>
                    <a href="#" class="hover:underline">How it Works</a>
                    <a href="#" class="hover:underline">Pricing</a>
                    <a href="#" class="hover:underline">Contact</a>
                    <button class="py-2 px-7 border-white border-2 rounded-md hover:underline">Log In</button>
                    {{-- <a href="#" class="hover:underline">Pre-register</a>
                    <a href="#" class="hover:underline">Checkin</a>
                    <a href="#" class="hover:underline">Login</a>
                    <a href="#" class="hover:underline">Sign Up</a> --}}
                </div>
            </div>

            <div class="lg:px-20 curve-bottom">
                <div class="mt-32 space-y-5">
                    <h1 class="font-base text-4xl"> Welcome to the modern <br> Visitor management.
                    </h1>

                    <h4 class="text-md">Welcome your visitors with friendly sign-in and a smart security system.</h4>

                    <button
                        class="font-semibold py-2 px-7 tracking-wide text-md bg-gradient-to-r from-blue-900 to-blue-800 border-white border-2 rounded-md">
                        GET STARTED
                    </button>
                </div>
            </div>

        </header>
        <main class="">

            <div class="space-y-10 text-center bg-zinc-100 px-5 py-20  lg:px-44">
                <div>
                    <h1 class="text-blue-400 font-semibold text-xl">How It Works</h1>
                    <p class="text-zinc-800 font-base text-lg">
                        Our iPad app allows your visitors to check in themselves so you can focus on giving them a
                        friendly
                        welcome. You can start tracking all visitor entries digitally and throw away the paper book
                        on
                        your
                        desk.
                    </p>
                </div>

                <div>
                    <h1 class="text-blue-400 font-semibold text-xl"> Visitor Sign-In </h1>
                    <p class="text-zinc-800 font-base text-lg"> When a visitor arrives, they'll enter their
                        information
                        on
                        the iPad, if required sign NDA and
                        collect their visitor badge. </p>
                </div>

                <div>
                    <h1 class="text-blue-400 font-semibold text-xl"> Host Gets Notified </h1>
                    <p class="text-zinc-800 font-base text-lg"> Sequr automatically notifies your employee when
                        their
                        guest
                        arrives by Slack, email, SMS, or mobile
                        app
                        notification. </p>
                </div>

                <div>
                    <h1 class="text-blue-400 font-semibold text-xl"> Host Greets Their Guest </h1>
                    <p class="text-zinc-800 font-base text-lg">Host knows who to meet and gives a friendly welcome
                        to
                        their
                        guests.</p>
                </div>
            </div>


            <div class="">
                <div class=" bg-zinc-200 px-5 py-20 lg:px-44 flex flex-col lg:flex-row gap-y-20 lg:gap-y-20">
                    <div class="space-y-7 text-center lg:text-left">
                        <h1 class="text-blue-500 font-base text-2xl">Integrates with the <br> tools you use</h1>
                        <p class=" text-zinc-800 font-base text-md text-justify md:text-center lg:text-left">
                            Frontdesk integrates seamlessly into your existing workflows, making it easy toset up and
                            manage.</p>
                        <div class=" h-[0.4px] bg-zinc-400"></div>
                        <p class="text-blue-500 space-x-10">
                            <a href="#"> <span>Discover more features</span>
                                <span>→</span></a>
                        </p>
                    </div>

                    <!-- Companies Logo  -->
                    <div class="flex justify-between items-center w-full">
                        <div class="flex flex-col gap-y-5 items-center justify-center h-full w-full gap-x-5">
                            <div id="okta"
                                class="transform translate-x-16 translate-y-8 lg:translate-x-28 lg:translate-y-10 bg-white w-20 h-20 shadow-xl flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100"
                                    xml:space="preserve" y="0" x="0" id="Layer_1" version="1.1"
                                    viewBox="-60 -33.675 520 202.05">
                                    <style id="style16989" type="text/css">
                                        .st0 {
                                            fill: #007dc1
                                        }
                                    </style>
                                    <g id="g17005">
                                        <g id="g16999">
                                            <g id="g16993">
                                                <path id="path16991"
                                                    d="M50.3 33.8C22.5 33.8 0 56.3 0 84.1c0 27.8 22.5 50.3 50.3 50.3 27.8 0 50.3-22.5 50.3-50.3 0-27.8-22.5-50.3-50.3-50.3zm0 75.5c-13.9 0-25.2-11.3-25.2-25.2 0-13.9 11.3-25.2 25.2-25.2 13.9 0 25.2 11.3 25.2 25.2 0 13.9-11.3 25.2-25.2 25.2z"
                                                    class="st0" />
                                            </g>
                                            <path id="path16995"
                                                d="M138.7 101c0-4 4.8-5.9 7.6-3.1 12.6 12.8 33.4 34.8 33.5 34.9.3.3.6.8 1.8 1.2.5.2 1.3.2 2.2.2h22.7c4.1 0 5.3-4.7 3.4-7.1l-37.6-38.5-2-2c-4.3-5.1-3.8-7.1 1.1-12.3L201.2 41c1.9-2.4.7-7-3.5-7h-20.6c-.8 0-1.4 0-2 .2-1.2.4-1.7.8-2 1.2-.1.1-16.6 17.9-26.8 28.8-2.8 3-7.8 1-7.8-3.1V4c0-2.9-2.4-4-4.3-4h-16.8c-2.9 0-4.3 1.9-4.3 3.6v126.6c0 2.9 2.4 3.7 4.4 3.7h16.8c2.6 0 4.3-1.9 4.3-3.8V101z"
                                                class="st0" />
                                            <path id="path16997"
                                                d="M275.9 129.6l-1.8-16.8c-.2-2.3-2.4-3.9-4.7-3.5-1.3.2-2.6.3-3.9.3-13.4 0-24.3-10.5-25.1-23.8v-22c0-2.7 2-4.9 4.7-4.9h22.5c1.6 0 4-1.4 4-4.3V38.7c0-3.1-2-4.7-3.8-4.7h-22.7c-2.6 0-4.7-1.9-4.8-4.5V4c0-1.6-1.2-4-4.3-4h-16.7c-2.1 0-4.1 1.3-4.1 3.9v81.9c.7 27.2 23 48.9 50.3 48.9 2.3 0 4.5-.2 6.7-.5 2.4-.3 4-2.3 3.7-4.6z"
                                                class="st0" />
                                        </g>
                                        <g id="g17003">
                                            <path id="path17001"
                                                d="M397.1 108.5c-14.2 0-16.4-5.1-16.4-24.2V38.2c0-1.6-1.2-4.3-4.4-4.3h-16.8c-2.1 0-4.4 1.7-4.4 4.3v2.1c-7.3-4.2-15.8-6.6-24.8-6.6-27.8 0-50.3 22.5-50.3 50.3 0 27.8 22.5 50.3 50.3 50.3 12.5 0 23.9-4.6 32.7-12.1 4.7 7.2 12.3 12 24.2 12.1 2 0 12.8.4 12.8-4.7v-17.9c0-1.5-1.2-3.2-2.9-3.2zm-66.7.8c-13.9 0-25.2-11.3-25.2-25.2 0-13.9 11.3-25.2 25.2-25.2 13.9 0 25.2 11.3 25.2 25.2-.1 13.9-11.4 25.2-25.2 25.2z"
                                                class="st0" />
                                        </g>
                                    </g>
                                </svg>
                            </div>

                            <div id="google-suit"
                                class="transform -translate-x-20 -translate-y-8 lg:-translate-x-28 lg:-translate-y-10 bg-white w-20 h-20 shadow-xl flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" height="150" width="150"
                                    viewBox="-74.55 -30.8 646.1 184.8">
                                    <path
                                        d="M91.35 34.876c-3.867-3.95-8.068-6.975-12.522-9.076-4.454-2.101-10.085-3.11-16.556-3.11-5.21 0-10.169.925-14.79 2.773-4.623 1.85-8.657 4.454-12.102 7.816-3.53 3.362-6.303 7.48-8.32 12.27-2.017 4.79-3.025 10.084-3.025 15.967 0 5.882 1.008 11.177 3.025 15.967 2.017 4.79 4.79 8.824 8.32 12.185a38.443 38.443 0 0012.27 7.9c4.622 1.849 9.664 2.773 14.958 2.773 5.63 0 10.589-.756 14.79-2.353 4.203-1.597 7.816-3.782 10.842-6.47 2.017-1.85 3.866-4.119 5.462-6.808 1.597-2.773 2.858-5.798 3.782-9.16H61.936V55.381h57.986c.336 1.345.588 2.941.84 4.958.253 2.017.337 3.866.337 5.799 0 7.983-1.177 15.21-3.53 21.85-2.353 6.639-5.967 12.437-10.673 17.564-5.294 5.63-11.597 9.916-18.992 13.025-7.396 3.11-15.884 4.623-25.38 4.623-8.572 0-16.64-1.513-24.203-4.623-7.563-3.109-14.202-7.395-19.917-12.857-5.63-5.463-10.084-11.934-13.446-19.413C1.597 78.827 0 70.507 0 61.6c0-8.908 1.68-17.144 4.958-24.707 3.278-7.564 7.732-14.035 13.446-19.497 5.63-5.463 12.27-9.665 19.917-12.774C45.97 1.512 54.036 0 62.524 0c9.749 0 18.404 1.68 25.884 5.042s13.95 7.984 19.413 13.867zm148.998 54.12c0 10.337-3.781 18.657-11.345 24.96-7.647 6.134-16.975 9.244-27.984 9.244-9.749 0-18.405-2.858-25.884-8.572-7.48-5.715-12.606-13.53-15.463-23.363l14.454-5.967c1.009 3.53 2.354 6.723 4.118 9.58 1.765 2.858 3.782 5.295 6.135 7.312a28.765 28.765 0 007.816 4.79c2.857 1.177 5.882 1.765 9.076 1.765 6.89 0 12.605-1.765 16.975-5.378 4.37-3.53 6.555-8.32 6.555-14.203 0-4.958-1.849-9.16-5.462-12.69-3.362-3.361-9.749-6.723-19.077-9.916-9.412-3.362-15.295-5.715-17.648-6.891-12.521-6.387-18.74-15.715-18.74-28.153 0-8.656 3.445-16.051 10.337-22.186C181.27 3.193 189.84.084 200.094.084c8.992 0 16.808 2.27 23.363 6.891 6.555 4.538 11.009 10.169 13.194 16.976l-14.035 5.798c-1.344-4.37-3.95-8.067-7.815-10.925-3.866-2.94-8.656-4.37-14.203-4.37-5.966 0-10.925 1.681-14.958 4.959-4.034 3.025-6.051 7.059-6.051 11.933 0 4.034 1.597 7.564 4.79 10.505 3.53 2.941 11.177 6.47 22.858 10.505 11.934 4.033 20.506 9.076 25.632 14.958 4.958 5.883 7.48 13.11 7.48 21.682zm83.954 31.514h-14.454v-11.177h-.673c-2.269 3.95-5.882 7.228-10.588 9.917-4.79 2.605-9.749 3.95-14.875 3.95-9.917 0-17.48-2.858-22.774-8.488-5.295-5.63-7.984-13.698-7.984-24.12V39.835h15.127v49.75c.336 13.194 6.975 19.75 19.917 19.75 6.05 0 11.093-2.438 15.127-7.312 4.033-4.874 6.05-10.757 6.05-17.564V39.834h15.127zm34.54-108.493c0 2.942-1.009 5.463-3.11 7.564-2.1 2.1-4.622 3.11-7.563 3.11s-5.463-1.01-7.563-3.11c-2.101-2.101-3.11-4.622-3.11-7.564 0-2.94 1.009-5.462 3.11-7.563 2.1-2.1 4.622-3.11 7.563-3.11s5.462 1.01 7.563 3.11c2.101 2.101 3.11 4.622 3.11 7.563zm-3.11 27.817v80.676h-15.126V39.834zm46.473 82.021c-6.555 0-12.017-2.017-16.387-6.05-4.37-4.035-6.555-9.75-6.64-16.976V53.7h-14.202V39.834h14.119V15.127h15.127v24.707h19.749V53.7h-19.75v40.17c0 5.379 1.01 8.992 3.11 10.925 2.101 1.933 4.454 2.858 7.06 2.858 1.176 0 2.352-.169 3.529-.42 1.176-.253 2.185-.673 3.193-1.093l4.79 13.53c-3.781 1.429-8.403 2.185-13.698 2.185zm56.642 1.26c-11.85 0-21.598-4.033-29.33-12.185-7.647-8.152-11.513-18.404-11.513-30.758 0-12.27 3.698-22.522 11.177-30.674 7.48-8.151 16.976-12.27 28.657-12.27 11.934 0 21.514 3.867 28.573 11.598C493.471 56.557 497 67.398 497 81.349l-.168 1.68h-63.365c.252 7.9 2.858 14.287 7.9 19.077 5.042 4.79 11.093 7.227 18.152 7.227 9.664 0 17.228-4.79 22.69-14.454l13.53 6.555c-3.613 6.807-8.655 12.101-15.042 15.967-6.471 3.782-13.783 5.714-21.85 5.714zm-24.203-52.691h46.305c-.42-5.63-2.69-10.253-6.807-13.95-4.118-3.698-9.665-5.547-16.556-5.547-5.714 0-10.589 1.765-14.706 5.294-4.202 3.614-6.891 8.32-8.236 14.203z"
                                        fill="#737373" />
                                </svg>
                            </div>

                            <div id="onelogin"
                                class="bg-white w-20 h-20 shadow-xl flex items-center justify-center rounded-full">
                                <h1 class="text-zinc-900 text-sm font-extrabold tracking-wider">onelogin</h1>
                            </div>

                            <div id="azure"
                                class="transform translate-x-24 translate-y-8 lg:translate-x-28 lg:translate-y-10 bg-white w-20 h-20 shadow-xl flex items-center justify-center rounded-full">
                                <svg width="50" height="50" viewBox="0 0 96 96"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient id="e399c19f-b68f-429d-b176-18c2117ff73c" x1="-1032.172"
                                            x2="-1059.213" y1="145.312" y2="65.426"
                                            gradientTransform="matrix(1 0 0 -1 1075 158)"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#114a8b" />
                                            <stop offset="1" stop-color="#0669bc" />
                                        </linearGradient>
                                        <linearGradient id="ac2a6fc2-ca48-4327-9a3c-d4dcc3256e15" x1="-1023.725"
                                            x2="-1029.98" y1="108.083" y2="105.968"
                                            gradientTransform="matrix(1 0 0 -1 1075 158)"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-opacity=".3" />
                                            <stop offset=".071" stop-opacity=".2" />
                                            <stop offset=".321" stop-opacity=".1" />
                                            <stop offset=".623" stop-opacity=".05" />
                                            <stop offset="1" stop-opacity="0" />
                                        </linearGradient>
                                        <linearGradient id="a7fee970-a784-4bb1-af8d-63d18e5f7db9" x1="-1027.165"
                                            x2="-997.482" y1="147.642" y2="68.561"
                                            gradientTransform="matrix(1 0 0 -1 1075 158)"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#3ccbf4" />
                                            <stop offset="1" stop-color="#2892df" />
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#e399c19f-b68f-429d-b176-18c2117ff73c)"
                                        d="M33.338 6.544h26.038l-27.03 80.087a4.152 4.152 0 0 1-3.933 2.824H8.149a4.145 4.145 0 0 1-3.928-5.47L29.404 9.368a4.152 4.152 0 0 1 3.934-2.825z" />
                                    <path fill="#0078d4"
                                        d="M71.175 60.261h-41.29a1.911 1.911 0 0 0-1.305 3.309l26.532 24.764a4.171 4.171 0 0 0 2.846 1.121h23.38z" />
                                    <path fill="url(#ac2a6fc2-ca48-4327-9a3c-d4dcc3256e15)"
                                        d="M33.338 6.544a4.118 4.118 0 0 0-3.943 2.879L4.252 83.917a4.14 4.14 0 0 0 3.908 5.538h20.787a4.443 4.443 0 0 0 3.41-2.9l5.014-14.777 17.91 16.705a4.237 4.237 0 0 0 2.666.972H81.24L71.024 60.261l-29.781.007L59.47 6.544z" />
                                    <path fill="url(#a7fee970-a784-4bb1-af8d-63d18e5f7db9)"
                                        d="M66.595 9.364a4.145 4.145 0 0 0-3.928-2.82H33.648a4.146 4.146 0 0 1 3.928 2.82l25.184 74.62a4.146 4.146 0 0 1-3.928 5.472h29.02a4.146 4.146 0 0 0 3.927-5.472z" />
                                </svg>
                            </div>

                            <div id="slack"
                                class="transform -translate-x-20 -translate-y-5 lg:-translate-x-28 lg:-translate-y-10 bg-white w-20 h-20 shadow-xl flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" height="150" width="150"
                                    viewBox="-74.46 -31.4 645.32 188.4">
                                    <g fill="none">
                                        <path fill="#000"
                                            d="M158.8 98.9l6.2-14.4c6.7 5 15.6 7.6 24.4 7.6 6.5 0 10.6-2.5 10.6-6.3-.1-10.6-38.9-2.3-39.2-28.9-.1-13.5 11.9-23.9 28.9-23.9 10.1 0 20.2 2.5 27.4 8.2l-5.8 14.7c-6.6-4.2-14.8-7.2-22.6-7.2-5.3 0-8.8 2.5-8.8 5.7.1 10.4 39.2 4.7 39.6 30.1 0 13.8-11.7 23.5-28.5 23.5-12.3 0-23.6-2.9-32.2-9.1m237.9-19.6c-3.1 5.4-8.9 9.1-15.6 9.1-9.9 0-17.9-8-17.9-17.9 0-9.9 8-17.9 17.9-17.9 6.7 0 12.5 3.7 15.6 9.1l17.1-9.5C407.4 40.8 395.1 33 381.1 33c-20.7 0-37.5 16.8-37.5 37.5s16.8 37.5 37.5 37.5c14.1 0 26.3-7.7 32.7-19.2zM228.1 1.9h21.4v104.7h-21.4zm194.1 0v104.7h21.4V75.2l25.4 31.4h27.4l-32.3-37.3L494 34.5h-26.2l-24.2 28.9V1.9zM313.1 79.5c-3.1 5.1-9.5 8.9-16.7 8.9-9.9 0-17.9-8-17.9-17.9 0-9.9 8-17.9 17.9-17.9 7.2 0 13.6 4 16.7 9.2zm0-45V43c-3.5-5.9-12.2-10-21.3-10-18.8 0-33.6 16.6-33.6 37.4 0 20.8 14.8 37.6 33.6 37.6 9.1 0 17.8-4.1 21.3-10v8.5h21.4v-72z" />
                                        <path fill="#E01E5A"
                                            d="M26.5 79.4c0 7.3-5.9 13.2-13.2 13.2C6 92.6.1 86.7.1 79.4c0-7.3 5.9-13.2 13.2-13.2h13.2zm6.6 0c0-7.3 5.9-13.2 13.2-13.2 7.3 0 13.2 5.9 13.2 13.2v33c0 7.3-5.9 13.2-13.2 13.2-7.3 0-13.2-5.9-13.2-13.2z" />
                                        <path fill="#36C5F0"
                                            d="M46.3 26.4c-7.3 0-13.2-5.9-13.2-13.2C33.1 5.9 39 0 46.3 0c7.3 0 13.2 5.9 13.2 13.2v13.2zm0 6.7c7.3 0 13.2 5.9 13.2 13.2 0 7.3-5.9 13.2-13.2 13.2H13.2C5.9 59.5 0 53.6 0 46.3 0 39 5.9 33.1 13.2 33.1z" />
                                        <path fill="#2EB67D"
                                            d="M99.2 46.3c0-7.3 5.9-13.2 13.2-13.2 7.3 0 13.2 5.9 13.2 13.2 0 7.3-5.9 13.2-13.2 13.2H99.2zm-6.6 0c0 7.3-5.9 13.2-13.2 13.2-7.3 0-13.2-5.9-13.2-13.2V13.2C66.2 5.9 72.1 0 79.4 0c7.3 0 13.2 5.9 13.2 13.2z" />
                                        <path fill="#ECB22E"
                                            d="M79.4 99.2c7.3 0 13.2 5.9 13.2 13.2 0 7.3-5.9 13.2-13.2 13.2-7.3 0-13.2-5.9-13.2-13.2V99.2zm0-6.6c-7.3 0-13.2-5.9-13.2-13.2 0-7.3 5.9-13.2 13.2-13.2h33.1c7.3 0 13.2 5.9 13.2 13.2 0 7.3-5.9 13.2-13.2 13.2z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="space-y-10 text-center bg-zinc-100 px-5 py-20  lg:px-44">
                <div class="space-y-3">
                    <h1 class="text-blue-500 font-base text-2xl">The Frontdesk Advantage</h1>
                    <p class="text-zinc-800 font-base text-md text-justify max-w-[73%] mx-auto">
                        Frontdesk is the first
                        access
                        management software
                        of its kind. With Sequr, you can manage
                        keyholders, monitor all activity, and even assign mobile keys from any device, anywhere, at any
                        time.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-y-5 lg:gap-8 lg:grid-cols-3 text-left">
                    <div class="space-y-3">
                        <h1 class="text-blue-500 font-base text-lg max-w-[73%] mx-auto">
                            <div class="flex items-center gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                                </svg>

                                <span> Hardware Integration</span>
                            </div>
                        </h1>
                        <p class="text-zinc-800 font-base text-md max-w-[73%] mx-auto">
                            No more buying expensive keycards every time someone loses one or you hire someone new.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <h1 class="text-blue-500 font-base text-lg max-w-[73%] mx-auto">
                            <div class="flex items-center gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>

                                <span>No Unwanted Visitors</span>
                            </div>
                        </h1>
                        <p class="text-zinc-800 font-base text-md max-w-[73%] mx-auto">

                            Opening doors with your phone is just plain cool, and your employees will love it.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <h1 class="text-blue-500 font-base text-lg max-w-[73%] mx-auto">
                            <div class="flex items-center gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>

                                <span>24/7 Support</span>
                            </div>
                        </h1>
                        <p class="text-zinc-800 font-base text-md max-w-[73%] mx-auto">
                            Admins can open and lock doors from anywhere in the world, straight from their phone.
                        </p>
                    </div>
                    <div class="space-y-3">
                        <h1 class="text-blue-500 font-base text-lg max-w-[73%] mx-auto">
                            <div class="flex items-center gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m3 3 8.735 8.735m0 0a.374.374 0 1 1 .53.53m-.53-.53.53.53m0 0L21 21M14.652 9.348a3.75 3.75 0 0 1 0 5.304m2.121-7.425a6.75 6.75 0 0 1 0 9.546m2.121-11.667c3.808 3.807 3.808 9.98 0 13.788m-9.546-4.242a3.733 3.733 0 0 1-1.06-2.122m-1.061 4.243a6.75 6.75 0 0 1-1.625-6.929m-.496 9.05c-3.068-3.067-3.664-7.67-1.79-11.334M12 12h.008v.008H12V12Z" />
                                </svg>

                                <span> Eliminate Shared Codes</span>
                            </div>
                        </h1>
                        <p class="text-zinc-800 font-base text-md max-w-[73%] mx-auto">

                            Someone is far more likely to share a keycard than their smartphone.
                        </p>
                    </div>
                    <div class="space-y-3">
                        <h1 class="text-blue-500 font-base text-lg max-w-[73%] mx-auto">
                            <div class="flex items-center gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                                </svg>

                                <span> Insightful Analytics</span>
                            </div>
                        </h1>
                        <p class="text-zinc-800 font-base text-md max-w-[73%] mx-auto">
                            Use your phone's fingerprint reader to create 2FA for access points that require additional
                            security.
                        </p>
                    </div>
                    <div class="space-y-3">
                        <h1 class="text-blue-500 font-base text-lg max-w-[73%] mx-auto">
                            <div class="flex items-center gap-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25" />
                                </svg>

                                <span> Unlimited Visitors</span>
                            </div>
                        </h1>
                        <p class="text-zinc-800 font-base text-md max-w-[73%] mx-auto">
                            Use the Sequr Apple Watch app to effortlessly unlock your door without pulling out your
                            phone.
                        </p>
                    </div>
                </div>
            </div>

        </main>

        <footer class="bg-gradient-to-r from-blue-600 to-blue-950 text-white px-5 lg:px-44 py-10">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-5 lg:space-y-0">
                <!-- Brand Info -->
                <div class="text-center lg:text-left">
                    <h2 class="text-2xl font-semibold">Frontdesk</h2>
                    <p class="text-sm lg:text-lg mt-2">Streamline your visitor management with ease and security.</p>
                </div>

                <!-- Quick Links -->
                <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-5 text-center">
                    <a href="#" class="hover:underline">Dashboard</a>
                    <a href="#" class="hover:underline">Features</a>
                    <a href="#" class="hover:underline">Pricing</a>
                    <a href="#" class="hover:underline">Contact</a>
                </div>

                <!-- Social Media Links -->
                <div class="space-x-4">
                    <a href="#" class="hover:opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.406.593 24 1.325 24h11.495v-9.294H9.847v-3.622h2.973V8.413c0-2.937 1.79-4.54 4.406-4.54 1.252 0 2.331.093 2.646.135v3.072l-1.816.001c-1.423 0-1.697.677-1.697 1.669v2.187h3.394l-.443 3.622h-2.951V24h5.787c.73 0 1.324-.594 1.324-1.324V1.325C24 .593 23.406 0 22.675 0z" />
                        </svg>
                    </a>
                    <a href="#" class="hover:opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.356 3.608 1.331.975.975 1.27 2.242 1.331 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.356 2.633-1.331 3.608-.975.975-2.242 1.27-3.608 1.331-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.356-3.608-1.331-.975-.975-1.27-2.242-1.331-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.849c.062-1.366.356-2.633 1.331-3.608C4.539 2.587 5.806 2.293 7.172 2.232c1.265-.058 1.645-.07 4.849-.07zm0-2.163C8.798 0 8.403.014 7.114.072 5.836.13 4.614.496 3.663 1.447.768 3.337.13 5.584.072 7.862.014 8.798 0 9.193 0 12s.014 3.202.072 4.486c.058 2.278.496 4.524 1.447 5.475.951.951 3.197 1.389 5.475 1.447C8.798 23.986 9.193 24 12 24s3.202-.014 4.486-.072c2.278-.058 4.524-.496 5.475-1.447.951-.951 1.389-3.197 1.447-5.475.058-1.284.072-1.679.072-4.486s-.014-3.202-.072-4.486c-.058-2.278-.496-4.524-1.447-5.475-.951-.951-3.197-1.389-5.475-1.447C15.202.014 14.807 0 12 0z" />
                        </svg>
                    </a>
                    <a href="#" class="hover:opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.723-.951.564-2.005.974-3.127 1.195-.897-.954-2.178-1.549-3.594-1.549-2.72 0-4.923 2.204-4.923 4.923 0 .386.044.762.128 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.423.725-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.808-.026-1.566-.248-2.228-.616v.062c0 2.386 1.698 4.374 3.946 4.827-.414.113-.849.173-1.296.173-.316 0-.624-.03-.926-.086.625 1.955 2.444 3.377 4.6 3.416-1.68 1.317-3.809 2.104-6.115 2.104-.398 0-.789-.023-1.175-.067 2.18 1.397 4.768 2.211 7.548 2.211 9.056 0 14.01-7.498 14.01-14.01 0-.213-.005-.426-.014-.637.961-.694 1.797-1.56 2.457-2.548l-.047-.02z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="mt-10 text-center text-sm">
                <p>&copy; <span id="year"></span> Frontdesk. All Rights Reserved.</p>
            </div>
        </footer>

        @livewireScripts

        <script>
            document.getElementById('year').textContent = new Date().getFullYear()
        </script>
    </body>

</html>
