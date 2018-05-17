<script>
  
  $(document).on("submit",".formarchivo",function(e){

        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");
        var importar = $('#importar').val();
        if(importar=="EGRESOS"){ var url = $("#route-importar-egresos").val().trim(); }
        if(importar=="GASTOS"){ var url = $("#route-importar-gastos").val().trim(); }
        if(importar=="BANCOS"){ var url = $("#route-importar-bancos").val().trim(); }
        if(importar=="CLIENTES"){ var url = $("#route-importar-clientes").val().trim(); }
        
        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);
        console.log(formData)
        console.log(importar)
        //hacemos la petición ajax   
        $.ajax({
            url: url,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $('#alert_message').html('<center><img src="/cargando.gif" width="50" heigh="50"></center>');   
            },
            //una vez finalizado correctamente
            success: function(data){
              console.log('success ajax DATA:', data);      
            },
            //si ha ocurrido un error
            error: function(data){
               $('#alert_message').html('ERROR'); 
                
            }
        });
        });
</script>