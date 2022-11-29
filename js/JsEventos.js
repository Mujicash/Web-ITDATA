

$("#boton").on("click",function(event){
    event.preventDefault();
    console.log("xdd")
    Swal.fire({
        title: 'Registro Exitoso',
        icon: 'success',
        confirmButtonText: 'OK'
      }).then(function(){
        window.location.reload("index.php");
      })
 });