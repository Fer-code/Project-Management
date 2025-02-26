<div class="min-h-screen bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-300">

    <div class="py-20 px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-7  ">

            <div class=" flex">
                <x-page.page-title>Projetos</x-page.page-title>

                <a class="ml-auto" href="{{route('project-create')}}">
                    <x-page.buttons.primary-button class="mb-3 text-xs">
                        {{__("Novo projeto")}}
                    </x-page.buttons.primary-button >
                </a>

            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 ">
                <livewire:components.projects.project-list />
            </div>
        </div>
    </div>
</div>