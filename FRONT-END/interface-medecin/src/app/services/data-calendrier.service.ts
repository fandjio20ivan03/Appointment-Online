import { HttpClient, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Calendrier } from '../modeles/calendrier';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DataCalendrierService {

  constructor(private httpClient:HttpClient){}

  // cette declaration  permet de transmettre les donnees du calendrier du composent planning au composant exception
  calendrier: any[] = [];

  // recuperation de l'ensemble des dates du calendrier
  getDataCalendrier(){
    return this.httpClient.get('http://127.0.0.1:8000/api/calendrier');
  }

  //insertion de l'ensemble des jours du calendrier
  insertDataCalendrier(data: Calendrier): Observable<HttpResponse <any>>{
    return this.httpClient.post('http://127.0.0.1:8000/api/calendrier',data, {observe: 'response'});
  }


  //


}
