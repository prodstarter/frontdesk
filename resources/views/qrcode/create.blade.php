@extends('layouts.app')
@section('content')
    <div class="bg-gradient-to-br from-purple-100 via-white to-purple-300">

        <main class="px-10 py-4 mb-20 max-w-5xl mx-auto">
            <div class="">
                <div class="w-full flex items-center justify-between py-10">
                    <div class="text-2xl font-bold text-blue-900"> {{ Str::limit($company->name, 10, '...') }}</div>
                    <div class="lg:flex items-center space-x-6 hidden">
                        <a href="#" class="text-gray-600 hover:text-gray-900 text-lg font-semibold">Have
                            Appointment</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 text-lg font-semibold">Been here
                            Before</a>
                        <select class="text-gray-600 text-lg font-semibold bg-transparent border-none">
                            <option value="en">English</option>
                            <option value="fr">French</option>
                        </select>
                        <button
                            class="bg-blue-600 text-white px-4 py-2 rounded-full text-lg font-semibold hover:bg-blue-700">Login</button>
                    </div>

                    <button class="lg:hidden" onclick="document.getElementById('mobileNav').style.display = 'block'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>

                    </button>
                </div>
                {{-- Mobile Nav --}}
                <div class="px-10 py-14 fixed hidden transition-all duration-500 inset-0 z-20
             w-screen h-screen bg-gradient-to-br from-purple-100 via-white to-purple-200"
                    id="mobileNav">
                    <div class="flex justify-between">
                        <div class="text-2xl font-bold text-blue-900">Epass</div>
                        <button class="" onclick="document.getElementById('mobileNav').style.display = 'none'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-20 flex flex-col text-2xl font-semibold">
                        <a href="#" class="text-gray-600 hover:text-gray-900 mt-3">Have Appointment</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 mt-3">Been here Before</a>
                        <select class="text-gray-600 bg-transparent border-none mt-3">
                            <option value="en">English</option>
                            <option value="fr">French</option>
                        </select>
                        <button class="bg-blue-600  text-white py-2 rounded-full hover:bg-blue-700 mt-8">Login</button>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section
                class="flex flex-col md:flex-row justify-center md:justify-between items-center md:items-stretch gap-y-20
                 lg:gap-y-0 mt-20 w-full">
                <div>
                    <div class="text-left sm:max-w-3xl">
                        <h2 class="text-gray-500 text-lg font-semibold uppercase tracking-wide mb-2">Visitor Pass</h2>
                        <h1 class="text-gray-900 font-extrabold text-xl md:text-3xl lg:text-4xl leading-tight">
                            Visitor Pass <br> management system.
                        </h1>
                        <p class="text-gray-500 mt-4 text-lg font-semibold">Welcome, please tap on button to check-in
                        </p>

                        <!-- Action Buttons -->
                        <div class="mt-8 flex items-center space-x-6">
                            <button
                                class="flex items-center px-6 py-3 bg-blue-600 text-white text-lg rounded-lg shadow-md hover:bg-blue-700">
                                Check-in
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                            <button id="startButton"
                                class="flex items-center px-6 py-3 bg-white text-blue-600 border border-blue-600 text-lg rounded-lg shadow-md hover:bg-blue-50">
                                Scan QR
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4h5v5H4V4zm11 0h5v5h-5V4zM4 15h5v5H4v-5zm11 0h5v5h-5v-5z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Decorative Scan Markers -->
                <div class="">



                    <div>
                        <div class="relative w-64 h-72 overflow-hidden border border-gray-300 bg-white">
                            <div class="absolute top-0 left-0 h-4 w-4 border-t-4 border-l-4 border-blue-500"></div>
                            <div class="absolute top-0 right-0 h-4 w-4 border-t-4 border-r-4 border-blue-500"></div>
                            <div>
                                <span id="reader" class="h-full w-full inset-0"></span>
                            </div>
                            <div class="absolute bottom-0 left-0 h-4 w-4 border-b-4 border-l-4 border-blue-500"></div>
                            <div class="absolute bottom-0 right-0 h-4 w-4 border-b-4 border-r-4 border-blue-500"></div>
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
        <script>
            function onScanSuccess(data) {
                fetch("{{ route('qrcode.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            data: data
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result == 0) {
                            alert('There is no user with this QR code')
                            return
                        }

                        console.log(result)

                        const [status, preUser] = result

                        console.log('Logged In')

                        const baseUrl = "/company";
                        const companyUuid = "{{ $company->uuid }}";

                        const url = `${baseUrl}/${companyUuid}/check-in/${preUser.id}`;

                        window.location.href = url;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            function debounce(func, wait) {
                let timeout;
                return function(...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), wait);
                };
            }

            const debouncedOnScanSuccess = debounce(onScanSuccess, 700);

            const html5QrcodeScanner = new Html5QrcodeScanner("reader", {
                fps: 10,
                qrbox: 200,
            });

            html5QrcodeScanner.render(debouncedOnScanSuccess);
        </script>
    </div>
@endsection
