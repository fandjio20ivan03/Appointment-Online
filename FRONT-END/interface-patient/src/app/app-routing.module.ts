import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PageAcceuilComponent } from './composants/page-acceuil/page-acceuil.component';
import { PageRendezVousComponent } from './composants/page-rendez-vous/page-rendez-vous.component';

const routes: Routes = [
  {
      path:'',
      component: PageAcceuilComponent
  },
  {
    path:'rendez-vous',
    component: PageRendezVousComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
