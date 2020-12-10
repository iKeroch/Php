
$("#cadastro").validate({
    rules : {
          name:{
                 required:true,
                 minlength:3
          },
          last_name:{
            required:true,
            minlength:3
     },
          email:{
                 required:true
          },
          passwd:{
                 required:true,
                 minlength:8
          },
          passwd_confirm:{
            equalTo: passwd,
                 required:true
          }                                  
    },
    messages:{
          name:{
                 required:"Por favor, informe seu nome",
                 minlength:"O nome deve ter pelo menos 3 caracteres"
          },
          last_name:{
            required:"Por favor, informe seu nome",
            minlength:"O nome deve ter pelo menos 3 caracteres"
     },
          email:{
                 required:"É necessário informar um email"
          },
          passwd:{
            required:"É necessário informar uma senha",
            minlength:"A senha deve ter pelo menos 8 caracteres"
     },
     passwd_confirm:{
        equalTo:"As senhas não coincidem",
       required:"É necessário confirmar sua senha"
}      
    }
});

