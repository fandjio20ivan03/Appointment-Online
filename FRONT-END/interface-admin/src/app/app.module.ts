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
<<<<<<< HEAD
import { NgxPaginationModule } from 'ngx-pagination';
=======
import { FooterComponent } from './composants/footer/footer.component';
import { P404Component } from './p404/p404/p404.component';
>>>>>>> 5fa961d46cc6b1a1bfbcd01d0e7361af40ce0463



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
    PageInfoMedecinComponent,
    FooterComponent,
    P404Component
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
