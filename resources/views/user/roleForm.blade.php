<fieldset>
    <!-- Form Name -->
    <legend>New role</legend>

    <!-- Text input-->
    <div class="form-group">
        <div class="row">
          <label class="col-md-2 control-label" for="textinput">Role name</label>  
            <div class="col-md-2">
              <input id="roleName" name="roleName" value = "@isset($role) {{$role->name}} @endisset" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <div class="row">
            <label class="col-md-2 control-label" for="singlebutton"></label>
            <div class="col-md-2">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</fieldset> 