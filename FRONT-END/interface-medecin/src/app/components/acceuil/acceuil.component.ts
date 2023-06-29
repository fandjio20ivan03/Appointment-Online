import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';


@Component({
  selector: 'app-acceuil',
  templateUrl: './acceuil.component.html',
  styleUrls: ['/acceuil.component.scss']
})

export class AcceuilComponent implements OnInit {
  constructor(
    private router: Router
  ) {

  }

  ngOnInit() {

  }
}


