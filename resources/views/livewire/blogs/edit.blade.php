<?php

use Livewire\Volt\Component;
use App\Models\Blog;
use Livewire\Attributes\Validate;

new class extends Component {
    public Blog $blog;

    #[Validate('required|string|max:255')]
    public string $message = '';

    public function mount(): void
    {
        $this->message = $this->blog->message;
    }
 
    public function update(): void
    {
        $this->authorize('update', $this->blog);
 
        $validated = $this->validate();
 
        $this->blog->update($validated);
 
        $this->dispatch('blog-updated');
    }
 
    public function cancel(): void
    {
        $this->dispatch('blog-edit-canceled');
    }  
}; ?>

<div>
    <form wire:submit="update"> 
        <textarea
            wire:model="message"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
 
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
    </form> 

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('refreshPage', () => {
                window.location.reload();
            });
        });
    </script>
</div>
