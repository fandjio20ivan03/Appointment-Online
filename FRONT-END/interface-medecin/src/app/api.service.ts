import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(private http: HttpClient) { }

  // Envoie une requête POST pour créer un calendrier
  createCalendrier(calendrier: any) {
    return this.http.post('/api/calendriers', calendrier);
  }
}
