import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PageAcceuilComponent } from './pages/page-acceuil/page-acceuil.component';

const routes: Routes = [
  {
    path: '',
    component:PageAcceuilComponent
  }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
