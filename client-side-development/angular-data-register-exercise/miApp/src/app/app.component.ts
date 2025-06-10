import { Component } from '@angular/core';
import { Coche } from './models/coche';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: false,
  styleUrl: './app.component.css'
})
export class AppComponent {
listaCoches: Coche[] = []; 
coche: Coche = new Coche('', '', 0, 0, 'híbrido', '', 0);

  addCoche() {
    this.listaCoches.push(new Coche(
      this.coche.marca,
      this.coche.modelo,
      this.coche.cv,
      this.coche.cc,
      this.coche.tipoMotor,
      this.coche.matricula,
      this.coche.precio
    ));
     this.coche = new Coche('', '', 0, 0, 'híbrido', '', 0);
}
  }

