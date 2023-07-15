import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login-patient',
  templateUrl: './login-patient.component.html',
  styleUrls: ['./login-patient.component.scss']
})
export class LoginPatientComponent {

  loginData = {
    login: '',
    password: ''
  };
  error: string | null = null;
  isLoggedIn = false;

  constructor(
    private http: HttpClient,
    private router: Router
    ) {}

  login() {
    this.http.post<any>('http://localhost:8000/api/login', this.loginData).subscribe(
      (response) => {
        console.log(response.status_code);
        if (response.status_code === 200) {
          console.log('Status reussie');


          // Connexion réussie
          this.isLoggedIn = true;
          // Enregistrer le token et les données utilisateur dans la session ou le stockage local
          sessionStorage.setItem('token', response.token); // Enregistre le token dans la session
          localStorage.setItem('user', JSON.stringify(response.user)); // Enregistre les données utilisateur dans le stockage local

          this.router.navigate(['']);
          console.log('Informations de l\'utilisateur :', response.user);
          console.log('Informations de l\'utilisateur :', response.token);

        } else {
          // Afficher un message d'erreur
          this.error = response.message;
        }
      },
      (error) => {
        // Afficher un message d'erreur générique
        this.error = 'Une erreur s\'est produite lors de la connexion.';
      }
    );
  }
}
