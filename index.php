
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>


    <!-- Custom styles for this template -->
    <link href="" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <p class="h1 text-center">List of Registered Users</p>
      <span id="success" class="text-success" align="center"></span>
      <div class="table-fluid">
        <p class="text-right">
          <div align="right">
            <button type="button" id="add-btn" data-toggle="modal" data-target="#userModal" class="btn btn-outline-primary btn-lg reset">Add User</button>
          </div>
        </p>
        <table id="user-data" class="table table-bordered table-condensed">
          <thead>
            <tr>
              <th width="10%">Image</th>
              <th width="35%">First Name</th>
              <th width="35%">Last Name</th>
              <th width="10%">Edit</th>
              <th width="10%">Delete</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
  <script src="js/main.js"></script>
  <div id="userModal" class="modal fade">
    <div class="modal-dialog">
      <form method="post" id="user-form" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title h3">Add User</p>
            <button type="button" class="close reset" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <span id="errors" class="text-danger"></span>
            <div class="form-group">
              <label>Enter First Name</label>
              <input type="text" name="fname" id="fname" class="form-control">
            </div>
            <div class="form-group">
              <label>Enter Last Name</label>
              <input type="text" name="lname" id="lname" class="form-control">
            </div>
            <div class="form-group">
              <label for="uimg" class="btn btn-success" id="avatar">Add Image</label>
              <input type="file" name="uimg" id="uimg" class="form-control d-none">
              <span id="u_uploaded_img"></span>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="uid" id="uid">
              <input type="hidden" name="operation" id="operation">
              <div class="btn-group text-right">
                <input type="submit" name="action" id="action" class="btn btn-success" value="Add">
                <button type="button" class="btn btn-danger reset" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  </body>
</html>
