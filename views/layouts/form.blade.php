<!--
| StAuth10065: I Dylan Hernandez, 000307857 certify that this material is my original work. 
| No other person's work has been used without due acknowledgement. 
| I have not made my work available to anyone else.
-->

<div class="panel panel-default" style="font-size: smaller;">
    <div class="panel-body">
    @if(isset($form) && isset($data))
        <h4>{{ucfirst($form)}} Dog</h4>
        <form action="{{url($data['reference'])}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="nameInput">Name:</label>
                        <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter name" value="{{ $data['name'] }}">
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="ageInput">Age:</label>
                        <input type="text" class="form-control" id="ageInput" name="age" placeholder="Enter age" value="{{ $data['age'] }}">
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="ownerInput">Owners:</label>
                        <input type="text" class="form-control" id="ownerInput" name="owner" placeholder="Enter owner" value="{{ $data['owner'] }}">
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label for="toysInput">Toys:</label>
                        <input type="text" class="form-control" id="toysInput" name="toys" placeholder="Enter toys" value="{{ $data['toys'] }}">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-sm btn-success" value="Submit" />
            <a href="{{url('/crud')}}" class="btn btn-sm btn-default" role="button">Cancel</a>
        </form>
    @endif
    </div>
</div>