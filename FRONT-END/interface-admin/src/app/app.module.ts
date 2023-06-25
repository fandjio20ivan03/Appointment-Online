import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PageDashbordComponent } from './composants/page-dashbord/page-dashbord.component';
import { PagePatientComponent } from './composants/page-patient/page-patient.component';
import { PageStatistiqueComponent } from './composants/page-statistique/page-statistique.component';
import { MenuComponent } from './composants/menu/menu.component';
import { PageMedecinComponent } from './composants/page-medecin/page-medecin.component';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { PageAjoutMedecinComponent } from './composants/page-ajout-medecin/page-ajout-medecin.component';
import { PageListeMedecinsComponent } from './composants/page-liste-medecins/page-liste-medecins.component';
import { PageEditMedecinComponent } from './composants/page-edit-medecin/page-edit-medecin.component';



@NgModule({
  declarations: [
    AppComponent,
    PageDashbordComponent,
    PagePatientComponent,
    PageStatistiqueComponent,
    MenuComponent,
    PageMedecinComponent,
    PageAjoutMedecinComponent,
    PageListeMedecinsComponent,
    PageEditMedecinComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
