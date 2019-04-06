@extends('layouts.parent')

<!--
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
-->

@section('title', 'Ajax')

@section('content')
    <h2>Laravel AJAX Functionality</h2>
    <div id="formSection" style="display: none;">
        <div class="panel panel-default" style="font-size: smaller;">
            <div class="panel-body">
                <h4><span id="formname"></span> Dog</h4>
                <form id="ajaxForm" method="post">
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="nameInput">Name:</label>
                                <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter name" value="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="ageInput">Age:</label>
                                <input type="text" class="form-control" id="ageInput" name="age" placeholder="Enter age" value="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="ownerInput">Owners:</label>
                                <input type="text" class="form-control" id="ownerInput" name="owner" placeholder="Enter owner" value="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="toysInput">Toys:</label>
                                <input type="text" class="form-control" id="toysInput" name="toys" placeholder="Enter toys" value="">
                                <input type="hidden" id="referenceInput" name="reference" value="">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-sm btn-success" value="Submit" />
                    <button id="buttonCancel" type="button" class="btn btn-sm btn-default" role="button">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div id="createButtonSection">
        <p>
            <button id="buttonCreate" type="button" class="btn btn-default" role="button">Create</button>
        </p>
    </div>
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
        <tbody id="tableBodySection">

        </tbody>
    </table>
@endsection

@section('script')
    <script type="text/javascript" src="js/ajaxscript.js"></script>
@endsection