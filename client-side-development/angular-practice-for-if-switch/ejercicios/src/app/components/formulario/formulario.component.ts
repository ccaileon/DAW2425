import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-formulario',
  standalone: false,
  templateUrl: './formulario.component.html',
  styleUrl: './formulario.component.css'
})
export class FormularioComponent {
nombre: string ="";
edad: string ="";
terminos: boolean= false;
colorFavorito: string="";
preguntaColor: string="¿Cuál es tu color favorito?"

verificarColor() {
if (this.colorFavorito !== "") {
  this.preguntaColor = `Tu color favorito es el ${this.colorFavorito}. ¡El mío también!`;
} else {
  this.preguntaColor = "¿Cúal es tu color favorito?";
}
}
}
