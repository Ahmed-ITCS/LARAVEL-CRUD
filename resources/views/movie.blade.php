<style>
    table, th, td {
  border: 1px solid black;
  border-radius: 10px;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<table>
    <tr>
        <th>Name</th>
        <th>category</th>
        <th>description</th>
        <th>Views</th>
        </tr>
<?php

foreach($data as $d)
{
    ?>
    <tr>
        <td>{{$d['name']}}</td>
        <td>{{$d['category']}}</td>
        <td>{{$d['description']}}</td>
        <td>{{$d['views']}}</td>
        <td><a href="watch/{{$d['id']}}"><img src ="{{$d['thumbnail']}}" width="100"/> </a></td>
        <td>
        </td>
    </tr>
<?php
}
?>
</x-app-layout>