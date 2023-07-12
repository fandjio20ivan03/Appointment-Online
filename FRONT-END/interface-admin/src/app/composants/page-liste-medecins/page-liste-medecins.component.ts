// import { formatCurrency } from '@angular/common';
// import { Component, OnInit } from '@angular/core';
// import { ActivatedRoute } from '@angular/router';
// import { Medecin } from 'src/app/medecin';
// import { DataService } from 'src/app/services/data.service';

// @Component({
//   selector: 'app-page-liste-medecins',
//   templateUrl: './page-liste-medecins.component.html',
//   styleUrls: ['./page-liste-medecins.component.scss']
// })
// export class PageListeMedecinsComponent implements OnInit{
// origin = '';
// medecins :any;
// constructor (private activatedRoute: ActivatedRoute, private dataService: DataService
//   ){}

//   ngOnInit(): void {
//     this.activatedRoute.data.subscribe( data => {
//     this.origin = data['origin'];
//     this.getMedecinData();
//   });
// }

// getMedecinData(){
//   this.dataService.getDataMedecin().subscribe(res =>{
//     this.medecins = res;
//   });
// }

// deleteMedecinData(id:any){
//   this.dataService.deleteDataMedecin(id).subscribe(res =>{
//     this.medecins = res;
//     this.ngOnInit();
//   })
// }


// }

import { formatCurrency } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Medecin } from 'src/app/modeles/medecin';
import { DataService } from 'src/app/services/data.service';
import { PageDashbordComponent } from '../page-dashbord/page-dashbord.component';

@Component({
  selector: 'app-page-liste-medecins',
  templateUrl: './page-liste-medecins.component.html',
  styleUrls: ['./page-liste-medecins.component.scss']
})
export class PageListeMedecinsComponent implements OnInit{
  origin = '';
  p:any;
  data: any[] = [];
  medecins: any;
  nombre_medecins = 0;
  nombre_par_page = 9;
  constructor (private activatedRoute: ActivatedRoute, private dataService: DataService){}

  //init du composant
  ngOnInit(): void {
    this.activatedRoute.data.subscribe( data => {
      this.origin = data['origin'];
      this.getMedecinData(1);
    });
  }


  // fonction permettant de recuperer les donne des medecins par pages
  getMedecinData(page:number){
    this.dataService.getDataMedecinPage(page).subscribe((res:any) =>{
      this.medecins = res.data;
      // this.data.length = 0;
      this.nombre_medecins = res.total;
      // console.log(this.medecins);
      // this.nombre_medecins = this.medecins.total;
  });

}


// fonction permettant de faire un changement de page par la pagination

pageChanged(event:any) {
  console.log(event);
  this.getMedecinData(event);
}

// fonction permettant de supprimer un medecin
deleteMedecinData(id:any){
  this.dataService.deleteDataMedecin(id).subscribe(res =>{
    this.medecins = res;
    this.ngOnInit();
  });
}

}
