@extends('layouts.app')
@section('content')
   
    <!-- Container -->
    <div class="flex min-h-screen">
        <!-- Left Section -->
        <div class="w-full lg:w-1/2 bg-white flex items-center justify-center pb-20 pt-5">
            <div class="w-3/4">
                <h1 class="text-xl lg:text-2xl font-bold text-center my-7">{{ $company->name }}</h1>
                <p class="text-gray-500 text-center mb-8 font-semibold">Visitor Pre Registration Form</p>

                <!-- Form -->
                <form method="post" action="{{ route('pre-register.store', $company) }}">
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
                            <input name="email" type="email" placeholder="Enter email"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Phone Number -->
                        <div>
                            <label class="block text-gray-700 mb-1">Phone Number</label>
                            <input name="phone_number" type="text" placeholder="Enter phone number"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('phone_number') border-red-500 @enderror" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Gender -->
                        <div>
                            <label class="block text-gray-700 mb-1">Gender</label>
                            <select name="gender" class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('gender') border-red-500 @enderror" value="{{ old('gender') }}">
                                @error('gender')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                <option valu="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <!-- Category -->

                        <div>
                            <label class="block text-gray-700 mb-1">Category</label>
                            <select name="category" class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('category') border-red-500 @enderror" value="{{ old('category') }}">
                                @error('category')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                @foreach ($categories as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Address -->
                        <div class="col-span-2">
                            <label class="block text-gray-700 mb-1">Address</label>
                            <input name="address" type="text" placeholder="Enter address"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('address') border-red-500 @enderror" value="{{ old('address') }}">
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Visit Date -->
                        <div>
                            <label class="block text-gray-700 mb-1">Visit Date</label>
                            <input name="visit_date" type="date"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('visit_date') border-red-500 @enderror" value="{{ old('visit_date') }}"
                                min="{{ \Carbon\Carbon::now()->toDateString() }}">
                            @error('visit_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Entry and Exit Time -->
                        <div>
                            <label class="block text-gray-700 mb-1">Entry Time</label>
                            <input name="entry_time" type="time"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('entry_time') border-red-500 @enderror" value="{{ old('entry_time') }}">
                            @error('entry_time')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-1">Exit Time</label>
                            <input name="exit_time" type="time"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                @error('exit_time') border-red-500 @enderror" value="{{ old('exit_time') }}">
                            @error('exit_time')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Notes -->
                    <div class="mt-4">
                        <label class="block text-gray-700 mb-1">Notes</label>
                        <textarea name="notes" rows="3" placeholder="Enter notes"
                            class="w-full px-3 py-2 border rounded-md focus:outline-blue-500" @error('notes') border-red-500 @enderror"
                            value="{{ old('notes') }}"></textarea>
                        @error('notes')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Button -->
                    <div class="mt-6 text-center">
                        <button class="bg-blue-500 text-white px-6 py-2 rounded-md w-2/3 hover:bg-blue-600">
                            ➡️ Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Right Section -->
        <div class="w-0 lg:w-1/2 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
            <div>
                <img class="w-10/12 mx-auto rounded-xl -mt-48"
                    src="https://demo.smartwebinfotech.site/smart-visitor-saas/assets/images/landing/auth_page.png"
                    alt="">
            </div>
        </div>
    </div>
@endsection
