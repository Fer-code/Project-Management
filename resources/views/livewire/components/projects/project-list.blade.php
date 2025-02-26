<?php
    $baseClass = "w-full";
?>

<div class="{{$baseClass}} @container">


    <div class="filters w-full py-2 flex w-full gap-x-4 gap-y-0">
           
        <div class="grow flex gap-2 items-center items-justify w-full xl:pr-16">
            <x-page.forms.input.text wire:model.blur="search" class="w-full" name="search" placeholder='{{__("Buscar por ID, nome, slug, tag ou descrição...")}}' />

            <svg class="h-5 w-5 cursor-pointer"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="10" cy="10" r="7" />  <line x1="21" y1="21" x2="15" y2="15" /></svg>
        </div>

        <x-page.forms.input.select 
            wire:model.live="filterStatus" 
            class="w-auto" 
            name="status"
        >
            <option value="">{{__("Todos os estágios")}}</option>
            <option value="pending">{{__("Pendente")}}</option>
            <option value="concluded">{{__("Concluída")}}</option>
            <option value="archived">{{__("Arquivada")}}</option>
            <option value="deleted">{{__("Lixeira")}}</option>
        </x-page.forms.input.select>

        
    </div>
    

    @if($filterStatus == 'deleted')
        <div class="pl-3">
            <p class="text-sm">                        
                {{__("Os itens serão apagados em 30 dias.")}}
            </p>
        </div>
    @endif

    <div class="w-full grid grid-cols-3 @md:grid-cols-3 @2xl:grid-cols-4 @7xl:grid-cols-6 gap-4 mb-10 items-stretch">
          
        @forelse($items as $key => $item)

            @php
                // Check if this item should be selected when rendered
                $selected = FALSE;

                if(is_array($selectedItems) && in_array($item->id, $selectedItems))
                    $selected = TRUE;
            @endphp

            <livewire:components.projects.project-list-item  
                wire:key='{{$item->id}}' 
                :selected="$selected"
                :selectable="$itemsSelectable" 
                :project="$item" 
            />
        @empty
        @endforelse    

    </div>

    <div class="pagination">
        {{ $items->links() }}
    </div>

</div>
