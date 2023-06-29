import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { P404Component } from './p404/p404.component';
import { AcceuilComponent } from './components/acceuil/acceuil.component';
import { DefaultLayoutComponent } from './containers/default-layout/default-layout.component';
import { Planningcomponent } from './components/planning/planning.component';

export const routes: Routes = [
  {
    path: '',
    redirectTo: 'acceuil',
    pathMatch: 'full'
  },
  {
    path: '',
    component: DefaultLayoutComponent,
    children: [
      {
        path: 'acceuil',
        component: AcceuilComponent
      },
      {
        path: 'planning',
        component: Planningcomponent
      },
      {
        path: '404',
        component: P404Component
      },
    ]
  },
  {
    path: '**',
    component: P404Component
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
