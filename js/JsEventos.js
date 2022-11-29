

$("#boton").on("click",function(event){
    event.preventDefault();
    console.log("xD")
    Swal.fire({
        title: 'Registro Exitoso',
        text: 'Revisa tu correo',
        icon: 'success',
        confirmButtonText: 'OK'
      }).then(function(){
        window.location.reload("index.php");
      })
 });