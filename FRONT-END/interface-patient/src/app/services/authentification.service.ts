import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthentificationService {

  private URL_API = 'http://localhost:8000/api';

  constructor(private http: HttpClient) { }

    public register(data : any):Observable<any> {
      const url = `${this.URL_API}/register`;
      return this.http.post<any>(url, data);
    }

    public login(credentials: any): Observable<any> {
      const url = `${this.URL_API}/login`;
      return this.http.post<any>(url, credentials);
    }
}
