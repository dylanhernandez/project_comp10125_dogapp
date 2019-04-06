@extends('layouts.parent')

<!--
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
-->

@section('title', 'Crud')

@section('content')
    <h2>Laravel CRUD Functionality</h2>
    @if(isset($data))
        @if($data["form"] !== false)
            @include('layouts.form', ['form' => $data["form"], 'data' => $data["formData"]])
        @else
            <p>
                <a href="{{url('/crud/add')}}" class="btn btn-default" role="button">Create</a>
            </p>
        @endif
        @if($data["dogs"])
            <table class="table table-bordered" style="font-size: smaller;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Owner</th>
                        <th>Toys</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["dogs"] as $dog)
                        <tr>
                            <td>{{ $dog->name }}</td>
                            <td>{{ $dog->age }}</td>
                            <td>{{ $dog->owner }}</td>
                            <td>{{ $dog->toys }}</td>
                            <td>{{ $dog->created_at }}</td>
                            <td>{{ $dog->updated_at }}</td>
                            <td>
                                <a href="{{url('/crud/edit/' . $dog->id)}}" class="btn btn-sm btn-block btn-default" role="button" style="margin-bottom:5px;">Edit</a>
                                <a href="{{url('/crud/delete/' . $dog->id)}}" class="btn btn-sm btn-block btn-danger" role="button">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
@endsection