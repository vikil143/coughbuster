 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <h3>Admin Panel Users
               <small>Find all the list of Users</small>
            </h3>
            <div class="container-fluid">
             <a href="<?= site_url('Admin/adduser') ?>"><button class="btn btn-success"> Add MD </button></a> &nbsp;&nbsp;
               <!-- START DATATABLE 2 -->
               <div class="row">
			   	<div class="col-lg-12">
						 <div class="panel panel-default dN" id="update_form">
						   
						</div>
						 
					</div>
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            Users |
                           <small>All Users</small>
                        </div>
                        <div class="panel-body">
                           <table id="datatable" class="table table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th>Name</th>
                                    <th>MR Mobile Number</th>
                                    <th class="sort-numeric">TM Access Code</th>
                                    <th class="no-sort">Actions</th>
                                 </tr>
                              </thead>
							     
                              <tbody>
						            <?php 
                              if (!empty($users_data)) {
                              foreach ($users_data as $value) {  ?>
											  <tr>
												<td><?php echo $value['name']; ?></td>
												<td><?php echo $value['mobile_no']; ?></td>
												<td><?php echo $value['tm_access_code']; ?></td>
                                    <td>
												<div class="btn-group mb-sm">
                                       <?php if ($value['user_status'] == 0) { ?>
												   <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-success">Active
													  <span class="caret"></span>
												   </button>
                                    <?php }else{ ?>
                                       <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-warning">InActive
                                         <span class="caret"></span>
                                       </button>
                                    <?php } ?>
												   <ul role="menu" class="dropdown-menu">
                                         <li><a class="edit" href="<?= site_url('Admin/view_all_doctors?id='.$value['id'].'&tm_access_code='.$value['tm_access_code'].'') ?>">View All Doctors</a>
                                         </li>
                                         <li class="divider"></li>
													  <!-- <li><a class="edit" href="<?= site_url('Admin/edit_mr?id='.$value['id'].'') ?>" >Edit</a>
													  </li>
													  <li class="divider"></li>-->
													  <li><a class="delete" href="#" onclick="return DeleteUser(<?php echo $value['id']; ?>);">Delete</a>
													  </li> 
												   </ul>
												</div>
                                    </td>
										   <?php } } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END DATATABLE 2 -->
              
            </div>
         </div>
</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
} );
</script>
<script type="text/javascript">
function DeleteUser(remove_user_id){
   //alert(remove_user_id);
   var r = confirm("Are you sure you want delete user");
   if (r == true) 
   {
      $.ajax({
         type: "POST",
         url: "<?= site_url('Admin/add_delete') ?>",
         async : false,
         data:{'mr_id':remove_user_id ,'reqtype':'mr_user'},
         success : function(data){
               //console.log(data);
                if (data != '') {
                  //console.log(data);
                  alert('Successfully Deleted User.!!');
                  location.reload(true);
               }
            }
      });
   } 
   else 
   {
      r = alert("You pressed Cancel!");
   }
}

</script>