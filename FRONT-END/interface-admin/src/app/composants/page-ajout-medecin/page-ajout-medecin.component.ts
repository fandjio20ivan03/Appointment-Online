import { HttpResponse } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Medecin } from 'src/app/modeles/medecin';
import { DataService } from 'src/app/services/data.service';

@Component({
  selector: 'app-page-ajout-medecin',
  templateUrl: './page-ajout-medecin.component.html',
  styleUrls: ['./page-ajout-medecin.component.scss']
})
export class PageAjoutMedecinComponent  implements OnInit{

origin = '';
list_error : any;
medecins :any;
medecin = new Medecin();
spacialites:any;
constructor (private activatedRoute: ActivatedRoute, private dataService: DataService, private router: Router,
  ){}

  ngOnInit(): void {
    this.activatedRoute.data.subscribe( data => {
    this.origin = data['origin'];
    this.getSpecialiteData();
  });

}

// fonction pour recuperer toutes les specialites de medecins depuis la base de donnee
  getSpecialiteData(){
    this.dataService.getDataSpecialite().subscribe(res =>{
      this.spacialites = res;
      // console.log(this.spacialites);
    })
  }


  // fonction permettant d'envoyer les donne du formulaire sur a l'api
  insertDataMedecin(){
      // console.log(this.medecin.specialite_id);
     this.dataService.insertDataMedecin(this.medecin).subscribe((res: HttpResponse<any>) => {
      this.list_error = res.body;
      // console.log(res);

      // verification si il n'y a pas d'erreur au niveau du formulaire
      if (res.status === 200) {
        this.router.navigate(['/medecins/liste-medecins']);
        }
    })

  }

}
