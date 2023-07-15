import { Component, OnInit } from '@angular/core';
import { TableColumn, elementsFromPoint, emptyStringGetter } from '@swimlane/ngx-datatable';
import { Router } from '@angular/router';
import { Exception } from 'src/app/modeles/exception';
import { DataExceptionService } from 'src/app/services/data-exception.service';
import { DataCalendrierService } from 'src/app/services/data-calendrier.service';

@Component({
  selector: 'app-page-exception',
  templateUrl: './page-exception.component.html',
  styleUrls: ['./page-exception.component.scss']
})
export class PageExceptionComponent implements OnInit {

  validites: any;

  name: string | undefined;

  // calendrier sous format lundi,mardi,mercredi,...
  calendrier_data_jour: any[] = [];

  // type exception permettant de transferer les donnee d'exception.
  exception = new Exception()

  //exception sous format aaaa-mm-jj
  exception_data: any[] = [];

  constructor(private dataCalendrerService: DataCalendrierService, private dataExceptionService: DataExceptionService, private router: Router) { }


  schedule: { [key: string]: any }[] = [];

  jours = [
    'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'
  ];

  columns: TableColumn[] = [];


  heures = [
    '8h00 - 9h00', '9h00 - 10h00', '10h00 - 11h00',
    '11h00 - 12h00', '12h00 - 13h00', '13h00 - 14h00', '14h00 - 15h00', '15h00 - 16h00',
    '16h00 - 17h00', '17h00 - 18h00', '18h00 - 19h00', '19h00 - 20h00'
  ];

  rowData: any;

  ngOnInit(): void {

    this.calendrier_data_jour = this.dataCalendrerService.calendrier;

    //  permettant de construire l'emploi de temps l'ors de l'initiation
    for (let jour of this.jours) {
      this.columns.push({ name: jour, prop: jour.toLowerCase() });
    }

    // Build table data with hours as row headers

    for (let heure of this.heures) {

      let rowData: any = { hour: heure };
      for (let jour of this.jours) {
        rowData[jour.toLowerCase()] = false;
        if (this.calendrier_data_jour.length !== 0) {

          for (const element of this.calendrier_data_jour) {

            if (element.hour === heure) {
              // ici, decoche les cases qui etataient coches precedement
              const tmp = element.day;
              rowData[tmp.toLowerCase()] = true;
            }
          }
        }
      }
      this.schedule.push(rowData);
    }

    this.exception.medecin_id = 1;

    // recupereation des exceptions
    this.dataExceptionService.getDataValiditeException().subscribe(res => {
      this.validites = res;
    });

  }








  onCheckboxChange(event: any, heure: string, jour: string) {

    const formattedStartTime = this.formatStartTime(heure);  //permetant de convertir le jour de xxh00 en xx:00
    const formattedEndTime = this.formatEndTime(heure); //permetant de convertir le jour de xxh00 en xx:00
    const format_aaa_mm_jj = this.convertDay(jour);   // permettant de convertir le jour en format aaaa/mm/jj


    if (event.target.checked) {

      const selectedDate = { day: format_aaa_mm_jj, start_hour: formattedStartTime + ':00', end_hour: formattedEndTime + ':00' };
      this.exception_data.push(selectedDate);

    } else {

      // verifie si il ya deja une date fixe
      const index = this.exception_data.findIndex(date => date.day === format_aaa_mm_jj && date.start_hour === formattedStartTime + ':00' && date.end_hour === formattedEndTime + ':00');

      if (index !== -1) {
        // si il y a une date fixe, on la retire de la liste des dates
        this.exception_data.splice(index, 1);
      }
    }
    console.log(this.exception_data);
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

  // fonction qui sera appele lors de la validation de les exceptions pour l'insertion de l'emploi de temp dans la base de donnee
  chargerException() {

    if (this.exception_data.length !== 0) {
      this.exception_data.forEach((data: any) => {
        this.exception.date = data.day;
        this.exception.heure_debut = data.start_hour;
        this.exception.heure_fin = data.end_hour;
        this.dataExceptionService.insertDataException(this.exception).subscribe((res: any) => {
          // console.log(this.exception);
          if (res.status === 201) {
            console.log("Erreur d'insertion dans back-end verifier si il est bien demarre ou qu'il n y pas d'erreur de donnees");
            return
          }
        });
      });

      // bonne insertion
      console.log("bonne insertion");

    }

    this.router.navigate(['/confirmation']);

  }


}
