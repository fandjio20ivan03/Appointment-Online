import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PageAcceuilComponent } from './composants/page-acceuil/page-acceuil.component';
import { MenuComponent } from './composants/menu/menu.component';
import { PageRendezVousComponent } from './composants/page-rendez-vous/page-rendez-vous.component';
import { HttpClientModule } from '@angular/common/http';
import { InscriptionPatientComponent } from './composants/inscription-patient/inscription-patient.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { LoginPatientComponent } from './composants/login-patient/login-patient.component';

@NgModule({
  declarations: [
    AppComponent,
    PageAcceuilComponent,
    MenuComponent,
    PageRendezVousComponent,
    InscriptionPatientComponent,
    LoginPatientComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
