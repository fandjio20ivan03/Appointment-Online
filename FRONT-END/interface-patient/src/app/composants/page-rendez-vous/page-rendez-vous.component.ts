import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/services/data.service';

enum Jours{
  Lundi = 'Monday',
  // Mardi
}




@Component({
  selector: 'app-page-rendez-vous',
  templateUrl: './page-rendez-vous.component.html',
  styleUrls: ['./page-rendez-vous.component.scss']
})






export class PageRendezVousComponent implements OnInit{
days =  ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
hours = [8,9,10,11,12,13,14,15,16,17];
data: any;
date = new Date();

constructor (private dataService: DataService){}


ngOnInit(): void {
  this.dataService.getDataCalendrier().subscribe( res =>{
    this.data = res;
    console.log(this.data);
    });

  }

  convertDay(day: string): void {
    const currentDate = new Date();
    const today = currentDate.getDay();
    const dayIndex = this.getDayIndex(day);
    const nextDay = (dayIndex <= today) ? dayIndex + 7 : dayIndex; // Ajoute 7 jours si le jour est déjà passé cette semaine
    const diff = nextDay - today;
    const nextDate = new Date(currentDate.setDate(currentDate.getDate() + diff));
    const formattedDate = nextDate.toISOString().slice(0, 10);
    console.log(formattedDate);
  }

  getDayIndex(day: string): number {
    switch (day) {
      case 'Lundi':
        return 1;
      case 'Mardi':
        return 2;
      case 'Mercredi':
        return 3;
      case 'Jeudi':
        return 4;
      case 'Vendredi':
        return 5;
      case 'Samedi':
        return 6;
      case 'Dimanche':
        return 7; //0 par defaut
      default:
        return -1; // Retourne -1 si le jour n'est pas valide
    }
  }




  // convertDate() {

  //   // const jours = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];

  //   // const date = new Date();

  //   // const jourCourant = jours[date.getDay()];

  //   // const dateComplete = `${jourCourant} ${date.getDate()} ${date.getFullYear()}`;
  //   // console.log(this.connverti('Mon'));
  //   console.log(new Date((new Date()).getFullYear() ,(new Date()).getMonth()));
  // }

  // connverti(jour:string):Date{
  //   // 2023/07/10 switch(new Date(date).toString().slice(0,4)){
  // if(jour == (new Date().toString().slice(0,4))){
  //   return (new Date());
  // }else{
  //   return (new Date('2020/02/02'));
  // }
  // }



  handleCheckboxChange(day: string, hour: number) {
    // Appeler votre API Laravel pour stocker les choix effectués
    console.log('Jour :', day, ', Heure :', hour);
  }

}
