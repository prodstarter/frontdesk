    <div>
        @if (session('message'))
            <div
                class="flex justify-center items-center transition-all duration-300 bg-gray-400 py-4 text-green-500 text-lg font-bold">
                <p class="mr-4">{{ session('message') }}</p>
                <button onclick="this.parentElement.style.display = 'none'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-7 text-red-500 font-semibold">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="flex min-h-screen">

            <!-- Left Section -->
            <div class="w-full lg:w-1/2 bg-white flex items-center justify-center pb-20 pt-5">
                <div class="w-3/4">
                    <h1 class="text-xl lg:text-2xl font-bold text-center my-7">{{ $company->name }}</h1>
                    <p class="text-gray-500 text-center mb-8 font-semibold">Visitor Pre Registration Form</p>

                    <!-- Form -->
                    <form wire:submit.prevent="store">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">

                            <!-- First Name -->
                            <div>
                                <label class="block text-gray-700 mb-1">First Name <span
                                        class="text-lg text-red-500">*</span></label>
                                <input wire:model="first_name" name="first_name" type="text"
                                    placeholder="Enter first name"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500 
                                          @error('first_name') border-red-500 @enderror"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label class="block text-gray-700 mb-1">Last Name <span
                                        class="text-lg text-red-500">*</span></label>
                                <input wire:model="last_name" name="last_name" type="text"
                                    placeholder="Enter last name"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                    @error('last_name') border-red-500 @enderror" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-gray-700 mb-1">Email <span
                                        class="text-lg text-red-500">*</span></label>
                                <input wire:model="email" name="email" type="email" placeholder="Enter email"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                    @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label class="block text-gray-700 mb-1">Phone Number <span
                                        class="text-lg text-red-500">*</span></label>
                                <input wire:model="phone_number" name="phone_number" type="text"
                                    placeholder="Enter phone number"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                    @error('phone_number') border-red-500 @enderror" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Gender -->
                            <div>
                                <label class="block text-gray-700 mb-1">Gender <span
                                        class="text-lg text-red-500">*</span></label>
                                <select wire:model="gender" name="gender"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                    @error('gender') border-red-500 @enderror">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <!-- Category -->
                            <div>
                                <label class="block text-gray-700 mb-1">Category <span
                                        class="text-lg text-red-500">*</span></label>
                                <select wire:model="category" name="category"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                    @error('category') border-red-500 @enderror">

                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="col-span-2">
                                <label class="block text-gray-700 mb-1">Address</label>
                                <input wire:model="address" name="address" type="text" placeholder="Enter address"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                    @error('address') border-red-500 @enderror" value="{{ old('address') }}">
                                @error('address')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Visit Date -->
                            <div>
                                <label class="block text-gray-700 mb-1">Visit Date <span
                                        class="text-lg text-red-500">*</span></label>
                                <input wire:model="visit_date" name="visit_date" type="date"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500 
                                           @error('visit_date') border-red-500 @enderror"
                                    min="{{ \Carbon\Carbon::now()->toDateString() }}">
                                @error('visit_date')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Entry and Exit Time -->
                            <div>
                                <label class="block text-gray-700 mb-1">Entry Time <span
                                        class="text-lg text-red-500">*</span></label>
                                <input wire:model="entry_time" name="entry_time" type="time"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-blue-500"
                                    @error('entry_time') border-red-500 @enderror" value="{{ old('entry_time') }}">
                                @error('entry_time')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1">Exit Time <span
                                        class="text-lg text-red-500">*</span></label>
                                <input wire:model="exit_time" name="exit_time" type="time"
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
                            <textarea wire:model="notes" name="notes" rows="3" placeholder="Enter notes"
                                class="w-full px-3 py-2 border rounded-md focus:outline-blue-500" @error('notes') border-red-500 @enderror"
                                value="{{ old('notes') }}"></textarea>
                            @error('notes')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Button -->
                        <div class="mt-6 text-center">
                            <button type="submit"
                                class="bg-blue-500 text-white px-6 py-2 rounded-md w-2/3 hover:bg-blue-600">
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
    </div>
