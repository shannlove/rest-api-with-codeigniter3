<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php $this->load->view('layout/header',$data); ?>
<div id="wrapper">
    <main id="page-content-wrapper" role="main">
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	<div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title">Test Form</div>
              <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/welcome/index/">User List</a></div>
            </div>
            <div class="panel-body" >
         <div class="row">
			<div id="status"><div class="success"><?php echo $this->session->flashdata('success'); ?></div> </div>
        </div>
        
	
	<?php echo validation_errors(); ?>

	<?php echo form_open('welcome/add/'); ?>
        <fieldset>
            <div class="col-xs-12">
                                <div class="form-group required">
                                        <label class="control-label" for="name">Name</label>
                                        <input type="text" name="name" value="<?php echo isset($user)?$user['name']:''; ?>" placeholder="name" id="name" class="form-control">
                                        <p class="error"></p>
                                </div>
            </div>
             <div class="col-xs-12">
                                <div class="form-group required">
                                        <label class="control-label" for="email">Email Address</label>
                                        <input type="text" name="email" value="<?php echo isset($user)?$user['email']:''; ?>" placeholder="email address" id="email" class="form-control">
                                        <p class="error"></p>
                                </div>
            </div>
             <div class="col-xs-12">
                                <div class="form-group required">
                                        <label class="control-label" for="link">Link</label>
                                        <input type="text" name="link" value="<?php echo isset($user)?$user['link']:''; ?>" placeholder="link" id="link" class="form-control">
                                        <p class="error"></p>
                                </div>
            </div>
        </fieldset>
	<div class="buttons myaccount_button clearfix">
                        <div class="pull-right" id="SubmitBtn">
                                <button class="btn btn-primary"> Submit </button>
                        </div>
                </div>
           
	</form>
        </div>
            </div>
	</div>
        </main>
</div>

<?php $this->load->view('layout/footer',$data); ?>
