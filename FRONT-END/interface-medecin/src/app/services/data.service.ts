import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http'
import { Observable } from 'rxjs';
import { Calendrier } from '../modele/calendrier';
@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor(private httpClient: HttpClient) { }


  // recuperation de l'ensemble des dates du calendrier

//   getDataCalendrier(){
//     return this.httpClient.get('http://127.0.0.1:8000/api/calendrier');
// }

  // insertDataCalendrier(data: Calendrier): Observable<HttpResponse <any>>{
  //   return this.httpClient.post('http://127.0.0.1:8000/api/calendrier',data, {observe: 'response'});
  // }


}
