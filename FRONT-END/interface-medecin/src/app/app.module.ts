import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { ngTableModule } from 'ng-table';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PageAcceuilComponent } from './pages/page-acceuil/page-acceuil.component';

@NgModule({
  declarations: [
    AppComponent,
    PageAcceuilComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }


