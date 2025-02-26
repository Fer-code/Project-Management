<div class="min-h-screen bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-300">

    <div class="py-20 px-6">

        <div class="max-w-7xl mx-auto pb-16 bg-white rounded-xl">

            <form wire:submit.prevent="save">
                <div class="grid grid-cols-5 gap-2 mb-5 m-5 mt-7">

                    <div class="col-span-2 mt-3">
                        <x-page.page-title>
                            Novo Projetos
                        </x-page.page-title>

                    </div>

                    <div class="col-span-3 pr-5 space-y-4 mt-3">


                        <x-page.forms.input.text type="text" wire:model="name" placeholder="{{ __('Nome') }}"
                            required />

                        <div>
                            @error('name') <span class="error py-2 p-4 rounded-md text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <x-page.forms.input.text type="email" wire:model="email" placeholder="{{ __('Email') }}"
                            pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" title="Digite um e-mail válido" />
                        <div>
                            @error('email') <span class="error py-2 p-4 rounded-md text-xs">{{ $message }}</span>
                            @enderror
                        </div>



                        <x-page.buttons.primary-button class="mt-5" type="submit">{{__("Criar")}}
                        </x-page.buttons.primary-button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>