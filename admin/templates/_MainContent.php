<div class="col-md-10 col-sm-8" style="padding-left: 10px;">
   
   <div class="row-fluid">
     <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-body users">
            <i class="fa fa-users fa-3x"></i> &nbsp; <span class="counter"><?= $num_users ?></span>
          </div>
          <div class="panel-footer">Total Users</div>
        </div>
     </div>
     <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-body cart">
            <i class="fa fa-shopping-cart fa-3x"></i> &nbsp; <span class="counter"><?= $num_shopping_cart ?></span>
          </div>
          <div class="panel-footer">Shopping Cart</div>
        </div>
     </div>
     <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-body tasks">
            <i class="fa fa-tasks fa-3x"></i> &nbsp; <span class="counter">54</span>
          </div>
          <div class="panel-footer">Tasks</div>
        </div>
     </div>
     <div class="col-md-3">
       <div class="panel panel-default">
          <div class="panel-body products">
            <i class="fa fa-shopping-bag fa-3x"></i> &nbsp; <span class="counter"><?= $num_products ?></span>
          </div>
          <div class="panel-footer">Products</div>
        </div>
     </div>
     <div class="clearfix"></div>
   </div>


   <div class="row-fluid">
     <div class="col-md-6">
       <div class="panel panel-default">
        <div class="panel-heading"><b>Transactions</b></div>
        <div class="panel-body">
          <div id="line-chart" style="width:100%"></div>
        </div>
      </div>
     </div>

     <div class="col-md-6">
       <div class="panel panel-default">
        <div class="panel-heading"><b>Earnings</b></div>
        <div class="panel-body">
          <div id="area-chart" style="width:100%;"></div>
        </div>
      </div>
     </div>

     <div class="col-md-6">
       <div class="panel panel-default">
        <div class="panel-heading"><b>Pages</b></div>
        <div class="panel-body">
          // list of pages
        </div>
      </div>
     </div>

     <div class="col-md-6">
       <div class="panel panel-default">
        <div class="panel-heading"><b>Categories</b></div>
        <div class="panel-body">
          // list of categories
        </div>
      </div>
     </div>
   </div>

  <table id="table-products" class="table table-bordered table-condensed table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Product ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Stock</th>
        <th>Size</th>
        <th>Equity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
    	<tr>
    		<td colspan="8" align="center">Data is empty</td>
    	</tr>
    </tbody>
  </table>


  <div class="row">
    <!-- Tasks Content -->
    <div class="col-md-4">
      <ul class="list-group">
        <h4 class="list-group-item-heading"><i class="fa fa-tasks"></i> Tasks Rountine</h4>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
        <li class="list-group-item">
          <span class="badge">14</span>
          Cras justo odio
        </li>
      </ul>
    </div>
    <div class="col-md-8">
      <div class="list-group">
        <h4>Contact Form</h4>
        <a href="#" class="list-group-item active">
          <h4 class="list-group-item-heading">Jhon Doe</h4>
          <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, saepe! Accusamus quasi mollitia laborum eligendi quibusdam! At maiores earum expedita vero recusandae vel consectetur natus! Suscipit eligendi, deserunt iste magni!</p>
        </a>
        <a href="#" class="list-group-item">
          <h4 class="list-group-item-heading">Jane Doe</h4>
          <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, saepe! Accusamus quasi mollitia laborum eligendi quibusdam! At maiores earum expedita vero recusandae vel consectetur natus! Suscipit eligendi, deserunt iste magni!</p>
        </a>
        <a href="#" class="list-group-item">
          <h4 class="list-group-item-heading">Thomson</h4>
          <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, saepe! Accusamus quasi mollitia laborum eligendi quibusdam! At maiores earum expedita vero recusandae vel consectetur natus! Suscipit eligendi, deserunt iste magni!</p>
        </a>
      </div>
    </div>
  </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Users</h4>
            </div>
            <form id="form-add" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <input type="submit" name="editUser" class="btn btn-primary" value="Update Users">
            </form>
            </div>
        </div>
    </div>
</div>