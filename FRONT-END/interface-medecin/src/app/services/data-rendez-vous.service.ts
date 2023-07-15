import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class DataRendezVousService {

  constructor(private httpClient:HttpClient) { }

  // recuperer l'ensemble des rendez-vous pour un medecin ayant son id
  getDataRendezVousPage(medecin_id:number,page:number){
    return this.httpClient.get(`http://127.0.0.1:8000/api/medecins/rendez-vous/${medecin_id}?page=${page}`);
  }

  


}
