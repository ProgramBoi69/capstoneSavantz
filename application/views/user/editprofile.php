<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo base_url('images/828Logo.png')?>">
  <title>
    828 Account Settings Page
  </title>
 <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url("CSS/style.css")?>" >
  <style>
    .container{
      position:relative;
      top:5em;
    }
    .modal {
      position: fixed;
      display: flex;
      justify-content: center;
      width: 100%;
      height: 100vh;
      background-color: rgba(63, 63, 63, .5);
      opacity: 0;
      visibility: hidden;
      transition: opacity .4s;
    }
    .modal[data-visible="true"] {
      opacity: 1;
      visibility: visible;
    }

    :root{
      --mar:rgb(149, 20, 41);
    }
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    section{
      padding:2rem;
    }
    .shadow {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
      }

      .profile-tab-nav {
        min-width: 250px;
      }

      .tab-content {
        flex: 1;
      }

      .form-group {
        margin-bottom: 1.5rem;
      }

      .nav-pills a.nav-link {
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
        border-radius: 0;
        color: #333;
      }
      a .nav-link .active{
        background-color:#dc3545;
      }
      .img-circle img {
        height: 100px;
        width: 100px;
        border-radius: 100%;
        border: 5px solid #fff;
      }
      #exampleModal{
        position:absolute;
      }
      a{
        font-size:3rem;
      }
      a:hover{
        color:var(--mar);
      }
      nav{
        justify-content:flex-start;
      }
  </style>
</head>

