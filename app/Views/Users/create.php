<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">

        <!-- Users Table -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create New User</h6>
                </div>
                <div class="card-body py-3">
                    <form id="createUserForm">
                        <div class="form-group row">
                            <label class="col-md-2 mb-0 p-2">Name</label>
                            <input type="text" id="name" name="name" class="form-control col-md-10" placeholder="Enter Name..">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 mb-0 p-2">Username</label>
                            <input type="text" id="username" name="username" class="form-control col-md-10" placeholder="Enter Userame..">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 mb-0 p-2">Password</label>
                            <input type="password" id="password" name="password" class="form-control col-md-10" placeholder="Enter Password..">
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 mb-0 p-2">Role</label>
                            <select id="role" class="form-control col-md-10">
                                <?php  foreach($roles as $role){ ?>
                                    <option value="<?php echo $role->id?>"><?php echo $role->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 mb-0 p-2"></label>
                            <div class="col-md-10 d-inline-block pl-0">
                                <input type="submit" name="submit" class="btn btn-primary ml-0">
                                <a href="<?php echo base_url('users')?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $( "#createUserForm" ).submit(function( event ) {
       event.preventDefault();
       var data = {
            name : $('#name').val(),
            username : $('#username').val(),
            password : $('#password').val(),
            role_id : $('#role').val(),
       }
       
       $.ajax({
           url: '<?php echo base_url()?>/api/users',
           type: 'post',
           dataType: 'json',
           data: JSON.stringify(data),
           contentType: 'application/json',
           success: function (data) {
                 
               var a = JSON.stringify(data),
               n = JSON.parse(a);

               console.log(n.messages);
               
           },
       });

     });    
</script>