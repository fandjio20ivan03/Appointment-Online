import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
// import { isEmpty } from 'rxjs';
import { DataService } from 'src/app/services/data.service';


@Component({
  selector: 'app-page-medecin',
  templateUrl: './page-medecin.component.html',
  styleUrls: ['./page-medecin.component.scss']
})
export class PageMedecinComponent implements OnInit {
 origin = '';
 medecins :any;
constructor (private activatedRoute: ActivatedRoute, private dataService: DataService
){}

ngOnInit(): void {
  this.activatedRoute.data.subscribe( data => {
  this.origin = data['origin'];
  this.getMedecinData();

});


}
getMedecinData(){
  this.dataService.getDataMedecin().subscribe(res =>{
    this.medecins = res;
  })
}

deleteMedecinData(id:any){
  this.dataService.deleteDataMedecin(id).subscribe(res =>{
    this.medecins = res;
    this.ngOnInit();
  })
}


}
