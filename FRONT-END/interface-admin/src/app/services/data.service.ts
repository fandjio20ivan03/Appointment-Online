import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http'
import { Medecin } from '../modeles/medecin';
import { Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor(private httpClient: HttpClient) { }


// consomation cote medecin
  getMedecinBySearch(text_search:any){
    return this.httpClient.get(`http://127.0.0.1:8000/api/medecins/medecins-search?search=${text_search}`);
  }

  deleteDataMedecin(id: any){
    return this.httpClient.delete('http://127.0.0.1:8000/api/medecins/delete/'+id);
  }


  getDataMedecinPage(page:number){
    return this.httpClient.get(`http://127.0.0.1:8000/api/medecins/medecins-page?page=${page}`);
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

  getTotalDataMedecin(){
    return this.httpClient.get('http://127.0.0.1:8000/api/medecins/total-medecin');
  }



  // consaomation cote rdv
  getTotalDataRendezVous(){
    return this.httpClient.get('http://127.0.0.1:8000/api/rendez-vous/total-rendez-vous');
  }

  getAugmentationRendezVous(){
    return this.httpClient.get('http://127.0.0.1:8000/api/rendez-vous/augmentation-rendez-vous');
  }





  // consomation cote specialite
  getDataSpecialite(){
    return this.httpClient.get('http://127.0.0.1:8000/api/specialites');
  }


  getDataSpecialiteById(id: any){
    return this.httpClient.get('http://127.0.0.1:8000/api/specialites/show/'+id);
  }




  // consomation cote patient
  getDataPatient(){
    return this.httpClient.get('http://127.0.0.1:8000/api/patients');
  }


  getTotalDataPatient(){
    return this.httpClient.get('http://127.0.0.1:8000/api/patients/total-patient');
  }


  getDataPatientPage(page:number){
    return this.httpClient.get(`http://127.0.0.1:8000/api/patients/patients-page?page=${page}`);
  }


}
