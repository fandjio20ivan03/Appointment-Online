import { HttpClient, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Exception } from '../modeles/exception';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class DataExceptionService {

  constructor(private httpClient:HttpClient){}



  //insertion de l'ensemble des jours du d'exception et la validite
  insertDataException(data: Exception): Observable <HttpResponse <any>>{
    return this.httpClient.post('http://127.0.0.1:8000/api/exception',data, {observe: 'response'});
  }


  getDataValiditeException(){
    return this.httpClient.get('http://127.0.0.1:8000/api/validites/');
  }

}
