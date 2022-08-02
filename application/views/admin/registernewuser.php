<?php $this->load->view('admin/navbar');?>

<h3 class="subheading1" style="position: relative;top: 37px; width: 13%;">Add New User</h3>

            
  
     <div class="border1">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="<?php echo base_url()?>admin/registeruseraction" method="POST" autocomplete="off" id="myForm">
                    <div class="row ">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <small for="email">Email address :</small>
                        <input type="email" class="form-control"  placeholder="Enter email" name="email" required>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <small for="">Password :</small>
                        <input type="password" class="form-control" name="password" placeholder="Retype new password"  autocomplete="nope" required pattern="^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" title="Must contain at least one number,one special character, one uppercase, and at least 8 characters">
                        
                        <small class="pull-left" style="font-size:10px;padding-left:0px;display:block">* Must have 3 of Upper, Lower, Number, Special Character</small>
                    </div>
                        
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <small for="">Role :</small>
                   
                    <select class="form-control"  name="role">
                        <?php 
                        echo '<option value="replica-'.ucfirst($this->session->userdata('role')).'">'. ucfirst($this->session->userdata('role')).' (Replicate)</option>';
                        $roles=array('admin',"whole_saler","admin1","admin2");
                        $flag=0;
                        foreach($roles as $role){
                            if($this->session->userdata('role')==$role){
                                $flag=1;
                                continue;
                            }
                            if($flag==1){
                                echo '<option value="'.$role.'">'.ucfirst($role).'</option>';
                            }
                            
                        }
                        
                        ?>
                        <option value="user">User</option>
       
                    </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <small for="">Access level :</small>
                   
                    <select class="form-control"  name="access_level">
                       <option value="RW">Read-Write</option> 
                       <option value="R" >Read-Only</option> 
                    </select>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 ">
                        <input type="submit" value="Add User"  id="adminregisbtn"  class="btn-success">
                    </div>
                    
                    </div>
                    <div class="formstatus">
                        
                    </div>
                </form>
            </div>
        </div>
        </div>

        <h3 class="subheading1" style="position: relative;top: 23px; width: 16%; ">Admin Information</h3>
            <div class="border overf">
                <table class="table table-bordered tbl1">
                    <thead>
                        <tr>
                            <td>Id </td>
                            <td>Email Address</td>
                            <td>Role</td>
                            <td>Access level</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        
                        
                          $countuser=count($userdata);
                          for($i=0;$i<$countuser;$i++)
                          {
                              if($userdata[$i]->role!="user")
                              {
                        ?>
                              <tr>
                                  <td><?php echo $userdata[$i]->cust_id;?></td>
                                  <td><?php echo $userdata[$i]->email;?></td>
                                  <td><?php echo $userdata[$i]->role;?></td>
                                  <td><?php echo $userdata[$i]->access_level;?></td>
                              </tr>                      
                              <?php  
                              }
                          }
                      
                        ?>
                    </tbody>
                </table>
            </div>