<div class="inline-block relative" x-data="{open: true}">
    <input
        @click.away="{open = false; @this.resetIndex();}"
        @click="{open = true}"
        type="text"
        class="bg-gray-200 text-gray-700 border-2 focus:outline-none placeholder-gray-500 px-2 py-1 rounded-full mr-3"
        placeholder="Rechercher une mission ..."
        wire:model="query"
        wire:keydown.arrow-down.prevent="incrementIndex"
        wire:keydown.arrow-up.prevent="decrementIndex"
        wire:keydown.backspace="resetIndex"
        wire:keydown.enter.prevent="showJob"
    >
    <svg class="w-5 h-5 text-gray-500 absolute top-0 right-0 mr-5 mt-2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
        <path d="M0 0h24v24H0z" fill="none"/>
        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
    </svg>
    @if (strlen($this->query) > 2)
        <div
            class="absolute border rounded bg-gray-100 text-md w-56 mt-1"
            x-show="open"
        >
            @if (count($jobs) > 0)
                @foreach ($jobs as $index => $job)
                    <p class="p-1  {{ $index === $selectedIndex ? 'text-green-500':'' }}">{{ $job->title }}</p>
                @endforeach
            @else
                <span class="text-yellow-500 p-1">0 résultat pour "{{ $query }}"</span>
            @endif
        </div>
    @endif
</div>
