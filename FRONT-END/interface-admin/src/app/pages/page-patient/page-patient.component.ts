import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/services/data.service';



@Component({
  selector: 'app-page-patient',
  templateUrl: './page-patient.component.html',
  styleUrls: ['./page-patient.component.scss']
})
export class PagePatientComponent implements OnInit{

  patients:any;

constructor(private dataService: DataService){}

ngOnInit(): void {
  //Called after the constructor, initializing input properties, and the first call to ngOnChanges.
  //Add 'implements OnInit' to the class.
this.getPatientData();

}
getPatientData(){

  console.log('listes des patients');
  this.dataService.getData().subscribe(res =>{
    console.log(res);
    this.patients = res;
  })

}

}
