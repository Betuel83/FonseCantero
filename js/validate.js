$(function () {
  $('#quickForm').validate({
    rules: {
      name: {
        required: true
      },
      last_name: {
        required: true
      },
      email: {
        required: true,
        email: true,
      },
      tuition: {
        required: true
      },
      password: {
        required: true,
        minlength: 8,
        alphanumeric: true
      },
      repassword: {
        required: true,
        minlength: 8,
        equalTo: "#password"
      },
      terms: {
        required: true
      },
    },
    messages: {
      name: {
        required: "<p style=font-size:12px;color:red;>Coloca tu nombre(s)</p>"
      },
      last_name: {
        required: "<p style=font-size:12px;color:red;>Coloca tus apellidos</p>"
      },
      email: {
        required: "<p style=font-size:12px;color:red;>Introduce tu correo electrónico</p>",
        email: "<p style=font-size:12px;color:red;>Coloca una dirección de correo electrónico válida</p>"
      },
      password: {
        required: "<p style=font-size:12px;color:red;>Coloca tu contraseña</p>",
        minlength: "<p style=font-size:12px;color:red;>Tu contraseña debe tener al menos 8 caracteres</p>",
        alphanumeric: "<p style=font-size:12px;color:red;>La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial</p>"
      },
      repassword: {
        required: "<p style=font-size:12px;color:red;>Coloca de nuevo tu contraseña</p>",
        minlength: "<p style=font-size:12px;color:red;>Tu contraseña debe tener al menos 8 caracteres</p>",
        equalTo: "<p style=font-size:12px;color:red;>Tu contraseña no coincide, favor de volver a colocar</p>"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


function registerOk(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.success('Buen trabajo, cuenta creada con éxito, revise su correo y su carpeta de correo no deseado.')
}


function registerError(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.error('Error, no se pudo crear la cuenta, vuelva a intentarlo.')
}

function registerErrorEmail(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.error('Error, el correo ya esta registrado, favor de colocar un correo diferente.')
}

function activateAccount(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.success('Bienvenido, cuenta activada con éxito.')
}


function activeUserError(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.error('Error, su usuario está deshabilitado.')
}


function errorActivateAccount(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.error('Error, correo electrónico no ha sido confirmado')
}


function errorUserPassword(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.error('Error, correo electrónico y contraseña no son válidos.')
}


function expiredSession(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.info('Sesión caducada, vuelve a introducir tus credenciales de acceso.')
}


function recoverPassword(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.info('Revisa tu correo electrónico para cambiar tu contraseña, revisa tu carpeta spam.')
}


function errorRecoverPassword(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.error('Error, el correo electrónico no es válido.')
}


function recoverSucc(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.success('Contraseña actualizada exitosamente.')
}


function recoverErr(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.error('Error, no se pudo actualizar su contraseña.')
}


function ExpirationUserError(){
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
   toastr.error('Lo sentimos, su cuenta ha caducado, le invitamos a renovar su cuenta.')
}