import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { Medecin } from '../medecin';
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


}
