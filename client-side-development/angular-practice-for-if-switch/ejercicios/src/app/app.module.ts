import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormularioComponent } from './components/formulario/formulario.component';
import { DirectivaForComponent } from './components/directiva-for/directiva-for.component';
import { DirectivaFor2Component } from './components/directiva-for2/directiva-for2.component';
import { DirectivaFor3Component } from './components/directiva-for3/directiva-for3.component';
import { HomeComponent } from './components/home/home.component';
import { DirectivaIfComponent } from './components/directiva-if/directiva-if.component';
import { DirectivaIf2Component } from './components/directiva-if2/directiva-if2.component';
import { DirectivaIf3Component } from './components/directiva-if3/directiva-if3.component';
import { DirectivaSwitchComponent } from './components/directiva-switch/directiva-switch.component';
import { DirectivaSwitch2Component } from './components/directiva-switch2/directiva-switch2.component';
import { DirectivaSwitch3Component } from './components/directiva-switch3/directiva-switch3.component';

@NgModule({
  declarations: [
    AppComponent,
    FormularioComponent,
    DirectivaForComponent,
    DirectivaFor2Component,
    DirectivaFor3Component,
    HomeComponent,
    DirectivaIfComponent,
    DirectivaIf2Component,
    DirectivaIf3Component,
    DirectivaSwitchComponent,
    DirectivaSwitch2Component,
    DirectivaSwitch3Component
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
