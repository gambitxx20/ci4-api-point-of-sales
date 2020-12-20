<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Users Table -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users Tables</h6>
                </div>
                <div class="card-body py-3">
                    <a href="<?php echo base_url()?>/users/create" class="btn btn-success btn-sm">
                        <i class="fas fa-user-plus mr-1"></i>
                        Create User
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dt-responsive" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Last Login</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable( {
            "ajax": {
                type : "GET",
                url : "<?php echo base_url()?>/api/users",
                dataSrc: function ( json ) {
                    //Make your callback here.
                    console.log(json.data.length);
                    return json.data;
                }       
            },columns: [
                { data: "name" },
                { data: "username" },
                { data: "role_name" },
                { data: "last_login" },  
                { render: function ( data, type, row ) { // Tampilkan kolom aksi
                        var html  = "<a href='<?php echo base_url("users/edit")?>/"+row.id+"'>Edit</a> | ";
                        html += "<a href=''>Delete</a>";
                        return html
                    }
                },
            ]
        });
    });
</script>