import { HttpResponse } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Medecin } from 'src/app/medecin';
import { DataService } from 'src/app/services/data.service';
@Component({
  selector: 'app-page-edit-medecin',
  templateUrl: './page-edit-medecin.component.html',
  styleUrls: ['./page-edit-medecin.component.scss']
})
export class PageEditMedecinComponent  implements OnInit{
  id:any;
  medecin = new Medecin();
  data: any;
  list_error:any;
  origin: any;
constructor( private dataService: DataService, private activatedRoute: ActivatedRoute, private router: Router)
{}


ngOnInit(): void {
  this.activatedRoute.data.subscribe( res => {
  this.origin = res['origin'];
  this.id = this.activatedRoute.snapshot.params['id'];
  this.getMedecinByIdData(this.id);
  })
}

updateData(){
  this.dataService.updateDataMedecin(this.id,this.medecin).subscribe((res: HttpResponse<any>)=>{
  this.list_error = res.body;
  
  if (res.status === 200) {
    this.router.navigate(['/medecins/liste-medecins']);
    }
  })
}


getMedecinByIdData(id:any){
  this.dataService.getDataMedecinById(id).subscribe(res =>{
    this.data = res;
    this.medecin = this.data;
  })
}
}
