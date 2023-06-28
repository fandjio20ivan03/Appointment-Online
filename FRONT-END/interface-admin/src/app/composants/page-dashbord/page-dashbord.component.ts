import { Component } from '@angular/core';
import { DataService } from 'src/app/services/data.service';

@Component({
  selector: 'app-page-dashbord',
  templateUrl: './page-dashbord.component.html',
  styleUrls: ['./page-dashbord.component.scss']
})
export class PageDashbordComponent {
text_search:any;
result: any[] = [];

constructor(private dataService:DataService)
{}

// fonction de recherche de donnees depuis la vue
search(){
console.log(this.text_search);
this.dataService.getMedecinBySearch(this.text_search).subscribe( (res:any) =>{
  //affecter les resultat de la recherche a var result
  this.result = res;
  // console.log(this.result);
});
}

}
