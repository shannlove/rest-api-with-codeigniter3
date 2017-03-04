<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php $this->load->view('layout/header',$data); ?>
<div id="wrapper">
<main id="page-content-wrapper" role="main">        
<div class="col-md-12" id="submenu-2">
    <div class="row">
         <div class="mainbox col-md-12 col-sm-6 col-sm-8">
	<div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">User List</div>
              <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/welcome/add/">Add User</a></div>
            </div>
            <div class="panel-body" >
      <div class="col-md-12">
     
      <div class="table-responsive">
        <div class="success"><?php echo $this->session->flashdata('success'); ?></div>
	
             <table class="table table-bordred table-striped">
                 <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                <?php if(count($users)>0){ foreach($users as $user){ ?>
                <tr>
                    <td><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['link']; ?></td>
                    <td>
                        <a href="/welcome/edit/<?php echo $user['user_id']; ?>">Edit</a> | <a onclick="deleteUser('<?php echo $user['user_id']; ?>')" href="javascript:void(0);">Delete</a>
                    </td>
                </tr>
                <?php } } else { ?>
                    <tr><td colspan="5" align="center"><p class="alert alert-info">No Record found! </p></td></tr>
                <?php } ?>
                </tbody>
            </table>
           
	</div>
        </div>
        </div>
        </div>
        
</div>
</div>
        </main>
    </div> 
<?php $this->load->view('layout/footer',$data); ?>