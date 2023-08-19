//função que faz visualizar a senha e apagar
let olho = document.querySelector(".fa-eye");

    olho.addEventListener("click", () =>{
    let inputSenha = document.querySelector("#senha")
            
        if (inputSenha.getAttribute('type') == 'password'){
        inputSenha.setAttribute('type', 'text')
        }else{
        inputSenha.setAttribute('type', 'password')
        }
    }
);



