import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PageDashbordComponent } from './composants/page-dashbord/page-dashbord.component';
import { PagePatientComponent } from './composants/page-patient/page-patient.component';
import { PageStatistiqueComponent } from './composants/page-statistique/page-statistique.component';
import { PageAjoutMedecinComponent } from './composants/page-ajout-medecin/page-ajout-medecin.component';
import { PageListeMedecinsComponent } from './composants/page-liste-medecins/page-liste-medecins.component';
import { PageEditMedecinComponent } from './composants/page-edit-medecin/page-edit-medecin.component';
import { PageInfoMedecinComponent } from './composants/page-info-medecin/page-info-medecin.component';
import { PageMedecinComponent } from './composants/page-medecin/page-medecin.component';
import { P404Component } from './p404/p404/p404.component';


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
          component: PageStatistiqueComponent,
          data: {
            origin:'Statistiques sur l\'ensemble des activités'
          }
      },
      {
          path: 'patients',
          component: PagePatientComponent,
          data: {
            origin:'Patients'
          }
      },
      {
        path:'medecins',
        component: PageMedecinComponent,
        children: [
          {
            path: 'liste-medecins',
            component: PageListeMedecinsComponent,
            data: {
              origin: 'Ensemble des Medecins'
            }
          },
          {
            path:'ajout-medecin',
            component: PageAjoutMedecinComponent,
            data: {
              origin: 'Ajouter un Medecin'
            }
          },
          {
            path:'edit-medecin/:id',
            component: PageEditMedecinComponent,
            data: {
              origin: 'Editer un Medecin'
            }
          },
          {
            path:'info-medecin/:id',
            component: PageInfoMedecinComponent,
            data: {
              origin: 'Informations sur le medecin'
            }
          }
        ]
      }
    ]
  },
  {
    path:'**',
    component:P404Component,
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


