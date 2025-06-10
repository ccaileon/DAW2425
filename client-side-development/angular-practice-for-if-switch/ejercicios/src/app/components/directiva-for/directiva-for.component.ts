import { Component } from '@angular/core';
import { Producto } from './producto.model';

@Component({
  selector: 'app-directiva-for',
  standalone: false,
  templateUrl: './directiva-for.component.html',
  styleUrl: './directiva-for.component.css'
})
export class DirectivaForComponent {
listaProductos: Producto[] = [
  {nombre: "Harina", precio: 0.60, tipo: "Grano"},
  {nombre: "Leche", precio: 0.80, tipo: "Lácteo"},
  {nombre: "Azúcar", precio: 0.90, tipo: "Endulzante"},
  {nombre: "Muslos de Pollo", precio: 4.50, tipo: "Carne"},
  {nombre: "Filetes de Bacalao", precio: 8.50, tipo: "Pescado"},
  {nombre: "Sal", precio: 0.50, tipo: "Condimento"},
]
}


