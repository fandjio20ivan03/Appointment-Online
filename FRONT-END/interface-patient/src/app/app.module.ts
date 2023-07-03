import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PageAcceuilComponent } from './composants/page-acceuil/page-acceuil.component';
import { MenuComponent } from './composants/menu/menu.component';
import { PageRendezVousComponent } from './composants/page-rendez-vous/page-rendez-vous.component';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
  declarations: [
    AppComponent,
    PageAcceuilComponent,
    MenuComponent,
    PageRendezVousComponent,
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
