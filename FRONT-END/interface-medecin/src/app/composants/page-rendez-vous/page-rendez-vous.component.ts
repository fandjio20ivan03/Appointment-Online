import { Component, OnInit } from '@angular/core';
import { DataRendezVousService } from 'src/app/services/data-rendez-vous.service';

@Component({
  selector: 'app-page-rendez-vous',
  templateUrl: './page-rendez-vous.component.html',
  styleUrls: ['./page-rendez-vous.component.scss']
})
export class PageRendezVousComponent implements OnInit{
  
  // recupere l'ensemble des rendez-vous d'un medecin

  medecin_id:any  = 1;
  p:any;

  nombre_rendez_vous = 0;
  nombre_par_page = 9;

  rendez_vous_data:any;
  constructor(private rendez_vous_service:DataRendezVousService){}
  

  ngOnInit(): void {
    this.getRendezVousData(1);  
  }



   // fonction permettant de recuperer les donne des medecins par pages
   getRendezVousData(page:number){
    this.rendez_vous_service.getDataRendezVousPage(this.medecin_id,page).subscribe((res:any) =>{
      this.rendez_vous_data = res.data;
      this.nombre_rendez_vous = res.total;
  });

}


  // fonction permettant de faire un changement de page par la pagination

pageChanged(event:any) {
  this.getRendezVousData(event);
}

}
