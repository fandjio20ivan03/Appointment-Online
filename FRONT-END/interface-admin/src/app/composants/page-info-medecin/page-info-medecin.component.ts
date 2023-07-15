import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Medecin } from 'src/app/modeles/medecin';
import { DataService } from 'src/app/services/data.service';

@Component({
  selector: 'app-page-info-medecin',
  templateUrl: './page-info-medecin.component.html',
  styleUrls: ['./page-info-medecin.component.scss']
})
export class PageInfoMedecinComponent implements OnInit{
id:any;
origin:any;
data:any;
specialite:any;
medecin = new Medecin();
constructor(private activatedRoute:ActivatedRoute, private dataService:DataService)
{}

ngOnInit(): void {
  this.activatedRoute.data.subscribe( res=>{
    this.origin = res['origin'];
    this.id = this.activatedRoute.snapshot.params['id'];
    this.getMedecinByIdData(this.id);
  });
}



getMedecinByIdData(id:any){
  this.dataService.getDataMedecinById(id).subscribe(res =>{
    this.data = res;
    this.medecin = this.data;
    this.getSpecialiteByIdData(this.medecin.specialite_id);
  });
}


getSpecialiteByIdData(specialite_id:any){
  this.dataService.getDataSpecialiteById(specialite_id).subscribe( res =>{
    this.specialite = res;
    // console.log(this.specialite);
  });
}


}
