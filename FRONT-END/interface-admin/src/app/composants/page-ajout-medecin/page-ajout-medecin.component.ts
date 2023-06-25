import { HttpResponse } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Medecin } from 'src/app/medecin';
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
constructor (private activatedRoute: ActivatedRoute, private dataService: DataService, private router: Router,
  ){}

  ngOnInit(): void {
    this.activatedRoute.data.subscribe( data => {
    this.origin = data['origin'];
  });

}

  insertData(){
     this.dataService.insertDataMedecin(this.medecin).subscribe((res: HttpResponse<any>) => {
      this.list_error = res.body;
      console.log(res);

      // verification si il n'y a pas d'erreur au niveau du formulaire
      if (res.status === 200) {
        this.router.navigate(['/medecins/liste-medecins']);
        }
    })

  }

}
