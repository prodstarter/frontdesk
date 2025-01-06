<div>
    <form wire:submit.prevent="checkPreRegistration">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model="email">
        </div>
        <button type="submit">Check</button>
    </form>

    @if($result)
        <div>
            @if(is_array($result))
                <p>Success! Pre-registered user found:</p>
                <ul>
                    <li>Name: {{ $result[1]->name }}</li>
                    <li>Email: {{ $result[1]->email }}</li>
                </ul>
            @else
                <p>Failure! No pre-registered user found.</p>
            @endif
        </div>
    @endif
</div>
