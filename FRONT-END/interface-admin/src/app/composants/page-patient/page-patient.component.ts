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
  p:any;
  patients:any;
  nombre_patients = 0;
  nombre_par_page = 9;

constructor(private dataService: DataService, private activatedRoute: ActivatedRoute){}

  ngOnInit(): void {
  //Called after the constructor, initializing input properties, and the first call to ngOnChanges.
  //Add 'implements OnInit' to the class.
    this.activatedRoute.data.subscribe( data => {
    this.origin = data['origin'];
    });
    this.getPatientData(1);
  }

// recuperation des donnee medecins par page
  getPatientData(page: number){
    this.dataService.getDataPatientPage(page).subscribe((res:any) =>{
      this.patients = res.data;
      this.nombre_patients = res.total;
    });
  }

// fonction permettant de faire un changement de page par la pagination
  pageChanged(event:any) {
    console.log(event);
    this.getPatientData(event);
  }


}
