import { Component } from '@angular/core';

@Component({
  selector: 'app-directiva-for3',
  standalone: false,
  templateUrl: './directiva-for3.component.html',
  styleUrl: './directiva-for3.component.css'
})
export class DirectivaFor3Component {
listaTareas: string[] = [
  "Sacar la basura",
  "Hacer los deberes",
  "Llamar a la abuela",
  "Preparar cena",
  "Limpiar la cocina",
  "Dar de comer a Luna",
  "Estudiar Angular"
]

formatearTareas(tarea:string, index: number) {
return `${index+1}. ${tarea}`;
}
eliminarTarea(index: number) {
this.listaTareas.splice(index,1);
}
}
