import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/services/data.service';

@Component({
  selector: 'app-page-rendez-vous',
  templateUrl: './page-rendez-vous.component.html',
  styleUrls: ['./page-rendez-vous.component.scss']
})
export class PageRendezVousComponent implements OnInit{
days =  ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
hours = [8,9,10,11,12,13,14,15,16,17];
data: any;
calendrier:any;
constructor (private dataService: DataService){}


  ngOnInit(): void {
    this.dataService.getDataCalendrier().subscribe( res =>{
      this.data = res;
      console.log(this.days);
    });
  }


  handleCheckboxChange(day: string, hour: number) {
    // Appeler votre API Laravel pour stocker les choix effectués
    console.log('Jour :', day, ', Heure :', hour);
  }

}