<body>
      <nav>
        <a href="<?php echo base_url('landing') ?>" style="text-decoration:none">
          Back
        </a>
      </nav>
      <section>
        <?php foreach($infos as $info){?>
          <div class="container justify-content-center">
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
              <div class="profile-tab-nav border-right">
                <div class="p-4">
                  <div class="img-circle text-center mb-3">
                    <img src="<?php echo ($_SESSION['profilepic']==NULL)?base_url('images/guest_pic.jpg'):base_url("uploads/".$_SESSION['profilepic']);?>" >
                    <br>
                  </div>
                  <h4 class="text-center"><?php echo (($info->firstname)=="---"||($info->lastname)=="---"||($info->firstname==null)||($info->lastname==null))?"User":$info->firstname." ".$info->lastname ?><br>                  
                  <a class="btn bg-primary edit-pic" style="color:white;" aria-expanded="false" aria-controls="toggle-modal">
                          Edit Image
                          </a>
                          <!-- Modal -->
                          <div class="modal" id="toggle-modal" data-visible="false">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h2 class="card-title" style = "font-family: Inter, sans-serif; font-weight:900"> Upload a File</h2>
                                  <button class="btn-close"  aria-expanded="false" aria-controls="toggle-modal" aria-label="Close"></button>
                                </div>
                                <form action="account/update/avatar" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="file" class="form-control-file" name="filename" aria-describedby="fileHelpId">
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" value="Update"class="btn bg-success" style = "font-family: Inter, sans-serif; font-weight:700">
                                </div>
                                </form>
                              </div>
                            </div>
                  </h4>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <!---server side form validation for password-->
                  <?php if(!empty(validation_errors())){ ?>
                    <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                      <i class="fa fa-home text-center mr-1"></i>
                      Account
                    </a>
                    <a class="nav-link active" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                      <i class="fa fa-key text-center mr-1"></i> 
                      Password
                    </a>
                  <?php }else{?>
                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                      <i class="fa fa-home text-center mr-1"></i>
                      Account
                    </a>
                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                      <i class="fa fa-key text-center mr-1"></i> 
                      Password
                    </a>
                  <?php }?>
                </div>
              </div>
              <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <!-- server-side form validation for password -->
                <?php if(!empty(validation_errors())){ ?>
                  <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">Account Settings</h3>
                    <div class="row">
                      <div class="col-md-6">
                        <form id='submitForm'>
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id='fn' name="firstname" class="form-control" value="<?php echo $info->firstname?>">
                            <small id='fn-err' class="form-text text-muted"><?php echo form_error('firstname') ?></small>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" id='ln' name="lastname" class="form-control" value="<?php echo $info->lastname?>">
                                <small id='ln-err' class="form-text text-muted"><?php echo form_error('lastname') ?></small>    
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" value="<?php echo $info->email?>" name="email" class="form-control" readonly>
                                <small id="helpid" class="form-text text-muted"><?php echo form_error('email') ?></small>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <br>
                                <input id="ph" type="tel" placeholder="e.g. 09765121120" maxlength="11" value="<?php echo $info->phone?>" id='' name="phone" class="form-control">
                                <small id='ph-err' class="form-text text-muted"><?php echo form_error('phone') ?></small>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Date</label>
                                <input type="date" id='bd' name="birthdate" class="form-control" value="<?php echo $info->birthday?>">
                                <small id='bd-err' class="form-text text-muted"><?php echo form_error('birthdate') ?></small>
                            </div>
                          </div>
                        </div>
                        <div>
                          <button onclick="formHandler(event)" class="btn bg-success">Update</button>
                        </div>
                      </form>
                  </div>
                  <div class="tab-pane fade show active" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <h3 class="mb-4">Password Settings</h3>
                    <form action="<?php echo base_url('account/update/password')?>" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Old password</label>
                            <input type="password" name="password" class="form-control">
                            <small id="helpid" class="form-text text-muted"><?php echo form_error('password') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>New password</label>
                            <input type="password" name="newpassword" class="form-control">
                            <small id="helpid" class="form-text text-muted"><?php echo form_error('newpassword') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Confirm New password</label>
                            <input type="password" name="confpassword" class="form-control">
                            <small id="helpid" class="form-text text-muted"><?php echo form_error('confpassword') ?></small>
                          </div>
                        </div>
                      </div>
                      <div>
                        <button type="submit" class="btn bg-success">Update</button>
                      </div>
                    </form>
                  </div>
                <?php }else{ ?>
                  <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">Account Settings</h3>
                    <div class="row">
                      <div class="col-md-6">
                        <form id='submitForm'>
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" id='fn' name="firstname" class="form-control" value="<?php echo $info->firstname?>">
                            <small id='fn-err' class="form-text text-muted"><?php echo form_error('firstname') ?></small>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" id='ln' name="lastname" class="form-control" value="<?php echo $info->lastname?>">
                                <small id='ln-err' class="form-text text-muted"><?php echo form_error('lastname') ?></small>    
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" value="<?php echo $info->email?>" name="email" class="form-control" readonly>
                                <small id="helpid" class="form-text text-muted"><?php echo form_error('email') ?></small>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <br>
                                <input id="ph" type="tel" placeholder="e.g. 09765121120" maxlength="11" value="<?php echo $info->phone?>" id='' name="phone" class="form-control">
                                <small id='ph-err' class="form-text text-muted"><?php echo form_error('phone') ?></small>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Date</label>
                                <input type="date" id='bd' name="birthdate" class="form-control" value="<?php echo $info->birthday?>">
                                <small id='bd-err' class="form-text text-muted"><?php echo form_error('birthdate') ?></small>
                            </div>
                          </div>
                        </div>
                        <div>
                          <button onclick="formHandler(event)" class="btn bg-success">Update</button>
                        </div>
                      </form>
                  </div>
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <h3 class="mb-4">Password Settings</h3>
                    <form action="<?php echo base_url('account/update/password')?>" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Old password</label>
                            <input type="password" name="password" class="form-control">
                            <small id="helpid" class="form-text text-muted"><?php echo form_error('password') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>New password</label>
                            <input type="password" name="newpassword" class="form-control">
                            <small id="helpid" class="form-text text-muted"><?php echo form_error('newpassword') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Confirm New password</label>
                            <input type="password" name="confpassword" class="form-control">
                            <small id="helpid" class="form-text text-muted"><?php echo form_error('confpassword') ?></small>
                          </div>
                        </div>
                      </div>
                      <div>
                        <button type="submit" class="btn bg-success">Update</button>
                      </div>
                    </form>
                  </div>
                <?php } ?>
                
              </div>
            </div>
        <?php } ?>
      </section>
  <script>
    var toggled=false;
    function menuToggle(){
      let toggleMenu = document.querySelector('.menu');
      toggleMenu.classList.toggle('active');
      if(toggled==false){
        toggleMenu.style.visibility="visible";
        toggleMenu.style.opacity=1;
        toggled=true; 
      }
      else{
        toggleMenu.style.visibility="hidden";
        toggleMenu.style.opacity=0;  
        toggled=false; 
      }
    }
    function toggleModalVisibility(modalId,button,attribute){
      if(button===null){
        return;
      }
      const modal=document.querySelector(modalId);
      button.addEventListener("click",()=>{
        const visible = modal.getAttribute(attribute);
        modal.setAttribute(attribute, visible === "true" ? "false" : "true");
        button.setAttribute("aria-expanded", visible === "true" ? "false" : "true");
      });
    }
    function toggleInputEvents(input,inputErr,validationFunction){
      let error=document.querySelector(inputErr);
      input.addEventListener('input',(event)=>{
        let value=input.value;
        console.log(value);
        validationFunction(value,error);
      });
    }
    function validateFirstName(fn='',err=''){
      let lettersReg=/^[A-Za-z\s]+$/;
      if(fn.length==0){
        err.textContent="First name is required!"; 
        return false;
      }
      if(lettersReg.test(fn)==false){
        err.textContent="First name must be alphabetical!";
        return false;
      }
      err.textContent="";
      return true;
    }
    function validateLastName(ln='',err=''){
      let lettersReg=/^[A-Za-z\s]+$/;
      if(ln.length==0){
        err.textContent="Last name is required!"; 
        return false;
      }
      if(lettersReg.test(ln)==false){
        err.textContent="Last name must be alphabetical!";
        return false;
      }
      err.textContent="";
      return true;
    }
    function validatePhone(ph='',err=''){
      let phoneReg=/^\d+$/;
      if(ph.length==0||ph.length<11){
        err.textContent="Phone number is required!";
        return false;
      }
      if(phoneReg.test(ph)==false){
        err.textContent="Phone number does not contain an alphabet";
        return false;
      }
      err.textContent="";
      return true;
    }
    function validateBirthDate(bd='',err=''){
      if(bd.length==0){
        err.textContent="Birthdate is required!";
        return false;
      }
      err.textContent="";
      return true;
    }
    function submitForm(){
      const form=document.querySelector('#submitForm');
      form.action="account/update";
      form.method="POST";
      form.submit();
    }
    function formHandler(event){
      event.preventDefault();
      let formValid={
        'birthday':validateBirthDate(bdInput.value,'#bd-err'),
        'phone':validatePhone(phInput.value,'#ph-err'),
        'lastname':validateLastName(lnInput.value,'#ln-err'),
        'firstname':validateFirstName(fnInput.value,'#fn-err')
      }
      for(const key in formValid){
        if(formValid[key]==false){
          console.log(formValid[key]);
          return;
        }
      }
      submitForm();
    }
    const updatePicButton=document.querySelector('.edit-pic');
    toggleModalVisibility('#toggle-modal', updatePicButton, "data-visible");
    const closePicButton=document.querySelector(".btn-close");
    toggleModalVisibility('#toggle-modal', closePicButton, "data-visible");
    const fnInput=document.querySelector('#fn');
    toggleInputEvents(fnInput,'#fn-err',validateFirstName);
    const lnInput=document.querySelector('#ln');
    toggleInputEvents(lnInput,'#ln-err',validateLastName);
    const phInput=document.querySelector('#ph');
    toggleInputEvents(phInput,'#ph-err',validatePhone);
    const bdInput=document.querySelector('#bd');
    toggleInputEvents(bdInput,'#bd-err',validateBirthDate);
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>