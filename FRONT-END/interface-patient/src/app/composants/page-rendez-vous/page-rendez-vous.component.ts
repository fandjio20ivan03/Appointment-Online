import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { TableColumn } from '@swimlane/ngx-datatable';
import { Calendrier } from 'src/app/modeles/calendrier';
import { CalenderService } from 'src/app/services/calender.service';
import { DataService } from 'src/app/services/data.service';

@Component({
  selector: 'app-page-rendez-vous',
  templateUrl: './page-rendez-vous.component.html',
  styleUrls: ['./page-rendez-vous.component.scss'],
})
export class PageRendezVousComponent implements OnInit {
  constructor(
    private dataService: DataService,
    private calendrierservice: CalenderService,
    private router: Router
  ) {}

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

  jours = [
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi',
    'Dimanche',
  ];

  data: any = [];
  columns: TableColumn[] = [];

  // declaration des variables
  calendrier = new Calendrier();

  // donnees du calendrier ou le jour est sous format aaaa-mm-jj
  calendrier_data: any[] = [];

  // donnees du calendrier ou les jours sont sous format lundi,mardi,mercredi,...
  calendrier_data_jour: any[] = [];

  schedule: { [key: string]: any }[] = [];

  ngOnInit() {
    //  permettant de construire l'emploi de temps l'ors de l'initiation
    for (let jour of this.jours) {
      this.columns.push({ name: jour, prop: jour.toLowerCase() });
    }


    // var td: any = document.getElementById("cellule1").parentNode;

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
    var caseCoche = event.target;
    var tableau = caseCoche.closest("ngx-datatable"); // le tableau qui contient la case
    var cases = tableau.querySelectorAll("input[type=checkbox]");

    if (event.target.checked) {
      // toutes les cases du tableau
      for (var i = 0; i < cases.length; i++) {
        var caseCurrent = cases[i];
        if (caseCurrent !== caseCoche) { // si ce n'est pas la case cochée
          caseCurrent.disabled = caseCoche.checked; // on désactive ou active la case selon l'état de la case cochée
        }
      }

      const formattedStartTime = this.formatStartTime(heure); //permetant de convertir le jour de xxh00 en xx:00
      const formattedEndTime = this.formatEndTime(heure); //permetant de convertir le jour de xxh00 en xx:00
      const format_aaaa_mm_jj = this.convertDay(jour); // permettant de convertir le jour en format aaaa/mm/jj
      const selectedDate_aaaa = {
        day: format_aaaa_mm_jj,
        start_hour: formattedStartTime + ':00',
        end_hour: formattedEndTime + ':00',
      };
      this.calendrier_data.push(selectedDate_aaaa);
      console.log(this.calendrier_data);

      const selectedDate = { day: jour, hour: heure };
      this.calendrier_data_jour.push(selectedDate);
      console.log(this.calendrier_data_jour);
    } else {
      for (var i = 0; i < cases.length; i++) {
        var caseCurrent = cases[i];
        caseCurrent.disabled = false;
      }
      this.calendrier_data = [];
      this.calendrier_data_jour = [];

      console.log(this.calendrier_data);
      console.log(this.calendrier_data_jour);
    }

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
    const nextDay = dayIndex <= today ? dayIndex + 7 : dayIndex; // Ajoute 7 jours si le jour est déjà passé cette semaine
    const diff = nextDay - today;
    const nextDate = new Date(
      currentDate.setDate(currentDate.getDate() + diff)
    );
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
        return 7; // 0 par defaut
      default:
        return -1; // Retourne -1 si le jour n'est pas valide
    }
  }

  // fonction qui sera appele lord de la validation de l'emploi de temps pour l'insertion de l'emploi de temp dans la base de donnee
  // rep en parametre represente la reponse recupere du modal soit 1 = oui, soit 2 = non
  // chargerCalendrier(rep: number) {
  //   if (this.calendrier_data.length !== 0) {
  //     this.calendrier_data.forEach((data: any) => {
  //       this.calendrier.date = data.day;
  //       this.calendrier.heure_debut = data.start_hour;
  //       this.calendrier.heure_fin = data.end_hour;
  //       this.calendrierservice
  //         .insertDataCalendrier(this.calendrier)
  //         .subscribe((res) => {
  //           console.log(res.status);
  //           if (res.status === 201) {
  //             console.log(
  //               "Erreur d'insertion dans back-end verifier si il est bien demarre ou qu'il n y pas d'erreur de donnees"
  //             );
  //             return;
  //           }
  //         });
  //     });

  //     // bonne insertion
  //     console.log('bonne insertion');

  //     // verification si rep = 1 = oui, si c;est le cas on redirige l'utilisateur vers la page des exceptions
  //     if (rep === 1) {
  //       this.calendrierservice.calendrier = this.calendrier_data_jour;
  //       this.router.navigate(['/exception']);
  //     } else {
  //       // verification si rep != 1 c'est a dire 2 = non , si c'est le cas on redirige l'utilisateur vers la page de confirmation

  //       this.router.navigate(['/confirmation']);
  //     }
  //   } else {
  //     // this.aucune_donnee = 'Vous devez choisir au moins un jour';
  //     alert('Vous devez choisir au moins un jour');
  //   }
  // }

  chargerRendezVous(event: any): void {
    console.log('salut');
    console.log(event);
    if (event) {
      console.log('salut');
      this.calendrier_data.forEach((data: any) => {
        this.calendrier.date = data.day;
        this.calendrier.heure_debut = data.start_hour;
        this.calendrier.heure_fin = data.end_hour;
        this.calendrierservice
          .insertDataCalendrier(this.calendrier)
          .subscribe((res) => {
            console.log(res.status);
            if (res.status === 201) {
              console.log(
                "Erreur d'insertion dans back-end verifier si il est bien demarre ou qu'il n y pas d'erreur de donnees"
              );
              return;
            }
          });
      });

      // bonne insertion
      console.log('bonne insertion');
    }

    // console.log(this.calendrier_data);
    // insertDataRendezVous()
    // console.log(this.calendrier_data_jour);
  }

}
