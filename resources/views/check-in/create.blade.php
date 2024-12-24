@extends('layouts.app')
@section('content')
    <!-- Container -->
    <div class="flex min-h-screen">
        <!-- Left Section -->
        <div class="w-full lg:w-1/2 bg-white flex items-center justify-center pb-20 pt-5">
            <div class="w-3/4">
                <h1 class="text-xl lg:text-2xl font-bold text-center my-7">{{ $company->name }}</h1>
                <p class="text-gray-500 text-center mb-8 font-semibold">Visitor Check In Form</p>

                <!-- Form -->
                <form method="post" action="{{ route('check-in.store', $company) }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">


                        <!-- First Name -->
                        <div>
                            <label class="block text-gray-700 mb-1">First Name</label>
                            <input name="first_name" type="text" placeholder="Enter first name"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500 
                                    @error('first_name') border-red-500 @enderror"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Last Name -->
                        <div>
                            <label class="block text-gray-700 mb-1">Last Name</label>
                            <input name="last_name" type="text" placeholder="Enter last name"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('last_name') border-red-500 @enderror" value="{{ old('last_name') }}">
                            @error('last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div>
                            <label class="block text-gray-700 mb-1">Email</label>
                            <input name="visitor_email" type="email" placeholder="Enter email"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('visitor_email') border-red-500 @enderror" value="{{ old('visitor_email') }}">
                            @error('visitor_email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Phone Number -->
                        <div>
                            <label class="block text-gray-700 mb-1">Phone Number</label>
                            <input name="visitor_phone" type="tel" placeholder="Enter phone number"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('visitor_phone') border-red-500 @enderror" value="{{ old('visitor_phone') }}">
                            @error('visitor_phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Employee -->
                        <div class="mt-4">
                            <label for="employee_id" class="block text-sm font-medium text-gray-700">
                                Select an Employee
                            </label>
                            <select id="employee" name="employee_id"
                                class="mt-1 block w-full text-black rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="" class="text-black">-- Select an Employee --</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" style="color: black;">
                                        {{ $employee->first_name . ' ' . $employee->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Entry and Exit Time -->
                        <div>
                            <label class="block text-gray-700 mb-1">Arrival</label>
                            <input name="arrival" type="time"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500 @error('arrival') border-red-500 @enderror"
                                value="{{ $preUser->entry_time }}">
                            @error('arrival')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-gray-700 mb-1">Departure</label>
                            <input name="departure" type="time"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('departure') border-red-500 @enderror" value="{{ $preUser->exit_time }}">
                            @error('departure')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- purpose -->
                    <div class="mt-4">
                        <label class="block text-gray-700 mb-1">Purpose</label>
                        <textarea name="purpose" rows="3" placeholder="Enter purpose"
                            class="w-full px-3 py-2 border rounded-md focus:outline-blue-500" @error('purpose') border-red-500 @enderror"
                            value="{{ old('purpose') }}"></textarea>
                        @error('purpose')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Button -->
                    <div class="mt-6 text-center">
                        <button
                            class="text-white px-6 py-2 rounded-md w-2/3 bg-gradient-to-br from-blue-400 via-purple-500 to-blue-600 hover:bg-gradient-to-br hover:from-blue-500 hover:via-purple-600 hover:to-blue-700">
                            ➡️ Register
                        </button>

                    </div>
                </form>
            </div>
        </div>
        <!-- Right Section -->
        <div
            class="w-0 lg:w-1/2 bg-gradient-to-br from-blue-400 via-purple-500 to-blue-600 flex items-center justify-center">
            <div>
                <img class="w-10/12 mx-auto rounded-xl -mt-48"
                    src="https://demo.smartwebinfotech.site/smart-visitor-saas/assets/images/landing/auth_page.png"
                    alt="">
            </div>
        </div>
    </div>
@endsection
