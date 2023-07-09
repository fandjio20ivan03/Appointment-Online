import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { P404Component } from './p404/p404.component';
import { RouterModule } from '@angular/router';
import { MenuComponent } from './composants/menu/menu.component';
import { PageAcceuilComponent } from './composants/page-acceuil/page-acceuil.component';
import { PagePlanningComponent } from './composants/page-planning/page-planning.component';
import { PageExceptionComponent } from './composants/page-exception/page-exception.component';
import { NgxDatatableModule } from '@swimlane/ngx-datatable';
import { FooterComponent } from './composants/footer/footer.component';
@NgModule({
  declarations: [
    AppComponent,
    P404Component,
    MenuComponent,
    PageAcceuilComponent,
    PagePlanningComponent,
    PageExceptionComponent,
    FooterComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    CommonModule,
    NgxDatatableModule,
  ],
  exports: [RouterModule],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
