import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
// import { NgxPaginationModule } from 'ngx-pagination';
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
import { PageInfoMedecinComponent } from './composants/page-info-medecin/page-info-medecin.component';
import { NgxPaginationModule } from 'ngx-pagination';



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
    PageEditMedecinComponent,
    PageInfoMedecinComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    NgxPaginationModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
