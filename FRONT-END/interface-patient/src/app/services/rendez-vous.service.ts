import { HttpClient, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { RendezVous } from '../modeles/rendez-vous';


@Injectable({
  providedIn: 'root',
})
export class RendezVousService {


  constructor(private httpClient:HttpClient){}

  // cette declaration  permet de transmettre les donnees du calendrier du composent planning au composant exception
  rendezvous: any[] = [];

  //insertion de l'ensemble des jours du calendrier
  insertDataRendezVous(data: RendezVous): Observable<HttpResponse <any>>{
    return this.httpClient.post('http://127.0.0.1:8000/api/rendez-vous/{id}',data, {observe: 'response'});
  }


}
