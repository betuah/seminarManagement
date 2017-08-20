 <!-- Modal Print -->
<div class="modal-header" align="center">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel"><b>Change Password</b></h4>
</div>
<div class="modal-body">
  <form action="<?php echo base_url(); ?>user/update/view_user/profil" class="smart-form" id="edit-password" novalidate="novalidate" method="post">  
    <fieldset>
      <div class="row">
        <section class="col col-6" hidden="">
          <label class="input"> <i class="icon-append fa fa-user"></i>
            <input type="text" name="idusr" placeholder="ID User" value="<?php echo $id['id_usr'] ?>" readonly="">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" 
            value="<?php echo $this->security->get_csrf_hash(); ?>">
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i id="icon-append fa fa-eye-slash"></i>
            <input type="hidden" name="old_pass1" placeholder="current password" value="<?php echo $id['password'] ?>">
            <input type="password" name="old_pass" id="old_pass" placeholder="current password">
          </label>
          <label class="select">
            <input type="checkbox" id="cek"> <label id="showhide">Show</label>
          </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
      <div class="row">
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-eye-slash"></i>
            <input class="active" type="password" name="new_pass" id="new_pass" placeholder="New Password">
            <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
          </label>
        </section>
        <section class="col col-6">
          <label class="input"> <i class="icon-append fa fa-eye-slash"></i>
            <input class="active" type="password" name="re_pass" id="re_pass" placeholder="Retype Password">
            <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
          </label>
        </section>
      </div>
    </fieldset>

    <fieldset>
    </fieldset>
    <!-- End View GET Event -->   

    <footer>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </footer>
  </form>
</div>
<!--End Modal -->

<script type="text/javascript">
  var masukanpass = document.getElementById('old_pass'),
      chk  = document.getElementById('cek'),
      label = document.getElementById('showhide');


     chk.onclick = function () {

      if(chk.checked) {

           masukanpass.setAttribute('type', 'text');
           label.textContent = 'Hide';
       } else {

           masukanpass.setAttribute('type', 'password');
           label.textContent = 'Show';
       }
 
     }
</script>
<script type="text/javascript">

  var $registerForm = $("#edit-password").validate({
      // Rules for form validation
      rules : {
        old_pass : {
          required : true,
          minlength : 3,
          maxlength : 20
        },
        new_pass : {
          required : true,
          minlength : 3,
          maxlength : 20
        },
        re_pass : {
          required : true,
          minlength : 3,
          maxlength : 20,
          equalTo : '#new_pass'
        }
      },

      // Messages for form validation
      messages : {
        old_pass : {
          required : 'Please enter your current password'
        },
        new_pass : {
          required : 'Please enter new password'
        },
        re_pass : {
          required : 'Please enter your password one more time',
          equalTo : 'Please enter the same password as beside'
        }
      },

      // Do not change code below
      errorPlacement : function(error, element) {
        error.insertAfter(element.parent());
      }
    });

</script>
<script type="text/javascript">
  $(document).ready(function()
  {
    $('.tmplfile').hide();
    $('#form').change(function()
    {
      if($('#form').val()=='1')
      {
        $('#file').show();
        $('#file2').hide();
      }
      else if($('#form').val()=='2')
      {
        $('#file2').show();
        $('#file').hide();
    }
  });
});
</script>