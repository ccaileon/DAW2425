import { Component } from '@angular/core';

@Component({
  selector: 'app-directiva-for2',
  standalone: false,
  templateUrl: './directiva-for2.component.html',
  styleUrl: './directiva-for2.component.css'
})
export class DirectivaFor2Component {
listaNombres: string[] = [
  "Noelia",
  "Carlos",
  "Dolores",
  "Marta",
  "Rubén",
  "Javier",
  "Carmen",
  "Antonio",
  "Lucía",
  "Valentina"
]

numero: number=0;
controlPar: number=0;

formatearNombre(nombre: string, index:number){
  const numero = index + 1;
const esPar = numero % 2 === 0;
return `${numero}. ${nombre} - ${esPar ? '¡Par!' : '¡Impar!'}`
}
}
