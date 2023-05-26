import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PageDashbordComponent } from './pages/page-dashbord/page-dashbord.component';
import { PagePatientComponent } from './pages/page-patient/page-patient.component';
import { PageStatistiqueComponent } from './pages/page-statistique/page-statistique.component';
import { PageMedecinComponent } from './pages/page-medecin/page-medecin.component';

const routes: Routes = [

  {
    path: '',
    component: PageDashbordComponent,
    children: [
      {
        // redirecting from a route
        path:'',
        redirectTo: '/statistique',
        pathMatch:'full'
      },
      {
          path: 'statistique',
          component: PageStatistiqueComponent
      },
      {
          path: 'patients',
          component: PagePatientComponent
      },
      {
        path:'medecins',
        component: PageMedecinComponent
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


