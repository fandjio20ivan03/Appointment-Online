import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { Planningcomponent } from './components/planning/planning.component';
import { AcceuilComponent } from './components/acceuil/acceuil.component';
import { P404Component } from './p404/p404.component';
import { DefaultLayoutComponent } from './containers/default-layout/default-layout.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { RouterModule } from '@angular/router';

@NgModule({
  declarations: [
    AppComponent,
    Planningcomponent,
    AcceuilComponent,
    P404Component,
    DefaultLayoutComponent,
    HeaderComponent,
    FooterComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    // FormControlName
  ],
  exports: [RouterModule],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
