<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<form action="action" method = "post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td><label>name</label></td>
            <td><input type="text" name = "name"/></td>
        </tr>
        <tr>
            <td><label>Description</label></td>
            <td><input type="text" name = "description"/></td>
        </tr>
        <tr>
            <td><label>Category</label></td>
            <td><select name="category">
                <option>Horror</option>
                <option>Funny</option>
                <option>Sci-Fi</option>
                <option>Drama</option>
            </select></td>
        </tr>
        <tr>
            <td><label>video</label></td>
            <td><input type="file" name = "video"/></td>
        </tr>
        <tr>
            <td><label>thumbnail</label></td>
            <td><input type="file" name = "thumbnail"/></td>
        </tr>
        <tr>
            <td><label></label></td>
            <td><input type="submit"/></td>
        </tr>
    </table>

</form>
</x-app-layout>
