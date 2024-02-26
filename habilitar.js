/*Habilitar boton buscar*/
function habilitar(){
    busqueda_nit = document.getElementById("busqueda_nit").value;
    val = 0;

    if(busqueda_nit ==""){
        val++;
    }
    if(val == 0){
        document.getElementById("buscar").disabled = false;
    } else {
        document.getElementById("buscar").disabled = true;
    }
}
document.getElementById("busqueda_nit").addEventListener("keyup", habilitar);
document.getElementById("buscar").addEventListener("click", () =>{
});