<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div>
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" wire:model="first_name">
            @error('first_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" wire:model="last_name">
            @error('last_name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" wire:model="email">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" wire:model="phone_number">
            @error('phone_number')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="gender">Gender</label>
            <select id="gender" wire:model="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('gender')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="category">Category</label>
            <input type="text" id="category" wire:model="category">
            @error('category')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="address">Address</label>
            <textarea id="address" wire:model="address"></textarea>
            @error('address')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="visit_date">Visit Date</label>
            <input type="date" id="visit_date" wire:model="visit_date">
            @error('visit_date')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="entry_time">Entry Time</label>
            <input type="time" id="entry_time" wire:model="entry_time">
            @error('entry_time')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="exit_time">Exit Time</label>
            <input type="time" id="exit_time" wire:model="exit_time">
            @error('exit_time')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="notes">Notes</label>
            <textarea id="notes" wire:model="notes"></textarea>
            @error('notes')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
