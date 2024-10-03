<div class="modal fade" id="logout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ready to logout?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to logout?</div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="index.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="position">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Position</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?positionFunction=true" method="post">
          <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control" placeholder="Position" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="order">Order of Position</label>
            <select name="order" class="form-control select2Order select2-success" id="order" data-dropdown-css-class="select2-success" style="width: 100%;">
              <?php
                for ($i=1; $i <= 20; $i++) { 
                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="count">Count of Winner/s</label>
            <select name="count" class="form-control select2Count select2-success" id="count" data-dropdown-css-class="select2-success" style="width: 100%;">
              <?php
                for ($i=1; $i <= 20; $i++) { 
                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
              ?>
            </select>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="party">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Party</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="partyQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?partyFunction=true" method="post">
          <div class="form-group">
            <label for="party">Party</label>
            <input type="text" name="party" id="party" class="form-control" placeholder="Party" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Logo</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="partyImg" accept=".jpg, .jpeg, .png" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="candidate">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Candidate</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="candidateQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?candidateFunction=true" method="post">
          <div class="form-group">
            <label for="candidate">Candidate</label>
            <input type="text" name="candidate" id="candidate" class="form-control" placeholder="Candidate" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Photo</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="candidateImg" accept=".jpg, .jpeg, .png" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="position">Position</label>
            <select name="position" class="form-control select2Position select2-success" id="position" data-dropdown-css-class="select2-success" style="width: 100%;">
              <?php
                $positions = $queryRepoMain->getPosition($dbc1, NULL);                
                foreach ($positions as $position) {
                  echo '<option value="'.$position['ID'].'">'.$position['Name'].'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="party">Party</label>
            <select name="party" class="form-control select2Party select2-success" id="party" data-dropdown-css-class="select2-success" style="width: 100%;">
              <?php
                $parties = $queryRepoMain->getParty($dbc1, NULL);                
                foreach ($parties as $party) {
                  echo '<option value="'.$party['ID'].'">'.$party['Name'].'</option>';
                }
              ?>
            </select>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="voter">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Voter</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="voterQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?voterFunction=true" method="post">
          <div class="form-group">
            <label for="idNumber">ID Number</label>
            <input type="text" name="idNumber" id="idNumber" class="form-control" placeholder="ID Number" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="user">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?userFunction=true" method="post">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="surname">Last Name</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
