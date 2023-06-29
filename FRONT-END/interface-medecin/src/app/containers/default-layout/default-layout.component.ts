import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NavigationService } from 'src/app/services/navigation.service';

@Component({
  selector: 'app-default-layout',
  templateUrl: './default-layout.component.html',
  styleUrls: ['./default-layout.component.scss']
})
export class DefaultLayoutComponent implements OnInit {

  constructor( private navigationservices:  NavigationService) {

  }

  ngOnInit(): void {
  }

  rediret(url: string){
   this.navigationservices.goTo('/'+url);
  }

}
