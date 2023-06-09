import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MenuComponent } from './menu/menu.component';
import { CalendrierComponent } from './calendrier/calendrier.component';
import { FormulaireComponent } from './formulaire/formulaire.component';
import { RouterModule, Routes } from '@angular/router';


const routes: Routes = [
  { path: '', redirectTo: '/medecin', pathMatch: 'full' },
  { path: 'medecin', component: MenuComponent },
  { path: 'patient', component: MenuComponent },
  { path: 'calendrier', component: CalendrierComponent },
  { path: 'formulaire', component: FormulaireComponent }
];

@NgModule({
  declarations: [
    AppComponent,
    MenuComponent,
    CalendrierComponent,
    FormulaireComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
