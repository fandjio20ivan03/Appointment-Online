import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-page-medecin',
  templateUrl: './page-medecin.component.html',
  styleUrls: ['./page-medecin.component.scss']
})
export class PageMedecinComponent implements OnInit {
 origin = '';
constructor (
private activatedRoute: ActivatedRoute

){}

ngOnInit(): void {
  this.activatedRoute.data.subscribe( data => {
  this.origin = data['origin'];
  });
}

}
