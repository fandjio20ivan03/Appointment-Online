import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PageDashbordComponent } from './pages/page-dashbord/page-dashbord.component';
import { PagePatientComponent } from './pages/page-patient/page-patient.component';
import { PageStatistiqueComponent } from './pages/page-statistique/page-statistique.component';
import { MenuComponent } from './composants/menu/menu.component';
import { PageMedecinComponent } from './pages/page-medecin/page-medecin.component';
import { HttpClientModule } from '@angular/common/http';



@NgModule({
  declarations: [
    AppComponent,
    PageDashbordComponent,
    PagePatientComponent,
    PageStatistiqueComponent,
    MenuComponent,
    PageMedecinComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
