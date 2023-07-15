import { Component, OnInit } from '@angular/core';
import { ColumnMode, SelectionType, TableColumn } from '@swimlane/ngx-datatable';
import { DataService } from 'src/app/services/data.service';

@Component({
  selector: 'app-page-rendez-vous',
  templateUrl: './page-rendez-vous.component.html',
  styleUrls: ['./page-rendez-vous.component.scss'],
})
export class PageRendezVousComponent implements OnInit {

  heures = [
    '7h00 - 8h00',
    '8h00 - 9h00',
    '9h00 - 10h00',
    '10h00 - 11h00',
    '11h00 - 12h00',
    '12h00 - 13h00',
    '13h00 - 14h00',
    '14h00 - 15h00',
    '15h00 - 16h00',
    '16h00 - 17h00',
    '17h00 - 18h00',
    '18h00 - 19h00',
    '19h00 - 20h00',
    '20h00 - 21h00',
    '21h00 - 22h00',
    '22h00 - 23h00',
  ];

  data: any = [];
  columns: TableColumn[] = [];
  selectedRows: any = [];
  // selectionType = SelectionType.checkbox;
  columnMode = ColumnMode.force;
  cssClasses: any;
  selectFn: any;
  sortFn: any;
  cellContext: any;

  constructor(private dataService: DataService) {}

  ngOnInit(): void {
    // this.dataService.getDataCalendrier().subscribe( res =>{
    //   this.data = res;
    //   console.log(this.days);
    // });

    this.columns = [
      { name: 'Horaire', prop: 'heure', sortable: false, width: 130 },
      { name: 'Lundi', headerCheckboxable: true, checkboxable: true, sortable: false,  width: 100  },
      { name: 'Mardi', headerCheckboxable: true, checkboxable: true, sortable: false, width: 100},
      { name: 'Mercredi', headerCheckboxable: true, checkboxable: true, sortable: false, width: 100},
      { name: 'Jeudi', headerCheckboxable: true, checkboxable: true, sortable: false, width: 100 },
      { name: 'Vendredi', headerCheckboxable: true, checkboxable: true, sortable: false, width: 100 },
      { name: 'Samedi', headerCheckboxable: true, checkboxable: true, sortable: false, width: 100 },
      { name: 'Dimanche', headerCheckboxable: true, checkboxable: true, sortable: false, width: 100 },
    ];

    for (let heure of this.heures) {
      this.data.push({ heure: heure });
    }

    this.cellContext = {
      columns: this.columns,
      // sortDir: this.sortDir,
      sortFn: this.sortFn,
      selectedRows: this.selectedRows,
      selectFn: this.selectFn
    };


  }

  // ngOnChanges() {
  //   // Détecter les changements de sélection et effectuer les actions nécessaires
  //   if (this.selectedRows.length === 1) {
  //     const selectedRow = this.selectedRows[0];
  //     console.log(selectedRow); // Utilisez les données de la ligne sélectionnée comme vous le souhaitez
  //   }
  // }

  onClickCheckBox(event: any): void{
    console.log('bonjour');
    // this.selectedRows.push(event.selected);
    console.log(this.selectedRows);
  }

  
}
