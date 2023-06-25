// import { Component } from '@angular/core';

// @Component({
//   selector: 'app-calendrier',
//   templateUrl: './calendrier.component.html',
//   styleUrls: ['./calendrier.component.scss']
// })
// export class CalendrierComponent {

// }
import { Component, OnInit } from '@angular/core';
import { CalendarEvent } from 'angular-calendar';
import { startOfDay, endOfDay } from 'date-fns';

@Component({
  selector: 'app-calendrier',
  templateUrl: './calendrier.component.html',
  styleUrls: ['./calendrier.component.scss']
})
export class CalendrierComponent implements OnInit {

  view: string = 'month';

  viewDate: Date = new Date();

  events: CalendarEvent[] = [];

  constructor() { }

  ngOnInit(): void {
    // à compléter avec la logique pour récupérer les événements depuis la base de données
  }

}
