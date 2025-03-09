import { Component } from '@angular/core';

@Component({
  selector: 'app-directiva-if',
  standalone: false,
  templateUrl: './directiva-if.component.html',
  styleUrl: './directiva-if.component.css'
})
export class DirectivaIfComponent {
mensaje: string='El mensaje es visible.';
mostrarElemento: boolean=true;

  ocultarMensaje() {
this.mostrarElemento = !this.mostrarElemento;
  }
}
