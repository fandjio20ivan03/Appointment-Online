import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { DataService } from 'src/app/services/data.service';



@Component({
  selector: 'app-page-patient',
  templateUrl: './page-patient.component.html',
  styleUrls: ['./page-patient.component.scss']
})
export class PagePatientComponent implements OnInit{
  origin = '';
  patients:any;

constructor(private dataService: DataService, private activatedRoute: ActivatedRoute){}

ngOnInit(): void {
  //Called after the constructor, initializing input properties, and the first call to ngOnChanges.
  //Add 'implements OnInit' to the class.
  this.activatedRoute.data.subscribe( data => {
  this.origin = data['origin'];
  });
  this.getPatientData();
}
getPatientData(){
  this.dataService.getDataPatient().subscribe(res =>{
    this.patients = res;
  })
}

}
