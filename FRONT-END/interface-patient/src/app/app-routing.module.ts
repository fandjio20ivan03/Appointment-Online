import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PageAcceuilComponent } from './composants/page-acceuil/page-acceuil.component';
import { PageRendezVousComponent } from './composants/page-rendez-vous/page-rendez-vous.component';
import { InscriptionPatientComponent } from './composants/inscription-patient/inscription-patient.component';
import { LoginPatientComponent } from './composants/login-patient/login-patient.component';

const routes: Routes = [
  {
      path:'',
      component: PageAcceuilComponent
  },
  {
    path:'rendez-vous',
    component: PageRendezVousComponent
  },
  {path: 'login', component: LoginPatientComponent},
  {path: 'register', component: InscriptionPatientComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
