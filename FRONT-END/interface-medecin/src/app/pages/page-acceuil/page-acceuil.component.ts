import { Component } from '@angular/core';

@Component({
  selector: 'app-page-acceuil',
  templateUrl: './page-acceuil.component.html',
  styleUrls: ['./page-acceuil.component.scss']
})
export class PageAcceuilComponent{

  // Les données du tableau
  data = [
    { jour: 'Lundi', heure: '9h-10h', checked: false },
    { jour: 'Lundi', heure: '10h-11h', checked: false },
    // ...
    { jour: 'Vendredi', heure: '15h-16h', checked: false }
  ];

  // Les colonnes du tableau
  columns = [
    { title: 'Jour', name: 'jour', filtering: { filterString: '', placeholder: 'Filtrer par jour' } },
    { title: 'Heure', name: 'heure', filtering: { filterString: '', placeholder: 'Filtrer par heure' } },
    { title: '', name: 'checked' }
  ];

  // Les options de filtrage
  public config = {
    paging: true,
    sorting: true,
    filtering: true,
    className: ['table-striped', 'table-bordered']
  };

  constructor() {}




}

