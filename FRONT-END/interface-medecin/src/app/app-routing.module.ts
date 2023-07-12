import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { P404Component } from './p404/p404.component';
import { PagePlanningComponent } from './composants/page-planning/page-planning.component';
import { PageAcceuilComponent } from './composants/page-acceuil/page-acceuil.component';
import { PageExceptionComponent } from './composants/page-exception/page-exception.component';
import { PageConfirmationComponent } from './composants/page-confirmation/page-confirmation.component';

 const routes: Routes = [
      {
        path: '',
        component: PageAcceuilComponent
      },
      {
        path: 'planning',
        component: PagePlanningComponent
      },
      {
        path: 'exception',
        component: PageExceptionComponent
      },
      {
        path: 'confirmation',
        component: PageConfirmationComponent
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
