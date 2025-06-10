import { Component } from '@angular/core';

@Component({
  selector: 'app-directiva-if2',
  standalone: false,
  templateUrl: './directiva-if2.component.html',
  styleUrl: './directiva-if2.component.css'
})
export class DirectivaIf2Component {
edad: number=0;


get mensaje(): string {
  if (this.edad < 18) {
return '❌ Eres menor de edad. Acceso restringido.'
  } else if (this.edad === 18) {
return '⚠️ ¡Te libras por los pelos! Acceso permitido.';
  } else {
   return '✅ Acceso permitido, eres mayor de 18 años.'
  }
}

get mayorEdad(): boolean {
  return this.edad >0;
}
}
