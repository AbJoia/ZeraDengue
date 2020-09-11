var i = 0;
setInterval(right, 7000);
function right(){
    var area = document.getElementById("area").offsetWidth;
    var sl = document.getElementById("sl").offsetWidth;
          
    if (i >= 2){
        i = 0;
    }else{
        i++;
    }
    document.getElementById("area").style.marginLeft = '-'+(i*sl)+'px';
      
}
function left(){    
    var area = document.getElementById("area").offsetWidth;
    var sl = document.getElementById("sl").offsetWidth;
    
    if (i == 0){
        i = 2;
        document.getElementById("area").style.marginLeft = '-'+(i*sl)+'px';        
    }else{        
        document.getElementById("area").style.marginLeft = '-'+((i*sl)- sl)+'px';
        i--;        
    }
}
function validarExtensaoImagem(){
    var arquivo = document.getElementById("inputFile");
    var file = arquivo.value;
    var ext = file.substring(file.lastIndexOf('.')+1);    

    if(file){
        if(ext == "jpeg" || ext== "jpg" || ext == "png"){             
            return true;
        }
        else{
            alert('Selecionar imagem em um formato aceito. ".jpeg" ou ".png"');        
            return false;
        }
    }
    return true;         
}
