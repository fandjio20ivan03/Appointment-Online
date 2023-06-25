import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http'
import { Medecin } from '../medecin';
import { Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor(private httpClient: HttpClient) { }


  getDataPatient(){
    return this.httpClient.get('http://127.0.0.1:8000/api/patients');
}

  deleteDataMedecin(id: any){
    return this.httpClient.delete('http://127.0.0.1:8000/api/medecins/delete/'+id);
  }

  getDataMedecin(){
      return this.httpClient.get('http://127.0.0.1:8000/api/medecins');
  }

  insertDataMedecin(data: Medecin): Observable<HttpResponse <any>>{
    return this.httpClient.post('http://127.0.0.1:8000/api/medecins',data, {observe: 'response'});
  }

  getDataMedecinById(id: any){
    return this.httpClient.get('http://127.0.0.1:8000/api/medecins/show/'+id);
  }

  updateDataMedecin(id:any,medecin:Medecin): Observable<HttpResponse <any>>{
    return this.httpClient.put('http://127.0.0.1:8000/api/medecins/update/'+id, medecin, {observe: 'response'});
  }


}
