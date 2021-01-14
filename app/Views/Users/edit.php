<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">

        <!-- Users Table -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                </div>
                <div class="card-body py-3">
                    <form id="createUserForm">
                        <div class="form-group row">
                            <label class="col-md-2 mb-0 p-2">Name</label>
                            <input type="text" id="name" name="name" class="form-control col-md-10" placeholder="Enter Name.." required>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 mb-0 p-2">Username</label>
                            <input type="text" id="username" name="username" class="form-control col-md-10" placeholder="Enter Userame.." required>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 mb-0 p-2">Role</label>
                            <select id="role" class="form-control col-md-10" required>
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
  getUserData();

  function getUserData(){
    $.ajax({
        url: '<?php echo base_url()?>/api/users/<?php echo $user->id?>',
        type: 'get',
        success: function (data) {
              
           var a = JSON.stringify(data),
           n = JSON.parse(a);
           $('#name').val(n.name)
           $('#username').val(n.username)
           $('#role').val(n.role_id)
            
        },
    });
  }

    $( "#createUserForm" ).submit(function( event ) {
       event.preventDefault();
       var data = {
            name : $('#name').val(),
            username : $('#username').val(),
            password : $('#password').val(),
            role_id : $('#role').val(),
       }
       
       $.ajax({
           url: '<?php echo base_url()?>/api/users/<?php echo $user->id?>',
           type: 'put',
           dataType: 'json',
           data: JSON.stringify(data),
           contentType: 'application/json',
           success: function (data) {
                 
              var a = JSON.stringify(data),
              n = JSON.parse(a);

              if (n.error == 'null' || n.error == null) {
                Swal.fire({
                  title: 'Success!',
                  text: n.messages.success,
                  icon: 'success',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  window.location.href = '<?php echo base_url()?>/users'; 
                });

                setTimeout(function(){
                  window.location.href = '<?php echo base_url()?>/users'; 
                }, 1600);
              }else{
                Swal.fire({
                  title: 'Error!',
                  text: n.messages.success,
                  icon: 'error',
                  confirmButtonText: 'OK'
                });

              }
               
           },
       });

    });    
</script>