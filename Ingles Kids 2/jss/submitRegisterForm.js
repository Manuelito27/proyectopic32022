
function subir()
        {
            let ap=document.getElementById("ApellidoP").value;
            let am=document.getElementById("ApellidoM").value;
            let name=document.getElementById("Nombre").value;
            let pass=document.getElementById("Pass").value;
            let passC=document.getElementById("PassC").value;
            let alertText=document.getElementById("alerta-text");
            if(name=="")
            {
                alertText.textContent="No se escribió ningún nombre";
                alerta.classList.remove("ocultar");
            }
            else if(ap=="" || am=="")
            {
                alertText.textContent="Faltan algunos apellidos";
                alerta.classList.remove("ocultar");
            }
            else if(pass=="")
            {
                alertText.textContent="No se escribió ninguna contraseña";
                alerta.classList.remove("ocultar");
            }
            else if (pass!=passC)
            {
                alertText.textContent="Las contraseñas no coinciden";
                alerta.classList.remove("ocultar");	
            }
            else{
                document.getElementById("btnSubmit").click();
            }
        }
        function ocultar(){
            let alerta=event.srcElement.parentNode;
            alerta.classList.add("ocultar");
        }