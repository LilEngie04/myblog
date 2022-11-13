<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{__('Profile Information')}}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        @if(Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <input type="file" class="hidden">
            </div>
    </x-slot>
</x-jet-form-section>
