import { Component, OnInit } from '@angular/core';
import { TableColumn } from '@swimlane/ngx-datatable';

@Component({
  selector: 'app-page-planning',
  templateUrl: './page-planning.component.html',
  styleUrls: ['./page-planning.component.scss']
})


export class PagePlanningComponent {

  calendrier : any[] = [];

  schedule: { [key: string]: any }[] = [];

  heures = [
    '1h00 - 2h00', '2h00 - 3h00', '3h00 - 4h00', '4h00 - 5h00', '5h00 - 6h00',
    '6h00 - 7h00', '7h00 - 8h00', '8h00 - 9h00', '9h00 - 10h00', '10h00 - 11h00',
    '11h00 - 12h00', '12h00 - 13h00', '13h00 - 14h00', '14h00 - 15h00', '15h00 - 16h00',
    '16h00 - 17h00', '17h00 - 18h00', '18h00 - 19h00', '19h00 - 20h00', '20h00 - 21h00',
    '21h00 - 22h00', '22h00 - 23h00'
  ];

  jours = [
    'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'
  ];

  columns: TableColumn[] = [];

  ngOnInit() {
    //  permettant de construire l'emploi de temps l'ors de l'initiation
    for (let jour of this.jours) {
      this.columns.push({ name: jour, prop: jour.toLowerCase() });
    }

    // Build table data with hours as row headers
    for (let heure of this.heures) {
      let rowData: any = { hour: heure };

      for (let jour of this.jours) {
        rowData[jour.toLowerCase()] = false; // Default checkbox value
      }
      this.schedule.push(rowData);
    }
  }

  onCheckboxChange(event: any, heure: string, jour: string) {

    if (event.target.checked) {
        const formattedStartTime = this.formatStartTime(heure);  //permetant de convertir le jour de xxh00 en xx:00
        const formattedEndTime = this.formatEndTime(heure); //permetant de convertir le jour de xxh00 en xx:00
        const format_aaa_mm_jj = this.convertDay(jour);   // permettant de convertir le jour en format aaaa/mm/jj
        const selectedDate = { day:format_aaa_mm_jj , start_hour:formattedStartTime +':00', end_hour:formattedEndTime +':00' };
        this.calendrier.push(selectedDate);

    }else{

        const formattedStartTime = this.formatStartTime(heure);  //permetant de convertir le jour de xxh00 en xx:00
        const formattedEndTime = this.formatEndTime(heure); //permetant de convertir le jour de xxh00 en xx:00
        const format_aaa_mm_jj = this.convertDay(jour);    // permettant de convertir le jour en format aaaa/mm/jj

        // verifie si il ya deja une date fixe
        const index = this.calendrier.findIndex(date => date.day === format_aaa_mm_jj && date.start_hour === formattedStartTime +':00' && date.end_hour === formattedEndTime +':00');

        if(index !== -1){
          // si il y a une date fixe, on la retire de la liste des dates

          this.calendrier.splice(index,1);
        }
    }
    console.log(this.calendrier);
  }

// permet de transformer une heure xxh a xx
  formatStartTime(heure: string) {
    heure = heure.split('-')[0]; // xxh-yy = [xxh], '-', [yy]
    return heure.split('h')[0]; // [xxh] = [xx], 'h' pour recuperer la valeur de l'heure

  }

// permet de transformer une heure  de xxh  a xx

  formatEndTime(heure: string) {
    heure = heure.split('-')[1]; // xxh-yy = [xxh], '-', [yy]
    return heure.split('h')[0]; // [xxh] = [xx], 'h' pour recuperer la valeur de l'heure
  }


// permet de convertir une date 'lundi','merdi','mardi',... en format aaa-mm-jj
  convertDay(jour: string): string {
    // recuperation de la date actuelle
    const currentDate = new Date();
    // recuperation du numero de du jour
    const today = currentDate.getDay();
    // recuperation de l'indice du jour 1 pour lundi, 2 pour mardi, 3 pour mercredi et ansi de suite
    const dayIndex = this.getDayIndex(jour);
    const nextDay = (dayIndex <= today) ? dayIndex + 7 : dayIndex; // Ajoute 7 jours si le jour est déjà passé cette semaine
    const diff = nextDay - today;
    const nextDate = new Date(currentDate.setDate(currentDate.getDate() + diff));
    const formattedDate = nextDate.toISOString().slice(0, 10);
    return formattedDate;
}

  getDayIndex(jour: string): number {
    console.log(jour);
    switch (jour) {
      case 'lundi':
        return 1;
      case 'mardi':
        return 2;
      case 'mercredi':
        return 3;
      case 'jeudi':
        return 4;
      case 'vendredi':
        return 5;
      case 'samedi':
        return 6;
      case 'dimanche':
        return 7;  // 0 par defaut
      default:
        return -1; // Retourne -1 si le jour n'est pas valide
    }
  }


  //fonction qui sera appele lord de la validation de l'emploi de temps
  valider(){

  }
}
