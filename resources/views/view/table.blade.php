@php
//print_r($userL);
@endphp
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col" width="10%">Direcion</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach($userL as $valueUser)
        <tr>
            <th scope="row">{{ $i }}</th>
            <th scope="row">{{ $valueUser->id }}</th>
            <td>{{ $valueUser->name }}</td>
            <td>{{ $valueUser->email }}</td>
            <td>{{ $valueUser->telefono }}</td>
            <td>{{ $valueUser->dir }}</td>
            <td>Editar</td>
            <td><a href="{{ route('home.eliminar', $valueUser->id) }}">Elimanar</a></td>
        </tr>
        @php $i++; @endphp
        @endforeach
    </tbody>
</table>