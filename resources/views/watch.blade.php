<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<table>
    <tr>
        <td>
            <video src="../../{{$data->video}}" controls width="320" height ="240"></video>
        </td>
        <td>
        <p style="color : transparent">----------------------------------------------------------------------------------------------------------------------------</p>
        </td>
        <td>
        
        @foreach ($dd as $object)
        <a href="{{$object['id']}}"><img  src="../../{{$object->thumbnail}}" width="100"/> </a>
        @endforeach
            
        </td>
       
    </tr>

</table>
</div>
            </div>
        </div>
    </div>
</x-app-layout>