class RutValidador{
    constructor(rut){
        this.rut = rut;
        // obtenemos el ultimo caracter del rut
        this.dv = this.rut.substring(this.rut.length -1);
        // limpiamos el rut, dejando solamente los numeros 
        this.rut = this.rut.substring(0, this.rut.length -1).replace(/\D/g,'');
        this.esValido = validarRut();
    }
    validarRut(){
        let numerosArray = this.rut.split('')
        console.log(numerosArray)
    }
}
let clasValidador = new RutValidador('30.686.957-4')
